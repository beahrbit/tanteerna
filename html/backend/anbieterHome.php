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
	
		if(isset($_SESSION['LoginOk']) AND !isset($_SESSION['EGL'])){
			
		$user = $_POST['user'];
		$pwd = hash("sha512", $_POST['pwd']);
	
		//Datenbankverbindung herstellen:
		$link = mysqli_connect("localhost","root","");
	    mysqli_select_db($link, "tuning_datenbankvol2");
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
			$link = mysqli_connect("localhost","root","");
			mysqli_select_db($link, "tuning_datenbankvol2");
			
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
								<table>
									<tr>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Heins"]); ?></li></lu></td>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hzwei"]); ?></li></lu></td>
									</tr>
									<tr>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hdrei"]); ?></li></lu></td>
										<td><lu><li class='highlight'><?php echo utf8_encode($row["Hvier"]); ?></li></lu></td>
									</tr>
								</table>
							</div>
							<div class="preisbox">
								<p><?php echo $row["Preis"]; ?> €</p>
							</div>
				</div>
				<div class="Buttonbox">
					<form method="Post">
						<input type="submit" name="delete" value="Lö" class="config_button">
					</form>
					<form action="produktuebersicht.php" method="Post">
						<input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
						<input type="submit" name="config" value="Co" class="config_button">
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