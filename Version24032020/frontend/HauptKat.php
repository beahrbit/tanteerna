<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/HauptK.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
		<?php include('header.php'); ?>
		<div id="content-container">
		<br>
		<div class="menuebox">
			<div class="ganzlinksbox">
				<img src="../../media/images/misc/auto.png" alt="Error404" height="70px" width="75px">
			</div>
				<?php if(strlen($_GET['Autohersteller'])!=0){?>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET['Autohersteller']; ?>
							</strong>
						</p>
					</div>
				<?php }else{ ?>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo "Alle Autos"; ?>
							</strong>
						</p>
					</div>
				<?php
				}
					if(strlen($_GET['Modell']) != 0){
				?>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET['Modell']; ?>
							</strong>
						</p>
					</div>
				<?php }
					if(strlen($_GET['Generation'])!=0){	
					echo "
					<div class='linksobenbox'>
						<p class='pfuerVerlauf'>
							<strong>".
								  $_GET['Generation'] 
							."</strong>
						</p>
					</div>";
				
					}		
				?>	
			<?php include('top-right-menu.php'); ?>
		</div>
	
		<br><br><br>
		<div class="hauptinfo">
			<div class="containertabelle">
				<table class="tabellengestaltung"><tr>
				<?php 
					
					$autohersteller = $_GET["Autohersteller"];
					$modell = $_GET["Modell"];
					$generation = $_GET["Generation"];
					$serie = $_GET["Serie"];
					$trim = $_GET["Trim"];
					
					
					$tablecontent = [
						["Leistungssteigerung", "engine.png", "Leistungs- steigerung"],
						["Fahrwerk und Achsen", "suspension.png", "Fahrwerk und Achsen"],
						["Bremsen" , "brake.png", "Bremsen"],
						["Ansaugtrakt", "intake.png", "Ansaugtrakt"],
						["Abgasanlage", "exhaust-pipe.png", "Abgasanlage"],
						
						["Motoraufladung", "turbo.png", "Motor- aufladung"],
						["Antriebsstrang", "settings.png", "Antriebs- strang"],
						["Fahrzeuginnenraum", "safety-seat.png", "Fahrzeug- innenraum"],
						["Karosserie", "door.png", "Karosserie"],
						["Motorkomponenten", "pistons.png", "Motor- komponenten"],
						
						["Fahrzeugelektrik", "elektrik.png" , "Fahrzeug- elektrik"],
						["Kraftstoffsystem", "kraftstoff.png", "Kraftstoff- system"],
						["Oelkreislauf", "oel.png", "Ölkreislauf"],
						["Wasserkreislauf", "wasser.png", "Wasser- kreislauf"],
						["Zylinderkopf", "motor.png", "Zylinderkopf"],
						
						["Zündanlage", "zuendkerze.png", "Zündanlage"],
						
					];
				
					for ($i = 0; $i < sizeof($tablecontent); $i++) { ?>
						<td>
							<form action='NebenKat.php' method='get' class='td'>
								<input type='hidden' name='autohersteller' value="<?php echo $autohersteller;?>">
								<input type='hidden' name='modell' value="<?php echo $modell;?>">
								<input type='hidden' name='generation' value="<?php echo $generation;?>">
								<input type='hidden' name='serie' value="<?php echo $serie;?>">
								<input type='hidden' name='trim' value="<?php echo $trim;?>">
								<button type='submit' name='hauptkat' value="<?php echo $tablecontent[$i][0];?>" class='HKbuttonBG'>
									<img src="../../media/images/categories/main/<?php echo $tablecontent[$i][1];?>" alt='Error404' width="60px" height="60px" class="Katimg">
								</button>
							</form>
							<p><?php echo $tablecontent[$i][2];?></p>
						</td>
						<?php if ($i % 5 == 4 and $i != sizeof($tablecontent) - 1) {
							echo "</tr><tr>";
						}
					}
				?>
				</tr></table>
			</div>
		</div>
		</div>
		
		<br><br><br><br>
		
		<?php include('footer.php'); ?>
    </body>
</html>