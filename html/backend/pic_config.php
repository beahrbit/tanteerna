<?php
	session_start();
?>

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../style/StartLayout.css">
        <link rel="stylesheet" type="text/css" href="../../style/Backend.css">
		<link rel="stylesheet" type="text/css" href="Produkteingabecss.css">
		
        <meta charset="utf-8" />
        <title>YourSpec</title>
		
		
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
		}else {
	?>
	
	<div class="hauptinfo">
		<div class="pic_config">
		<?php 
			$picConfig = $_POST['picConfig'];
		?>
		
		<br>
		<br>
		<br>
		
		<form method="post"  enctype="multipart/form-data">	
				<input type="hidden" name="picConfig" value="<?php echo $picConfig; ?>"/>
				<input type="file" name="Picture" id="Picture" required />	
				<input type="submit" name="submit" value="Hochladen" class="Buttonstyle">
		</form>
		<br>
		<p>Das Bild sollte folgende Eigenschaften besitzen</p>
		<ul>
			<li>Format: png oder jpg/jpeg</li>
			<li>Maximalgröße: 6MB</li>
			<li>Auflösung: gut bis sehr gut</li>
			<li>Es kann nur ein Bild angezeigt werden</li>
		</ul>
		
		<?php
					if(isset($_POST["submit"])){
						$randomOne= chr( mt_rand( 97 , 122 ) );
						$randomTwo= chr( mt_rand( 97 , 122 ) );
						$randomThree= chr( mt_rand( 97 , 122 ) );
						$randomEnd = $randomOne . $randomTwo . $randomThree;
						$zielpfad="../../media/images/products/";
						$filename = $randomEnd . basename($_FILES["Picture"]["name"]);
						$zieldatei= $zielpfad . $filename;
						$error = 0;
						$endung = strtoupper(pathinfo($zieldatei, PATHINFO_EXTENSION));
						
						
						if((getimagesize($_FILES["Picture"]["tmp_name"])) === false){
							$error = 1;
						}
						
						if($endung != strtoupper("png") && $endung != strtoupper("jpg") && $endung != strtoupper("jpeg")){
							$error = 2;
						}
						
						if(file_exists($zieldatei)){
							$error = 3;
						}
						
						if($_FILES["Picture"]["size"] > 6*1024*1024){
							$error = 4;
						}
						
						
						
					if($error == 0){
						if(move_uploaded_file($_FILES["Picture"]["tmp_name"], $zieldatei))
						{
							echo "Das Bild wurde erfolgreich hochgeladen, wenn sie ein weiteres Bild hochladen, wird das vorherige Bild gelöscht!";
						}else{
							echo "Upload failed!";
						}
					}
					else{
						echo $endung . $error . "Fehler bei der Eingabe! Achten sie auf die vorgegebenen Eigenschaften und Versuchen sie es erneut!";
					}
					}
		?>
				
		<form action="afterconfig.php" method="post">	
			<input type="hidden" value="<?php echo $picConfig; ?>" name="id"/>
			<input type="hidden" value="<?php echo $filename; ?>" name="path"/>
			<button name="info" value="pic" class="Buttonstyle">Ändern</button>			
		</form>
		
		
		
	</div>
	</div>
	</div>
	</main>
		<?php } include('footer.php'); ?>
	<script language="javascript" type="text/javascript" src="../../script/product-categories.js"></script>
	<script>
		update("main-categories", "root");
		
	</script>
    </body>
</html>