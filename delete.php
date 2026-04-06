<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Kunin ang ID
$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM products WHERE id=$id";

if($conn->query($sql)) {
    // Redirect pabalik
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
