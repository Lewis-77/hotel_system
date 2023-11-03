<?php
    session_start();

    require_once 'login_reg_conn.php';

    if(isset($_POST['login'])){
        if($_POST['email'] != "" || $_POST['password'] !=""){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM user WHERE email = :email";
            $query = $login_reg_conn->prepare($sql);
            $query ->execute(array($email,$password));
            $row = $query->rowCount();
            $fetch = $query->fetch();
            if($row > 0){
                $_SESSION['user'] = $fetch['use_id'];
                header("location: index.php");
            }else{
                echo "<script>alert('Invalid email or password')</script>";
                echo "<script>window.location = 'login.php'</script>";
            }
        }else{
            echo "<script>alert('Please complete the required field!')</script>";
			echo "<script>window.location = 'login.php'</script>";
        }
    }
?>