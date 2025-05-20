<?php
session_start();
include_once '../../controller/mdsanjidhasan/profile management validation.php';
if (!isset($_SESSION['profile'])) {
    $_SESSION['profile'] = [
        'name' => 'John Doe',
        'address' => '123 Main Street, City, Country',
        'email' => 'john@example.com',
        'phone' => '+1234567890',
        'bio' => 'Web developer with a passion for creating amazing UIs.'
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_profile'])) {
    $_SESSION['profile']['name'] = $_POST['name'];
    $_SESSION['profile']['address'] = $_POST['address'];
    $_SESSION['profile']['email'] = $_POST['email'];
    $_SESSION['profile']['phone'] = $_POST['phone'];
    $_SESSION['profile']['bio'] = $_POST['bio'];
}

$password_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_password'])) {
    $password_message = 'Password updated successfully (mock message).';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Manager</title>
  <style>
    * { box-sizing: border-box; }
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      padding: 2rem;
      display: flex;
      justify-content: center;
    }
    .profile-container {
      width: 100%;
      max-width: 850px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .tabs { display: flex; background: #f7f7f7; border-bottom: 2px solid #ddd; }
    .tabs a {
      flex: 1; padding: 1rem; text-align: center;
      font-weight: bold; text-decoration: none; color: #333;
      background: #f7f7f7; transition: background 0.3s;
    }
    .tabs a:hover { background-color: #e0e0e0; }
    .tab-content { padding: 2rem; }
    .profile-pic {
      text-align: center; margin-bottom: 1rem;
    }
    .profile-pic img {
      width: 150px; height: 150px; border-radius: 50%;
      object-fit: cover; border: 3px solid #4a90e2;
    }
    .form-group { margin-bottom: 1rem; }
    .form-group label {
      display: block; font-weight: 600; margin-bottom: 0.4rem;
    }
    .form-group input, .form-group textarea {
      width: 100%; padding: 0.8rem; border: 1px solid #ccc; border-radius: 6px;
    }
    .button-row { display: flex; gap: 1rem; }
    .button-row button {
      flex: 1; padding: 0.9rem; font-weight: bold;
      border: none; border-radius: 6px; color: white;
      font-size: 1rem; cursor: pointer;
    }
    .save-btn { background-color: #28a745; }
    .reset-btn { background-color: #dc3545; }
    .view-details p { margin: 0.5rem 0; }
    h2 { margin-bottom: 1rem; color: #333; }
    .message { color: green; font-weight: bold; margin-top: 1rem; }
  </style>
</head>
<body>

<div class="profile-container">

  <div class="tabs">
    <a href="?tab=view">View Profile</a>
    <a href="?tab=edit">Edit Profile</a>
    <a href="?tab=password">Update Password</a>
  </div>

  <div class="tab-content">
    <?php
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'view';

    if ($tab === 'edit') {
    ?>
      <h2>Edit Profile</h2>
      <form method="post">
        <div class="profile-pic">
          <img src="https://via.placeholder.com/150" alt="Avatar">
        </div>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" name="name" value="<?php echo $_SESSION['profile']['name']; ?>" />
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" value="<?php echo $_SESSION['profile']['address']; ?>" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $_SESSION['profile']['email']; ?>" />
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" value="<?php echo $_SESSION['profile']['phone']; ?>" />
        </div>
        <div class="form-group">
          <label for="bio">Bio</label>
          <textarea name="bio" rows="3"><?php echo $_SESSION['profile']['bio']; ?></textarea>
        </div>
        <div class="button-row">
          <button type="submit" name="save_profile" class="save-btn">Save</button>
          <button type="reset" class="reset-btn">Reset</button>
        </div>
      </form>
    <?php
    } elseif ($tab === 'password') {
    ?>
      <h2>Change Password</h2>
      <form method="post">
        <div class="form-group">
          <label for="current">Current Password</label>
          <input type="password" name="current">
        </div>
        <div class="form-group">
          <label for="new">New Password</label>
          <input type="password" name="new">
        </div>
        <div class="form-group">
          <label for="confirm">Confirm Password</label>
          <input type="password" name="confirm">
        </div>
        <div class="button-row">
          <button type="submit" name="update_password" class="save-btn">Update</button>
          <button type="reset" class="reset-btn">Clear</button>
        </div>
        <?php if ($password_message !== '') echo "<div class='message'>$password_message</div>"; ?>
      </form>
    <?php
    } else {
    ?>
      <h2>Profile Overview</h2>
      <div class="profile-pic">
        <img src="https://via.placeholder.com/150" alt="Avatar">
      </div>
      <div class="view-details">
        <p><strong>Name:</strong> <?php echo $_SESSION['profile']['name']; ?></p>
        <p><strong>Address:</strong> <?php echo $_SESSION['profile']['address']; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['profile']['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $_SESSION['profile']['phone']; ?></p>
        <p><strong>Bio:</strong> <?php echo $_SESSION['profile']['bio']; ?></p>
      </div>
    <?php } ?>
  </div>
</div>

</body>
<script src="profile management/profilemanagement.js"></script>
</html>
