<?php
session_start();
$rating_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    $rating = $_POST['rating'];
$userRating = isset($_SESSION['user_rating']) ? $_SESSION['user_rating'] : 0;
    if (!is_numeric($rating)) {
        $rating_error = 'Invalid rating value.';
    } else {
        $rating = (int) $rating;
        if ($rating < 1 || $rating > 5) {
            $rating_error = 'Rating must be between 1 and 5.';
        } else {
            $_SESSION['user_rating'] = $rating;
        }
    }
}

$userRating = isset($_SESSION['user_rating']) ? $_SESSION['user_rating'] : 0;
?>
