<?php
	// Stores user's information (userName, realName, password, email, gender, 
	// age, city, occupation, hobbies, userIp) when the form is submitted.
	
	include "base.php";
	include "global.php";
	
	$userName = mysqli_real_escape_string($con, $_POST['userName']);
	$realName = mysqli_real_escape_string($con, $_POST['realName']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$age = mysqli_real_escape_string($con, $_POST['age']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$occupation = mysqli_real_escape_string($con, $_POST['occupation']);
	$hobbies = mysqli_real_escape_string($con, $_POST['hobbies']);
	$userIp = $_SERVER['REMOTE_ADDR'];
	$phone = null;
    $password1 = null;	
	//$passwordMD5 = md5($password);
	if(empty($age)) $age = 18;	
	
	if(!empty($userName) && !empty($password) && !empty($email)) {
		$userUpdate = mysqli_query($con, "call spUserUpdate(0,'".$userName."', '".$realName."', '".$password."', '".$password1."', '".$gender."', $age, '"
						.$email."', '".$phone."', '".$city."', '".$occupation."', '".$hobbies."', 1, '".$userIp."')"); 
		//$userUpdate = mysqli_query($con, "call spUserUpdate(0,'vango2', 'vango', '111', 'F', 24, 'vango@vango.ca', '', 'Burnaby', 'student', 'Hiking', 1, '127.0.0.1')"); 
				
		if($userUpdate && $userUpdate->num_rows > 0) {
			$row = mysqli_fetch_array($userUpdate);
			$userId = $row['UserId'];
			if($userId > 1) {
				showMessageRedirect(REGISTER_SUCCESS, 0);
			} else {
				showMessageRedirect(REGISTER_ERROR, 1);
			}
		} else {
			showMessageRedirect(REGISTER_ERROR, 1);
		}
	} else {
		showMessageRedirect(REGISTER_ERROR, 1);
	}
	
?>