<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Linking the Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Linking the Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Linking Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Belleza|Open+Sans&display=swap" rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" type="text/css" href="../static/styles.css">
    <link rel="stylesheet" type="text/css" href="../static/index.css">

    <!-- Js Link -->
    <script src="../static/hrs.js" defer></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="../home/index.html">Novotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home/index.html" style="border-bottom: 2px solid white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home/reservation_history.html">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home/about_us.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home/faq.html">FAQs</a>
                </li>
                <?php
                session_start();

                // Check if the user is already logged in
                if (isset($_SESSION['valid'])) {
                    // User is logged in, show the "Logout" button
                    echo '<a class="nav-link" href="login.php">Logout</a>';
                } else {
                    // User is not logged in, show the "Login" button
                    echo '<a href="login.php">Login</a>';
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="../login.php">Login/Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>