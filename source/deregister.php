<?php
	include "base.php";
	include "global.php";
	
	$userId = $_SESSION['UserId'];
	mysqli_query($con, "call spUserRemove('".$userId."')"); 
		
	if(mysqli_affected_rows($con) > 0) {
		$_SESSION['UserName'] = null;
		$_SESSION['UserId'] = null;
		$_SESSION['LoggedIn'] = 0;	
		showMessageRedirect(DEREGISTER_MSG, 0);
	} else {
		showMessageRedirect(DEREGISTER_MSG1, 2);
	}
	
?>