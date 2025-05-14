<?php
session_start();

// Default role is 'user'
if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'user';
}

// Handle form submission for role assignment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['assign'])) {
    $newRole = $_POST['role'];
    $_SESSION['role'] = $newRole;
}

$currentRole = $_SESSION['role'];
function isRole($role) {
    return $_SESSION['role'] === $role;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Role-Based Access</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #eef1f5;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    h2, h3 {
      color: #2c3e50;
    }

    .nav {
      display: flex;
      gap: 1.5rem;
      margin-bottom: 2rem;
      padding: 1rem 0;
      border-bottom: 2px solid #ddd;
    }

    .nav a {
      text-decoration: none;
      color: #34495e;
      font-weight: bold;
      position: relative;
    }

    .hidden {
      display: none;
    }

    .role-info {
      background: #ecf9f0;
      padding: 1rem;
      border-left: 6px solid #4caf50;
      margin-bottom: 2rem;
      border-radius: 6px;
    }

    .accordion {
      border: none;
      background: #4caf50;
      color: white;
      padding: 1rem;
      font-size: 1rem;
      font-weight: bold;
      width: 100%;
      text-align: left;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 1rem;
    }

    .panel {
      padding: 1rem;
      background: #f9f9f9;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-top: 0.5rem;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 1rem;
    }

    select {
      width: 100%;
      max-width: 300px;
      padding: 0.5rem;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-top: 0.3rem;
    }

    button.assign-btn {
      margin-top: 1rem;
      padding: 0.6rem 1.2rem;
      background-color: #2196f3;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button.assign-btn:hover {
      background-color: #1976d2;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Role-Based Access</h2>

  <!-- Navigation -->
  <div class="nav">
    <?php if (isRole('admin') || isRole('editor') || isRole('user')): ?>
      <a href="#">Home</a>
    <?php endif; ?>
  </div>

  <!-- Current Role Info -->
  <div class="role-info">
    Logged in as: <strong><?php echo ucfirst($currentRole); ?></strong>
  </div>

  <!-- Permission Settings -->
  <?php if (isRole('admin')): ?>
    <button class="accordion">Permission Settings</button>
    <div class="panel">
      <h3>Assign Roles</h3>
      <form method="post">
        <label for="userSelect">Select User</label>
        <select name="user" id="userSelect">
          <option>Alice</option>
          <option>Bob</option>
          <option>Charlie</option>
        </select>

        <label for="roleSelect">Assign Role</label>
        <select name="role" id="roleSelect">
          <option value="admin">Admin</option>
          <option value="editor">Editor</option>
          <option value="user">User</option>
        </select>

        <button type="submit" name="assign" class="assign-btn">Assign Role</button>
      </form>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
