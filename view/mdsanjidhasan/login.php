<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header('Location: ' . 
        ($_SESSION['user']['role'] === 'admin' 
            ? '../../view/salmansayeed/admindb.php' 
            : '../../view/mdsanjidhasan/dashboard.php'
        )
    );
    exit();
}
?>
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
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6a11cb;
            outline: none;
        }

        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .forgot-password {
            color: #2575fc;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
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
            transition: background 0.3s ease;
        }

        .login-btn {
            background-color: #6a11cb;
            color: white;
        }

        .reset-btn {
            background-color: #e0e0e0;
            color: #333;
        }

        .login-btn:hover {
            background-color: #4b0f9e;
        }

        .reset-btn:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login page</h2>
        
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message">
                <?= htmlspecialchars($_SESSION['login_error']) ?>
                <?php unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="../../controller/mdsanjidhasan/login validation.php" method="post">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] = bin2hex(random_bytes(32)) ?>">
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <div class="checkbox-group">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="forget_password.php" class="forgot-password">Forgot Password?</a>
                New user? <a href="signup.php">Sign up</a>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="login-btn">Login</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
    <script src="../../assets/mdsanjidhasan/login_validation.js"></script>
</body>
</html>