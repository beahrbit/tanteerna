<?php
	session_start();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
        <link rel="stylesheet" type="text/css" href="../../style/Produkteingabe.css">
		
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
    </head>
    <body>
	<main>
		<?php include('header.php'); ?>
	
		<div id="content-container">
			<?php
			//Datenbankverbindung herstellen:
			$link = mysqli_connect("localhost","root","");
			mysqli_select_db($link, "tuning_datenbankvol2");
					
			$Compname = $_SESSION['backmind'];
				
			$anzmax = "Select max_produkte FROM anbieter WHERE Firmenname = '$Compname' ;";
			$anznow = "Select Count(*) From produkt WHERE anbieter = '$Compname' ;";
				
			$resmax=mysqli_query($link, $anzmax);
			$resnow=mysqli_query($link, $anznow);
				
			$rowmax = mysqli_fetch_array($resmax);
			$rownow = mysqli_fetch_array($resnow);
				
			if(!isset($_SESSION['user_id'])){
				?>
				<h2>Bitte melden Sie sich hier an:</h2>
				<div class="Button">
					<form action="Login.php" method="POST">
					<table>
						<tr>
							<td>Benutzername: </td>
							<td><input type="text" name="user" required /> </td>
						</tr>
						<tr>
							<td>Password: </td> 
							<td><input type="password" name="pwd" required /></td>
						</tr>
					</table>
						<input type="submit" name="submit" value="Anmelden" class="Anmeldebutton"/>
					<form>
				</div>
				<?php
			}elseif ($rowmax["max_produkte"] <= $rownow["Count(*)"]){
				
				echo $rowmax["max_produkte"] . "<=" .  $rownow["Count(*)"] ;
		?>
			
			<h2> Sie haben die maximale Anzahl an Produkten erreicht, bitte wenden Sie sich an das YourSpec Team um weitere 
				 Produkte erstellen zu können. </h2>
		<?php 	
			}else {
		?>
		
	<div class="hauptinfo">
			
			<h2>Neues Produkt anlegen</h2>
			
			<table>
				<tr>
					<td>Produktname:</td>
					<td>
						<form action="AddPic.php" method="POST" id="form">
							<input type="text" name="Pname" required  class="egblength" />
					</td>
				</tr>
				<tr>
					<td>Hauptkategorie:</td>
					<td>
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
				<tr>
					<td>Produktbescheibung:</td>
					<td>
						 <textarea id="text" name="Pbeschreibung" cols="45" rows="8" required></textarea>
					</td>
				</tr>
				<tr>
					<td>Preis:</td>
					<td>
						<input type="text" name="Preis" required></p>
					</td>
				</tr>
				<tr>
					<td>Produktlink:</td>
					<td>
						<input type="text" name="Plink" width="400px" required></p>
					</td>
				</tr>
			</table>
			
			<div id="highlight-container">
				<!-- highlights Ajax -->
			</div>
			
			<br>
			<br>
			
			<div class="Button">
				<input type="submit" name="asd" value="Weiter"  class="Buttonstyle" />
			</div>
			</form>
			<?php
				 $_SESSION['user_id'] = $_SESSION['backmind'];
				}
			
			?>
			<br>
			<br>
			
		</div>
		</div>
	<?php include('footer.php'); ?>
	</main>
	<script language="javascript" type="text/javascript" src="../../script/product-categories.js"></script>
	<script>
		update("main-categories", "root");
		
	</script>
    </body>
</html>