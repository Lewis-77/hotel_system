<?php
include ('dbconnection.php');
$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM room WHERE room_id = $id";
$db1->exec($sql);
header("location: roomdetail.php");
// ?>
