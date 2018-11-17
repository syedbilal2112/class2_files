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
<?php $email=$_GET['email'];
	$message="Unauthorized Entry";
	session_start();
		if(!isset($_SESSION[$email])) { // if already login
		   header("location: login.php?message=$message"); // send to home page
		   exit; 
		}
	?>
	<div class="alert alert-success" role="alert"><?php
		echo "Successfully Logged In";
	?></div>
	<br>
	<a href="logout.php" class="btn btn-danger">Logout</a>
<form>
	<input class="form-control" type="text" id="name" name="name" placeholder="enter your name"><br>
	<input class="form-control" type="email" id="email" name="email" placeholder="entert your email"><br>
	<input class="form-control" type="password" id="password" name="password" placeholder="enter your password"><br>
	<button id="btn" type="button" class="btn btn-primary">Submit</button>
</form><br>
<table id="Table" class="table table-hover">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
	</tr>
</table>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Details</h4>
        </div>
        <div class="modal-body">
          <label> Name</label>
          <input  class="form-control" disabled type="text" id="name1" name="name"><br>
	<label> Email</label>
	<input  class="form-control" disabled type="email" id="email1" name="email"><br>
	<label> Password</label><input  class="form-control" disabled type="password" id="password1" name="password"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script type="text/javascript">
	function dele(id){
		alert(id)
		$.ajax({
            url:'delete.php',
            type:'post',
            data:{
              "id":id,
            },
            success:function(){
              alert('Deleted')
            },
            error:function(){
              alert('Error')
            }
          })
	}
		function view(id){
	$.ajax({
        url:'view1.php',
        type:'post',
        data:{
			"id":id
		},
		success: function(data){
			var obj=JSON.parse(data);
			alert(data)
               $.each(obj,function(index,value){
			 $('#name1').val(value.name);
			 $('#email1').val(value.email);
			 $('#password1').val(value.password);
			$('#myModal').modal('show');
		});
		},
		error:function(){
			alert('not right')
		}
      })
	}
		$(function(){

			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success: function(response){
					alert('hi')
					var obj=JSON.parse(response);

                        var table_content=""
                        $('#Table').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.password+"</td>";
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-primary' onclick='view("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#Table").append(table_content);
				},
				error: function(){
					alert('Something went wrong');
				}
			})

		})
</script>
</body>
</html>