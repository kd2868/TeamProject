<?php


function displayCourses(){
	$output = '';
	$courseInfo = ''; // Get course info from database
	
	$output .= ' 
	<div class="row">
		<div class="col-sm-2"></div>
		<div class= "col-sm-4">
			<div class="panel panel-default">
				<div class= "panel-heading">
					CSIS 225 - Object Oriented Programming
				</div>
				<div class= "panel-body ">
					<div class="card">
			
						<div >
							<h4><b>01</b></h4> 
							<p>Fall 2016</p> 
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class= "col-sm-4">
			<div class="panel panel-default">
				<div class= "panel-heading">
					CSIS 110 - Introduction to Programming
				</div>
				<div class= "panel-body ">
					<div class="card">
			
						<div >
							<h4><b>01</b></h4> 
							<p>Fall 2016</p> 
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-sm-2"></div>
	</div>	
	<div class="row">
		<div class="col-sm-12">
		
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class= "col-sm-4">
			<div class="panel panel-default">
				<div class= "panel-heading">
					CSIS 110 - Introduction to Programming
				</div>
				<div class= "panel-body ">
					<div class="card">
			
						<div >
							<h4><b>04</b></h4> 
							<p>Fall 2016</p> 
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class= "col-sm-4">
			<div class="panel panel-default">
				<div class= "panel-heading">
					Programming Contest Team
				</div>
				<div class= "panel-body ">
					<div class="card">
			
						<div >
							<h4><b>01</b></h4> 
							<p>Fall 2016</p> 
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-sm-2"></div>
	</div>	
  </div>
';
	
	return $output;
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