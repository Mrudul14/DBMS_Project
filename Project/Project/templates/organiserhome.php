<?php include_once 'checklogin.php' ?>
<?php
require_once('config.php');
require_once('connect.php');
$teams = mysqli_query($connect,"select * from teams");
$teams2 = mysqli_query($connect,"select * from teams");
$stadium = mysqli_query($connect,"select * from stadium");
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
    <div class="">
         <a href="logout.php" class="login"><i class="fa fa-user"></i>Logout</a>

    <div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<!-- <h2 style="color: white">Register</h2>
		<p class="hint-text" >To get the Latest Sports News.It's free and only takes a minute.</p> -->
       <!--  <div class="form-group">
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Team 1" required="required"></div> -->
		

        <div class="form-group mt-3">    
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
                <input type="datetime-local" id="time" name="time">
                <option value="" id="datetime"> </option>
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
        </div>

            <div class="form-group">
            <input type="text" class="form-control" id="team2goal" name="team2goal" placeholder="Goal Scored By Team2 " >
            <option value="" id="goal2"> </option>
        </div>


                            

       <!--  <div class="form-group">
        	<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
        </div> -->
          

		<!-- <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
        </div> -->
           

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="post" name="create" value="Post">Post</button>
        </div>
        <!--  <div class="form-group">
            <input type="Submit" value="Edit result" name="" class="btn btn-success btn-lg btn-block" onClick="myFunction()"/>
             <script>
                 function myFunction() {
                 window.location.href="organiserhome.php";
                  }
             </script>

          </div>
     -->
    </div>

    </form>


    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#post').click(function(e){

            // var valid = this.form.checkValidity();

            // if(valid){


            var firsteam   = $('#firsteam').val();

            var secondteam  = $('#secondteam').val();

            var stadium  = $('#stadium').val();

            var team1goal  = $('#team1goal').val();

            var team2goal  = $('#team2goal').val();
            
            var time  = $('#time').val();
            
            // var password    = $('#password').val();


            

                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'matchprocess.php',
                    data: {firsteam: firsteam, secondteam: secondteam, stadium: stadium, team1goal: team1goal, team2goal: team2goal, time: time},
                    success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                })
                     window.location.href = "../home.php";
                            
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