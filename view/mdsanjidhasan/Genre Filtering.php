<?php
session_start();

if (!isset($_SESSION['customMixes'])) {
  $_SESSION['customMixes'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveMix'])) {
  $genres = isset($_POST['genres']) ? $_POST['genres'] : [];
  $moods = isset($_POST['moods']) ? $_POST['moods'] : [];
  $mix = array_merge($genres, $moods);
  if (!empty($genres)) {
    $_SESSION['customMixes'][] = $mix;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Genre Explorer</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: #eef2f7;
    }
    header {
      background: #8e44ad;
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
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    h2 {
      margin-top: 0;
    }
    .genres, .moods {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .genre, .mood {
      padding: 0.75rem 1.5rem;
      background: #ecf0f1;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .genre.selected, .mood.selected {
      background: #8e44ad;
      color: white;
    }
    .builder {
      margin-top: 2rem;
      padding: 1rem;
      background: #f9f9f9;
      border-radius: 8px;
      border: 1px dashed #ccc;
      text-align: center;
    }
    .builder p {
      font-size: 1.1rem;
    }
    .builder .selected-genres {
      margin-top: 1rem;
      font-weight: bold;
      color: #8e44ad;
    }
    button.save-btn {
      margin-top: 1.5rem;
      padding: 0.75rem 2rem;
      background: #27ae60;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
    }
    footer {
      text-align: center;
      padding: 1rem;
      background: #8e44ad;
      color: white;
      margin-top: 3rem;
    }
  </style>
</head>
<body>

<header>
  Genre Explorer
</header>

<div class="container">
  <h2>Choose Genres</h2>
  <div class="genres" id="genreList">
    <div class="genre" data-genre="Comedy">Comedy</div>
    <div class="genre" data-genre="Horror">Horror</div>
    <div class="genre" data-genre="Action">Action</div>
    <div class="genre" data-genre="Romance">Romance</div>
    <div class="genre" data-genre="Thriller">Thriller</div>
    <div class="genre" data-genre="Fantasy">Fantasy</div>
    <div class="genre" data-genre="Sci-Fi">Sci-Fi</div>
    <div class="genre" data-genre="Documentary">Documentary</div>
  </div>

  <h2>Select Mood</h2>
  <div class="moods" id="moodList">
    <div class="mood" data-mood="Funny">Funny</div>
    <div class="mood" data-mood="Chilling">Chilling</div>
    <div class="mood" data-mood="Exciting">Exciting</div>
    <div class="mood" data-mood="Heartwarming">Heartwarming</div>
    <div class="mood" data-mood="Dark">Dark</div>
    <div class="mood" data-mood="Adventurous">Adventurous</div>
  </div>

  <form method="POST" id="mixForm">
    <div class="builder">
      <p>Hybrid Genre Builder:</p>
      <div class="selected-genres" id="selectedGenres">
        (None Selected)
      </div>
      <input type="hidden" name="saveMix" value="1">
      <input type="hidden" name="genres[]" id="genresInput">
      <input type="hidden" name="moods[]" id="moodsInput">
      <button type="submit" class="save-btn">Save Custom Mix</button>
    </div>
  </form>
</div>

<footer>
  &copy; 2025 Media Catalog - Genre Filtering
</footer>

<script src="validation.js"></script>
<script>
  const selected = {
    genres: [],
    moods: []
  };

  document.querySelectorAll('.genre').forEach(genre => {
    genre.addEventListener('click', () => {
      const value = genre.getAttribute('data-genre');
      genre.classList.toggle('selected');
      if (selected.genres.includes(value)) {
        selected.genres = selected.genres.filter(g => g !== value);
      } else {
        selected.genres.push(value);
      }
      updateBuilder();
    });
  });

  document.querySelectorAll('.mood').forEach(mood => {
    mood.addEventListener('click', () => {
      const value = mood.getAttribute('data-mood');
      mood.classList.toggle('selected');
      if (selected.moods.includes(value)) {
        selected.moods = selected.moods.filter(m => m !== value);
      } else {
        selected.moods.push(value);
      }
      updateBuilder();
    });
  });

  function updateBuilder() {
    const builder = document.getElementById('selectedGenres');
    if (selected.genres.length === 0 && selected.moods.length === 0) {
      builder.innerHTML = "(None Selected)";
    } else {
      builder.innerHTML = selected.genres.concat(selected.moods).join(' + ');
    }
    document.getElementById('genresInput').value = selected.genres;
    document.getElementById('moodsInput').value = selected.moods;
  }
</script>

</body>
</html>
