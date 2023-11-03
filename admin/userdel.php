<?php
include('dbconnection.php');
$id = $_GET['id'];

try {
    $sql = "DELETE FROM user WHERE user_id = $id";
    $db1->exec($sql);
    header("location: user.php");
} catch (PDOException $e) {
    // An error occurred (e.g., the user didn't book a room).
    // You can handle this by displaying a message to the user.
    
 
    echo "
                   <script>alert('This Account has made reservation! Please check reservation first!!')</script>
                   <script>window.location = 'user.php'</script>
                   ";
}
?>