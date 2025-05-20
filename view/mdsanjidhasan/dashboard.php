<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'Guest';
    $_SESSION['role'] = 'user'; }

$widgetAlert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['stats'])) {
        $widgetAlert = 'Viewing user stats...';
    } elseif (isset($_POST['tickets'])) {
        $widgetAlert = 'Opening ticket analytics...';
    } elseif (isset($_POST['sessions'])) {
        $widgetAlert = 'Showing session data...';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home Dashboard</title>
  <style>
    a {
      text-decoration: none;
      color: inherit;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
    }

    .header {
      background: #2c3e50;
      color: #fff;
      padding: 1.5rem 2rem;
      font-size: 1.6rem;
    }

    .container {
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    h2 {
      color: #34495e;
      margin-bottom: 1rem;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .widget {
      background: white;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
    }

    .widget h3 {
      margin: 0;
      font-size: 1.2rem;
      color: #2c3e50;
    }

    .widget p {
      margin-top: 0.5rem;
      font-size: 1.4rem;
      color: #27ae60;
      font-weight: bold;
    }

    .quick-actions {
      margin-top: 3rem;
    }

    .action-button {
      display: block;
      width: 100%;
      max-width: 400px;
      background-color: #3498db;
      color: white;
      border: none;
      padding: 0.8rem 1.2rem;
      margin: 0.5rem 0;
      border-radius: 8px;
      text-align: left;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    .action-button:hover {
      background-color: #2980b9;
    }

    .info-panel {
      background: #fff3cd;
      color: #856404;
      border: 1px solid #ffeeba;
      padding: 1rem;
      margin-top: 1rem;
      border-radius: 6px;
    }

    .user-badge {
      float: right;
      font-size: 1rem;
      color: #bdc3c7;
    }
  </style>
</head>
<body>

  <div class="header">
    Home Dashboard
    <span class="user-badge">Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?></span>
  </div>

  <div class="container">

    <h2>Analytics Overview</h2>
    <form method="post">
      <div class="grid">
        <div class="widget">
          <button type="submit" name="stats" style="all:unset;cursor:pointer;width:100%;">
            <h3>Total Users</h3>
            <p>1,230</p>
          </button>
        </div>
        <div class="widget">
          <button type="submit" name="tickets" style="all:unset;cursor:pointer;width:100%;">
            <h3>Open Tickets</h3>
            <p>45</p>
          </button>
        </div>
        <div class="widget">
          <button type="submit" name="sessions" style="all:unset;cursor:pointer;width:100%;">
            <h3>Active Sessions</h3>
            <p>102</p>
          </button>
        </div>
      </div>
    </form>

    <?php if ($widgetAlert): ?>
      <div class="info-panel"><?php echo $widgetAlert; ?></div>
    <?php endif; ?>

    <div class="quick-actions">
      <h2>Quick Actions</h2>
      <a href="reset password.php"><button class="action-button">Reset Password</button></a>
      <a href="profile management.php"><button class="action-button">Profile Management</button></a>
      <a href="login.php"><button class="action-button">Log Out</button></a>
    </div>
  </div>

</body>
</html>
