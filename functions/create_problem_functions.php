<?php

function createAProblemForm(){
	return '
	<div class="row">
	<div class="col-sm-5"></div>
	<div class="col-sm-7">
	<div class="problem">

    <form method="post" action ="problemCreation.php?action=submit">
       
           <h3>Problem Name: </h3>
		   <br>
	       <input type="text" placeholder="Problem Name" />
       
        
        <br>
 
            Tags: <br>
            <label><input type="checkbox" value="Recursion"> Recursion</label><br>
            <input type="checkbox" /><input type="text" />
   
        <br>
            Type: <br>
            <select name="languages">
                <option value="Java">Java</option>
            </select>

        <br>
       
            Problem Description: <br>
            <textarea name="problem" rows="10" cols="60"></textarea>
    
        <br>
   
            Type:
            <input type="radio" name="type" value="function/method" checked /> Function/Method 
            <input type="radio" name="type" value="class" /> Class <br>

			
			Test Cases: <br>
	       <input type="text" placeholder="Input 1" /> <input type="text" placeholder="Output 1" />
		   <br>
		   <input type="text" placeholder="Input 2" /> <input type="text" placeholder="Output 2" />
		   
        <br>
    
            <button type="submit" class="btn btn-success">Submit</button>
    
    </form>  
    
    
</div> 
</div>
</div>';
	
	
}

function processCreateProblemForm(){
	//add code to finish it here
	//add to database  
	return completeAddAnother();
	
}

function completeAddAnother(){
	$output = '
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="alert alert-success" role="alert">Problem Created!
			Create another problem?</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5"></div>
		<div class="col-sm-1">
		<a href="problemCreation.php"><button class="btn btn-success">New Problem</button></a>
		</div>
		<div class="col-sm-3">
		<a href="problemArchive.php"><button class="btn btn-primary">Problem Archive</button></a>
		</div>
		
	</div>
	';
	return $output;
}

?>