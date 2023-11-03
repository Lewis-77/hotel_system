<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User information</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="style.css">
<style>


@import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

/* Bootstrap Icons */
@import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");


</style>
<body>
<?php 
	   include 'dbconnection.php';
	   $id=$_GET['id'];
	   $result=$db1->query("Select * FROM user WHERE user_id=$id");
	   if($result->rowCount()>0){
	       foreach ($result as $row) {
	           $uid=$row['user_id'];
	           $username=$row['username'];
               $ph_no=$row['phone_number'];
               $email=$row['email'];
	       }
	   }
?>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <nav class="navbar sticky-top navbar-light bg-white">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#" style="font-size: 30px; border-bottom: 1px solid black;">Novotel</a>
                  
                </div>
            </nav>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled">Admin name</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard1.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item hover-dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-bed"></i>Room</a>
                        <div class="hover-dropdown-content">
                            <a class="dropdown-item" href="addroom1.php">Add Room</a>
                            <a class="dropdown-item" href="roomdetail.php">Room Details</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home/index.php">
                             Customer View
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
               
                <!-- Push content down -->
                <div class="mt-auto"></div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
           <div class="row" style="margin-left: 1%;">
            <header>
                <h1>Users Management</h1>
            </header>
           </div>
                      
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid" >
                
                <div class="card shadow border-0 mb-7" >
                    <div class="card-header">
                        <h5 class="mb-0" id="reservation-header" style="font-size: larger;">Edit User Information</h5>
                    </div>
                    <div id="form" style="margin-left: 2%; margin-top: 1%;">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="userid">User ID</label>
                                <input type="text" name ="uid" value= "<?php echo  $uid ?>" class="form-control disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Username</label>
                                <input type="text" name ="username" value= "<?php echo  $username ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="ph-no">Phone Number</label>
                                <input type="text" name ="phno" value= "<?php echo  $ph_no ?>" class="form-control disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Email Address</label>
                                <input type="text" name ="email" value= "<?php echo  $email ?>" class="form-control">
                            </div>

                        </div>
                        <br><br>
                        <div style="text-align:right; margin-bottom: 2%; margin-right: 1%;">
                            <a href="user.php" type="button" class="btn btn-danger">Back</a>
                            <input type="submit" id="save" name ="save" value="Save Changes" class="btn btn-success ">
                        </div>
                        
                    </form>
                   </div>
                    
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
<?php 
  if(isset($_POST['save']))
  {
      $uid = $_POST['uid']; 
      $username = $_POST['username'];
      $ph_no = $_POST['phno'];
      $email = $_POST['email'];
      
      $sql = "UPDATE user SET username=?, phone_number=?, email=? WHERE user_id=?";
      $stmt = $db1->prepare($sql);
      $stmt->execute([$username,$ph_no,$email,$uid]);
      echo '<script>alert("Edit successful!");</script>';
      echo '<script>window.location = "user.php";</script>';
  }
  
    
  
 ?>