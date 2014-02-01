<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>OpenDSA: Getting Started</title>
</head>
<body>
	<?php
		require_once("../php/social/fbJS.php");
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>

	<div class="banner" style="background-image: url(http://learncodeart.com/_images/patterns/leather-nunchuck.png);"></div>

	<article class="main">
		
		<nav class="outline float">
			<section>
				<h2>Outline</h2>
				<ul>
					<a href="#intro"><li>Intro</li></a>
					<a href="#tools"><li>Tools</li></a>
					<a href="#folderStructure"><li>Folder Structure</li></a>
					<ul>
						<a href="#folder1"><li>AV Folder</li></a>
						<a href="#folder2"><li>Books Folder</li></a>
						<a href="#folder3"><li>Config Folder</li></a>
						<a href="#folder4"><li>SourceCode Folder</li></a>
					</ul>
					<a href="#rstFiles"><li>RST Files</li></a>
					<a href="#compilingBook"><li>Compiling A Book</li></a>
					<a href="#workflow"><li>Workflow</li></a>
					<a href="#conclusion"><li>Conclusion</li></a>
					<a href="#notes"><li>Notes</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>

		<div class="content">

			<header>
				<h1>OpenDSA: Getting Started</h1>
				<p><time pubdate datetime="2014-01-31">Created on: January 31, 2014</time></p>
			</header>
			
			<h2 id="intro">
				Intro
				<a class="toTop" href="#">Back to top</a>
			</h2>
		
			<p>
				The OpenDSA project although overwhelming at first is in reality easy to understand. The project is very modular and therefore reduces the amount of information that you have to keep in your head at any one time. This article is going to focus on the following:
			</p>

			<p>
				<ul>
					<li>
						Downloading all the necessary tools, which tools you actually need and where to get more information.
					</li>
					<li>
						Understanding the folder structure of the OpenDSA project. Going over what type of information is stored in which folders and defining which folders you should care about.
					</li>
					<li>
						Getting familiar with the <em>RST</em> (reStructuredText) file syntax. Ultimately this is where you are going to include the content you created so its worth spending some time on it.
					</li>
					<li>
						Understanding how books are compiled, how the config files come into play and knowing what you should be concerned about.
					</li>
					<li>
						What is the best way to work on your JSAV content? It explains one workflow option that you might use to create your JSAV code and be able to see what you are working on as you type it.
					</li>
				</ul>
			</p>
	
			<h2 id="tools">
				Tools
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
				As with everything in life, the right tools are essential for the job. More detailed instructions on how to install everything (and differences between operating systems) can be found in the OpenDSA getting started guide. Below is a quick overview of all the tools that need to be installed and a quick statement about what they are needed for:
			</p>

			<p>
				<ul>
					<li>Git (Distributed repository control).</li>
					<li>Github account (This is where all of the files get backed up).</li>
					<li>Make (Linux and mac users probably already have this, it compiles everything).</li>
					<li>Python (Make sure to install the specified version, this is what handles the backend).</li>
					<li>Python setuptools (This is a package manager that makes it easier to install the next tools).</li>
					<li>Sphinx (A compiler that turns the reStructureText files into HTML documents).</li>
					<li>Hieroglyph (Adds the ability to create slides in HTML from reStructureText).</li>
				</ul>
			</p>

			<p>
				Keep in mind that python and all the python plugins are not actually required to create new content using JSAV. However, having these tools installed will allow you to compile books and see your code the way it will look like on the actual OpenDSA site, which makes debugging a lot easier.
			</p>
		
			<h2 id="folderStructure">
				Folder Structure
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
				The first step to understand how a project works is to have basic knowledge as to where everything is stored. This section will go over what is stored in the most important files and which files are the ones a JSAV developer will spend most of their time in.
			</p>

			<h3 id="folder1">
				AV Folder
			</h3>
	
			<p>
				The <em>AV</em> folder is designated to store all the <i>JavaScript</i> and <i>CSS</i> files that relate to JSAV slideshows and diagrams. Naturally this is where JSAV developers will spend most of their time in. Inside of the <em>AV</em> folder there are several other directories. Most developers will do their work on the Development folder, which as its name foreshadows is where all the content that is under development is stored. Once the slideshow or diagram has being completed, approved and validated it will be moved (Most likely by Dr. Shaffer) to one of the other folders that contain files based on their topic (e.g. lists, sorting, etc).
			</p>

			<h3 id="folder2">
				Books Folder
			</h3>
	
			<p>
				Once a book is compiled all of its relevant files are stored in this directory. Each book has a unique name and all the files for that book will be stored in a directory of the same name. Inside of the <em>book-name</em> directory there is another folder named <em>html</em>. This is where all the generated <i>HTML</i> pages are located in. The <em>index.html</em> file is also here which holds the contents page for the entire book. After compiling a book, a developer can go inside of the <em>book-name</em> directory and find the module he/she is working on to see how the slideshow or diagram will look on the site. Any changes made to the <i>JavaScript</i> or <i>CSS</i> files inside of the <em>AV</em> folder will be reflected on the module page.
			</p>

			<h3 id="folder3">
				Config Folder
			</h3>
	
			<p>
				The <em>config</em> folder is a really important folder that gets modified on rare occasions. It was mentioned earlier that the <em>Books</em> folder contained the files for every compiled book, and inside the <em>book-name</em> directory were the <i>HTML</i> files for all of the modules in the book. Well all of these modules are created because a file inside of the <em>config</em> folder told the compiler to include them. More specifically, inside of the <em>config</em> folder there are a lot of <i>JSON</i> files that have instructions for the compiler to know which modules to include in a particular book. There is one <i>JSON</i> file for every book, and the name of the <i>JSON</i> file matches the name of the book. So for example, if a developer is working a new module then he/she would need to add that new module to the <em>IS.json file</em>. This is because the <i>IS</i> book was created specifically for developers to test out all of their newly created content. A later section will explain how to edit these <i>JSON</i> files to add a new module.
			</p>

			<h3 id="folder4">
				SourceCode Folder
			</h3>
	
			<p>
			</p>
	
			<h2 id="rstFiles">
				Understanding RST Files
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>
	
			<h2 id="compilingBook">
				Compiling A Book
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
			<p>
			</p>

			<h2 id="workflow">
				Workflow
				<a class="toTop" href="#">Back to top</a>
			</h2>
	
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
					Last updated: January 31, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		
		</div>
	</article>
</body>
</html>
