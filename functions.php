<?php

// Add support for Post formats
add_theme_support( 'post-formats', array( 'aside', 'link', 'movie', 'quote', 'audio', 'image', 'gallery', 'quote' ) );

// Auto-discovery feed in header
add_theme_support('automatic-feed-links');

// Article image support. http://codex.wordpress.org/Post_Thumbnails
add_theme_support('post-thumbnails');

// Remove generator-tag for security reasons
remove_action('wp_head', 'wp_generator');

// Register Menu location(s)
register_nav_menus( array(
	'main_menu' => __( 'Main Menu', 'kickstart' )
	// ,'footer_menu' => __( 'Footer Menu', 'kickstart' )
) );

// enigma buttons
function buttons( $args=array() ) {

	if ( ! $args['label'] )
		$args['label'] = '';

	if ( ! $args['color'] )
		$args['color'] = 'default';

	if ( ! $args['link'] )
		$args['link'] = '#';

	return '<a href="' . $args['link'] . '" class="enigma-button enigma-button-' . $args['color'] . '">'
			. ( $args['icon'] ? '<span class="enigma-button-icon enigma-button-icon-' . $args['icon'] . '"></span>' : ' ' )
			. $args['label'] . '</a>';

}
add_shortcode( 'button', 'buttons' );

function scripts_init() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-popover', get_template_directory_uri() . '/js/jquery.popover.js' );
}
add_action( 'wp_enqueue_scripts', 'scripts_init' );


function styles_init() {
	// Add main stylesheets
	wp_enqueue_style( 'style-reset', get_template_directory_uri() . '/css/mini-reset.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-print', get_template_directory_uri() . '/css/print.css', array(), false, 'print' );
	wp_enqueue_style( 'jquery-popover', get_template_directory_uri() . '/css/jquery.popover.css' );
}
add_action( 'wp_enqueue_scripts', 'styles_init' );

?>
