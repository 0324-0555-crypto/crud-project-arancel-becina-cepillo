<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developers</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            color: #2c3e50;
            background-image: url('images/bg3.jpg');
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

        /* CARD */
        .card {
            border: none;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #ffffff;
            font-weight: 600;
        }

        p {
            color: #2c3e50;
        }

        .text-center h4 {
            font-weight: 600;
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

    <!-- CONTENT -->
    <div class="container mt-5">

        <div class="text-center mb-4">
            <h2>About the Developers</h2>
        </div>

        <div class="row">

            <!-- Developer 1 -->
            <div class="col-md-4 mb-3">
                <div class="card p-4 text-center">
                    <h4>Carl Andrew A. Arancel</h4>
                    <p><strong>Role:</strong> Backend Developer</p>
                    <p>Responsible for creating PHP scripts, database connection, and implementing CRUD operations.</p>
                </div>
            </div>

            <!-- Developer 2 -->
            <div class="col-md-4 mb-3">
                <div class="card p-4 text-center">
                    <h4>Xaedrik Axle Angelo D. Cepillo</h4>
                    <p><strong>Role:</strong> Frontend Designer</p>
                    <p>Responsible for designing the user interface using HTML, CSS, and Bootstrap.</p>
                </div>
            </div>

            <!-- Developer 3 -->
            <div class="col-md-4 mb-3">
                <div class="card p-4 text-center">
                    <h4>Stanley Drew T. Becina</h4>
                    <p><strong>Role:</strong> Documentation & Testing</p>
                    <p>Responsible for testing the system, preparing documentation, and assisting with presentation materials.</p>
                </div>
            </div>

        </div>
    </div>

</body>

</html>