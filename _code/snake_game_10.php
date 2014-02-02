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