<?php

ini_set("log_errors",1);
ini_set("error_log","errorlog.log");
error_log("Hallo errors!");



require ('../../private/db.php');



// Checken of hij hier wel hoort te zijn
if (!isset($_POST['submit_registration'])){
    header('Location: register.php');
}
// Zijn alle velden ingevuld?
if (empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password1']) OR empty($_POST['password2'])){
    echo 'Je bent vergeten iets in te vullen. ';
    echo 'Klik <a href="register.php">hier</a> om terug te keren';
    exit();
}
// Zijn beide wachtwoorden gelijk?
if ($_POST['password1'] != $_POST['password2']){
    echo 'De wachtwoorden komen niet overeen.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren';
    exit();
}
//// Heeft de gebruiker wel een ma-adres?
//$position = strpos($_POST['email'], '@ma-web.nl');
//if (!$position) {
//    echo 'Sorry je kunt je alleen registreren met een e-mailadres van het Mediacollege<br>';
//    echo 'Klik <a href="register.php">hier</a> om terug te keren';
//    exit();
//}
//Bestaat de username al
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $username);
$username = $_POST['username'];
$result = $stmt->execute() or die ('Error querying username');
$row = $stmt->fetch();
if ($row){
    echo 'Sorry maar deze gebruikersnaam is al bezet. ';
    echo 'Klik <a href="register.php">hier</a> om terug te keren';
    exit();
}
$query = "SELECT userid FROM users WHERE mailadres = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $mailadres);
$mailadres = $_POST['email'];
$result = $stmt->execute() or die ('Error querying mailadres.');
$row = $stmt->fetch();
if ($row){
    echo 'Je hebt al een account?.. ';
    echo 'Klik <a href="register.php">hier</a> om terug te keren';
    exit();
}
// Gebruiker in database toevoegen
$query = "INSERT INTO users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss', $username, $mailadres, $password, $hash);
$username = $_POST['username'];
$mailadres = $_POST['email'];
$random_number = rand(0,1000000);
$hash = hash('sha512',$random_number);
$password = hash('sha512',$_POST['password1']);
$result = $stmt->execute() or die ('Error inserting user.');
// Gebruiker mailen
$to = $_POST['email'];
$subject = 'Verificatie van je account.';
$message = 'Heel erg bedankt voor het registreren bij TR The Wall, u bent er bijna. Alles wat u nu nog moet doen is op deze link klikken, om je account te activeren ';
$message .= " http://24609.hosts.ma-cloud.nl/bewijzenmap/periode1.3/PROJ/thewall/websitev2/public/register/verify.php?mailadres=" . $mailadres . "&hash=" . $hash;
$headers = 'From: 24609@ma-web.nl';
mail($to,$subject,$message,$headers) or die ("Error mailing");

   echo "<h1>gelukt, maar nog slechts een laatste stap,check uw  mail inbox om uw account te activeren</h1>"

   ?>

   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title>Process_registration</title>
        <link rel="stylesheet" href="../css/process_registration.css">
     </head>
     <body>
       <p> bedankt voor het registeren!</p>
     </body>
   </html>
