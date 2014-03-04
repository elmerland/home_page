function createTable() {
  // Get table size.
  size = $("#input").val();
  if (size &lt; 5) {
    alert("Invalid table size. It needs to be greater than or equal to 5.");
    return;
  } else {
    clearTable();
    createTableElements();
  }
}