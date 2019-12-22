<?php
	$id = urldecode($_GET["id"]);
	$prefix = urldecode($_GET["prefix"]);
	$instanceName = urldecode($_GET["instanceName"]);
	
	$containerClass = "$prefix-chip";
	$containerID = "$prefix-chip-$id";
	$buttonClass = "$prefix-chip-delete-button";
?>

<div 
	class="<?php echo $containerClass; ?>"
	id="<?php echo $containerID; ?>"
	style="display: inline-block;">
	
	<!-- AJAX: content -->
	
	<span 
		class="<?php echo $buttonClass; ?>" 
		onclick="<?php echo "$instanceName.removeChip($id)"; ?>">
		&times;
	</span>
</div>