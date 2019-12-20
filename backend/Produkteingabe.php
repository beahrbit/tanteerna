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
		}else{
	?>
	
<div class="hauptinfo">
		
		<h2>Neues Produkt anlegen</h2>
		
		<table>
			<tr>
				<td>Produktname:</td>
				<td>
					<form action="AddPic.php" method="POST">
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
			<input type="submit" name="submit" value="Weiter"  class="Buttonstyle" />
			</form>
		</div>
		<?php
			
			}
		
		?>
		
		
	</div>
	</main>
	<script language="javascript" type="text/javascript" src="../../script/product-categories.js"></script>
	<script>
		update("main-categories", "root");
		
	</script>
    </body>
</html>