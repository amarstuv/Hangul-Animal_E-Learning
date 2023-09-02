<?php

	require_once "db_connect.php";
	require_once "auth.php";

	$valid['success'] = array('success' => false, 'messages' => array());

	$question = $_POST['question'];
	$quizID = $_POST['quizID'];
	$questionID = $_POST['questionID'];
	$option = $_POST['question_opt'];
	$answer = $_POST['is_right'];


	if (empty($questionID)){

		//add new question
	
		if (is_uploaded_file($_FILES['media']['tmp_name'])) {

			$mediaData = mysqli_real_escape_string($connect,file_get_contents($_FILES['media']['tmp_name']));

			$sql = "INSERT INTO questions (question, quiz_id, media) VALUES ('$question','$quizID','$mediaData')";

		} else {

			$sql = "INSERT INTO questions (question, quiz_id) VALUES ('$question','$quizID')";

		}

		$success = $connect->query($sql);

		$questID = $connect->insert_id;

		$sqlOpt = array();

		$condition = count($option);

		for ($i = 0 ; $i < $condition ;$i++){

			$answer = isset($answer[$i]) ? $answer[$i] : 0;

			$sqlOpt = "INSERT INTO quiz_answer set question_id = $questID, option_answer = '".$option[$i]."',`right_answer` = $answer ";

			$result = $connect->query($sqlOpt);
		}

		if($result == TRUE){
			$valid['success'] = true;
			$valid['messages'] = "Successfully Add Question";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while Adding Question ".$connect->error;
		}

	} else {

		// update question

		if (is_uploaded_file($_FILES['media']['tmp_name'])) {

			$mediaData = mysqli_real_escape_string($connect,file_get_contents($_FILES['media']['tmp_name']));

			$sql = "UPDATE questions SET question = '$question', media = '$mediaData' WHERE question_id = {$questionID}";

		} else {

			//$mediaData = '';

			$sql = "UPDATE questions SET question = '$question' WHERE question_id = {$questionID}";

		}

		$success = $connect->query($sql);

		$sqlDel = "DELETE FROM quiz_answer WHERE question_id = {$questionID};";

		$connect->query($sqlDel);
		$sqlOpt = array();

		$condition = count($option);

		for ($i = 0 ; $i < $condition ;$i++){

			$answer = isset($answer[$i]) ? $answer[$i] : 0;

			$sqlOpt = "INSERT INTO quiz_answer set question_id = $questionID, option_answer = '".$option[$i]."',`right_answer` = $answer";

			$result = $connect->query($sqlOpt);
		}

		if($result == TRUE){
			$valid['success'] = true;
			$valid['messages'] = "Successfully Update Question";
		} else {
			$valid['success'] = false;
			$valid['messages'] = /*"Error while Updating Question "*/$connect->error;
		}
	}


	echo json_encode($valid);
?>