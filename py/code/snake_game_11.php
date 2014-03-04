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
};