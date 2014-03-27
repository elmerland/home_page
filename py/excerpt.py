import filemanager

# Source for excerpts
raw_excerpts = 'excerpts/excerpts.txt'

# Tags of file.
tags = ['</file>', '<article>', '</article>', '<title>', '<subtitle>', '<author>', '<tags>']


def compile_excerpts(out_file):
    output = []
    with open(raw_excerpts, 'r') as raw:
        while True:
            line = filemanager.get_next_line(raw).strip('\n ')
            if line.startswith(tags[0]):
                break
            elif line.startswith(tags[1]):
                img = line[len(tags[1]):]
                output.append('<article class="excerpt">\n')
                output.append('<div class="image" style="background-image: url(' + img + ');"></div>\n')
            elif line.startswith(tags[2]):
                output.append('</article>\n')
            elif line.startswith(tags[3]):
                title, link = line[len(tags[3]):].split('$')
                output.append('\t<a href="' + link + '">\n')
                output.append('\t\t<h3>\n')
                output.append('\t\t\t' + title + '\n')
                output.append('\t\t</h3>\n')
                output.append('\t</a>\n')
            elif line.startswith(tags[4]):
                subtitle = line[len(tags[4]):]
                output.append('\t<h4>' + subtitle + '</h4>\n')
            elif line.startswith(tags[5]):
                name, date = line[len(tags[5]):].split('$')
                build = [
                    '\t\t<td class="metadata">\n',
                    '\t\t\t<ul>\n',
                    '\t\t\t\t<li class="author">By: ' + name + '</li>\n',
                    '\t\t\t\t<li class="date">' + date + '</li>\n',

                ]
                output += build
            elif line.startswith(tags[6]):
                tags_list = line[len(tags[6]):]
                build = [
                    '\t\t\t\t<li class="tags">Tags: ' + tags_list + '</li>\n',
                    '\t\t\t</ul>\n',
                    '\t\t</td>\n',
                    '\t</tr>\n',
                    '</table>\n'
                ]
                output += build
            else:
                build = [
                    '<table class="content"\n',
                    '\t<tr>\n',
                    '\t\t<td class="text">' + line + '</td>\n'
                ]
                output += build
    with open(out_file, 'w') as out:
        filemanager.write_text_block(out, output, 0)