<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if(isset($_POST['submit'])){

$name = $_POST['name'];
$price = $_POST['price'];
$qty = $_POST['quantity'];

$sql = "INSERT INTO products (name, price, quantity)
VALUES ('$name','$price','$qty')";

$conn->query($sql);

header("Location: index.php");
exit();

}
?>
