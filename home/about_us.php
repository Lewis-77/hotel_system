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
  <link rel="stylesheet" type="text/css" href="../static/css/about.css">
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
              <a class="nav-link" href="../home/roomSection.php">Book Now</a>
            </li>

            <li>
              <a class="nav-link" href="../admin/reservationhistory.php">Reservations</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../home/about_us.php" style="border-bottom: 2px solid white;">About Us</a>
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


  <!-- About Us -->
  <div id="aboutus">
    <div id="image">
      <img class="s-inline-block align-top" src="../static/images/novotel.jpg" id="imageone" />
    </div>
    <div id="text">
      <h1 id="paratwo">Novotel Hotel Online Reservation System</h1>
      <p id="parathree">
        Novotel is ranked in 1 to 5 as the best hotel in the country. It does
        not only renting hotel rooms but also accepting celebrations of events
        like wedding, farewell, birthday party and so on.<br><br>In addition, it
        rents rooms for stores, spas and aesthetic clinic. Moreover, the
        service of the hotel is well known for best. And it is located in
        downtown so transportation is convenient for customers.<br><br>
        Hotel's design is modern and rooms are also well decorated and people
        can choose as their likes among variety of types.
      </p>
    </div>
  </div>

  <!-- Faint horizontal line -->
 <div class="faint-line"></div>

  <!-- FAQ -->

  <div class="mainfaq">
    <h1>Frequently Asked Questions</h1>
    <div class="qna">
      <button class="question">What is an online hotel reservation system?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="panel">
        <p>It is a digital platform that allows users to book and manage hotel accommodations through the internet.</p>
      </div>
    </div>

    <div class="qna">
      <button class="question">Can I cancel my reservation?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="panel">
        <p>Yes, You can cancel your reservation on time before the date that you booked.</p>
      </div>
    </div>

    <div class="qna">
      <button class="question">What should I do if I have issues related with hotel?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="panel">
        <p>Contact the hotel or the booking platform's customer support for assistance.</p>
      </div>
    </div>

    <div class="qna">
      <button class="question">Does it cancel automatically if I don't come on date?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="panel">
        <p>Yes, it will cancel automatically.</p>
      </div>
    </div>

    <div class="qna">
      <button class="question">What time is the check-out time?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="panel">
        <p>The check-out time is 12pm.</p>
      </div>
    </div>
  </div>

  <!-- Faint horizontal line -->
  <div class="faint-line"></div>

  <div class="head">
    <h1 class="titlec">Contact Us</h1>
  </div>
  <div class="maincon">
    <div class="conen">
      <h2 class="titled">Contact</h2>
      <p class="gmailc">hotelcontact@gmail.com</p>
      <h3 class="titlef">Based in</h3>
      <p class="locationi">Yangon, Myanmar</p>

      <div class="social-iconsh">
        <a href="#" target="_blank" class="ifacebook"><i class="fab fa-facebook"></i></a>
        <a href="#" target="_blank" class="iinstagram"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" class="itwitter"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
    <div class="coned">
      <input class="textboxc" type="text" placeholder="Enter Your Name" /><br>
      <textarea name="textboxu" class="textboxu" cols="30" rows="10" placeholder="Enter Your message"></textarea>
      <div><button class="buttonu">Contact Us</button></div>
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

<script>

  var acc = document.getElementsByClassName("question");
  var i;
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;

      if (panel.style.display === "block" || panel.style.display === "") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>