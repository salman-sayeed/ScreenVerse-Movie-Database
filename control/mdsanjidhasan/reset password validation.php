<?php
session_start();

// Set initial user password for demonstration
if (!isset($_SESSION['user_password'])) {
    $_SESSION['user_password'] = 'admin123';
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = trim($_POST['current-password'] ?? '');
    $new = trim($_POST['new-password'] ?? '');
    $confirm = trim($_POST['confirm-password'] ?? '');

    // Server-side validation
    if ($current !== $_SESSION['user_password']) {
        $error = 'Current password is incorrect.';
    } elseif ($new === '') {
        $error = 'New password cannot be empty.';
    } elseif (strlen($new) < 6) {
        $error = 'New password must be at least 6 characters long.';
    } elseif ($new !== $confirm) {
        $error = 'New passwords do not match.';
    } else {
        $_SESSION['user_password'] = $new;
        $success = 'Password successfully updated.';
    }
}
?>
