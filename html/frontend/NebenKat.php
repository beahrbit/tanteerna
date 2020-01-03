<!DOCTYPE html>

<html lang="de">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/NebenK.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
		<?php include('header.php'); ?>
		
		<div id="content-container">
			<div class="menuebox">
				<div class="ganzlinksbox">
					<img src="../../media/images/misc/auto.png" alt="Error404" height="70px" width="75px">
				</div>
			
				<?php 
					$array = ["v1", "v2", "v3", "abc"];
					for ($i = 0; i < sizeof($array); $i++) { ?>
						<div class="<?php echo ($i > 2) ? "linksobenbox" : "linksobenboxKategorien";?>">
							<p class="pfuerVerlauf">
								<strong>
									<?php echo urldecode($_GET[$array[$i]]); ?>
								</strong>
							</p>
						</div>
				<?php } ?>
				
				<?php include('top-right-menu.php'); ?>
			</div>
			
			<br>
			
			<div class="hauptinfo">
				</br></br></br></br>
				<div class="containertabelle">
					<?php
						$NebenKate=$_GET["abc"];
						$v1 = $_GET["v1"];
						$v2 = $_GET["v2"];
						$v3 = $_GET["v3"];
						
						switch ($NebenKate){
							case "Leistungssteigerung": 
								$tableinput = array("Stage 1","Stage 2","Stage 3","Stage 4","Stage 5", "Individual","Rennsport");	
								break;		
							case "Fahrwerk und Achsen": 
								$tableinput = array("Komplettfahrwerke","Federn");
								break;
							case "Motoraufladung":  
								$tableinput = array("Turbolader", "Kompressor", "Ladeluftkühler");
								break;		
							case "Antriebsstrang":  
								$tableinput = array("Kupplung", "Schwungmasse", "Getriebesoftwareoptimierung", "Getriebeverstärkung", "Kardanantrieb", "Differenzial", "Antriebswellen");
								break;
							case "Ansaugtrakt": 
								$tableinput = array("Luftfilter", "Luftführung");
								break;
							case "Bremsen":  
								$tableinput = array("Umbausätze", "Bremsscheiben", "Bremsbeläge");
								break;
							case "Abgasanlage":  
								$tableinput = array("Komplettabgasanlagen","Downpipe","Schalldämpfer","Krümmer","Katalysatoren");
								break;
							case "Motorkomponenten": 
								$tableinput = array("Koben", "Pleuel", "Pleuelager", "Kurbelwelle", "Kurbelwellenlager");
								break;
							case "Karosserie":  
								$tableinput = array("Stoßstangen",  "Motorhauben", "Diffusoren", "Body Kits");
								break;
							case "Fahrzeugelektrik": 
								$tableinput = array("Sensoren", "Steuergeräte", "Displays und Anzeigen", "Batterien", "Kabelbäume");
								break;
							case "Fahrzeuginnenraum": 
								$tableinput = array("Sitze", "Gurte", "Lenkräder");
								break;
							case "Zuendanlage": 
								$tableinput = array("Zündkerzen","Zündspulen","Zubehör");
								break;
							case "Zylinderkopf":
								$tableinput = array("Zylinderkopfdichtung","Einlassventil","Auslassventil","Ventilfedern","Nockenwelle","Zylinderkopf komplett","Kopfschrauben");
								break;
							case "Wasserkreislauf":
								$tableinput = array("Wasserkühler","Wasserpumpe","Leitungen");
								break;
							case "Oelkreislauf":
								$tableinput = array("Ölpumpe","Ölkühler","Leitungen");
								break;
							case "Kraftstoffsystem":
								$tableinput = array("Kraftstoffpumpen","Injektoren","Kraftstoffleitung");
								break;
							default: echo "Da stimmt was net";
						}
					?>
				
					<table class="tabellengestaltung"><tr>
						<?php 
							for ($i = 0; $i < sizeof($tableinput); $i++) { ?>
								<td>
									<form action='suchergebnisse.php' method='get' class='td'>
										<input type='hidden' name='v1' value="<?php echo urlencode($v1);?>">
										<input type='hidden' name='v2' value="<?php echo urlencode($v2);?>">
										<input type='hidden' name='v3' value="<?php echo urlencode($v3);?>">
										<input type='hidden' name='v4' value="<?php echo urlencode($NebenKate);?>">
										<button type='submit' name='abc' value="<?php echo $tableinput[$i];?>" class='HKbuttonBG'>
											<img src='../../media/images/categories/sub/<?php echo $tableinput[$i];?>.png' alt='Error404' width="60px" height="60px">
										</button>
									</form>
									<p><?php echo $tableinput[$i];?></p>
								</td>
								<?php if ($i % 5 == 4 and $i != sizeof($tableinput) - 1) {
									echo "</tr><tr>";
								}
							}
						?>
					</tr></table>
					</br></br></br></br>
				</div>
			</div>
			<br>
		</div>
		
		<?php include('footer.php'); ?>
    </body>
</html>