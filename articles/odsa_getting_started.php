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

	<title>OpenDSA: Getting Started</title>
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
	<div class="banner" style="background-image: url(../_images/patterns/leather-nunchuck.png);"></div>
	<article class="main">
		<div class="content">
			<header>
				<h1>OpenDSA: Getting Started</h1>
				<p><time pubdate datetime="2014-01-31">Created on: January 31, 2014</time></p>
				<section class="social">
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="elmerlandaverde" data-hashtags="learncodeart">Tweet</a>
				
					<script>
					!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
					</script>
				</section>
			</header>
			<section id="Intro">
				<header>
					<h2>Intro</h2>
					<a href="#Intro"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p>
					The OpenDSA project although overwhelming at first is in reality easy to understand. The project is very modular and therefore reduces the amount of information that you have to keep in your head at any one time. This article is going to focus on the following:
				</p>
				<ul>
					<li>
						Downloading all the necessary tools, which tools you actually need and where to get more information.
					</li>
					<li>
						Understanding the folder structure of the OpenDSA project. Going over what type of information is stored in which folders and defining which folders you should care about.
					</li>
					<li>
						Getting familiar with the <strong>RST</strong> (reStructuredText) file syntax. Ultimately this is where you are going to include the content you created so its worth spending some time on it.
					</li>
					<li>
						Understanding how books are compiled, how the config files come into play and knowing what you should be concerned about.
					</li>
					<li>
						What is the best way to work on your JSAV content? It explains one workflow option that you might use to create your JSAV code and be able to see what you are working on as you type it.
					</li>
				</ul>
			</section>
			<section id="Tools">
				<header>
					<h2>Tools</h2>
					<a href="#Tools"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p>
					As with everything in life, the right tools are essential for the job. More detailed instructions on how to install everything (and differences between operating systems) can be found in the <a href="http://algoviz.org/algoviz-wiki/index.php/The_OpenDSA_Developer%27s_Getting_Started_Guide#Tools">OpenDSA getting started guide</a>. Below is a quick overview of all the tools that need to be installed and a quick statement about what they are needed for:
				</p>
				<ul>
					<li>Git (Distributed repository control).</li>
					<li>Github account (This is where all of the files get backed up).</li>
					<li>Make (Linux and mac users probably already have this, it compiles everything).</li>
					<li>Python (Make sure to install the specified version, this is what handles the backend).</li>
					<li>Python setuptools (This is a package manager that makes it easier to install the next tools).</li>
					<li>Sphinx (A compiler that turns the reStructureText files into HTML documents).</li>
					<li>Hieroglyph (Adds the ability to create slides in HTML from reStructureText).</li>
				</ul>
				<p>
					Keep in mind that python and all the python plugins are not actually required to create new content using JSAV. However, having these tools installed will allow you to compile books and see your code the way it will look like on the actual OpenDSA site, which makes debugging a lot easier.
				</p>
			</section>
			<section id="FolderStructure">
				<header>
					<h2>Folder Structure</h2>
					<a href="#FolderStructure"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p>
					The first step to understand how a project works is to have some basic knowledge as to where everything is stored. This section will go over the most important files, discuss what is stored in them and point out the files that a JSAV developer should be most concerned with.
				</p>
				<section id="AVFolder">
					<header>
						<h2>AV Folder</h2>
						<a href="#AVFolder"><img src="../_images/link20.png"></a>
						<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
					</header>
					<p>
						The <strong>AV</strong> folder is designated to store all the <i>JavaScript</i> and <i>CSS</i> files that relate to JSAV slideshows and diagrams. Naturally this is where JSAV developers will spend most of their time in. Inside of the <strong>AV</strong> folder there are several other directories. Most developers will do their work on the Development folder, which as its name foreshadows is where all the content that is under development is stored. Once the slideshow or diagram has being completed, approved and validated it will be moved (Most likely by Dr. Shaffer) to one of the other folders that contain files based on their topic (e.g. lists, sorting, etc).
					</p>
				</section>
				<section id="BooksFolder">
					<header>
						<h2>Books Folder</h2>
						<a href="#BooksFolder"><img src="../_images/link20.png"></a>
						<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
					</header>
					<p>
						Once a book is compiled all of its relevant files are stored in this directory. Each book has a unique name and all the files for that book will be stored in a directory of the same name. Inside of the <strong>book-name</strong> directory there is another folder named <strong>html</strong>. This is where all the generated <i>HTML</i> pages are located in. The <strong>index.html</strong> file is also here which holds the contents page for the entire book. After compiling a book, a developer can go inside of the <strong>book-name</strong> directory and find the module he/she is working on to see how the slideshow or diagram will look on the site. Any changes made to the <i>JavaScript</i> or <i>CSS</i> files inside of the <strong>AV</strong> folder will be reflected on the module page.
					</p>
				</section>
				<section id="ConfigFolder">
					<header>
						<h2>Config Folder</h2>
						<a href="#ConfigFolder"><img src="../_images/link20.png"></a>
						<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
					</header>
					<p>
						The <strong>config</strong> folder is a really important folder that gets modified on rare occasions. It was mentioned earlier that the <strong>Books</strong> folder contained the files for every compiled book, and inside the <strong>book-name</strong> directory were the <i>HTML</i> files for all of the modules in the book. Well all of these modules are created because a file inside of the <strong>config</strong> folder told the compiler to include them. More specifically, inside of the <strong>config</strong> folder there are a lot of <i>JSON</i> files that have instructions for the compiler to know which modules to include in a particular book. There is one <i>JSON</i> file for every book, and the name of the <i>JSON</i> file matches the name of the book. So for example, if a developer is working a new module then he/she would need to add that new module to the <strong>IS.json file</strong>. This is because the <i>IS</i> book was created specifically for developers to test out all of their newly created content. A later section will explain how to edit these <i>JSON</i> files to add a new module.
					</p>
				</section>
				<section id="RSTFolder">
					<header>
						<h2>RST Folder</h2>
						<a href="#RSTFolder"><img src="../_images/link20.png"></a>
						<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
					</header>
					<p>
						When a book gets compiled, the information of what modules to include can be found in the <strong>config</strong> folder. However, the data of what goes into the modules is found in the <strong>RST</strong> folder. This folder contains one <i>.rst</i> (reStructuredText) file for each one of the modules. This <i>rst</i> file is then converted into <i>HTML</i> by the compiler. By using certain directives, developers are able to include their newly created content in the <i>rst</i> file. Normally a developer would create a copy of an existing <i>rst</i> file, this copy would then be placed inside the <strong>RST/source/IS</strong> folder. This <strong>IS</strong> folder is where all the content that is under development lives. Once the newly created slideshow or diagram has being approved it will be moved to a more permanent location.
					</p>
				</section>
				<p>
					There are many other folders that were left out because they are of no particular importance to a <i>JSAV</i> developer. However, two folders worth mentioning are the <strong>Doc</strong> and the <strong>SourceCode</strong> folders. The <strong>Doc</strong> directory as the name implies holds all of the manuals and documentation for <i>OpenDSA</i>. The best way to access the documentation however, is through this <a href="http://algoviz.org/OpenDSA/Doc/">link</a>. The <strong>SourceCode</strong> folder holds all the code snippets that are used throughout the modules to show implementation examples for the different data structures.
				</p>
			</section>
			<section id="RSTFiles">
				<header>
					<h2>RST Files</h2>
					<a href="#RSTFiles"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p class="notes">
					A quick lesson to get familiar with reStructureText can be found <a href="http://getnikola.com/quickstart.html">here</a>, and a complete list of all the custom directives for JSAV can be found <a href="http://algoviz.org/OpenDSA/Doc/manual/Extensions.html">here</a>. This section will only discuss syntax that is relevant to the creation of JSAV slideshows and diagrams.
				</p>
				<p>
					The fastest way to get started with rst syntax is by looking at an example from an existing module. Lets take for example this snippet from the <strong>TwoThreeTree.rst</strong> file.
				</p>
				<pre data-highlight=""><?php include("../_code/odsa_getting_started_2.php"); ?></pre>
				<p>
					The example above will generate a diagram (static image) inside of the TwoThreeTree module. A <i>JavaScript</i> file will actually generate the static image, the <strong>rst</strong> file just handles the creation of the <i>divs</i> that will serve as containers for the <i>JSAV</i> content. Lets break the example down to smaller pieces to understand what the syntax means.
				</p>
				<p>
					Line one of the syntax serves as a <a href="http://algoviz.org/OpenDSA/Doc/manual/Extensions.html#topic-special-case">numbered reference</a> to the content that follows. Making it easier to refer to any content later on in the module or in the book; contrary to having to hard code the reference numbers. This is done this way because the chapter numbers and content reference numbers are dynamically generated when the book is compiled, which makes sense given that every book has a different number of chapters in it and they can be placed in a different order.
				</p>
				<p>
					The second portion of the file, which spans from line three to line four, relates to the actual <strong>JSAV</strong> container. On line three we see the directive <a href="http://algoviz.org/OpenDSA/Doc/manual/Extensions.html#inlineav">inlineav</a>. This directive indicates to the compiler that <i>JSAV</i> content will go here and the compiler will know to create the necessary <i>HTML</i> markup. After the directive there are two parameters, the first one is very important. In the above example we see that the first parameter is <i>“twoThreeTreeCON”</i>, this will end up being the <i>ID</i> of the <i>JSAV container</i>. We need this because when new <i>JSAV</i> content is created a new <i>JSAV object</i> has to be instantiated. The <i>ID</i> of the <i>JSAV container</i> is then passed as a parameter to the <i>JSAV object</i> so that the <i>JSAV library</i> knows which element to modify. Whatever name is placed as the first parameter on the <em>inlineav</em> directive, it will be set as the <i>ID</i> of the <i>JSAV container</i>. The second parameter of the <em>inlineav</em> directive, <em>dgm</em>, simply indicates to the compiler that the content that goes here is a diagram. On line four there is the option <em>:center:</em>, indicating that the caption of this content will have to be centered. Finally on line six we can see a line of text with one level of indentation. This line of text represents the caption of the image or slideshow above. It can be as long as the developer wants it to be. If it has the same indentation level it will continue to be considered part of the caption.
				</p>
				<p>
					Lets now examine an example for creating a slide show. Moving forwards in the <strong>TwoThreeTree.rst</strong> file we find another the syntax for slideshow.
				</p>
				<pre data-highlight=""><?php include("../_code/odsa_getting_started_3.php"); ?></pre>
				<p>
					In this example the first line has changed because it belongs to a different image. These references should always be unique. Next we encounter the <em>inlineav</em> directive, which is the same and is still followed by a parameter that will be set as the <i>ID</i> of the <i>JSAV</i> container. The second parameter however, is new. This new parameter <em>ss</em> stands for slideshow and indicates to the compiler that it needs to include all the slideshow controls (e.g. arrows, settings button, etc).
				</p>
				<p>
					The options that follow the <em>inlineav</em> directive have changed. Mainly the <em>:output:</em> option has being added. This option applies only to slideshows, and it indicates to the compiler that is needs to include a message box in the slideshow. This message box is where any messages given by JSAV will be shown. Finally a more hefty caption has being provided and will be placed below the slideshow.
				</p>
				<p>
					The final piece of the puzzle is how to link the appropriate <a href="http://algoviz.org/OpenDSA/Doc/manual/Extensions.html#odsascript">JavaScript</a> and <a href="http://algoviz.org/OpenDSA/Doc/manual/Extensions.html#odsalink">CSS</a> files to this module. This is done is by using two simple directives that are shown bellow:
				</p>
				<pre data-highlight=""><?php include("../_code/odsa_getting_started_4.php"); ?></pre>
				<p>
					These two directives correspond to a <i>HTML</i> <em>&lt;link&gt;</em> tag and a HTML <em>&lt;script&gt;</em> tag respectively. One important rule to keep in mind here is that while the <i>css link</i> can be placed anywhere (By convention it's placed at the top of the document), the <i>JavaScript script</i> tag has to be placed at the very end of the document. This will ensure that the DOM has loaded before the JavaScript file tries to modify it (Mainly because most <i>JavaScript</i> files don't use the ready method). Notice as well that the <i>JavaScript</i> and <i>CSS</i> files are located in the <strong>AV</strong> folder under the <strong>Development</strong> directory. Meaning that the files have not being approved yet. When they are they will need to be moved to another file and the links will need to be updated.
				</p>
			</section>
			<section id="ConfigFiles">
				<header>
					<h2>Config Files</h2>
					<a href="#ConfigFiles"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p class="notes">
					Detailed information about how the JSON config files work, and how they should be structured can be found <a href="http://algoviz.org/OpenDSA/Doc/manual/Configuration.html">in the OpenDSA documentation.</a>.
				</p>
				<p>
					Lets do a quick recap. The <strong>AV</strong> folder holds all the JavaScript and CSS files that generate the content. The rst files are in charge of creating a template for the modules to be converted to HTML. They also link to all of the relevant JavaScript and CSS files. The question now is how do the modules get included in the books? This is where the config files come into play.
				</p>
				<p>
					Located inside of the <strong>config</strong> folder, there is a list of <em>.json</em> files. These files are referenced by the compiler when a new book is going to be created and they tell the compiler which modules to include and in what manner. There are a lot of things that can be done inside of the .json config file but this section will only cover the basics of how to add a new module to a book.
				</p>
				<p>
					The <strong>IS.json</strong> file located inside of the <strong>config</strong> folder contains any module that is currently being worked on. Since this is the file that most developers will likely deal with, this section will use this file as an example. Lets take a look at the contents of that file:
				</p>
				<pre data-highlight="14,15,16,17,18,19,20,21,22,23,24"><?php include("../_code/odsa_getting_started_5.php"); ?></pre>
				<p>
					The file itself is very short although somewhat convoluted because of all the brackets and indentation levels. However, this section is mainly interested in the highlighted part of the file. This highlighted part started with the key <em>chapters</em> followed by a <i>colon</i> and then an <i>opening bracket</i>. Everything that follows after that bracket correspond to the chapters that will be created in the book. Notice that on the next line we see the key <em>Testing</em> and again a <i>colon</i> and <i>opening bracket</i>. This signifies the start of a new chapter named <em>Testing</em>. Included in this chapter are all of the modules that are specified next. In this case there are two modules <em>Bintree</em> and <em>TwoThreeTree</em>. We can identify these two modules because like the two keys before they are followed by a <i>colon</i> an opening bracket. Inside of each one of these modules there are two options set. The first is the <em>long_name</em> option which sets the name that is to be displayed in the table of contents and then an <em>exercises</em> option which is empty.
				</p>
				<p>
					To add a new module to the Testing chapter all we would need to do insert a new object right after the <em>TwoThreeTree</em> module. For example, if a developer needed to add a <em>Tree Indexing</em> module it would look like this:
				</p>
				<pre data-highlight="12,13,14,15"><?php include("../_code/odsa_getting_started_6.php"); ?></pre>
				<p>
					If the book is compiled again it will include the new Tree Indexing module inside of the Testing chapter. Using the same syntax a developer can add as many modules as he/she wants or needs. More information on all the options that can go inside of the module can be found <a href="http://algoviz.org/OpenDSA/Doc/manual/Configuration.html#settings-all-are-required-unless-otherwise-specified">here</a>.
				</p>
			</section>
			<section id="Workflow">
				<header>
					<h2>Workflow</h2>
					<a href="#Workflow"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p class="notes">
					Disclaimer: What follows is a matter of personal opinion and is by no means mandatory. My intention is just to offer a quick setup for new developers. Once you are comfortable with the development environment please feel free to modify or create your own workflow.
				</p>
				<p>
					When starting to work on new content the need to see your work as it will be displayed on the real website arises. More important the ability to be able to make modifications to any <i>JavaScript</i> or <i>CSS</i> file, and quickly see those changes reflected on the site becomes a necessity. This can all be done with the following workflow:
				</p>
				<p>
					First step is to create the empty <i>JavaScript</i> and <i>CSS (optional)</i> files that are needed. Be sure to place these files under the <strong>AV/Development</strong> folder. Once this is done, the <strong>rst</strong> file needs to be modified.
				</p>
				<p>
					Using the knowledge of the <a href="#rstFiles">“RST Files”</a> section, modify the rst file so that it will display the new content. If the new content is going to replace an old one, then be sure to update any directive, options or links. If you are a <i>JSAV</i> developer you will need to move this modified rst file to the <strong>RST/source/IS</strong> directory. This is where the IS book will grab the module from and it stops developers from messing with live <i>rst</i> files. Once the content has being tested and approved it will be moved back to one of the other folders in the <strong>RST</strong> directory.
				</p>
				<p>
					When all that is done the module needs to be included in the config file. The <a href="#configFiles">“Config Files”</a> section shows how to modify a JSON config file for a book to include a specific module. Following that, the book needs to be compiled. If all of the tools from the <a href="#tools">“Tools”</a> section have being installed correctly the following steps should be simple. First open a terminal and navigate to the <strong>OpenDSA</strong> folder (The parent folder to everything). Then type in the make command followed by the name of the book to be compiled as shown below
				</p>
				<pre>make [book-name]</pre>
				<p>
					Hit enter and wait a few seconds for the compiler to do its thing. If there are any broken links in the <i>rst</i> file the compiler will complain about it. Otherwise it should compile successfully. Once the make command has finished go into the <strong>Books</strong> directory. There should be a new directory with the name of the book. Inside the <i>book-name</i> directory there should be an html folder, and inside the html directory all the static html for the book.
				</p>
				<p>
					Inside of the <strong>html</strong> folder there should be a <i>HTML</i> file with the same name as the <i>rst</i> file that was added to the <i>config</i> file. Open it up and check if the proper containers were generated for the <i>JSAV</i> content. If the <i>JavaScript</i> file created earlier was empty all there will be is an empty box about twenty pixels tall. You can now begin to modify the JavaScript and CSS files to add content to the JSAV container and the chages will be reflected on that page when it is refreshed. Depending on the text editor being used, it is possible to get plugins that will automatically push the changes made to any JavaScript or CSS files to the web page so that it doesn’t need to be refreshed after every change.
				</p>
			</section>
			<section id="Notes">
				<header>
					<h2>Notes</h2>
					<a href="#Notes"><img src="../_images/link20.png"></a>
					<a class="toTop" href="#"><img src="../_images/toTop.png"></a>
				</header>
				<p>
					This article was written after I went through the initial learning curve to start creating JSAV content. All of the sections in this page were major sticking points that I felt really helped me get a grasp of how everything works. If you think there is something missing or if I got some fact wrong please let me know in the comments or email me at elmer@vt.edu. Hopefully this was helpful to you and made your learning curve a little bit shorter.
				</p>
				<p>
					Please be sure to checkout the <a href="http://algoviz.org/OpenDSA/Doc/manual/">OpenDSA getting started</a> page, along with the <a href="http://algoviz.org/algoviz-wiki/index.php/The_OpenDSA_Developer%27s_Getting_Started_Guide">OpenDSA System Documentation</a>. Most of the concepts explained here were extracted from these pages.
				</p>
				<p class="notes">
					This article deals mostly with how to set everything up, there is another article on the way that deals specifically on how to get started creating content with JSAV. It is still not finished yet but will be available through this <a href="../articles/odsa_jsav.php">link</a> when it is done.
				</p>
			</section>
			<section class="social">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="elmerlandaverde" data-hashtags="learncodeart">Tweet</a>
			
				<script>
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
				</script>
			</section>
			<footer>
				<p>
					Written by: Elmer Landaverde (<a href="mailto:elmerlandaverde@gmail.com">elmerlandaverde@gmail.com</a>)<br>
					Last updated: February 2, 2014<br>
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
					<a href="#Intro"><li>Intro</li></a>
					<a href="#Tools"><li>Tools</li></a>
					<a href="#FolderStructure"><li>Folder Structure</li></a>
					<ul>
						<a href="#AVFolder"><li>AV Folder</li></a>
						<a href="#BooksFolder"><li>Books Folder</li></a>
						<a href="#ConfigFolder"><li>Config Folder</li></a>
						<a href="#RSTFolder"><li>RST Folder</li></a>
					</ul>
					<a href="#RSTFiles"><li>RST Files</li></a>
					<a href="#ConfigFiles"><li>Config Files</li></a>
					<a href="#Workflow"><li>Workflow</li></a>
					<a href="#Notes"><li>Notes</li></a>
					<a href="#Comments"><li>Comments</li></a>
				</ul>
			</section>
		</nav>
	</article>
</body>
</html>
