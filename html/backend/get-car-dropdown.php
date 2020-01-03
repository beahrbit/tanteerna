<?php
	$headlines = ["Hersteller", "Modell", "Generation", "Serie", "Trim"];
	$ids = ["brand", "model", "generation", "series", "trim"];
	$db = ["name", "modelname", "generationname", "seriename", "trimname"];
	
	$kind = $_GET["kind"];
	$path = explode("#", urldecode($_GET["path"]));
	$stage = sizeof($path);
	if ($_GET["path"] == "") {
		$stage = 0;
	}
?>

<div class="car-headlines"><?php echo $headlines[$stage] . ":"; ?></div>
<div class="car-selection-container">
	<select 
		id="<?php echo $ids[$stage]; ?>" 
		name="<?php echo $ids[$stage]; ?>" 
		onchange="
			<?php if ($stage < 4) {
				echo "updateDropdown(" . ($stage + 1) . ")";
			} else {
				echo "handleAddButton()";
			} ?>"
		class="rundeEcke">
		<option value="">Alle</option>
		
		<?php 
		if ($stage >= $kind ) {
			$link = mysqli_connect("localhost","root","");
			mysqli_select_db($link, "tuning_datenbankvol2");
			
			$sql = "";
			if ($stage <= 0) {
				$sql = "SELECT * FROM car_make";
			} else {
				$sql = "";
				switch($stage) {
					case 5: $sql = " AND trim.name = '" . $path[4] . "'" . $sql;
					case 4: $sql = " AND serie.name = '" . $path[3] . "'" . $sql;
					case 3: $sql = " AND generation.name = '" . $path[2] . "'" . $sql;
					case 2: $sql = " AND model.name = '" . $path[1] . "'" . $sql;
					case 1: $sql = " WHERE make.name = '" . $path[0] . "'" . $sql;
				}
				$sql = 
					"SELECT 
						make.name AS makename, 
						model.name AS modelname, 
						generation.name AS generationname, 
						serie.name AS seriename, 
						trim.name AS trimname
					FROM car_make make 
						INNER JOIN car_model model ON make.id_car_make = model.id_car_make
						INNER JOIN car_generation generation ON model.id_car_model = generation.id_car_model
						INNER JOIN car_serie serie ON generation.id_car_generation = serie.id_car_generation
						INNER JOIN car_trim trim ON serie.id_car_serie = trim.id_car_serie"
					. $sql
					. "GROUP BY " . $db[$stage];
			}
			
			$res = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_array($res)) {  
				$value = utf8_encode($row[$db[$stage]]); 
				echo "<option value='$value'>$value</option>";
			} 
		} ?>
	</select>
</div>

<?php if ($stage < 5) { ?>
	<div id="<?php echo "car-selection-container-stage" . ($stage + 1); ?>">
		<!-- AJAX: next select -->
	</div>
<?php } ?>