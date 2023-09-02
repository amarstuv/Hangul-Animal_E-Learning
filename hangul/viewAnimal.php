<!DOCTYPE html>
<html>
<head>
    <title>Learning Animals</title>
<?php
session_start();
include "dbConnect.php";
// $animal_id = $_SESSION['animal_id'];

$sql = "SELECT * FROM animal";
$result = $conn->query($sql);

if (isset($_SESSION['animal_id'])) {
    // echo '<header>';
    // echo '<div class="title">Learning Animals</div>';
    // echo '</header>';
}

if($result)
?>
<style>
    
.table {
    border-collapse: collapse;
}

th, td{
    padding: 8px;
    border: 1px solid #000;
}

      .btn{
      text-decoration: none;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      transition-duration: 0.5s;
      padding: 2px 15px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
      font-family: Galamond;
      font-size: 20px;
  }

  .btn:hover{
      background-color: #fff;
      color: #080008;
  }

a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
  margin-left: 20px;
  margin-top: 20px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #B87333;
  color: black;
}

.round {
  border-radius: 60%;
}
</style>


</head>

<body style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
<a href="homepage.php" class="previous round">&#8249;</a>
<center>
<h1>Know Animals in Hangul</h1>
</center>

<center><table class="table">
<thead>
<tr>
<th>Image</th>
<th>Audio</th>
<th>Korean</th>
<th>English</th>
<th>Malay</th>
</tr>
</thead>
<tbody>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $image = $row['image'];
    $audio = $row['audio'];
    $name_korean = $row['name_korean'];
    $name = $row['name'];
    $name_malay = $row['name_malay'];
   
    echo '<tr>';
    echo '<td>';
    if (!empty($image)) {
        echo '<img width="150" src="data:image/png;base64,' . base64_encode($image) . '" alt="Image" >';
    }
    echo '</td>';
    // echo '<td>';
    echo '<div class="row">';
    echo '<div class="col-sm-12">';
    // echo '<a class="btn btn-info" href="ctVact.php">Show</a>';
    echo '</div>';
    echo '</div>';
    // echo '</td>';
    echo '<td>';
    if (!empty($audio)) {
        echo '<audio controls><source src="data:audio/mpeg;base64,' . base64_encode($audio) . '" alt="Audio" >';
    }
    echo '</td>';
    // echo '<td>';
    echo '<div class="row">';
    echo '<div class="col-sm-12">';
    // echo '<a class="btn btn-info" href="ctVact.php">Show</a>';
    echo '</div>';
    echo '</div>';
    echo '<td>' . $name_korean . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $name_malay . '</td>';
    echo '</tr>';
 
}
?>
</tbody>
</table></center>

</body>
</html>
