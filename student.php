<?php include 'action/auth.php'?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<?php include('header.php'); ?>
		<title>Manage Student</title>
	</head>
	<body>
		<?php require_once "nav_bar.php";?>
		<div class="container-fluid admin">
			<div class="col-md-12 alert alert-primary">Student List</div>
			<br>
			<div class="msgRemove"></div>
			<div class="card">
				<div class="card-body">
					<table class="table table-bordered" id="studTable">
						<thead>
							<tr>
								<th width="10%">#</th>
								<th width="25%">Name</th>
								<th width="20%">Username</th>
								<th width="30%">Email</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<div class="modal fade" id="manage_student" tabindex="-1" role="dialog" >
			<div class="modal-dialog modal-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id='editStudentForm' action="action/editStudent.php" method="POST">
						<div class ="modal-body">
							<div class="msgEditStudent"></div>
							<div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="Fname" id="Fname">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
						</div>
						<div class="modal-footer edit-Student">
							<button  class="btn btn-primary" id="editStudBtn" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="remove_student" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Remove Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p>Do you want remove the student ?</p>
					</div>
					<div class="modal-footer remove-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> No</button>
        				<button type="button" class="btn btn-danger" id="removeBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Yes </button>
					</div>
				</div>
			</div>
		</div>
		<script src="js/student.js"></script>	
	</body>
</html>