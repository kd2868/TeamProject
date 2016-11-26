<?php
function createHeader($title, $css, $script) {
  $output= '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$title.'</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
  </body>
  <div id="wrapper">
  <div id="container">
  <div class="content">';
  return $output;
  }
  
  function createFooter($scripts) {
  $year = date('Y');
  $footer = '
  </div>
  <div id="footer">
  <footer>
								<div class="row">
									<div class = "container text-center">
										<div class="col-sm-3"></div>
										<div class="col-sm-6">
											<p>
												
												<a href="https://www.siena.edu/">Siena College</a>
											</p>
											<p>Copyright &copy; //NoComment '.$year.'</p>
										</div>
										<div class="col-sm-3"></div>
									</div>
								</div>
								<!-- /.row -->
							</footer>
							</div>
    </div>
	</div>
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