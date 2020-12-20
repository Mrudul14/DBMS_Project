<!-- login code -->
<?php

session_start();
// session_destroy();

require_once 'config.php';
require_once 'connect.php';
// 


if(isset($_SESSION['email'])){
  if($_SESSION['user']=='user'){

    header('location:../home.php');

  }
  else if($_SESSION['user']=='organiser'){

    header('location:info.php');
  
  }
}
else{
  if(isset($_POST['login_button'])){

    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $sql_check1a = mysqli_query($connect,"select * from registration where email='$userEmail'");
    $sql_check1b = mysqli_query($connect,"select * from registration where email='$userEmail' and password='$userPassword'");
   
    if((mysqli_num_rows($sql_check1a)>0)){
      if(mysqli_num_rows($sql_check1b)>0){
        // successful
        

        $user_data = mysqli_fetch_assoc($sql_check1b);

        $_SESSION['email'] = $userEmail;
        $_SESSION['user'] = $user_data['user'];

      
        if($user_data['user']=="User"){

          header('location:../home.php');
        }
        else{
          // public
       
          header('location:info.php');
        }
        
      }
      else{
        $msg='<div class="alert alert-danger mt-5" role="alert">
        Oops looks like we cannot identify this password. Try entering another password.
        </div>';
      }

    }
    else{
      $msg='<div class="alert alert-danger mt-5" role="alert">
      <i class="fas fa-times-circle"></i> Oops looks like this email is not registered. Try registering first.
      </div>';
    }

  


  }
}





?>

<?php include_once 'header.php' ?>

<div class="container text-center bg-image">   
    <div class="row" >
    
        <div class="col-sm-5">
            

        </div>
        <div class="col-sm-3 ch_position">
        <!-- <i class="fas fa-headphones-alt fa-4x mb-3"></i> -->
        <h3 class="ch_bold">Login</h3>
        <form action="" method="post">
            <div class="form-group">
                
                <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted"><i class="fas fa-lock"></i>We'll never share your email with anyone.</small>
                <span id="loginEmailError" class="ch-error text-center"></span>
            </div>
            <div class="form-group">
                
                <input type="password" class="form-control" id="loginPassword" placeholder="Password" name="password">
                <span id="loginPasswordError" class="ch-error"></span>
            </div>
            
            <button type="submit" class="btn login_button btn-block  btn-primary" id="loginButton" name="login_button" >Login</button>
            
        </form>

        <span class="float-center mt-1"><a href="registration.php">New Here? Click to register!</a></span>
        </br>
        <span class="float-center mt-1" ><a href="javascript:void(0)" data-toggle="modal" data-target="#passwordModal">Forgot password?</a></span>
        
        <?php echo @$msg; ?>
        </div>
        <div class="col-sm-5">
           

        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>
