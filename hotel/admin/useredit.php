<?php 
	   include 'dbconnection.php';
	   $id=$_GET['id'];
	   $result=$db1->query("Select * FROM user WHERE user_id=$id");
	   if($result->rowCount()>0){
	       foreach ($result as $row) {
	           $uid=$row['user_id'];
	           $username=$row['username'];
	       }
	   }
	?>
	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name ="category_id" value= "<?php echo  $uid ?>">
		
		<label for="name">Username</label>
		<input type="text" name ="category_name" value= "<?php echo  $username ?>">

		<br><br>
		
		<input type="submit" name ="btnupdate" value="Save Changes">
	</form>
	
	
</body>
</html>

<?php 
    if(isset($_POST['btnupdate']))
  {
    echo $CategoryId. "id ...";
    
    $CategoryId= $_POST['category_id'];
    $CategoryName = $_POST['category_name'];
    
    $sql = "UPDATE category SET category_name=? WHERE category_id=?";
    $stmt= $db1->prepare($sql);
    $stmt->execute([$CategoryName,$CategoryId]);
    echo "Updating";
  
   // header("location: ViewAllCat.php");
  }
    
  
 ?>