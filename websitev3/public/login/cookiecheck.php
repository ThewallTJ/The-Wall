<?php

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