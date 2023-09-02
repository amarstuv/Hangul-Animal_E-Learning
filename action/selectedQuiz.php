<?php

	require_once "db_connect.php";
	require_once "auth.php";

	$quizID = $_POST['quizID'];

	$sql = "SELECT Title, point, level FROM quiz WHERE quiz_id = {$quizID}";

	$result = $connect->query($sql);

	if($result->num_rows > 0) { 
		$row = $result->fetch_array();
	} // if num_rows

	$connect->close();

	echo json_encode($row);
?>