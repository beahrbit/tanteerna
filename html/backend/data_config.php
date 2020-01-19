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
	?>
	<div class="hauptinfo">
	<?php
		/*
		$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
		mysqli_select_db($link, "usr_web26762838_1");
		*/
		$Pid = $_POST['dataConfig'];
		
		$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
		mysqli_select_db($link, "usr_web26762838_1");
		
		$Anbietername = $_SESSION['backmind'];
		
		$res=mysqli_query($link, "SELECT * FROM produkt WHERE Anbieter ='$Anbietername'	AND ID = '$Pid';");		
		$row = mysqli_fetch_array($res); 
	?>
	
		<table>
			<form action="afterconfig.php" method="POST">
			<tr>
				<td>Produktname:</td>
				<td><input type="text" value="<?php echo utf8_encode($row['Produktname']); ?>" name="Pname" required></td>
				<td></td>
			</tr>
			<tr>
				<td>Preis:</td>
				<td><input type="text" value="<?php echo utf8_encode($row['Preis']); ?>" name="Preis" required>€</td>
				<td></td>
			</tr>
			<tr>
				<td>Produktlink:</td>
				<td><input type="text" value="<?php echo utf8_encode($row['Produktlink']); ?>" name="Plink" required></td>
				<td></td>
			</tr>
			<tr>
				<td>Beschreibung:</td>
				<td><textarea name="Pbeschreibung" cols="45" rows="8" required><?php echo utf8_encode($row['Beschreibung']); ?></textarea></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>	
						<br>
						<input type="hidden" name="id" value="<?php echo $Pid;?>">
						<button name="info" value="data" class="Buttonstyle">Ändern</button>
					</form>
				</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		
	
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