<?php
session_start();

?>
<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" type="text/css" href="../static/css/checkout.css">
    <link rel="stylesheet" type="text/css" href="../static/css/nevbar.css">

    <!-- Js Link -->
    <script src="../static/hrs.js" defer></script>

</head>

<body>

    <div class="text-container">
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
                        else{ echo "Login" ;}?></a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <?php
        
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        $room_id = isset($_POST['room_id']) ? $_POST['room_id'] : null;
        $check_in_date = date('Y-m-d', strtotime($_POST['check_in_date']));
        $check_out_date = date('Y-m-d', strtotime($_POST['check_out_date']));
        
        if (isset($_POST['done'])) {
            if (isset($_SESSION['id'])){
                include("../hotel_connection.php");
                $todayDate = date('Y-m-d');
                $depose = isset($_POST['depose']) ? mysqli_real_escape_string($conn, $_POST['depose']) : null;
                $sql = "INSERT INTO payment (amount, payment_date) VALUES ('$depose', '$todayDate')";
                
            if(mysqli_query($conn, $sql)){
            $payment_id = mysqli_insert_id($conn);
            $card_type = isset($_POST['card-type']) ? $_POST['card-type'] : 'Not selected';
            $sql="INSERT INTO reservation (check_in_date, check_out_date, reservation_type, payment_id, user_id) VALUE ('$check_in_date', '$check_out_date', '$card_type', '$payment_id', '$user_id')";   
                if(mysqli_query($conn, $sql)) {
            $reservation_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO report (room_id, reservation_id) VALUES ( '$room_id', '$reservation_id')";
            if (mysqli_query($conn, $sql)) {
                $reservation_id = mysqli_insert_id($conn);
                $sqlUpdateRoom = "UPDATE room SET status = '1' WHERE room_id = '$room_id'";
                mysqli_query($conn, $sqlUpdateRoom);
                echo "<script>window.location = 'index.php'</script>";
            } else {
                
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert('User Need to Login!!')</script>
          <script>window.location = '../login.php'</script>";
}
}
    ?>       
    <form action="checkout.php" method="POST">
        <div class="checkout-container">
        <div class="checkout-left">
            <h2>Fill your information to continue</h2>

            <div class="bold-line"></div>

            <div class="checkout-form">
                <label for="email">Email</label>
                <input style="width: 100%;" type="text" id="email" name="email" value="<?php echo isset($_SESSION['valid']) ? $_SESSION['valid'] : ''; ?>" readonly>
            </div>
            
            <div class="checkout-form">
                <label for="phone">Phone Number</label>
                <input style="width: 100%;" type="text" id="phone_number" name="phone_number" value="<?php echo isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : ''; ?> "readonly>
            </div>
            <div class="checkout-form">
                <label for="">Name</label>
                
                <input style="width: 100%;" type="text" id="user_name"  name="user_name" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"readonly>
            </div>
            <div class="checkout-form">
                <label for="">Card Number</label>
                <input style="width: 100%;" type="text" id="">
            </div>
            <div class="checkout-form">
                <ul class="card-bullet">
                    <li class="radio-label">
                        <input type="radio" id="Visa" name="card-type" value="Visa">
                        <label for="Visa">Visa</label>
                    </li>
                    <li class="radio-label">
                        <input type="radio" id="Mastercard" name="card-type" value="Mastercard">
                        <label for="Mastercard">Mastercard</label>
                    </li>
                    <li class="radio-label">
                        <input type="radio" id="MPU" name="card-type" value="MPU">
                        <label for="MPU">MPU</label>
                    </li>
                </ul>
            </div>

            <!--Cancel and Continue Button -->
            <div class="checkout-btn-container">
                <button class="checkout-btn-cancel" type="button" onclick="goToReservationPage()">Cancel</button>
                <button class="btn checkout-btn-continue" type="button" name="submit" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Continue</button>

            </div>
            <!-- Invoice Message  -->
            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">You have successfully booked.</h5>
                            
                        </div>
                        <div class="modal-body">
                            <div class="">
                                <h2 class="res-title2">INVOICE</h2>
                                <div class="faint-line"></div>
                                <div class="reservation-details">
                                    <p class="rev-hname">Novotel Yangon, Myanmar</p>
                                    <input type="hidden" name="check_out_date" value="<?php echo isset($_POST['check_out_date']) ? $_POST['check_out_date'] : 'Not selected'; ?>">
                                    <input type="hidden" name="check_in_date" value="<?php echo isset($_POST['check_in_date']) ? $_POST['check_in_date'] : 'Not selected'; ?>">
                                    <p class="rev-pname"><?php echo isset($_POST['check_in_date']) ? $_POST['check_in_date'] : 'Not selected'; ?> to <?php echo isset($_POST['check_out_date']) ? $_POST['check_out_date'] : 'Not selected'; ?></p>
                                    <p class="rev-pname">total: <?php echo isset($_POST['days']) ? $_POST['days'] : 'Not selected'; ?> nights</p>
                                    <p class="rev-total">Total amount: <span><?php echo isset($_POST['total_price']) ? $_POST['total_price'] : 'Not selected'; ?>$</span></p>
                                </div>

                                <div class="faint-line"></div>

                                <div class="reservation-details">
                                    <h3>Room</h3>
                                    <div class="rev-rdetails">
                                        <span class="rev-rname"><?php echo isset($_POST['room_type']) ? $_POST['room_type'] : 'Not selected'; ?></span>
                                        <span style="font-weight: bold;"><?php echo isset($_POST['price']) ? $_POST['price'] : 'Not selected'; ?> /night</span>
                                    </div>
                                    <input type="hidden" name="room_id" value="<?php echo isset($_POST['room_id']) ? $_POST['room_id'] : 'Not selected'; ?>">
                                    <div class="rev-rdetails">
                                        <span class="rev-rname">Deposit fees 30%</span>
                                        <span style="font-weight: bold;"><?php echo isset($_POST['room_depose']) ? $_POST['room_depose'] : 'Not selected'; ?>$ /night</span>
                                    </div>
                                </div>

                                <div class="faint-line"></div>

                                <div class="reservation-details-total">
                                    <p class="rev-total">Total Amount for reservation:</p>
                                    <p class="rev-total-count" style="font-weight: bold;">&nbsp;<?php echo isset($_POST['depose']) ? $_POST['depose'] : 'Not selected'; ?>$</p>
                                    <input type="hidden" name="depose" value="<?php echo isset($_POST['depose']) ? $_POST['depose'] : 'Not selected'; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="done" onclick="goToIndexPage()" class="btn checkout-btn-continue" style="color: white;">Done</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Side -->
        <!-- Check Out Receipt-->
        <div class="checkout-right">
            <h2 class="res-title2">Reservation Summary</h2>

            <div class="faint-line"></div>

            <div class="reservation-details">
                <p class="rev-hname">Novotel Yangon, Myanmar</p>
                <p class="rev-pname"><?php echo isset($_POST['check_in_date']) ? $_POST['check_in_date'] : 'Not selected'; ?> to <?php echo isset($_POST['check_out_date']) ? $_POST['check_out_date'] : 'Not selected'; ?></p>
                <p class="rev-pname">total: <?php echo isset($_POST['days']) ? $_POST['days'] : 'Not selected'; ?> nights</p>
                <p class="rev-total">Total amount: <span><?php echo isset($_POST['total_price']) ? $_POST['total_price'] : 'Not selected'; ?>$</span></p>
            </div>

            <div class="faint-line"></div>

            <div class="reservation-details">
                <h3>Room</h3>
                <div class="rev-rdetails">
                    <span class="rev-rname"><?php echo isset($_POST['room_type']) ? $_POST['room_type'] : 'Not selected'; ?></span>
                    <span style="font-weight: bold;"><?php echo isset($_POST['price']) ? $_POST['price'] : 'Not selected'; ?> /night</span>
                </div>
                <div class="rev-rdetails">
                    <span class="rev-rname">Deposit fees 30%</span>
                    <span style="font-weight: bold;"><?php echo isset($_POST['room_depose']) ? $_POST['room_depose'] : 'Not selected'; ?>$ /night</span>
                </div>
            </div>

            <div class="faint-line"></div>

            <div class="reservation-details-total">
                <p class="rev-total">Total Amount for reservation: </p>
                <p class="rev-total-count" style="font-weight: bold;">&nbsp;<?php echo isset($_POST['depose']) ? $_POST['depose'] : 'Not selected'; ?>$</p>
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