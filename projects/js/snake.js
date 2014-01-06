// Points to the head of the snake.
var snakeHead;
// Global directions.
var up = "u";
var left = "l";
var right = "r";
var down = "d";
// Difficulty levels.
var difficultyLevels = [200, 100, 60, 30, 10];
// Current direction of snake.
var currDirection;
// Determines if the direction is locked until the next move.
var directionLock;
// Move timer that triggers the snake to move one position.
var moveTimer;
// The time interval between each move.
var moveInterval;
// Timer for the time elapsed time.
var clockTimer;
// The points counter.
var points;
// The time elapse.
var time;

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
}

// Ends the game.
function gameOver() {
	"use strict";
	// Stop timers.
	clearInterval(moveTimer);
	clearInterval(clockTimer);
	// Remove key listener.
	$(document).off("keydown", changeDirection);
	// print game over message.
	console.log("Game over bro'!");
	$("#countdown").html("Game over bro'!");
}

// Clears the board and reset all variables.
function resetBoard() {
	"use strict";
	// Mark all cells as empty and give default background.
	for (var i = 0; i < size; i++) {
		for (var j = 0; j < size; j++) {
			var cell = getCell(i, j);
			cell.style.backgroundColor = background;
			cell.occupied = false;
			cell.hasFood = false;
		}
	}
	// Reset snake head node.
	snakeHead = null;
	// Reset curent direction.
	currDirection = right;
	// Reset direction lock.
	directionLock = false;
	// Reset difficulty level.
	moveInterval = difficultyLevels[level];
	// Reset points and time.
	points = -10;
	addPoints();
	time = 0;
	// Reset countdown label
	$("#countdown").html("The force is strong with this one...");
}

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
}

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
}

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
		if (nextCell.hasFood && this.isHead) {
			// if so, add another food block.
			addFood();
		}
		
		// Move snake node.
		colorCell(newRow, newCol);				// update cell color.
		colorCell(this.row, this.col);
		occupyCell(newRow, newCol, true);		// Occupy cell.
		occupyCell(this.row, this.col, false);
		var oldRow = this.row;					// Update node coordinates
		var oldCol = this.col;
		this.row = newRow;
		this.col = newCol;
		
		// Move tail node if any.
		if (this.tail != null) {
			this.tail.move(oldRow, oldCol);
		} else if (this.tail == null && nextCell.hasFood) {
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
};

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
}

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
}
