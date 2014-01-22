$(document).ready(function () {
	backToTopAnimation();
	snippetStyles();
});

function backToTopAnimation() {
	$(".toTop").hide();
	$(window).scroll(function() {
		if($(this).scrollTop() > 250) {
		    $('.toTop').fadeIn();
		} else {
		    $('.toTop').fadeOut();
		}
	});
	
	$(".toTop").click(function(event) {
		$('body,html').animate({scrollTop:0},"slow");
		event.preventDefault();
	});
	
	$("#outline").on("click", "a", function(event) {
		event.preventDefault();
		var href = $(this).attr("href");
		scrollToAnchor(href);
	});
}

function scrollToAnchor(aid){
    var aTag = $(aid);
    $("html,body").animate({scrollTop: aTag.offset().top},"slow");
}

function snippetStyles() {
	var theme = "typical";
	$("pre.htmlCode").snippet("html", {style:theme,showNum:true});
		// Finds <pre> elements with the class "htmlCode"
		// and snippet highlights the HTML code within.

	$("pre.styles").snippet("css",{style:theme,showNum:true});
		// Finds <pre> elements with the class "styles"
		// and snippet highlights the CSS code within
		// using the "greenlcd" styling.

	$("pre.js").snippet("javascript",{style:theme,showNum:true});
		// Finds <pre> elements with the class "js"
		// and snippet highlights the JAVASCRIPT code within
		// using a random style from the selection of 39
		// with a transparent background
		// without showing line numbers.
}
