<?php
session_start();

// Handle submitted rating
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
  $_SESSION['user_rating'] = (int) $_POST['rating'];
}

$userRating = isset($_SESSION['user_rating']) ? $_SESSION['user_rating'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rating System</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f4f7fa;
      margin: 0;
      padding: 0;
    }
    header {
      background: #2c3e50;
      color: white;
      text-align: center;
      padding: 1.5rem;
      font-size: 1.8rem;
    }
    .container {
      max-width: 1000px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .section {
      margin-bottom: 2rem;
    }
    h2 {
      font-size: 1.5rem;
      color: #34495e;
    }
    .stars {
      display: flex;
      font-size: 2rem;
      cursor: pointer;
      color: #bdc3c7;
      margin-top: 1rem;
    }
    .stars .star.filled {
      color: #f1c40f;
    }
    .score {
      font-size: 2rem;
      color: #27ae60;
      margin-top: 1rem;
    }
    .demographics {
      display: flex;
      gap: 2rem;
      margin-top: 1rem;
      flex-wrap: wrap;
    }
    .demo-box {
      flex: 1 1 200px;
      background: #ecf0f1;
      padding: 1rem;
      border-radius: 8px;
      text-align: center;
    }
    .compare {
      display: flex;
      justify-content: space-around;
      margin-top: 2rem;
    }
    .compare-box {
      text-align: center;
    }
    .compare-box .score {
      font-size: 2rem;
      color: #e67e22;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background: #2c3e50;
      color: white;
      margin-top: 3rem;
    }
  </style>
</head>
<body>

<header>
  Rating System
</header>

<div class="container">

  <!-- Star Rater -->
  <div class="section">
    <h2>Rate This Title</h2>
    <form id="ratingForm" method="POST">
      <div class="stars" id="starRater">
        <?php
          for ($i = 1; $i <= 5; $i++) {
            $filled = ($i <= $userRating) ? 'filled' : '';
            echo "<span class='star $filled' data-value='$i'>&#9733;</span>";
          }
        ?>
      </div>
      <input type="hidden" name="rating" id="ratingInput">
    </form>
    <?php if ($userRating > 0): ?>
      <p>Your Rating: <?php echo $userRating; ?> star(s)</p>
    <?php endif; ?>
  </div>

  <!-- Weighted Score Display -->
  <div class="section">
    <h2>Weighted Score</h2>
    <div class="score">4.2 / 5</div>
  </div>

  <!-- Demographic Breakdown -->
  <div class="section">
    <h2>Demographic Breakdown</h2>
    <div class="demographics">
      <div class="demo-box"><h4>Male</h4><p>4.3</p></div>
      <div class="demo-box"><h4>Female</h4><p>4.1</p></div>
      <div class="demo-box"><h4>Age 18-25</h4><p>4.5</p></div>
      <div class="demo-box"><h4>Age 26-40</h4><p>4.2</p></div>
    </div>
  </div>

  <!-- Critic vs Audience Scores -->
  <div class="section">
    <h2>Critic vs Audience</h2>
    <div class="compare">
      <div class="compare-box">
        <h4>Critic Score</h4>
        <div class="score">88%</div>
      </div>
      <div class="compare-box">
        <h4>Audience Score</h4>
        <div class="score">91%</div>
      </div>
    </div>
  </div>

</div>

<footer>
  &copy; 2025 Media Catalog - Rating System
</footer>
</body>
<script src="ratingsystem.js"></script>
</html>
