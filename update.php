<?php
// Start the session to access the logged-in user's email
session_start();
$email = $_SESSION['email'];

// Get the phone number and profile picture from the form submission
$phone = $_POST['phone'];
$occupation = $_POST['occupation'];
$dob = $_POST['dob'];
$country = $_POST['country'];

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if(isset($_FILES['profile_pic'])) {
    $file_name = $_FILES['profile_pic']['name'];
    $file_size = $_FILES['profile_pic']['size'];
    $file_tmp = $_FILES['profile_pic']['tmp_name'];
    $file_type = $_FILES['profile_pic']['type'];
    
    // Move the uploaded file to a permanent location on the server
    $upload_dir = "uploads/"; // replace with the desired directory path
    $file_path = $upload_dir . $file_name;
    move_uploaded_file($file_tmp, $file_path);
} else {
    // If no file was uploaded, set the file path to the current profile picture path in the database
    $file_path = $_POST['current_profile_pic'];
}

 
// Update the profile information and profile picture path in the database
$stmt = $conn->prepare("UPDATE form SET phone = ?, occupation = ?, dob = ?, country = ?, profile_pic = ? WHERE email = ?");
$stmt->bind_param("ssssss", $phone, $occupation, $dob, $country, $file_path, $email);


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