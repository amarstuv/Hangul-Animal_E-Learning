<?php 
	require_once "db_connect.php";
	require_once "auth.php";

	$valid['success'] = array('success' => false, 'messages' => array());


	$title = $_POST['title'];
	$point = $_POST['point'];
	$level = $_POST['level'];
	$quizID = $_POST['quizID'];

	if(empty($quizID)){

		//add new data

		$sql = "INSERT INTO quiz (Title, point, level) VALUES ('$title', '$point', '$level')";

		if($connect->query($sql) == TRUE){
			$valid['success'] = true;
			$valid['messages'] = "Successfully Add Quiz";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while Adding Quiz";
		}

		echo json_encode($valid);
	} else {

		//update data
		$sql = "UPDATE quiz SET Title = '$title', point = '$point', level = '$level' WHERE quiz_id = {$quizID} ";

		if($connect->query($sql) == TRUE){
			$valid['success'] = true;
			$valid['messages'] = "Successfully Update Quiz";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while Updating Quiz";
		}

		echo json_encode($valid);

	
	}
?>