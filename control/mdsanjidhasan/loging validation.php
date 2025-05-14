<?php
session_start();

// Dummy credentials (replace with DB validation in real use)
$validEmail = "user@example.com";
$validPassword = "123456";

// Handle logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    setcookie('status', '', time() - 3600, "/");
    header("Location: index.php");
    exit();
}

// Handle login POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if ($email === $validEmail && $password === $validPassword) {
        $_SESSION['email'] = $email;

        if ($remember) {
            setcookie('status', 'loggedin', time() + (86400 * 7), "/"); // 7 days
        } else {
            setcookie('status', 'loggedin', 0, "/"); // session cookie
        }

        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }
}
?>

<?php if (isset($_COOKIE['status'])): ?>
<!-- HOME PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome Home, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
    <a href="?action=logout">Logout</a>
</body>
</html>

<?php else: ?>
<!-- LOGIN PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .checkbox-group {
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        button {
            flex: 1;
            padding: 0.9rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }

        .login-btn {
            background-color: #6a11cb;
            color: white;
        }

        .reset-btn {
            background-color: #e0e0e0;
            color: #333;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login page</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password"/>
            </div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="remember" /> Remember me</label>
            </div>
            <div class="btn-group">
                <button type="submit" class="login-btn">Login</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php endif; ?>
