<?php

function displayProblemsProfessor(){
	$output= '
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<div id="TableDescription">

				<h3 class= "pageText">
				Archive of Problems
				</h3>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
  
<div id = "datatable-display" class ="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">
		<table id="ProblemsDataTable" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Professor Name</th>
						<th>Name of Problem</th>
						<th>Class</th>
						<th>Date Submited</th>
						<th>Tags</th>
					   
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Professor Name</th>
						<th>Name of Problem</th>
						<th>Class</th>
						<th>Date Submited</th>
						<th>Tags</th>
					
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>Basic Addition Problem</td>
						<td>CSIS 110</td>
						<td>2015/06/12</td>
						<td>Operations, Math</td>
						
					</tr>
					<tr>
						<td>Anderson Bib</td>
						<td>Fibonacci Sequence</td>
						<td>CSIS 150</td>
						<td>2016/12/12</td>
						<td>Recursion, Induction</td>
					</tr>
				   
				</tbody>
		</table>
	</div>
	<div class="col-lg-1"></div>
</div>
<br>
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">
		
		 <a href="problemCreation.php" class="btn btn-info" role="button">Create a Problem</a>
		
	</div>
</div>
';

	return $output;
	
}


?>