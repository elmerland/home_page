import article
import sys

# Article list source file
article_list = 'article_list.txt'

# Articles to create
articles = []

def main():
    args = []
    for a in sys.argv:
        args.append(a)

    if len(args) == 1:
        # Get list of articles
        article_list_path = article.get_input_path(article_list)
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
    print('Compile home')
    pass

main()
