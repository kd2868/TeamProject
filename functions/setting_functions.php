<?php

function addSettingOptions(){
	$output = displayName();
	$output .= '
	<div>
		
		<br>
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<a href="settings.php?action=changePassword" class="btn btn-info" role="button">Change Password</a>
			</div>
		</div>
	</div>
	';
	return $output;
	
	
}

function createChangePassword($alert){
	$alert =  $alert;
	return '
	<br>
	<center><h1> Please Change your Password</h1></center>
	<br>
	'.
	$alert
	.'
	<form method="post" action="settings.php?action=submitChangePassword">
	 <div class="row">
        <div class="col-sm-3"></div>
        '.createSpecialTextField("password","oldPassword", "Current password", 6).'
        <div class="col-sm-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
		<center><div class="alert alert-info" role="alert"> Password needs at least 1 upper case letter, 1 lower case letter,
		1 digit,  and length between 8 and 30 characters</div></center>
		</div>
		</div>
     <div class="row" >
        <div class="col-sm-3"></div> 
        '.createSpecialTextField("password", "newPassword1", "New Password", 6).'
        <div class="col-sm-3"></div> 
      </div>    
    <div class="row" >
        <div class="col-sm-3"></div> 
        '.createSpecialTextField("password", "newPassword2", "Confirm new password", 6).'
        <div class="col-sm-3"></div> 
      </div>    
    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4">
            <button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Submit </button>
            </div>
			
        <div class="col-sm-3"></div>
    </div>
        
        
   
        </form>
	'
	;
	
	
}

function processChangePassword(){
	
	if($_POST['oldPassword']==''){
		//if you didn't type in a password, set password to missing
		$_POST['oldPassword'] = '!missing!';
		//echo '<br><br><br><br>';
		//die('here');
		$_POST['newPassword1']=null;
		$_POST['newPassword2']=null;
		return createChangePassword($alert);
	}
	//check if oldpassword is correct for the user	
	if(!checkPasswordUpdate('user', $_POST['oldPassword'])) {
		$_POST['oldPassword'] = '!invalid!';
		$_POST['newPassword1']=null;
		$_POST['newPassword2']=null;
		return createChangePassword($alert);
	}
	if($_POST['newPassword1']!=$_POST['newPassword2']){
			$alert = '
			<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
		<center><div class="alert alert-danger" role="alert"> Passwords do not match </div></center>
		</div>
		</div>';
			$_POST['oldPassword']=null;
			$_POST['newPassword1']=null;
			$_POST['newPassword2']=null;
			return createChangePassword($alert);
	}
	//check if it is a correct password, letter, number, special character
	
	if(!validateLengthOfPassword($_POST['newPassword1'])){
		$alert = '
			<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
		<center><div class="alert alert-danger" role="alert"> Password needs at least 1 upper case letter, 1 lower case letter,
		1 digit,  and length between 8 and 30 characters</div></center>
		</div>
		</div>';
			$_POST['oldPassword']=null;
			$_POST['newPassword1']=null;
			$_POST['newPassword2']=null;
			return createChangePassword($alert);
	}
	
	
	
	//update new password	
	$hashpasswd = hash( 'sha256', $_POST['newPassword1']);
	setNewPassword($_SESSION['id'], $hashpasswd);
	echo '<div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
		<center><div class="alert alert-success" role="alert"> 
		Password changed!
		</div></center>
		</div>
		</div>';
	return addSettingOptions();
	
}


function validateLengthOfPassword($password){
	
	if(strlen($password) < 8 || strlen($password) > 30){
		return false;
	}
	
	return preg_match("/[A-Z]/", $password) && preg_match("/[a-z]/", $password) && preg_match("/\d/", $password);
	
}

?>