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
	<article class="main">
		
		<div class="outline">
			<section>
				<h2>Creating a little Snake game - Outline</h2>
				<ul>
					<li><a href="#theProject">The Project</a></li>
					<li><a href="#theFinalResult">The Final Result</a></li>
					<li><a href="#theCode">The Code</a></li>
					<li><a href="#theMakingOf">The Making Of</a></li>
					<ul>
						<li><a href="#step1">Step 1 - HTML (index.html)</a></li>
						<li><a href="#step2">Step 2 - JavaScript (table.js)</a></li>
						<li><a href="#step3">Step 3 - JavaScript (snake.js)</a></li>
						<li><a href="#step4">Step 4 - CSS (main.css)</a></li>
					</ul>
					<li><a href="#conclusion">Conclusion</a></li>
					<li><a href="#notes">Notes</a></li>
					<li><a href="#disqus_thread">Comments</a></li>
				</ul>
			</section>
		</div>
		
		<header>
			<h1>Creating a little Snake game</h1>
			<p><time pubdate datetime="2014-01-04">Created on: January 04, 2014</time></p>
		</header>
		
		<div class="content">
			
		<h2 id="theProject">The Project</h2>
		<span><a class="toTop" href="#">Back to top</a></span>
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
	
		<h2 id="theFinalResult">The Final Result</h2>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			You can take a look at the final result by following this link, or copying into your browser:
		</p>
	
		<p>
			<a title="Snake project" href="http://learncodeart.com/projects/snake/snake.html" target="_blank">
				http://learncodeart.com/projects/snake/snake.html</a>
		</p>
		
		<h2 id="theCode">The Code</h2>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			Since this was my first time writing a webpage I had to reorganize my files a couple of times before getting an organization that I liked. At the end there where four files. One HTML, one CSS and two JavaScript. The contents of the HTML and CSS files are straightforward. I decided to split the JavaScript file into two because I thought it looked cleaner. The first file "snake.js" controls the logic of the actual game, the second file "table.js" is in charge of the webpage functionality. Mainly it handles the creation of the table where the game takes places, gets information from the text field and radio buttons, and it determines what the buttons do when pressed. Below is a copy of the source code for the project.
		</p>
	
		<p>
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
	
		<h2 id="theMakingOf">The Making Of</h2>
		<span><a class="toTop" href="#">Back to top</a></span><br>
	
		<h3 id="step1">Step 1 - HTML file</h3>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			The first step was to create the HTML file. The structure of this file is really simple, since the main focus of the project is on the JavaScript I kept all HTML to a minimum.
		</p>
		
		<pre>
&lt;meta http-equiv="Content-type" content="text/html; charset=UTF-8" /&gt;
&lt;title>Snake game&lt;/title&gt;
&lt;link rel="stylesheet" type="text/css" href="css/main.css" /&gt;
&lt;script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"&gt;&lt;/script&gt;
&lt;script language="javascript" type="text/javascript" src="js/snake.js"&gt;&lt;/script&gt;
&lt;script language="javascript" type="text/javascript" src="js/table.js"&gt;&lt;/script&gt;</pre>
	
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
	
		<pre>
&lt;div id="main"&gt;
	&lt;h1&gt;Welcome to my snake game!&lt;/h1&gt;
	&lt;p&gt;Size of grid: &lt;input id="input" type="text"&gt;&lt;/p&gt;
	&lt;p&gt;Difficulty:
	&lt;input type="radio" name="level" value="1"&gt;For Kids
	&lt;input type="radio" name="level" value="2"&gt;For noobs'
	&lt;input type="radio" name="level" value="3"&gt;For amateurs
	&lt;input type="radio" name="level" value="4"&gt;For gamers
	&lt;input type="radio" name="level" value="5"&gt;God like!&lt;/p&gt;
	&lt;button id="button" type="button"&gt;Create Game&lt;/button&gt;
	&lt;button id="start" type="button"&gt;Start Game&lt;/button&gt;
	&lt;p id="gameStatus"&gt;&lt;/p&gt;
	&lt;p id="countdown"&gt;Starts in: #&lt;/p&gt;
	&lt;div class="scoreBoard"&gt;&lt;p&gt;Points: &lt;em id="points"&gt;000&lt;/em&gt;&lt;/p&gt;&lt;/div&gt;
	&lt;div class="scoreBoard"&gt;&lt;p&gt;Time: &lt;em id="time"&gt;00:00&lt;/em&gt;&lt;/p&gt;&lt;/div&gt;
&lt;/div&gt;</pre>
	
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
	
		<h3 id="step2">Step 2 - JavaScript (table.js)</h3>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			The first thing I created was to add an event listener to know when the document loads.
		</p>
	
		<pre>
// Calls the init function when the page document loads.
window.onload = function () {
	"use strict";
	init();
}</pre>
	
		<p>
			With this in place, right after the document (page) is loaded the <strong>int()</strong> function will be called.
		</p>
		
		<pre>
//Initializes the snake game.
function init() {
	"use strict";
	// Get document elements
	mainDiv = document.getElementById("main");
	pointsElement = document.getElementById("points");
	timeElement = document.getElementById("time");
	
	// Add functionality for radio buttons.
	$("input:radio[name=level]").click(function() {
		level = $(this).val();
	});
	
	// Add functinality to create game button.
	document.getElementById("button").onclick = createGameButton;
}</pre>
		
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
		
		<pre>
// Gives functionality to the create game button.
function createGameButton() {
	// Clear existing table.
	clearGame();
	// Get table size;
	size = document.getElementById("input").value;
	if (size &lt; 5) {
		alert("Game size has to be greater than 5.");
		return;
	}
	// Create game board.
	createGame();
	
	// Enable start game button.
	document.getElementById("start").onclick = startGameButton;
}</pre>
	
		<p>
			This function first clears the game table if there was one, then it gets a validates the size of the new game table, next it creates a new game table, and finally it enables the "start game" button. The create game function looks as follows.
		</p>
		
		<pre>
// Creates a new game table with all the necessary components.
function createGame() {
	"use strict";
	game = document.createElement("div");
	game.id = "gameBoard";
	addTable();
	mainDiv.appendChild(game);
}</pre>
	
		<p>
			First it creates a new div element that will hold the entire table. Next it creates the actual table and it finally adds the game div to the main div.
		</p>
	
		<p>
			The game table is creating using simple &lt;table&gt;, &lt;tbody&gt;, &lt;tr&gt;, and &lt;td&gt; elements. One thing worth noting is that each table cell has two extra properties that will be used by the snake.js file. These are the "occupied" and "hasFood" properties as shown below.
		</p>
		
		<pre>
column.occupied = false;
column.hasFood = false;</pre>
	
		<p>
			Going back to the "create game" button, we saw that it gives a function to the "start game" button. This is what that function looks like.
		</p>
		
		<pre>
// Gives functionality to the start game button.
function startGameButton() {
	if (game != undefined &amp;&amp; game != null) {
		count = 2;
		$("#gameStatus").html("");
		$("#countdown").html("Starts in: 3...");
		startTimer = setInterval(countDown, 1000);
	}
}</pre>
	
		<p>
			This function first checks if the game table is set up. Then it resets the messages for the "countdown" and "gameStatus" elements in the HTML file. Finally it starts a new timer and gives it the <strong>countDown()</strong> function. This function just updates the "coundown" element until the counter reaches zero, and then it starts the game. This is how the <strong>countDown()</strong> function looks like.
		</p>
		
		<pre>
// Updates the countdown element.
function countDown() {
	"use strict";
	// Check if count has reached zero.
	if (count == 0) {
		// Stop interval.
		clearInterval(startTimer);
		// Start game.
		play();
	} else {
		// Update countdown element.
		$("#countdown").html("Starts in: " + count + "...");
		// Update count variable.
		count--;
	}
}</pre>
	
		<p>
			From this moment on, the table.js file is done and as soon as the user clicks on the start game button, then the countdown starts and the <strong>play()</strong> function in the snake.js file is executed.
		</p>
	
		<h3 id="step3">Step 3 - JavaScript (Snake.js)</h3>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			To create a snake representation recursion will always be your friend. The snake consists of several snake nodes. Each node is visually represented by a square, and so it naturally has a x and y coordinate. When the snake moves, only the head node is moved. This head node will then call on all of the trailing nodes to move right after it. Therefore, most of the thought process goes into the behavior of this head node. Every node after the head will just follow suit and should be relatively straight forward. The first step was to create a snake node constructor, that looks like this.
		</p>
		
		<pre>
// Constructor for a SnakeNode objec.
function SnakeNode(row, col, tail, isHead) {
	"use strict";
	// Set object properties.
	this.row = row;
	this.col = col;
	this.tail = tail;
	this.isHead = isHead;
	// Set DOM properties.
	occupyCell(this.row, this.col, true);
	colorCell(this.row, this.col);
}</pre>
	
		<p>
			The constructor sets the properties for row (x) and col (y) position. The tail pointer and the isHead boolean. It then colors the cell on the game table to reflect the snake node and also marks the cell as occupied.
		</p>
	
		<p>
			Next, I implemented two functions for the snake node prototype.
		</p>
		
		<pre>
// Add functions to SnakeNode protrotype.
SnakeNode.prototype = {
	// Add move function.
	move: function (newRow, newCol) {
		"use strict";
		// Get cell to whcih the snake is goint to move to.
		var nextCell = getCell(newRow, newCol);
		// Check if snake node crashed against wall.
		if (nextCell == null) {
			console.log("Crashed against wall");
			$("#gameStatus").html("You crashed agains a wall!");
			gameOver();
			return;
		}
		// Check if snake node crashed against another snake node.
		if(nextCell.occupied) {
			console.log("Crashed against yourself");
			$("#gameStatus").html("You crashed agains yourself!");
			gameOver();
			return;
		}
		// Check if cell has food.
		if (nextCell.hasFood &amp;&amp; this.isHead) {
			// if so, add another food block.
			addFood();
		}
		
		// Move snake node.
		colorCell(newRow, newCol);  // update cell color.
		colorCell(this.row, this.col);
		occupyCell(newRow, newCol, true);  // Occupy cell.
		occupyCell(this.row, this.col, false);
		var oldRow = this.row;  // Update node coordinates
		var oldCol = this.col;
		this.row = newRow;
		this.col = newCol;
		
		// Move tail node if any.
		if (this.tail != null) {
			this.tail.move(oldRow, oldCol);
		} else if (this.tail == null &amp;&amp; nextCell.hasFood) {
			// If no tail node and next cell has food, then add a new snake node
			// and clear the food block.
			clearFood(newRow, newCol);
			this.addNode(oldRow, oldCol);		
		}
	},
	// Add a new node to the snake.
	addNode: function(row, col) {
		"use strict";
		// Create a new snake node.
		var newNode = new SnakeNode(row, col, null, false);
		// Update the tail pointer.
		this.tail = newNode;
		// Update points.
		addPoints();
	}
};</pre>
	
		<p>
			The first function called <strong>move()</strong> simple moves the snake node from its current position to the specified position and the second function called <strong>addNode()</strong> just adds a new snake node to the tail of the current snake node. The move function first checks if the next position the snake node is going to be moved to correspond to a cell outside of the board or if the cell is already occupied by another snake node. Then it checks if the next position has any food in it. If it does, it creates a new food item. Next it updates the position of the snake node while also changing the coloring of the table cell and the occupied status of the cell. Finally it checks whether the current snake node has a tail node. If it does, then it moves the tail node to where the current snake node was. If it doesn't have a tail node it checks if the next cell has food in it. If it does it adds a new tail node if it doesn't it does nothing. The addNode function simply creates a new snake node to the specified position. The getCell(), colorCell(), addFood(), and clearFood() functions are very self explanatory and will leave to you to figure out.
		</p>
		
		<pre>
// Get the game table cell at the specified locaiton.
function getCell(row, col) {
	"use strict";
	// Using the id of each cell, obtain the game table cell.
	return document.getElementById("row_" + row + "_col_" + col);
}

// Toggle the background color of the specified game table cell.
function colorCell(row, col) {
	"use strict";
	var cell = getCell(row, col);
	// If cell has defualt background or food background, change to alternate
	// background. Otherwise set to default background.
	if (cell.style.backgroundColor == background) {
		cell.style.backgroundColor = backgroundAlt;
	} else if (cell.style.backgroundColor == foodBackground) {
		cell.style.backgroundColor = backgroundAlt;
	} else {
		cell.style.backgroundColor = background;
	}
}

// Mark the specified game table cell as occupied or not.
function occupyCell(row, col, occupy) {
	"use strict";
	var cell = getCell(row, col);
	if (occupy) {
		cell.occupied = true;
	} else {
		cell.occupied = false;
	}
}

// Adds a new food block at a random location in the game table.
function addFood() {
	"use strict";
	var row;
	var col;
	var cell;
	
	while (true) {
		// Get random row and column.
		row = Math.floor(Math.random()*size);
		col = Math.floor(Math.random()*size);
		// Get cell.
		cell = getCell(row, col);
		// Check if cells is occupied.
		if (!cell.occupied) {
			break;
		}
	}
	// Add food to cell.
	cell.hasFood = true;
	cell.style.backgroundColor = foodBackground;
}

// Removes the specified food block from the game table.
function clearFood(row, col) {
	"use strict";
	var cell = getCell(row, col);
	cell.hasFood = false;
}</pre>
	
		<p>
			Now we will concern ourselves with how the snake actually moves. First lets take a look at the play function.
		</p>
		
		<pre>
// Starts a new game.
function play() {
	"use strict";
	// Resets the board all the variables.
	resetBoard();
	// Get starting position for snake.
	var row = Math.floor(size/2);
	var col = Math.floor(size/2);
	// Add a food block.
	addFood();
	// Create snake head node.
	snakeHead = new SnakeNode(row, col, null, true);
	// Add keyboard listener for arrow keys.
	$(document).keydown(changeDirection);
	// Start timers.
	moveTimer = setInterval(moveSnake, moveInterval);
	clockTimer = setInterval(increaseTimer, 1000);
}</pre>
		
		<p>
			This function is called immediately after the user clicks on the "start game" button and the countdown is done. It first calls a function to clear the board and reset everything in case there was a game previously in motion. Then it gets the center position of the game table to place the new snake head node at. It also adds a new food block. Finally it adds a function to the key down event, and two timers. One timer for each time the snake has to move and another timer for the clock. The <strong>changeDirection()</strong> function handles the key down event when the user presses on any of the arrow keys. There are a couple of important things about this function. First it uses a boolean called <strong>directionLock</strong>. The purpose of this boolean is so that the user can't change direction more than once per move. This is necessary because of the next feature of this function. When you are moving right and then press left the snake will crash against itself. To avoid this situation the changeDirection function prevents the user from changing the direction of the snake to the exact opposite of what the current direction is (i.e. left to right, up to down and vice versa). So in conjunction these two features will prevent the user from crashing the snake against itself just because of careless key presses which happens when you are in the heat of the game.
		</p>
		
		<pre>
// Change current direction everytime an arrow key is pressed.
function changeDirection(e) {
	"use strict";
	// Check if directio lock is on.
	if (directionLock) {
		e.preventDefault();
		return;
	}
	// Update current direction. However, directions opposite to the current
	// direction are not allowed to prevent snake head from crashing against
	// itself.
	switch(e.which) {
		case 37: // left
		if (currDirection != right) {
			directionLock = true;
			currDirection = left;
		}
		break;

		case 38: // up
		if (currDirection != down) {
			directionLock = true;
			currDirection = up;
		}
		break;

		case 39: // right
		if (currDirection != left) {
			directionLock = true;
			currDirection = right;
		}
		break;

		case 40: // down
		if (currDirection != up) {
			directionLock = true;
			currDirection = down;
		}
		break;
		default: return; // exit this handler for other keys	
	}
	e.preventDefault(); // prevent the default action (scroll / move caret)
}</pre>
	
		<p>
			Lastly lets dissect the <strong>moveSnake()</strong> function, that is in charge of moving the snake head node.
		</p>
		
		<pre>
// Move snake head one block in the current direction.
function moveSnake() {
	"use strict";
	// Get snake head coordiantes.
	var newRow = snakeHead.row;
	var newCol = snakeHead.col;
	// Determine coordinate of new position.
	if (currDirection == up) {
		newRow--;
	} else if (currDirection == left) {
		newCol--;
	} else if (currDirection == right) {
		newCol++;
	} else if (currDirection == down) {
		newRow++;
	}
	// Move snake head to the new position.
	snakeHead.move(newRow, newCol);
	// Reset the direction lock.
	directionLock = false;
}</pre>
	
		<p>
			This function first determines the next cell the snake has to move to based on the current direction. Then it calls the <strong>move()</strong> function on the snake head node, and finally it sets the directionLock to false. This covers the most important parts of the snake.js file. There are still some functions left that were not covered (i.e. resetBoard, gameOver, addPoints, increaseTimer), I feel confident the you can figure them out.
		</p>
	
		<h3 id="step4">Step 4 - CSS (main.css)</h3>
		<span><a class="toTop" href="#">Back to top</a></span>
	
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
		
		<pre>
p {
	margin: 5px;
}

#main {
	width: 980px;
    margin: 0 auto;
    background-color: #;
}

table.gameTable {
	border-collapse: collapse;
	table-layout:fixed;
	clear:both;
	margin: 0 auto;
}

td.gameCell {
	border:1px solid #B5B5B5;
	overflow: hidden;
	padding:0;
	width: 10px;
	height: 10px;
}

#gameBoard {
	width: 100%;
	height: 100%;
}

.scoreBoard {
	margin-right: 10px;
	display:block;
	float:left;
}</pre>
	
		<h2 id="conclusion">Conclusion</h2>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			This was fun little project, and it definitely served its purpose of getting some JavaScript practice under my belt. I was able to achieve all the features I wanted to and gave me more confidence to engage in bigger and more complex projects. I'll definitely make some other posts in the future about any other JavaScript challenges I face next semester and probably also any other project that I have to do for school.
		</p>
	
		<h2 id="notes">Notes</h2>
		<span><a class="toTop" href="#">Back to top</a></span>
	
		<p>
			After completing the project a few thoughts came to me on some improvements that I could have included. However, I will leave this improvements for some future time. The first improvement is to include a pause button, which should be really simple because there is already a key listener in place. The second improvement which might be a bit harder to implement would be to give the user a slightly longer timer when the snake hits a wall. This is just to make it a little easier for the user to get the food block that appear at the edge of the game table.
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
				Las updated: January 6, 2014<br>
				<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
			</p>
		</footer>
		<?php require_once("../php/disqus.php"); ?>
	</article>
</body>
</html>
