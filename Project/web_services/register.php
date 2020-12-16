<?php

header('Content-type: application/json');

require_once 'config/connect.php';

$name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
// $club = 'NULL';

 echo $email;
 alert('hy');


$sql_verify = mysqli_query($connect,"select email from user where email='$email'");
    if(mysqli_num_rows($sql_verify) > 0){
        // echo "fail";
        $response_array['status']='fail';
    }
    else{
        if($role == 'public'){
            $club = 'NULL';
            $approved = 'NULL';
        }
        else{
            // $sql_club_id = mysqli_query($connect,"select * from club where club_name='$clubName'");
            // $club_data = mysqli_fetch_assoc($sql_club_id);
            // $club = $club_data['club_id'];
            $approved = 'no';
        }
        $sql_insert = mysqli_query($connect,"insert into registration values ('','$name','$email','$password')");
        if($sql_insert){
            // echo "inserted";
            $response_array['status']='success';
        }
        else{
            // echo "failure";
            $response_array['status']='failure';
    
        }
       
    }



echo json_encode($response_array);


?>