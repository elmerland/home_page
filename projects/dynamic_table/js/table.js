// Size of the game board.
var size;
// Conatiner that displays the number of points.
var pointsElement;
// Constainer that displays the time.
var timeElement;
// Bakcground color for the grid.
var background = "rgb(181, 181, 181)";
// Background color for the snake.
var backgroundAlt = "rgb(255, 0, 0)";
// Backround color for the food squares.
var foodBackground = "rgb(0, 255, 0)";
// The main div in the index.html file.
var mainDiv;
// The div that contains the game table.
var game;
// The game table.
var table;
// The rows and columns of the table.
var tableBody;
// Internval timer for countdown.
var startTimer;
// Countdown variable.
var count;
// Diffculty level.
var level;

// Calls the init function when the page document loads.
window.onload = function () {
	"use strict";
	init();
}

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
}

// Gives functionality to the create game button.
function createGameButton() {
	// Clear existing table.
	clearGame();
	// Get table size;
	size = document.getElementById("input").value;
	if (size < 5) {
		alert("Game size has to be greater than 5.");
		return;
	}
	// Create game board.
	createGame();
	
	// Enable start game button.
	document.getElementById("start").onclick = startGameButton;
}

// Gives functionality to the start game button.
function startGameButton() {
	if (game != undefined && game != null) {
		count = 2;
		$("#gameStatus").html("");
		$("#countdown").html("Starts in: 3...");
		startTimer = setInterval(countDown, 1000);
	}
}

// Creates a new game table with all the necessary components.
function createGame() {
	"use strict";
	game = document.createElement("div");
	game.id = "gameBoard";
	addTable();
	mainDiv.appendChild(game);
}

// Removes the game table and resets points and time elements.
function clearGame() {
	"use strict";
	if (game != undefined && game != null) {
		gameOver();
		game.parentNode.removeChild(game);
		pointsElement.innerHTML = "000";
        timeElement.innerHTML = "00:00";
	}
}

// Creates the game table.
function addTable() {
	"use strict";
	// Create table element.
	table = document.createElement("table");
	// Set game table properties.
	table.className = "gameTable";
	// Create body of game table.
	createTableBody(size);
	// Add game table to game div.
	game.appendChild(table);
}

// Creates the contents of the game table.
function createTableBody(size) {
	"use strict";
	// Create the table body element.
	tableBody = document.createElement("tbody");
	// Create all the rows for the table body.
	for (var i = 0; i < size; i++) {
		var row = document.createElement("tr");
		// Create all the cells for each row.
		for (var j = 0; j < size; j++) {
			// Create cell.
			var column = document.createElement("td");
			// Add properties to cell.
			column.className = "gameCell";
			column.id = "row_" + i + "_col_" + j;
			column.style.backgroundColor = background;
			column.occupied = false;
			column.hasFood = false;
			// Add cell to row.
			row.appendChild(column);
		}
		// Add row to table body
		tableBody.appendChild(row);
	}
	// Add table body to game table.
	table.appendChild(tableBody);
}

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
}

// Adds ten points to the score board.
function addPoints() {
	"use strict";
	// Update the points variable.
	points += 10;
	// Update the points element.
	if (points < 10) {
		pointsElement.innerHTML = "00" + points;
	} else if (points < 100) {
		pointsElement.innerHTML = "0" + points;
	} else {
	    pointsElement.innerHTML = points;
	}
}

// Increase the elapsed time element.
function increaseTimer() {
	"use strict";
	// Update time variable
	time += 1;
	// Get seconds.
	var secs = time%60;
	if (secs < 10) {
		secs = "0" + secs;
	}
	// Get minutes
	var mins = Math.floor(time/60)%3600;
	if (mins < 10) {
		mins = "0" + mins;
	}
	// Update time element.
	timeElement.innerHTML = mins + ":" + secs;
}
