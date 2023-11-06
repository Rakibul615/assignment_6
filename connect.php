<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=assignment_6", "root");
} catch (PDOException $e) {
    echo "Error connecting to MySQL database: " . $e->getMessage();
}

