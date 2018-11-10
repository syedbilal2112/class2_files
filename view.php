<?php

	include 'conn.php';

	$query="SELECT * FROM `users`";
	$result=mysqli_query($con,$query);
	echo "<table><tr><th>Id</th><th>Name</th><th>Email</th><th>Password</th>";
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr><td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['password']."</td>";
	}
	
	// echo json_encode($json_data);

?>