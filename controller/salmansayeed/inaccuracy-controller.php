<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../view/salmansayeed/error.php');
    exit;
}

$errors = [];
$link    = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function clean($s) { return htmlspecialchars(stripslashes(trim($s))); }
    $link    = clean($_POST['link'] ?? '');
    $message = clean($_POST['message'] ?? '');

    if (!$link) {
        $errors['link'] = 'The link is required.';
    } elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors['link'] = 'Enter a valid URL.';
    }

    if (!$message) {
        $errors['message'] = 'Please enter some details.';
    }

    if (empty($errors)) {
        header("Location: ../../view/salmansayeed/contact.php");
        exit(); 
    }
}
?>
