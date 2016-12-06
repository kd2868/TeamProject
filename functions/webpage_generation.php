<?php

function displayName(){
	return '
	<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-10">
	<br>
	<h3>'.$_SESSION['firstName'] .'  '.$_SESSION['lastName'].'</h3><br>
	</div>
	</div>
	';
}

function createTopNavigation(){
	$toReturn = "";
	$toReturn = '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
				<a class="navbar-brand" href="professor_landing.php">
					<img alt="Home" src="images/whiteLogo.png" style="display: inline-block; height: 30px; margin-top: -5px">
				</a>
				
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<!-- This controlls the drop down menu for problems -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Problems <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="problemArchive.php">Archive of Problems</a></li>
							<li><a href="#">Create an Assignment</a></li>
							<li><a href="problemCreation.php">Problem Creation</a></li>							
						</ul>
					</li>
				<!-- This controlls the drop down menu for calender -->		
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Calendar <span class="caret"></span></a>
						 <ul class="dropdown-menu">
							<li><a href="#">Add Event</a></li>
							<li><a href="#">View Calendar</a></li>
							
						  </ul>   
					</li>
				<!-- This controlls the drop down menu for classes -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Classes <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#">Grades</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Class Listing</a></li>
						  </ul>
					</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<!--Settings-->
					<li>
					  <a href="settings.php">
					  Settings
								<span class="glyphicon glyphicon-wrench"></span>
					</a>
					</li>
					<!--Log out button-->
					<li>
					  <a href="logout.php">
					  Sign Out
								<span style= "padding-right:60px;" class="glyphicon glyphicon-log-out"></span>
					</a>
					</li>	  
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>	';
	return $toReturn;
}


function createHeader($title, $css, $script) {
  $output= '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
	<title>'.$title.'</title>
	
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/footer.css" rel="stylesheet">
	';
	
	// Add in the custom css
	foreach ($css as $key => $value) {
		$output .= '<link href="'. $value.'" rel="stylesheet">';
	}
	
	foreach ($script as $key => $value) {
		$footer .= '<script src="'. $value.'"></script>';
	}
	
	$output .='
  </head>
  <body>
  <div id="wrapper">
  <div id="container">
  <div class="content">';
  return $output;
  }
  
  function createFooter($scripts) {
  $year = date('Y');
  $footer = '
  </div>
  </div>
	</div>
			
			<footer class="footer">
      <div class="container">
	  <center><p></p>
        <p class="text-muted"><a href="https://www.siena.edu/">Siena College</a>
										<p>Copyright &copy; //NoComment '.$year.'</p>
										</p><p></p>
										</center>
      </div>
    </footer>
			
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	';
	// Add for each loop here
	foreach ($scripts as $key => $value) {
		$footer .= '<script src="'. $value.'"></script>';
	}
	
	$footer .= '	
  </body>
  </html>';
	
  return $footer;
}

?>