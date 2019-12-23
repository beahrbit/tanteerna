/**
 * Contains the headings of all dropdown menus in the correct order
 */
const HEADINGS = {
	"brand" : "Hersteller",
	"model" : "Modell",
	"generation" : "Generation",
	"series" : "Serie",
	"trim" : "Trim"
};

/**
 * Contains the ids of all dropdown menus in the correct order
 */
const DROPDOWN_IDS = ["brand", "model", "generation", "series", "trim"];

/**
 * updates the select item with the select id, depending on the selected
 * item of the previous dropdown-content
 */
function update(i) {
	var values = getDropDownValues(i);
	var path = values.join("#");
	var select = document.getElementById(DROPDOWN_IDS[i]);
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			select.innerHTML = this.responseText;
			executeOnChange(select);
		}
	};
	xmlhttp.open("GET", "getchildren.php?kind=" + i + "&path=" + encodeURIComponent(path),true);
	xmlhttp.send();
}

/**
 * Returns an array of all dropdown values in the correct order until (excluding)
 * the first value that is equal to "".
 * @return mentioned array
 */
function getDropDownValues(stage) {
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
 * disables / enables te subit button depending on the selected version. 
 * If a valid versio is select the submit button is enabled, else not. 
 */
function handleSubmitButton(versionName) {
	var submitButton = document.getElementById("submit");
	submitButton.disabled = (versionName == "");
}

/**
 * executes the onchange event of the transmitted 'select'-Element
 */
function executeOnChange(selectElement) {
	if (selectElement.onchange == "" || selectElement.onchange == null) {
		return;
	}
	var event = new Event('change');
	selectElement.dispatchEvent(event);
}