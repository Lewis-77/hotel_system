<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>
<body>
  <!-- Modal -->
  <div class="login" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php 
             include("hotel_connection.php");
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($conn,$_POST['email']);
               $password = mysqli_real_escape_string($conn,$_POST['password']);

               $result = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password' ") or die("Select Error" . mysqli_error($conn));
               $row = mysqli_fetch_assoc($result);

               if(is_array($row) && !empty($row)){
                   $_SESSION['id'] = $row['user_id'];
                   $_SESSION['first_name'] = $row['first_name'];
                   $_SESSION['last_name'] = $row['last_name'];
                   $_SESSION['username'] = $row['username'];
                   $_SESSION['valid'] = $row['email'];
                   $_SESSION['phone_number'] = $row['phone_number'];

               }else{
                   echo "
                   <script>alert('Invalid username or password')</script>
                   <script>window.location = 'login.php'</script>
                   ";
               }if(isset($_SESSION['valid'])){
                header("Location: ./home/index.php");
                // session_unset();
                // session_destroy();
               }
             }else{
           ?>
          <div class="container">
        <div class="row m-5 no-gutters shadow-lg" style="height: 480px;">
          <div class="col-md-6 d-none d-md-block">
            <img style="max-width: 500px;" class="login_image" src="static/images/myanmar_insider_novetel_small.jpg" />
          </div>
          <div class="col-md-6 bg-white p-5">
            <div class="container-fluid">
              <form class="form" method="POST">
                <p class="title">Login</p>

                <label>
                  <input class="text_input" id="email" name="email" type="email" placeholder="Email" required="">
                </label>

                <label>
                <input class="text_input" id="passwordCon" name="password" id="password" type="password" placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$">
                  <i class="bi bi-eye-slash" id="hideshowPwd"></i>
                </label>

                <button class="signup" type="submit" id="submit" name="submit">Login</button>
                <p class="signin">Don't have an acount ? Click here to <a href="register.php">Signup</a> <br><a href="home/index.php">Later</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
    <?php }
    ?>
  </div>

</body>

<script>
  const hideshowPwd = document.querySelector("#hideshowPwd");
  const passwordCon = document.querySelector("#passwordCon");

  hideshowPwd.addEventListener("click", function() {
    // toggle the type attribute
    const type = passwordCon.getAttribute("type") === "password" ? "text" : "password";
    passwordCon.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
    this.classList.toggle("bi-eye-slash");
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>