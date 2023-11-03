<?php
	session_start();
 
	require_once 'conn.php';
 
	if(ISSET($_POST['login'])){
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
     
			$password = $_POST['password'];
			$sql = "SELECT * FROM `user` WHERE `email`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['user_id'];
				header("location:register.php"); //location change
			}  else{
				$sql = "SELECT * FROM `user` WHERE `email`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['user_id'];
				header("location:register.php");//location
			}
			else{
				echo "
				<script>alert('Invalid email or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'login.php'</script>
			";
		}
	}
?>