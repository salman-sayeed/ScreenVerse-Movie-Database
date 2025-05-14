<?php
session_start();

$validEmail = "user@example.com";
$validPassword = "123456";
$error = '';

// Handle login POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    if (empty($email)) {
        $error = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (empty($password)) {
        $error = "Password is required.";
    } elseif ($email !== $validEmail || $password !== $validPassword) {
        $error = "Invalid email or password.";
    } else {
        $_SESSION['email'] = $email;

        if ($remember) {
            setcookie('status', 'loggedin', time() + (86400 * 7), "/"); // 7 days
        } else {
            setcookie('status', 'loggedin', 0, "/"); // session cookie
        }

        header("Location: index.php");
        exit();
    }
}
?>
