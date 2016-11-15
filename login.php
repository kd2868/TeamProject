<?php

	require 'functions/function_index.php';
	
	if(isset($_SESSION['userType'])){
		redirectIfLoggedIn();
		return;
	}
	
	
	$scripts = array("https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
	
	date_default_timezone_set('America/New_York');
	$displayDate = date(" F j, Y, g:i a");
	echo createHeader('Login Form');
	if($_GET['action']!='submit'){
		echo createLoginForm($displayDate);
	}
	else{
		echo processLoginForm($displayDate);
		
	}
	echo createFooter($scripts);
	
?>