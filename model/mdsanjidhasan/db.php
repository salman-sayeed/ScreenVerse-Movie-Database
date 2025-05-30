<?php
// db.php

$host = '127.0.0.1'; // or 'localhost'
$user = 'root';      // your MySQL username
$pass = '';          // your MySQL password
$db   = 'movie_database'; // your DB name

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
