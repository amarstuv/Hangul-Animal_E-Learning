<?php 

	require_once "db_connect.php";
	require_once "auth.php";

	$questID = $_POST['questID'];

	$sql = "DELETE FROM questions WHERE question_id = {$questID}";

	if ($connect->query($sql)==TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Question Successful Delete";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while deleting";
	}

	$connect->close();

	echo json_encode($valid);

?>