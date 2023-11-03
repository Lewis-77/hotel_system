<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
  body {
    background: #ffffff;
  }

  .form {
    display: flex;
    flex-direction: column;
    gap: 9px;
    max-width: 350px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    position: relative;
  }

  .container-fluid {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 380px;

  }

  .title {
    font-size: 28px;
    color: #9A8174;
    font-weight: 600;
    letter-spacing: -1px;
    position: relative;
    text-align: center;
  }

  .signin {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
  }

  .signin {
    text-align: center;
  }

  .signin a {
    color: #9A8174;
  }

  .signin a:hover {
    text-decoration: underline #3B3B3B;
  }

  .flex {
    display: flex;
    width: 100%;
    gap: 6px;
  }

  .form label {
    position: relative;
  }

  .form label .text_input {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
  }

  .signup {
    border: none;
    outline: none;
    background-color: #9A8174;
    padding: 10px;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    transform: .3s ease;
  }

  .signup:hover {
    background-color: #3B3B3B;
    cursor: pointer;
  }

  @keyframes pulse {
    from {
      transform: scale(0.9);
      opacity: 1;
    }

    to {
      transform: scale(1.8);
      opacity: 0;
    }
  }

  .login_image {
    max-width: 600px;
    height: 480px;

  }

  form i {
    margin-left: -35px;
    cursor: pointer;
  }
</style>

<body>

  <!-- Modal -->
  <div class="register" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <?php

        include("hotel_connection.php");
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $username = $first_name . $last_name;
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
              echo "
                  <script>alert('Passwords do not match. Please try again.')</script>
                  <script>window.location = 'register.php'</script>
              ";
          } else {
              $verify_query = mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
              
              if (mysqli_num_rows($verify_query) != 0) {
                  echo "
                      <script>alert('Please change email and try with another Please!')</script>
                      <script>window.location = 'register.php'</script>
                  ";
              } else {
                  mysqli_query($conn, "INSERT INTO user(first_name, last_name, username, email, phone_number, password)
                      VALUES('$first_name', '$last_name', '$username', '$email', '$phone_number', '$password')") or die("Error Occurred");
      
                  echo "
                      <script>alert('Register Successful')</script>
                      <script>window.location = 'login.php'</script>
                  ";
              }
          }
      } else {
        ?>
    <div class="container">
      <div class="row m-5 no-gutters shadow-lg" style="height: 480px;">
        <div class="col-md-6 d-none d-md-block">
          <img style="max-width: 500px;" class="login_image" src="static/images/myanmar_insider_novetel_small.jpg" />
        </div>
        <div class="col-md-6 bg-white p-5">
          <div class="container-fluid">
            <form class="form" method="POST">
              <p class="title">Register </p>
              <div class="flex">
                <label>
                  <input class="text_input" name="first_name" type="text" placeholder="First Name" required="">
                </label>

                <label>
                  <input class="text_input" name="last_name" type="text" placeholder="Last Name" required="">
                </label>
              </div>

              <label>
                <input class="text_input" name="email" type="email" placeholder="Email" required="" pattern=".*@gmail\.com">
              </label>

              <label>
                <input class="text_input" name="phone_number" type="text" placeholder="Phone Number" required
                  pattern="[0-9]+">
              </label>

              <label>
                <input class="text_input" name="password" id="passwordCon" type="password" placeholder="Password"
                  required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$">
                <i class="bi bi-eye-slash" id="hideshowPwd"></i>
              </label>
              <label>
                <input class="text_input" name="confirm_password" id= "passCon"type="password" placeholder="Confirm Password" required
                  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$"> 
                  <i class="bi bi-eye-slash" id="hideshowPwdC"></i>
              </label>
              <button class="signup" type="submit" name="submit">Signup</button>
              <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
            </form>
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

  hideshowPwd.addEventListener("click", function () {
    // toggle the type attribute
    const type = passwordCon.getAttribute("type") === "password" ? "text" : "password";
    passwordCon.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
    this.classList.toggle("bi-eye-slash");
  });
</script>

<script>
  const hideshowPwdC = document.querySelector("#hideshowPwdC");
  const passCon = document.querySelector("#passCon");

  hideshowPwdC.addEventListener("click", function () {
    // toggle the type attribute
    const type = passCon.getAttribute("type") === "password" ? "text" : "password";
    passCon.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
    this.classList.toggle("bi-eye-slash");
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</html>