<?php 
	require_once "action/db_connect.php";
	require_once "action/auth.php";

	$quizID = $_GET['quizID'];

	$sql = "SELECT Title FROM quiz WHERE quiz_id = {$quizID}";
	$result = $connect->query($sql);
	$title =  $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<?php include('header.php'); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Manage Quiz | <?php echo $title['Title']; ?></title>
</head>
<body>
	<?php require_once "nav_bar.php";?>
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary"><?php echo $title['Title']; ?></div>
		<button class="btn btn-primary bt-sm" id="newQuestion" data-target="#question_modal" data-toggle="modal"><i class="fa fa-plus"></i> Add Question</button>
		<input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quizID; ?>">
		<br>
		<br>
		<div class="card">
			<div class="msgQuest"></div>
			<div class="card-body">
				<table class="table table-bordered" id="questionTable">
					<thead>
						<tr>
							<th width="15%">#</th>
							<th width="40%">Question</th>
							<th width="25%">Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="question_modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New Question</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form name="frmImage" enctype="multipart/form-data" action="action/saveQuest.php" method="POST" id="questionForm">
					<div class="modal-body">
						<div class="questionMsg"></div>
						<div class="form-group">
							<label>Question</label>
							<textarea class="form-control" name="question" id="question" required></textarea>
						</div>

						<div class="form-group" id="imageHide">
							<div id="getImage"></div>
						</div>

						<div class="form-group">
							<label>Media File</label>
							<input name="media" type="file" class="form-control" />
						</div>
							<label>Answer option :</label>

						<div class="form-group">
							<textarea rows="2" name ="question_opt[0]" required="" class="form-control" ></textarea>
							<span>
							<label><input type="radio" name="is_right[0]" class="is_right" value="1"> <small>Question Answer</small></label>
							</span>
							<br>
							<textarea rows="2" name ="question_opt[1]" required="" class="form-control" ></textarea>
							<label><input type="radio" name="is_right[1]" class="is_right" value="1"> <small>Question Answer</small></label>
							<br>
							<textarea rows="2" name ="question_opt[2]" class="form-control" ></textarea>
							<label><input type="radio" name="is_right[2]" class="is_right" value="1"> <small>Question Answer</small></label>
							<br>
							<textarea rows="2" name ="question_opt[3]" class="form-control" ></textarea>
							<label><input type="radio" name="is_right[3]" class="is_right" value="1"> <small>Question Answer</small></label>
						</div>
					</div>
					<div class="modal-footer question_footer">
						<button type="submit" class="btn btn-primary" id="questBtn"><span class="glyphicon glyphicon-save"></span> Save</button>
						<input type="hidden" name="quizID" value="<?php echo $quizID; ?>">
					</div>
				</form>
			</div>
		</div>		
	</div>

	<div class="modal fade" id="remove_question" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Remove Question</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p>Do you want remove the question ?</p>
				</div>
				<div class="modal-footer remove-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> No</button>
					<button type="button" class="btn btn-danger" id="removeBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Yes </button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/manageQuiz.js"></script>
</body>
</html>