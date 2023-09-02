<?php
	require_once "db_connect.php";
	require_once "auth.php";

	$userID = $_SESSION['userID'];

	$sql = "SELECT user_ID, Name, username, email FROM USER WHERE Role = 2";

	$result = mysqli_query($connect,$sql);

	$output = array('data'=> array());

	if(mysqli_num_rows($result) > 0){

		$no = 1;
		while($row = mysqli_fetch_array($result)) {

			$userID = $row[0];

			$button = '
				<center>
					<button class="btn btn-sm btn-outline-primary edit_student" data-target="#manage_student" data-toggle="modal" type="button" onclick="editStudent('.$userID.')"><i class="fa fa-edit"></i> Edit</button>
					<button class="btn btn-sm btn-outline-danger remove_student" data-target="#remove_student" data-toggle="modal" type="button" onclick="delStudent('.$userID.')"><i class="fa fa-trash"></i> Delete</button>
				</center>
			';

			$output['data'][] = array(
			
				$no,
				$row[1],
				$row[2],
				$row[3],
				$button
			);
			$no++;	
		}
	}

	$connect->close();

	echo json_encode($output);

?>