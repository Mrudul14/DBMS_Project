<!-- login code -->
<?php
require_once 'config.php';
require_once 'connect.php';
// $clubList='<option value="public" selected>Public</option>
// <option value="club">Club Member</option>';

// $club_result = mysqli_query($db,"select * from registration");
// if(mysqli_num_rows($sql_sel_query)>0){
//   foreach($products as $ap)
//   {
//     $name = $ap['club_name'];
//     $id = $ap['id'];
//   }
// }
// else{
  
// }

// $result_array = array();

// while($r=mysqli_fetch_assoc($sql_sel_query)){
//     if (!isset($result_array[$r['club_name']])){
//         $result_array[$r['club_name']] = array();
//     }
//     $result_array[$r['club_name']][] = $r['club_name'];
// }

// $html = "";
// foreach($result_array as $key => $value){

//   $clubList='<option value=\"$service\" selected>$service</option>';




//     $clubList = "
//     <div class=\"list\">
//         <h3 class=\"secondary\">$key</h3>
//             <ul>";
//         foreach($result_array[$key] as $service){
//             $clubList = "<li>$service</li>\n"; 
//         }
//     $clubList = "</ul></div>";
// }

// echo $html;

// after login

if(isset($_POST['login_button'])){

  $userEmail = $_POST['email'];
  $userPassword = $_POST['password'];

  $sql_check1a = mysqli_query($connect,"select * from registration where email='$userEmail'");
  $sql_check1b = mysqli_query($connect,"select * from registration where email='$userEmail' and password='$userPassword'");
 
  if((mysqli_num_rows($sql_check1a)>0)){
    if(mysqli_num_rows($sql_check1b)>0){
      // successful
      session_start();

      $user_data = mysqli_fetch_assoc($sql_check1b);

      if(isset($_SESSION['email']) || isset($_SESSION['name']) || isset($_SESSION['id'])){
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        unset($_SESSION['id']);
       

        $_SESSION['email']=$user_data['email'];
        $_SESSION['name']=$user_data['name'];
        $_SESSION['id']=$user_data['id'];

        setcookie("login_msg",$_SESSION['email'],time()+(10));
        setcookie("login_msg",$_SESSION['name'],time()+(10));
        setcookie("login_msg",$_SESSION['id'],time()+(10));

      }
      
      // if($user_data['user']=='admin'){

      //   header('location:templates/index.php');

      // }
      if($user_data['user']=='user'){

        header('location:userhome.php');
      }
      else{
        // public
     
        header('location:organiserhome.php');
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

  // $sql_check2 = mysqli_query($connect,"select * from puser where emeail='$userEmail' and password='$userPassword'");
  // if(mysqli_sum_rows($sql_check2)>0){

  // }
  // else{
  //   $msg='<div class="alert alert-danger mt-5" role="alert">
  //   Oops looks like this email is not registered.
  //   </div>';
  // }

  // $sql_check3 = mysqli_query($connect,"select * from admin where emeail='$userEmail' and password='$userPassword'");
  // if(mysqli_sum_rows($sql_check3)>0){

  // }
  // else{
  //   $msg='<div class="alert alert-danger mt-5" role="alert">
  //   Oops looks like this email is not registered.
  //   </div>';
  // }


}
// else{
//   $msg='<div class="alert alert-danger mt-5" role="alert">
//   error submitting
//   </div>';
// }



?>

<?php include_once 'header.php' ?>

<div class="container text-center">   
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
