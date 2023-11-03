<?php
session_start();
include '../room_connection.php';
$sql=$db->prepare("SELECT * FROM room");
$sql->execute();

if (isset($_GET['type'])) {
  if ($_GET['type']=="all type") {
    $sql=$db->prepare("SELECT * FROM room WHERE NOT status=1");
    $sql->execute();
  }else{
    $search = $_GET['type'];
    $sql=$db->prepare("SELECT * FROM room WHERE room_type LIKE '$search' AND NOT status=1");
    $sql->execute();
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<style>

#roomSelectionContainer {
      text-align: center;
      margin-top: 20px; 
    }

    #roomSelectionDropdown {
      display: block;
      margin: 0 auto;
      text-align: center;
      border-radius: 20px;
    }
  
</style>

<head>


  <!-- Linking the Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Linking the Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Linking Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Belleza|Open+Sans&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  
  <!-- CSS link -->
  <link rel="stylesheet" type="text/css" href="../static/css/nevbar.css">
  <link rel="stylesheet" type="text/css" href="../static/css/roomContainer.css">
  <link rel="stylesheet" type="text/css" href="../static/css/calendar.css">


  <!-- Js Link -->
  <script src="../static/hrs.js" defer></script>

</head>

<style>

</style>



<body>

<div class="text-container">
    <!-- Nev bar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <div class="container">
        <a class="navbar-brand" href="../home/index.php">Novotel</a>
        <button class="navbar-toggler" type="button" style="background-color:white; color:gray;" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../home/index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../home/roomSection.php" style="border-bottom: 2px solid white;">Book Now</a>
            </li>

            <li>
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


  <!-- Room Selection/ Calendar / Search /-->
  <div class="">
    <!-- Search Box -->

    <div id="roomSelectionContainer">
    <select id="roomSelectionDropdown">
      <option disabled selected hidden>Room Selection</option>
      <option value="deluxe" data-href="roomSection.php?type=deluxe room">Deluxe Room</option>
      <option value="junior" data-href="roomSection.php?type=junior suite room">Junior Suite Room</option>
      <option value="suite" data-href="roomSection.php?type=suite room">Suite Room</option>
      <option value="executive" data-href="roomSection.php?type=executive suite room">Executive Suite Room</option>
      <option value="all" data-href="roomSection.php?type=all type">All Type</option>
    </select>
  </div>
    <script>
      document.getElementById('roomSelectionDropdown').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var href = selectedOption.getAttribute('data-href');
        if (href) {
          window.location.href = href;
        }
      });
    </script>



    <!-- Select Room and Guest Box -->
    <!-- <div class="select-room" id="seleRoom">
      <div id="totalGuests">Room and Guests</div>
      <div class="r-dropdown" id="dropDownRoom">
        <div class="r-g" style="text-align: left;">Rooms and Guests</div> 
        <div class="room-functions">
          Number of Rooms:
          <div class="c-btns";>
          <div class="c-btn" id="roomDecrement">-</div>
          <input type="text" id="roomCount" class="room-q-box" value="0" readonly>
          <div class="c-btn" id="roomIncrement">+</div>
          </div>
        </div>
        <div id="roomInfoContainer"></div>
      </div>
      <div id="totalGuests">0 Guest(s)</div>
    </div> -->

    <!-- Aparture-Departure-Date -->

  

  <script>
function reserveWithDates() {
    // Get the values of Arrival Date and Departure Date
    var arrivalDate = document.getElementById("check_in_date").innerText.trim();
    var departureDate = document.getElementById("check_out_date").innerText.trim();

    // Encode the values for a URL
    arrivalDate = encodeURIComponent(arrivalDate);
    departureDate = encodeURIComponent(departureDate);

    // Construct the URL with the values
    var url = 'reservation.php?arrival=' + arrivalDate + '&departure=' + departureDate;

    // Redirect to the reservation.php page with the dates as query parameters
    location.href = url;
}
  </script>

    <!-- Checkout Btn -->
      <!-- <button type="button" class="btn btn-outline-dark s-btn" href="../home/roomSection.php">Search</button> -->

  </div>

  <!-- Room Conatiner -->
  <?php

    while($row=$sql->fetch(PDO::FETCH_ASSOC)){
      extract($row);
    

  ?>

  <div class="room-container">
    <form action="reservation.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
        <input type="hidden" name="images" value="<?php echo $images; ?>">
          <img src="../picture/<?php echo $images?>" class="card-img">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
                <input type="hidden" name="room_type" value="<?php echo $room_type; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="hidden" name="room_id" value="<?php echo $room_id?>"> 
                <h5 class="card-title" style="font-weight:bold; margin-bottom: 15px; font-size: 30px;" name="room_type"><?php echo $room_type; ?></h5>
                <p class="card-text" style="color: gray; margin-bottom: 10px; font-size: 13px;" name="bed_quantity"><?php echo $bed_quantity; ?></p>
                <p class="card-text" style="color: gray; margin-bottom: 10px; font-size: 13px;" name="capacity">Max-capacity - <?php echo $capacity; ?> people</p>
                <p class="card-text">Taxes are included</p>
                <p><span class="price" name="price"><?php echo $price; ?></span> <span class="per-night">/night</span></p>
            <!-- <div class="calendar" id="check_in_date">
              Arrival Date
            </div> -->
            <div class="date-picker">
              <label for="check_in">Check IN:</label>
              <input type="date" id="check_in" name="check_in" min="<?= date('Y-m-d') ?>" required>
            </div>
            <div class="date-picker">
              <label for="check_out">Check out:</label>
              <input type="date" id="check_out" name="check_out" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>
            </div>
  <!-- <div class="calendar" id="check_out_date">
      Departure Date
  </div> -->
            <button class="checkout-btn" type="submit" style="margin-top: 20px; margin-bottom: 16px"
               name="reserve">Reserve Now</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  ?>

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
<!-- Load necessary libraries -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</html>