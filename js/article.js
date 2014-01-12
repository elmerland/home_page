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
	
	$('.toTop').click(function() {
		var time = $(window).scrollTop() * 10;
		$('body,html').animate({scrollTop:0},time);
	});
	
	document.onclick = function (e) {
		e = e ||  window.event;
		var element = e.target || e.srcElement;
		if (element.tagName == 'A' && element.className == "toTop") {
			return false; // prevent default action and stop event propagation
		}
	};
}
