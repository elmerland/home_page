// Size of the table.
var size;

// Add function to execute when document is ready.
$(document).ready(function () {
	// Add on click event to button.
	$("#button").on("click", createTable);
});

function createTable() {
	// Get table size.
	size = $("#input").val();
	if (size < 5) {
		alert("Invalid table size. It needs to be greater than or equal to 5.");
		return;
	} else {
		clearTable();
		createTableElements();
	}
}

function clearTable() {
	var tableContainer = $("#tableContainer");
	if (tableContainer.length !== 0) {
		tableContainer.remove();
	}
}

function createTableElements() {
	$("body").append("<div id='tableContainer'></div>");
	$("#tableContainer").append("<table></table>");
	$("table").append("<thead></thead>");
	$("table").append("<tbody></tbody>");
	
	createTableHeader();
	createTableBody();
}

function createTableHeader() {
	$("thead").append("<tr></tr>");
	var header = $("thead").first("tr");
	for (var i = 0; i < size; i++) {
		header.append("<th>Heading " + i + "</th>");
	}
}

function createTableBody() {
	for (var i = 0; i < size; i++) {
		$("tbody").append("<tr></tr>");
		var row = $("tbody").last("tr");
		for (var j = 0; j < size; j++) {
			row.append("<td>Cell " + i + "_" + j + "</td>");
		}
	}
}
