<?php
	require 'functions/function_index.php';
	echo createHeader('Login Form');
	date_default_timezone_set('America/New_York');
	$displayDate = date(" F j, Y, g:i a");
	echo createLoginForm($displayDate);
	echo createFooter();
	
?>