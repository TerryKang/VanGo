<!doctype html>
<html lang="en">
 <head>
  <title>Parks</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/placesPage.css">
 </head>
 <body>
	<?php include "header.php"; ?>
	<div id="content">
		<h1 id=placeHeader>Parks</h1>
			<div class="LItem">
				<table>
					<tr>
					<th rowspan = 2><img src="images/stanley1.jpg" alt="Thumbnail for Stanley Park"></th>
					<td><a href="StanleyPark.php"><h2>Stanley Park</h2></a></td>
					</tr>
					<tr>					
					<td>
					<p>Stanley Park is a magnificent green oasis in the midst of the heavily built urban landscape of Vancouver.</p></td>
					</tr>
				</table>
			</div>
							
			<div class="RItem">
				<table>
					<tr>
					<td><a href="ElizabethPark.php"><h2>Queen Elizabeth Park</h2></a></td>
					<th rowspan = 2><a href="ElizabethPark.php"><img src="images/elizabeth1.jpg" alt="Thumbnail for Elizabeth Park"></a></th>
					</tr>
					<tr>
					
					<td><p>Queen Elizabeth Park is a major draw for floral display enthusiasts and view-seekers.</p></td>
					</tr>
				</table>
			</div>
				<div class="LItem">
					<table>
						<tr>
						<th rowspan = 2><a href="LynnPark.php"><img src="images/lynn1.jpg" alt="Thumbnail for Lynn Canyon Park"></a></th>
						<td><a href="LynnPark.php"><h2>Lynn Canyon Park</h2></a></td>
						</tr>
						<tr>
						
						<td><p>Lynn Canyon Park is the home of several beautiful hiking trails that are suitable for any hiking level.</p></td>
						</tr>
					</table>
				</div>
								
				<div class="RItem">
					<table>
						<tr>
						<td><a href="PacificPark.php"><h2>Pacific Spirit Park</h2></a></td>
						<th rowspan = 2><a href="PacificPark.php"><img src="images/pacific1.jpg" alt="Thumbnail for Pacific Spirit Park"></a></th>
						</tr>
						<tr>
						
						<td><p>The Pacific Spirit Regional Park offers a network of trails contained in more than 750 hectares of forest.</p></td>
						</tr>
					</table>
				</div>
	</div>

	<?php include "footer.php"; ?>
 </body>
</html>
