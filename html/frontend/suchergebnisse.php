<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/suchergeb.css">
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
					$array = ["v1", "v2", "v3", "v4", "abc"];
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
				<?php
				$NebenKate=urldecode($_GET["abc"]);
				$v1 = urldecode($_GET["v1"]);
				$v2 = urldecode($_GET["v2"]);
				$v3 = urldecode($_GET["v3"]);
				$v4 = urldecode($_GET["v4"]);
				
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				$res=mysqli_query($link, "SELECT * FROM produkt INNER JOIN a_p_beziehung ON produkt.ID = a_p_beziehung.produkt_fk 											INNER JOIN auto ON auto.ID = a_p_beziehung.auto_fk 
																	WHERE auto.Marke = '$v1' AND auto.Modell = '$v2' 
																		AND auto.Ausfuehrung = '$v3'
																		AND produkt.Kategorie = '$v4' 
																		AND produkt.Unterkategorie = '$NebenKate';");
																		
				if(mysqli_num_rows($res)==0)
					echo "<h3 align='center'>Keine Produkte verfügbar. Wir arbeiten daran! Wenn du ein Produkt kennst, was hier fehlt, <a href='Kontakt.html' class='Linkhover'>kontaktiere uns!</a></h3>";
				
				echo "<div class='mittelbox'>";
				while($row = mysqli_fetch_array($res)) { 
				?>
				<div class='produktbox'>
					<form action='produkt.php' method='get'>
						<input type='hidden' name='v1' value="<?php echo urlencode($v1); ?>">
						<input type='hidden' name='v2' value="<?php echo urlencode($v2); ?>">
						<input type='hidden' name='v3' value="<?php echo urlencode($v3); ?>">
						<input type='hidden' name='v4' value="<?php echo urlencode($v4); ?>">
						<input type='hidden' name='v5' value="<?php echo urlencode($NebenKate); ?>">
						<button type='submit' name='abc' value="<?php echo urlencode($row["Produktname"])?>" class='buttonstyle'>
							<div class='produktbild'>
								<img src="../../media/images/products/<?php echo $row["Produktbild"]; ?>" height="175px" width="175px">
							</div>
							<div class="produktbeschreibung">
								<h3><?php echo utf8_encode($row["Produktname"]); ?></h3>
								<h4><?php echo utf8_encode($row["Anbieter"]); ?></h4> 
								<table>
									<tr>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Heins"]); ?></li></lu></td>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hzwei"]); ?></li></lu></td>
									</tr>
									<tr>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hdrei"]); ?></li></lu></td>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hvier"]); ?></li></lu></td>
									</tr>
								</table>
							</div>
							<div class="preisbox">
								<p><?php echo $row["Preis"]; ?> €</p>
							</div>
						</button>
					´</form>
				</div>
				<?php } ?>
			</div>
			<br><br><br>
		</div>
	
		<?php include('footer.php'); ?>
    </body>
</html>