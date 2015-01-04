<?php

	namespace enigma;

	class Customizer {

		public static function register($wp_customize){
			
			$wp_customize->add_section('enigma_2015_information', array(
				'title' => __('Information', 'enigma'),
				'description' => __('Displays a small about section in the footer of your blog.', 'enigma'),
				'priority' => 120,
			));

			$wp_customize->add_setting('enigma_2015_information_about', array(
				'default' => __('Welcome to my blog', 'enigma'),
				'type' => 'theme_mod',
		 		'sanitize_callback' => function ($text) { return $text; }
			));
		 
			$wp_customize->add_control('enigma_2015_information_about', array(
				'label' => __('About', 'enigma'),
				'type' => 'textarea',
				'section' => 'enigma_2015_information',
				'settings' => 'enigma_2015_information_about'
			));

			$wp_customize->add_setting('enigma_2015_information_image', array(
				'default' =>  get_template_directory_uri().'/screenshot.png',
				'type' => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw'
			));
			
		    $wp_customize->add_control( new \WP_Customize_Image_Control($wp_customize, 'image', array(
				'label'    => __('Image', 'default'),
				'section'  => 'enigma_2015_information',
				'settings' => 'enigma_2015_information_image',
			)));
		}

	}