// Creates a new game table with all the necessary components.
function createGame() {
  "use strict";
  game = document.createElement("div");
  game.id = "gameBoard";
  addTable();
  mainDiv.appendChild(game);
}