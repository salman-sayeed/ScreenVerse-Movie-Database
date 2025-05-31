<?php
session_start();
require_once __DIR__ . '/../../model/users.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
    $_SESSION['login_error'] = "Security token mismatch. Please try again.";
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = isset($_POST['remember']);

try {
    $user = login($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;

        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + (86400 * 30), "/");
        }

        $redirect = ($user['role'] === 'admin') 
            ? '../../view/salmansayeed/admindb.php' 
            : '../../view/mdsanjidhasan/dashboard.php';

        header("Location: $redirect");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password";
    }
} catch (Exception $e) {
    $_SESSION['login_error'] = "Login failed: " . $e->getMessage();
}

header('Location: ../../view/mdsanjidhasan/login.php');
exit();
?>
