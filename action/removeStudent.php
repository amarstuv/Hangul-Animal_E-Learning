<?php 
	require_once "db_connect.php";
	require_once "auth.php";

	$valid['success'] = array('success' => false, 'messages' => array());

	$userID = $_POST['userID'];

	$sql = "DELETE FROM user WHERE user_ID = {$userID}";

	if ($connect->query($sql)==TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Student successful delete";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while deleting";
	}

	$connect->close();

	echo json_encode($valid);

?>