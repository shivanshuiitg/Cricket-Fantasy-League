$(document).ready(function(){
	// Handling the check for already registered team
		$('#team_name').keyup(function(){
			var t_name = $(this).val();
			$.post('check_team.php',{team: t_name},function(data){
				$('#back').html(data);
			})
		});
	// Handling for loading the home.html
		$('#home').click(function(){
			$('#main_content').load('home.html');
		});
	// Handling for loading register.php
		$('#register_team').click(function(){
			
			$('#main_content').load('register.php');
		});
	// Handling for dynamically updating the right side div on main page
		$('#continue').unbind().click(function(){
			var team_name = $('#team_name').val();
			var flag = 0;
				if(flag==0){
				$.post('register_team.php',{team_name:team_name},function(data){
					flag++;
					$('#back').html(data);
					$('#reg_teams').prepend("<li class='css_button1'><strong>" + team_name + "</strong></li><br><br>");
				});
				}
		});
	// Handling the loading into main content and sending user for players selection page 
		$('#player_selection').click(function(){
			$('#main_content').html("<strong > You have been refered to Player Selection Page </strong>");
		});
	// Handling the loading of result
		$('#show_result').click(function(){
			$('#main_content').load('result.php');
		});
	/*	$('#player_data').click(function(){
			$('#main_content').html("You have been refered to Player Data page");
		}); */
	
});