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
		
		<div class="menuebox">
			<div class="ganzlinksbox">
				<img src="../../media/images/misc/auto.png" alt="Error404" height="70px" width="75px">
			</div>
		
			<?php 
				$array = ["Autohersteller", "Modell", "Ausfuehrung"];
				for ($i = 0; i < sizeof($array); $i++) { ?>
					<div class="linksobenbox">
						<p class="pfuerVerlauf">
							<strong>
								<?php echo $_GET[$array[$i]]; ?>
							</strong>
						</p>
					</div>
			<?php } ?>
		
			<?php include('top-right-menu.php'); ?>
		</div>
	
		<br><br><br>
		<div class="hauptinfo">
			<div class="containertabelle">
				<table class="tabellengestaltung"><tr>
				<?php 
					$NebenKate = $_GET["abc"];
					$v1 = $_GET["v1"];
					$v2 = $_GET["v2"];
					$v3 = $_GET["v3"];
					
					$tablecontent = [
						["Leistungssteigerung", "engine.png"],
						["Fahrwerk und Achsen", "suspension.png"],
						["Bremsen", "brake.png"],
						["Ansaugtrakt", "intake.png"],
						["Abgasanlage", "exhaust-pipe.png"],
						
						["Motoraufladung", "turbo.png"],
						["Antriebsstrang", "settings.png"],
						["Fahrzeuginnenraum", "safety-seat.png"],
						["Karosserie", "door.png"],
						["Motorkomponenten", "pistons.png"],
						
						["Fahrzeugelektrik", "elektrik.png"],
						["Kraftstoffsystem", "kraftstoff.png"],
						["Oelkreislauf", "oel.png"],
						["Wasserkreislauf", "wasser.png"],
						["Zylinderkopf", "motor.png"],
						
						["Zündanlage", "zuendkerze.png"],
						
					];
				
					for ($i = 0; $i < sizeof($tablecontent); $i++) { ?>
						<td>
							<form action='NebenKat.php' method='get' class='td'>
								<input type='hidden' name='v1' value="<?php echo urlencode($v1);?>">
								<input type='hidden' name='v2' value="<?php echo urlencode($v2);?>">
								<input type='hidden' name='v3' value="<?php echo urlencode($v3);?>">
								<input type='hidden' name='v4' value="<?php echo urlencode($NebenKate);?>">
								<button type='submit' name='abc' value="<?php echo $tablecontent[$i][0];?>" class='HKbuttonBG'>
									<img src="../../media/images/categories/main/<?php echo $tablecontent[$i][1];?>" alt='Error404' width="60px" height="60px">
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