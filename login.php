<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
	$message=''; 
	if(isset($_GET['message'])){
		$message=$_GET['message'];
	};?>
<div style="width: 40%;margin: auto;background-color: #00e4ff;padding: 20px;margin-top: 30px;border-radius: 5px">
	<?php if($message!=''){?><div class="alert alert-danger" role="alert">
		<?php echo $message;
	?></div><?php }?>
<form action="verify.php" method="post">
	<input type="email" class="form-control" id="email" name="email" placeholder="enter your email"><br>
	<input type="password" class="form-control" id="password" name="password" placeholder="enter your password"><br>
	<button id="btn" class="btn" type="submit">Login</button>
</form>
</div>
</body>
</html>