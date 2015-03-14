
<html>
<head>
<title>Players Data</title>
<style>
body{
	background-color:#CEE3F6;
}
#heading{
	text-align: center;
}
table.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #bcaf91;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#ded0b0;border-width: 1px;padding: 8px;border-style: solid;border-color: #bcaf91;text-align:left;}
table.tftable tr {background-color:#e9dbbb;}
table.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #bcaf91;}
</style>
<script>
window.onload=function(){
	var tfrow = document.getElementById('tfhover').rows.length;
	var tbRow=[];
	for (var i=1;i<tfrow;i++) {
		tbRow[i]=document.getElementById('tfhover').rows[i];
		tbRow[i].onmouseover = function(){
		  this.style.backgroundColor = '#ffffff';
		};
		tbRow[i].onmouseout = function() {
		  this.style.backgroundColor = '#e9dbbb';
		};
	}
};
</script>

</head>
<body>
<h1 id="heading">Players Data</h1>
<div id="form">
		<form  action="player_data.php" method="POST">
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
</div>

</body>
</html>
<?php 
	include('connection.php');
	if(isset($_POST['round_id'])){
			$round = $_POST['round_id'];
			$query = mysql_query('SELECT `player_name` , `country` ,`type` ,`six` ,`four` ,`wicket` ,`run` ,`player_score` FROM '.$round.' ORDER BY `player_id`');
			if($query){
				?>
	<table id="tfhover" class="tftable" border="1">
<tr><th><strong><span style="align:center;font-size:20px;font-weight:bold">Player Name</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Country</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Type</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Six</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Four</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Wicket</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Run</span></strong></th><th><strong><span style="align:center;font-size:20px;font-weight:bold">Overall Score</span></strong></th></tr>
	
	<?php 	while($row=mysql_fetch_assoc($query)){
		?>
<tr><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['player_name']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['country']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['type']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['six']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['four']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['wicket'];?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['run']; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $row['player_score'] ;?></span></td></tr>

		<?php 
			}
			}else{
				echo "Error";
			}
		}
	
?>
</table>