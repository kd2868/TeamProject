<?php


function createTopNavigation(){
	$toReturn = "";
	$toReturn = '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
				<a class="navbar-brand" href="professor_landing.php">Home</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<!-- This controlls the drop down menu for problems -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Problems <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Archive of Problems</a></li>
							<li><a href="#">Create an Assignment</a></li>
							<li><a href="#">Problem Creation</a></li>							
						</ul>
						
				<!-- This controlls the drop down menu for calender -->		
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Calendar <span class="caret"></span></a>
						 <ul class="dropdown-menu">
							<li><a href="#">Add Event</a></li>
							<li><a href="#">View Calendar</a></li>
							
						  </ul>   
				<!-- This controlls the drop down menu for classes -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Classes <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="#">Grades</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Class Listing</a></li>
						  </ul>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<!--Log out button-->
					<li>
					  <a href="logout.php">
					  Sign Out
								<span style= "padding-right:60px;"class="glyphicon glyphicon-log-out"></span>
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
	
	
function createSideBar(){
	return '
	<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    
                        Welcome Professor '.$_SESSION['lastName'].'
                    
                </li>
                <li>
                    <a href="prof-landingpage.html">Dashboard</a>
                </li>
                <li>
                    <a href="#">Calendar</a>
                </li>
                <li>
                    <a href="#">Problems</a>
                </li>
                <li>
                    <a href="#">Grades</a>
                </li>
                <li>
                    <a href="#">Classes</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
				<!-- Log out button  -->
				<li>
				  <a href="#">
				  Sign out
				<span style= "padding-right:60px;"class="glyphicon glyphicon-log-out"></span>
				</a>
				</li>
            </ul>
        </div>
	';
}


?>