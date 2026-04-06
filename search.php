<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$keyword = "";
$results = null;

if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $safe = $conn->real_escape_string($keyword);
    $results = $conn->query("SELECT * FROM products WHERE name LIKE '%$safe%'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #2c3e50;
            background-image: url('images/bg4.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        /* Overlay */
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

        /* NAVBAR */
        .navbar {
            background-color: rgba(31, 45, 61, 0.9) !important;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff !important;
        }

        .btn-light {
            color: #2c3e50;
        }

        /* TITLE */
        h2 {
            color: #ffffff;
            font-weight: 600;
        }

        /* FORM */
        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #2c3e50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1a252f;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            border: none;
            color: #fff;
        }

        /* TABLE CARD */
        .card {
            border: none;
            border-radius: 12px;
            background-color: rgba(255,255,255,0.95);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f4f7;
        }

        .table thead th {
            background-color: #2c3e50;
            color: #ffffff;
        }

        .btn-sm {
            padding: 4px 10px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
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

    <div class="text-center mb-4">
        <h2>Search Products</h2>
    </div>

    <!-- Search Form -->
    <div class="card p-4 mb-4">
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="keyword" class="form-control" placeholder="Search by product name..." value="<?= htmlspecialchars($keyword) ?>">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="search.php" class="btn btn-secondary">Clear</a>
        </form>
    </div>

    <?php if($results !== null): ?>
        <?php if($results->num_rows > 0): ?>
            <div class="card p-4 mb-3">
                <p>Found <strong><?= $results->num_rows ?></strong> result(s) for "<strong><?= htmlspecialchars($keyword) ?></strong>"</p>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $results->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td>₱<?= number_format($row['price'], 2) ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td>
                                    <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">No products found for "<?= htmlspecialchars($keyword) ?>".</div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="index.php" class="btn btn-secondary mt-3">Back to Home</a>
</div>

</body>
</html>