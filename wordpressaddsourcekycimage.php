<?php 
	include "conn.php";
	$id = $_POST['id'];
	$userId = $_POST['userId'];
	$rfrId = $_POST['rfrId'];
	$source_doc_id = $_POST['source_doc_id'];
	$source_doc_num = $_POST['source_doc_num'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$document_type = $_POST['document_type'];
	$createdAt = $_POST['createdAt'];
	

	$query="insert into user_kyc_docs (id, userId, rfrId, source_doc_id, source_doc_num, email, country, document_type, createdAt) values($id, '$userId','$rfrId', '$source_doc_id', '$source_doc_num', '$email', '$country', '$document_type', '$createdAt'";

	$result=mysqli_query($con,$query);
	if ($result) {
		echo "succssfully Registered";
		$query="UPDATE `WP_USERS` SET `KYCFlag` = 2 WHERE `ID` = $userId";
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