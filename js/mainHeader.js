window.onload = function () {
	addPageNav();
	addPageHeader();
	backToTopAnimation();
}

function backToTopAnimation() {
	$(window).scroll(function() {
		if($(this).scrollTop() > 250) {
		    $('.toTop').fadeIn();
		} else {
		    $('.toTop').fadeOut();
		}
	});
	
	$('.toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});
	
	document.onclick = function (e) {
		e = e ||  window.event;
		var element = e.target || e.srcElement;
		if (element.tagName == 'A' && element.className == "toTop") {
			return false; // prevent default action and stop event propagation
		}
	};
}

function addPageHeader() {
	var pageHeader = document.createElement("header");
	pageHeader.id = "pageHeader";
	
	var headerDiv = document.createElement("div");
	
	var figure = document.createElement("figure");
	
	var image = document.createElement("img");
	image.src = "_images/logo_600.png";
	image.width = "100";
	image.height = "100";
	
	var header1 = document.createElement("h1");
	header1.innerHTML = "Learn Code Art";
	
	var header2 = document.createElement("h2");
	header2.innerHTML = "Learning, coding, and hoping some of it is art";
	
	figure.appendChild(image);
	headerDiv.appendChild(figure);
	headerDiv.appendChild(header1);
	headerDiv.appendChild(header2);
	pageHeader.appendChild(headerDiv);
	
	$("body").prepend(pageHeader);
}

function addPageNav() {
	var nav = document.createElement("nav");
	nav.id = "pageNav";
	
	var ul = document.createElement("ul");
	
	var home = document.createElement("li");
	
	var homeLink = document.createElement("a");
	homeLink.title = "Home";
	homeLink.href = "index.html";
	homeLink.innerHTML = "Home";
	
	var about = document.createElement("li");
	
	var aboutLink = document.createElement("a");
	aboutLink.title = "About";
	aboutLink.href = "about.html";
	aboutLink.innerHTML = "About";
	
	var resume = document.createElement("li");
	
	var resumeLink = document.createElement("a");
	resumeLink.title = "Resume";
	resumeLink.href = "resume.html";
	resumeLink.innerHTML = "R&eacute;sum&eacute;";
	
	home.appendChild(homeLink);
	about.appendChild(aboutLink);
	resume.appendChild(resumeLink);
	ul.appendChild(home);
	ul.appendChild(about);
	ul.appendChild(resume);
	nav.appendChild(ul);
	
	$("body").prepend(nav);
}