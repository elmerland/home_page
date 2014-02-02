function createTableElements() {
  $("body").append("&lt;div id='tableContainer'&gt;&lt;/div&gt;");
  $("#tableContainer").append("&lt;table&gt;&lt;/table&gt;");
  $("table").append("&lt;thead&gt;&lt;/thead&gt;");
  $("table").append("&lt;tbody&gt;&lt;/tbody&gt;");
  
  createTableHeader();
  createTableBody();
}