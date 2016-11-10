<?php
	require 'functions/function_index.php';
	
	date_default_timezone_set('America/New_York');
	$displayDate = date(" F j, Y, g:i a");
	echo createHeader('Login Form');
	if($_GET['action']!='submit'){
		echo createLoginForm($displayDate);
	}
	else{
		echo processLoginForm($displayDate);
		
	}
	echo createFooter();
	
?>