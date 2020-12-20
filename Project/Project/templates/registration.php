<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Sports News</title>

<link href="images/favicon.ico" rel="icon" type="image/x-icon" />	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
	<!-- <div class="bg-image"> -->

	<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2 style="color: white">Register</h2>
		<p class="hint-text" >To get the Latest Sports News.It's free and only takes a minute.</p>
        <div class="form-group">
		    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required="required"></div>
		

        <div class="form-group mt-3">    
            <select class="form-control" id="user" name="user">
                <option value="" id="user" disabled selected hidden>Select User Type</option> 
                <option value="User">User</option>
                <option value="Organiser">Organiser</option>
            </select>
        </div>
                            

        <div class="form-group">
        	<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
        </div>
          

		<div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
        </div>
           

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="register" name="create" value="Sign Up" >Sign Up</button>
        </div>

    </form>
	
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var name 	= $('#name').val();

			var user  = $('#user').val();
			
			var email 		= $('#email').val();
			
			var password 	= $('#password').val();


			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {name: name, user: user, email: email,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
					window.location.href = "login.php";
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
<!-- </div> -->
</body>
</html>