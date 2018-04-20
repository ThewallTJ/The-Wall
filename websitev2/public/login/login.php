<?php
session_start();
if (isset($_COOKIE['userid']) OR isset($_SESSION['userid'])) {
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
          </div>
          <div>
          <input type="submit" name="submit_login" value="login" />
          <a href="../register/register.php"><button class="button button2" type="button">Register</button></a>
        </div>
      </form>
      </div>
      <!-- Trigger/Open The Modal -->
      <button id="myBtn" type="button">Help</button>

      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <fieldset> <legend> Questions / solutions</legend>
          <span class="close">&times;</span>
          <p>1. als je het wachtwoord niet meer weet, dan moet je een nieuw account aanmaken</p>
          <p>2. als je de gebruikersnaam niet meer weet, mail dan naar 24609@ma-web.nl ( een van de beheerders)</p>
          <p>3. wil je je eigen gebruikers naam veranderen? mail dan naar het bovenstaande mailadres</p>
          <p>4.heb je verder nog vragen of feedback? stuur dan ook een mailtje naar het bovenstaande mailadres.  </p>
        </fieldset>
        </div>


</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

  </body>
</html>
