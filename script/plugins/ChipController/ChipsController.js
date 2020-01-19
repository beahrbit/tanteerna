class ChipController {
	
	/**
	 * Defines the container where all chips are located by its id.
	 * @param instanceName is the name of this ChipController-instance
	 * @param containerID is the id of the chips container
	 * @param prefix will be inserted in front of all .css-classes that will be created
	 * 	in this class 
	 * @param chipCreator is a callback function that gathers all information 
	 * 	needed for the chip and returns the link to the .php-file that defines the 
	 * 	chip. As a parameter it gets the contentText sent via addChip()-methode.
	 * @param onRemove is a method that is called when a chip is deleted. This method
	 *	expects the content, the deleted chip was created with, as parameter
	 * @param preventDependentChips defines whether dependet chips are allowed. If so: 
	 *  when a new chips is added, all chips whos content starts with the content of the 
	 *  new chip are deleted.
	 */
	constructor(instanceName, containerID, prefix, chipCreator, onRemove, preventDependentChips) {
		this.instanceName = instanceName;
		this.container = document.getElementById(containerID);
		this.prefix = prefix;
		this.chipCreator = chipCreator;
		this.onRemove = onRemove;
		this.preventDependentChips = preventDependentChips;
		
		this.filePath = this.getFilePath();
		this.chips = {};
		this.index = 0;
		this.pendingChips = [];
	}
	
	/**
	 * Adds a chip with the content defined by the chipCreator defined in
	 * the constructor.
	 * @param contentText is added to the array representing the current chip
	 */
	addChip(contentText) {
		// handle dependet chips
		if (this.preventDependentChips) {
			for (var key in this.chips) {
				if (this.chips[key].startsWith(contentText)) {
					this.removeChip(key);
				}
			}
		}
		
		// update: for some reasons important to be called first
		this.chips[this.index.toString()] = ""; //init: important
		this.pendingChips.push(this.index);
		this.index++;
				
		// create chip
		this.ajax(
			this,
			this.getBlankChipLink(),
			function (response) {
				this.caller.container.innerHTML += response.responseText;
				
				this.caller.ajax(
					this.caller,
					this.caller.chipCreator(contentText),
					function (response) {
						var index = this.caller.pendingChips.shift();
						
						var chipContainer = document.getElementById(this.caller.prefix + "-chip-" + index);
						chipContainer.innerHTML = response.responseText + chipContainer.innerHTML;
						
						this.caller.chips[index.toString()] = contentText;
					}
				);
			}
		);
	}
	
	/**
	 * Removes the chip with the matching id from the container and the
	 * array. Afterwards onRemove() is called. This method is called by
	 * the delete button defined in chip.php.
	 * @param id of the chip that is deleted
	 */
	removeChip(id) {
		// remove chip from container
		var chip = document.getElementById(this.prefix + "-chip-" + id);
		this.container.removeChild(chip);
		
		// remove chip content from array
		var deletedContent = this.chips[id];
		delete this.chips[id]
		
		this.onRemove(deletedContent);
	}
	
	/**
	 * Performs an ajax-action where the fileLink is send to the server. If the
	 * request was successful the method onSuccess is executed with the parameter
	 * from .onreadystatechange.
	 * @param caller is the object that called this method. Through 'this.caller' it
	 * 	useable in the onSuccess-method
	 * @param fileLink is the link that send to the server
	 * @param onSuccess is a function that executed when the request was successful.
	 * 	it expects the parameter from .onreadystatechange as parameter.
	 */
	ajax(caller, fileLink, onSuccess) {
		var request;
		if (window.XMLHttpRequest) {
			request = new XMLHttpRequest();
		} else {
			request = new ActiveXObject("Microsoft.XMLHTTP");
		}
		request.caller = caller;
		request.onSuccess = onSuccess;
		request.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				this.onSuccess(this);
			}
		}
		request.open("GET", fileLink, true);
		request.send();
	}
	
	/**
	 * Creates the link to the chip.php-file (with all neccessary parameters)
	 * that creates the general chip. The content of the chip is defined else where.
	 * @return mentioned link
	 */
	getBlankChipLink() {
		return this.filePath + "chip.php?"
			+ "prefix=" + encodeURIComponent(this.prefix) 
			+ "&id=" + encodeURIComponent(this.index - 1)
			+ "&instanceName=" + encodeURIComponent(this.instanceName);
	}
	
	/**
	 * Returns the path of this file
	 * @return the path of this file
	 */
	getFilePath() {
		var scripts = document.getElementsByTagName('script');
		
		var i = 0;
		while (!scripts[i].src.includes('ChipsController.js')) {
			++i;
		}
		
		var path = scripts[i].src;
		path = path.split('?')[0];								// remove all parameter
		path = path.split('/').slice(0, -1).join('/') + '/';	// remove file name from the path
		
		return path;
	}
	
	/**
	 * Returns the chips array.
	 * @return the chips array
	 */
	get chipsContent() {
		var result = [];
		for (var key in this.chips) {
			result.push(this.chips[key]);
		}
		return result;
	}
	
}