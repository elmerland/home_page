function createTableHeader() {
  $("thead").append("<tr></tr>");
  var header = $("thead").first("tr");
  for (var i = 0; i &lt; size; i++) {
    header.append("<th>Heading " + i + "</th>");
  }
}