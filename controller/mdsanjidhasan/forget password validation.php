<?php
session_start();
if (!isset($_SESSION['recovery_number'])) {
    $_SESSION['recovery_number'] = '123456'; 
}

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputRecovery = trim($_POST['recovery-number'] ?? '');
    $newPassword = trim($_POST['new-password'] ?? '');
    $confirmPassword = trim($_POST['confirm-password'] ?? '');

    // Server-side validation
    if ($inputRecovery !== $_SESSION['recovery_number']) {
        $errorMessage = 'Invalid recovery number.';
    } elseif (empty($newPassword)) {
        $errorMessage = 'Password cannot be empty.';
    } elseif (!is_string($newPassword) || strlen($newPassword) < 6) {
        $errorMessage = 'Password must be at least 6 characters long.';
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        $_SESSION['user_password'] = $newPassword;
        $successMessage = 'Password successfully updated!';
    }
}
?>

