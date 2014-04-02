import os.path


# Get the input path for an article.
def get_article_input_path(article):
    base_path = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(base_path, 'articles', article))


# Get the output path for an article
def get_article_output_path(article):
    article = article.strip('\n ')
    article = article[:len(article)-4]
    base_path = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(base_path, '..', 'articles', article + '.html'))


# Gets absolute path from python folder
def get_folder_path(folder_name, file_name):
    base_path = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(base_path, folder_name, file_name))


# Gets absolute path from root folder.
def get_parent_folder_path(folder_name, file_name):
    base_path = os.path.dirname(__file__)
    return os.path.abspath(os.path.join(base_path, '..', folder_name, file_name))


# Writes a block of text to the specified file with the specified number of tabs
def write_text_block(out_file, text_array, indentation_level):
    # Get specified level of indentation
    tabs = ''
    for i in range(indentation_level):
        tabs += '\t'
    # Write text block to file
    for line in text_array:
        out_file.write(tabs + line)


# Gets the next non-empty line of text from the specified file
def get_next_line(in_file):
    while True:
        line = in_file.readline()
        if line == '\n':
            continue
        else:
            return line


# Gets the entire contents in the specified file
def get_file_text(import_file):
    with open(import_file, "r") as file:
        lines = file.readlines()
    return lines
