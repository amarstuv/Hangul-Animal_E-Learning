<?php require_once "action/auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<?php include('header.php'); ?>
	<meta charset="utf-8">
	<title>Quiz List</title>
</head>
<body>
	<?php require_once "nav_bar.php";?>
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">Quiz List</div>
		<button class="btn btn-primary bt-sm" id="newQuiz" data-target="#quiz_modal" data-toggle="modal"><i class="fa fa-plus"></i> Add New</button>
		<br>
		<br>
		<div class="msgRemove"></div>
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered" id="quizTable">
					<thead>
						<tr>
							<th width="6%">#</th>
							<th width="20%">Title</th>
							<th width="10%">Item</th>
							<th width="13%">Point Per Item</th>
							<th width="15%">Level</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="quiz_modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New Quiz</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form id="quizForm" method="POST" action="/">
					<div class="modal-body">
						<div class="quizAlert"></div>
						<div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label>Point Per Question</label>
                            <input type="number" class="form-control" name="point" id="point">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select id="level" name="level" class="form-control">
                            	<option value="">-- Select Level --</option>
                            	<option value="1">Easy</option>
                            	<option value="2">Medium</option>
                            	<option value="3">Hard</option>
                            </select>
                        </div>
					</div>
					<div class="modal-footer quiz_footer">
						<button  class="btn btn-primary" id="quizBtn"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="remove_quiz" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Remove Quiz</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p>Do you want remove the Quiz ?</p>
					</div>
					<div class="modal-footer remove-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> No</button>
        				<button type="button" class="btn btn-danger" id="removeBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Yes </button>
					</div>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="js/quiz_list.js"></script>
</body>
</html>