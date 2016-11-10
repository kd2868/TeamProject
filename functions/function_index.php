<?php
	require 'login_functions.php';
	require 'webpage_generation.php';
	require 'form_generation.php';
	require 'database_functions.php';
	$path = dirname(__DIR__); 
	$path = substr($path,0,40);
	require $path.'/dataBaseConnect.php';
	
?>