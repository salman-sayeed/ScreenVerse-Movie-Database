<?php
session_start();

$name = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

    // Basic validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // If no errors, proceed to next page or success message
    if (empty($errors)) {
        // Example: set session (optional)
        $_SESSION['signup_success'] = true;
        header("Location: verify-email.html"); // Simulate email verification step
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup</title>
  <style>
    /* Your existing CSS here (unchanged) */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
        font-family:eva, Verdana, sans-serif;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .signup-container {
      background: white;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      padding: 2rem;
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .error {
      color: red;
      margin-bottom: 1rem;
      font-size: 0.9rem;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 0.5rem;
      font-weight: 600;
    }

    input {
      padding: 0.9rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      border-color: #6a11cb;
      outline: none;
    }

    button {
      padding: 0.9rem;
      background-color: #6a11cb;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 0.5rem;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #4a0da1;
    }

    .link-group {
      margin-top: 1rem;
      font-size: 0.9rem;
      text-align: center;
    }

    .link-group a {
      color: #2575fc;
      text-decoration: none;
    }

    .link-group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="signup-container">
  <h2>Create Account</h2>

  <?php
    if (!empty($errors)) {
        echo "<div class='error'>";
        foreach ($errors as $err) {
            echo htmlspecialchars($err) . "<br>";
        }
        echo "</div>";
    }
  ?>

  <form method="post">
    <label for="signup-name">Full Name</label>
    <input type="text" id="signup-name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

    <label for="signup-email">Email</label>
    <input type="email" id="signup-email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

    <label for="signup-password">Password</label>
    <input type="password" id="signup-password" name="password" required>

    <button type="submit">Sign Up</button>
  </form>

  <div class="link-group">
    Already have an account? <a href="login.html">Login</a>
  </div>
</div>

</body>
</html>
