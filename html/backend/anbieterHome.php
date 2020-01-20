<?php
	session_start();
?><?php
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
	
		if(isset($_SESSION['LoginOk']) AND !isset($_SESSION['EGL'])){
			
		$user = $_POST['user'];
		$pwd = hash("sha512", $_POST['pwd']);
	
		//Datenbankverbindung herstellen:
		$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
		$sql = "Select * FROM anbieter Where username = '$user' AND password = '$pwd' ;";
			
		$res=mysqli_query($link, $sql);
		
		if(mysqli_num_rows($res)==0){
			echo "Benutzer nicht gefunden, bitte versuchen sie es erneut: "; ?> <a href="Login.php" class="linkblau"> Anmelden </a> 
		<?php
		}
		else{
			$que = mysqli_fetch_array($res);
			
				
			$_SESSION['backmind'] = $que['Firmenname'];
			$_SESSION['user_id'] = $que['Firmenname'];
			
			}
		}
		
		if(!isset($_SESSION['user_id'])){
			?>
				<h3> Benutzer nicht gefunden, bitte versuchen sie es erneut: <a href="Login.php" class="linkblau"> Anmelden </a> </h3>
		<?php
		}
		?>
			<?php
			/*
			$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
			mysqli_select_db($link, "usr_web26762838_1");
			*/
			$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
			
			$Anbietername = $_SESSION['backmind'];
			
			$res=mysqli_query($link, "SELECT * FROM produkt Where Anbieter ='$Anbietername' ;");
			
			?>
			<h2>Neues Produkt erstellen:</h2>
			<div class="MiddleIT">
				<form action="Produkteingabe.php" method="Post">
					<input type="submit" name="GoOn" value="+" class="PlusButton">
				</form>
			</div>	
			
			<?php
																	
			if(mysqli_num_rows($res)==0)
				echo "<h3 align='center'>Sie haben noch kein Produkt erstellt.</h3>";
			
			echo "<h2>Ihre Produkte:</h2>";
			
			echo "<div class='mittelbox'>";
			while($row = mysqli_fetch_array($res)) { 
			?>
			<div class="gesamtbox">
				<div class='produktbox'>
							<div class='produktbild'>
								<img src="../../media/images/products/<?php echo $row["Produktbild"]; ?>" height="175px" width="175px">
							</div>
							<div class="produktbeschreibung">
								<h3><?php echo utf8_encode($row["Produktname"]); ?></h3>
								<h4><?php echo utf8_encode($row["Anbieter"]); ?></h4> 
								<?php 
									$HK = utf8_encode($row['Kategorie']);
									$NK = utf8_encode($row['Unterkategorie']);
									
									//Datenbankverbindung herstellen:
									$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
					mysqli_select_db($link, "usr_web26762838_1");
									$sql = "SELECT * FROM highlights INNER JOIN kategorien ON highlights.h_id = kategorien.highlight_fk
														WHERE hauptkategorie = '$HK' AND nebenkategorie = '$NK' ;";
											
									$high=mysqli_query($link, $sql);
									
									$rowhigh = mysqli_fetch_array($high); 
								
								?>
								<table>
									<tr>
										<?php if(utf8_encode($row["Heins"]) != "Null"){
												
												if(strtoupper(utf8_encode($row["Heins"]))=="JA"){
													$name="<img src='../../media/images/misc/haken.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}elseif (strtoupper(utf8_encode($row["Heins"]))=="NEIN"){
													$name="<img src='../../media/images/misc/cross.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}else{
													$name = utf8_encode($row["Heins"]);
												}
										?>
											<td><lu><li class='highlight'><?php echo  utf8_encode($rowhigh["Heins"]). $name; ?></li></lu></td>
										<?php } ?>
										<?php if(utf8_encode($row["Hzwei"]) != "Null"){
												
												if(strtoupper(utf8_encode($row["Hzwei"]))=="JA"){
													$name="<img src='../../media/images/misc/haken.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}elseif (strtoupper(utf8_encode($row["Hzwei"]))=="NEIN"){
													$name="<img src='../../media/images/misc/cross.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}else{
													$name = utf8_encode($row["Hzwei"]);
												}
										?>
											<td><lu><li class='highlight'><?php echo  utf8_encode($rowhigh["Hzwei"]). $name; ?></li></lu></td>
										<?php } ?>
									</tr>
									<tr>
										<?php if(utf8_encode($row["Hdrei"]) != "Null"){
											
												if(strtoupper(utf8_encode($row["Hdrei"]))=="JA"){
													$name="<img src='../../media/images/misc/haken.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}elseif (strtoupper(utf8_encode($row["Hdrei"]))=="NEIN"){
													$name="<img src='../../media/images/misc/cross.png' alt='Error404' height='20px' width='20px'class='imgtop'>";
												}else{
													$name = utf8_encode($row["Hdrei"]);
												}
										?>
											<td><lu><li class='highlight'><?php echo  utf8_encode($rowhigh["Hdrei"]). $name; ?></li></lu></td>
										<?php } ?>
										<?php if(utf8_encode($row["Hvier"]) != "Null"){
												
												if(strtoupper(utf8_encode($row["Hvier"]))=="JA"){
													$name="<img src='../../media/images/misc/haken.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}elseif (strtoupper(utf8_encode($row["Hvier"]))=="NEIN"){
													$name="<img src='../../media/images/misc/cross.png' alt='Error404' height='20px' width='20px' class='imgtop'>";
												}else{
													$name = utf8_encode($row["Hvier"]);
												}
										?>
											<td><lu><li class='highlight'><?php echo  utf8_encode($rowhigh["Hvier"]). $name; ?></li></lu></td>
										<?php } ?>
									</tr>
								</table>
							</div>
							<div class="preisbox">
								<p><?php echo $row["Preis"]; ?> €</p>
							</div>
				</div>
				<div class="Buttonbox">
					<form action="afterconfig.php" method="Post">
						<input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
						<button type="submit" name="info" value="delete" class="config_button" onclick="return confirm('Wollen Sie dieses Produkt wirklich löschen?')">
							<img src="../../media/images/misc/delete.png" alt='Error404' width="35px" height="35px" class="Katimg">
						</button>
					</form>
					<form action="produktuebersicht.php" method="Post">
						<input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
						<button type="submit" name="info" value="Co" class="config_button">
							<img src="../../media/images/misc/settings.png" alt='Error404' width="35px" height="35px" class="Katimg">
						</button>
					</form>
				</div>
			</div>
			<?php } ?>
		</div>
		<br><br><br>
	</div>
	</div>
		<?php include('footer.php'); ?>
    </body>
</html>

