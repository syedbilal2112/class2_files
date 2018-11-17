<?php 
include "conn.php";
$id = $_POST['id'];
	$userId = $_POST['userId'];
	$rfrId = $_POST['rfrId'];
	$status = $_POST['status'];
	$approvalStatus = $_POST['approvalStatus'];
	$is_hit = $_POST['is_hit'];

	$query="INSERT INTO `wp_user_kyc`(`id`, `userId`, `rfrId`, `status`, `approvalStatus`, `is_hit`) VALUES ('$id','$userId','$rfrId','$status','$approvalStatus','$is_hit')";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "succssfully Registered";
		$query="UPDATE `WP_USERS` SET `KYCFlag` = 1 WHERE `ID` = $userId";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "succssfully updated";
		
	}
	else{
		echo "Error in Registration";
	}
	}
	else{
		echo "Error in Registration";
	}


 ?>