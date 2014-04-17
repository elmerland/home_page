
import filemanager, socialmanager

# Header and footer html code for all sections of article.
head_tags = ["<!DOCTYPE html>\n<html>\n<head>\n", "</head>\n"]

body_tags = ["<body>\n", "</body>\n</html>\n"]

banner_tags = ['\t<div class="banner" style="background-image: url(', ');"></div>\n']

article_tags = ['\t<article class="main">\n', '\t</article>\n']

content_tags = ['\t\t<div class="content">\n', '\t\t</div>\n']

# File paths
article_header = 'snippets/page/article_header.html'
article_css = 'snippets/css/article.html'
article_js = 'snippets/js/article.html'
google_analytics = 'snippets/services/google_analytics.html'
social_links = 'snippets/services/social.html'
comment_system = 'snippets/services/comments.html'
code_dir = 'code'

tags = ['<section>', '<image>', '<code>', '<notes>', '</section>', '<raw>', '</raw>', '<include>']

tag_length = {tags[0]: len(tags[0]),
    tags[1]: len(tags[1]),
    tags[2]: len(tags[2]),
    tags[3]: len(tags[3]),
    tags[4]: len(tags[4]),
    tags[5]: len(tags[5]),
    tags[6]: len(tags[6]),
    tags[7]: len(tags[7])}

# Articles to digest
articles = []

# List of sections in article. Gets reset after every article is created
section_list = []


def generate_articles(article_list):
    global articles
    articles = article_list
    # Iterate through all the articles
    for article in articles:
        # Get path for input and output.
        print('Digesting article:', article)
        in_article_path = filemanager.get_article_input_path(article)
        out_article_path = filemanager.get_article_output_path(article)
        # Open files
        in_article = open(in_article_path, 'r')
        out_article = open(out_article_path, 'w')
        # digest content of input article and write to output article
        digest_article(in_article, out_article, article)
        in_article.close()
        out_article.close()


# Formats date string into proper form for article.
def get_date(date):
    lines = date.split('-')
    result = "Created on: "

    if lines[1] == '01':
        result += "January"
    elif lines[1] == '02':
        result += "February"
    elif lines[1] == '03':
        result += "March"
    elif lines[1] == '04':
        result += "April"
    elif lines[1] == '05':
        result += "May"
    elif lines[1] == '06':
        result += "June"
    elif lines[1] == '07':
        result += "July"
    elif lines[1] == '08':
        result += "August"
    elif lines[1] == '09':
        result += "September"
    elif lines[1] == '10':
        result += "October"
    elif lines[1] == '11':
        result += "November"
    elif lines[1] == '12':
        result += "December"
    result += " " + str(int(lines[2])) + ", " + lines[0]
    return result


# Get alphanumeric characters
def extract_alphanumeric(input_string):
    from string import ascii_letters, digits
    return "".join([ch for ch in input_string if ch in (ascii_letters + digits)])


# Reads text file with article contents and write the digest HTML content to the output file
def digest_article(in_article, out_article, file_name):
    # Get page URL
    url = 'http://learncodeart.com/articles/' + file_name[:len(file_name) - 4] + '.html'
    # Get page title
    page_title = filemanager.get_next_line(in_article)
    # Write html header to file
    write_header(out_article, page_title.strip('\n '))
    # Writ body header to file
    write_body(out_article, in_article, url)


# Writes the head tag of the article.
def write_header(out_article, page_title):
    # Write html header to file
    out_article.write(head_tags[0])

    # Write css stylesheets for article
    with open(article_css, 'r') as css:
        filemanager.write_text_block(out_article, css.readlines(), 1)

    # Write java script files for articles
    with open(article_js, 'r') as js:
        filemanager.write_text_block(out_article, js.readlines(), 1)

    # Write google analytics file
    with open(google_analytics, 'r') as ga:
        filemanager.write_text_block(out_article, ga.readlines(), 1)

    # Write page title
    out_article.write('\n\t<title>' + page_title + '</title>\n')
    # Write html head footer
    out_article.write(head_tags[1])


# Writes the body tag of the article
def write_body(out_article, in_article, url):
    # Get Banner image
    banner_img = filemanager.get_next_line(in_article)
    # Get article title and date
    title = filemanager.get_next_line(in_article)
    date = filemanager.get_next_line(in_article)
    writen_by = filemanager.get_next_line(in_article)
    last_updated = filemanager.get_next_line(in_article)

    # Write body start
    out_article.write(body_tags[0])

    # Write page header
    with open(article_header, 'r') as head:
        filemanager.write_text_block(out_article, head.readlines(), 1)

    # Write banner image
    out_article.write(banner_tags[0] + banner_img.strip('\n ') + banner_tags[1])

    # Write article opening tags
    out_article.write(article_tags[0])

    # Write article content opening tags
    out_article.write(content_tags[0])

    # Write article header
    out_article.write('\t\t\t<header>\n\t\t\t\t<h1>')
    out_article.write(title.strip('\n '))
    out_article.write('</h1>\n')
    # Write article date
    out_article.write('\t\t\t\t<p><time pubdate datetime="' + date.strip('\n ') + '">')
    out_article.write(get_date(date))
    out_article.write('</time></p>\n')

    # Write social media links
    social_html = socialmanager.get_social_html(title, url)
    filemanager.write_text_block(out_article, social_html, 4)

    # Close header
    out_article.write('\t\t\t</header>\n')

    # Write all article content
    del section_list[:]
    write_content(out_article, in_article, 3)

    # Write social media links for footer
    social_html = socialmanager.get_social_html(title, url)
    filemanager.write_text_block(out_article, social_html, 4)

    # Write footer for article
    write_footer(out_article, writen_by, last_updated, 3)

    # Write disqus commenting system
    with open(comment_system, 'r') as comments:
        filemanager.write_text_block(out_article, comments.readlines(), 3)

    # Close content div
    out_article.write(content_tags[1])

    # Write outline
    # section_list.insert(len(section_list)-1, "Comments")
    write_outline(out_article, 2)

    # Close article and body tag
    out_article.write(article_tags[1])
    out_article.write(body_tags[1])


# Writes the entire content of the article.
def write_content(out_article, in_article, indentation_level):
    section_list.append('<outline>')
    section_in_progress = False
    while True:
        line_start = in_article.tell()
        line = in_article.readline()
        if line == '':
            break
        elif line.startswith(tags[0]):  # Section title
            if section_in_progress:
                in_article.seek(line_start)
                write_content(out_article, in_article, indentation_level)
                continue
            section_list.append(line[tag_length[tags[0]]:].strip('\n '))
            section = get_section_title(line[tag_length[tags[0]]:])
            filemanager.write_text_block(out_article, section, indentation_level)
            section_in_progress = True
            indentation_level += 1

        elif line.startswith(tags[1]):  # Image
            image = get_image(line[tag_length[tags[1]]:])
            filemanager.write_text_block(out_article, image, indentation_level)

        elif line.startswith(tags[2]):  # Code
            code_tag = get_code(line[tag_length[tags[2]]:])
            filemanager.write_text_block(out_article, code_tag, 0)

        elif line.startswith(tags[3]):  # Notes class
            paragraph = get_paragraph(line[tag_length[tags[3]]:], True)
            filemanager.write_text_block(out_article, paragraph, indentation_level)

        elif line.startswith(tags[4]):  # Section end
            if not section_in_progress:
                in_article.seek(line_start)
                break
            section_in_progress = False
            indentation_level -= 1
            section = ['</section>\n']
            filemanager.write_text_block(out_article, section, indentation_level)

        elif line.startswith(tags[5]):  # Raw html
            output = []
            while True:
                raw_line = in_article.readline()
                if raw_line.startswith(tags[6]):
                    break
                output.append(raw_line)
            filemanager.write_text_block(out_article, output, indentation_level)

        elif line.startswith(tags[7]):  # Include
            include_block = get_include_block(line[tag_length[tags[7]]:])
            filemanager.write_text_block(out_article, include_block, indentation_level)

        else:
            if line == '\n':
                continue
            paragraph = get_paragraph(line, False)
            filemanager.write_text_block(out_article, paragraph, indentation_level)
    section_list.append('</outline>')


# Gets the HTML text for a section title.
def get_section_title(title):
    title = title.strip('\n ')
    id_tag = title.replace(' ', '')
    id_tag = extract_alphanumeric(id_tag)
    result = list()
    
    # Print opening tag for section
    result.append('<section id="' + id_tag + '">\n')
    # Print opening tag for header
    result.append('\t<header class="section_title">\n')
    # Print header title
    result.append('\t\t<h2>' + title + '</h2>\n')
    # Print header anchor link
    result.append('\t\t<a class="self_link" href="#' + id_tag + '">&para;</a>\n')
    # Print header back to top link
    # result.append('\t\t<a class="to_top" href="#"><img src="../_images/toTop.png"></a>\n')
    # Print closing header tags
    result.append('\t</header>\n')

    return result


# Gets the HTML text for an image
def get_image(image):
    result = list()
    result.append('<img src="' + image.strip('\n ') + '">\n')
    return result


# Gets the HTML text for code
def get_code(code_import):
    result = []
    code_import = code_import.split('$')
    if len(code_import) == 1:
        lines = ''
        path = code_import[0].strip('\n ')
    else:
        lines = code_import[0].strip('\n ')
        path = code_import[1].strip('\n ')
    result.append('<pre class="code" data-highlight="' + lines + '">')
    path = filemanager.get_folder_path(code_dir, path)
    code_data = filemanager.get_file_text(path)
    for line in code_data:
        result.append(line)
    result.append('</pre>\n')
    return result


# Gets the text inside of the include file
def get_include_block(file_name):
    abs_path = filemanager.get_parent_folder_path('projects', file_name).strip()
    with open(abs_path, 'r') as read_file:
        lines = read_file.readlines()
    return lines


# Gets the HTML text for a paragraph
def get_paragraph(par, notes_class):
    result = []
    if notes_class:
        result.append('<p class="notes">\n')
    else:
        result.append('<p>\n')

    result.append('\t' + par.strip('\n ') + '\n')
    result.append('</p>\n')
    return result


# Writes the footer HTML code
def write_footer(out_article, writen_by, last_updated, indentation_level):
    text = list()
    text.append('<footer>\n')
    text.append('\t<p>\n')
    text.append('\t\t' + writen_by.strip('\n ') + '<br>\n')
    text.append('\t\t' + last_updated.strip('\n ') + '<br>\n')
    text.append('\t\t<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>\n')
    text.append('\t</p>\n')
    text.append('</footer\n')
    filemanager.write_text_block(out_article, text, indentation_level)


# Writes the outline navigation HTML code
def write_outline(out_article, indentation_level):
    output = list()
    output.append('<nav class="outline float">\n')
    tabs = '\t'
    list_start = False
    list_end = False
    list_level = 0
    title_offset = ''
    for idx, section in enumerate(section_list):
        if section == '<outline>':
            list_level += 1
            if list_level != 1:
                title_offset += "|&nbsp;&nbsp;&nbsp;&nbsp;"
            tabs += '\t'
            output.append(tabs + '<ul>\n')
            list_start = True
        elif section == '</outline>':
            list_level -= 1
            title_offset = title_offset[:len(title_offset) - 25]
            output[len(output) - 1] += '</li>\n'
            # Close inner list
            output.append(tabs + '</ul>\n')
            tabs = tabs[:len(tabs)-1]
            list_end = True
        else:
            if not list_start and not list_end:
                output[len(output) - 1] += '</li>\n'
            elif list_end:
                output.append(tabs + '</li>\n')
                list_end = False
            list_start = False
            section_id = section.strip('\n ').replace(' ', '')
            section_id = extract_alphanumeric(section_id)
            output.append(tabs + '<li class="level_' + str(list_level) + '"><a href="#' + section_id +
                          '"><i class="arrow_icon"></i><span class="tab_indicator">' + 
                          title_offset + '</span>' + section + '</a>')
    output.append('</nav>\n')

    filemanager.write_text_block(out_article, output, indentation_level)
