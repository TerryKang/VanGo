<?php
	// Saves user's updated information (realName, password, email, gender, age,
	// city, occupation, hobbies, userIp) when the form is submitted.
	
	include "base.php";
	include "global.php";
	
	$userId = $_SESSION['UserId'];
	$realName = mysqli_real_escape_string($con, $_POST['realName']);
	$password = mysqli_real_escape_string($con, $_POST['oldPassword']);
	$password1 = mysqli_real_escape_string($con, $_POST['newPassword']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$occupation = mysqli_real_escape_string($con, $_POST['occupation']);
	$hobbies = mysqli_real_escape_string($con, $_POST['hobbies']);
	$userIp = $_SERVER['REMOTE_ADDR'];
	$userName = null;
	$phone = null;	
	if(empty($age)) $age = 18;
	
	if(!empty($userId) && !empty($password) && !empty($email)) {
		$userUpdate = mysqli_query($con, "call spUserUpdate('".$userId."','".$userName."', '".$realName."', '".$password."', '".$password1."', '"
						.$gender."', $age, '".$email."', '".$phone."', '".$city."', '".$occupation."', '".$hobbies."', 1, '".$userIp."')"); 
		if($userUpdate->num_rows > 0) {
			$row = mysqli_fetch_array($userUpdate);
			$userId = $row['UserId'];
			if($userId > 1) {
				showMessageRedirect(EDIT_MSG, 0);
			} else {
				showMessageRedirect(EDIT_MSG1, 2);
			}
		} else {
			showMessageRedirect(EDIT_MSG1, 2);
		}
	} else {
		showMessageRedirect(EDIT_MSG1, 2);
	}
	
?>