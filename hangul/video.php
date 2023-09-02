<!DOCTYPE html>
<html>
    <head>
        <title>Animal Song</title>
    
<style>
button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
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
<a href="homepage.php" class="previous round">&#8249;</a>
<center><h1>Let's Watch Animals in Korean.</h1></center>
<div style="text-align:center">
  <video id="video1" width="420">
    <source src="..\hangul\video\animal_video.mp4" type="video/mp4">
    Your browser does not support HTML video.
  </video>
  <br><br>
  <button onclick="playPause()">Play/Pause</button>
  <button onclick="makeBig()">Big</button>
  <button onclick="makeSmall()">Small</button>
  <button onclick="makeNormal()">Normal</button>
</div>

<script>
  var myVideo = document.getElementById("video1");

  function playPause() {
    if (myVideo.paused)
      myVideo.play();
    else
      myVideo.pause();
  }

  function makeBig() {
    myVideo.width = 1000;
  }

  function makeSmall() {
    myVideo.width = 420;
  }

  function makeNormal() {
    myVideo.width = 720;
  }
</script>

</body>
</html>
