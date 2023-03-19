<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];

	// Database connection
	$conn = new mysqli('localhost','root','','sign');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		
	$sql="select * from form where (email='$email');";

	$res = mysqli_query($conn, $sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
            	echo "email already exists";
        }
		
		}
else{
	
//do your insert code here or do something (run your code)


		$stmt = $conn->prepare("insert into form(firstName, lastName, email, password) values(?, ?, ?,? )");
		
		
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);


		$execval = $stmt->execute();
include("auth-sign-in.html");
$stmt->close();
		$conn->close();
	}
}
?>
