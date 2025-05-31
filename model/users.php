<?php
require_once __DIR__ . '/db.php';

class User {
    private $db;

    public function __construct() {
        try {
            $this->db = (new Database())->connect();
        } catch (Exception $e) {
            throw new Exception("User service unavailable. Please try again later.");
        }
    }

    public function createUser($fullname, $email, $password) {
        if (empty($fullname) || empty($email) || empty($password)) {
            throw new InvalidArgumentException("All fields are required");
        }

        try {
            if ($this->emailExists($email)) {
                throw new Exception("Email already registered");
            }

            $query = "INSERT INTO users (fullname, email, password) 
                     VALUES (:fullname, :email, :password)";
            
            $stmt = $this->db->prepare($query);
            
            // Store plain text password (INSECURE)
            $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Plain text
            
            if ($stmt->execute()) {
                return [
                    'id' => $this->db->lastInsertId(),
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

    public function login($email, $password) {
        $query = "SELECT id, fullname, email, password, role FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Compare plain text passwords (INSECURE)
        if ($user && $password === $user['password']) {
            unset($user['password']);
            return $user;
        }
        
        return false;
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

        /* By iyd */
    public function getUserById($id) {
        try {
            $query = "SELECT id, fullname, email, role FROM users WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Failed to get user $id: " . $e->getMessage());
            throw new Exception("User lookup failed.");
        }
    }

    public function getAllUsers() {
    try {
        $query = "SELECT id, fullname, email, role FROM users ORDER BY id ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}
}
?>