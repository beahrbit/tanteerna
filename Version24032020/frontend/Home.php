<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/Home.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
	<main>
		
		<?php include('header.php'); ?>
	
		<div class="menuebox">
			<div class="ganzlinksbox">
				<img src="../../media/images/misc/auto.png" alt="Error404" height="70px" width="75px">
			</div>
			<?php include('top-right-menu.php'); ?>
		</div>
	
		<div class="hauptinfo">
			<br><br>
			<h2>
				Finde passende Komponenten aus
				<br>
				unzähligen Artikeln
			</h2>
			<br><br>
			<div id="dropdowns">
				<form action="HauptKat.php" method="get" >
					<br>
					<select id="brand" name="Autohersteller" onchange="update(1)" class="rundeEcke">
						<option value="">Hersteller</option>
					</select>
					<br><br>
					<select id="model" name="Modell" onchange="update(2)" class="rundeEcke">
						<option value="">Modell</option>
					</select>
					<br><br>
					<select id="generation" name="Generation" onchange="update(3)" class="rundeEcke">
						<option value="">Generation</option>
					</select>
					<br><br>
					<select id="series" name="Serie" onchange="update(4)" class="rundeEcke">
						<option value="">Serie</option>
					</select>
					<br><br>
					<select id="trim" name="Trim" class="rundeEcke">
						<option value="">Trim</option>
					</select>
					<br><br>
					<input id="submit" type="submit" value="Finde deine Upgrades" class="Buttonstyle"></input>
					<br><br>
					<input type="reset" value="Auswahl zurücksetzen" class="ResetButton"></input>
				</form>
			</div>
			<br><br><br><br><br><br>
		</div>
	
		<?php include('footer.php'); ?>
	
	</main>
	<script language="javascript" type="text/javascript" src="../../script/dropdown-categories.js"></script>
	<script>
		update(0);
	</script>
	
    </body>
</html>