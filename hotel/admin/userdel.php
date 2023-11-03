<?php
include ('dbconnection.php');
$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM user WHERE user_id = $id";
$db1->exec($sql);
header("location: user.php");
// ?>
