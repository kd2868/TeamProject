<?php

require 'functions/function_index.php';


if(isset($_SESSION['userType'] )){
	session_destroy();
}

header('location: /~perm_team4_2016/team_project/login.php');

?>