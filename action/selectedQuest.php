<?php

	require_once "db_connect.php";
	require_once "auth.php";

	$questID = $_POST['questID'];

	$data = array('qdata'=> array(),'odata'=> array());

	$sql = "SELECT question FROM questions WHERE question_id = {$questID}";
	$result = $connect->query($sql);

	if($result->num_rows > 0) { 
		$row = $result->fetch_array();

		$data['qdata'] = $row;
	} // if num_rows

	$sqlAns = "SELECT * FROM quiz_answer where question_id = {$questID}";

	$resAnswer = $connect->query($sqlAns);

	if($resAnswer->num_rows > 0){

		while($rowAns = $resAnswer->fetch_array()){

			$data['odata'][] = $rowAns;
		}
	}

	$connect->close();

	echo json_encode($data);
?>