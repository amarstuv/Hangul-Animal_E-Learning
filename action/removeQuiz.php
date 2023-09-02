<?php 

	require_once "db_connect.php";
	require_once "auth.php";

	$quizID = $_POST['quizID'];

	$sql = "DELETE FROM quiz WHERE quiz_id = {$quizID}";

	if ($connect->query($sql)==TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Quiz Successful Delete";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while deleting";
	}

	$connect->close();

	echo json_encode($valid);

?>