<?php
	require_once "db_connect.php";
	require_once "auth.php";

	$studentID = $_POST['userID'];

	$sql = "SELECT Name, email, username, password FROM user WHERE user_ID = {$studentID}";
	$result = $connect->query($sql);

	if($result->num_rows > 0) { 
		$row = $result->fetch_array();
	} // if num_rows

	$connect->close();

	echo json_encode($row);

?>