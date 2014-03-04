import filemanager
import article
import sys

# Article list source file
article_list = 'article_list.txt'

# Articles to create
articles = []

# File paths
header = 'snippets/header.html'
navigation = 'snippets/nav.html'
home_links = 'snippets/home_links.html'
header_nav_css = 'snippets/header_nav_css.html'
home_css = 'snippets/home_css.html'

# File paths for sources
article_excerpts = 'snippets/article_excerpts.html'
error404_content = 'snippets/404.html'

# File paths for pages
home_page = '../index.html'
error404_page = '../error/404.shtml'


def main():
    args = []
    for a in sys.argv:
        args.append(a)

    if len(args) == 1:
        # Get list of articles
        article_list_path = filemanager.get_article_input_path(article_list)
        with open(article_list_path, 'r') as a_list:
            lines = a_list.readlines()
            for line in lines:
                if line != '\n' or line != '':
                    articles.append(line.strip('\n '))
    elif args[1] == '-home':
        compile_home()
        return
    else:
        for i in range(1, len(args)):
            articles.append(args[i])

    article.generate_articles(articles)


def compile_home():
    # Write home page
    with open(home_page, 'w') as home:
        create_page(home, article_excerpts)
    with open(error404_page, 'w') as error:
        create_page(error, error404_content)


def create_page(output_file, source_file):
    # Create html header
    output = list()
    output.append('<!DOCTYPE html>\n<html>\n<head>\n')
    filemanager.write_text_block(output_file, output, 0)

    # Get head links
    with open(header_nav_css, 'r') as css:
        filemanager.write_text_block(output_file, css, 1)
    with open(home_css, 'r') as css:
        filemanager.write_text_block(output_file, css, 1)

    # Write closing head and opening body
    del output[:]
    output.append('</head>\n<body>\n')
    filemanager.write_text_block(output_file, output, 0)

    # Write header and navigation
    with open(header, 'r') as head:
        filemanager.write_text_block(output_file, head, 1)
    with open(navigation, 'r') as nav:
        filemanager.write_text_block(output_file, nav, 1)

    # Write main section and links
    del output[:]
    output.append('<div class="main">\n\t\t<section>\n')
    filemanager.write_text_block(output_file, output, 1)

    # Write source to output file
    with open(source_file, 'r') as in_file:
        filemanager.write_text_block(output_file, in_file, 3)

    # Write section end and aside start
    del output[:]
    output.append('</section>\n\t\t<aside>\n')
    filemanager.write_text_block(output_file, output, 2)

    # Write home links
    with open(home_links, 'r') as links:
        filemanager.write_text_block(output_file, links, 3)

    # Write aside end and close rest of tags
    del output[:]
    output.append('</aside>\n\t</div>\n</body>\n</html>\n')
    filemanager.write_text_block(output_file, output, 2)

main()
