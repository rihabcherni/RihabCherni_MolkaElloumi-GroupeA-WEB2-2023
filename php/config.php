<?php 
    $user = "root";
    $pass = ""; 
    $dsn = "mysql:host=localhost;dbname=student_db;charset=utf8mb4";

    try {
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die( "Connection failed: " . $e->getMessage());
    }
?>
