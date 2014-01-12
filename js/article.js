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
	
	$('.toTop').click(function(event) {
		var time = $(window).scrollTop() * 100;
		$('body,html').animate({scrollTop:0},time);
		event.preventDefault();
	});
}
