<?php

	require 'functions/function_index.php';
	
	//redirect if not logged in
	if(!isset($_SESSION['userType'])){
		header('location: /~perm_team4_2016/team_project/login.php');
		return;
	}

	$css = array('css/portfolio-item.css'
	
	
	);
	$script = array ('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
	'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');

	echo createHeader('Professor Landing Page', $css, $script);
	echo createTopNavigation();
	echo displayName();
	
	//generate classes
	
	echo displayCourses();
	
	
	$scripts = array('js/MenuToggle.js');
	echo createFooter($scripts);
?>
