<?php
	session_start();
?>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
    </head>
    <body>
		<main>
		<?php include('../frontend/header.php'); ?>
		
			<?php
				$Pname = $_POST['Pname'];
				$Hkategorie = $_POST['Hkategorie'];
				$Nkategorie = $_POST['Nkategorie'];
				$Pbeschreibung = $_POST['Pbeschreibung'];
				$Preis = $_POST['Preis'];
				$Plink = $_POST['Plink'];
				$file = $_POST['Picture'];
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
		
		
		</div>
			<?php
				}
			?>	
    </body>
</html>