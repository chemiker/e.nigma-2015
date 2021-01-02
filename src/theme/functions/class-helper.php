<?php
/**
 * Helper class
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
class Helper {
	/**
	 * Add_next_and_number() changes the appearance of pagelinks, originally found at http://www.velvetblues.com/web-development-blog/wordpress-number-next-previous-links-wp_link_pages/
	 * 
	 * @param array $args Arguments such as previouspagelink etc..
	 */
	public static function add_next_and_number( $args ) {
		global $page, $numpages, $multipage, $more;

		if ( ! $multipage || ! $more || 'next_and_number' !== $args['next_or_number'] ) {
			return $args;
		}

		$args['next_or_number'] = 'number';
		$prev                   = ''; 
		$next                   = '';

		$i     = $page - 1;
		$prev .= _wp_link_page( $i );
		$prev .= $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';

		$i = $page + 1;
		if ( $i <= $numpages ) {
			$next .= _wp_link_page( $i );
			$next .= $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>';
		}

		$args['before'] = $args['before'] . ( 1 === $page ? '' : $prev );
		$args['after']  = $next . $args['after'];    

		return $args;
	}
}
