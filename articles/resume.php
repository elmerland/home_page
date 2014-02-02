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
					<a href="#resume"><li>My R&eacute;sum&eacute;</li></a>
					<ul>
						<a href="#high"><li>High Resolution</li></a>
						<a href="#low"><li>Low Resolution</li></a>
					</ul>
				</ul>
			</section>
		</nav>

		<div class="content">

			<header>
				<h1>My R&eacute;sum&eacute;</h1>
				<p><time pubdate datetime="2014-01-08">Created on: January 8, 2014</time></p>
				<section class="social">
					<?php
						include("../php/social/fbLike.php");
						include("../php/social/twitter.php");
					?>
				</section>
			</header>
			
			<section id="resume">
				<header>
					<h2>My R&eacute;sum&eacute;</h2>
					<a href="#resume"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>

				</p>

				<section id="high">
					<header>
						<h3>High Resolution</h3>
					</header>
			
					<p>
						<a title="High resolution resume" href="http://learncodeart.com/_sources/resume_high_res.pdf" target="_blank">Resume</a>
					</p>
				</section>

				<section id="low">
					<header>
						<h3>Low Resolution</h3>
					</header>
			
					<p>
						<a title="High resolution resume" href="http://learncodeart.com/_sources/resume_low_res.pdf" target="_blank">Resume</a>
					</p>
				</section>
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
					Last updated: Month 00, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		
		</div>
	</article>
</body>
</html>
