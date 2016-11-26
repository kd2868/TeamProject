<?php
	
	require 'functions/function_index.php';
	
	if(isset($_SESSION['userType'])){
		redirectIfLoggedIn();
		return;
	}
	
	$bottomScripts = array();
	
	$css = array();
	$topscript = array();
	echo createHeader('Login Form', $css, $topscript );
	
	if($_GET['action']=='submit'){
		echo processLoginForm();
	}
	else if($_GET['action']=='forgot'){
		echo displayForgotPasswordForm();
		
	}
	else if ($_GET['action']=='processForgotPassword'){
		// Process username here
		echo processForgotPassword();
		//$failed=true;
		//if(!$failed){
			//echo createLoginForm();
		//}
		//if username is not in database, through issue
		//else send back to login
	}
	else{
		echo createLoginForm();
	}
	
	echo createFooter($bottomScripts);
	
?>