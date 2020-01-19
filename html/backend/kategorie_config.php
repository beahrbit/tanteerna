<?php
	session_start();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
        <link rel="stylesheet" type="text/css" href="../../style/Backend.css">
		<link rel="stylesheet" type="text/css" href="Produkteingabecss.css">
		
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
    </head>
    <body>
	<main>
	<?php include('header.php'); ?>
	<div id="content-container">
	<?php		
		if(!isset($_SESSION['user_id'])){
			?>
				<h3> Benutzer nicht gefunden, bitte versuchen sie es erneut: <a href="Login.php" class="linkblau"> Anmelden </a> </h3>
	<?php 	
		}else {
		
		$Pid = $_POST['katConfig'];
	?>
	<div class="hauptinfo">
		
		<table>
		<tr>
			<td>Hauptkategorie:</td>
			<td>
				<form action="afterconfig.php" method="POST" id="form">
				<select id="main-categories" name="Hauptkategorie" class="egblength" onchange="update('sub-categories',this.value)" required>
					<option value="">Auswählen</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nebenkategorie:</td>
			<td>
				<select id="sub-categories" name="Nebenkategorie" class="egblength" onchange="showHighlights()" required>
					<option value="">Auswählen</option>
				</select>
			</td>
		</tr>
		</table>
		<div id="highlight-container">
			<!-- highlights Ajax -->
		</div>
		<table>
		<tr>
			<td>
				<input type="hidden" name="id" value="<?php echo $Pid;?>">
				<button name="info" value="kategorie" class="Buttonstyle">Ändern</button>
				</form>
			</td>
		</tr>
		</table>
	<?php
		}
	?>
	</div>
	</div>
	</main>
	<?php include('footer.php'); ?>
	<script language="javascript" type="text/javascript" src="../../script/product-categories.js"></script>
	<script>
		update("main-categories", "root");
	</script>
    </body>
</html>