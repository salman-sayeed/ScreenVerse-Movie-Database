<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../model/users.php'; // This pulls in your procedural users.php

$errors = [];
$successMessage = '';
$fullname = '';
$email = '';
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trim and collect form inputs
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = 'user'; // Since we're adding a normal user from admin

    // ===== Server-side Validation =====
    if (empty($fullname)) {
        $errors['fullname'] = 'Full name is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } elseif (emailExists($email)) {
        // emailExists() is your procedural function in users.php
        $errors['email'] = 'Email already exists';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Please confirm your password';
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // ===== If no validation errors, attempt to create user =====
    if (empty($errors)) {
        try {
            // createUser returns an array on success or throws Exception on error
            $newUser = createUser($fullname, $email, $password);
            if ($newUser) {
                $_SESSION['success'] = 'User added successfully!';
                header('Location: admindb.php');
                exit();
            } else {
                // In theory createUser should return false only if insert fails silently
                $errors['general'] = 'Failed to add user. Please try again.';
            }
        } catch (Exception $e) {
            // If createUser throws (e.g. duplicate email), capture it here
            $errors['general'] = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Screenverse | Add New User</title>
    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css" />
    <link
        rel="stylesheet"
        href="../../assets/salmansayeed/adduser/adduser-style.css"
    />
</head>
<body>
    <?php include('navbar.php') ?>

    <div class="content-container">
        <div class="adduser-container">
            <h2>Add New User</h2>
            
            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert success">
                    <?php 
                        echo htmlspecialchars($_SESSION['success']); 
                        unset($_SESSION['success']); 
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($errors['general'])): ?>
                <div class="alert error">
                    <?php echo htmlspecialchars($errors['general']); ?>
                </div>
            <?php endif; ?>

            <form id="addUserForm" method="POST" novalidate>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input
                        type="text"
                        id="fullname"
                        name="fullname"
                        value="<?php echo htmlspecialchars($fullname); ?>"
                    />
                    <?php if (isset($errors['fullname'])): ?>
                        <span class="error-message"><?php echo htmlspecialchars($errors['fullname']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?php echo htmlspecialchars($email); ?>"
                    />
                    <?php if (isset($errors['email'])): ?>
                        <span class="error-message"><?php echo htmlspecialchars($errors['email']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                    />
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-message"><?php echo htmlspecialchars($errors['password']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                    />
                    <?php if (isset($errors['confirm_password'])): ?>
                        <span class="error-message"><?php echo htmlspecialchars($errors['confirm_password']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Add User</button>
                    <a href="admindb.php" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <?php include('footer.php') ?>

    <script src="../../assets/salmansayeed/main-script.js"></script>
    <script src="../../assets/salmansayeed/adduser/adduser-script.js"></script>
</body>
</html>
