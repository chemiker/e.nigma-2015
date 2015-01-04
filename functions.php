<?php

require 'functions/content.php';
require 'functions/helper.php';
require 'functions/widgets.php';
require 'functions/customizer.php';

// Add support for Post formats
add_theme_support( 'post-formats', array( 'aside', 'link', 'video', 'audio', 'image', 'quote', 'gallery' ) );

// Auto-discovery feed in header
add_theme_support('automatic-feed-links');

// Article image support. http://codex.wordpress.org/Post_Thumbnails
add_theme_support('post-thumbnails');

// Set maximum article width to 677px
if ( ! isset( $content_width ) )
	$content_width = 584;

// Remove generator-tag for security reasons
remove_action('wp_head', 'wp_generator');

// Register Menu location(s)
register_nav_menus( array(
	'main_menu' => __( 'Main Menu', 'enigma' )
) );

// Add actions for customizer
add_action('customize_register', '\enigma\Customizer::register');

// Register Widget area(s)
add_action( 'widgets_init', '\enigma\Widgets::widgets_init' );

// Register comment-reply
add_action( 'comment_form_before', function () {
	wp_enqueue_script( 'comment-reply' );
});

// Fix invalid Video containers
add_filter('oembed_dataparse', function ( $return, $data, $url ) {
	return str_replace(' frameborder="0"', '', $return);
}, 90, 3 );

// Add next and number option to wp_link_pages()
add_filter('wp_link_pages_args','\enigma\Helper::add_next_and_number');

// Remove brackets from "more" link
add_filter( 'the_content_more_link', '\enigma\Content::remove_more_link_scroll' );

// Add page class to Post pages
add_filter('wp_link_pages_link', function ($link) {
	if ( strrpos($link, 'href') )
		return str_replace("href", "class='page' href", $link);

	return "<a href='".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]."' class=\"active page\">" . $link . "</a>";
});

// Register Scripts
function scripts_init() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-popover', get_template_directory_uri() . '/js/jquery.popover.js' );
	wp_enqueue_script( 'jquery-scrollupformenu', get_template_directory_uri() . '/js/jquery.scrollupformenu.js' );
	wp_enqueue_script( 'jquery-enigma', get_template_directory_uri() . '/js/jquery.enigma.js' );
}
add_action( 'wp_enqueue_scripts', 'scripts_init' );

// register Styles
function styles_init() {
	// Add main stylesheets
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-print', get_template_directory_uri() . '/css/print.css', array(), false, 'print' );
}
add_action( 'wp_enqueue_scripts', 'styles_init' );