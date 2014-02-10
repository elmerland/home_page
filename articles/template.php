<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="../_images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../css/header.css" />
	<link rel="stylesheet" type="text/css" href="../css/nav.css" />
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
		ga('create', 'UA-46960971-1', 'learncodeart.com');
		ga('send', 'pageview');
	</script>
	<link rel="stylesheet" type="text/css" href="../css/article.css" />
	<link rel="stylesheet" type="text/css" href="../css/code.css" />
	<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/article.js"></script>

	<title>Page title</title>
</head>
<body>
	<header class="pageHeader">
		<div>
			<figure>
				<img src="../_images/logo_600.png" width="150" height="150">
			</figure>
			<h1>Learn Code Art</h1>
			<h2>The do it yourself site for enthusiastic programmers</h2>
		</div>
	</header>
	<nav class="pageNav">
		<ul>
			<li>
				<a title="Home" href="../index.php">Home</a>
			</li>
			<li>
				<a title="About" href="../articles/page_about.php">About</a>
			</li>
			<li>
				<a title="Resume" href="../articles/page_resume.php">Résumé</a>
			</li>
		</ul>
	</nav>
	<div class="banner" style="background-image: url(../_images/patterns/asteroids.jpg);"></div>
	<article class="main">
		<div class="content">
			<header>
				<h1>Article Title</h1>
				<p><time pubdate datetime="2014-00-00">Created on:  0, 2014</time></p>
				<section class="social">
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="elmerlandaverde" data-hashtags="learncodeart">Tweet</a>
				
					<script>
					!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
					</script>
				</section>
			</header>
			<p>
				<sectiontitle>Section title
			</p>
			<p>
				Regular paragraph
			</p>
			<p class="notes">
				Notes paragraph
			</p>
			<img src="../_images/article_src/PATH OF IMAGE">
			<pre data-highlight="Highlited line go here"><?php include("../_code/PATH OF CODE"); ?></pre>
			<p>
				<sectionend>
			</p>
			<section class="social">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="elmerlandaverde" data-hashtags="learncodeart">Tweet</a>
			
				<script>
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
				</script>
			</section>
			<footer>
				<p>
					Written by: Elmer Landaverde (<a href="mailto:elmerlandaverde@gmail.com">elmerlandaverde@gmail.com</a>)<br>
					Last updated: Month 00, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer
			<div>
				<div id="Comments">
					<section>
						<div id="disqus_thread" class="comments"></div>
						<script type="text/javascript">
							/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
							var disqus_shortname = 'learncodeart'; // required: replace example with your forum shortname
							
							/* * * DON'T EDIT BELOW THIS LINE * * */
							(function() {
								var dsq = document.createElement('script');
								dsq.type = 'text/javascript';
								dsq.async = true;
								dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
								(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
							})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
					</section>
				</div>
			</div>
		</div>
		<nav class="outline float">
			<section>
				<a class="toTop" href="#"><h3>Back to top</h3></a>
				<h2>Outline</h2>
				<ul>
					<a href="#Comments"><li>Comments</li></a>
				</ul>
			</section>
		</nav>
	</article>
</body>
</html>
