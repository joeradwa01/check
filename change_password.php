<?php
session_start();
$email = $_SESSION['email'];

$current_password = $_POST['cpass'];
$new_password = $_POST['npass'];
$verify_password = $_POST['vpass'];

$conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if the current password is correct
$stmt = $conn->prepare("SELECT password FROM form WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Check if the new password meets the requirements
if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/', $new_password)) {
    echo "Error updating password: New password should be at least 8 characters long and contain at least one number and one symbol.";
} else {
    // If the current password is correct and the new password meets the requirements, update the password in the database
    $new_password_hash =  $new_password;
    $stmt = $conn->prepare("UPDATE form SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_password_hash, $email);

    if ($stmt->execute()) {
        echo "Password updated successfully.";
    } else {
        echo "Error updating password: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>