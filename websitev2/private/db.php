<?php
$mysqli = new mysqli('localhost', 'thomas_gebruiker','123456','thomas_db') or die ('Error connecting.');

if ($mysqli->errno) {
    echo 'Error number: ' . $mysqli->errno . '<br>';
}