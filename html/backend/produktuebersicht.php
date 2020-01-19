<?php
	session_start();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
		<link rel="stylesheet" type="text/css" href="../../style/produkt.css">
		<link rel="stylesheet" type="text/css" href="../../style/pueber.css">
		
        <meta charset="utf-8" />
        <title>YourSpec</title>
    </head>
    <body>
		<?php include('header.php'); ?>
		
		<div id="content-container">
		<div id="product-container">
			<?php
				$Pid = urldecode($_POST["id"]);
	
				/*
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				*/
				
				$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
				mysqli_select_db($link, "usr_web26762838_1");
				
				$Anbietername = $_SESSION['backmind'];
				
				$res=mysqli_query($link, "SELECT * FROM produkt WHERE Anbieter ='$Anbietername'	AND ID = '$Pid';");		
				$row = mysqli_fetch_array($res); 
			?>
	<h2>Hier können Sie die Daten zu ihrem Produkt anpassen:</h2>
	<div class="mitte">
		<table>
			<tr>
			<td>
				<table>
					<tr>
						<td>Produktname:</td>
						<td><?php echo utf8_encode($row['Produktname']); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Preis:</td>
						<td><?php echo utf8_encode($row['Preis']) . "€"; ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Produktlink:</td>
						<td><?php echo utf8_encode($row['Produktlink']); ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Beschreibung:</td>
						<td><?php echo utf8_encode($row['Beschreibung']); ?></td>
						<td></td>
					</tr>
				</table>
			</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td>
							<form action="data_config.php" method="POST">
								<button name="dataConfig" value="<?php echo $Pid; ?>" class="Buttonstyle">Daten verwalten</button>
							</form>
						</td>
			</tr>
			<tr>
			<td>
				<table>
					<tr>
						<td>Hauptkategorie:</td>
						<td><?php echo utf8_encode($row['Kategorie']); ?></td>
						<td></td>
					</tr>
					
					<tr>
						<td>Nebenkategorie:</td>
						<td><?php echo utf8_encode($row['Unterkategorie']); ?></td>
						<td></td>
					</tr>
				</table>
				
				
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
						
					if(mysqli_num_rows($high)==0){
							
					}
					else{ ?>
						<table>
							<tr>
							<?php
								if($rowhigh["Heins"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Heins"]).$row['Heins'] ;?>
									</td>
							<?php }?>
									
							
							</tr>
							<tr>
							<?php
								if($rowhigh["Hzwei"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hzwei"]).$row['Hzwei'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hdrei"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hdrei"]).$row['Hdrei'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hvier"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hvier"]).$row['Hvier'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hfuenf"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hfuenf"]).$row['Hfuenf'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hsechs"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hsechs"]).$row['Hsechs'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hsieben"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hsieben"]).$row['Hsieben'] ;?>
									</td>
							<?php }?>
							</tr>
							<tr>
							<?php
								if($rowhigh["Hacht"]!=null){ ?>
									<td>
										<?php echo utf8_encode($rowhigh["Hacht"]).$row['Hacht'] ;?>
									</td>
							<?php }?>
							</tr>
						</table>
					<?php
					}	
					?>


				
				
				
				
				
				
				
				
				
				
				<br>
				<br>
			</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td>
				<form action="kategorie_config.php" method="POST">
								<button name="katConfig" value="<?php echo $Pid; ?>" class="Buttonstyle">Kategorien verwalten</button>
				</form>
			</td>
			</tr>
			<tr>
			<td>
				<table>
					<tr>
						<td><img src="../../media/images/products/<?php echo $row["Produktbild"]; ?>" width="250px;" height="250px"></td>
					</tr>
				</table>
			</td>
			<td>
					<form action="pic_config.php" method="Post">
								<button name="picConfig" value="<?php echo $Pid; ?>" class="Buttonstyle">Bild ändern</button>
					</form>
			</td>
			</tr>
			</table>
				<table>
					<tr>
						<td><b>Überblick Autos:</b></td>
					</tr>
					<tr>
						<td>Fahrzeugtyp</td>
						<td>Marke</td>
						<td>Modell</td>
						<td>Generation</td>
						<td>Reihe</td>
						<td>Modifikation</td>
					</tr>
					<?php 
						$car=mysqli_query($link, "SELECT * FROM a_p_beziehung WHERE produkt_fk = '$Pid';");
						
						while($new = mysqli_fetch_array($car)) {
					?>
					<tr>
						<td><?php echo utf8_encode($new['fahrzeugtyp']); ?></td>
						<td><?php echo utf8_encode($new['marke']); ?></td>
						<td><?php echo utf8_encode($new['modell']); ?></td>
						<td><?php echo utf8_encode($new['generation']); ?></td>
						<td><?php echo utf8_encode($new['reihe']); ?></td>
						<td><?php echo utf8_encode($new['modifikation']); ?></td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<form action="car-selection.php" method="POST">
								<button name="id" value="<?php echo $Pid; ?>" class="Buttonstyle">Autos verwalten</button>
							</form>
						</td>
					</tr>
				</table>
	</div>
		<br><br><br>
		</div>
		</div>
		<?php include('footer.php'); ?>
		<script language="javascript" type="text/javascript" src="../../script/product-categories.js"></script>
		<script>
		update("main-categories", "root");
		</script>
    </body>
</html>