<?php 
	require_once 'db_connect.php';

	$valid['success'] = array('success' => false, 'messages' => array());

	$email = $_POST['email'];
	$Fname = $_POST['Fname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$role = 2;

	$sql = "INSERT INTO user (Name,username,email,password,Role) VALUES ('$Fname','$username','$email','$password','$role')";

	if($connect->query($sql) == TRUE){
		$valid['success'] = true;
		$valid['messages'] = "Successfully Register";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while Register";
	}

	echo json_encode($valid);

	$connect->close();

	
	
?>