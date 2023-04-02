<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];

    // Database connection
    $conn = new mysqli('localhost','root','','page');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        // Retrieve the user's information from the database
        $sql = "SELECT * FROM form WHERE email='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        // Display the user's information on the profile page
        echo "First Name: " . $row['firstName'] . "<br>";
        echo "Last Name: " . $row['lastName'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Username: " . $username . "<br>";

     }
} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
    exit();
}
?> 