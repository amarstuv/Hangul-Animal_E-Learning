<?php
	require_once "db_connect.php";
	require_once "auth.php";

	$valid['success'] = array('success' => false, 'messages' => array());

	if($_POST){

		$Fname = $_POST['Fname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$userID = $_POST['userID'];

		$sql = "UPDATE user SET Name = '$Fname', username = '$username', email = '$email', password = '$password' WHERE user_ID = {$userID}";

		if($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Update Student";	
		} else {
			$valid['success'] = false;
			$valid['messages'] = /*$connect->error;8*/"Error while updating";
		}

		$connect->close();

		echo json_encode($valid);
	}

?>