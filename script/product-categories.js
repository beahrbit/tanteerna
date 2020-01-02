let headings = {"main-category" : "Auswählen", "sub-category" : "Auswählen"};

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
	
	/*if (parentItem == "") {
		executeOnChange(select);
		return;
	}*/
	
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
	xmlhttp.open("GET", "get-product-subcategories.php?kind=" + encodeURIComponent(selectId) + "&item=" + encodeURIComponent(parentItem),true);
	xmlhttp.send();
	
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

/**
 * AJAX: show hightlights
 */
function showHighlights() {
	var container = document.getElementById("highlight-container");
	var main = document.getElementById("main-categories").value;
	var sub = document.getElementById("sub-categories").value;
	if (sub == "Auswählen") {
		return;
	}
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			container.innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "get-highlights.php?main=" + encodeURIComponent(main) + "&sub=" + encodeURIComponent(sub),true);
	xmlhttp.send();
}