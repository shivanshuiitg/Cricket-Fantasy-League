	<?php 
	include('connection.php');
	?>
	<html>
		<head><title>Player Selection</title></head>
	<style>
	.css_player {
    font-size: 16px;
    font-family: Trebuchet MS;
    font-weight: bold;
    text-decoration: inherit;
    -webkit-border-radius: 8px 8px 8px 8px;
    -moz-border-radius: 8px 8px 8px 8px;
    border-radius: 8px 8px 8px 8px;
    border: 1px solid #ee1eb5;
    padding: 9px 18px;
    text-shadow: 1px 1px 0px #c70067;
    cursor: pointer;
    color: #ffffff;
    display: inline-block;
    background: -webkit-linear-gradient(90deg, #ef027d 5%, #ff5bb0 100%);
    background: -moz-linear-gradient(90deg, #ef027d 5%, #ff5bb0 100%);
    background: -ms-linear-gradient(90deg, #ef027d 5%, #ff5bb0 100%);
    background: linear-gradient(180deg, #ff5bb0 5%, #ef027d 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff5bb0",endColorstr="#ef027d");
}

.css_player:hover {
    background: -webkit-linear-gradient(90deg, #ff5bb0 5%, #ef027d 100%);
    background: -moz-linear-gradient(90deg, #ff5bb0 5%, #ef027d 100%);
    background: -ms-linear-gradient(90deg, #ff5bb0 5%, #ef027d 100%);
    background: linear-gradient(180deg, #ef027d 5%, #ff5bb0 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ef027d",endColorstr="#ff5bb0");
}

.css_player:active {
    position:relative;
    top: 1px;
}
	
	
body{
	background-color:#CEE3F6;
}
#main_div div{
	display: inline-block;
}
#head{
	text-align:center;
	}
#team_select{
	margin: 1px;
	width: 150px;
	position:absolute;
	top:20px;
}
#match_number{
	position:absolute;
	left: 200px;
	top: 20px;
}

#batsman{
	width: 220px;
	border: 2px solid black;
	height: 400px;
	overflow: auto;
	position: absolute;
	left: 40px;
	top: 100px;
}
#bowler{
	width: 220px;
	border: 2px solid black;
	height: 400px;
	overflow: auto;
	position: absolute;
	left: 280px;
	top: 100px;
}
#wicket{
	width: 220px;
	border: 2px solid black;
	height: 400px;
	overflow: auto;
	position: absolute;
	left: 520px;
	top: 100px;
}
#all_rounder{
	width: 220px;
	border: 2px solid black;
	height: 400px;
	overflow: auto;
	position: absolute;
	left: 760px;
	top: 100px;
}
#your_team{
	width: 250px;
	border: 2px solid black;
	height: 400px;
	overflow: auto;
	position: absolute;
	left: 1000px;
	top: 100px;
}
li{
		padding: 0px;
		list-style:none;
		width: 200px;
	}
#num{
	position:absolute;
	left: 50px;
	top: 530px;
}
#message{
	position: absolute;
	left: 300px;
	top: 550px;
}
#confirm{
	position:absolute;
	left: 1000px;
	top:  600px;
	width: 150px;
	height: 40px;
	color: blue;
	font-size: 20px;
	font-weight:bold;
}

</style>
<body>
	<header>
		<h1 id="head">Select the players for teams</h1>
	</header>
	<div id="main_div">						<!-- Main div start here -->
	<div id="team_select">					<!-- List if teams -->
	<span style="color:green;font-weight:bold;font-size:20px;">Select Team</span><br/>
		<select id="team_selection">
		<?php 
		$query = mysql_query('SELECT `team_name`,`id` FROM `teams` ORDER BY `id` DESC');
		echo "<option value='#'>Select Team</option>";
		while($row=mysql_fetch_assoc($query)){
			$team_name = $row['team_name'];
			$team_id = $row['id'];
		?>
			<option value=<?php echo $team_id; ?> name=<?php echo $row['team_name']; ?> ><strong><?php echo $row['team_name']; ?></strong></option>	
		<?php }?>
		</select>
	</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="match_number">			<!-- Rounds -->
	<span style="color:green;font-weight:bold;font-size:20px">Select Round</span><br/>
		<select id="fixture">
			<option value="#">Select Match</option>
			<option value="match_1">Round-1</option>
			<option value="match_2">Round-2</option>
			<option value="match_3">Round-3</option>
			<option value="match_4">Round-4</option>
			<option value="match_5">Round-5</option>
			<option value="match_6">Round-6</option>
			<option value="match_7">Round-7</option>
		</select>
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="batsman">						<!-- Batsman -->
			<span style="color:green;font-size:20px;font-weight:bold" >Batsman</span><br/>
			<ul id="bat">
			</ul>		
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="bowler">
			<span style="color:green;font-size:20px;font-weight:bold">Bowlers</span><br/>
			<ul id="ball">
			</ul>
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="wicket">
			<span style="color:green;font-size:20px;font-weight:bold">Wicket Keepers</span></br>
			<ul id="wkt">
			</ul>
	
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="all_rounder">
			<span style="color:green;font-size:20px;font-weight:bold">All rounders</span></br>
			<ul id="all">
			</ul>
		
	</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<div id="your_team">	<!-- Your team -->
			<span style="color:green;font-size:20px;font-weight:bold"> Your Team</span><br/>
			<ul id="player_list">
			</ul>
	</div>
	<!-- End -->
	</div>
	<div id="num">
	<strong style="color: green;font-size:26px;font-weight:bold">Batsman :</strong ><span id="bat_num" style="color:blue;font-size:26px;font-weight:bold"></span><br/>
	<strong style="color: green;font-size:26px;font-weight:bold">Bowler :</strong><span id="ball_num" style="color:blue;font-size:26px;font-weight:bold"></span><br/>
	<strong style="color: green;font-size:26px;font-weight:bold">Wicket Keeper :</strong><span id="wkt_num" style="color:blue;font-size:26px;font-weight:bold"></span><br/>
	<strong style="color: green;font-size:26px;font-weight:bold">Allrounder :</strong><span id="all_num" style="color:blue;font-size:26px;font-weight:bold"></span><br/>
	</div>
	<span id="message" style="color:red;font-size:30px;font-weight:bold"></span>
	<input type="button" value="Cofirm" id="confirm"/>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/player_support.js"></script>
</body>
</html>