<?php
session_start();


        require('../login/cookiecheck.php');
        $_SESSION['userid'] = $_COOKIE['userid'];
        $_SESSION['hash'] = $_COOKIE['hash'];
        $_SESSION['username'] = $_COOKIE['username'];



 nu7
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profilepage</title>
    <link rel="stylesheet" href="../css/profilepage.css">
  </head>
  <body>

    <h2 style="text-align:center">Welcome to your profile<strong> <?php echo $_SESSION['username'];?></strong></h2>

  <div class="wrapper">
      <img class="wrapper-topleft" src="pf.png" alt="image">
      <div>
      <h3><strong>naam: </strong><?php echo $_SESSION['username'];?></h3>
      <h3><strong>email: </strong><?php echo $_SESSION['email'];?></h3>
    </div>


  </div>




    </div>
  </body>
</html>
