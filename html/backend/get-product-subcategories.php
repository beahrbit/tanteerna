<?php
	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link, "tuning_datenbankvol2");
	
	$kind = urldecode($_GET["kind"]);
	if ($kind == "main-categories") {
		$sql = "SELECT DISTINCT hauptkategorie FROM kategorien;";
		echo "<option value=''>Auswählen</option>";
	} else {
		$sql = "SELECT DISTINCT nebenkategorie FROM kategorien WHERE hauptkategorie='" . urldecode($_GET["item"]) . "';";
		echo "<option value=''>Auswählen</option>";
	}
	$res = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_array($res)) {
		if ($kind == "main-categories") {
			echo "<option value'" . utf8_encode($row["hauptkategorie"]) . "'>" . utf8_encode($row["hauptkategorie"]) . "</option>";
		} else {
			echo "<option value'" . utf8_encode($row["nebenkategorie"]) . "'>" . utf8_encode($row["nebenkategorie"]) . "</option>";
		}
	}
?>