<?php
	// Updates the user's password with a temporary one (5-bit) 
	// if the input username and email are correct.
	
	include "base.php";
	include "global.php";
	
	$userName = mysqli_real_escape_string($con, $_POST['userName']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = strtoupper(substr(md5(microtime()),rand(0,26),5));
	
	if(!empty($userName) && !empty($email)) {
		mysqli_query($con, "call spUserFindPassword('".$userName."', '".$email."', '".$password."')"); 
			
		if(mysqli_affected_rows($con) > 0) {		
			showMessage($password);
		} else {
			showMessageRedirect(RECOVER_MSG2, 2);
		}
	} else {
		showMessageRedirect(RECOVER_MSG2, 2);
	}
	
?>