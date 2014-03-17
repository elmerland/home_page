/*jslint browser: true, devel: true, indent: 4 */
/*global $ */

var page_header_div;
var page_header;
var page_nav;
var article_sidebar;
var article_content;
var section_list;
var outline_list;
var active_section = -1;
var sidebar_threshold = 300;
var window_threshold = 780;
var section_offset = 50;
var shadow_class = 'shadow';
var fixed_class = 'fixed';
var active_class = 'active';
var fade_duration = 250;

function updateActive(scroll_pos) {
    "use strict";
    var i = 0, section_top, section_bottom;
    // Determine if active section has changed
    for (i; i < section_list.length; i += 1) {
        section_top = $(section_list[i]).offset().top - section_offset;
        section_bottom = section_top + $(section_list[i]).height();
        if (scroll_pos >= section_top && scroll_pos < section_bottom) {
            $(outline_list[i]).addClass(active_class);
            $(outline_list[i]).children('ul').children('li').show(fade_duration);
        } else {
            $(outline_list[i]).removeClass(active_class);
            $(outline_list[i]).children('ul').children('li').hide(fade_duration);
        }
    }
}

// Scrolls until it reaches the element with the specified id.
function scrollToAnchor(aid) {
    "use strict";
    var aTag = $(aid), scroll_pos = aTag.offset().top - section_offset + 2;
    $("html,body").scrollTop(scroll_pos);
    updateActive(scroll_pos);
}

function scrollHandler(event) {
    "use strict";
    // Get scroll distance from top
    var scroll_pos = $('body').scrollTop();
    
    // Set shadow class to article header
    if (scroll_pos === 0) {
        if (page_header_div.hasClass(shadow_class)) {
            page_header_div.removeClass(shadow_class);
        }
    } else if (scroll_pos !== 0 && !page_header_div.hasClass(shadow_class)) {
        page_header_div.addClass(shadow_class);
    }
    
    // Set fixed class to article sidebar (outline)
    if (scroll_pos >= sidebar_threshold) {
        if (!article_sidebar.hasClass(fixed_class)) {
            article_sidebar.addClass(fixed_class);
        }
    } else {
        if (article_sidebar.hasClass(fixed_class)) {
            article_sidebar.removeClass(fixed_class);
        }
    }
    
    updateActive(scroll_pos);
}

function click_handler(event) {
    "use strict";
    event.preventDefault();
    var href = $(event.target).attr("href");
    scrollToAnchor(href);
    console.log("Click");
}

function resize_handler(event) {
    "use strict";
    var viewport_width = $(window).width();
    if (viewport_width < window_threshold && article_sidebar.css('display') === 'block') {
        article_sidebar.hide();
        page_nav.hide();
        article_content.addClass("center");
    } else if (viewport_width >= window_threshold && article_sidebar.css('display') === 'none') {
        article_sidebar.show();
        page_nav.show();
        article_content.removeClass("center");
    }
}

function self_link_hover_in(event) {
    "use strict";
    $(event.currentTarget).children('.self_link').fadeTo(100, 1);
}

function self_link_hover_out(event) {
    "use strict";
    $(event.currentTarget).children('.self_link').fadeTo(100, 0);
}

function sidebar_hover_in(event) {
    "use strict";
    var target = $(event.currentTarget);
    if (!target.hasClass(active_class)) {
        target.children('ul').children('li').show(fade_duration);
    }
}

function sidebar_hover_out(event) {
    "use strict";
    var sub_sections = $('.outline li'), i = 0, temp;
    for (i; i < sub_sections.length; i += 1) {
        temp = $(sub_sections[i]);
        if (!temp.hasClass(active_class)) {
            temp.children('ul').children('li').hide(fade_duration);
        }
    }
}

$(document).ready(function () {
    "use strict";
    // Get page elements
    // ------------------------------------------------------------------------
    // Get page header elements
    page_header_div = $('.pageHeader > div');
    page_header = $('.pageHeader');
    // Get page navgation
    page_nav = $('.pageNav');
    // Get article sidebard
    article_sidebar = $('.outline');
    // Get article sidebar element list
    outline_list = $('.outline li');
    // Get article content
    article_content = $('.content');
    // Get article section list.
    section_list = $('.content > section, .content > section section');
    
    // Set initial conditions
    // ------------------------------------------------------------------------
    // Initialy hide all sidebar subsections
    $('.outline li li').hide();
    // Add hover handlers for sidebar elements
    outline_list.mouseenter(sidebar_hover_in);
    $('.outline > ul').mouseleave(sidebar_hover_out);
    // Add hover handler for article section titles
    $('.section_title').hover(self_link_hover_in, self_link_hover_out);
    
    // Set event handlers
    // ------------------------------------------------------------------------
	// Add a scroll event to trigger actions for sidebar and page header
	$(window).on("scroll", scrollHandler);
    // Add click handler for sidebar
    $('.outline ul li').on("click", "a", click_handler);
    // Add click handler for self links
    $('.content .self_link').on("click", click_handler);
    // Add resize event handler.
    resize_handler();
    $(window).resize(resize_handler);
});
