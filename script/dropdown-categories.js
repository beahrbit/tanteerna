let headings = {"brand" : "Hersteller", "model" : "Modell", "version" : "Ausführung"};

/**
 * updates the select item with the select id, depending on the selected
 * item of the previous dropdown-content
 */
function update(selectId, parentItem) {
	var select = document.getElementById(selectId);
	var headOption = document.createElement("option");
	headOption.text = headings[selectId];
	headOption.value = "";
	select.innerHTML = "";
	select.add(headOption);
	
	if (parentItem == "") {
		executeOnChange(select);
		return;
	}
	
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
	xmlhttp.open("GET", "getchildren.php?kind=" + encodeURIComponent(selectId) + "&item=" + encodeURIComponent(parentItem),true);
	xmlhttp.send();
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