$(document).ready(function(){
	
			
		$('#team_selection').unbind('change').change(function(){
				team_id = $(this).val();
		});
																															/* Here we are sending the ajax request to three file : batsman_selector.php , 
																															bowler_selector.php , wicket_selector.php , allround_selector.php  */
		$('#fixture').unbind('change').change(function(){
		 match_id = $(this).val();
																			// Ajax Request to batsman_selector.php 
		$.post('batsman_selector.php',{ match_id:match_id },function(data){
				$('#bat').html(data);			// class: batsman
				
		});
																														// Ajax Request to bowler_selector.php
		$.post('bowler_selector.php',{match_id:match_id},function(data){
				$('#ball').html(data);		// class: bowler
		});
																														// Ajax Request to wicket_selector.php
		$.post('wicket_selector.php',{match_id:match_id},function(data){
				$('#wkt').html(data);			// class: wicket
		});
		                                                                                                              // Ajax Request to allround_selector.php
		$.post('allround_selector.php',{match_id:match_id},function(data){
				$('#all').html(data);			// class: all_round
		});
	});
	var batsman = 0;		// we need atleast 4 batsman 
	var bowler = 0;		// we need atleast 2 bowler
	var wicket_keeper = 0;		// we need exaclty 1 wicket keeper
	var all_rounder = 0;	
	
		$('#bat_num').html(batsman);
		$('#ball_num').html(bowler);
		$('#wkt_num').html(wicket_keeper);
		$('#all_num').html(all_rounder);
	var i = 1; 	
	var players=[];
	var stop = 1;
	$('.batsman').unbind().click(function(){
		
		player_name = $(this).text();
		player_id = $(this).attr('id');
		if(i<=11){
			$(this).attr('disabled','disabled').css('color',"red");
			batsman++; i++;
			$('#bat_num').html(batsman);
			var flag = 0;
			if(flag==0){
			$('#player_list').prepend("<li ><span class='css_player'>" + player_name + "</span>  </li><br/>");
				flag++;
				players.push(player_id);
			}
		}else{
			$('#message').show().html("You have selected 11 Players. No more Players allowed");
		}
		});
	$('.bowler').unbind().click(function(){
		player_name = $(this).text();
		player_id = $(this).attr('id');
		if(i<=11){
			$(this).attr('disabled','disabled').css('color',"red");
			bowler++; i++;
			$('#ball_num').html(bowler);
			$('#player_list').prepend("<li ><span class='css_player'>" + player_name + "</span>  </li><br/>");
			players.push(player_id);
		}else{
			$('#message').show().html("You have selected 11 Players. No more Players allowed");
		}
	});
	$('.wicket').unbind().click(function(){
		player_name = $(this).text();
		player_id = $(this).attr('id');
		if(i<=11 && wicket_keeper==0){
		$(this).attr('disabled','disabled').css('color',"red");
		wicket_keeper++; i++;
		$('#wkt_num').html(wicket_keeper);
		$('#player_list').prepend("<li><span class='css_player'>"+ player_name+"</span></li><br/>");
		players.push(player_id);
		}else{
			$('#message').show().html('Only one Wicket Keeper allowed');
		}
		
	});
	$('.all_round').unbind().click(function(){
		player_name = $(this).text();
		player_id = $(this).attr('id');
		if(i<=11){
			$(this).attr('disabled','disabled').css('color',"red");
			all_rounder++; i++;
			$('#all_num').html(all_rounder);
			$('#player_list').prepend("<li ><span class='css_player'>" + player_name + "</span>  </li><br/>");
			players.push(player_id);
		}else{
			$('#message').show().html("You have selected 11 Players. No more Players allowed");
			}
	});
	$('#confirm').unbind('click').click(function(){
		if(batsman==0 || bowler==0 || wicket_keeper==0 || all_rounder==0 || i ==1 || team_id==0 ){
				// its some trigger time bug !! no idea
		}else{
		
		if(batsman>=4 && bowler>=4 && wicket_keeper==1 && all_rounder>=1 && i==12){
				$(this).attr('disabled','disabled');
				player_array = players.join(',');
				match_id = match_id;
				team_id = team_id;
				console.log(player_array);	
				console.log(match_id);
				console.log(team_id);
				//console.log(team_name);
				// Now send Ajax Request to insert_player_for_team.php
				$.post('insert_player_for_team.php',{player_array:player_array,
																			team_id : team_id,
																			match_id:match_id
																			},function(data){
																				console.log(data);
																				$('#message').html('Successfully Added');
																			});
				}else{
				$('#message').show().html("Select the players according to rules given");
			}	
		}
	});
});
	
	
	
	
