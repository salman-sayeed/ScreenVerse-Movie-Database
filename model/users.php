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

    try {
        $query = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Plain text, consider hashing

        if ($stmt->execute()) {
            return [
                'id' => $db->lastInsertId(),
                'fullname' => $fullname,
                'email' => $email,
                'role' => 'user'
            ];
        }
        return false;
    } catch (PDOException $e) {
        error_log("User creation failed: " . $e->getMessage());
        throw new Exception("Registration failed. Please try again.");
    }
}

function login($email, $password) {
    $db = db_connect();

    $query = "SELECT id, fullname, email, password, role FROM users WHERE email = :email LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {  // Note: consider password hashing verification
        unset($user['password']);
        return $user;
    }
    return false;
}

function emailExists($email, $db = null) {
    if ($db === null) {
        $db = db_connect();
    }

    try {
        $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch() !== false;
    } catch (PDOException $e) {
        error_log("Email check failed: " . $e->getMessage());
        throw new Exception("Email verification service unavailable");
    }
}

function getUserById($id) {
    $db = db_connect();

    try {
        $query = "SELECT id, fullname, email, role FROM users WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Failed to get user $id: " . $e->getMessage());
        throw new Exception("User lookup failed.");
    }
}

function getAllUsers() {
    $db = db_connect();

    try {
        $query = "SELECT id, fullname, email, role FROM users ORDER BY id ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}

function deleteUser($userIdToDelete, $currentAdminId) {
    $db = db_connect();

    try {
        if ($userIdToDelete == $currentAdminId) {
            return ['success' => false, 'message' => 'Cannot delete your own admin account'];
        }

        $checkQuery = "SELECT id FROM users WHERE id = ? AND role != 'admin'";
        $checkStmt = $db->prepare($checkQuery);
        $checkStmt->execute([$userIdToDelete]);

        if ($checkStmt->rowCount() === 0) {
            return ['success' => false, 'message' => 'Admin users cannot be deleted'];
        }

        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $deleteStmt = $db->prepare($deleteQuery);
        $deleteStmt->execute([$userIdToDelete]);

        return ['success' => true, 'message' => 'User deleted successfully'];
    } catch (PDOException $e) {
        error_log("Delete user error: " . $e->getMessage());
        return ['success' => false, 'message' => 'Database error'];
    }
}
?>
