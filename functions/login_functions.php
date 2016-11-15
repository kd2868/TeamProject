<?php

function createLoginForm($displayDate){
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
        <div class="col-sm-6">
            <button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Submit </button>
            </div>
        <div class="col-sm-3"></div>
        </div>
        
        
    </div>
        </form>
	';
	
	//old:
	/*
	'<div class="centeredContent">
		<div style="padding: 2%;">
			<div class="alert alert-info"><h2>Login</h2>
				<strong>Date:</strong>'. $displayDate.'
			</div>
		</div>
		<form method="post" action="login.php?action=submit">
	  
		   <div class="row">'.		 
			   createTextField("username", "Username", 5).
			   createSpecialTextField("password", "password", "Password", 5).'
		   </div>
	   <div class="row">
		   <div class="col-sm-4">
		   </div>
		   <div class="col-sm-offset-4">
				<button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Submit </button>
		   </div>
	   </div>
 
		</form>
   </div>
   ';
   */
}


function processLoginForm($displayDate){
		
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
			date_default_timezone_set('America/New_York');
			$displayDate = date(" F j, Y, g:i a");
			return createLoginForm($displayDate);
		}
	
		/*
			check if user name is in database and password is in database
			if not return error
		*/
		if(checkPassword('user')){
			return redirectIfLoggedIn();
		}
		else{
			date_default_timezone_set('America/New_York');
			$displayDate = date(" F j, Y, g:i a");
			$_POST['password'] = "!invalid!";
			return createLoginForm($displayDate);
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