<?php
	session_start();
?>

<html>
<head>
	<meta charset="utf-8" />
    <title>YourSpec</title>
	<link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
	<link rel="stylesheet" type="text/css" href="../../style/backendEnd.css">
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
					
				$barray = explode("|", $_POST["car-selection"]);
				$id =  $_SESSION['user_id'];
				
				//Datenbankverbindung herstellen:
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
				
				if(count($barray) == 1 && $barray[0] == "" ){
					$sql = "INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp) VALUES ($id, 'PKW') ;";
					$res=mysqli_query($link, $sql);
				}else{
					for($i = 0; $i < count($barray); $i++){
						$temp = explode("#", $barray[$i]);
						$entrylen = count($temp);
                                               $temp[0] = utf8_decode($temp[0]);		
                                               $temp[1] = utf8_decode($temp[1]);		
                                               $temp[2] = utf8_decode($temp[2]);		
                                               $temp[3] = utf8_decode($temp[3]);		
                                               $temp[4] = utf8_decode($temp[4]);		
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
							case 5:	$sql="INSERT INTO a_p_beziehung (produkt_fk, fahrzeugtyp, marke, modell, generation, reihe, modifikation) 
														VALUES ($id, 'PKW', '$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]', '$temp[4]');";
									break;
							default: echo "Error500";
						}
						$res=mysqli_query($link, $sql);
                                                
					}
					$_SESSION['EGL'] = "set";
									
				}
				
				/*mail("support@yourspec.de", "Neues Produkt","Das Produkt mit der ID:" . $id . "wurde hinzugefügt!", "From: Produkteingabeseite <support@yourspec.de>");*/
			?>
			
			<div class="main">
				<h2>Ihr Produkt wurde erfolgreich erstellt</h2>
				<br>
				<img src="../../media/images/misc/haken.png" alt="Error404" height="300px" width="300px" >
				<br>
				<br>
				<table>
					<tr>
					<td>
						<form action="anbieterHome.php">
							<input type="submit" name="newproduct" value="Neues Produkt" class="Buttonstyle">
						</form>
					</td>
					<td>
						<form action="Logout.php">
							<input type="submit" name="Logout" value="Logout" class="Buttonstyle">
						</form>
					</td>
					</tr>
				</table>
			</div>
			<br>
			<br>
			<?php
				}
			?>
		</div>
	</main>
	<?php include('footer.php'); ?>
</body>
</html>