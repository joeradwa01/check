<?php
// Start the session to access the logged-in user's email
session_start();
$email = $_SESSION['email'];

// Get the phone number from the form submission
$phone = $_POST['phone'];

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute the SQL query to update the phone number
$stmt = $conn->prepare("UPDATE form SET phone = ? WHERE email = ?");
$stmt->bind_param("ss", $phone, $email);
if ($stmt->execute()) {
    // If the query was successful, redirect to the profile page
    echo "good" . $stmt->error;
    exit();
} else {
    // If the query failed, display an error message
    echo "Error updating phone number: " . $stmt->error;
}

// Close the database connection and statement
$stmt->close();
$conn->close();
?>