<!doctype html>
<html lang="en">
 <head>
  <title>Register</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/form.css">    
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script language="JavaScript" src="include/global.js" type="text/javascript"></script>
  <script>
		//check username availability
		$(document).ready(function() {
			$("#userName").keyup(function(e) { //user types username
			   var userName = $(this).val();
			   if(userName.length>2) {
				   $.post('registerCheck.php', {'userName':userName}, function(data) {
				   $("#userResult").html(data); //display the availability
				   });
			   }
			});
		});

		//validate email address
		function validateEmail() {
			//var email = document.getElementById('email');
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
		
		//validate age
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
		
		//validate username
		function validateUserName() {
			var userName = $$('userName', document);
			if (userName.value.length < 3) {
				//userName.focus();
				$$('errUserName', document).innerHTML = "<span class=msg>Username must contain at least 3 characters.</span>";
				return false;
			} else {
				$$('errUserName', document).innerHTML = null;
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
		
		//validate password
		function validatePassword() {
			var password = $$('password', document);
			if (password.value.length < 3) {
				//password.focus();
				$$('errPassword', document).innerHTML = "<span class=msg>Password must contain at least 3 characters.</span>";
				return false;
			} else {
				$$('errPassword', document).innerHTML = null;
				return true;
			}			
		}
		
		//validate retype password
		function validatePassword1() {
			var password = $$('password', document);
			var password1 = document.getElementById('password1');
			if (password1.value != password.value) {
				//password1.focus();
				$$('errPassword1', document).innerHTML = "<span class=msg>Password not matched.</span>";
				return false;
			} else {
				$$('errPassword1', document).innerHTML = null;
				return true;
			}			
		}
		
		//validate form
		function validateForm(){			
			var result = validateUserName();
			if(result) result = validatePassword();
			if(result) result = validatePassword1();
			if(result) result = validateEmail();
			if(result) result = validateRealName();
			if(result) result = validateAge();
			
			return result;
		}
	</script>
 </head>
 <body>
	<?php include "header.php"; ?>
	<div id="content">
		<div class="register_content">
			<form id="registerForm" name="registerForm" action="registerDo.php" method="post" onsubmit="return validateForm()">
			<table class="content1">
					<tr>
						<td class="header1" colspan="2">Register Form</td>
					</tr>
					<tr>
						<td class="header21" colspan="2"><label for="userName">Basic Information</label>&nbsp;<span class="asterisk">*</span></td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="userName">Username</label></b>&nbsp;(At least 3 characters)</td>
						<td class="post">
							<input type="text" name="userName" id="userName" maxlength="30" onblur="validateUserName()" required>&nbsp;&nbsp;<span id="userResult"></span>
							<div id="errUserName"></div>
							
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="password">Password</label></b>&nbsp;(At least 3 characters)</td>
						<td class="post">
							<input type="password" name="password" id="password" maxlength="10" onblur="validatePassword()" required>
							<div id="errPassword"></div>
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="password1">Retype Password</label></b></td>
						<td class="post">
							<input type="password" name="password1" id="password1" maxlength="10" onblur="validatePassword1()" required>
						    <div id="errPassword1"></div>
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="email">Email Address</label></b></td>
						<td class="post">
							<input type="text" name="email" id="email" maxlength="50" size="30" onblur="validateEmail()" required>
							<div id="errEmail"></div>
						</td>							
					</tr>
					<tr>
						<td class="header21" colspan="2" ><label for="realName">Additional Profile</label></td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="realName">Real Name</label></b></td>
						<td class="post">
							<input type="text" name="realName" id="realName" maxlength="30" size="30">
							<div id="errRealName"></div>
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="none">Gender</label></b></td>
						<td class="post">
							<select name="gender" id="gender">
								<option name="gender" id="none" value="0">-</option>
								<option name="gender" id="female" value="1">F</option>
								<option name="gender" id="male" value="2">M</option>
							</select>						
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="age">Age</label></b></td>
						<td class="post">
							<input type="text" name="age" id="age" maxlength="3" size="30">
							<div id="errAge"></div>
						</td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="city">City</label></b></td>
						<td class="post"><input type="text" name="city" id="city" maxlength="30" size="30"></td>
					</tr>
					<tr>
						<td class="postheader2"><b><label for="occupation">Occupation</label></b></td>
						<td class="post"><input type="text" name="occupation" id="occupation" maxlength="30" size="30"></td>
					</tr>					
					<tr>
						<td class="postheader2"><b><label for="hobbies">Hobbies</label></b></td>
						<td class="post"><input type="text" name="hobbies" id="hobbies" maxlength="100" size="30"></td>
					</tr>
					<tr>
						<td colspan="2">By clicking on the 'Register' button below, I certify that I agree to receive newsletters from VanGo occasionally.</td>
					</tr>
					<tr>
						<td colspan="2" class=footer1>
							<input type="submit" name="Submit">&nbsp;&nbsp;
							<input type="reset" name="Reset">
						</td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
	<?php include "footer.php"; ?>		
 </body>
</html>
