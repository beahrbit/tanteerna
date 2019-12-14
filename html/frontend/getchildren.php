<?php
	$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
	mysqli_select_db($link, "usr_web26762838_1");
	
	$kind = urldecode($_GET["kind"]);
	if ($kind == "brand") {
		$sql = "SELECT DISTINCT Marke FROM auto;";
		echo "<option value=''>Hersteller</option>";
	} else if ($kind == "model") {
		$sql = "SELECT DISTINCT Modell FROM auto WHERE Marke='" . urldecode($_GET["item"]) . "';";
		echo "<option value=''>Modell</option>";
	} else {
		$sql = "SELECT DISTINCT Ausfuehrung FROM auto WHERE Modell='" . urldecode($_GET["item"]) . "';";
		echo "<option value=''>Ausführung</option>";
	}
	$res = mysqli_query($link, $sql);
	while ($row = mysqli_fetch_array($res)) {
		if ($kind == "brand") {
			echo "<option value'" . $row["Marke"] . "'>" . $row["Marke"] . "</option>";
		} else if ($kind == "model") {
			echo "<option value'" . $row["Modell"] . "'>" . $row["Modell"] . "</option>";
		} else {
			echo "<option value'" . $row["Ausfuehrung"] . "'>" . $row["Ausfuehrung"] . "</option>";
		}
	}
?>