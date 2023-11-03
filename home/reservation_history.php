<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linking the Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Linking the Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Linking Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Belleza|Open+Sans&display=swap" rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" type="text/css" href="../static/css/nevbar.css">
    <link rel="stylesheet" type="text/css" href="../static/css/reservation_history.css">

    <!-- Js Link -->
    <script src="../static/hrs.js" defer></script>

    <style>
        .cancel-btn {
            border-radius: 50px;
            background-color: #3B3B3B;
            color: aliceblue;
        }

        .cancel-btn:hover {
            background-color: gray;

        }
    </style>
</head>




<body>
    <div class="text-container">
        <!-- Nev bar -->
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="../home/index.php">Novotel</a>
                <button class="navbar-toggler" style="background-color:white; color:gray;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../home/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home/roomSection.php">Book Now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home/reservation_history.php" style="border-bottom: 2px solid white;">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home/about_us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo isset($_SESSION['id']) ? '../logout.php' : '../login.php'; ?>"><?php if (isset($_SESSION['id'])) {
                                                                                                                                    echo "Logout";
                                                                                                                                } else {
                                                                                                                                    echo "Login";
                                                                                                                                } ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <!--Reservation History-->
    <div style="margin: 10px">
        <h2>Reservation History</h2>
        <div class="bold-line"></div>
    </div>
    <div class="card mb-3" style="max-width: 100%; margin: 10px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../static/images/hotelroom1.jpg" class="img-fluid rounded-start" style="border-radius: 10px;" alt="Card Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="margin-bottom: 40px; margin-top: 30px;">Fully Furnished Apartment</h5>
                    <div class="d-flex justify-content-between">
                        <p class="card-text">
                            <span class="fw-bold">Check In:</span> <span class="text-muted small" style="margin-right: 40px;">12 Mar 2021</span>
                            <span class="fw-bold">Duration:</span> <span class="text-muted small" style="margin-right: 40px;">Long (2 - 5 Years)</span>
                            <span class="fw-bold">Guests:</span> <span class="text-muted small">4 Adults</span>
                        </p>
                        <a href="#" class="btn cancel-btn">Cancel Reservation</a>
                    </div>
                    <p class="card-text fw-bold">$ 1000 USD</p>
                </div>
            </div>
        </div>
    </div>
    </div>


<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #202020">
    <div class="container p-4 pb-0">
        <section>
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:20px;">Novotel</h6>
                    <p style="color: #E0E0E0;">
                        Experience authentic Mediterranean luxury in a 5 * resort. Book a The Level and get
                        exclusive perks.
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                </div>

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:20px;">Useful links</h6>
                    <p>
                        <a style="color: #E0E0E0;">About Us</a>
                    </p>
                    <p>
                        <a style="color: #E0E0E0;">Recommendation</a>
                    </p>
                    <p>
                        <a style="color: #E0E0E0;">Ratings</a>
                    </p>
                    <p>
                        <a style="color: #E0E0E0;">Help</a>
                    </p>
                </div>

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:20px;">Contact</h6>
                    <p style="color: #E0E0E0;"><i class="fas fa-home mr-3"></i> 459 Pyay Road, Kamayut Township</p>
                    <p style="color: #E0E0E0;"><i class="fas fa-envelope mr-3"></i> novotel12@gmail.com</p>
                    <p style="color: #E0E0E0;"><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p style="color: #E0E0E0;"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </section>

        <hr class="my-3" style="border-color: #E0E0E0;">

        <section class="p-3 pt-0">
            <div class="row d-flex align-items-center">
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <div class="p-3">
                        © 2023 Copyright: Novotel Hoetel Reservation System
                    </div>
                </div>

                <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                    <a class="btn btn-outline-light btn-floating m-1" role="button"
                        style="border-color: #E0E0E0; background-color: #1877F2;"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"
                        style="border-color: #E0E0E0; background-color: #1DA1F2;"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"
                        style="border-color: #E0E0E0; background-color: #FF0000;"><i class="fab fa-google"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" role="button"
                        style="border-color: #E0E0E0; background-color: #F56040;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </section>
    </div>
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>