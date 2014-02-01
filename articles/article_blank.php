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
				<h2>Article - Outline</h2>
				<ul>
					<a href="#theProject"><li>The Project</li></a>
					<a href="#theFinalResult"><li>The Final Result</li></a>
					<a href="#theCode"><li>The Code</li></a>
					<a href="#theMakingOf"><li>The Making Of</li></a>
					<ul>
						<a href="#step1"><li>Step 1</li></a>
						<a href="#step2"><li>Step 2</li></a>
					</ul>
					<a href="#conclusion"><li>Conclusion</li></a>
					<a href="#notes"><li>Notes</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>
		
		<header>
			<h1>Title Of The Article</h1>
			<p><time pubdate datetime="2014-00-00">Created on: Month 00, 2014</time></p>
		</header>
		
		<div class="content">
			
			<h2 id="theProject">
				The Project
				<a class="toTop" href="#">Back to top</a>
			</h2>
		
			<p>
			</p>
	
			<h2 id="theFinalResult">
				The Final Result
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>
		
			<h2 id="theCode">
				The Code
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>
	
			<h2 id="theMakingOf">
				The Making Of
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<h3 id="step1">
				Step 1
			</h3>
	
			<p>
			</p>
	
			<h3 id="step2">
				Step 2
			</h3>
	
			<p>
			</p>
	
			<h2 id="conclusion">
				Conclusion
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>
	
			<h2 id="notes">
				Notes
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>

			<section class="social">
				<?php
					include("../php/social/fbLike.php");
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
