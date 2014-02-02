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