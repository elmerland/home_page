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
	<article class="main">
		
		<div class="outline">
			<section>
				<h2>Article - Outline</h2>
				<ul>
					<li><a href="#theProject">The Project</a></li>
					<li><a href="#theFinalResult">The Final Result</a></li>
					<li><a href="#theCode">The Code</a></li>
					<li><a href="#theMakingOf">The Making Of</a></li>
					<ul>
						<li><a href="#step1">Step 1</a></li>
						<li><a href="#step2">Step 2</a></li>
					</ul>
					<li><a href="#conclusion">Conclusion</a></li>
					<li><a href="#notes">Notes</a></li>
					<li><a href="#disqus_thread">Comments</a></li>
				</ul>
			</section>
		</div>
		
		<header>
			<h1>Title Of The Article</h1>
			<p><time pubdate datetime="2014-00-00">Created on: Month 00, 2014</time></p>
		</header>
		
		<div class="content">
			
			<h2 id="theProject">The Project</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
		
			<p>
			</p>
	
			<h2 id="theFinalResult">The Final Result</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
		
			<h2 id="theCode">The Code</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
	
			<h2 id="theMakingOf">The Making Of</h2>
			<span><a class="toTop" href="#">Back to top</a></span><br>
	
			<h3 id="step1">Step 1</h3>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
	
			<h3 id="step2">Step 2</h3>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
	
			<h2 id="conclusion">Conclusion</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
	
			<h2 id="notes">Notes</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
			</p>
		
		</div>
		
		<section class="social">
			<?php
				include("../php/social/fbLike.php");
			?>
		</section>
		
		<footer>
			<p>
				Written by: Elmer Landaverde (elmerlandaverde@gmail.com)<br>
				Las updated: Month 00, 2014<br>
				<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
			</p>
		</footer>
		<?php require_once("../php/disqus.php"); ?>
	</article>
</body>
</html>
