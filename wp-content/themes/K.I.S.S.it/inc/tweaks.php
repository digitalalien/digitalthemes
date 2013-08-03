<?php
/**
 * Custom functions that act independently of the theme templates
 * @package K.I.S.S.it
 * @since K.I.S.S.it 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
 */
function k_i_s_s_it_page_menu_args($args){
    $args['show_home'] = true;
    return $args;
}
add_filter('wp_page_menu_args', 'k_i_s_s_it_page_menu_args');

/**
 * Adds custom classes to the array body classes
 */
function k_i_s_s_it_body_classes($classes){
    //adds a class of group-blog to blogs with more than 1 published author
    if(is_multi_author()){
        $classes[] = 'group-blog';
    }
    return $classes;
}
add_filter('body_class', 'k_i_s_s_it_body_classes');

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image
 */
function k_i_s_s_it_enhanced_image_navigation($url, $id){
    if(!is_attachment() && !wp_attachment_is_image($id)){
        return $url;
    }
    $image = get_post($id);
    if(!empty($image->post_parent) && $image->post_parent != $id){
        $url .= '#main';
    }
    return $url;
}
add_filter('attachment_link', 'k_i_s_s_it_enhanced_image_navigation', 10, 2);