<?php 
	include('connection.php');
	// Function to calculate the overall score for all the players of a round
	function player_points_calculator($fixture){
		$query1 = mysql_query('SELECT `player_id` ,`type` ,`run` ,`six` ,`four` ,`ball_faced` ,`duck` ,`wicket` ,`maiden_over` ,`catch` , `run_conceded` , `stumping` ,`direct_hit`, `run_out` , `dot` ,`ball_bowled` FROM '.$fixture.' ORDER BY `player_id`');
		if($query1){
				while($row = mysql_fetch_assoc($query1)){
							$player_id = $row['player_id'];
							$type = $row['type'];
							$run = $row['run'];
							$six = $row['six'];
							$four = $row['four'];
							$ball_faced = $row['ball_faced'];
							$duck = $row['duck'];
							$wicket = $row['wicket'];
							$dot = $row['dot'];
							$maiden_over = $row['maiden_over'];
							$catch = $row['catch'];
							$run_conceded = $row['run_conceded'];
							$stumping = $row['stumping'];
							$direct_hit = $row['direct_hit'];
							$run_out = $row['run_out'];
							$score = $run * 1;                   // One point for each run 
							$score = $score + (4 * $six) ;		 // two extra point for each six scored
							$score = $score + (2 * $four );		 // one extra point for each four scored
							$score = $score - (10* $duck);		 // penalty of five points for each duck
							$bonus = $run / 25 ;     			// bonus for each milestone of 25 runs 
							$score = $score + $bonus ;
							$pace_bonus = $run - $ball_faced ;   // Pace bonus (the player scoring more on few balls will be more valuable)
							$score = $score + (2 * $pace_bonus) ;  // pace bonus added 
							$score = $score + (20 * $wicket); 		// 20 points for each wicket taken by bowler
							$score = $score + (1 * $dot);			// one point for each dot ball
							$score = $score + (20 * $maiden_over);	// 20 points for each maiden over
							$pace_bonus_1 =  $row['ball_bowled'] - $row['run_conceded'];
							$score = $score + $pace_bonus_1 ;
							$score = $score + (10 * $catch);
							$score = $score + (15 * $stumping);
							$score = $score + (15 * $direct_hit);
							$score = $score + (15 * $run_out);
							
							$query2 = 'UPDATE '.$fixture.' SET `player_score`='.$score.' WHERE `player_id`="'.$player_id.'"';
								mysql_query($query2);
									
				}
		}else{
			echo "error";
		}
}
	
	
	function team_evaluator($fixture){
		$team_match = "team_".$fixture;
		$query3 = mysql_query('SELECT `id`,`team_id` ,`player_1` ,`player_2` , `player_3` , `player_4` , `player_5` ,`player_6` , `player_7` ,`player_8` ,`player_9` , `player_10` , `player_11` ,`score` FROM `team_match_1` ORDER BY `id`');
		if($query3){
		while($row3 = mysql_fetch_assoc($query3)){
				$team_id = $row3['team_id'];
				$player_1 = $row3['player_1'];
				
				$player_2 = $row3['player_2'];
				$player_3 = $row3['player_3'];
				$player_4 = $row3['player_4'];
				$player_5 = $row3['player_5'];
				$player_6 = $row3['player_6'];
				$player_7 = $row3['player_7'];
				$player_8 = $row3['player_8'];
				$player_9 = $row3['player_9'];
				$player_10 = $row3['player_10'];
				$player_11 = $row3['player_11'];
				$query4 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_1.'"');
				if($query4){
					$row4 = mysql_fetch_assoc($query4);
					$s1 = $row4['player_score'];
				}
				
				$query5 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_2.'"');
				if($query5){
					$row5 = mysql_fetch_assoc($query5);
					$s2 = $row5['player_score'];
				}
				
				$query6 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_3.'"');
				if($query6){
					$row6 = mysql_fetch_assoc($query6);
					$s3 = $row6['player_score'];
					
				}
				
				$query7 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_4.'"');
				if($query7){
					$row7 = mysql_fetch_assoc($query7);
					$s4 = $row7['player_score'];
					
				}
				
				$query8 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_5.'"');
				if($query8){
					$row8 = mysql_fetch_assoc($query8);
					$s5 = $row8['player_score'];
					
				}
				
				$query9 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_6.'"');
				if($query9){
					$row9 = mysql_fetch_assoc($query9);
					$s6 = $row9['player_score'];
					
				}
				
				$query10 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_7.'"');
				if($query10){
					$row10 = mysql_fetch_assoc($query10);
					$s7 = $row10['player_score'];
					
				}
				
				$query11 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_8.'"');
				if($query11){
					$row11 = mysql_fetch_assoc($query11);
					$s8 = $row11['player_score'];
				}
				
				$query12 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_9.'"');
				if($query12){
					$row12 = mysql_fetch_assoc($query12);
					$s9 = $row12['player_score'];
					
				}
				
				$query13 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_10.'"');
				if($query13){
					$row13 = mysql_fetch_assoc($query13);
					$s10 = $row13['player_score'];
					
				}
			
			$query14 = mysql_query('SELECT `player_score` FROM '.$fixture.' WHERE `player_id`="'.$player_11.'"');
				if($query14){
					$row14 = mysql_fetch_assoc($query14);
					$s11 = $row14['player_score'];
					
				}
			
			$score = $s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s10 + $s11;
			//echo $score;
			$final_query  = mysql_query('UPDATE '.$team_match.' SET `score`="'.$score.'" WHERE `team_id` = "'.$team_id.'"');
				if($final_query){
					
					//echo "Final query done";
				}
			}
				//echo "Working";
		}else{
			echo "error3";
		}
	}
	
?>


<?php 
	function update_leader($fixture){
		$table = "team_".$fixture;
		$qur = mysql_query('SELECT `team_id` , `score` FROM '.$table.' ORDER BY `id`');
		if($qur){
					while($row0=mysql_fetch_assoc($qur)){
						$team_id = $row0['team_id'];
						$new_score = $row0['score'];
							$q = mysql_query('SELECT `team_name` ,`id` FROM `teams` WHERE `id`="'.$team_id.'"');
							$r = mysql_fetch_assoc($q);
							$team_name = $r['team_name'];
						
						$qur1 = mysql_query('SELECT `current_score` , `team_name` ,`team_id` FROM `leader_board` WHERE `team_id`="'.$team_id.'"');
							if(mysql_num_rows($qur1)==0){
								$q1 = mysql_query('INSERT INTO `leader_board` (`team_id`,`team_name`,`current_score`) VALUES ( "'.$team_id.'","'.$team_name.'","'.$new_score.'")');
								}else{
								$array = mysql_fetch_assoc($qur1);
								$current_score = $array['current_score'];
								$current_score = $current_score + $new_score;
								$q3 =mysql_query('UPDATE `leader_board` SET `current_score`="'.$current_score.'" WHERE `team_id`="'.$team_id.'"');
								//echo "Updated";
							}
			}
		}
	}
?>



