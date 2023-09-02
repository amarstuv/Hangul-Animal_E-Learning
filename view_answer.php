<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('header.php'); ?>
	<?php include('action/auth.php'); ?>
	<?php include('action/db_connect.php'); ?>
	<?php 

		$quizID = $_GET['quiz_id'];
		$userID = $_SESSION['userID'];

		$sql = "SELECT * FROM quiz WHERE quiz_id = {$quizID}";
		$query = $connect->query($sql);
		$resultQuiz = $query->fetch_assoc();

		$sqlQuest = "SELECT * FROM questions WHERE quiz_id = {$quizID}";
		$queryQuest = $connect->query($sqlQuest);

		$sqlScore = "SELECT quiz_id, score FROM score WHERE user_id = {$userID} AND quiz_id = {$quizID}";
		$queryScore = $connect->query($sqlScore);
		$resScore = $queryScore->fetch_assoc();
		
	?>
	<title><?php echo $resultQuiz['Title']; ?> | Answer Sheet</title>
</head>
<body>
	<?php include('nav_bar.php') ?>
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"><?php echo $resultQuiz['Title'] ?> | <?php echo $resultQuiz['point'] .' Points Each Question'; ?></div>
		<div class="col-md-12 alert alert-success">SCORE : <?php echo $resScore['score'] ?></div>
		<br>
		<div class="card">
			<div class="card-body">
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['userID'] ?>">
				<input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quizID ?>">
				<input type="hidden" name="qpoints" value="<?php echo $resultQuiz['point'] ?>">

				<?php 
					$i = 1;
					while($resQuest = $queryQuest->fetch_assoc()){

						$sqlOpt = "SELECT * FROM quiz_answer WHERE question_id = {$resQuest['question_id']}";
						$queryOpt = $connect->query($sqlOpt);

						$sqlAns = "SELECT * FROM answer WHERE user_id = {$userID} AND quiz_id = {$quizID} AND question_id = {$resQuest['question_id']}";
						$queryAns = $connect->query($sqlAns);
						$resAns = $queryAns->fetch_assoc();
				?>

					<ul class="q-items list-group mt-4 mb-4 ?>">
						<li class="q-field list-group-item">
							<strong><?php echo ($i++). '. '; ?> <?php echo $resQuest['question'] ?></strong>
							<input type="hidden" name="question_id[<?php echo $resQuest['question_id'] ?>]" value="<?php echo $resQuest['question_id'] ?>">
							<br>
							<br>
							<center>
								<img width="150" src="data:image/png;base64,<?php echo base64_encode($resQuest['media'])?>" alt="Image" >
							</center>
							<ul class='list-group mt-4 mb-4'>

								<?php while($resOpt = $queryOpt->fetch_assoc()){?>
									<li class="answer list-group-item">
										<label>
											<input type="radio" name="option_id[<?php echo $resQuest['question_id'] ?>]" value="<?php echo $resOpt['answer_id'] ?>" <?php echo $resAns['option_id'] == $resOpt['answer_id'] ? "checked='checked'" : "" ?> disabled> <?php echo $resOpt['option_answer'] ?>
										</label>
									</li>
								<?php }?>
							</ul>
						</li>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$('input').attr('readonly',true);
		
	});
</script>
</html>