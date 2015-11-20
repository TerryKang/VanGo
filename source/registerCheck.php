<?php	
	// Checks the availability for username.
	
	include "base.php";
	
	//check we have username post variable
	if(isset($_POST["userName"]))
	{
		//check if its an ajax request, exit if not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		} 
			
		//trim and lowercase username
		$userName = mysqli_real_escape_string($con, $_POST['userName']);
			
		//check username in db
		$checkName = mysqli_query($con, "call spUserFindName('".$userName."')"); 	
		
		//if value is more than 0, username is not available
		if($checkName->num_rows > 0) {
			//echo '<img src="images/marks1.png" alt="unavailable" />';
			echo "<span class='msg'>This username already exists, please change it.</span>";
		}else{
			//echo '<img src="images/marks.png" alt="available"/>';
			echo "<span class='msg1'>Awesome, this username is ready for use.</span>";
		}
	}
?>