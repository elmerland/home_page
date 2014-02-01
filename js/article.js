var display = false;
var className = "fixed";
var windowSize;
var leftOffset;

$(document).ready(function () {
	// Get window size and set foating objects offset.
	windowSize = $(document).width();
	leftOffset = Math.floor((windowSize - 980) / 2);
	// Hide the "Back to top" buttons when the page loads.
	$(".toTop").hide();
	// Initialize all animations.
	addAnimation();
});

function addAnimation() {
	// Updates the left ofset of the floating element every time the window is resized.
	$(window).resize(function () {
		windowSize = $(document).width();
		leftOffset = Math.floor((windowSize - 980) / 2);
		$(".fixed").css("left", leftOffset + "px");
	});

	// Create animation for "Back to top" fadein and fadeout, and also add animation for floating elment.
	$(window).scroll(function() {
		var scroll = $(this).scrollTop() - 500;
		var nav = $(".float");
		if(scroll >= 0) {
			displayToggle(true);
			if (!nav.hasClass(className)) {
				nav.addClass(className);
				nav.css("left", leftOffset + "px");
			}
		} else {
			displayToggle(false);
			if (nav.hasClass(className)) {
				nav.removeClass(className);
				nav.css("left", "0");
			}
		}
	});
	
	// Intercept click to the "Back to top" links.
	$(".toTop").click(function(event) {
		$('body,html').animate({scrollTop:0},"slow");
		event.preventDefault();
	});
	
	// Intercept clicks to the outline panel.
	$(".outline").on("click", "a", function(event) {
		event.preventDefault();
		var href = $(this).attr("href");
		scrollToAnchor(href);
	});
}

// Scrolls until it reaches the element with the specified id.
function scrollToAnchor(aid){
    var aTag = $(aid);
    $("html,body").animate({scrollTop: aTag.offset().top},"slow");
}

// Toggles the fadein and fadeout of "Back to top" elements only when needed.
function displayToggle(d) {
	if ((display && d) || (!display && !d)) {
		return;
	}
	else {
		if (d) {
			$('.toTop').fadeIn();
			display = true;
		} else {
			$('.toTop').fadeOut();
			display = false;
		}
		
	}
}
