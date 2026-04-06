<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #2c3e50;

            background-image: url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: -1;
        }

        
        .navbar {
            background-color: rgba(31, 45, 61, 0.9) !important;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff !important;
        }

        /* Title */
        h2 {
            font-weight: 600;
            color: #ffffff;
        }

        p.text-muted {
            color: #dcdcdc !important;
        }

        
        .card {
            border: none;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        
        .form-label {
            font-weight: 500;
        }

        
        .btn-primary {
            background-color: #2c3e50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1a252f;
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
            color: #fff;
        }

        .btn-danger {
            background-color: #c0392b;
            border: none;
        }

        /* TABLE */
        .table thead th {
            background-color: #2c3e50;
            color: #ffffff;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f4f7;
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-sm {
            padding: 4px 10px;
        }
    </style>
</head>

<body>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">Inventory System</a>

        <div class="ms-auto">
            <a class="btn btn-light btn-sm me-2" href="about-project.php">About</a>
            <a class="btn btn-light btn-sm me-2" href="developers.php">Developers</a>
            <a class="btn btn-light btn-sm me-2" href="search.php">Search</a>
            <a class="btn btn-outline-light btn-sm" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <!-- Title -->
    <div class="text-center mb-4">
        <h2>Inventory Management System</h2>
        <p class="text-muted">Manage your products efficiently</p>
    </div>

    
    <div class="card p-4 mb-4">
        <h5 class="mb-3">Add New Product</h5>

        <form action="create.php" method="POST">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Add Product
            </button>
        </form>
    </div>

    <!-- TABLE CARD -->
    <div class="card p-4">
        <h5 class="mb-3">Product List</h5>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td>₱<?= number_format($row['price'], 2) ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this product?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>

</body>
</html>