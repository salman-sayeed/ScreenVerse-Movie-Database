<?php
session_start();

// Initialize session values if not set
if (!isset($_SESSION['profile'])) {
    $_SESSION['profile'] = [
        'name' => 'John Doe',
        'address' => '123 Main Street, City, Country',
        'email' => 'john@example.com',
        'phone' => '+1234567890',
        'bio' => 'Web developer with a passion for creating amazing UIs.'
    ];
}

// Validation messages
$profile_error = '';
$password_message = '';
$password_error = '';

// Handle Edit Profile form submission with validation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_profile'])) {
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $bio = trim($_POST['bio']);

    if ($name === '' || $address === '' || $email === '' || $phone === '' || $bio === '') {
        $profile_error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $profile_error = 'Invalid email address.';
    } else {
        $_SESSION['profile']['name'] = $name;
        $_SESSION['profile']['address'] = $address;
        $_SESSION['profile']['email'] = $email;
        $_SESSION['profile']['phone'] = $phone;
        $_SESSION['profile']['bio'] = $bio;
        $profile_error = 'Profile updated successfully.';
    }
}

// Handle Password Change with validation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_password'])) {
    $current = trim($_POST['current']);
    $new = trim($_POST['new']);
    $confirm = trim($_POST['confirm']);

    // For demonstration, let's assume current password is "admin123"
    if ($current !== 'admin123') {
        $password_error = 'Current password is incorrect.';
    } elseif ($new === '') {
        $password_error = 'New password cannot be empty.';
    } elseif (strlen($new) < 6) {
        $password_error = 'New password must be at least 6 characters.';
    } elseif ($new !== $confirm) {
        $password_error = 'New passwords do not match.';
    } else {
        // Normally update the password in a database here
        $password_message = 'Password updated successfully.';
    }
}
?>
