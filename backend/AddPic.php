<?php
	session_start();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="Produkteingabecss.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
    </head>
    <body>
		<main>
		<?php include('../frontend/header.php'); ?>
		
			<?php
				$Pname = $_POST['Pname'];
				$Hkategorie = $_POST['Hauptkategorie'];
				$Nkategorie = $_POST['Nebenkategorie'];
				$Pbeschreibung = $_POST['Pbeschreibung'];
				$Preis = $_POST['Preis'];
				$Plink = $_POST['Plink'];
				$Hione = $_POST['Hione'];
				$Hitwo = $_POST['Hitwo'];
				$Hithree = $_POST['Hithree'];
				$Hifive = $_POST['Hifive'];
				$Hisix = $_POST['Hisix'];
				$Hiseven = $_POST['Hiseven'];
				$Hieight = $_POST['Hieight'];
				$Hifour = $_POST['Hifour'];
			?>
	
			<?php
				if(!isset($_SESSION['user_id'])){
			?>
				<h2>Bitte melden Sie sich hier an:</h2>
				<form action="Login.php" method="POST">
				<p>Benutzername: <input type="text" name="user" required /></p>
				<p>Password: <input type="password" name="pwd" required /></p>
				<input type="submit" name="submit" value="Anmelden"/>
				<form>
			
			<?php
				}else{
			?>
	
		<div class="hauptinfo">
				<h2>Produktbild:</h2>
				<div class="Button">
				<form action="" method="post" enctype="multipart/form-data">
					<input type='hidden' name='Pname' value=".urlencode($Pname).">
					<input type='hidden' name='Hkategorie' value=".urlencode($Hkategorie).">
					<input type='hidden' name='Nkategorie' value=".urlencode($Nkategorie).">
					<input type='hidden' name='Pbeschreibung' value=".urlencode($Pbeschreibung).">
					<input type='hidden' name='Preis' value=".urlencode($Preis).">
					<input type='hidden' name='Plink' value=".urlencode($Plink).">
					<input type="file" name="Picture" id="Picture" />						
					<input type="submit" name="submit" value="Weiter" class="Buttonstyle"></input>					
				</form>
				</div>
				<?php
				/*
					if(isset($_POST["submit"])){
						$zielpfad="../../media/images/products/";
						$zieldatei= $zielpfad . basename($_FILES["Picture"]["name"]);
						$error = 0;
						$endung = strtoupper(pathinfo($zieldatei, PATHINFO_EXTENSION));
						$imagesize = getimagesize($_FILES["Picture"]["tmp_name"]);
						
						if($imagesize === false){
							$error = 1;
						}
						
						if($endung != strtoupper("png") && $endung != strtoupper("jpg") && $endung != strtoupper("jpeg")){
							$error = 1;
						}
						
						if(file_exists($zieldatei)){
							$error = 1;
						}
						
						if($_FILES["Picture"]["size"] > 2*1024*1024){
							$error = 1;
						}
						
						
						
					if($error != 1){
						if(move_uploaded_file($_FILES["Picture"]["tmp_name"], $zieldatei))
						{
							echo "Download hat geklappt!";
						}else{
							echo "Verschissen";
						}
					}
					else{
						echo "Fehler bei der Eingabe!";
					}
					}*/
				?>
		
		</div>
		
			
			<?php
				}
			?>
			
    </body>
</html>