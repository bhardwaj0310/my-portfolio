<?php
	$nameame = $_POST['name'];
	$email = $_POST['email'];
	$project = $_POST['project'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name, email, project, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $project, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent successfully...";
		$stmt->close();
		$conn->close();
	}
?>