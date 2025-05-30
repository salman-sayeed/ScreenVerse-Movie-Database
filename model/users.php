<?php
require_once __DIR__ . '/db.php';

class User {
    private $db;

    public function __construct() {
        try {
            $this->db = (new Database())->connect();
        } catch (Exception $e) {
            // Re-throw with more context
            throw new Exception("User service unavailable. Please try again later.");
        }
    }

    public function createUser($fullname, $email, $password) {
        // Validate input
        if (empty($fullname) || empty($email) || empty($password)) {
            throw new InvalidArgumentException("All fields are required");
        }

        try {
            // Check if email exists first
            if ($this->emailExists($email)) {
                throw new Exception("Email already registered");
            }

            $query = "INSERT INTO users (fullname, email, password) 
                     VALUES (:fullname, :email, :password)";
            
            $stmt = $this->db->prepare($query);
            
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
            $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                return [
                    'id' => $this->db->lastInsertId(),
                    'fullname' => $fullname,
                    'email' => $email,
                    'role' => 'user' // Default role
                ];
            }
            
            return false;
        } catch (PDOException $e) {
            error_log("User creation failed: " . $e->getMessage());
            throw new Exception("Registration failed. Please try again.");
        }
    }

    public function emailExists($email) {
        try {
            $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch() !== false;
        } catch (PDOException $e) {
            error_log("Email check failed: " . $e->getMessage());
            throw new Exception("Email verification service unavailable");
        }
    }
}
?>