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
			<h2>Bitte melden Sie sich hier an:</h2>
			<?php
				$_SESSION['LoginOk'] = "Ok";
			?>
			<div class="Button">
				<form action="anbieterHome.php" method="POST">
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
		</div>
		<?php include('footer.php'); ?>	
    </body>
</html>