<?php


// CHECKEN OF DE USERID EN DE HASH EEN MATCH ZIJN IN DE DATABASE ZITTEN
if (!isset($_COOKIE['userid'])) {
    header( 'Location: login.php');
}
// CHECKEN OF DE USERID EN DE HASH EEN MATCH ZIJN IN DE DB
require ('../../private/db.php');
$query = "SELECT userid  FROM users WHERE userid = ?  AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('error preparing.');
$stmt->bind_param( 'is',$userid, $hash) or die ('Error binding params.');

$userid = $_COOKIE['userid'];
$hash = $_COOKIE['hash'];
$username = $_COOKIE['username'];
$stmt->execute() or die ('Error executing.');
$fetch_success = $stmt->fetch();

if (!$fetch_success) {
    header( 'Location: login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/homepage.css">
    <title>The wall!</title>
</head>
<body>



   

<div class="header">
        <img src="../media/logo.png" alt="logo" id="logo">

        <a href="www.upload.com"><img src="../media/uploadBlauw.png" alt="upload" id="upload"></a>


        
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
<h2 class="h2-right dropbtn1" onclick="Dropdown1()"><?php echo $_COOKIE['username'];  ?></h2>
  <div id="myDropdown1" class="dropdown-content1">
    <a href="#home">sign out</a>
    <a href="#about">sign in</a>
    <a href="#contact">profile (maintenance)</a>
  </div>
</div>




<h1>Pictures</h1>
<br>
<div class="wrapper">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
    <img src="../media/6am.jpg" class="grid-item" alt="gridimage">
</div>



<script src="../script/script.js"></script>
</body>
</html>
