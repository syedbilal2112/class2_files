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
	<?php 
	$id=$_GET['id'];
	include 'conn.php';
	$query="SELECT * FROM `users` WHERE `id`='$id'";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['id'];
		$name=$row['name'];
		$email=$row['email'];
		$password=$row['password'];
		$profile_pic=$row['profile_pic'];
	}
	?>
<form>
	<input type="hidden" name="id" id="id" value="<?php echo $id;?>">

	<input class="form-control" type="text" id="name" name="name" placeholder="enter your name" value="<?php echo $name;?>"><br>

	<input class="form-control" type="email" id="email" name="email" placeholder="entert your email" value="<?php echo $email;?>"><br>

	<input class="form-control" type="password" id="password" name="password" placeholder="enter your password" value="<?php echo $password;?>"><br>

	<img src="<?php echo $profile_pic?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%">
    <input type="file" name="files[]" id="file"  required/>
    <br>
     <button type="button" id="upload_profile_pic" class="btn btn-primary ">Update Pic</button>

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
		$(function(){
				$('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    form_data.append('id', 1);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
               });
			$('#upload_profile_pic').on('click', function () {
                  var id=$("#id").val();
                  var profile=x;
                   
	                $.ajax({
	                    url:"update_profile_pic.php",
	                    type:"post",
	                    data:{
	                        "id":id,
	                        "profile":profile
	                    },
	                    success:function(data){
	                      alert(data);
	                     // window.reload();   
	                      },
	                      error:function(){
	                        alert(';hi');
	                      }
	        		});
           
      });

		$('#btn').click(function(){
			var id=$('#id').val();
			var name=$('#name').val();
			var email=$('#email').val();
			var password=$('#password').val();
		alert(name)
		$.ajax({
                    url:'update.php',
                    type:'post',
                    data:{
                      "name":name,
                      "email" : email,
                      "password": password,
                      "id":id
                    },
                    success:function(){
                      alert('Inserted')
                    },
                    error:function(){
                      alert('Error')
                    }
                  })
		})

			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success: function(response){
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