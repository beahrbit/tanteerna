<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/Anbieter.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
		<?php include('header.php'); ?>
		
		<div class="menuebox">
			<div class="ganzlinksbox">
				<img src="../../media/images/misc/auto.png" alt="Error404" height="60px" width="75px">
			</div>
			<?php include('top-right-menu.php'); ?>
		</div>
		<br>
	
		<?php $Aname = urldecode($_GET["abc"]); ?>
	
		<div class="hauptinfo">
			<?php
				$array = [
					["Leistungsprüfstand", "Heins"]
					["eigener Shop", "Hzwei"]
					["Reifenservice", "Hdrei"]
					["eigene Werkstatt", "Hvier"]
					["Meisterbetrieb", "Hfuenf"]
					["Dekra Prüfstelle", "Hsechs"]
					["Highlight 7", "Hsieben"]
					["Highlight 8", "Hacht"]
				];
				
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
						mysqli_select_db($link, "usr_web26762838_1");
				
				$res=mysqli_query($link, "SELECT * FROM anbieter WHERE anbieter.Firmenname = '$Aname';");														
				$row = mysqli_fetch_array($res);
			?>
			<h1 class="h1">
				<?php echo utf8_encode($row["Firmenname"]); ?>
			</h1>
			<img src="../../media/images/merchant-icons/<?php echo $row["Firmenlogo"]; ?>" height="250px" width="250px" class="firmenlogo">
			
			<!-- Hightlight table -->
			<table><tr>
				<?php for ($i = 0; i < sizeof($array); $i++) { ?>
					<td>
						<p class="highlight">
							<?php 
								echo $array[$i][0];
								$icon = "../../media/images/misc/";
								$icon .= ($row[$array[$i][1]] == "ja") ? "haken.png" : "cross.png";
							?>
							<img src="<?php echo $icon; ?>" alt="Error404" height="30" width="30" class="right">
						</p>
					</td>
					<?php if ($i % 2 == 1 and $i != (sizeof($array)-1)) { ?>
						</tr><tr>
					<?php } ?>
				<?php } ?>
			</tr></table>
					
			<!-- description -->
			<br><br><br>
			<?php echo utf8_encode($row["Beschreibung"]); ?>
			<br><br><br><br>
						
						
			<!-- contact -->
			<div class="KKAB"></div>	
			<div class="Kontaktbox">	
				<img src="placeholder.png" alt="Error404" class="kontaktpngs"> 		
				<p class="kontaktps">
					<?php 
						echo utf8_encode($row["Strasse"]) . ", " 
							. $row["Postleitzahl"] . ", "
							. utf8_encode($row["Ort"]); 
					?>
				</p> 	
				<br><br>	
				<a href="<?php echo $row["Website"]; ?>" class="kontaktps"><img src="../../media/images/misc/internet.png" alt="Error404" class="kontaktpngs"></a> 
				<p class="kontaktps">www.MotorFactoryGmbH.de</p>
				<br><br>	
				<a href="<?php echo $row["Facebook"]; ?>" class="kontaktps"><img src="../../media/images/misc/fb.png" alt="Error404" class="kontaktpngs"> </a> 
				<p class="kontaktps"> Motor - Factory</p>
				<br><br>
				<a href="<?php echo $row["Instagram"]; ?>" class="kontaktps"><img src="../../media/images/misc/instagram.png" alt="Error404" class="kontaktpngs"></a> 
				<p class="kontaktps">MotorFactoryGmbH</p>
				<br><br>
				<a href="<?php echo $row["Youtube"]; ?>" class="kontaktps"><img src="../../media/images/misc/Youtube.png" alt="Error404" class="kontaktpngs"> </a> 
				<p class="kontaktps">MyMotorFactory</p>
				<br>
			</div>
			<div class="Kontaktframe">
				<a href="https://www.google.de/maps/place/L+%26+S+Luddeneit+und+Scherf+GmbH/@50.7384823,11.7346022,16.75z/data=!4m5!3m4!1s0x47a14cbc11314369:0x2051d1c169da9fe7!8m2!3d50.73836!4d11.73729" alt="Error404">	<img src="kontaktmap.png" height="450" width="500"> </a>
			</div>	
			<br><br><br><br><br><br><br><br>
		</div>
	
		<?php include('footer.php'); ?>
	
    </body>
</html>