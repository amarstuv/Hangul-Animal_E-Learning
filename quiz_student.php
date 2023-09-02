<?php require_once "action/auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<?php include('header.php'); ?>
	<meta charset="utf-8">
	<title>My Quiz List</title>
</head>
<body>
	<?php require_once "nav_bar.php";?>
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">My Quiz List</div>
		<br>
		<br>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id="quizTable">
					<thead>
						<tr>
							<th width="6%">#</th>
							<th width="20%">Quiz</th>
							<th width="10%">Score</th>
							<th width="13%">Status</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/quiz_student.js"></script>
</body>
</html>