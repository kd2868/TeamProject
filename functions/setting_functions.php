<?php

function addSettingOptions(){
	return '
	<br>
	<h3>'.$_SESSION['firstName'] .'  '.$_SESSION['lastName'].'</h3>
	<div>
		
		<br>
		<div class="row">
			<div class="col-sm-4">
				<a href="settings.php?action=changePassword" class="btn btn-info" role="button">Change Password</a>
			</div>
		</div>
	</div>
	';
	
}

function createChangePassword($alert){
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
		return createChangePassword($alert);
	}
	//check if oldpassword is correct for the user	
	if(!checkPasswordUpdate('user', $_POST['oldPassword'])) {
		$_POST['oldPassword'] = '!invalid!';
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
	
	//update new password	
	$hashpasswd = hash( 'sha256', $_POST['newPassword1']);
	setNewPassword($_SESSION['id'], $hashpasswd);
	
	return addSettingOptions();
	
}
?>