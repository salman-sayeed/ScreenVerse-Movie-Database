<?php
require_once __DIR__ . '/../../model/users.php';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    try {
        $user = new User();
        
        // Server-side validation
        if (empty($fullname)) {
            $errors['fullname'] = 'Full name is required';
        }

        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }

        if ($password !== $confirm_password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }

        if (empty($errors)) {
            if ($user->createUser($fullname, $email, $password)) {
                $success = true;
                // You might want to start a session here
                // $_SESSION['user'] = $userData;
            }
        }
    } catch (Exception $e) {
        $errors['general'] = $e->getMessage();
    }
}
?>