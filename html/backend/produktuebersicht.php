<?php
	session_start();
?>

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
		<div id="content-container">
	
		<div id="product-container">
			<?php
				$Pid = urldecode($_POST["id"]);
	
				/*
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				*/
				
				$link = mysqli_connect("localhost","root","");
				mysqli_select_db($link, "tuning_datenbankvol2");
				
				$Anbietername = $_SESSION['backmind'];
				
				$res=mysqli_query($link, "SELECT * FROM produkt WHERE Anbieter ='$Anbietername'	AND ID = '$Pid';");		
				$row = mysqli_fetch_array($res); 
			?>
			<div id="left-sidebar" class="float-left">
				<img src="../../media/images/products/<?php echo $row["Produktbild"]; ?>" width="100%">
				<div class="box-background" id="provider-information">
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
		</div>
		<?php include('footer.php'); ?>
    </body>
</html>