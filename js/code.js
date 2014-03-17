/*jslint browser: true, devel: true, indent: 4 */
/*global $ */

var display = false;
var className = "fixed";
var windowSize;
var leftOffset;

function format_code() {
    "use strict";
    var pre_tags = $('pre'), i, lines, table, j, data, line_index;
    for (i = 0; i < pre_tags.length; i += 1) {
        // Get all the lines inside the pre tag
        lines = $(pre_tags[i]).html().split('\n');
        if (typeof $(pre_tags[i]).attr('data-highlight') === 'undefined') {
            data = [-1];
        } else if ($(pre_tags[i]).attr('data-highlight') === '') {
            data = [-1];
        } else {
            data = $(pre_tags[i]).attr('data-highlight').split(',');
            
        }
        // Create the table
        table = '<table>\n';
        // Add column groups
        table += '<colgroup>\n';
        table += '<col class="first">\n';
        table += '<col class="second">\n';
        table += '</colgroup>\n';
        table += '<tbody>\n';
        // Populate the rows
        line_index = 0;
        for (j = 0; j < lines.length; j += 1) {
            table += '\t<tr';
            if (parseInt(data[line_index], 10) === (j + 1)) {
                table += ' class="highlight"';
                line_index += 1;
            }
            table += '>\n';
            table += '\t\t<td class="numbered">' + (j + 1) + '</td>\n';
            table += '\t\t<td class="text';
            if ($.trim(lines[j]).lastIndexOf('//', 0) === 0) {
                table += ' comment_line';
            }
            table += '">' + lines[j] + '</td>\n';
            table += '\t</tr>\n';
        }
        // Close table
        table += '</tbody>\n';
        table += '</table>';
        // Overwrite inner html.
        $(pre_tags[i]).html(table);
    }
}

$(document).ready(function () {
    "use strict";
	format_code();
});
