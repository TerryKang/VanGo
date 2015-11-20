<?php 
include "base.php"; 

if(!empty($_SESSION['UserId'])) {
	$userId = $_SESSION['UserId'];
	$userInfo = mysqli_query($con, "call spUserInfo('".$userId."')"); 
	if($userInfo->num_rows > 0) {	
		$row = mysqli_fetch_array($userInfo);
		$email = $row['Email'];
		$realName = $row['RealName'];		
	}
} else {
	$email = null;
	$realName = null;
}
?>
<!doctype html>
<html lang="en">
 <head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/form.css">
  <script language="JavaScript" src="include/global.js" type="text/javascript"></script>  
  <script>
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
			Validate your name using regular expression 
			Allowed: a-z, A-Z, dash(-), and underscore(_)
			Not allowed: numbers and invalid characters (#`!@$%, etc)
		*/
		function validateYourName(){
			var name = $$('yourName', document);			
			var pattern = /^[a-zA-Z_-]+$/;
			if(name.value == null || name.value == '') return true;
			var val = name.value.replace(/\s/g, '');
			if(!pattern.test(val) || val.length < 3) {
				$$('errYourName', document).innerHTML = "<span class=msg>Your name must contain at least 3 letters. <br />Dash(-) and underscore(_) are also allowed.</span>";
				return false;
			} else {
				$$('errYourName', document).innerHTML = null;
				return true;
			}
		}
		
		function validateSubject() {
			var subject = $$('subject', document).value;
			if(subject.length < 3) {
				$$('errSubject', document).innerHTML = "<span class=msg>Subject must contain at least 3 characters.</span>";
				return false;
			} else {
				$$('errSubject', document).innerHTML = null;
				return true;
			}
		}
		
		function validateMessage() {
			var message = $$('message', document).value;
			if(message.length < 3) {
				$$('errMessage', document).innerHTML = "<span class=msg>Message must contain at least 3 characters.</span>";
				return false;
			} else {
				$$('errMessage', document).innerHTML = null;
				return true;
			}
		}
		
		//validate form
		function validateForm(){			
			var result = validateYourName();
			if(result) result = validateEmail();
			if(result) result = validateSubject();
			if(result) result = validateMessage();
			
			return result;
		}
  </script>  
 </head>
 <body>
		<?php include "header.php"; ?>
		<div id="content">			
			<div class="contact_content">
				<form id="contactForm" name="contactForm" action="contactDo.php" method="post" onsubmit="return validateForm()">
					<table class="content1">
						<tr>
							<td class="header1" colspan="2">Contact Form</td>							
						</tr>
						<tr>
							<td colspan="2" class="header2"><b><label for="yourName">Basic Information</label></b>&nbsp;<span class="asterisk">*</span></td>								
						</tr>
						<tr>
							<td class="postheader"><label for="yourName">Your name</label></td>
							<td class="post_1">
								<input type="text" name="yourName" id="yourName" maxlength="30" size="30" value="<?php echo $realName;?>" required>
								<div id="errYourName"></div>
							</td>								
						</tr>
						<tr>
							<td class="postheader"><label for="email">Email address</label></td>
							<td class="post_1">
								<input type="text" name="email" id="email" maxlength="50" size="50" value="<?php echo $email;?>" onblur="validateEmail()" required>
								<div id="errEmail"></div>
							</td>								
						</tr>					
						<tr>
							<td colspan="2" class="header2"><b><label for="subject">Subject</label></b>&nbsp;<span class="asterisk">*</span></td>								
						</tr>
						<tr>
							<td class="postheader"><label for="subject">Post your subject here</label></td>
							<td class="post_1">
								<input type="text" name="subject" id="subject" maxlength="50" size="50" required>
								<div id="errSubject"></div>
							</td>								
						</tr>
						<tr>
							<td colspan="2" class="header2"><b><label for="message">message</label></b>&nbsp;<span class="asterisk">*</span></td>								
						</tr>
						<tr>
							<td class="postheader"><label for="message">Post your message here</label></td>
							<td class="post_1">
								<textarea name="message" id="message" rows="15" cols="85" required></textarea>
								<div id="errMessage"></div>
							</td>								
						</tr>					
						<tr>
							<td class="footer1" colspan="2">
								<input type="submit" name="submit" value="Submit">&nbsp;&nbsp;
								<input type="reset" name="reset" value="Reset">
							</td>
						</tr>
					</table>
				</form>	
			</div>
		</div>
		<?php include "footer.php"; ?>
	 </body>
	</html>
