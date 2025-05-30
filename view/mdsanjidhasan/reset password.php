<?php
include_once '../../controller/mdsanjidhasan/reset password validation.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reset Password</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #43cea2, #185a9d);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .reset-container {
      background: #fff;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: #444;
    }

    input {
      padding: 0.9rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input:focus {
      border-color: #43cea2;
      outline: none;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 1rem;
    }

    button {
      flex: 1;
      padding: 0.9rem;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      color: white;
    }

    .submit-btn {
      background-color: #28a745;
    }

    .submit-btn:hover {
      background-color: #218838;
    }

    .reset-btn {
      background-color: #dc3545;
    }

    .reset-btn:hover {
      background-color: #c82333;
    }

    .message {
      margin-bottom: 1rem;
      padding: 0.8rem;
      border-radius: 6px;
      font-weight: bold;
      text-align: center;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>

<div class="reset-container">
  <h2>Reset Password</h2>

  <?php if ($success): ?>
    <div class="message success"><?php echo $success; ?></div>
  <?php elseif ($error): ?>
    <div class="message error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="post">
    <label for="current-password">Current Password</label>
    <input type="password" id="current-password" name="current-password" required>

    <label for="new-password">New Password</label>
    <input type="password" id="new-password" name="new-password" required>

    <label for="confirm-password">Confirm Password</label>
    <input type="password" id="confirm-password" name="confirm-password" required>

    <div class="button-group">
      <button type="submit" class="submit-btn">Submit</button>
      <button type="reset" class="reset-btn">Reset</button>
    </div>
  </form>
</div>

</body>
<script src="../../assets/mdsanjidhasan/resetvalidation.js"></script>
</html>
