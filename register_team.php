<?php 
	include('connection.php');
		$team_name = $_POST['team_name'];
		if(!empty($team_name)){
		$query1 = mysql_query('SELECT `team_name` FROM `teams` WHERE `team_name`="'.$team_name.'"');
		
		if(mysql_num_rows($query1)!=0){
			echo "<span style='color:red'><strong>Team already exist, choose some other team name</strong></span>";
			}else{
			$flag = 0;
			if($flag==0){
			$query = mysql_query('INSERT INTO `teams` (`id`,`team_name`) VALUES( "NULL", "'.$team_name.'")');
			if($query){
				$flag = $flag + 1;
				echo "<span style='color:green'><strong>Team Successfully Registered!</strong></span>";
			}
			}
		}
		}else{
			echo "<span style='color:red'><strong>Please fill in the team name</strong></span>";
			}
?>

