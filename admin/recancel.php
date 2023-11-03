<?php
include ('dbconnection.php');
$id = $_GET['id'];
// echo $id;

$sql =  "DELETE `report`, `reservation`, `payment`
FROM `report`
INNER JOIN `reservation` ON `report`.`reservation_id` = `reservation`.`reservation_id`
LEFT JOIN `payment` ON `reservation`.`payment_id` = `payment`.`payment_id`
WHERE `report`.`reservation_id` = '$id';";

$db1->exec($sql);
header("location: reservationhistory.php");
?>

