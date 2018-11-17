<?php

	include 'conn.php';

	$userId=$_POST['userId'];
	$source_doc_num=$_POST['source_doc_num'];
	$query="SELECT * FROM `wp_user_kyc_docs` WHERE userId != '$userId'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result));
	$res=$row['source_doc_num'];
	if(password_verify($source_doc_num, $res)){
		echo "{success:1}";
	}
	else{
		echo "{success:0}";
	}

?>