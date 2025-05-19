<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../view/salmansayeed/error.php');
    exit;
}

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $fname = clean_input($_POST['fname'] ?? '');
    $lname = clean_input($_POST['lname'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $msg = clean_input($_POST['msg'] ?? '');

    if (empty($fname)) $errors['fname'] = "First name is required.";
    if (empty($lname)) $errors['lname'] = "Last name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "A valid email is required.";
    }

    if (empty($phone) || !ctype_digit($phone) || strlen($phone) !== 11) {
        $errors['phone'] = "Phone number must be exactly 11 digits.";
    }

    if (empty($msg)) $errors['msg'] = "Message cannot be empty.";

    if (empty($errors)) {
        header("Location: ../../view/salmansayeed/contact.php");
        exit(); 
    }
}
?>
