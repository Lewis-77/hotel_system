<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['reserve']))
    {
        if(isset($_SESSION['add_reservation']))
        {
            $myitems = array_column($_SESSION['add_reservation'], 'name');
            if (in_array($_POST['name'], $myitems))
            {
                echo "<script>
                window.location.href='reservation.php';
            </script>";
            }else{
                
            }
        }
        else
        {
            
        }
    }
}
?>