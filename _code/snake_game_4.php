//Initializes the snake game.
function init() {
  "use strict";
  // Get document elements
  mainDiv = document.getElementById("main");
  pointsElement = document.getElementById("points");
  timeElement = document.getElementById("time");
  
  // Add functionality for radio buttons.
  $("input:radio[name=level]").click(function() {
    level = $(this).val();
  });
  
  // Add functinality to create game button.
  document.getElementById("button").onclick = createGameButton;
}