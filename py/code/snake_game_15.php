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