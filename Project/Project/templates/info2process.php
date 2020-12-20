<?php
require_once('config.php');
require_once('connect.php');
?>
<?php

if(isset($_POST)){

	
	$t_name=$_POST['teamname'];
	
	
			$sql = "INSERT INTO teams (t_name) VALUES(?)";
			$stmtinsert = $db->prepare($sql);
	
			$result = $stmtinsert->execute([$t_name]);
			if($result){
				echo 'Successfully saved.';
			}else{
				echo 'There were erros while saving the data.';
			}	
		// }
		
}else{
	echo 'No data';
}