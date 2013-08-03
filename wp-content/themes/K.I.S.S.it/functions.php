<?php
/**
 * K.I.S.S.it functions and definitions
 *
 * @package K.I.S.S.it
 * @since K.I.S.S.it 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ){
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'k_i_s_s_it_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function k_i_s_s_it_setup() {
    /**
    * Custom template tags for this theme
    **/
    require(get_template_directory().'/inc/template-tags.php');
    
    /*
     * Custom functions that act independently of the theme templates
     */
    require(get_template_directory().'/inc/tweaks.php');
    
    /**
     * Make theme available for translation
     * Translations can be filled in the /languages/ directory
     */
    load_theme_textdomain('k_i_s_s_it', get_template_directory().'/languages');
    
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support('post-formats', array('aside'));
    
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus(array(
        'primary'=>__('Primary Menu', 'k_i_s_s_it'),
    ));
}
endif; // k_i_s_s_it_setup
add_action( 'after_setup_theme', 'k_i_s_s_it_setup' );

/**
 * Enqueue scripts and styles
 */
function k_i_s_s_it_scripts(){
    wp_enqueue_style('style', get_stylesheet_uri());
    
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment_reply');
    }
    
    wp_enqueue_script('navigation', get_template_directory_uri().'/js/navigation.js', array(), '20120206', true);
    
    if(is_singular() && wp_attachment_is_image()){
        wp_enqueue_script('keyboard-image-navigation', get_template_directory_uri().'/js/keyboard-image-navigation.js', array('jquery'), '20120202');
    }
}
add_action('wp_enqueue_scripts', 'k_i_s_s_it_scripts');