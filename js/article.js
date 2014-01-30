$(document).ready(function () {
	backToTopAnimation();
});

function backToTopAnimation() {
	$(".toTop").hide();
	$(window).scroll(function() {
		if($(this).scrollTop() > 300) {
			$('.toTop').fadeIn();
		} else {
			$('.toTop').fadeOut();
		}
	});
	
	$(".toTop").click(function(event) {
		$('body,html').animate({scrollTop:0},"slow");
		event.preventDefault();
	});
	
	$(".outline").on("click", "a", function(event) {
		event.preventDefault();
		var href = $(this).attr("href");
		scrollToAnchor(href);
	});
}

function scrollToAnchor(aid){
    var aTag = $(aid);
    $("html,body").animate({scrollTop: aTag.offset().top},"slow");
}
