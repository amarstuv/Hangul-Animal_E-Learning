<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('header.php'); ?>
	<?php include('action/auth.php'); ?>
	<?php include('action/db_connect.php'); ?>
	<?php 

		$quizID = $_GET['quizID'];

		$sql = "SELECT * FROM quiz WHERE quiz_id = {$quizID}";
		$query = $connect->query($sql);
		$resultQuiz = $query->fetch_assoc();

		$sqlQuest = "SELECT * FROM questions WHERE quiz_id = {$quizID}";
		$queryQuest = $connect->query($sqlQuest);
		
	?>
	<meta charset="utf-8">
	<title><?php echo $resultQuiz['Title'] ?> | Answer Sheet</title>
</head>
</html>
<body>
	<style>
		li.answer{
			cursor: pointer;
		}
		li.answer:hover{
			background: #00c4ff3d;
		}
		li.answer input:checked{
			background: #00c4ff3d;
		}
	</style>
	<?php include('nav_bar.php') ?>
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"><?php echo $resultQuiz['Title'] ?> | <?php echo $resultQuiz['point'] .' Points Each Question' ?>
			
		</div>
		<br>
		<div class="card">
			<div class="msgQuiz"></div>
			<div class="card-body">
				<form action="action/submitQuiz.php" id="answer_sheet" method="POST">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['userID'] ?>">
					<input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quizID ?>">
					<input type="hidden" name="qpoints" value="<?php echo $resultQuiz['point'] ?>">

					<?php 
						$i = 1;
						while($resQuest = $queryQuest->fetch_assoc()){

							$sqlOpt = "SELECT * FROM quiz_answer WHERE question_id = {$resQuest['question_id']}";
							$queryOpt = $connect->query($sqlOpt);
					?>
						<ul class="q-items list-group mt-4 mb-4">
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
												<input type="radio" name="option_id[<?php echo $resQuest['question_id'] ?>]" value="<?php echo $resOpt['answer_id'] ?>"> <?php echo $resOpt['option_answer'] ?>
											</label>
										</li>

									<?php }?>
								</ul>
							</li>
						</ul>
					<?php }?>
					<button class="btn btn-block btn-primary" id="submitQuizBtn">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/quiz_student.js"></script>