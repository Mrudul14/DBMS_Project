<?php
require_once('config.php');
require_once('connect.php');
?>
<?php

if(isset($_POST)){

	
	$t1_id=$_POST['firsteam'];
	$t2_id=$_POST['secondteam'];
	$m_time=$_POST['time'];
	$s_id=$_POST['stadium'];
	$t1_goal=$_POST['team1goal'];
	$t2_goal=$_POST['team2goal'];
	$active='yes';
		
		$updatequery = mysqli_query($connect,"update matches set active = 'no' where active = 'yes'");
		if($updatequery){
			$sql = "INSERT INTO matches (t1_id,t2_id,m_time,s_id,t1_goal,t2_goal,active) VALUES(?,?,?,?,?,?,?)";
			$stmtinsert = $db->prepare($sql);
	
			$result = $stmtinsert->execute([$t1_id, $t2_id, $m_time, $s_id, $t1_goal, $t2_goal, $active]);
			if($result){
				echo 'Successfully saved.';
			}else{
				echo 'There were erros while saving the data.';
			}	
		}
		
}else{
	echo 'No data';
}