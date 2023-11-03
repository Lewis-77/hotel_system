<?php
include '../room_connection.php';
$sql=$db->prepare("SELECT * FROM room");
$sql->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <!-- Linking the Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Linking the Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Linking Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Belleza|Open+Sans&display=swap" rel="stylesheet">

  
  <!-- CSS link -->
  <link rel="stylesheet" type="text/css" href="../static/css/nevbar.css">
  <link rel="stylesheet" type="text/css" href="../static/css/roomContainer.css">
  <link rel="stylesheet" type="text/css" href="../static/css/calendar.css">


  <!-- Js Link -->
  <script src="../static/hrs.js" defer></script>
  <script src="../static/calendar.js" defer></script>

</head>

<style>

</style>

<body>

  <div class="text-container">
    <!-- Nev bar -->
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
              <a class="nav-link" href="../home/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../home/roomSection.php" style="border-bottom: 2px solid white;">Book Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../home/reservation_history.html">Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../home/about_us.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login.php">Login/Signup</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <!-- Room Selection/ Calendar / Search /-->
  <div class="sticky-container">
    <!-- Search Box -->

    <select id="roomSelectionDropdown">
      <option disabled selected hidden>Room Selection</option>
      <option value="deluxe">Deluxe Room</option>
      <option value="junior">Junior Suite Room</option>
      <option value="suite">Suite Room</option>
      <option value="exclusive">Exclusive Suite Room</option>
    </select>




    <!-- Select Room and Guest Box -->
    <div class="select-room" id="seleRoom">
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
    </div>

    <!-- Aparture-Departure-Date -->
    <div class="calendar" id="check_in_date">
      Arrival Date
  </div>
  
  <div class="calendar" id="check_out_date">
      Departure Date
  </div>

  
  <!-- <div class="input-group">
    <label for="d-date">Departure Date</label>
  <input type="date" class="form-control">
</div> -->


    <!-- Checkout Btn -->
      <button type="button" class="btn btn-outline-dark s-btn">Search</button>

  </div>

  <!-- Room Conatiner -->
 

  <!-- php code for data input -->
  <?php

    while($row=$sql->fetch(PDO::FETCH_ASSOC)){
      extract($row);
    

  ?>






  <div class="room-container">
    <form action="" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <img src="../picture/<?php echo $images?>" class="card-img">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="font-weight:bold; margin-bottom: 40px; font-size: 30px;" name="room_type"><?php echo $room_type;?></h5>
            <p class="card-text" style="color: gray; margin-bottom: 35px; font-size: 13px;" name="bed_quantity"><?php echo $bed_quantity;?></p>
            <p class="card-text" style="color: gray; margin-bottom: 35px; font-size: 13px;" name="capacity">Max-capacity - <?php echo $capacity;?> people</p>
            <p class="card-text">Taxes are included</p>
            <input type="hidden" name="price" id="price" value="<?php echo $price;?>">
            <p><span class="price" name="aaprice"><?php echo $price;?></span> <span class="per-night">/night</span></p>
            <!-- <button class="checkout-btn" type="button" style="margin-top: 20px; margin-bottom: 16px"
              onclick="location.herf = 'reservation.php';" name="reserve">Reserve Now</button> -->
              
              
              <button class="checkout-btn" type="button" style="margin-top: 20px; margin-bottom: 16px"
              onclick=reserveWithDates() name="reserve">Reserve Now</button>
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
          <h6 class="text-uppercase mb-4 font-weight-bold">Novotel</h6>
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
          <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
          <p>
            <a style="color: #E0E0E0;">Your Account</a>
          </p>
          <p>
            <a style="color: #E0E0E0;">Become an Affiliate</a>
          </p>
          <p>
            <a style="color: #E0E0E0;">Shipping Rates</a>
          </p>
          <p>
            <a style="color: #E0E0E0;">Help</a>
          </p>
        </div>

        <hr class="w-100 clearfix d-md-none" />

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
          <p style="color: #E0E0E0;"><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p style="color: #E0E0E0;"><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>

</html>