<?php


	include 'conn.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query="SELECT password FROM `users` WHERE `email`='$email'";
	session_start();
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   	$user_entered_password=$row[0];
   	if(password_verify($password, $user_entered_password)){
   		$_SESSION[$email]=$email; 
   		header("location: index.php?email=$email");
   	}
   else{
   	$message="Password or Email Address incorrect";
   		header("location: login.php?message=$message");
   	
   }
   	
   	
?>