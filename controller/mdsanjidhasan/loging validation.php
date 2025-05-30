<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    if ($username === "" || $password === "") {
        echo "Username and password required";
        exit();
    }

    $user = ['username' => $username, 'password' => $password];
    $status = login($user);  

    if ($status) {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('status', 'true', time() + (86400 * 7), "/"); 
        } else {
            setcookie('status', 'true', 0, "/"); 
        }

        echo "success"; // This tells AJAX it's successful
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "";
}
?>
