$(document).ready(function () {
	backToTopAnimation();
});

function backToTopAnimation() {
	$(".toTop").hide();
	$(window).scroll(function() {
		if($(this).scrollTop() > 500) {
			$('.toTop').fadeIn();
			var scroll = $(this).scrollTop();
			console.log(scroll);
			scroll = scroll - 500;
			$(".float").css("top", scroll + "px");
		} else {
			$('.toTop').fadeOut();
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
