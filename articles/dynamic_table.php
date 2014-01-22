<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>Dynamic Table</title>
</head>
<body>
	<?php
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>
	<article class="main">
		
		<div id="outline">
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
			<h1>Creating a Dynamically Sized Table with JavaScript</h1>
			<p><time pubdate datetime="2014-01-12">Created on: January 12, 2014</time></p>
		</header>
		
		<div id="content">
			
			<h2 id="theProject">The Project</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
		
			<p>
				The last article that was posted explained the entire process for creating a snake game using JavaScript. Upon some reflection I realized that writing up such a big project in one article might have being a bad idea. There is too much content and it is hard to follow. After some thought, I have decided to break the project into smaller pieces and post how each of the individual pieces where created. This will result in a much more modular design for my blog, and will make it easier to navigate through the project. Once all of the parts of the project have being explained I will create a blog post that pulls in everything together by just referencing the previous posts. With that said, let’s jump in.
			</p>
			
			<p>
				The first step for creating a snake game is to create the board that the game will take place in. To make it a little bit more interesting the user will be allowed to select the size of the table that is going to be generated. For now we will not worry about the formatting of the table or how it looks. The focus is just on generating a dynamically sized table.
			</p>
	
			<h2 id="theFinalResult">The Final Result</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
				This is what the final result looks like. Click on the link or copy it into your browser.
			</p>
			
			<img href="http://learncodeart.com/projects/dynamic_table/screenshot.jpg" width="200px">
			
			<p>
				<a href="http://learncodeart.com/projects/dynamic_table/table.html">http://learncodeart.com/projects/dynamic_table/table.html</a>
			</p>
		
			<h2 id="theCode">The Code</h2>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
				You can see the complete source code by clicking on the following links.
			</p>
			
			<p>
				<a title="table.html" href="http://learncodeart.com/projects/dynamic_table/table.html" target="_blank">
					HTML - table.html
				</a><br>
				
				<a title="main.css" href="http://learncodeart.com/projects/dynamic_table/css/main.css" target="_blank">
					CSS - main.css
				</a><br>
				
				<a title="table.js" href="http://learncodeart.com/projects/dynamic_table/js/table.js" target="_blank">
					JavaScript - table.js
				</a><br>
			</p>
	
			<h2 id="theMakingOf">The Making Of</h2>
			<span><a class="toTop" href="#">Back to top</a></span><br>
	
			<h3 id="step1">Step 1 - HTML</h3>
			<span><a class="toTop" href="#">Back to top</a></span>
	
			<p>
				First we create a simple HTML structure to hold the table. The only things needed are an input field for the user to write the size of the table, a label for the input field, a header for our page, and a button to trigger the creation of the table. Also, the HTML file needs to include a jQuery library, a link to the CSS style sheet, and a link to the JavaScript file that creates the table. This is what the HTML document looks like.
			</p>
			
			<pre>&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;head&gt;
		&lt;meta http-equiv="Content-type" content="text/html; charset=UTF-8" /&gt;
		&lt;title&gt;Snake game&lt;/title&gt;
		&lt;link rel="stylesheet" type="text/css" href="css/main.css" /&gt;
		&lt;script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"&gt;&lt;/script&gt;
		&lt;script language="javascript" type="text/javascript" src="js/table.js"&gt;&lt;/script&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;h1&gt;Welcome to my dynamic table creator!&lt;/h1&gt;
		&lt;p&gt;Size of grid: &lt;input id="input" type="text"&gt;&lt;/p&gt;
		&lt;button id="button" type="button"&gt;Create Table&lt;/button&gt;
	&lt;/body&gt;
&lt;/html&gt;</pre>
	
			<h3 id="step2">Step 2 - JavaScript</h3>
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
