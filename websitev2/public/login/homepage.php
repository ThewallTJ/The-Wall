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
    <link rel="stylesheet" href="../css/homepage.css">
    <title>The wall</title>
</head>
<body>



   

<div class="header">
        <img src="../media/logo.png" alt="logo" id="logo">

        <a href="upload.php"><img src="../media/uploadBlauw.png" alt="upload" id="upload"></a>


        
        <h2 class="h2">The wall</h2>

    </div>
    <div class="header">
        <div class="dropdown">
            <input type="image"  src="../media/menu4.png" alt="menu"  class="dropbtn"  onclick="Dropdown()"/>
        </div>
    </div>
    <div id="myDropdown" class="dropdown-content">
        <a href="www.google.com">look this</a>
    </div>

<br>


<div class="dropdown">
<h2 class="h2-right dropbtn1" onclick="Dropdown1()"><?php echo $_SESSION['username'];  ?></h2>
  <div id="myDropdown1" class="dropdown-content1">
    <a href="uitlogpoort.php">sign out</a>
    <a href="#about">sign in</a>
    <a href="profilepage.php">profile (maintenance)</a>
  </div>
</div>






<br>
    <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
  <br>
  <div id="caption2"></div>
</div>
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



<script src="../script/script.js"></script>
</body>
</html>
