// Gives functionality to the start game button.
function startGameButton() {
  if (game != undefined &amp;&amp; game != null) {
    count = 2;
    $("#gameStatus").html("");
    $("#countdown").html("Starts in: 3...");
    startTimer = setInterval(countDown, 1000);
  }
}