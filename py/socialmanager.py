
social_header = '<div class="social_links">\n'
link_start = '\t<a href="'
link_middle = '" target="_blank">\n'
link_end = '\t</a>\n'
social_footer = '</div>\n'


def get_social_html(title, url):
    title = title.strip()
    url = url.strip()

    result = list()
    result.append(social_header)
    #result.append('<div>\n')
    # append facebook link
    result.append(link_start + get_facebook_link(url, title) + link_middle)
    result.append(get_facebook_image())
    result.append(link_end)

    # append twitter link
    result.append(link_start + get_google_link(url) + link_middle)
    result.append(get_google_image())
    result.append(link_end)

    # append google plus link
    result.append(link_start + get_stumble_link(url, title) + link_middle)
    result.append(get_stumble_image())
    result.append(link_end)

    # append stumble upon link
    result.append(link_start + get_twitter_link(url, title) + link_middle)
    result.append(get_twitter_image())
    result.append(link_end)

    result.append('<div class="clear"></div>\n')
    result.append(social_footer)
    return result


def get_facebook_link(url, title):
    return 'http://www.facebook.com/share.php?u=' + url + '&title=' + title


def get_twitter_link(url, title):
    return 'http://twitter.com/home?status=' + title + '+' + url


def get_google_link(url):
    return 'https://plus.google.com/share?url=' + url


def get_stumble_link(url, title):
    return 'http://www.stumbleupon.com/submit?url=' + url + '&title=' + title


def get_facebook_image():
    return '\t\t<img src="../_images/social/social_fb.png">\n'


def get_twitter_image():
    return '\t\t<img src="../_images/social/social_tw.png">\n'


def get_google_image():
    return '\t\t<img src="../_images/social/social_gp.png">\n'


def get_stumble_image():
    return '\t\t<img src="../_images/social/social_su.png">\n'