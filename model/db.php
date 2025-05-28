<?php
    if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
        header("Location: /view/salmansayeed/error.php");
        exit;
    }

    $host = "localhost";
    $user = "root";
    $pass = ""; 
    $dbname = "screenverse";

    $conn = new mysqli($host, $user, $pass, $dbname);

?>