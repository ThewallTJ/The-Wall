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
    header('Location: mislukt.html');
    exit();
}
$stmt->close();
// ACCOUNT ACTIVEREN
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for update');
$stmt->bind_param('i', $userid);
$stmt->execute() or die ('Error updating');

header('Location: succes.html');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>
    <link rel="stylesheet" href="../css/verify.css">
</head>
<body>

</body>
</html>
