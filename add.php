<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Check if the form has been submitted
    if(isset($_POST['phone'])) {
        // Get the phone number input
        $phone = $_POST['phone'];

        // Database connection
        $conn = new mysqli('localhost','root','','page');
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            // Update the user's phone number in the database
            $sql = "UPDATE form SET phone='$phone' WHERE email='$email'";
            $result = $conn->query($sql);

            if($result) {
                echo '<div class="alert alert-success" role="alert">Phone number updated successfully</div>';
            } else {
              echo '<div class="alert alert-danger" role="alert">Error updating phone number</div>';
            }
        } 
    }
} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
    exit();
}
?>