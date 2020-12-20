<?php
require_once('config.php');
require_once('connect.php');
?>
<?php

if(isset($_POST)){

	
	$tournament_names=$_POST['tournamentname'];
	// $t2_id=$_POST['secondteam'];
	// $s_id=$_POST['stadium'];
	// $t1_goal=$_POST['team1goal'];
	// $t2_goal=$_POST['team2goal'];
	// $active='yes';
		
		// $updatequery = mysqli_query($connect,"update matches set active = 'no' where active = 'yes'");
		// if($updatequery){
			$sql = "INSERT INTO tournament (tournament_names) VALUES(?)";
			$stmtinsert = $db->prepare($sql);
	
			$result = $stmtinsert->execute([$tournament_names]);
			if($result){
				echo 'Successfully saved.';
			}else{
				echo 'There were erros while saving the data.';
			}	
		// }
		
}else{
	echo 'No data';
}