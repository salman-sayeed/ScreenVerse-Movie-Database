<?php
session_start();

// Example recovery number for demonstration
if (!isset($_SESSION['recovery_number'])) {
    $_SESSION['recovery_number'] = '123456';
}

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputRecovery = $_POST['recovery-number'] ?? '';
    $newPassword = $_POST['new-password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Validate inputs
    if ($inputRecovery !== $_SESSION['recovery_number']) {
        $errorMessage = 'Invalid recovery number.';
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } elseif ($newPassword === '') {
        $errorMessage = 'Password cannot be empty.';
    } else {
        // Save the new password (for demonstration, just set a session variable)
        $_SESSION['user_password'] = $newPassword;
        $successMessage = 'Password successfully updated!';
    }
}
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
      background: linear-gradient(to right, #ff9966, #ff5e62);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .reset-container {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #444;
    }

    input {
      padding: 0.9rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      border-color: #ff5e62;
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
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      color: white;
      font-size: 1rem;
      transition: background-color 0.3s ease;
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

  <?php if ($successMessage): ?>
    <div class="message success"><?php echo $successMessage; ?></div>
  <?php elseif ($errorMessage): ?>
    <div class="message error"><?php echo $errorMessage; ?></div>
  <?php endif; ?>

  <form method="post">
    <label for="recovery-number">Recovery Number</label>
    <input type="text" id="recovery-number" name="recovery-number" required>

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
</html>
