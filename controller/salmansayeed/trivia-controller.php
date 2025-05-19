<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../view/salmansayeed/error.php');
    exit;
}

// Sanitize function
function clean($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$link = clean($_POST['link'] ?? '');
$message = clean($_POST['message'] ?? '');

$errors = [];

// Validate link
if (empty($link)) {
    $errors['link'] = "Link is required.";
} elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
    $errors['link'] = "Please enter a valid URL.";
}

// Validate message
if (empty($message)) {
    $errors['message'] = "Message is required.";
}

if (!empty($errors)) {
    // Save errors and previous input in session to show in form
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = ['link' => $link, 'message' => $message];
    
    header('Location: ../../view/salmansayeed/trivia.php');
    exit;
}

unset($_SESSION['errors'], $_SESSION['old']);
header('Location: ../../view/salmansayeed/trivia.php?success=1');
exit;
