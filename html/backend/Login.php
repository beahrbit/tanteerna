<?php
	session_start();
?>

<html lang="en">
    <head>
    </head>
    <body>
	<?php
		$user = $_POST['user'];
		$pwd = hash("sha512", $_POST['pwd']);
		$_SESSION['user_id'] = $user;
		header('location: Produkteingabe.php');
	?>
		
	
    </body>
</html>