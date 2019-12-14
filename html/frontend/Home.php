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
					<select id="brand" name="Autohersteller" onchange="update('model',this.value)" class="rundeEcke">
						<option value="">Hersteller</option>
					</select>
					<br><br>
					<select id="model" name="Modell" onchange="update('version', this.value)" class="rundeEcke">
						<option value="">Modell</option>
					</select>
					<br><br>
					<select id="version" name="Ausfuehrung" onchange="handleSubmitButton(this.value)" class="rundeEcke">
						<option value="">Ausführung</option>
					</select>
					<br><br>
					<input id="submit" type="submit" value="Finde deine Upgrades" class="Buttonstyle" disabled="disabled"></input>
					<br><br>
					<input type="reset" value="Auswahl zurücksetzen" class="ResetButton"></input>
				</form>
			</div>
			<br><br><br><br><br><br>
		</div>
	
		<?php include('footer.php'); ?>
	
	</main>
	<script language="javascript" type="text/javascript" src="../../script/dropdown-categories.js">
	<script>
		update("brand", "root");
	</script>
	
    </body>
</html>