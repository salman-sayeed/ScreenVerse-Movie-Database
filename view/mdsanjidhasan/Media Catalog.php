<?php
session_start();

// Sample media data in session
if (!isset($_SESSION['media_catalog'])) {
  $_SESSION['media_catalog'] = [
    [
      'title' => 'Movie Title',
      'cast' => 'John Doe, Jane Smith',
      'showrunner' => 'Alex Johnson',
      'language' => 'English',
      'certification' => 'PG-13',
      'network' => 'Netflix',
      'decade' => '2020s',
      'runtime' => 100
    ],
    [
      'title' => 'Show Title',
      'cast' => 'Emily Brown, Chris Evans',
      'showrunner' => 'Linda Carter',
      'language' => 'Spanish',
      'certification' => 'TV-MA',
      'network' => 'HBO',
      'decade' => '2010s',
      'runtime' => 50
    ]
  ];
}

// Filtering logic
$filtered = $_SESSION['media_catalog'];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $filters = ['decade', 'network', 'runtime', 'language', 'certification'];
  foreach ($filters as $filter) {
    if (isset($_GET[$filter]) && $_GET[$filter] !== '') {
      $value = $_GET[$filter];
      $filtered = array_filter($filtered, function($item) use ($filter, $value) {
        if ($filter === 'runtime') {
          return $item[$filter] <= (int)$value;
        }
        return stripos($item[$filter], $value) !== false;
      });
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Media Catalog</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f5f5;
      color: #333;
    }
    header {
      background: #2c3e50;
      padding: 1rem;
      text-align: center;
      color: white;
      font-size: 1.5rem;
    }
    .container {
      display: grid;
      grid-template-columns: 1fr 3fr;
      gap: 1rem;
      padding: 1rem;
    }
    .filters {
      background: white;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .filters h2 {
      margin-top: 0;
    }
    .filters label {
      display: block;
      margin-top: 1rem;
      font-weight: bold;
    }
    .filters select, .filters input {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.5rem;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .catalog {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1rem;
    }
    .card {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
    }
    .card img {
      width: 100%;
      height: auto;
    }
    .card-content {
      padding: 1rem;
    }
    .card-title {
      font-size: 1.2rem;
      margin: 0 0 0.5rem;
    }
    .card-details {
      font-size: 0.9rem;
      color: #666;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background: #2c3e50;
      color: white;
      margin-top: 2rem;
    }
  </style>
</head>
<body>

<header>
  Media Catalog
</header>

<div class="container">
  <!-- Advanced Search / Filters -->
  <aside class="filters">
    <h2>Advanced Search</h2>
    <form method="get" onsubmit="return validateForm();">
      <label for="decade">Browse by Decade</label>
      <select name="decade" id="decade">
        <option value="">Any</option>
        <option>2020s</option>
        <option>2010s</option>
        <option>2000s</option>
        <option>1990s</option>
      </select>

      <label for="network">Browse by Network</label>
      <select name="network" id="network">
        <option value="">Any</option>
        <option>Netflix</option>
        <option>HBO</option>
        <option>Disney+</option>
        <option>Amazon Prime</option>
      </select>

      <label for="runtime">Filter by Runtime (minutes)</label>
      <input type="number" name="runtime" id="runtime" placeholder="e.g. 90">

      <label for="language">Filter by Language</label>
      <input type="text" name="language" id="language" placeholder="e.g. English">

      <label for="certification">Filter by Certification</label>
      <input type="text" name="certification" id="certification" placeholder="e.g. PG-13">

      <button type="submit" style="margin-top:1rem;">Apply Filters</button>
    </form>
  </aside>

  <!-- Title Browser -->
  <main class="catalog">
    <?php foreach ($filtered as $item): ?>
      <div class="card">
        <img src="https://via.placeholder.com/300x400" alt="Poster">
        <div class="card-content">
          <div class="card-title"><?= htmlspecialchars($item['title']) ?></div>
          <div class="card-details">
            <p>Cast: <?= htmlspecialchars($item['cast']) ?></p>
            <p>Showrunner: <?= htmlspecialchars($item['showrunner']) ?></p>
            <p>Language: <?= htmlspecialchars($item['language']) ?></p>
            <p>Certification: <?= htmlspecialchars($item['certification']) ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </main>
</div>

<footer>
  &copy; 2025 Media Catalog. All rights reserved.
</footer>

<script src="validation.js"></script>
</body>
</html>
