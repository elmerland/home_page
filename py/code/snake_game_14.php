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