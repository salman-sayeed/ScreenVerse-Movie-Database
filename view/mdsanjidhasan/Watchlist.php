<?php
session_start();

if (!isset($_SESSION['watchlists'])) {
  $_SESSION['watchlists'] = [
    'summerMovies' => [
      'Top Gun: Maverick',
      'Inception',
      'Jurassic Park'
    ],
    'actionClassics' => [
      'Die Hard',
      'The Matrix',
      'Mad Max: Fury Road'
    ]
  ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['move_item'])) {
  $from = $_POST['from'] ?? '';
  $to = $_POST['to'] ?? '';
  $item = $_POST['item'] ?? '';

  if ($from !== $to && isset($_SESSION['watchlists'][$from]) && isset($_SESSION['watchlists'][$to])) {
    $index = array_search($item, $_SESSION['watchlists'][$from]);
    if ($index !== false) {
      unset($_SESSION['watchlists'][$from][$index]);
      $_SESSION['watchlists'][$from] = array_values($_SESSION['watchlists'][$from]);
      $_SESSION['watchlists'][$to][] = $item;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Watchlist Manager</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f7fa;
    }
    header {
      background: #34495e;
      padding: 1rem;
      color: white;
      text-align: center;
      font-size: 1.5rem;
    }
    .container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 1rem;
    }
    .watchlists {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }
    .watchlist {
      background: white;
      border-radius: 8px;
      padding: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .watchlist h2 {
      margin-top: 0;
      font-size: 1.3rem;
    }
    .movie-list {
      margin-top: 1rem;
      min-height: 150px;
      padding: 0;
      list-style: none;
    }
    .movie-list li {
      background: #ecf0f1;
      padding: 0.75rem;
      margin-bottom: 0.5rem;
      border-radius: 6px;
      cursor: move;
    }
    .buttons {
      margin-top: 1rem;
      display: flex;
      gap: 1rem;
    }
    .buttons button {
      flex: 1;
      padding: 0.5rem;
      border: none;
      border-radius: 6px;
      font-size: 0.9rem;
      cursor: pointer;
    }
    .share-btn {
      background: #3498db;
      color: white;
    }
    .export-btn {
      background: #2ecc71;
      color: white;
    }
    footer {
      margin-top: 4rem;
      text-align: center;
      padding: 1rem;
      background: #34495e;
      color: white;
    }
  </style>
</head>
<body>

<header>
  Watchlist Manager
</header>

<div class="container">
  <div class="watchlists">

    <div class="watchlist" id="summerMovies">
      <h2>☀️ Summer Movies</h2>
      <ul class="movie-list" id="list1">
        <?php foreach ($_SESSION['watchlists']['summerMovies'] as $movie): ?>
          <li draggable="true"><?= htmlspecialchars($movie) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="buttons">
        <button class="share-btn">Share List</button>
        <button class="export-btn">Export</button>
      </div>
    </div>

    
    <div class="watchlist" id="actionClassics">
      <h2>🔥 Action Classics</h2>
      <ul class="movie-list" id="list2">
        <?php foreach ($_SESSION['watchlists']['actionClassics'] as $movie): ?>
          <li draggable="true"><?= htmlspecialchars($movie) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="buttons">
        <button class="share-btn">Share List</button>
        <button class="export-btn">Export</button>
      </div>
    </div>

  </div>
</div>

<footer>
  &copy; 2025 Media Catalog - Watchlist Manager
</footer>

<script src="validation.js"></script>
<script>
  let draggedItem = null;
  let fromList = '';

  document.querySelectorAll('.movie-list li').forEach(item => {
    item.addEventListener('dragstart', () => {
      draggedItem = item;
      fromList = item.closest('ul').id;
      setTimeout(() => { item.style.display = 'none'; }, 0);
    });

    item.addEventListener('dragend', () => {
      setTimeout(() => {
        if (draggedItem) draggedItem.style.display = 'block';
        draggedItem = null;
        fromList = '';
      }, 0);
    });
  });

  document.querySelectorAll('.movie-list').forEach(list => {
    list.addEventListener('dragover', e => e.preventDefault());
    list.addEventListener('drop', e => {
      e.preventDefault();
      if (draggedItem && fromList) {
        const toList = list.id;
        const form = document.createElement('form');
        form.method = 'POST';

        const itemInput = document.createElement('input');
        itemInput.type = 'hidden';
        itemInput.name = 'item';
        itemInput.value = draggedItem.textContent;
        form.appendChild(itemInput);

        const fromInput = document.createElement('input');
        fromInput.type = 'hidden';
        fromInput.name = 'from';
        fromInput.value = fromList === 'list1' ? 'summerMovies' : 'actionClassics';
        form.appendChild(fromInput);

        const toInput = document.createElement('input');
        toInput.type = 'hidden';
        toInput.name = 'to';
        toInput.value = toList === 'list1' ? 'summerMovies' : 'actionClassics';
        form.appendChild(toInput);

        const moveInput = document.createElement('input');
        moveInput.type = 'hidden';
        moveInput.name = 'move_item';
        moveInput.value = '1';
        form.appendChild(moveInput);

        document.body.appendChild(form);
        form.submit();
      }
    });
  });

  document.querySelectorAll('.share-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      alert('Share feature coming soon!');
    });
  });

  document.querySelectorAll('.export-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      alert('Export to file coming soon!');
    });
  });
</script>

</body>
</html>
