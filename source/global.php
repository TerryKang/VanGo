<?php
// Defines global constants here

define('REGISTER_SUCCESS', 'Thank you for your registration. We are now redirecting you to the home page.');
define('REGISTER_ERROR', 'Your registration cannot be processed this time, please try again a little bit later.');
define('CONTACT_MSG', 'We appreciate that you\'ve taken the time to write us. We\'ll get back to you very soon. Please come back and see us often.');
define('EDIT_MSG', 'Your profile has been saved successfully. We are now redirecting you to the home page.');
define('EDIT_MSG1', 'Your request cannot be processed this time, please make sure you enter a valid password.');
define('DEREGISTER_MSG','Your account has been removed from the site. Welcome to come back any time.');
define('DEREGISTER_MSG1','Your request cannot be processed this time, please try again a little bit later.');
define('RECOVER_MSG', 'Your temporary password is ');
define('RECOVER_MSG1', '. You can change it in your profile panel once logged in.');
define('RECOVER_MSG2', 'Your username or email is incorrect');

//show message without auto redirecting
function showMessage($msg) {
	echo "<link rel='stylesheet' href='style/form.css'>";
	echo "<div class='msgbox'>".RECOVER_MSG."<span class='msgstrong'>".$msg."</span>".RECOVER_MSG1;
	echo "<br><br><span class='msgcenter'><a href='index.php'>Home</a></span></div>";		
}

//show message with auto redirecting
//type 0 - go home page, 1- go back immediately, 2 - go back with messages
function showMessageRedirect($msg, $type) {
	echo "<link rel='stylesheet' href='style/form.css'>";
	echo "<div class='msgbox'>".$msg;
	if($type == 0) {
		echo "<br><br><span class='msgcenter'><a href='index.php'>Home</a></span></div>";
		echo "<meta http-equiv='refresh' content='4; url=index.php' />";
	}
	elseif($type == 1){
		echo "<br><br><span class='msgcenter'><a href='javascript:history.go(-1)'>Back</a></span></div>";
		header("location:javascript://history.go(-1)");
	}
	else {
		echo "<br><br><span class='msgcenter'><a href='javascript:history.go(-1)'>Back</a></span></div>";
		header("refresh:4; location:javascript://history.go(-1)");
	}
}
?>