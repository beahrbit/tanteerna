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
		<?php include('header.php'); ?>
		
		<div id="content-container">
				<?php
					$Pname = $_POST['Pname'];
					$Hauptkategorie = $_POST['Hauptkategorie'];
					$Nebenkategorie = $_POST['Nebenkategorie'];
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
						<input type='hidden' name='Pname' value="<?php echo $Pname; ?>">
						<input type='hidden' name='Hauptkategorie' value="<?php echo $Hauptkategorie; ?>">
						<input type='hidden' name='Nebenkategorie' value="<?php echo $Nebenkategorie; ?>">
						<input type='hidden' name='Pbeschreibung' value="<?php echo $Pbeschreibung; ?>">
						<input type='hidden' name='Preis' value="<?php echo $Preis; ?>">
						<input type='hidden' name='Plink' value="<?php echo $Plink; ?>">
						<input type='hidden' name='Plink' value="<?php echo $Plink; ?>">
						<input type='hidden' name='Plink' value="<?php echo $Plink; ?>">
						<input type='hidden' name='Hione' value="<?php echo $Hione; ?>">
						<input type='hidden' name='Hitwo' value="<?php echo $Hitwo; ?>">
						<input type='hidden' name='Hithree' value="<?php echo $Hithree; ?>">
						<input type='hidden' name='Hifour' value="<?php echo $Hifour; ?>">
						<input type='hidden' name='Hifive' value="<?php echo $Hifive; ?>">
						<input type='hidden' name='Hisix' value="<?php echo $Hisix; ?>">
						<input type='hidden' name='Hiseven' value="<?php echo $Hiseven; ?>">
						<input type='hidden' name='Hieight' value="<?php echo $Hieight; ?>">
						<input type="file" name="Picture" id="Picture" required />						
						<input type="submit" name="submit" value="Weiter" class="Buttonstyle"></input>					
					</form>
					<br>
					<p>Das Bild sollte folgende Eigenschaften besitzen</p>
					<ul>
						<li>Format: png oder jpg/jpeg</li>
						<li>Maximalgröße: 6MB</li>
						<li>Auflösung: gut bis sehr gut</li>
					</ul>
			</div>
					<?php
						if(isset($_POST["submit"])){
							$randomOne= chr( mt_rand( 97 , 122 ) );
							$randomTwo= chr( mt_rand( 97 , 122 ) );
							$randomThree= chr( mt_rand( 97 , 122 ) );
							$randomEnd = $randomOne . $randomTwo . $randomThree;
							$zielpfad="../../media/images/products/";
							$filename = $randomEnd . basename($_FILES["Picture"]["name"]);
							$zieldatei= $zielpfad . $filename;
							$error = 0;
							$endung = strtoupper(pathinfo($zieldatei, PATHINFO_EXTENSION));
							
							
							if((getimagesize($_FILES["Picture"]["tmp_name"])) === false){
								$error = 1;
							}
							
							if($endung != strtoupper("png") && $endung != strtoupper("jpg") && $endung != strtoupper("jpeg")){
								$error = 2;
							}
							
							if(file_exists($zieldatei)){
								$error = 3;
							}
							
							if($_FILES["Picture"]["size"] > 6*1024*1024){
								$error = 4;
							}
							
							
							
						if($error == 0){
							if(move_uploaded_file($_FILES["Picture"]["tmp_name"], $zieldatei))
							{
								$Anbietername = $_SESSION['user_id'];
								$link = mysqli_connect("localhost","root","");
								mysqli_select_db($link, "tuning_datenbankvol2");
								
								$sql = "INSERT INTO produkt (Produktname, Produktbild, Beschreibung, Anbieter,
															Preis, Kategorie, Unterkategorie, Produktlink,
															Heins, Hzwei, Hdrei, Hvier, Hfuenf, Hsechs, Hsieben, Hacht) 
															VALUES 
															('$Pname','$filename','$Pbeschreibung','$Anbietername'
															,'intval($Preis)','$Hauptkategorie','$Nebenkategorie','$Plink',
															'$Hione','$Hitwo','$Hithree','$Hifour',
															'$Hifive','$Hisix','$Hiseven','$Hieight');";
															
								$res=mysqli_query($link, $sql);
								/* gestern abend*/
								$sql = "SELECT * FROM produkt WHERE Produktname = '$Pname' AND Produktbild = '$filename'
																	AND Beschreibung = '$Pbeschreibung' 
																	AND Produktlink = '$Plink';";
								
								$res = mysqli_query($link, $sql);
								$que = mysqli_fetch_array($res);
								$_SESSION['user_id'] = $que['ID'];
								
								
								header('location: car-selection.php');
								exit;
								
							}else{
								echo "Upload failed!";
							}
						}
						else{
							echo $endung . $error . "Fehler bei der Eingabe! Achten sie auf die vorgegebenen EIgenschaften und Versuchen sie es erneut!";
						}
						}
					?>
					<br>
					<br>
			</div>	
				<?php
					}
				?>
		</div>
		
		<?php include('footer.php'); ?>	
    </body>
</html>