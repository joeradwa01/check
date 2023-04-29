<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Sanitize the note content
$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);

// Database connection
$conn = new mysqli('localhost','root','','page');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    // Insert the note into the database
    $stmt = $conn->prepare("INSERT INTO notes (content, date, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $content, $date, $_SESSION['email']);

    $date = date('Y-m-d H:i:s'); // Get the current date and time

    $execval = $stmt->execute();

    if($execval) {
        echo "Note saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>