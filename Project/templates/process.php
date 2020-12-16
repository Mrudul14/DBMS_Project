<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$name 		= $_POST['name'];
	$user		= $_POST['user'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];

		$sql = "INSERT INTO registration (name, user, email, password ) VALUES(?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name, $user, $email, $password]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}