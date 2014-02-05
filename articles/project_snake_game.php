<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>Creating a little Snake game</title>
</head>
<body>
	<?php
		require_once("../php/social/fbJS.php");
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>

	<div class="banner" style="background-image: url(http://learncodeart.com/_images/patterns/subway-lines.png);"></div>

	<article class="main">
		
		<nav class="outline float">
			<section>
				<h2>Outline</h2>
				<ul>
					<a href="#theProject"><li>The Project</li></a>
					<a href="#theFinalResult"><li>The Final Result</li></a>
					<a href="#theCode"><li>The Code</li></a>
					<a href="#theMakingOf"><li>The Making Of</li></a>
					<ul>
						<a href="#step1"><li>HTML</li></a>
						<a href="#step2"><li>JavaScript Table</li></a>
						<a href="#step3"><li>JavaScript Snake</li></a>
						<a href="#step4"><li>CSS</li></a>
					</ul>
					<a href="#conclusion"><li>Conclusion</li></a>
					<a href="#notes"><li>Notes</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>
		
		<div class="content">

			<header>
				<h1>Project: A little Snake game</h1>
				<p><time pubdate datetime="2014-01-04">Created on: January 04, 2014</time></p>
				<section class="social">
					<?php
						include("../php/social/fbLike.php");
						include("../php/social/twitter.php");
					?>
				</section>
			</header>
			
			<section id="theProject">
				<header>
					<h2>The Project</h2>
					<a href="#theProject"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>

				<p>
					At the end of last semester (Fall of 2013), I decided to get involved with a research project. I talked to one of the professors I had last semester who taught the data structures class and asked him if he needed any help for his research project. The professor I asked, Dr. Cliff Shaffer, is working on an open source online book for students that are taking a data structures class. This is a really cool site that has a lot of interactive learning tools for visualizing the data structures that we are taught in class. He told me that if I was interested in joining him I would mainly be working on creating visualizations, slides and exercises for the website. However, the thing that I would need the most was JavaScript, which I so happen to not know anything about. And so, into the JavaScript rabbit hole I went...
				</p>
			
				<p>
					First, I went to the trusty <a title="Lynda.com" href="http://www.lynda.com/" target="_blank">Lynda.com</a>. This was really helpful, specially in demystifying JavaScript. Because I had never programmed anything in that language I can't help but admit I was a little scared of not being able to understanding fast enough. Turns out, if you know C and Java, then JavaScript is really simple to grasp. The problem with lynda.com is that its all videos so you don't have any hands on experience. So I went to the internet to look for a good interactive JavaScript tutorial and I found <a title="CodeSchool.com" href="https://www.codeschool.com/" target="_blank">CodeSchool.com</a>. This is an amazing site! This webpage is split up into "Paths", and each path focuses on a specific language or technology (They even have courses for Git which were really useful). Inside of the JavaScript path, there are about ten courses. Of those I only completed three, because the rest of them focused on specified JavaScript libraries and only the first three courses where really about teaching you the JavaScript syntax and logic. When I was done with the Lynda.com JavaScript tutorial I quickly realized that there is no point in learning JavaScript if you don't know HTML or CSS. In my sophomore year at college I had played around with HTML a bit, but it had being years since I actually used any. So again, in the HTML and CSS rabbit whole I went... This rabbit whole turned out to be shallower though. HTML and CSS are really simple tools that get complicated only when your website is complicated. So I just watched the Lynda.com tutorials on it and followed along the making of a webpage in one of the Lynda.com project tutorials.
				</p>
			
				<p>
					After spending two weeks learning all I could about HTML, CSS and JavaScript I decided it was finally time to do a test project. It had to be small enough so that I wouldn't spend ages working on it, but complex enough so that it really tested what I had learned. Since JavaScript was the main focus, the test project had to focus on that as well. After entertaining the though for a few days, the idea of creating a in-browser snake game came to mind. I had actually created a snake game in java a while back which meant that I knew that logic behind it and could focus on the JavaScript part. The game involves recursion, and a bit of graphics and its not too complicated so it was a perfect project.
				</p>
			
				<p>
					These are the features that I came up with for the game:
				</p>
			
				<ul>
					<li>A simple snake game with all the classic rules (No going through walls or more than one food item at a time).</li>
					<li>Multiple difficulty levels (How fast each step is made).</li>
					<li>Variable game size (User is able to change the size of the game table).</li>
				</ul>
			
				<p>
					With all this in mind I started working on it, and after a day and a half of work it was done. In the end the project has a little bit under 500 lines of JavaScript code, about 40 lines of CSS and 30 lines of HTML. After completing the project I found that the most challenging part of completing the project was how often I had to look up thing on google. Even though I went through a lot of tutorials and videos about JavaScript you forget a lot of the details. However, because I watched so many tutorials as soon as I found the solution on-line everything came back and I did not have any problems understanding either the syntax or the logic of JavaScript.
				</p>
			</section>

			<section id="theFinalResult">
				<header>
					<h2>The Final Result</h2>
					<a href="#theFinalResult"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					You can take a look at the final result by following this link, or copying into your browser:
				</p>
			
				<p>
					<a title="Snake project" href="http://learncodeart.com/projects/snake/snake.html" target="_blank">
						http://learncodeart.com/projects/snake/snake.html</a>
				</p>
			</section>

			<section id="theCode">
				<header>
					<h2>The Code</h2>
					<a href="#theCode"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					Since this was my first time writing a webpage I had to reorganize my files a couple of times before getting an organization that I liked. At the end there where four files. One HTML, one CSS and two JavaScript. The contents of the HTML and CSS files are straightforward. I decided to split the JavaScript file into two because I thought it looked cleaner. The first file "snake.js" controls the logic of the actual game, the second file "table.js" is in charge of the webpage functionality. Mainly it handles the creation of the table where the game takes places, gets information from the text field and radio buttons, and it determines what the buttons do when pressed. Below is a copy of the source code for the project.
					<br>
					<br>
					<a title="Snake-index.html" href="http://learncodeart.com/projects/snake/index.html" target="_blank">
						HTML - index.html
					</a><br>
			
					<a title="Snake-main.css" href="http://learncodeart.com/projects/snake/css/main.css" target="_blank">
						CSS - main.css
					</a><br>
			
					<a title="Snake-table.js" href="http://learncodeart.com/projects/snake/js/table.js" target="_blank">
						JavaScript - table.js
					</a><br>
			
					<a title="Snake-snake.js" href="http://learncodeart.com/projects/snake/js/snake.js" target="_blank">
						JavaScript - snake.js
					</a><br>
				</p>
			
				<p class="notes">
					To download the files, right click on them and then select "save target as" or "save link as" (depending on OS) to get the original text file.
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
						<h3>Step 1 - HTML file</h3>
					</header>
				
					<p>
						The first step was to create the HTML file. The structure of this file is really simple, since the main focus of the project is on the JavaScript I kept all HTML to a minimum.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_1.php") ?></pre>
				
					<p>
						These are the things included in the head tag:
					</p>
				
					<ul>
						<li>Meta tag to specify the text file encoding.</li>
						<li>A title for the page.</li>
						<li>A link to the CSS style sheet.</li>
						<li>A link to the jQuery javaScript file.</li>
						<li>A link to the snake.js JavaScript file.</li>
						<li>A link to the table.js JavaScript file.</li>
					</ul>
				
					<p>
						The snake.js file is imported before the table.js file because the table.js is what actually sets off everything into motion, and I thought it would be better for the snake.js file to be already loaded into memory before the table.js file kicked in.
					</p>
				
					<pre><?php include("http://learncodeart.com/_code/snake_game_2.php") ?></pre>
				
					<p>
						Next, these are the things included in the body tag:
					</p>
				
					<ul>
						<li>First a div to contain all of the page content.</li>
						<li>A title for the page.</li>
						<li>A text field for the user to input the size of the game table.</li>
						<li>Several radio buttons for the user to select the level of difficulty.</li>
						<li>Two buttons. One to create the game table and the other to start the game.</li>
						<li>An empty paragraph tag to display game information.</li>
						<li>Another paragraph tag to display the countdown until the game starts/</li>
						<li>Finally, two paragraph tags surrounded by divs to display the points and time elapsed.</li>
					</ul>
				
					<p>
						When you open page in your browser all you will see is the content of the HTML file. The rest is added once the user clicks on the "create game" button.
					</p>
				</section>

				<section id="step2">
					<header>
						<h3>Step 2 - JavaScript (table.js)</h3>
					</header>
				
					<p>
						The first thing I created was to add an event listener to know when the document loads.
					</p>
				
					<pre><?php include("http://learncodeart.com/_code/snake_game_3.php") ?></pre>
				
					<p>
						With this in place, right after the document (page) is loaded the <strong>int()</strong> function will be called.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_4.php") ?></pre>
					
					<p>
						This function does the following:
					</p>
					
					<ul>
						<li>First it gets a pointer to the main div element of the HTML file. This is where the game table will go.</li>
						<li>Next, it gets a pointer to the points and time elements which will display the number of points that the player has accumulated and the time elapsed in the game.</li>
						<li>Then it adds a "onclick" listener to detect which radio button was selected. This will determine the game difficulty.</li>
						<li>Finally it assigns a function for when the "create game" button is pressed.</li>
					</ul>
				
					<p>
						The create game function is in charge of setting up the game table and prepare everything for the start of the game.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_5.php") ?></pre>
				
					<p>
						This function first clears the game table if there was one, then it gets a validates the size of the new game table, next it creates a new game table, and finally it enables the "start game" button. The create game function looks as follows.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_6.php") ?></pre>
				
					<p>
						First it creates a new div element that will hold the entire table. Next it creates the actual table and it finally adds the game div to the main div.
					</p>
				
					<p>
						The game table is creating using simple &lt;table&gt;, &lt;tbody&gt;, &lt;tr&gt;, and &lt;td&gt; elements. One thing worth noting is that each table cell has two extra properties that will be used by the snake.js file. These are the "occupied" and "hasFood" properties as shown below.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_7.php") ?></pre>
				
					<p>
						Going back to the "create game" button, we saw that it gives a function to the "start game" button. This is what that function looks like.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_8.php") ?></pre>
				
					<p>
						This function first checks if the game table is set up. Then it resets the messages for the "countdown" and "gameStatus" elements in the HTML file. Finally it starts a new timer and gives it the <strong>countDown()</strong> function. This function just updates the "coundown" element until the counter reaches zero, and then it starts the game. This is how the <strong>countDown()</strong> function looks like.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_9.php") ?></pre>
				
					<p>
						From this moment on, the table.js file is done and as soon as the user clicks on the start game button, then the countdown starts and the <strong>play()</strong> function in the snake.js file is executed.
					</p>
				</section>

				<section id="step3">
					<header>
						<h3>Step 3 - JavaScript (Snake.js)</h3>
					</header>
				
					<p>
						To create a snake representation recursion will always be your friend. The snake consists of several snake nodes. Each node is visually represented by a square, and so it naturally has a x and y coordinate. When the snake moves, only the head node is moved. This head node will then call on all of the trailing nodes to move right after it. Therefore, most of the thought process goes into the behavior of this head node. Every node after the head will just follow suit and should be relatively straight forward. The first step was to create a snake node constructor, that looks like this.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_10.php") ?></pre>
				
					<p>
						The constructor sets the properties for row (x) and col (y) position. The tail pointer and the isHead boolean. It then colors the cell on the game table to reflect the snake node and also marks the cell as occupied.
					</p>
				
					<p>
						Next, I implemented two functions for the snake node prototype.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_11.php") ?></pre>
				
					<p>
						The first function called <strong>move()</strong> simple moves the snake node from its current position to the specified position and the second function called <strong>addNode()</strong> just adds a new snake node to the tail of the current snake node. The move function first checks if the next position the snake node is going to be moved to correspond to a cell outside of the board or if the cell is already occupied by another snake node. Then it checks if the next position has any food in it. If it does, it creates a new food item. Next it updates the position of the snake node while also changing the coloring of the table cell and the occupied status of the cell. Finally it checks whether the current snake node has a tail node. If it does, then it moves the tail node to where the current snake node was. If it doesn't have a tail node it checks if the next cell has food in it. If it does it adds a new tail node if it doesn't it does nothing. The addNode function simply creates a new snake node to the specified position. The getCell(), colorCell(), addFood(), and clearFood() functions are very self explanatory and will leave to you to figure out.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_12.php") ?></pre>
				
					<p>
						Now we will concern ourselves with how the snake actually moves. First lets take a look at the play function.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_13.php") ?></pre>
					
					<p>
						This function is called immediately after the user clicks on the "start game" button and the countdown is done. It first calls a function to clear the board and reset everything in case there was a game previously in motion. Then it gets the center position of the game table to place the new snake head node at. It also adds a new food block. Finally it adds a function to the key down event, and two timers. One timer for each time the snake has to move and another timer for the clock. The <strong>changeDirection()</strong> function handles the key down event when the user presses on any of the arrow keys. There are a couple of important things about this function. First it uses a boolean called <strong>directionLock</strong>. The purpose of this boolean is so that the user can't change direction more than once per move. This is necessary because of the next feature of this function. When you are moving right and then press left the snake will crash against itself. To avoid this situation the changeDirection function prevents the user from changing the direction of the snake to the exact opposite of what the current direction is (i.e. left to right, up to down and vice versa). So in conjunction these two features will prevent the user from crashing the snake against itself just because of careless key presses which happens when you are in the heat of the game.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_14.php") ?></pre>
				
					<p>
						Lastly lets dissect the <strong>moveSnake()</strong> function, that is in charge of moving the snake head node.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_15.php") ?></pre>
				
					<p>
						This function first determines the next cell the snake has to move to based on the current direction. Then it calls the <strong>move()</strong> function on the snake head node, and finally it sets the directionLock to false. This covers the most important parts of the snake.js file. There are still some functions left that were not covered (i.e. resetBoard, gameOver, addPoints, increaseTimer), I feel confident the you can figure them out.
					</p>
				</section>

				<section id="step4">
					<header>
						<h3>Step 4 - CSS (main.css)</h3>
					</header>
				
					<p>
						The CSS file for this project is fairly small. These are the stylings that are made by the style sheet file.
					</p>
				
					<ul>
						<li>Set the margin setting for the paragraph tag so that the page is a little more compact and there isn't so much empty space.</li>
						<li>Set the margin and width for the main div so that it is centered within the browser window.</li>
						<li>Format the game table so that there is no space between the border of the table and the border of the cells. It also centers the table within the game div and sets the layout to fixed so that the cell width and height can be set manually.</li>
						<li>Set the cell format to a specific width and height and also sets the border with a color matching the default background color.</li>
						<li>Next it gives the game board a width and height of 100% of its parent container so that it can be centered.</li>
						<li>Finally it sets some properties for the scoreboard elements.</li>
					</ul>
				
					<p>
						These are the contents of the CSS file. 
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/snake_game_16.php") ?></pre>
				</section>
			</section>

			<section id="conclusion">
				<header>
					<h2>Conclusion</h2>
					<a href="#conclusion"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					This was fun little project, and it definitely served its purpose of getting some JavaScript practice under my belt. I was able to achieve all the features I wanted to and gave me more confidence to engage in bigger and more complex projects. I'll definitely make some other posts in the future about any other JavaScript challenges I face next semester and probably also any other project that I have to do for school.
				</p>
			</section>

			<section id="notes">
				<header>
					<h2>Notes</h2>
					<a href="#notes"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					After completing the project a few thoughts came to me on some improvements that I could have included. However, I will leave this improvements for some future time. The first improvement is to include a pause button, which should be really simple because there is already a key listener in place. The second improvement which might be a bit harder to implement would be to give the user a slightly longer timer when the snake hits a wall. This is just to make it a little easier for the user to get the food block that appear at the edge of the game table.
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
					Written by: Elmer Landaverde <a href="mailto:elmerlandaverde@gmail.com">(elmerlandaverde@gmail.com)</a><br>
					Las updated: January 6, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		</div>
	</article>
</body>
</html>
