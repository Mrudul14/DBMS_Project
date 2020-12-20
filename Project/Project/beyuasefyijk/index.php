<?php include_once('templates/header.php')?>

<div class="signup-form">
    <form id="registrationform" >
		<h2 style="color: white">Register</h2>
		<p class="hint-text" >To get the Latest Sports News.It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="full_name" id="Inputname" placeholder="Full_Name" required="required"></div>
			</div>        	
        </div>
         <div class="form-group">
                <select class="form-control" id="role" name="userRole">
                        <option value="" disabled selected hidden>Select User Type</option> 
                        <option value="public">User</option>
                        <option value="club">Organiser</option>
                    </select>
                </div>
        <div class="form-group">
        	<input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>      
		<div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-primary" id="reg_butt" value="submit"></input>
             
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#reg_butt').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){


            var full_name   = $('#full_name').val();
            
            var email       = $('#email').val();
            
            var password    = $('#password').val();
            

                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {full_name: full_name,email: email,password: password},
                    success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                })
                            
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
<?php include_once('templates/footer.php')?>