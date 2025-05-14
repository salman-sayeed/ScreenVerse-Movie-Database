<?php
session_start();

// Set a demo recovery number for validation
if (!isset($_SESSION['recovery_number'])) {
    $_SESSION['recovery_number'] = '123456'; // Example static number
}

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve input
    $inputRecovery = htmlspecialchars(trim($_POST['recovery-number'] ?? ''));
    $newPassword = trim($_POST['new-password'] ?? '');
    $confirmPassword = trim($_POST['confirm-password'] ?? '');

    // Server-side validation
    if ($inputRecovery !== $_SESSION['recovery_number']) {
        $errorMessage = 'Invalid recovery number.';
    } elseif (empty($newPassword)) {
        $errorMessage = 'Password cannot be empty.';
    } elseif (strlen($newPassword) < 6) {
        $errorMessage = 'Password must be at least 6 characters long.';
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        // In real apps, hash and save to DB — here we store in session
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
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #ff9966, #ff5e62);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .reset-container {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .message {
      padding: 0.8rem;
      margin-bottom: 1rem;
      border-radius: 5px;
      text-align: center;
      font-weight: bold;
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

    label {
      font-weight: bold;
      margin-top: 1rem;
    }

    input {
      width: 100%;
      padding: 0.8rem;
      margin-top: 0.3rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 0.8rem;
      background: #28a745;
      border: none;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #218838;
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

    <button type="submit">Update Password</button>
  </form>
</div>

</body>
</html>
