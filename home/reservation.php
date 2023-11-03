<?php
session_start();
    // Arrival Date and Departure Date in Y-m-d format (e.g., "2023-10-24")
    $check_in_date = $_POST['check_in'];
    $check_out_date = $_POST['check_out'];
    $price = $_POST['price'];
    
    // Create DateTime objects for both dates
    $arrivalDateTime = new DateTime($check_in_date);
    $departureDateTime = new DateTime($check_out_date);
    
    // Calculate the date difference
    $dateDifference = $arrivalDateTime->diff($departureDateTime);
    
    // Access the date difference in various formats (days, months, years, etc.)
    $days = $dateDifference->days;

    $total_price=((int)$price*(int)$days);
    $depose= ((int)$total_price*0.3);
    $room_depose = ((int)$price * 0.3);
    
    // Output the results
    
?>
<!DOCTYPE html>
<html>

<head>

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
        <link rel="stylesheet" type="text/css" href="../static/css/reservation.css">
        <link rel="stylesheet" type="text/css" href="../static/css/nevbar.css">

        <!-- Js Link -->
        <script src="../static/hrs.js" defer></script>

    </head>

</head>

<body>
    <div class="text-container">
    <!-- Nev bar -->
           <!-- Nev bar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../home/index.php">Novotel</a>
            <button class="navbar-toggler" style="background-color:white; color:gray;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../admin/reservationhistory.php">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home/about_us.php">About Us</a>
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
        
    </div>
    <form action="checkout.php" method="POST">                     
        <div class="reservation-container">
        <!-- Left Side -->
        <!-- <form action="" method="POST"> -->
        <div class="reservation-left">
            <h2 class="res-title1">Reservation Summary</h2>
            <div class="bold-line"></div>

            <div class="d-flex">
                <div class="reservation-imagebox">
                <div class="res-text">
                    <img src="../picture/<?php echo isset($_POST['images']) ? $_POST['images'] : 'placeholder_image.jpg'; ?>" alt="Apartment Image"  width="241" height="135">
                </div>
                    <!-- <img class="reservation-image" src="../static/images/hotelroom1.jpg"> -->
                </div>

                <div class="reservation-text">
                    <div class="res-text">
                    <span ><h1 style="font-size: 30px; font-weight: bold;"><?php echo isset($_POST['room_type']) ? $_POST['room_type'] : 'Not selected'; ?></h1></span>
                    </div>
                    <input type="hidden" name="room_id" value="<?php echo isset($_POST['room_id']) ? $_POST['room_id'] : 'Not selected'; ?>">
                    <div class="res-text">
                    <span>Check In: </span><span class="textgrey" style="font-size: 12px; font-weight: bold;"><?php echo $_POST['check_in']?></span>
                    </div>
                    <div class="res-text">
                    <span>Check Out: </span><span class="textgrey" style="font-size: 12px; font-weight: bold;"><?php echo $_POST['check_out']?></span>
                    </div>
                    <div class="res-text">
                    <span class="textgrey"><h3 style="font-size: 18px; color:#202020">Price:<?php echo isset($_POST['price']) ? $_POST['price'] : 'Not selected'; ?><span style="font-size: 12px; color:gray" >/night</span></h3></span>
                    </div>
                    <!-- <div class="res-text">
                        <span>Duration: </span><span class="textgrey">Long (2 - 5 Years)</span>
                    </div> -->
                    <p></p>
                </div>
                
            </div>
            

            

            <!-- <div class="d-flex">
                <div class="reservation-imagebox">
                    <img class="reservation-image" src="../static/images/hotelroom2.jpg">
                </div>

                <div class="reservation-text">
                    <h2 class="res-header">Fully Furnished Apartment</h2>
                    <div class="res-text">
                        <span>Check In: </span><span class="textgrey">12 Mar 2021</span>
                    </div>
                    <div class="res-text">
                        <span>Duration: </span><span class="textgrey">Long (2 - 5 Years)</span>
                    </div>
                    <p>$1000 USD</p>
                </div>
            </div> -->
            

            <div class="medium-line"></div>
            <div class="checkout-container">
                <button class="checkout-btn" type="submit" name="check_out">Check Out</button>
            </div>
        </div>
        <!-- </form> -->
        <!-- Right Side -->
        <div class="reservation-right">
            <h2 class="res-title2">Reservation Summary</h2>

            <div class="faint-line"></div>

            <div class="reservation-details">
                <p class="rev-hname">Novotel Yangon, Myanmar</p>
                <p class="rev-pname"><?php echo "$check_in_date to $check_out_date <br>"?><?php echo " total: $days nights<br>";?></p>
                    <input type="hidden" name="check_in_date" value="<?php echo $check_in_date; ?>">
                    <input type="hidden" name="check_out_date" value="<?php echo $check_out_date; ?>">
                    <input type="hidden" name="days" value="<?php echo $days; ?>">
                <p class="rev-total">Total amount: <span><?php echo "$total_price"?>$</span></p>
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            </div>

            <div class="faint-line"></div>

            <div class="reservation-details">
                <h3>Room</h3>
                <div class="rev-rdetails">
                    <span class="rev-rname"><?php echo isset($_POST['room_type']) ? $_POST['room_type'] : 'Not selected'; ?></span>
                        <input type="hidden" name="room_type" value="<?php echo isset($_POST['room_type']) ? $_POST['room_type'] : 'Not selected'; ?>">
                    <span style="font-weight: bold;"><?php echo isset($_POST['price']) ? $_POST['price'] : 'Not selected'; ?> /night</span>
                        <input type="hidden" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : 'Not selected'; ?>">
                </div>
                <div class="rev-rdetails">
                    <span class="rev-rname">Deposit fees 30%</span>
                    <span style="font-weight: bold;"><?php echo $room_depose;?>$ /night</span>
                    <input type="hidden" name="room_depose" value="<?php echo $room_depose; ?>">
                </div>
            </div>

            <div class="faint-line"></div>

            <div class="reservation-details-total">
                <p class="rev-total">Total Amount for reservation: </p>
                <p class="rev-total-count"><?php echo $depose;?>$</p>
                <input type="hidden" name="depose" value="<?php echo $depose; ?>">
            </div>
        </div>
    </div>
    </form>  
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

</html>