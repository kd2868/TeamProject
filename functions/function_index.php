<?php
	
	//Start or Resume session
	session_start();
	
	
	require 'login_functions.php';
	require 'webpage_generation.php';
	require 'form_generation.php';
	require 'database_functions.php';
	require 'professor_landing_functions.php';
	require 'setting_functions.php';
	
	
	//dataBaseConnect function
	$path = dirname(__DIR__); 
	$path = substr($path,0,40);
	require $path.'/dataBaseConnect.php';
	
?>