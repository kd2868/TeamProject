<?php

function displayForgotPasswordForm(){
	return '
	<center><img class="img-responsive" src="images/compile.png" alt="{Compile}"></center>	
	<form method="post" action="login.php?action=processForgotPassword">
	 
	 <div class = "row">
	 <center><h4>Please type in your username so we can send you an email.</h4></center>
	 
	 </div>
	 <div class="row">
        <div class="col-sm-3"></div>
        '.createTextField("username", "Username", 6).'
        <div class="col-sm-3"></div>
    </div>
    
    
    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Send Email </button>
            <a class="btn btn-primary btn-lg" href="login.php" role="button">Back</a>
        </div>
		
        <div class="col-sm-3"></div>
        </div>
        
        
    </div>
        </form>
	';
}

function createLoginForm(){
	return '
	<center><img class="img-responsive" src="images/compile.png" alt="{Compile}"></center>	
	<form method="post" action="login.php?action=submit">
	 <div class="row">
        <div class="col-sm-3"></div>
        '.createTextField("username", "Username", 6).'
        <div class="col-sm-3"></div>
    </div>
    
     <div class="row" >
        <div class="col-sm-3"></div> 
        '.createSpecialTextField("password", "password", "Password", 6).'
        <div class="col-sm-3"></div> 
      </div>    
    
    
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4">
            <button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Submit </button>
            </div>
			<div class="col-sm-2">
			 <a class="forgot" href="?action=forgot">Forgot password?</a>
			 </div>
        <div class="col-sm-3"></div>
        </div>
        
        
    </div>
        </form>
	';
	
	
}

function processLoginForm(){
		
		/*
			check if user and password are null 
			-> error message to fill it out
			return login form modified
		*/
		$fieldMissing = false;
		foreach ($_POST as $key => $value) {
			$value = strval($value);
			if ($value == "")  {
			$_POST[$key] = "!missing!";
			$fieldMissing = true;
			}
		}
		if ($fieldMissing) {			
			return createLoginForm();
		}
	
		/*
			check if user name is in database and password is in database
			if not return error
		*/
		if(checkPassword('user')){
			return redirectIfLoggedIn();
		}
		else{
			$_POST['password'] = "!invalid!";
			return createLoginForm();
		}
}
	
function redirectIfLoggedIn(){
	if($_SESSION['userType'] == 2){
			header('location: /~perm_team4_2016/team_project/professor_landing.php');
			return;
	}
	else{
		header('location: /~perm_team4_2016/team_project/login.php');
		return;
	}
}

function processForgotPassword(){	
	//get username
	$submitted_username = $_POST['username'];
	//die($submitted_username);
	//if nothing was submitted
	if($submitted_username==''){
		$_POST['username'] = '!missing!';
		return displayForgotPasswordForm();
	}
	//connect to database
	$mysqli = databaseConnect();
	
	//prepare to execute sql statement
	if (!($stmt = $mysqli->prepare("SELECT email FROM user WHERE id=?"))) {
		die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
	}
	
	//bind username to statement... to avoid sql injection attacks
	$stmt->bind_param("s", $submitted_username );
	
	//execute statement and check for errors
	if (!$stmt->execute()) {
		die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
	}
	
	if (!$stmt->bind_result($email )) {
		echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	
	
	if ($stmt->fetch() && $email!='') {
		return sendEmail($email);
		return createLoginForm();
	}
	//if not valid
	$_POST['username']='!invalid!';
	return displayForgotPasswordForm();
	
	
	
}

function sendEmail($email){
	// send off email with link
	
	// have a quick email sent page and ok button back to log in
	return emailSent();
}

function emailSent(){
	return '<center><img class="img-responsive" src="images/compile.png" alt="{Compile}"></center>	
	<form method="post" action="login.php">
	 
    <div class="row">
	 <div class="col-sm-4"></div>
        <center>
			<div class="col-sm-4">
				<div class="alert alert-success" role="alert">
					Email Sent!
				</div>
			</div>
		</center>
	 <div class="col-sm-4"></div>
	</div>
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
            <button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Back To Login </button>
         </div>
		
        <div class="col-sm-5"></div>
        </div>
        
        
    </div>
        </form>
	';
}

function checkPassword($tableName) {
  //conenct to database
  $mysqli = databaseConnect();
  
  //get hashed password
  $submitted_passwd = hash( 'sha256', $_POST['password']);
  
  
  //get username
  $submitted_username = $_POST['username'];
    
  //prepare to execute sql statement
  if (!($stmt = $mysqli->prepare("SELECT id, password, userAccessLevel, lname, fname  FROM `".$tableName ."` WHERE id=?"))) {
    die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
  }

  //bind username to statement... to avoid sql injection attacks
  $stmt->bind_param("s", $submitted_username );

  //execute statement and check for errors
  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }
  
  //set stored password variable
  $stored_passwd = null;
  // bind results to variables
  if (!$stmt->bind_result($username, $stored_passwd, $admin_type, $last, $first )) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  
  //fetch results
  if ($stmt->fetch()) {
	  //check if hashed passwords match
    if ($stored_passwd == $submitted_passwd){
		//set session variables
		$_SESSION['userType'] = $admin_type;
		$_SESSION['username'] = $username;
		$_SESSION['lastName'] = $last;
		$_SESSION['firstName'] = $first;
		return true;
	}
    else
      return false;
  }
}

?>