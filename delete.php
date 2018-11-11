<?php 
include "conn.php";
	$id = $_POST['id'];

	$query="DELETE FROM `users` where `id`='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "succssfully Deleted";
	}
	else{
		echo "Error in Registration";
	}
 ?>