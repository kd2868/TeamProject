<?php
	function createLoginForm($displayDate){
	return '
	<div class="alert alert-info">
	<strong>Date:</strong>'. $displayDate.'
	</div>
   <form method="post" action="login.php?action=submit">
   <h2>Login</h2>
	   <div class="row">'.		 
		   createTextField("username", "Username", 5).
		   createSpecialTextField("password", "password", "Password", 5).'
	   </div>
   <div class="row">
	   <div class="col-sm-4">
	   </div>
	   <div class="col-sm-4">
			<button style="text-align:center;" type="submit" class="btn btn-success btn-lg"> Submit </button>
	   </div>
   </div>
   </form>
   ';
}


?>