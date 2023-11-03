<?php
    $servername= "localhost";
    $username = "root";
    $password = "";
    $db = "hotel_reservation";
    try {


        $db1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        // echo "Database connection success";

        $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "connection unsuccessful" . $e->getMessage();
    }
    ?>