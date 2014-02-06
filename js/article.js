var display = false;
var className = "fixed";
var windowSize;
var leftOffset;

$(document).ready(function () {
	// Get window size and set foating objects offset.
	windowSize = $(document).width();
	leftOffset = Math.floor((windowSize - 980) / 2);
	$(".fixed").css("left", leftOffset + "px");
	scrollNav();
	// Hide the "Back to top" buttons and link images when the page loads.
	$(".content .toTop").css("visibility", "hidden");
	$("section header img").css("visibility", "hidden");
	// Initialize all animations.
	addAnimation();
	formatCode();
});

function addAnimation() {
	// Updates the left ofset of the floating element every time the window is resized.
	$(window).resize(function () {
		windowSize = $(document).width();
		leftOffset = Math.floor((windowSize - 980) / 2);
		$(".fixed").css("left", leftOffset + "px");
	});

	// Create animation for "Back to top" fadein and fadeout, and also add animation for floating elment.
	$(window).scroll(scrollNav);
	
	// Intercept click to the "Back to top" links.
	$(".toTop").click(function(event) {
		$('body,html').animate({scrollTop:0},"slow");
		event.preventDefault();
	});
	
	// Intercept clicks to the outline panel.
	$(".outline ul").on("click", "a", function(event) {
		event.preventDefault();
		var href = $(this).attr("href");
		scrollToAnchor(href);
	});

	// Add on hover event for section links (fade in and fade out)
	$("section header").mouseenter(function () {
		$(this).find("img").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 100);
		$(this).find(".toTop").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 100);
	})
	.mouseleave(function () {
		$(this).find("img").css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, 100);
		$(this).find(".toTop").css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0}, 100);
	});
}

// Scrolls until it reaches the element with the specified id.
function scrollToAnchor(aid){
    var aTag = $(aid);
    $("html,body").animate({scrollTop: aTag.offset().top},"slow");
}

// Scrolls the navigation pane into view.
function scrollNav() {
	var scroll = $(this).scrollTop() - 500;
	var nav = $(".float");
	if(scroll >= 0) {
		if (!nav.hasClass(className)) {
			nav.addClass(className);
			nav.css("left", leftOffset + "px");
		}
	} else {
		if (nav.hasClass(className)) {
			nav.removeClass(className);
			nav.css("left", "0");
		}
	}
}

function formatCode() {
	// Get all pre tags of document.
	var code = $("pre");
	// Create a table for each one of the pre tags.
	for (var j = 0; j < code.length; j++) {
		// Get all the inner html of the pre tag.
		var lines = code[j].innerHTML.split("\n");
		

		// Create table variable where the table will be stored.
		var table = "<table>\n";
		// Get the column groups tag.
		table += getColumnGroups();
		// Initailize table body.
		table += "\t<tbody>\n";

		// Generate a table row for each line.
		for (var i = 0; i < lines.length; i++) {
			// Get the row syntax.
			table += getTableRow(i, lines[i]);
		}

		// Close the table body tag.
		table += "\t<tbody>\n";
		// Close the table tag.
		table += "</table>";
		// Set the table as the new inner html of the pre tag.
		code[j].innerHTML = table;

		// Get the data payload of the pre tag.
		var highlight_data = code[j].getAttribute("data-highlight");
		// Add highlight class to the appropriate rows.
		addHighlightClass(code[j], highlight_data);
	}

}

// Creates the colgroup tag.
function getColumnGroups() {
	var colgroup = "";
	colgroup += "\t<colgroup>\n";
	colgroup += "\t\t<col class='first'>\n";
	colgroup += "\t\t<col class='second'\n>";
	colgroup += "\t</colgroup>\n";
	return colgroup;
}

// Creates a new row with the line number on the 
// first cell and the line contents on the second cell.
function getTableRow(i, line) {
	var row = "";
	row += "\t\t<tr>\n";
	// Column one, has the line number.
	row += "\t\t\t<td>" + (i + 1) + "</td>\n";
	// Column two, has the contents of the line of code.
	row += "\t\t\t<td>" + line + "</td>\n";
	row += "\t\t</tr>\n";
	return row;
}

function addHighlightClass(pre, data) {
	if (data == null) {
		return;
	}
	// Turn pre element into jQuery object.
	var pre_j = $(pre);
	// Split highlight data into number array.
	var h_lines = data.split(",");
	// Iterate through every line number that needs to be highlighted.
	for (var i = 0; i < h_lines.length; i++) {
		// Get index of line that needs to be higlighted.
		var index = parseInt(h_lines[i]);
		// Get tr element at the index to be highlighted.
		var row = pre_j.find("tr")[index - 1];
		// Turn row element to jQuery object and add "highlight" class to it.
		$(row).addClass("highlight");
	}
}
