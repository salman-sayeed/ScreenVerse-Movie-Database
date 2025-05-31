<?php
function db_connect() {
    $host = 'localhost';
    $db_name = 'screenverse';
    $username = 'root';
    $password = '';

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
