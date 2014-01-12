$(document).ready(function () {
	backToTopAnimation();
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
		console.log("Clicked on link");
		event.preventDefault();
		var href = $(this).attr("href");
		scrollToAnchor(href);
	});
}

function scrollToAnchor(aid){
	console.log("Trying to scroll to link: " + aid);
    var aTag = $(aid);
    $("html,body").animate({scrollTop: aTag.offset().top},"slow");
}
