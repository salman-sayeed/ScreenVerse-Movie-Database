<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Catalog with Reviews</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }
        header {
            background: #4a90e2;
            padding: 1rem;
            text-align: center;
            color: white;
            font-size: 1.5rem;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .rating-stars {
            display: flex;
            gap: 0.5rem;
            font-size: 2rem;
            cursor: pointer;
        }
        .rating-stars span {
            color: #ccc;
        }
        .rating-stars span.active {
            color: gold;
        }
        textarea {
            width: 100%;
            padding: 1rem;
            margin-top: 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: vertical;
            min-height: 120px;
        }
        button.submit-btn {
            margin-top: 1rem;
            padding: 0.75rem 1.5rem;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
        }
        .reviews {
            margin-top: 3rem;
        }
        .review {
            border-top: 1px solid #eee;
            padding: 1.5rem 0;
        }
        .review h4 {
            margin: 0;
            font-size: 1.2rem;
        }
        .review p {
            margin: 0.5rem 0 1rem;
            color: #555;
        }
        .review .stars {
            color: gold;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        .review-actions {
            display: flex;
            gap: 1rem;
            font-size: 0.9rem;
            color: #0077cc;
            cursor: pointer;
        }
        .review-actions span:hover {
            text-decoration: underline;
        }
        .reply-box {
            margin-top: 1rem;
        }
        .reply-box textarea {
            min-height: 80px;
        }
        .reply-box button {
            margin-top: 0.5rem;
        }
        .replies {
            margin-top: 1rem;
            padding-left: 1rem;
            border-left: 2px solid #eee;
        }
        .reply {
            margin-top: 1rem;
        }
        footer {
            margin-top: 4rem;
            text-align: center;
            padding: 1rem;
            background: #4a90e2;
            color: white;
        }
    </style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['reviews'])) {
    $_SESSION['reviews'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $user = $_POST['user'] ?? 'Anonymous';
    $rating = (int) ($_POST['rating'] ?? 0);
    $comment = $_POST['comment'] ?? '';
    $reply_to = $_POST['reply_to'] ?? '';

    $_SESSION['reviews'][] = [
        'user' => $user,
        'rating' => $rating,
        'comment' => $comment,
        'reply_to' => $reply_to,
        'reported' => false,
        'id' => uniqid()
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report_id'])) {
    foreach ($_SESSION['reviews'] as &$review) {
        if ($review['id'] === $_POST['report_id']) {
            $review['reported'] = true;
            break;
        }
    }
    unset($review);
}

function renderReviews($reply_to = '') {
    foreach ($_SESSION['reviews'] as $review) {
        if ($review['reply_to'] === $reply_to && !$review['reported']) {
            echo '<div class="review">';
            echo '<h4>' . htmlspecialchars($review['user']) . '</h4>';
            echo '<div class="stars">' . str_repeat('&#9733;', $review['rating']) . str_repeat('&#9734;', 5 - $review['rating']) . '</div>';
            echo '<p>' . nl2br(htmlspecialchars($review['comment'])) . '</p>';
            echo '<div class="review-actions">
                    <span onclick="replyTo(\'' . $review['id'] . '\')">Reply</span>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="report_id" value="' . $review['id'] . '">
                        <span onclick="this.closest(\'form\').submit()">Report</span>
                    </form>
                  </div>';
            echo '<div class="replies">';
            renderReviews($review['id']);
            echo '</div></div>';
        }
    }
}
?>

<header>
  User Reviews
</header>

<div class="container">
  <h2>Write a Review</h2>
  <form method="POST" onsubmit="return validateReviewForm()">
    <input type="hidden" id="reply_to" name="reply_to" value="">
    <label>Your Name:</label><br>
    <input type="text" name="user"><br><br>
    <label>Rating:</label>
    <div class="rating-stars" id="ratingStars">
      <span data-value="1">&#9733;</span>
      <span data-value="2">&#9733;</span>
      <span data-value="3">&#9733;</span>
      <span data-value="4">&#9733;</span>
      <span data-value="5">&#9733;</span>
    </div>
    <input type="hidden" name="rating" id="rating" value="0">
    <textarea name="comment" placeholder="Share your thoughts..."></textarea>
    <button type="submit" name="submit_review" class="submit-btn">Submit Review</button>
  </form>

  <div class="reviews">
    <?php renderReviews(); ?>
  </div>
</div>

<footer>
  &copy; 2025 Media Catalog - User Reviews
</footer>

<script src="validation.js"></script>
<script>
const stars = document.querySelectorAll('#ratingStars span');
const ratingInput = document.getElementById('rating');
stars.forEach(star => {
  star.addEventListener('click', () => {
    const rating = parseInt(star.getAttribute('data-value'));
    ratingInput.value = rating;
    stars.forEach(s => s.classList.remove('active'));
    for (let i = 0; i < rating; i++) {
      stars[i].classList.add('active');
    }
  });
});

function replyTo(id) {
  document.getElementById('reply_to').value = id;
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
</body>
</html>