<?php
	session_start();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/ahome.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
		<?php include('header.php'); ?>
		<div id="content-container">
		<div class="hauptinfo">
			<?php
			if(!isset($_SESSION['user_id'])){
			?>
				<h3> Benutzer nicht gefunden, bitte versuchen sie es erneut: <a href="Login.php" class="linkblau"> Anmelden </a> </h3>
			<?php
			}else{
				$id = $_POST['id'];
				$info = $_POST['info'];
				?>
				<div class="MiddleIT">
				<p><img src="../../media/images/misc/haken.png" alt="Error404" height="300px" width="300px" ></p>
				<?php
				if($info == "delete")
				{
					/*
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					*/
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					
					$resone=mysqli_query($link, "DELETE FROM produkt WHERE ID = '$id' ;");
					
					$restwo=mysqli_query($link, "DELETE FROM a_p_beziehung WHERE produkt_fk = '$id' ;");
					
					echo "Ihr Produkt wurde erfolgreich gelöscht - <a href='anbieterHome.php' class='linkblau'>  zurück zur Übersicht. </a>" ;
					
				}else if($info == "pic"){
					
					$path = $_POST['path'];
					
					/*
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					*/
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					
					$res=mysqli_query($link, "UPDATE produkt SET Produktbild = '$path' WHERE ID = '$id';");
					
					echo "Das Produktbild wurde erfolgreich geändert - <a href='anbieterHome.php' class='linkblau'>  zurück zur Übersicht. </a>";
				
				}else if($info == "data"){
					
					$Pname = $_POST['Pname'];
					$Preis = $_POST['Preis'];
					$Plink = $_POST['Plink'];
					$Pbeschreibung = $_POST['Pbeschreibung'];
					
                                       echo $Pname;
                                       $Pname = utf8_decode($Pname);
$Plink = utf8_decode($Plink);
$Pbeschreibung = utf8_decode($Pbeschreibung);


					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					
					$res=mysqli_query($link, "UPDATE produkt SET Produktname = '$Pname', Preis = '$Preis', Beschreibung = '$Pbeschreibung', 
																				Produktlink = '$Plink'  WHERE ID = '$id';");
					
					echo "Das Produktbild wurde erfolgreich geändert - <a href='anbieterHome.php' class='linkblau'>  zurück zur Übersicht. </a>";
					
				}else if ($info == "cars"){
					
				$barray = explode("|", $_POST["car-selection"]);
				$id =  $_POST['id'];
				
				//Datenbankverbindung herstellen:
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
				$delete = mysqli_query($link, "Delete From a_p_beziehung WHERE produkt_fk = '$id';");
				
				if(count($barray) == 1 && $barray[0] == "" ){

					$sql = "INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp) VALUES ($id, 'PKW') ;";
					$res=mysqli_query($link, $sql);
				}else{
					for($i = 0; $i < count($barray); $i++){
						$temp = explode("#", $barray[$i]);
						
						$entrylen = count($temp);		
						
						
						switch($entrylen){
							
							case 1:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke) 
														VALUES ($id, 'PKW', '$temp[0]');";
									break;
							case 2:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke, modell) 
														VALUES ($id, 'PKW', '$temp[0]', '$temp[1]');";
									break;
							case 3:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke, modell, generation) 
														VALUES ($id, 'PKW', '$temp[0]', '$temp[1]','$temp[2]');";
									break;
							case 4:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke, modell, generation, reihe) 
														VALUES ($id, 'PKW', '$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]');";
									break;
							case 5:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke, modell, generation, reihe,  modifikation) 
														VALUES ($id, 'PKW', '$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]', '$temp[4]');";
									break;
							default: echo "Error500";
						}
						$res=mysqli_query($link, $sql);
					}
					$_SESSION['EGL'] = "set";
									
				}
				echo "Ihre Autos wurden erfolgreich geändert - <a href='anbieterHome.php' class='linkblau'>  zurück zur Übersicht. </a>";
				}else if($info == 'kategorie'){
					
					$Hauptkategorie = $_POST['Hauptkategorie'];
					$Nebenkategorie = $_POST['Nebenkategorie'];

                                       $Hauptkategorie = utf8_decode( $Hauptkategorie);
                                       $Nebenkategorie = utf8_decode( $Nebenkategorie);
					
					if (isset($_POST["Hione"])) {
						$Hione = utf8_decode($_POST['Hione']);
					}
					if (isset($_POST["Hitwo"])) {
						$Hitwo = utf8_decode($_POST['Hitwo']);
					}
					if (isset($_POST["Hithree"])) {
						$Hithree = utf8_decode($_POST['Hithree']);
					}
					if (isset($_POST["Hifive"])) {
						$Hifive = utf8_decode($_POST['Hifive']);
					}
					if (isset($_POST["Hisix"])) {
						$Hisix = utf8_decode($_POST['Hisix']);
					}
					if (isset($_POST["Hiseven"])) {
						$Hiseven = utf8_decode($_POST['Hiseven']);
					}
					if (isset($_POST["Hieight"])) {
						$Hieight = utf8_decode($_POST['Hieight']);
					}
					if (isset($_POST["Hifour"])) {
						$Hifour = utf8_decode($_POST['Hifour']);
					}
					
					/*
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					*/
					$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
					
					$res=mysqli_query($link, "UPDATE produkt SET Kategorie = '$Hauptkategorie', Unterkategorie = '$Nebenkategorie', 
														Heins = '$Hione', Hzwei = '$Hitwo', Hdrei = '$Hithree', Hvier = '$Hifour', 
														Hfuenf = '$Hifive', Hsechs = '$Hisix', Hsieben = '$Hiseven', Hacht = '$Hieight'  
														WHERE ID = '$id';");
					
					echo "Die Kategorien wurden erfolgreich angepasst - 
							<a href='anbieterHome.php' class='linkblau'>  zurück zur Übersicht. </a>";
			?>
			
			</div>
			<?php
			}}
			?>
		</div>
		</div>
		<?php include('footer.php'); ?>
    </body>
</html>


