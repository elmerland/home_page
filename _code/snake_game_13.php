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