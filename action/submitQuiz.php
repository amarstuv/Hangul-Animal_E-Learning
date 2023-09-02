<?php
	
	require_once "db_connect.php";
	require_once "auth.php";
	
	extract($_POST);
	$points = 0;
	foreach ($question_id as $key => $value) {

		$questID = $question_id[$key];
		$is_right = 0;

		if(isset($option_id[$key])){

			$optID = $option_id[$key];
			$is_right = $connect->query("SELECT * FROM quiz_answer where answer_id = '".$option_id[$key]."' ")->fetch_array()['right_answer'];
		}

		$ans = $is_right;

		$insert = $connect->query("INSERT INTO answer (user_id, quiz_id, question_id, option_id, is_right) VALUES ('$user_id','$quiz_id','$questID','$optID','$ans') ");

		if($insert && $is_right > 0){
			$points++;
		}
	
		// echo("INSERT INTO answers set ".$data);
	}

	$score = $points * $qpoints;
	$total = count($question_id) * $qpoints;
		$insert2 = $connect->query("INSERT INTO score (quiz_id,user_id,score) VALUES ('$quiz_id','$user_id','$score')");
		if($insert2){
			echo json_encode(array('success' => true, 'score' => $score.'/'.$total));
		}
		
?>