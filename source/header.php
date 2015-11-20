<?php include "base.php"; ?>
<!doctype html>
<html lang="en">
 <head>
  <title>Header</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/base.css">
 </head>
 <body>
	<header>	
		<div id="header1">
			<div id="logo">
				<a href="index.php"><img src="images/logo.png" alt="logo" width="120" height="100"></a>
			</div>
			<div id="login">
				<div class="loginpanel_align">							
					<iframe class="loginpanel_dimension" src="loginPanel.php"></iframe>
				</div>	
			</div>
		</div>
		<div id ="header2">
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="events.php">Events</a></li>
					<li><a href="restaurant.php">Places</a>
						<div class="sub_place">
							<ul>
								<li><a href="restaurant.php">Restaurants</a></li>
								<li><a href="parks.php">Parks</a></li>
								<li><a href="other.php">More</a></li>
							</ul>
						</div>
					</li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</header>
  </body>
</html>  