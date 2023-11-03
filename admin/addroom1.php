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
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="roomDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-bar-chart"></i> Room
                        </a>
                        <div class="dropdown-menu" aria-labelledby="roomDropdown">
                            <a class="dropdown-item" href="#">Option 1</a>
                            <a class="dropdown-item" href="#">Option 2</a>
                            <a class="dropdown-item" href="#">Option 3</a>
                        </div>
                    </li> -->
                    <li class="nav-item hover-dropdown">
                    <a href="#" class="nav-link"><i class="fas fa-bed"></i>Room</a>
                        <div class="hover-dropdown-content">
                            <a class="dropdown-item" href="addroom1.php">Add Room</a>
                            <a class="dropdown-item" href="roomdetail.php">Room Details</a>
                        </div>
                    </li>

                    <!-- <div class="hover-dropdown">
                        <button class="btn btn-primary">Hover Me</button>
                        <div class="hover-dropdown-content">
                            <a class="dropdown-item" href="#">Item 1</a>
                            <a class="dropdown-item" href="#">Item 2</a>
                            <a class="dropdown-item" href="#">Item 3</a>
                        </div>
                    </div> -->
                    
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
                <h1>Room Information Details</h1>
            </header>
           </div>
                      
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0" id="reservation-header" style="font-size: larger;">Rooms</h5>
                    </div>
                    <form action="" method="POST" id="add_room_form" enctype="multipart/form-data" class="row g-3">
                        <div class="col-md-5">
                            <label for="room_type" class="form-label">Room Type</label>
                            <input type="text" class="form-control" id="room_type" name="room_type">
                        </div>
                        <!-- <div class="col-md-5">
                            <div class="col-md-7">
                                <label for="room_type" class="form-label">Room Type</label>
                                <select id="room_type" class="form-select">
                                  <option selected>Choose the room type</option>
                                  <option>...</option>
                                </select>
                            </div>
                        </div> -->
    
                        <div class="col-md-5">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
    
                        <div class="col-md-5">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type='' id='capacity' class="form-control" name="capacity">
                        </div>
                        <div class="col-md-5">
                            <label for="bed_quantity" class="form-label">Bed Counts</label>
                            <input type='' id='bed_quantity' class="form-control" name="bed_quantity">
                        </div>
                        <div class="col-md-5">
                            <label for="price" class="form-label">Room Price</label>
                            <input type="" class="form-control" id="price" name="price">
                        </div>
                        <div class="col-md-5" id="submit" style="margin-top: 4%;">
                            <input type="submit" value="Add Room" class="btn btn-success" name="submit">
                        </div>
                        <!-- <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" value="SUBMIT">  Submit</button> <br> -->
                    </form>
                    
                    <div class="card-footer border-0 py-5">
                        <!-- <span class="text-muted text-sm">Showing 10 items out of 250 results found</span> -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
if(isset($_FILES['image'])){
    $errors = array();
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetmp = $_FILES['image']['tmp_name'];
    $filetype = $_FILES['image']['type'];
    $fext = explode("/", $filetype);
    $file_ex = strtolower(end($fext));
    $extention = array("jpeg","jpg","png","gif","jpeg");

    if (in_array($file_ex, $extention)==FALSE) {
        $errors[] = "please upload valid file type";
    }
    else if ($filesize > 2097152){
        $errors[] = "file size is too big";
    }
    else if(empty($errors)==TRUE){
        move_uploaded_file($filetmp, "picture/".$filename);
        echo "Success!!!";
    }
    else echo $errors;
}
else return FALSE;

try {
    include 'dbconnection.php';

    $sql="INSERT INTO room(room_type,capacity, bed_quantity,price, images) VALUES(?,?,?,?,?)";
    $sq= $db1->prepare($sql);

    $room_type = $_POST['room_type'];
    $capacity = $_POST['capacity'];
    $bed_quantity = $_POST['bed_quantity'];
    $price = $_POST['price'];
    $images = $filename;


    if($sq->execute(array($room_type,$capacity,$bed_quantity,$price,$images))){
        echo '<script>alert("Add Room successful!");</script>';
    }
    else echo "FAILED";
} catch (PDOException $e) {
    echo $e->getMessage();
}
$db1=null;}

?>
</body>
</html>