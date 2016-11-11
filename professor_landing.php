<?php

	require 'functions/function_index.php';
	//redirect if not logged in
	if(!isset($_SESSION['userType'])){
		header('location: /~perm_team4_2016/team_project/login.php');
		return;
	}
	
	echo '
	
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prof Landing page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    
	 <link href="css/portfolio-item.css" rel="stylesheet">
	 <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    
                        Welcome Professor Jones
                    
                </li>
                <li>
                    <a href="professor_landing.php">Dashboard</a>
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
				  <a href="logout.php">
				  Sign out
				<span style= "padding-right:60px;"class="glyphicon glyphicon-log-out"></span>
				</a>
				</li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
	<div class="row">
		<div class="col-lg-12">
		
			
						
						
					<!-- Navigation -->
						<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
							<div class="container">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										
									</button>
									<a class="navbar-brand" href="prof-landingpage.html">Home</a>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav">
									<!-- This controlls the drop down menu for problems -->
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Problems <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Archive of Problems</a></li>
												<li><a href="#">Problem Creation</a></li>
												
											</ul>
											
									<!-- This controlls the drop down menu for calender -->		
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Calendar <span class="caret"></span></a>
											 <ul class="dropdown-menu">
												<li><a href="#">Add Event</a></li>
												<li><a href="#">View</a></li>
												
											  </ul>   
									<!-- This controlls the drop down menu for classes -->
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Classes <span class="caret"></span></a>
											  <ul class="dropdown-menu">
												<li><a href="#">Grades</a></li>
												<li><a href="#">Notifications</a></li>
												<li><a href="#">Class Listing</a></li>
												<li role="separator" class="divider"></li>
												<li><a href="#">Separated link</a></li>
											  </ul>
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
						</nav>	
						
			
						<!--Class contianer  -->
					<div class = "cContainer">
						<div class="panel panel-primary">
							<div class="panel-heading">Class</div>
								<div class="panel-body"> 
									<div class="class-continer">	
										<ul class = "class-list" style="list-style-type:none">
											<li> CSIS 225 - OOP </li>
											<li> CSIS 410 - Software Design </li>
											<li> CSIS 390 - Web Application Design</li>
										</ul>
									</div>
						
								</div>
						</div>
					</div>
		
		</div>
	</div>
					<!-- Footer -->
							<footer>
								<div class="row">
									<div class="col-lg-8">
										<p>
											
											<a href="https://www.siena.edu/">Siena College</a>
										</p>
										<p>Copyright &copy; //NoComment 2016</p>
									</div>
								</div>
								<!-- /.row -->
							</footer>
		
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
	';
	
	/*
	require 'functions/function_index.php';
	
	//redirect if not logged in
	if(!isset($_SESSION['userType'])){
		header('location: /~perm_team4_2016/team_project/login.php');
		return;
	}
	
	echo createHeader('Professor Landing');
	echo createSideBar();
	echo createTopNavigation();
	
	echo ' <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>';
	echo createFooter();
	*/
?>
