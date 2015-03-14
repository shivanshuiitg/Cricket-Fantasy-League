<html>
<head><title>Result of Teams</title>
<style>
body{
	background-color:#CEE3F6;
}
table.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #a9a9a9;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#b8b8b8;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;text-align:left;}
table.tftable tr {background-color:#cdcdcd;}
table.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;}
</style>
<script type="text/javascript">
	window.onload=function(){
	var tfrow = document.getElementById('tfhover').rows.length;
	var tbRow=[];
	for (var i=1;i<tfrow;i++) {
		tbRow[i]=document.getElementById('tfhover').rows[i];
		tbRow[i].onmouseover = function(){
		  this.style.backgroundColor = '#ffffff';
		};
		tbRow[i].onmouseout = function() {
		  this.style.backgroundColor = '#cdcdcd';
		};
	}
};
</script>
</head>
<body>
		<h1 style="text-align:center;font-weight:bold">Team Results</h1>
			<form  action="show_result.php" method="POST">
			<select name="round_id">
					<option value="#">Select Round</option>
					<option value="match_1">Round 1</option>
					<option value="match_2">Round 2</option>
					<option value="match_3">Round 3</option>
					<option value="match_4">Round 4</option>
					<option value="match_5">Round 5</option>
					<option value="match_6">Round 6</option>
					<option value="match_7">Round 7</option>
			</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="submit" value="Submit"/>
		</form>
</body>
</html>
<?php 
	require('connection.php');
	require('calculation.php');
	if(isset($_POST['round_id'])){
				$round = $_POST['round_id'];
				player_points_calculator($round);
				team_evaluator($round);
				update_leader($round);
				?>
				
		
	<table id="tfhover" class="tftable" border="1">
<tr><th><strong><span style="align:center;font-size:22px;font-weight:bold">Team Id</span></strong></th><th><span style="align:center;font-size:22px;font-weight:bold">Team Name</span></th><th><span style="align:center;font-size:22px;font-weight:bold">Rank</span></th><th><span style="align:center;font-size:22px;font-weight:bold">Score</span></th></tr>
		<?php 
				$match_team = "team_".$round;
				$show = mysql_query('SELECT `score` , `team_id` FROM '.$match_team.' ORDER BY `score` DESC');
				if($show){
					$i = 1;
					while($rw= mysql_fetch_assoc($show)){
						
						$team_id = $rw['team_id'];
						$score = $rw['score'];
						$show2 = mysql_query('SELECT `team_name` FROM `teams` WHERE `id`="'.$team_id.'"');
							
									$rw1 = mysql_fetch_assoc($show2);
									$team_name = $rw1['team_name'];
									?>
		<tr><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $team_id; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $team_name; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $i;  $i++; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $score; ?></span></td></tr>

									
					<?php 
							
						
					
					
					
					
					
					
					
					
					}
			}
		}
?>

</table>