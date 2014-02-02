<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>Article</title>
</head>
<body>
	<?php
		require_once("../php/social/fbJS.php");
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>

	<div class="banner" style="background-image: url(http://learncodeart.com/_images/patterns/asteroids.jpg);"></div>

	<article class="main">
		
		<nav class="outline float">
			<section>
				<h2>Outline</h2>
				<ul>
					<a href="#who"><li>Who am I?</li></a>
					<a href="#purpose"><li>Purpose Of This Website</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>

		<div class="content">

			<header>
				<h1>Title Of The Article</h1>
				<p><time pubdate datetime="2014-01-08">Created on: January 8, 2014</time></p>
				<section class="social">
					<?php
						include("../php/social/fbLike.php");
						include("../php/social/twitter.php");
					?>
				</section>
			</header>
			
			<section id="who">
				<header>
					<h2>Who Am I?</h2>
					<a href="#who"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					My Name is Elmer Landaverde. Currently I am a senior at Virginia Tech, doing a double major in computer science and business management. But that’s the boring part. More to the point I am a guy who is passionate about learning. My interests vary from sociology, math, statistics to design, photography and aesthetics. Mostly however I just enjoy learning about different things to try and figure out this darn world we live in. Out of all my interests the one I focus on the most and have had the longest is in Computer Science. This passion started when I took my first Java class in high school and has being with me ever since. I hope some of what I write in this webpage is helpful to somebody but most of all this webpage is helpful to me because it serves as visual map of the projects that I embark on.
				</p>
			</section>
	
			<section id="purpose">
				<header>
					<h2>Purpose Of This Website</h2>
					<a href="#purpose"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
	
				<p>
					The idea for this website has being long in the making. However it wasn’t until recently that I had to learn JavaScript for a research project I’m about to be part of, and because the most important part about learning is doing I figured it would be a good practice to finally create a web page to get some practice. This is how I came about to create this site. Initially I thought I would just make a <a title="Word Press" href="http://wordpress.org/" target="_blank">WordPress</a> blog, but that ended quickly. Partly because I didn’t find a theme I liked, and mostly because typing it up your-self is more fun :)
				</p>
				
				<p>
					The main purpose of this site is to write articles about the projects that I complete either for class or for pleasure. It will also serve to me as a visual representation of my progress across time and be a useful place for things that I forget and wish to remember. Never the less I do hope that this site can be helpful to someone other than me, and so I will put as much effort as I have time for into writing the articles for this site.
				</p>
				
				<p>
					Thanks for visiting my site and hope you find something that interests you!	
				</p>

			</section>

			<section class="social">
				<?php
					include("../php/social/fbLike.php");
					include("../php/social/twitter.php");
				?>
			</section>
			
			<footer>
				<p>
					Written by: Elmer Landaverde (elmerlandaverde@gmail.com)<br>
					Last updated: Feburary 2, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		
		</div>
	</article>
</body>
</html>
