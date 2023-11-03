<?php
session_start();
?>
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
    <link rel="stylesheet" type="text/css" href="../static/css/index1.css">
    <link rel="stylesheet" type="text/css" href="../static/css/index.css">

    <!-- Js Link -->
    <script src="../static/hrs.js" defer></script>
    <script src="../static/index.js" defer></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>
<!-- Nev bar -->
<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="../home/index.php" style="font-size:34px; color:white;">Novotel</a>
        <button class="navbar-toggler" type="button" style="background-color:white; color:gray;" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home/index.php" style="border-bottom: 2px solid white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home/roomSection.php">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/reservationhistory.php">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home/about_us.php">About</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?php echo isset($_SESSION['id']) ? '../logout.php' : '../login.php'; ?>"><?php if(isset($_SESSION['id']) ){
                            echo "Logout";
                        }
                        else{ echo "Login" 
                        ;}?></a>
                    </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Adding Background Image-->
<img class="background-image" src="../static/images/photo1.jpg">

<!-- Adding Text on the left side -->
<div class="container">
    <div class="row">
        <div class="col-md-6 left-content">
            <h2>Beautiful East</h2>
            <h2>Sea</h2>
            <p>Experience authentic Mediterranean luxury in a 5 * resort.</p>
            <p>Book a The Level and get exclusive perks.</p>

            <!-- Add Function Book Now ################################## -->
            <div class="book-now-button">
                <a href="../home/roomSection.php" class="book-link">Book Now</a>
                <span class="arrow">&rarr;</span>
            </div>

        </div>
    </div>
</div>

<!-- Recommendations Section ################################## -->
<div class="recommendations-section">
    <div class="full-width">
        <h2 class="recommendations-header">Our Recommendations</h2>
        <p class="recommendations-paragraph">With best services.</p>
    </div>

    <!-- Showing Recommendation Function -->
    <div class="room-container">
        <div class="room">
            <div class="room-card">
                <div class="room-front">
                    <img src="../static/images/Deluxe_Room.png" alt="Room 1">
                </div>
            </div>
            <div class="room-info">
                <h3>Deluxe Room</h3>
                <p>Max-capacity - 3 people</p>
                <p><span class="price">$50</span> <span class="per-night">/1 night</span></p>
            </div>
        </div>
        <div class="room">
            <div class="room-card">
                <div class="room-front">
                    <img src="../static/images/Junior Suite Room.jpg" alt="Room 2">
                </div>
            </div>
            <div class="room-info">
                <h3>Junior Suite Room</h3>
                <p>Max-capacity - 3 people</p>
                <p><span class="price">$65</span> <span class="per-night">/1 night</span></p>
            </div>
        </div>
        <div class="room">
            <div class="room-card">
                <div class="room-front">
                    <img src="../static/images/Suite_Room.jpg" alt="Room 3">
                </div>
            </div>
            <div class="room-info">
                <h3>Suite Room</h3>
                <p>Max-capacity - 3 people</p>
                <p><span class="price">$75</span> <span class="per-night">/1 night</span></p>
            </div>
        </div>
        <div class="room">
            <div class="room-card">
                <div class="room-front">
                    <img src="../static/images/Executive_Suite_Room.jpg" alt="Room 4">
                </div>
            </div>
            <div class="room-info">
                <h3>Executive Suite Room</h3>
                <p>Max-capacity - 2 people</p>
                <p><span class="price">$100</span> <span class="per-night">/1 night</span></p>
            </div>
        </div>
    </div>

    <!-- Learn More Section ###################################-->
    <div class="experience-section">
        <div class="experience-image">
            <img src="../static/images/reserve.jpeg" alt="Create Beautiful Experiences">
            <div class="text-overlay">
                <h2>Create the Most Beautiful Experiences with Us</h2>
                <a href="../home/about_us.php" class="learn-more-button">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="info-section">
        <div class="info-text">
            <h3>Novotel Escapes,</h3>
            <h3>your journey starts here.</h3>
            <p>Starting today, you can book your flight + hotel and everything you need for our first trip together.
                Get hotel, flight, experiences and transfers in one place. Discover your complete experience with
                Novotel Escapes.</p>
        </div>
        <div class="info-photo">
            <img src="../static/images/beach.jpg" alt="About Us Photo">
        </div>
    </div>

    <!-- Faint horizontal line -->
    <div class="faint-line"></div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="faq-header">
            <h2>Frequently Asked</h2>
            <h2>Questions</h2>
        </div>
        <div class="faq-content">
            <div class="faq-box" style="position: relative;">
                <h3>How Far is Nearest Bus station ?</h3>
                <button class="faq-icon-collape" data-target="#faq-answer-1">
                    <i class="fa-solid fa-chevron-down fa-icon"></i>
                </button>
                <div class="collapse" id="faq-answer-1">
                    <p>The hotel is a short walk from the nearest bus station, just a few minutes away, making
                        transportation convenient for guests.</p>
                </div>
            </div>

            <div class="faq-box" style="position: relative;">
                <h3>What Make Us Different ?</h3>
                <button class="faq-icon-collape" data-target="#faq-answer-2">
                    <i class="fa-solid fa-chevron-down fa-icon"></i>
                </button>
                <div class="collapse" id="faq-answer-2">
                    <p>We stand out from other hotels through our exceptional service, unique amenities, and
                        dedication to providing an unforgettable guest experience.</p>
                </div>
            </div>

            <div class="faq-box" style="position: relative;">
                <h3>What Time is Checking Out?</h3>
                <button class="faq-icon-collape" data-target="#faq-answer-3">
                    <i class="fa-solid fa-chevron-down fa-icon"></i>
                </button>
                <div class="collapse" id="faq-answer-3">
                    <p>Check-out time is typically at 11:00 AM, but please confirm with the front desk for specific
                        details.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<!-- Load necessary libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</html>