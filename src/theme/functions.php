<?php
/**
 * Functions used by the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

require 'functions/class-content.php';
require 'functions/class-helper.php';
require 'functions/class-widgets.php';
require 'functions/class-customizer.php';

add_action(
	'after_setup_theme',
	function () {
		// Add support for Post formats.
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'link',
				'video',
				'audio',
				'image',
				'quote',
				'gallery',
				'chat',
				'status',
			) 
		);

		// Auto-discovery feed in header.
		add_theme_support( 'automatic-feed-links' );

		// Article image support.
		add_theme_support( 'post-thumbnails' );

		// Support Title-tag.
		add_theme_support( 'title-tag' );

		// Support Custom header and custom background image.
		add_theme_support(
			'custom-header',
			array(
				'default-text-color' => 'AAA',
				'height'             => 125,
			)
		);
		add_theme_support( 'custom-background', array( 'default-color' => '494949' ) );

		// Add support for HTML5 elements.
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'search-form',
				'gallery',
				'caption',
			)
		);

		// Textdomain.
		load_theme_textdomain( 'enigma-2015', '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages' );

		// Register Menu location(s).
		register_nav_menus( array( 'main_menu' => __( 'Main Menu', 'e.nigma-2015' ) ) );
	}
);

// Add editor style.
add_action(
	'admin_init',
	function () {
		add_editor_style( 'css/editor-style.min.css' );
	}
);

// Set maximum article width to 677px.
if ( ! isset( $content_width ) ) {
	$content_width = 584;
}

// Add actions for customizer.
add_action( 'customize_register', '\enigma\Customizer::register' );

// Register Widget area(s).
add_action( 'widgets_init', '\enigma\Widgets::widgets_init' );

// Register comment-reply.
add_action(
	'comment_form_before',
	function () {
		wp_enqueue_script( 'comment-reply' );
	}
);

// Add a wrapper for the "Read more" link.
add_action( 
	'the_content_more_link',
	function ( $link ) {
		return '<div class="center">' . $link . '</div>';
	},
	10,
	2
);

// Add page class to Post pages.
add_filter(
	'wp_link_pages_link',
	function ( $link ) {
		if ( strrpos( $link, 'href' ) ) {
			return str_replace( 'href', 'class="page" href', $link );
		}

		return '<a href="' . isset( $_SERVER['HTTP_HOST'] ) . isset( $_SERVER['REQUEST_URI'] ) . ' class="active page">' . $link . '</a>';
	}
);

// Fix invalid Video containers.
add_filter(
	'oembed_dataparse',
	function ( $return, $data, $url ) {
		return str_replace( ' frameborder="0"', '', $return );
	},
	90,
	3
);

// Add next and number option to wp_link_pages().
add_filter( 'wp_link_pages_args', '\enigma\Helper::add_next_and_number' );

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.2.4', true );
		wp_enqueue_script( 'jquery-scrollupformenu', get_template_directory_uri() . '/js/jquery.scrollupformenu.min.js', array( 'jquery' ), '1.2.4', true );
		wp_enqueue_script( 'jquery-enigma', get_template_directory_uri() . '/js/jquery.enigma.min.js', array( 'jquery' ), '1.2.4', true );
	}
);

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/screen.min.css', array( 'dashicons' ), '1.2.4', 'screen' );
		wp_enqueue_style( 'style-print', get_template_directory_uri() . '/css/print.min.css', array( 'dashicons' ), '1.2.4', 'print' );
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway:100%7CRoboto+Slab:400,700%7COpen+Sans:400italic,400,700', array(), '1.2.4' );
	}
);
