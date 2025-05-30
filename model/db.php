<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'screenverse'; // Change to your actual DB name
    private $username = 'root';         // Default XAMPP username
    private $password = '';             // Default XAMPP password (empty)
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch(PDOException $e) {
            // Log to server error log
            error_log("DB Connection Error: " . $e->getMessage());
            
            // Throw more user-friendly message
            throw new Exception("Database connection failed. Please try again later.");
        }

        return $this->conn;
    }
}
?>