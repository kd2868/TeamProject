<?php
function createTextField($id, $label, $size) {
	$errorClass = null;
	$errorSpan = null;
	$value = $_POST[$id];
	if ($value == "!missing!") {
		$errorClass = " has-error";
		$errorSpan = '<span class="help-block">'.$label.' must be entered.</span>';
		$value = null;
	}
	return '
	   <div class="col-sm-'.$size.'">	
	   <div class="form-group'.$errorClass.'">
	   <label class="control-label" for="'.$id.'">'.$label.'</label>
	   <input type="text" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$label.'" value="'.$value.'">'.
	   $errorSpan.'
	 </div>
	 </div>';	
}	
function createSpecialTextField($typeOfTextField, $id, $label, $size) {
	$errorClass = null;
	$errorSpan = null;
	$value = $_POST[$id];
	if ($value == "!missing!") {
		$errorClass = " has-error";
		$errorSpan = '<span class="help-block">'.$label.' must be entered.</span>';
		$value = null;
	}
	return '
	   <div class="col-sm-'.$size.'">	
	   <div class="form-group'.$errorClass.'">
	   <label class="control-label" for="'.$id.'">'.$label.'</label>
	   <input type="'.$typeOfTextField .'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$label.'" value="'.$value.'">'.
	   $errorSpan.'
	 </div>
	 </div>';	
}
?>