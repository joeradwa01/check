<?php
// Start the session to access the logged-in user's email
session_start();
$email = $_SESSION['email'];

// Get the phone number and profile picture from the form submission
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
$statusMsg = '';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

// File upload path
$targetDir = "uploads/";

if(isset($_POST["submit"]) && isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
             // Insert image file name into database
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                // Retrieve the image path from the database
                $query = $db->query("SELECT * FROM images WHERE file_name = '".$fileName."'");
                if($query->num_rows > 0){
                    $row = $query->fetch_assoc();
                    $imageURL = $row["file_name"];
                }
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
         
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}

// Update the profile information and profile picture path in the database
$stmt = $conn->prepare("UPDATE form SET firstName = ?, lastName = ?, phone = ?, occupation = ?, dob = ?, country = ?, imageURL = ? WHERE email = ?");
$stmt->bind_param("ssssssss", $firstName, $lastName, $phone, $occupation, $dob, $country, $imageURL, $email);

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