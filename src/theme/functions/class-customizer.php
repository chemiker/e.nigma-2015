<?php
/**
 * Customizer class
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

namespace enigma;

/**
 * Customizer class
 *
 * Provides all settings and functionalities for the Customizer.
 */
class Customizer {
	/**
	 * Register() registers all setting and fields used the WordPress Customizer.
	 * 
	 * @param  object $wp_customize WordPress Customizer Object.
	 */
	public static function register( $wp_customize ) {
		$wp_customize->add_setting(
			'enigma_2015_header_link_color',
			array(
				'default'              => 'FAFAFA',
				'type'                 => 'theme_mod',
				'sanitize_callback'    => array(
					'WP_Customize_Manager',
					'_sanitize_header_textcolor',
				),
				'sanitize_js_callback' => 'maybe_hash_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'enigma_2015_header_link_color',
				array(
					'label'    => __( 'Header Link Color', 'e.nigma-2015' ),
					'section'  => 'colors',
					'settings' => 'enigma_2015_header_link_color',
				)
			)
		);

		$wp_customize->add_section(
			'enigma_2015_information',
			array(
				'title'       => __( 'Information', 'e.nigma-2015' ),
				'description' => __( 'Displays a small about section in the footer of your blog.', 'e.nigma-2015' ),
				'priority'    => 120,
			)
		);

		$wp_customize->add_setting(
			'enigma_2015_information_about',
			array(
				'default'           => __( 'Welcome to my blog', 'e.nigma-2015' ),
				'type'              => 'theme_mod',
				'sanitize_callback' => function ( $input ) { return wp_kses_post( $input ); }
			)
		);

		$wp_customize->add_control(
			'enigma_2015_information_about',
			array(
				'label'    => __( 'About', 'e.nigma-2015' ),
				'type'     => 'textarea',
				'section'  => 'enigma_2015_information',
				'settings' => 'enigma_2015_information_about',
			)
		);

		$wp_customize->add_setting(
			'enigma_2015_information_image',
			array(
				'default'           => get_template_directory_uri() . '/screenshot.png',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'image',
				array(
					'label'    => __( 'Image', 'e.nigma-2015' ),
					'section'  => 'enigma_2015_information',
					'settings' => 'enigma_2015_information_image',
				)
			)
		);
	}
}
