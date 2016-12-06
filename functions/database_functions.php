<?php

function setNewPassword($id, $newPassword){
	
	//die($id );
	//die($newPassword);
  //conenct to database
  $mysqli = databaseConnect();
 
    
  //prepare to execute sql statement
  if (!($stmt = $mysqli->prepare("UPDATE user SET password = ? WHERE id = ?"))) {
    die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
  }

  //bind username to statement... to avoid sql injection attacks
  $stmt->bind_param("ss", 
		$newPassword,
		$id	
	);

  //execute statement and check for errors
  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }
  
  $stmt ->close();
  $mysqli->close();
  
	
	
}

function checkPasswordUpdate($tableName, $password) {
  //conenct to database
  $mysqli = databaseConnect();
  
  //get hashed password
  $submitted_passwd = hash( 'sha256', $password);
  
  
  //get username
  $submitted_username = $_SESSION['id'];
    
  //prepare to execute sql statement
  if (!($stmt = $mysqli->prepare("SELECT  password  FROM `".$tableName ."` WHERE id=?"))) {
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
  if (!$stmt->bind_result($stored_passwd)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
 
  //fetch results
  if ($stmt->fetch()) {
	  //check if hashed passwords match
    if ($stored_passwd == $submitted_passwd){
		//set session variables
		return true;
	}
    else
      return false;
  }
}

?>