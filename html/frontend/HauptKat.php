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
		<br>
		<div class="menuebox">
			<div class="ganzlinksbox">
				<img src="../../media/images/misc/auto.png" alt="Error404" height="70px" width="75px">
			</div>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET['Autohersteller']; ?>
							</strong>
						</p>
					</div>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET['Modell']; ?>
							</strong>
						</p>
					</div>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET['Generation']; ?>
							</strong>
						</p>
					</div>
			<?php include('top-right-menu.php'); ?>
		</div>
	
		<br><br><br>
		<div class="hauptinfo">
			<div class="containertabelle">
				<table class="tabellengestaltung"><tr>
				<?php 
					/*	$NebenKate = $_GET["abc"];  */
					$autohersteller = $_GET["Autohersteller"];
					$modell = $_GET["Modell"];
					$generation = $_GET["Generation"];
					$serie = $_GET["Serie"];
					$trim = $_GET["Trim"];
					
					$tablecontent = [
						["Leistungs - steigerung", "engine.png"],
						["Fahrwerk und Achsen", "suspension.png"],
						["Bremsen" , "brake.png"],
						["Ansaugtrakt", "intake.png"],
						["Abgasanlage", "exhaust-pipe.png"],
						
						["Motoraufladung", "turbo.png"],
						["Antriebsstrang", "settings.png"],
						["Fahrzeug - innenraum", "safety-seat.png"],
						["Karosserie", "door.png"],
						["Motor - komponenten", "pistons.png"],
						
						["Fahrzeug - elektrik", "elektrik.png"],
						["Kraftstoff - system", "kraftstoff.png"],
						["Oelkreislauf", "oel.png"],
						["Wasser - kreislauf", "wasser.png"],
						["Zylinderkopf", "motor.png"],
						
						["Zündanlage", "zuendkerze.png"],
						
					];
				
					for ($i = 0; $i < sizeof($tablecontent); $i++) { ?>
						<td>
							<form action='NebenKat.php' method='get' class='td'>
								<input type='hidden' name='autohersteller' value="<?php echo urlencode($autohersteller);?>">
								<input type='hidden' name='modell' value="<?php echo urlencode($modell);?>">
								<input type='hidden' name='generation' value="<?php echo urlencode($generation);?>">
								<input type='hidden' name='serie' value="<?php echo urlencode($serie);?>">
								<input type='hidden' name='trim' value="<?php echo urlencode($trim);?>">
								<button type='submit' name='hauptkat' value="<?php echo $tablecontent[$i][0];?>" class='HKbuttonBG'>
									<img src="../../media/images/categories/main/<?php echo $tablecontent[$i][1];?>" alt='Error404' width="60px" height="60px" class="Katimg">
								</button>
							</form>
							<p><?php echo $tablecontent[$i][0];?></p>
						</td>
						<?php if ($i % 5 == 4 and $i != sizeof($tablecontent) - 1) {
							echo "</tr><tr>";
						}
					}
				?>
				</tr></table>
			</div>
		</div>
		
		<br><br><br><br>
		
		<?php include('footer.php'); ?>
    </body>
</html>