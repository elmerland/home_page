// Updates the countdown element.
function countDown() {
  "use strict";
  // Check if count has reached zero.
  if (count == 0) {
    // Stop interval.
    clearInterval(startTimer);
    // Start game.
    play();
  } else {
    // Update countdown element.
    $("#countdown").html("Starts in: " + count + "...");
    // Update count variable.
    count--;
  }
}