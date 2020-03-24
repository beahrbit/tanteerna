<?php
	session_start();
?>

<html>
<head>
	<meta charset="utf-8" />
    <title>YourSpec</title>
	<link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
	<link rel="stylesheet" type="text/css" href="../../style/car-selection.css">
	<script src="../../script/plugins/ChipController/ChipsController.js"></script>
</head>
<body>
	<main>
		<?php include('header.php'); ?>
		
		<div id="content-container">
			<?php if(!isset($_SESSION['user_id'])) { ?>
				<h3> Benutzer nicht gefunden, bitte versuchen sie es erneut: <a href="Login.php" class="linkblau"> Anmelden </a> </h3>
			<?php } else { 
				$nextFile = "backendEnd.php";
				$existingChips = [];
				if (isset($_POST["id"])) {
					$productId = urldecode($_POST["id"]);
					$nextFile = "afterconfig.php";
					
					
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					
					$car = mysqli_query($link, "SELECT * FROM a_p_beziehung WHERE produkt_fk = '$productId';");
					while ($new = mysqli_fetch_array($car)) {
						$array = [
							utf8_encode($new['marke']),
							utf8_encode($new['modell']),
							utf8_encode($new['generation']),
							utf8_encode($new['reihe']),
							utf8_encode($new['modifikation'])
						];
						$array = array_filter($array); // removes all null values
						array_push($existingChips, implode("#", $array));
					}
				}
			?>
			
				<h2 id="headline">Autos auswählen</h2>
				
				<div id="content-container">
					<div class="fill-width">
						<div id="car-selection-container-stage0">
							<!-- AJAX: next select -->
						</div>
					</div>
					<div class="fill-width">
						<button class="button-style" id="add-car-button" onclick="addCar()">Auto hinzufügen</button>
					</div>
					<form id="car-collection-form" method="post" action="<?php echo $nextFile; ?>">
						<div class="fill-width" id="car-chip-container">
							<!-- AJAX: chips -->
						</div>
						<input
							id="car-hidden-input" 
							type="hidden" 
							name="car-selection" 
							value="<?php echo implode("|", $existingChips); ?>"
						>
						<div class="fill-width">
							<input type="hidden" value="<?php echo $productId; ?>" name="id"/>
							<button class="button-style" id="car-submit-button" name="info" value="cars" onclick="updateHidden();">Speichern</button>	
						</div>
					</form>
				</div>
				<br>
				<br>
			<?php } ?>
		</div>
		<?php include('footer.php'); ?>	
	</main>
	<script src="../../script/car-selection.js"></script>
	<script>
		updateDropdown(0);
		readFrom("car-hidden-input");
	</script>
</body>
</html>