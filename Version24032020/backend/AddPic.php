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
				if(!isset($_SESSION['user_id'])){
			?>
				<h3> Benutzer nicht gefunden, bitte versuchen sie es erneut: <a href="Login.php" class="linkblau"> Anmelden </a> </h3>
			<?php
				}else{
					
					
					$Pname = $_POST['Pname'];
					$Hauptkategorie = $_POST['Hauptkategorie'];
					$Nebenkategorie = $_POST['Nebenkategorie'];
					$Pbeschreibung = $_POST['Pbeschreibung'];
					$Preis = $_POST['Preis'];
					$Plink = $_POST['Plink'];
					if (isset($_POST["Hione"])) {
						$Hione = $_POST['Hione'];
					}
					if (isset($_POST["Hitwo"])) {
						$Hitwo = $_POST['Hitwo'];
					}
					if (isset($_POST["Hithree"])) {
						$Hithree = $_POST['Hithree'];
					}
					if (isset($_POST["Hifive"])) {
						$Hifive = $_POST['Hifive'];
					}
					if (isset($_POST["Hisix"])) {
						$Hisix = $_POST['Hisix'];
					}
					if (isset($_POST["Hiseven"])) {
						$Hiseven = $_POST['Hiseven'];
					}
					if (isset($_POST["Hieight"])) {
						$Hieight = $_POST['Hieight'];
					}
					if (isset($_POST["Hifour"])) {
						$Hifour = $_POST['Hifour'];
					}
			?>
	
		<div class="hauptinfo">
				<h2>Produktbild:</h2>
				<div class="Button">
					<form method="post"  enctype="multipart/form-data">
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
						<input type="submit" name="submit" value="Hochladen" class="Buttonstyle">
					</form>
				<br>
				<p>Das Bild sollte folgende Eigenschaften besitzen</p>
				<ul>
                                        <li> <b>Um ein Produkt zu erstellen, MUSS ein Bild hochgeladen werden.</b></li>
					<li>Format: png oder jpg/jpeg</li>
					<li>Maximalgröße: 6MB</li>
					<li>Auflösung: gut bis sehr gut</li>
				</ul>
				<div class="Button">
				<form action="car-selection.php" method="post">				
					<input type="submit" name="weiter" value="Weiter" class="Buttonstyle"></input>					
				</form>
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
							$sub = 0;
							$Anbietername = $_SESSION['backmind'];
							$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
							
							$delete = "DELETE FROM produkt WHERE Produktname = '$Pname' AND Beschreibung = '$Pbeschreibung' 
															AND Anbieter = '$Anbietername' AND Preis = '$Preis'
															AND Produktlink = '$Plink' ;";
															
							$del=mysqli_query($link, $delete);
                                                        $Pname = utf8_decode($Pname);
                                                        $filename = utf8_decode($filename);
                                                        $Anbietername = utf8_decode($Anbietername);
                                                        $Hauptkategorie = utf8_decode($Hauptkategorie);
                                                        $Nebenkategorie = utf8_decode($Nebenkategorie);
  $Plink = utf8_decode($Plink);
							$Pbeschreibung = utf8_decode($Pbeschreibung);
                                                        $Hione = utf8_decode($Hione);
$Hitwo = utf8_decode($Hitwo);
$Hithree = utf8_decode($Hithree);
$Hifour = utf8_decode($Hifour);
$Hifive = utf8_decode($Hifive);
$Hisix = utf8_decode($Hisix);
$Hiseven = utf8_decode($Hiseven);
$Hieigth = utf8_decode($Hieigth);
							$sql = "INSERT INTO produkt (Produktname, Produktbild, Beschreibung, Anbieter,
														Preis, Kategorie, Unterkategorie, Produktlink,
														Heins, Hzwei, Hdrei, Hvier, Hfuenf, Hsechs, Hsieben, Hacht) 
														VALUES 
														('$Pname','$filename','$Pbeschreibung','$Anbietername'
														,'$Preis','$Hauptkategorie','$Nebenkategorie','$Plink',
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

							echo "Das Bild wurde erfolgreich hochgeladen, wenn sie ein weiteres Bild hochladen, wird das vorherige Bild gelöscht!";
							
						}else{
							echo "Upload failed!";
						}
					}
					else{
						$filename = "vaf2019-08-09_09h30_48.png";
							
							$sub = 0;
							$Anbietername = $_SESSION['backmind'];
							$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
							
							$delete = "DELETE FROM produkt WHERE Produktname = '$Pname' AND Beschreibung = '$Pbeschreibung' 
															AND Anbieter = '$Anbietername' AND Preis = '$Preis'
															AND Produktlink = '$Plink' ;";
															
							$del=mysqli_query($link, $delete);
                                                        $Pname = utf8_decode($Pname);
                                                        $filename = utf8_decode($filename);
                                                        $Anbietername = utf8_decode($Anbietername);
                                                        $Hauptkategorie = utf8_decode($Hauptkategorie);
                                                        $Nebenkategorie = utf8_decode($Nebenkategorie);
							$Plink = utf8_decode($Plink);
							$Pbeschreibung = utf8_decode($Pbeschreibung);
 $Hione = utf8_decode($Hione);
$Hitwo = utf8_decode($Hitwo);
$Hithree = utf8_decode($Hithree);
$Hifour = utf8_decode($Hifour);
$Hifive = utf8_decode($Hifive);
$Hisix = utf8_decode($Hisix);
$Hiseven = utf8_decode($Hiseven);
$Hieigth = utf8_decode($Hieigth);

							$sql = "INSERT INTO produkt (Produktname, Produktbild, Beschreibung, Anbieter,
														Preis, Kategorie, Unterkategorie, Produktlink,
														Heins, Hzwei, Hdrei, Hvier, Hfuenf, Hsechs, Hsieben, Hacht) 
														VALUES 
														('$Pname','$filename','$Pbeschreibung','$Anbietername'
														,'$Preis','$Hauptkategorie','$Nebenkategorie','$Plink',
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
					}
					}
				
				
					else{
							$filename = "vaf2019-08-09_09h30_48.png";
							
							$sub = 0;
							$Anbietername = $_SESSION['backmind'];
							$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
							
							$delete = "DELETE FROM produkt WHERE Produktname = '$Pname' AND Beschreibung = '$Pbeschreibung' 
															AND Anbieter = '$Anbietername' AND Preis = '$Preis'
															AND Produktlink = '$Plink' ;";
															
							$del=mysqli_query($link, $delete);
                                                        $Pname = utf8_decode($Pname);
                                                        $filename = utf8_decode($filename);
                                                        $Anbietername = utf8_decode($Anbietername);
                                                        $Hauptkategorie = utf8_decode($Hauptkategorie);
                                                        $Nebenkategorie = utf8_decode($Nebenkategorie);
							$Plink = utf8_decode($Plink);

   $Hione = utf8_decode($Hione);
$Hitwo = utf8_decode($Hitwo);
$Hithree = utf8_decode($Hithree);
$Hifour = utf8_decode($Hifour);
$Hifive = utf8_decode($Hifive);
$Hisix = utf8_decode($Hisix);
$Hiseven = utf8_decode($Hiseven);
$Hieigth = utf8_decode($Hieigth);
							
$Pbeschreibung = utf8_decode($Pbeschreibung);
							$sql = "INSERT INTO produkt (Produktname, Produktbild, Beschreibung, Anbieter,
														Preis, Kategorie, Unterkategorie, Produktlink,
														Heins, Hzwei, Hdrei, Hvier, Hfuenf, Hsechs, Hsieben, Hacht) 
														VALUES 
														('$Pname','$filename','$Pbeschreibung','$Anbietername'
														,'$Preis','$Hauptkategorie','$Nebenkategorie','$Plink',
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
					}
				?>
				<br>
				<br>
		</div>	
			<?php
				}
			?>
		</div>
		</div>
		<?php include('footer.php'); ?>	
    </body>
</html>