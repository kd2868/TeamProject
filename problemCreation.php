<?php
require 'functions/function_index.php';
	
	//redirect if not logged in
	if(!isset($_SESSION['userType'])){
		header('location: /~perm_team4_2016/team_project/login.php');
		return;
	}

	$css = array('css/portfolio-item.css', 
	 'css/cssCreateProblem.css',
	 'http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css'
	);
	$script = array ('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
	'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');

	echo createHeader('Create a Problem Page', $css, $script);
	echo createTopNavigation();
	echo '<br>';
	
	if($_GET['action']==submit){
		echo processCreateProblemForm();
	}
	else{
		echo createAProblemForm();
	}
	
	$scripts = array('js/MenuToggle.js');
	echo createFooter($scripts);

?>