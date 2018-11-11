<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="mailer/index.php" method="post">
	<label> Name</label>
          <input  class="form-control" type="text" id="name" name="name" placeholder="Enter your name"><br>
	<label> Email</label>
	<input  class="form-control" type="email" id="email" name="email" placeholder="Enter your Email"><br>
	<label> Message</label><input  class="form-control" type="text" id="message" name="message" placeholder="Enter your message"><br>
	<label> Comment</label><textarea class="form-control" name="comment" placeholder="Enter your comment"></textarea>
	<button type="submit">Submit</button>
</form>
</body>
</html>