<?php

	include 'conn.php';

	$userId=$_POST['userId'];

	$query="SELECT * FROM `wp_users` WHERE ID = '$userId'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result));
	$res=$row['ID'];
	$query="UPDATE `wp_users` SET blackList = 1 WHERE ID='$res'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "succssfully updated";
		
	}
	else{
		echo "Error in Registration";
	}
?>