<?php
require_once __DIR__ . '/db.php';

function createUser($fullname, $email, $password) {
    if (empty($fullname) || empty($email) || empty($password)) {
        throw new InvalidArgumentException("All fields are required");
    }

    $db = db_connect();

    if (emailExists($email, $db)) {
        throw new Exception("Email already registered");
    }

    $query = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement");
    }

    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        $id = mysqli_insert_id($db);
        mysqli_stmt_close($stmt);
        return [
            'id' => $id,
            'fullname' => $fullname,
            'email' => $email,
            'role' => 'user'
        ];
    } else {
        mysqli_stmt_close($stmt);
        throw new Exception("Registration failed. Please try again.");
    }
}

function login($email, $password) {
    $db = db_connect();

    $query = "SELECT id, fullname, email, password, role FROM users WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if ($user && $password === $user['password']) { 
        unset($user['password']);
        return $user;
    }

    return false;
}

function emailExists($email, $db = null) {
    if ($db === null) {
        $db = db_connect();
    }

    $query = "SELECT id FROM users WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    if (!$stmt) {
        throw new Exception("Email verification service unavailable");
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $exists = mysqli_fetch_assoc($result) !== null;

    mysqli_stmt_close($stmt);

    return $exists;
}

function getUserById($id) {
    $db = db_connect();

    $query = "SELECT id, fullname, email, role FROM users WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    if (!$stmt) {
        throw new Exception("User lookup failed.");
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $user;
}

function getAllUsers() {
    $db = db_connect();

    $query = "SELECT id, fullname, email, role FROM users ORDER BY id ASC";
    $result = mysqli_query($db, $query);

    if (!$result) {
        error_log("Database error: " . mysqli_error($db));
        return [];
    }

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    mysqli_free_result($result);

    return $users;
}

function deleteUser($userIdToDelete, $currentAdminId) {
    $db = db_connect();

    if ($userIdToDelete == $currentAdminId) {
        return ['success' => false, 'message' => 'Cannot delete your own admin account'];
    }

    $checkQuery = "SELECT id FROM users WHERE id = ? AND role != 'admin'";
    $stmt = mysqli_prepare($db, $checkQuery);
    if (!$stmt) {
        return ['success' => false, 'message' => 'Database error'];
    }

    mysqli_stmt_bind_param($stmt, "i", $userIdToDelete);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        mysqli_stmt_close($stmt);
        return ['success' => false, 'message' => 'Admin users cannot be deleted'];
    }

    mysqli_stmt_close($stmt);

    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $deleteStmt = mysqli_prepare($db, $deleteQuery);
    if (!$deleteStmt) {
        return ['success' => false, 'message' => 'Database error'];
    }

    mysqli_stmt_bind_param($deleteStmt, "i", $userIdToDelete);
    $success = mysqli_stmt_execute($deleteStmt);
    mysqli_stmt_close($deleteStmt);

    if ($success) {
        return ['success' => true, 'message' => 'User deleted successfully'];
    } else {
        return ['success' => false, 'message' => 'Database error'];
    }
}
?>
