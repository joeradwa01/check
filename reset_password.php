<?php
// reset_password.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $conn = new mysqli('localhost', 'root', '', 'page');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM form WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, generate a random temporary password
        $temp_password = bin2hex(random_bytes(8)); // 8 bytes -> 16 characters
        $temp_password_hash = password_hash($temp_password, PASSWORD_DEFAULT);

        // Store the temporary password in the database
        $stmt = $conn->prepare("UPDATE form SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $temp_password_hash, $email);
        if ($stmt->execute()) {
            // Send the temporary password to the user's email
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_username@gmail.com';
            $mail->Password = 'your_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('noreply@notepus.com', 'NotePlus');
            $mail->addAddress($email);
            $mail->Subject = 'Temporary Password for NotePlus';
            $mail->Body = "Hello,\n\nYou have requested a temporary password for your NotePlus account. Your temporary password is: $temp_password\n\nPlease use this password to log in and change your password immediately.\n\nThank you,\nNotePlus Team";
            if ($mail->send()) {
                echo "A temporary password has been sent to your email address.";
            } else {
                echo "Error sending email: " . $mail->ErrorInfo;
            }
        } else {
            echo "Error updating password";
        }
    } else {
        echo "Email does not exist";
    }

    $conn->close();
}
?>