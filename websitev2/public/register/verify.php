<?php
require ('../../private/db.php');
// Checken of de hash met de mail overeenkomt
$query = "SELECT userid FROM users WHERE mailadres = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing');
$stmt->bind_param('ss',$mailadres,$hash);
$mailadres = $_GET['mailadres'];
$hash = $_GET['hash'];
$stmt->execute();
$stmt->bind_result($userid);
$row = $stmt->fetch();
if (!$userid){
    echo 'Sorry, maar dit klopt niet.';
    exit();
}
$stmt->close();
// ACCOUNT ACTIVEREN
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for update');
$stmt->bind_param('i', $userid);
$stmt->execute() or die ('Error updating');
echo 'Je account is geactiveerd  Klik <a href="../login/login.php">hier</a> om in te loggen!.';