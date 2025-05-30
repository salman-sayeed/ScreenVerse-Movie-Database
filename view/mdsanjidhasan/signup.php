<?php
include_once '../../controller/mdsanjidhasan/signupvalidation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Signup Page</title>
    <link rel="stylesheet" href="../../assets/mdsanjidhasan/signup.css">
</head>
<body>
    <div class="container">
        <h2>Create an Account</h2>
        
        <?php if ($success): ?>
            <div class="success-message">
                Registration successful! You can now <a href="login.php">login</a>.
            </div>
        <?php endif; ?>
        
        <?php if (isset($errors['general'])): ?>
            <div class="error-message" style="color: red; text-align: center; margin-bottom: 1rem;">
                <?php echo $errors['general']; ?>
            </div>
        <?php endif; ?>
        
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" 
                       value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>"/>
                <?php if (isset($errors['fullname'])): ?>
                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo $errors['fullname']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
                <?php if (isset($errors['email'])): ?>
                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"/>
                <?php if (isset($errors['password'])): ?>
                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo $errors['password']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password"/>
                <?php if (isset($errors['confirm_password'])): ?>
                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo $errors['confirm_password']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="signup-btn">Sign Up</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
            
            <div class="login-link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
    </div>
    <script src="../../assets/mdsanjidhasan/signupvalidation.js"></script>
</body>
</html>