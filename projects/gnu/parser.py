
in_file = "libc/index_min.html"
out_file = "index.html"
str_token = "&nbsp;&nbsp;&nbsp;&nbsp;"
token_len = len(str_token)

with open(in_file, "r") as in_src:
    lines = in_src.readlines()
    with open(out_file, "w") as out_src:
        insert_str = ""
        for line in lines:
            line = line.strip(" ")
            if line.startswith("<ul>"):
                insert_str += str_token
            elif line.startswith("</li></ul>"):
                insert_str = insert_str[:len(insert_str) - token_len]
            elif line.startswith("<li>"):
                index = 4
                line = line[:index] + insert_str + line[index:]
            out_src.write(line)