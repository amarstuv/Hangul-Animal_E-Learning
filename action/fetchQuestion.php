<?php
	require_once "db_connect.php";
	require_once "auth.php";

	$quiz_id = $_POST['quiz_id'];

	$sql = "SELECT question_id, question FROM questions WHERE quiz_id = {$quiz_id}";

	$result = mysqli_query($connect,$sql);

	$output = array('data'=> array());

	if(mysqli_num_rows($result) > 0){

		$no = 1;
		while($row = mysqli_fetch_array($result)){

			$question_id = $row[0];
			$button = '
				<center>
					<button class="btn btn-sm btn-outline-primary edit_quiz" data-target="#question_modal" data-toggle="modal" type="button" onclick="editQuestion('.$question_id.')"><i class="fa fa-edit"></i> Edit</button>
					<button class="btn btn-sm btn-outline-danger remove_quiz" data-target="#remove_question" data-toggle="modal" type="button" onclick="delQuestion('.$question_id.')"><i class="fa fa-trash"></i> Delete</button>
				</center>
			';

			$output['data'][] = array(

				$no,
				$row[1],
				$button
			);

			$no++;
		}

	}

	$connect->close();

	echo json_encode($output);
?>