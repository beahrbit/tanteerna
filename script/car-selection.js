/**
 * Contains the ids all dropdown menus in the correct order
 */
const DROPDOWN_IDS = ["brand", "model", "generation", "series", "trim"];

var chipController = new ChipController(
	
	// name of the variable, which is defined here
	"chipController",
	
	// id of the container in which all chips will be inserted
	"car-chip-container",
	
	// specific prefix for this ChipController. All .css classes and ids that 
	// are used in the class, will get this prefix the following way:
	//		.<prefix>-chip for the container of a chip
	//		.<prefix>-chip-delete-button for the <span> that represents the delete button
	// Those may be varied by a custom .css file
	"car",
	
	// method that creates the path that is sent via AJAX to
	// build the content of the next chip
	/**
	 * Returns the current content of the non-null dropdown as string
	 * concatenated with a <br>. Therefore the different dropdown values
	 * will be in different lines in the chip.
	 * @return dropdown contents as string
	 */
	function() {
		var car = getDropDownValues(5).join("<br>");
		if (car == "") {
			car = "Alle Autos";
		}
		return "car-chip.php?text=" + car;
	},
	
	// method that is called when a chip is removed. It gets the content of
	// this chip as parameter
	/**
	 * Updates the hidden field, which contains all chip contents, and the
	 * add button.
	 */
	function(chipContent) {
		updateHidden();
		handleAddButton();
	},
	
	// prevent dependet chips (in tree)
	true
);

/**
 * Uses the ChipController instance to add a chip with the content defined
 * by the set of dropdown menus. Afterwards the hidden field and the add button
 * are updated. 
 */
function addCar() {
	var car = getDropDownValues(5).join("#") + "#";
	if (car == "#") {
		car = "";
	}
	console.log("path: " + car);
	chipController.addChip(car);
	
	updateHidden();
	handleAddButton();
}

/**
 * Handles the inputs given by currently existing dropdown menus. This Method
 * is always called when a dropdown was changed, where i is the number of the
 * specific dropdown: 1 for brand, 2 for model, ...
 * If the dropdown was set to the value "", the content of the belonging container
 * ('car-selection-container-stage' + i) is emptied. Else the next dropdown menu
 * is loaded into this container using ajax and the previous dropdown inputs.
 * @param i is the number of the dropdown menu, that was changed
 */
function updateDropdown(i) {
	var values = getDropDownValues(i);
	var path = values.join("#");
	var container = document.getElementById("car-selection-container-stage" + i);
	console.log("load " + values + " into " + i + " (path:" + path + ")");
	
	if (values[i-1] == "" || values.length != i) {
		container.innerHTML = "";
	} else {
		ajax(
			"get-car-dropdown.php?path=" + encodeURIComponent(path),
			function (response) {
				container.innerHTML = response.responseText;
			}
		);
	}
	
	handleAddButton();
}

/**
 * Returns an array of all dropdown values in the correct order until (excluding)
 * the first value that is equal to "".
 * @return mentioned array
 */
function getDropDownValues(stage) {
	console.log(stage);
	var result = [];
	
	for (var i = 0; i < stage; i++) {
		var dropdown = document.getElementById(DROPDOWN_IDS[i]);
		if (dropdown == null) {
			return result;
		}
		if (dropdown.value == "") {
			if (i == 0) {
				result.push[""];
			}
			return result;
		}
		result.push(dropdown.value);
	}
	
	return result;
}

/**
 * Updates the hidden field 'car-hidden-input' to contain the chipsContent of the
 * chipController. The last '#', that was added to handle dependet chips correct, is
 * removed
 */
function updateHidden() {
	let result = chipController.chipsContent;
	result.forEach((chip, i, arr) => arr[i] = chip.slice(0, -1))
	result = result.join("|");
	document.getElementById("car-hidden-input").innerHTML = result;
	document.getElementById("car-hidden-input").value = result;
}

/**
 * Disables the 'add-car-button'-Button when the current selected car is already
 * a part of a selected group (chip). Else the button is enabled.
 */ 
function handleAddButton() {
	var button = document.getElementById("add-car-button");
	var chips = chipController.chipsContent;
	console.log("chips: ");
	console.log(chips);
	var input = getDropDownValues(5).join("#");
	
	for (var i = 0; i < chips.length; i++) {
		if (chips[i] == "" || (input.startsWith(chips[i]) || (input + "#") == chips[i])) {
			console.log("'" + input + "' starts with '" + chips[i] + "'");
			button.disabled = true;
			return;
		}
	}
	button.disabled = false;
}

/**
 * Performs an ajax-action where the fileLink is send to the server. If the
 * request was successful the method onSuccess is executed with the parameter
 * from .onreadystatechange.
 * @param fileLink is the link that send to the server
 * @param onSuccess is a function that executed when the request was successful.
 * 	it expects the parameter from .onreadystatechange as parameter.
 */
function ajax(fileLink, onSuccess) {
	var request;
	if (window.XMLHttpRequest) {
		request = new XMLHttpRequest();
	} else {
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	request.onSuccess = onSuccess;
	request.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			this.onSuccess(this);
		}
	}
	request.open("GET", fileLink, true);
	request.send();
}