import excerpt
import filemanager
import article
import sys

# Article list source file
article_list = 'article_list.txt'

# Articles to create
articles = []

# File paths
index_header = 'snippets/page/index_header.html'
index_links = 'snippets/page/links.html'
index_css = 'snippets/css/index.html'

# File paths for sources
article_excerpts = 'snippets/page/excerpts.html'
error404_content = 'snippets/page/404.html'

# File paths for pages
home_page = '../index.html'


def main():
    args = []
    for a in sys.argv:
        args.append(a)

    add_all_articles = False

    if len(args) == 1:
        compile_home()
        add_all_articles = True
    elif args[1] == '-home':
        compile_home()
        return
        return
    else:
        for i in range(1, len(args)):
            articles.append(args[i])

    if add_all_articles:
        # Get list of articles
        article_list_path = filemanager.get_article_input_path(article_list)
        with open(article_list_path, 'r') as a_list:
            lines = a_list.readlines()
            for line in lines:
                if line != '\n' or line != '':
                    articles.append(line.strip('\n '))

    article.generate_articles(articles)


def compile_home():
    # Write article excerpts
    excerpt.compile_excerpts(article_excerpts)
    # Write home page
    with open(home_page, 'w') as home:
        create_page(home, article_excerpts)
        print("Digesting home")


def create_page(output_file, source_file):
    # Create html header
    output = list()
    output.append('<!DOCTYPE html>\n<html>\n<head>\n')
    filemanager.write_text_block(output_file, output, 0)

    # Get head links
    with open(index_css, 'r') as css:
        filemanager.write_text_block(output_file, css, 1)

    # Write closing head and opening body
    del output[:]
    output.append('</head>\n<body>\n')
    filemanager.write_text_block(output_file, output, 0)

    # Write header and navigation
    with open(index_header, 'r') as head:
        filemanager.write_text_block(output_file, head, 1)

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
    # with open(index_links, 'r') as links:
    #     filemanager.write_text_block(output_file, links, 3)

    # Write aside end and close rest of tags
    del output[:]
    output.append('</aside>\n\t</div>\n</body>\n</html>\n')
    filemanager.write_text_block(output_file, output, 2)

main()
