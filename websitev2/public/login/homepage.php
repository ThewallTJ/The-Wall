<?php
session_start();

// CHECKEN OF DE GEBRUIKER VERDWAALD IS
if (!isset($_SESSION['userid'])) {
    if (!isset($_COOKIE['userid'])) {
        header('Location: login.php');
    } else {
        require('cookiecheck.php');
        $_SESSION['userid'] = $_COOKIE['userid'];
        $_SESSION['hash'] = $_COOKIE['hash'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="myStyle.css">
  <title>The wall!</title>
</head>
<body>
  <div class="header">
    <img src="photoshop/logo.png" alt="logo" id="logo">

    <a href="upload.php"><img src="media/uploadBlauw.png" alt="upload" id="upload"></a>

    <h2 class="h2-right">USERNAME</h2>
      <h2 class="h2">The wall</h2>

    </div>
    <div class="header">
    <div class="dropdown">
  <input type="image"  src="media/menu4.png"  class="dropbtn"  onclick="Dropdown()"/>
 </div>
</div>
<div id="myDropdown" class="dropdown-content">
  <a href="www.google.com">look this</a>
</div>
<br>


<!-- <div id="modaalAchtergrond">
  <div id="modaalVenster">
    <button id="sluitKnop">Sluiten</button>
    <div id="modaalinhoud"></div>
  </div>
</div> -->
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
  <br>
  <div id="caption2"></div>
</div>
<h1>Pictures</h1>
<br>
<div class="wrapper">
  <?php
  $mysqli = new mysqli('localhost','24585_user','24585_pass','24585_db') or die ('Error connecting');
  $query = "SELECT location, title, description FROM images ORDER BY image_id DESC ";
  $stmt = $mysqli->prepare($query) or die ('Error preparing.');
  $stmt->bind_result($location,$title,$description) or die ('Error binding by result');
  $stmt->execute() or die ('Error executing.');

  while  ($succes = $stmt->fetch()){
      echo '<img alt="Titel: ' . $title . "<br>" . "Description: " . $description .'" class="grid-item" src="' . $location . '" />';
  }
  ?>

</div>
<!-- The Modal -->






<script src="script.js">
</script>
</body>
</html>
