<?php
// config.php

// 🔌 Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_inventory";

// Gumawa ng connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check kung successful ang connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>