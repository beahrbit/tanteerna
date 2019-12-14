<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/produkt.css">
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
				$array = ["v1", "v2", "v3", "v4", "v5"];
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
	
		<div id="product-container">
			<?php
				$NebenKate=urldecode($_GET["abc"]);
				$v1 = urldecode($_GET["v1"]);
				$v2 = urldecode($_GET["v2"]);
				$v3 = urldecode($_GET["v3"]);
				$v4 = urldecode($_GET["v4"]);
				$v5 = urldecode($_GET["v5"]);
			
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				$res=mysqli_query($link, "SELECT * FROM produkt INNER JOIN a_p_beziehung ON produkt.ID = a_p_beziehung.produkt_fk 											INNER JOIN auto ON auto.ID = a_p_beziehung.auto_fk 
																	WHERE auto.Marke = '$v1' AND auto.Modell = '$v2' 
																		AND auto.Ausfuehrung = '$v3'
																		AND produkt.Kategorie = '$v4' 
																		AND produkt.Unterkategorie = '$v5'
																		AND produkt.Produktname ='$NebenKate'	
																		;");		
				$row = mysqli_fetch_array($res); 
			?>
			<div id="left-sidebar" class="float-left">
				<img src="../../media/images/products/<?php echo $row["Produktbild"]; ?>" width="100%">
				<div class="box-background" id="provider-information">
					<?php 
						$providerQuery = mysqli_query($link, "SELECT * From anbieter Where Firmenname = '" . $row["Anbieter"] . "';");
						$merchant = mysqli_fetch_array($providerQuery);
					?>
					<div class="box-content">
						<img src="../../media/images/merchant-icons/<?php echo $merchant["Firmenlogo"]; ?>" alt="Error404" height="40px" width="40px" class="float-left" id="provider-icon">
						<p>
							<?php
								echo utf8_encode($row["Anbieter"]) . "</br>"
									. utf8_encode($merchant["Strasse"]) . "</br>"
									. $merchant["Postleitzahl"] . " " . utf8_encode($merchant["Ort"]);
							?>
						</p>
					</div>
					<form action="Anbieter.php" method="Get">
						<button type="submit" name='abc' value="<?php echo urlencode($merchant["Firmenname"]); ?>" class="box-button">
							Anbieterprofil
						</button>
					</form>
				</div>
			</div>
				
			<div id="main-info-container">
				<div id="general-information-container">
					<div id="information-container">
						<h2><?php echo utf8_encode($row["Produktname"]); ?></h2>
						<h4><?php echo utf8_encode($row["Anbieter"]); ?></h4>
						<table id="property-table"><tr>
							<?php 
								$propertyNames = ["Heins", "Hzwei", "Hdrei", "Hvier", "Hfuenf", "Hsechs", "Hsieben", "Hacht"];
								$properties = [];
								for ($i = 0; $i < sizeof($propertyNames); $i++) {
									if (array_key_exists($propertyNames[$i],$row)) {
										array_push($properties, $row[$propertyNames[$i]]);
									}
								}
								for ($i = 0; $i < sizeof($properties); $i++) {
									echo "<td><lu><li class='highlight'>" . utf8_encode($properties[$i]) . "</li></lu></td>";
									if ($i % 2 == 1 and $i > 0 and $i != sizeof($properties) - 1) {
										echo "</tr><tr>";
									}
								}
							?>
						</tr></table>
					</div>
					<div id="right-information-container" class="float-right">
						<div class="box-background" id="price-container">
							<img src="../../media/images/ratings/<?php echo $row["Bewertung"]; ?>" alt="Error404" width="128px" height="34px">
							<p class="box-content" id="pricetag"><?php echo $row["Preis"]; ?> €</p>
							<form action="<?php echo $row["Produktlink"]; ?>">
								<input type="submit" value="Zum Anbieter" class="box-button" ></input>
							</form>
						</div>
					</div>
				</div>
				<div id="description-container">
					<?php echo utf8_encode($row["Beschreibung"]); ?>
				</div>
			</div>
		</div>
		<br><br><br>
	
		<?php include('footer.php'); ?>
    </body>
</html>