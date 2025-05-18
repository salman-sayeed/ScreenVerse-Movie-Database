<?php
session_start();

$name = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Trim and collect input
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

    // Server-side validation
    if ($name === "" || strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters.";
    }

    if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if ($password === "" || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if (empty($errors)) {
        // Connect to the database
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');

        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Check if email already exists
        $checkQuery = "SELECT * FROM users WHERE email = '{$email}'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $errors[] = "An account with this email already exists.";
        } else {
            // Insert new user
            $insertQuery = "INSERT INTO users VALUES (NULL, '{$name}', '{$password}', '{$email}')";
            if (mysqli_query($con, $insertQuery)) {
                $_SESSION['signup_success'] = true;
                header("Location: verify-email.html");
                exit();
            } else {
                $errors[] = "Error inserting user: " . mysqli_error($con);
            }
        }

        mysqli_close($con);
    }

    // Store errors in session and redirect back if needed
    $_SESSION['signup_errors'] = $errors;
    header("Location: signup.html");
    exit();
}
?>
