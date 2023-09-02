<?php 
	require_once "db_connect.php";
	require_once "auth.php";

	$sql = "SELECT quiz_id, Title, point, level FROM quiz";

	$result = mysqli_query($connect,$sql);

	$output = array('data'=> array());

	if(mysqli_num_rows($result) > 0){

		$no = 1;
		$level = '';

		while($row = mysqli_fetch_array($result)){

			$quizID = $row[0];

			$sqlQuest = "SELECT COUNT(*) FROM questions WHERE quiz_id = $quizID";
			$questResult = $connect->query($sqlQuest);
			$item = $questResult->fetch_row();

			$button = '
				<center>
				 	<a class="btn btn-sm btn-outline-primary edit_quiz" href="manageQuiz.php?quizID='.$quizID.'" ><i class="fa fa-task"></i> Manage</a>
				 	<button class="btn btn-sm btn-outline-primary edit_quiz" data-target="#quiz_modal" data-toggle="modal" type="button" onclick="editQuiz('.$quizID.')"><i class="fa fa-edit"></i> Edit</button>
					<button class="btn btn-sm btn-outline-danger remove_quiz" data-target="#remove_quiz" data-toggle="modal" type="button" onclick="delQuiz('.$quizID.')"><i class="fa fa-trash"></i> Delete</button>
				</center>';

			if($row[3] == 1){

				$level = 'Easy';

			} elseif($row[3] == 2){

				$level = 'Medium';

			} elseif($row[3] == 3){

				$level = 'Hard';

			}

			$output['data'][] = array(
			
				$no,
				$row[1],
				$item,
				$row[2],
				$level,
				$button
			);
			$no++;	
		}
	}

	$connect->close();

	echo json_encode($output);
?>