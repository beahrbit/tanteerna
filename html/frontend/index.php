<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="style/Dummi.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
    </head>
    <body>
		
		
		<div class="headercontainer">
		
			<div class="headerboxlinks">
				<a href="Startseite.html"><img src="/Logo.jpg" alt="Error404"> </a>
			</div>
			
			<div class="headerboxrechts">
				
				<h1>Das Tuningportal</h1>
			</div>
			
		</div>
		
		<div class="menuebox">
		
		</div>
		
		<br>
		<div class="Motorblock">
			<img src="dummi.png" alt="Error404" width="300" height="300">
		</div>
		
		<div >
			<h2 class="Dummischriftoben">Unsere Website ist gerade in der Werkstatt</h2>
		</div>
		
		<div >
			<h2 class="Dummischriftunten">	Wir arbeiten mit Hochdruck daran!</h2>
		</div>
		
		<div class="footercontainer">
		
				<div class="footerinhalt">
					<a href="https://www.instagram.com/yourspec.de/?igshid=avpmmu62mtsb"><img src="instagram.png" alt="Error404" height="50" width="50"></a>
				</div>
				
				<div class="footerinhalt">
					<a href="https://www.facebook.com/yourspecde-108789113924358/"><img src="fb.png" alt="Error404" height="50" width="50"></a>
				</div>
		
		</div>
		<br>
		<br>	
		<br>
		<?php
			if(isset($_POST['pwd'])) {
				if($_POST['pwd']=="EmmiSeineKarre"){
					header("Location: Home.html");
				}
			}
		
		?>
		
			
		<form method="Post">
			<input type="password" name="pwd" value="Password">
			<input type="submit" value="Login">
		</form>
		
		
    </body>
</html>