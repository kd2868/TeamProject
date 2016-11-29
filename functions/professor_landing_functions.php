<?php


	
	
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