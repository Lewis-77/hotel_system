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
                <h1>Welcome to the Admin Dashboard</h1>
            </header>
           </div>
            <!-- Nav -->
            <div id="nav-top-tag" style="margin-left: 1%;">
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                        <a href="dashboard1.php" class="nav-link">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="userinfo.php" class="nav-link font-regular active">Reservations</a>
                    </li>
                </ul>
            </div>
                    
                
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0" id="reservation-header" style="font-size: larger;">Reservations details</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">Check In Date</th>
                                    <!-- <th scope="col">Guests</th> -->
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Paid Amount</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'dbconnection.php';
                                $sql = "SELECT 
                                        
                                        (SELECT `room_type` FROM `room` WHERE `room_id` = `re`.`room_id`) AS `rep_rtype`,
                                        (SELECT `reservation_id` FROM `reservation` WHERE `reservation_id` = `re`.`reservation_id`) AS `res_id`,
                                        (SELECT `check_in_date` FROM `reservation` WHERE `reservation_id` = `re`.`reservation_id`) AS `res_date`,
                                        
                                        (SELECT `username` FROM `user` WHERE `user_id` = (SELECT `user_id` FROM `reservation` WHERE `reservation_id` = `re`.`reservation_id`)) AS `res_username`,
                                        (SELECT `amount` FROM `payment` WHERE `payment_id` = (SELECT `payment_id` FROM `reservation` WHERE `reservation_id` = `re`.`reservation_id`)) AS `res_amount`
                                        
                                    FROM `report` AS `re`;";  //table selection
                                $statement = $db1->query($sql);
    
                                $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
    
                                if ($reservations) { //extracting row by row
                                    foreach ($reservations as $row) { ?>
                                    <tr>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            <?php echo $row['res_id']?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $row['rep_rtype']?>
                                    </td>
                                    <td>
                                        <?php echo $row['res_date'];?>
                                    </td>
                                   
                                   <td>
                                        <?php echo $row['res_username']?>
                                   </td>
                                   <td>
                                        $<?php echo $row['res_amount']?>
                                   </td>
            
                                    
                                    <td class="text-end">
                                        
                                        <!-- <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"> -->
                                        <!-- <a href="roomdel.php? id=<?php echo $row['room_id']?>" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </a> -->
                                            
                                        <!-- </button> -->
                                    </td>
                                </tr>
                                        
                                <?php }
                                } ?> <!-- PHP ends  -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <!-- <span class="text-muted text-sm">Showing 10 items out of 250 results found</span> -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>