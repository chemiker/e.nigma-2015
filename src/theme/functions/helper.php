<?php

	namespace enigma;

	class Helper {

		// Add Next and number hack
		// Originally found at http://www.velvetblues.com/web-development-blog/wordpress-number-next-previous-links-wp_link_pages/
		public static function add_next_and_number($args){
			global $page, $numpages, $multipage, $more;

			if ( ! $multipage || ! $more || $args['next_or_number'] !== 'next_and_number' )
				return $args;

			$args['next_or_number'] = 'number';
			$prev = $next = '';

			$i = $page - 1;
			$prev .= _wp_link_page($i);
			$prev .= $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';

			$i = $page + 1;
			if ( $i <= $numpages ) {
				$next .= _wp_link_page($i);
				$next .= $args['link_before']. $args['nextpagelink'] . $args['link_after'] . '</a>';
			}

			$args['before'] = $args['before'] . ( $page == 1 ? '' : $prev );
			$args['after'] = $next . $args['after'];    

			return $args;
		}

	}