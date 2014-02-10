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
article_excerpts = 'snippets/article_excerpts.html'
home_links = 'snippets/home_links.html'
header_nav_css = 'snippets/header_nav_css.html'
home_css = 'snippets/home_css.html'

# Home page
home_page = '../index.html'

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
    # Open the home file
    home = open(home_page, 'w')
    
    # Create html header
    output = []
    output.append('<!DOCTYPE html>\n<html>\n<head>\n')
    filemanager.write_text_block(home, output, 0);
    
    # Get head links
    with open(header_nav_css, 'r') as css:
        filemanager.write_text_block(home, css, 1);
    with open(home_css, 'r') as css:
        filemanager.write_text_block(home, css, 1);
    
    # Write closing head and opening body
    del output[:]
    output.append('</head>\n<body>\n')
    filemanager.write_text_block(home, output, 0);
    
    # Write header and navigation
    with open(header, 'r') as head:
        filemanager.write_text_block(home, head, 1);
    with open(navigation, 'r') as nav:
        filemanager.write_text_block(home, nav, 1);
    
    # Write main seciton and links
    del output[:]
    output.append('<div class="main">\n\t\t<section>\n')
    filemanager.write_text_block(home, output, 1);
    
    # Write article excerpts
    with open(article_excerpts, 'r') as excerpts:
        filemanager.write_text_block(home, excerpts, 3);
    
    # Write section end and aside start
    del output[:]
    output.append('</section>\n\t\t<aside>\n')
    filemanager.write_text_block(home, output, 2);
    
    # Write home links
    with open(home_links, 'r') as links:
        filemanager.write_text_block(home, links, 3);

    # Write aside end and close rest of tags
    del output[:]
    output.append('</aside>\n\t</div>\n</body>\n</html>\n')
    filemanager.write_text_block(home, output, 2);
    home.close()

main()
