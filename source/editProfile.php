<?php 
include "base.php"; 

if(!empty($_SESSION['UserId'])) {
	$userId = $_SESSION['UserId'];
	$userInfo = mysqli_query($con, "call spUserInfo('".$userId."')"); 
	if($userInfo->num_rows > 0) {	
		$row = mysqli_fetch_array($userInfo);
		$email = $row['Email'];
		$realName = $row['RealName'];
		$occupation = $row['Occupation'];
		$hobbies = $row['Hobbies'];
		$age = $row['Age'];
		$gender = $row['Gender'];
		$city = $row['City'];
	}
} else {
	header("location:javascript://history.go(-1)");
}
?>
<!doctype html>
<html lang="en">
 <head>
  <title>Edit Profile</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/form.css">
  <script language="JavaScript" src="include/global.js" type="text/javascript"></script>  
  <script>
		function confirmRemove()
		{
			if(window.confirm("Are you sure you want to remove your account? All your information saved on this site will be lost."))
			{
				window.open('deregister.php', '_parent');
			}
		}
			
		function validateEmail() {
			var email = $$('email', document);
			var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!pattern.test(email.value)) {
				//email.focus();
				$$('errEmail', document).innerHTML = "<span class=msg>youremail@example.com</span>";
				return false;
			} else {
				$$('errEmail', document).innerHTML = null;
				return true;
			}			
		}		

		/* 
			Validate real name using regular expression 
			Allowed: a-z, A-Z, dash(-), and underscore(_)
			Not allowed: numbers and invalid characters (#`!@$%, etc)
		*/
		function validateRealName(){
			var name = $$('realName', document);			
			var pattern = /^[a-zA-Z_-]+$/;
			if(name.value == null || name.value == '') return true;
			var val = name.value.replace(/\s/g, '');
			if(!pattern.test(val) || val.length < 3) {
				$$('errRealName', document).innerHTML = "<span class=msg>Your real name must contain at least 3 letters. <br />Dash(-) and underscore(_) are also allowed.</span>";
				return false;
			} else {
				$$('errRealName', document).innerHTML = null;
				return true;
			}
		}
		
		function validateAge() {
			var age = $$('age', document);
			var pattern = /^(?:(?!0)\d{1,2}|100)$/;
			if(age.value == null || age.value == '') return true;
			if (!pattern.test(age.value)) {
				//age.focus();
				$$('errAge', document).innerHTML = "<span class=msg>Age must be between 1 and 100.</span>";
				return false;
			} else {
				$$('errAge', document).innerHTML = null;
				return true;
			}			
		}
		
		//validate password
		function validatePassword() {
			var password = $$('oldPassword', document);
			if (password.value.length < 3) {
				$$('errPassword', document).innerHTML = "<span class=msg>Please enter your password.</span>";
				return false;
			} else {
				$$('errPassword', document).innerHTML = null;
				return true;
			}			
		}
		
		function validatePassword1() {
			var newPassword = $$('newPassword', document);
			var newPassword1 = $$('newPassword1', document);
			if((newPassword.value == null || newPassword.value == '') && (newPassword1.value == null || newPassword1.value == '')) return true;
			if (newPassword.value != newPassword1.value || newPassword.value.length < 3) {
				//newPassword1.focus();
				$$('errPassword1', document).innerHTML = "<span class=msg>Password not matched.</span>";
				return false;
			} else {
				$$('errPassword1', document).innerHTML = null;
				return true;
			}			
		}
		
		//validate form
		function validateForm(){			
			var result = validateRealName();
			if(result) result = validatePassword();			
			if(result) result = validatePassword1();
			if(result) result = validateEmail();			
			if(result) result = validateAge();
			return result;
		}
  </script>  
 </head>
 <body>	
	<?php include "header.php"; ?>
	<div id="content">
		<div class="profile_content">
			<form id="profileForm" name="profileForm" action="editProfileDo.php" method="post" onsubmit="return validateForm()">
				<table class="content1">
					<tr>
						<td class="header1" colspan="2">Edit Profile</td>							
					</tr>
					<tr>
						<td colspan="2" class="header2"><b><label for="realName">About You</label></b></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="realName">What's your real name?</label></td>
						<td class="post">
							<input type="text" name="realName" id="realName" maxlength="30" size="30" value="<?php echo $realName;?>">
							<div id="errRealName"></div>
						</td>								
					</tr>
					<tr>
						<td class="postheader"><label for="occupation">Occupation</label></td>
						<td class="post"><input type="text" name="occupation" id="occupation" maxlength="30" size="30" value="<?php echo $occupation;?>"></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="hobbies">Hobbies</label></td>
						<td class="post"><input type="text" name="hobbies" id="hobbies" maxlength="100" size="30" value="<?php echo $hobbies;?>"></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="age">Age</label></td>
						<td class="post"><input type="text" name="age" id="age" maxlength="3" size="30" onblur="validateAge()" value="<?php echo $age;?>" required>
						<div id="errAge"></div>
						</td>								
					</tr>
					<tr>
						<td class="postheader"><label for="gender">Gender</label></td>
						<td class="post">
							<select name="gender" id="gender">
								<option name="gender" id="none" value="0" <?php if($gender == '0') echo "selected";?>>-</option>
								<option name="gender" id="female" value="1" <?php if($gender == '1') echo "selected";?>>F</option>
								<option name="gender" id="male" value="2" <?php if($gender == '2') echo "selected";?>>M</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="header2"><b><label for="city">City</label></b></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="city">Where do you live?</label></td>
						<td class="post"><input type="text" name="city" id="city" maxlength="30" size="30" required value="<?php echo $city;?>"></td>								
					</tr>
					<tr>
						<td colspan="2" class="header2"><b><label for="oldPassword">Change Password</label></b></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="oldPassword">Old Password</label></td>
						<td class="post">
							<input type="password" name="oldPassword" id="oldPassword" maxlength="10" size="30" onblur="validatePassword()" required>
							<div id="errPassword"></div>
						</td>								
					</tr>
					<tr>
						<td class="postheader"><label for="newPassword">New Password</label></td>
						<td class="post"><input type="password" name="newPassword" id="newPassword" maxlength="10" size="30"></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="newPassword1">Retype Password</label></td>
						<td class="post">
							<input type="password" name="newPassword1" id="newPassword1" maxlength="10" size="30" onblur="validatePassword1()">
							<div id="errPassword1"></div>
						</td>								
					</tr>
					<tr>
						<td colspan="2" class="header2"><b><label for="email">Change Email Address</label></b></td>								
					</tr>
					<tr>
						<td class="postheader"><label for="email">You must always have a valid email address.</label></td>
						<td class="post">
							<input type="text" name="email" id="email" maxlength="50" size="30" value="<?php echo $email;?>" onblur="validateEmail()">
							<div id="errEmail"></div>
						</td>								
					</tr>
					<tr>
						<td colspan="2" class="header2"><b>Deregister Account</b></td>								
					</tr>
					<tr>
						<td colspan="2" class="post"><a href='deregister.php' onclick='confirmRemove()'>Deregister account</a></td>							
					</tr>					
					<tr>
						<td class="footer1" colspan="2">
							<input type="submit" name="Save" value="Save">&nbsp;&nbsp;
							<input type="reset" name="Cancel" value="Cancel">
						</td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
	<?php include "footer.php"; ?>
 </body>
</html>
