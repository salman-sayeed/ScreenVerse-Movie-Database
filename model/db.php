<?php
function db_connect() {
    $host = 'localhost';
    $db_name = 'screenverse';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO(
            "mysql:host=$host;dbname=$db_name",
            $username,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $conn;
    } catch (PDOException $e) {
        error_log("DB Connection Error: " . $e->getMessage());
        throw new Exception("Database connection failed. Please try again later.");
    }
}
?>
