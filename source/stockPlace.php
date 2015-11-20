<!doctype html>
<html lang="en">
 <head>
  <title>Place</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/placeItemStyle.css">
 </head>
 <body>
	<?php include "header.php"; ?>
	<div id="content">
		<h1 id=placeHeader>Place Name</h1>

		<div id="placeIcon">
			<img src="images/StockRestaurant.png" alt="Thumbnail for Stock place">
		</div>
		
		<div id="placeMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2604.557226303497!2d-122.89557163558185!3d49.24688340417014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548678234ce874a1%3A0xccba6a3576254c23!2s9867+Manchester+Dr%2C+Burnaby%2C+BC+V3N+4R3!5e0!3m2!1sen!2sca!4v1423728699218" 
			width="400" height="300" style="border:0">
			</iframe>
		</div>
		
		<table id="placeDetails">
			<tr>
				<td>Phone: 555-555-5555</td>
				<td>Website: <a href=#>www.url.com</a></td>
				<td>Address: 5555 Roadname RD</td>
			</tr>
		</table>
		
		<div id="placeInfo">
		<p>The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. 
		The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.
		The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.</p>
		</div>
	
	</div>
	<?php include "footer.php"; ?>
 </body>
</html>
