<?php
// CHECKEN OF DE GEBRUIKER VERDWAALD IS
if (isset($_COOKIE['userid'])) {
    header( 'Location: homepage.php');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
  </head>
  <body>

<img class="logo" src="logo.png" alt="logo" align="middle">
      <div class="form">

        <h2 class="welcome"> Welcome, please login.</h2>
        <form action="inlogpoort.php" method="post">
          <div>
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password" placeholder="password"/>
             <div>
                <p class="link"><u> forgot password? </u></p>
             </div>
             <div>
                <p class="link2"><u> trouble with signing in? </u></p>
            </div>
          </div>
          <div>
          <input type="submit" name="submit_login" value="login" />
          <a href="../register/register.php"><button class="button button2" type="button">Register</button></a>
        </div>
      </form>
      </div>
      <button class="buttonHelp" type="button">Help</button>
  </body>
</html>