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
	
	
	
		//Datenbankverbindung herstellen:
		$link = mysqli_connect("localhost","root","");
	    mysqli_select_db($link, "tuning_datenbankvol2");
		$sql = "Select * FROM anbieter Where username = '$user' AND password = '$pwd' ;";
			
		$res=mysqli_query($link, $sql);
		
		if(mysqli_num_rows($res)==0){
			echo $pwd;
			echo "Benutzer nicht gefunden, bitte versuchen sie es erneut: "; ?> <a href="Produkteingabe.php"> Anmelden </a> <?php
			
		}
		else{
			$que = mysqli_fetch_array($res);
			
			$_SESSION['user_id'] = $que['Firmenname'];
			header('location: Produkteingabe.php');
			exit;
		}
		
		
		
		
	?>
		
	
    </body>
</html>