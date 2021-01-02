<?php
/**
 * Widget class
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

namespace enigma;

/**
 * Widget class
 *
 * Provides function for registering the sidebar.
 */
class Widgets {
	/**
	 * Widgets_init() registers the sidebar.
	 */
	public static function widgets_init() {
		register_sidebar(
			array(
				'name' => __( 'Footer', 'e.nigma-2015' ),
				'id'   => 'footer',
			)
		);
	}
}
