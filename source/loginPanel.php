<?php include "base.php"; ?>
<!doctype html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/login.css">
		<link rel="stylesheet" href="style/form.css">	
		<script language="javascript">
			<!--
			function confirmLogout()
			{
				if(window.confirm("Are you sure you want to logout? All unsaved data will be lost."))
				{
					window.open('logout.php', '_self');
				}
			}
			//-->
		</script>
	</head>
	<body>
		<form id="login_form" method="post">
			<table>						
			<tr><td>
				<?php
				if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['UserName'])) {					
					$userName = $_SESSION['UserName'];
					echo "Welcome, $userName <a href='editProfile.php' target='_parent'><img src='images/profile.gif' alt='Profile' title='Profile'></a>&nbsp;&nbsp;&nbsp;";
					echo "<a href=# onclick='confirmLogout()'>logout</a>";
				} elseif(!empty($_POST['userName']) && !empty($_POST['password'])) {
					$userName = mysqli_real_escape_string($con, $_POST['userName']);
					$password = mysqli_real_escape_string($con, $_POST['password']);
					$password1 = md5($password);
					
					/* procedures
					$result = mysqli_query($con, "call spUserFind('".$userName."', '".$password."')"); 
					if(mysqli_num_rows($result) == 1) {					
						$row = mysqli_fetch_array($result);
						$userId = $row['UserId'];
						//$email = $row['Email'];
						*/
					$result = mysqli_query($con, "select a.UserId, a.UserName, a.Email from G7_Users a where a.UserName = '"
							  .$userName."' and a.Passwd = '".$password1."' and a.IsValid = 1"); 
							  
					if($result && mysqli_num_rows($result) == 1) {					
						$row = mysqli_fetch_array($result);
						$userId = $row['UserId'];
						
						if($userId > 1) {
							$_SESSION['UserName'] = $userName;
							$_SESSION['UserId'] = $userId;
							$_SESSION['LoggedIn'] = 1;							
							echo "<meta http-equiv='refresh' content='0; url=loginPanel.php' />";						
						}
					} else { ?>					
						<div>
							<span class="msg">Username or password is incorrect</span><br>
							<span><input type="text" name="userName" id="userName" class="inputbox" maxlength="30" required>&nbsp;
							<input type="password" name="password" id="password" class="inputbox" maxlength="10" required>
							<input type="submit" value="Login" class="login_btn" title="Login"></span>
						</div>
						<div class="login_txt">
							<label for="userName">Username</label><label class="login_pwd_align" for="password">Password</label>					
						</div>
						<div class="login_txt1">				
							<span><a href='findPassword.php' target='_parent'>Forgot Password?</a></span>
							<span class='login_reg_align'><a href='register.php' target='_parent'>Register</a></span>	
						</div>
				<?php		
					}
				} else {
				?>				
					<div>
						<span><input type="text" name="userName" id="userName" class="inputbox" maxlength="30" required>&nbsp;
						<input type="password" name="password" id="password" class="inputbox" maxlength="10" required>
						<input type="submit" value="Login" class="login_btn" title="Login"></span>
					</div>
					<div class="login_txt">
						<label for="userName">Username</label><label class="login_pwd_align" for="password">Password</label>					
					</div>
					<div class="login_txt1">				
						<span><a href='findPassword.php' target='_parent'>Forgot Password?</a></span>
						<span class='login_reg_align'><a href='register.php' target='_parent'>Register</a></span>	
					</div>
				<?php
				}
				?>
			</td></tr>
			</table>
		</form>			
	</body>
</html>
