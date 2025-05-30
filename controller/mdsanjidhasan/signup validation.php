<?php
session_start();

$name = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password = $_POST["password"] ?? '';

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
        $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');

        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Use prepared statement for checking existing email
        $checkStmt = mysqli_prepare($con, "SELECT id FROM users WHERE email = ?");
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_store_result($checkStmt);

        if (mysqli_stmt_num_rows($checkStmt) > 0) {
            $errors[] = "An account with this email already exists.";
            mysqli_stmt_close($checkStmt);
        } else {
            mysqli_stmt_close($checkStmt);

            // Hash the password before storing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statement for insert
            $insertStmt = mysqli_prepare($con, "INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($insertStmt, "sss", $name, $hashedPassword, $email);

            if (mysqli_stmt_execute($insertStmt)) {
                $_SESSION['signup_success'] = true;
                mysqli_stmt_close($insertStmt);
                mysqli_close($con);
                header("Location: ../../view/mdsanjidhasan/verify-email.html");
                exit();
            } else {
                $errors[] = "Error inserting user: " . mysqli_error($con);
                mysqli_stmt_close($insertStmt);
            }
        }

        mysqli_close($con);
    }

    $_SESSION['signup_errors'] = $errors;
    header("Location: ../../view/mdsanjidhasan/singup.php");
    exit();
}
?>
