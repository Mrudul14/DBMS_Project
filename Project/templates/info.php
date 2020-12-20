<?php
require_once 'checklogin.php';
require_once('config.php');
require_once('connect.php');
// $teams = mysqli_query($connect,"select * from teams");
// $teams2 = mysqli_query($connect,"select * from teams");
// $stadium = mysqli_query($connect,"select * from stadium");
$email=$_SESSION['email'];
$user = mysqli_query($connect,"select * from registration where approval='no' and email='$email'");
$userdata=mysqli_fetch_array($user);
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
<?php if($userdata['approval'] !='no'){ ?>
</head>

<body>
    <div class="">

    <div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <a href="logout.php" class="login"><i class="fa fa-user" style=" position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #;
  padding: 10px;"><?php echo $_SESSION['email']; ?>
  logout</i></a>
		<!-- <h2 style="color: white">Register</h2>
		<p class="hint-text" >To get the Latest Sports News.It's free and only takes a minute.</p> -->
       <!--  <div class="form-group">
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Team 1" required="required"></div> -->
		

        <!-- <div class="form-group mt-3">    
            <select class="form-control" id="firsteam" name="firsteam">
                <option value="" id="team1" disabled selected hidden>Enter Team 1</option>
                <?php
                    while($row = mysqli_fetch_array($teams)):;
                ?>
                 
                 <option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
                 <?php endwhile; ?>
            </select>
        </div>

         <div class="form-group mt-3">    
            <select class="form-control" id="secondteam" name="secondteam">
                 <option value="" id="team2" disabled selected hidden>Enter Team 2</option> 
                <?php
                    while($row2 = mysqli_fetch_array($teams2)):;
                ?>
               
                 <option value="<?php echo $row2[0]; ?>"> <?php echo $row2[1]; ?> </option>
                 <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group mt-3">    
            <label for="time">Time schedule</label>
                <input type="datetime-local" id="time" name="Matchtime">
        </div>
        <div class="form-group">
            <select class="form-control mb-3" id="stadium" name="stadium">
            <option value="" id="stadiums" disabled selected hidden>Enter Stadium</option>
             <?php
                    while($row3 = mysqli_fetch_array($stadium)):;
                ?>
               
                 <option value="<?php echo $row3[0]; ?>"> <?php echo $row3[1]; ?> </option>
                 <?php endwhile; ?>
        </div>

         <div class="form-group">
            <input type="text" class="form-control" id="team1goal" name="team1goal" placeholder="Goal Scored By Team1 " >
            <option value="" id="goal1"> </option>
        </div> -->

            <div class="form-group">
            <input type="text" class="form-control" id="tournamentname" name="tournamentname" placeholder="Name of the Tournament" >
            <option value="" id="tournaments"> </option>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="teamname" name="teamname" placeholder="Enter Name Of The Teams" >
            <option value="" id="teamnames"> </option>
        </div>


                            

       <!--  <div class="form-group">
        	<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
        </div> -->
          

		<!-- <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
        </div> -->
           

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="add" name="create" value="Post">ADD</button>
        </div>
        

    </form>
        <div class="form-group">
            <input type="submit"  value="Submit" class="btn btn-success btn-lg btn-block" onClick="myFunction()"/>
             <script>
                 function myFunction() {
                 window.location.href="organiserhome.php";
                  }
             </script>

        </div>
         
	
         </div>

    </div>

    <?php }
      else {
        echo 'Waiting for admin approval.Please refresh after 30min.';
       }?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#add').click(function(e){

            // var valid = this.form.checkValidity();

            // if(valid){


            var tournamentname   = $('#tournamentname').val();

            var teamname   = $('#teamname').val();

            // var secondteam  = $('#secondteam').val();

            // var stadium  = $('#stadium').val();

            // var team1goal  = $('#team1goal').val();

            // var team2goal  = $('#team2goal').val();
            
            // var email       = $('#email').val();
            
            // var password    = $('#password').val();


            

                 e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'infoprocess.php',
                    url: 'info2process.php',
                    data: {tournamentname: tournamentname, teamname: teamname},
                    success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                })
                    // window.location.href = "../home.php";
                            
                    },
                    error: function(data){
                        Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'type': 'error'
                                })
                    }
                });

                
            // }else{
                
            // }

            



        });     

        
    });
    
</script>
</body>
</html>