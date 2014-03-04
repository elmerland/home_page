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
}