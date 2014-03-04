function createTableBody() {
  for (var i = 0; i &lt; size; i++) {
    $("tbody").append("<tr></tr>");
    var row = $("tbody").last("tr");
    for (var j = 0; j &lt; size; j++) {
      row.append("<td>Cell " + i + "_" + j + "</td>");
    }
  }
}