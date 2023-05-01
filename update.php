<?php
 
 
// Start the session to access the logged-in user's email
session_start();
$email = $_SESSION['email'];

 
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$occupation = $_POST['occupation'];
$dob = $_POST['dob'];
$country = $_POST['country'];

 // Connect to the database
$conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
 

// Update the profile information and profile picture path in the database
$stmt = $conn->prepare("UPDATE form SET firstName = ?,lastName  = ?,phone = ?, occupation = ?, dob = ?, country = ? WHERE email = ?");
$stmt->bind_param("sssssss", $firstName,$lastName,$phone, $occupation, $dob, $country,  $email);


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