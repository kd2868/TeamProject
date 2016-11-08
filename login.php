<?php
	require 'functions/function_index.php';
	
	echo createHeader('Login Form');
	if($_GET['action']!='submit'){
		date_default_timezone_set('America/New_York');
		$displayDate = date(" F j, Y, g:i a");
		echo createLoginForm($displayDate);
	}
	else{
		header('location: /~perm_team4_2016/team_project/professor_landing.php');
	}
	echo createFooter();
	
?>