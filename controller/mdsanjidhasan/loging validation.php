<?php
error_reporting(E_ALL);
require_once('../model/userModel.php'); 
$error = '';

 Handle login POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    if ($username === "") {
        $error = "Username is required.";
    } elseif ($password === "") {
        $error = "Password is required.";
    } else {
        $user = ['username' => $username, 'password' => $password];
        $status = login($user);  
        if ($status) {
            $_SESSION['username'] = $username;

            if ($remember) {
                setcookie('status', 'true', time() + (86400 * 7), "/"); 
            } else {
                setcookie('status', 'true', 0, "/"); 
            }

            header("Location: ../view/home.php");
            exit();
        } else {
            
            header("Location: ../view/login.php");
            exit();
        }
    }
}
 else {
    header("Location: ../view/login.php");
    exit();
}
?>
