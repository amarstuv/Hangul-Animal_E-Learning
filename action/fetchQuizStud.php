<?php 
	require_once "db_connect.php";
	require_once "auth.php";

	// 					0		1		2			3			4
	$sql = "SELECT quiz_id, Title FROM quiz";

	$result = mysqli_query($connect,$sql);

	$output = array('data'=> array());

	if(mysqli_num_rows($result) > 0){

		$no = 1;
		$status = '';
		$button = '';

		while($row = mysqli_fetch_array($result)){

			$userID = $_SESSION['userID'];
			$quizID = $row[0];

			$sqlScore = "SELECT quiz_id, score FROM score WHERE user_id = {$userID} AND quiz_id = {$quizID}";
			$queryScore = $connect->query($sqlScore);
			$resScore = $queryScore->fetch_assoc();

			
			if (empty($resScore['quiz_id'])) {

				$score = 'N/A';
				$status = 'Pending';
				$button = '
						<center>
							<a class="btn btn-sm btn-outline-primary edit_quiz" href="answerQuiz.php?quizID='.$quizID.'" ><i class="fa fa-pencil"></i> Take Quiz</a>
						</center>';
			} else {

				$score = $resScore['score'];

				$status = 'Taken';
				$button = '
						<center>
							<a class="btn btn-sm btn-outline-primary edit_quiz" href="view_answer.php?quiz_id='.$quizID.'" ><i class="fa fa-eye"></i> View</a>
						</center>';
			}
			

			$output['data'][] = array(
			
				$no,
				$row[1],
				$score,
				$status,
				$button
			);
			$no++;	
		}
	}

	$connect->close();

	echo json_encode($output);
?>