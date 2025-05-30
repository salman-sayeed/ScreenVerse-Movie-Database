<?php
require_once('db.php'); // connect to DB

function login($user) {
    global $con;
    
    $username = mysqli_real_escape_string($con, $user['username']);
    $password = mysqli_real_escape_string($con, $user['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // In production, compare using password_verify()
        if ($password === $row['password_hash']) {
            return true;
        }
    }

    return false;
}
?>
