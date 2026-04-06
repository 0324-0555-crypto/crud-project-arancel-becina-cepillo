<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Project</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #2c3e50;

            background-image: url('images/bg2.jpg');
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
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        /* Navigation */
        .navbar {
            background-color: rgba(31, 45, 61, 0.9) !important;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff !important;
        }

        
        .card {
            border: none;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Title */
        h2 {
            font-weight: 600;
            color: #ffffff;
        }

        p.text-muted {
            color: #dcdcdc !important;
        }

        h4 {
            font-weight: 600;
        }

        ul li {
            margin-bottom: 5px;
        }

        .btn-light {
            color: #2c3e50;
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

    <!-- Laman -->
    <div class="container mt-5">

        <div class="text-center mb-4">
            <h2>About the Project</h2>
            <p class="text-muted">Learn more about this Inventory Management System</p>
        </div>

        <div class="card p-4">
            <h4>Project Title</h4>
            <p>Inventory Management System</p>

            <h4>Purpose of the System</h4>
            <p>
                The purpose of this system is to help users manage and organize product records efficiently. 
                It allows users to add, view, update, and delete product information using a web-based interface.
            </p>

            <h4>System Features</h4>
            <ul>
                <li>Add new product records</li>
                <li>View products in a table</li>
                <li>Edit existing product information</li>
                <li>Delete product records</li>
            </ul>

            <h4>Technologies Used</h4>
            <ul>
                <li>PHP</li>
                <li>MySQL</li>
                <li>Bootstrap</li>
                <li>HTML & CSS</li>
                <li>XAMPP</li>
            </ul>
        </div>

    </div>

</body>
</html>