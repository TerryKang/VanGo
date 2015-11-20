<?php	
	// Stores user's contact information (contactName, email, subject, 
	// message) when the form is submitted.
		
	include "base.php";
	include "global.php";
	
	$yourName = mysqli_real_escape_string($con, $_POST['yourName']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$subject = mysqli_real_escape_string($con, $_POST['subject']);
	$message = mysqli_real_escape_string($con, $_POST['message']);	
	
	if(!empty($yourName) && !empty($email) && !empty($subject) && !empty($message)) {
		$contactUpdate = mysqli_query($con, "call spContactUpdate(0,'".$yourName."', '".$email."', '".$subject."', '".$message."')"); 
		if($contactUpdate) {		
			showMessageRedirect(CONTACT_MSG, 0);
		} else {
			header("location:javascript://history.go(-1)");
		}	
	} else {
		header("location:javascript://history.go(-1)");
	}
	
?>