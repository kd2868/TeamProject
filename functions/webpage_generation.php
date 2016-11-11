<?php
function createHeader($title) {
  $output= '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$title.'</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/portfolio-item.css">
  </head>
  </body>
  <div class="container">';
  return $output;
  }
  
  function createFooter() {
  $year = date('Y');
  return '
 
	<hr>
    <footer style ="text-align: center;">Copyright &copy ' .$year.' //No Comment </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>';
}

?>