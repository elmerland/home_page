import filemanager

# Source for excerpts
raw_excerpts = 'excerpts/excerpts.txt'

# Tags of file.
tags = ['</file>', '<article>', '</article>', '<title>', '<subtitle>', '<author>']


def compile_excerpts(out_file):
    output = []
    with open(raw_excerpts, 'r') as raw:
        background_alternate = True
        while True:
            line = filemanager.get_next_line(raw).strip('\n ')
            if line.startswith(tags[0]):
                break
            elif line.startswith(tags[1]):
                img = line[len(tags[1]):]
                color = 'background_bright'
                if background_alternate:
                    color = 'background_dark'
                    background_alternate = False
                else:
                    background_alternate = True
                output.append('<article class="excerpt ' + color + '">\n')
                output.append('<div class="wrapper">\n')
            elif line.startswith(tags[2]):
                output.append('</div>\n')
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
                name, date = line[len(tags[5]):].strip('\n ').split('$')
                output.append('\t<div class="author">\n')
                output.append('\t\t<p>\n')
                output.append('\t\t\tBy: ' + name + '<br>\n')
                output.append('\t\t\t' + date + '\n')
                output.append('\t\t</p>\n')
                output.append('\t</div>\n')
            else:
                output.append('\t<div class="text">\n')
                output.append('\t\t<p>\n')
                output.append('\t\t\t' + line + '\n')
                output.append('\t\t</p>\n')
                output.append('\t</div>\n')
    with open(out_file, 'w') as out:
        filemanager.write_text_block(out, output, 0)