<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Kunin ang ID mula URL
$id = $_GET['id'];

// Kunin ang existing data
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$row = $result->fetch_assoc();

// Kapag submit
if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    // Update query
    $sql = "UPDATE products 
            SET name='$name', price='$price', quantity='$qty'
            WHERE id=$id";

    if($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">CRUD System</a>
        <div>
            <a class="btn btn-light me-2" href="about-project.php">About Project</a>
            <a class="btn btn-light me-2" href="developers.php">Developers</a>
            <a class="btn btn-outline-light" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-5">

    <h2 class="text-center mb-4">Edit Product</h2>

    <div class="card p-4" style="max-width: 600px; margin: auto;">

        <form method="POST">

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>">
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($row['price']) ?>">
            </div>

            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($row['quantity']) ?>">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" name="update" class="btn btn-warning">Update Product</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
