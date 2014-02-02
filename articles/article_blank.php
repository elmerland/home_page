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
				<header>Article - Outline</header>
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
			
			<section id="theProject">
				<header>
					<h2>The Project</h2>
					<a href="#theProject"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
				</p>
			</section>
	
			<section id="theFinalResult">
				<header>
					<h2>The Final Result</h2>
					<a href="#theFinalResult"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
	
				<p>
				</p>
			</section>
		
			<section id="theCode">
				<header>
					<h2>The Code</h2>
					<a href="#theCode"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
				</p>
			</section>
	
			<section id="theMakingOf">
				<header>
					<h2>The Making Of</h2>
					<a href="#theMakingOf"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
	
				<section id="step1">
					<header>
						<h3>Step 1</h3>
					</header>
			
					<p>
					</p>
				</section>
		
				<section id="step2">
					<header>
						<h3>Step 2</h3>
					</header>
			
					<p>
					</p>
				</section>
			</section>
	
			<section id="conclusion">
				<header>
					<h2>Conclusion</h2>
					<a href="#conclusion"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
				</p>
			</section>
	
			<section id="notes">
				<header>
					<h2>Notes</h2>
					<a href="#notes"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
				</p>
			</section>
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
