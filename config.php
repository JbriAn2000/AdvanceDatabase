<?php
session_start();

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'saliringdatabase';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $temp = new mysqli($host, $dbUser, $dbPass);
    if ($temp->connect_error) {
        throw new Exception('MySQL connection failed: ' . $temp->connect_error);
    }

    $temp->query("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    $temp->close();

    $conn = new mysqli($host, $dbUser, $dbPass, $dbName);
    $conn->set_charset('utf8mb4');

    $conn->query("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB");
} catch (Exception $e) {
    die('Database error: ' . $e->getMessage());
}
