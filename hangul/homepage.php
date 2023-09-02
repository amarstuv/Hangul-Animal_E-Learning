<?php
    include 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Home | Hangul Animal Learning</title>
<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

body {
            background-image: url('images/background6.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment : fixed;
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
<body>
  <a href="../home.php" class="previous round">&#8249;</a>
<center> 
    <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
   <h1>Let's Learn Animals in Korean.</h1>
   <div class="container">

   <a href="viewAnimal.php" class="button button1">Learn Hangul</a>
   <a href="video.php" class="button button2">Animals Songs</a>
</div>
</center>
</body>
</html>