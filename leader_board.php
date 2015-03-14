<html>
<head><title>Leader Board</title>
<style>
body{
	background-color:#CEE3F6;
}
#heading{
	text-align:center;
	
}
table.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #9dcc7a;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#abd28e;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
table.tftable tr {background-color:#bedda7;}
table.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
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
		  this.style.backgroundColor = '#bedda7';
		};
	}
};
</script>

</head>
<body>
<h1 id="heading">Leader Board</h1>
<form method="POST" action="leader_board.php">
<input type="submit" value="Refresh" name="refresh"/>
</form>
</body>
</html>
<?php
include('connection.php');
if(isset($_POST['refresh'])){
		$query = mysql_query('SELECT `team_id` , `team_name` , `current_score` FROM `leader_board` ORDER BY `current_score` DESC');
		if($query){
			?>
			<table id="tfhover" class="tftable" border="1">
<tr><th><strong><span style="align:center;font-size:20px;font-weight:bold"><?php echo "RANK"; ?></span></strong></th><th><span style="align:center;font-size:20px;font-weight:bold"><?php echo "TEAM ID" ; ?></span></th><th><span style="align:center;font-size:20px;font-weight:bold"><?php echo "TEAM NAME "; ?></span></th><th><span style="align:center;font-size:20px;font-weight:bold"><?php echo "CURRENT SCORE"; ?></span></th></tr>
			<?php
			$i = 1;
			while($row = mysql_fetch_assoc($query)){
						$team_id = $row['team_id'];
						$team_name = $row['team_name'];
						$current_score = $row['current_score'];
				?>
	<tr><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $i; $i++; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $team_id; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $team_name; ?></span></td><td><span style="align:center;font-size:20px;font-weight:bold"><?php echo $current_score; ?></span></td></tr>
		
		
		<?php 				
				
			}
		}else{
			echo "error";
		}
}
?>
</table>