<?php
include ('htmlhead.php');
?>

<link rel="stylesheet" type="text/css" href="../css/register.css">
    <img class="logo" src="logo.png" alt="logo" align="middle">
<div class="form">
    <h2 class="welcome"> Welcome, please register.</h2>

    <form method="post" action="process_registration.php">
       <input type="text" name="username" placeholder="username.."/><br>
       <input type="email" name="email" placeholder="e-mail.." /><br>
       <input type="password" name="password1" placeholder="password.." /><br>
       <input type="password" name="password2" placeholder="repeat password.."/><br>
       <input type="submit" name="submit_registration" value="Register"/></label>
    </form>
</div>
<?php
include ('htmlfoot.php');
?>

'