<?php

	namespace enigma;

	class Content {

		// Pagebar Clone
		// Originally created by Sergej Müller
		public static function pagebar($displayedpages=6) {
			global $wp_query;
		    $max_num_pages = $wp_query->max_num_pages;

		    if ($max_num_pages <= 1) {
		        return;
		    }

		    $page  = (int) get_query_var('paged');
		    $roundedrange  = ceil($displayedpages / 2);

		    if (! $page) {
		        $page = 1;
		    }

		    if ($max_num_pages > $displayedpages) {
		        if ($page <= $displayedpages) {
		            $min = 1;
		            $max = $displayedpages + 1;
		        } elseif ($page >= ($max_num_pages - $roundedrange)) {
		            $min = $max_num_pages - $displayedpages;
		            $max = $max_num_pages;
		        } elseif ($page >= $displayedpages && $page < ($max_num_pages - $roundedrange)) {
		            $min = $page - $roundedrange;
		            $max = $page + $roundedrange;
		        }
		    } else {
		        $min = 1;
		        $max = $max_num_pages;
		    }

		    if (! empty($min) && ! empty($max)) {
		        for ($i = $min; $i <= $max; $i++) {
		            echo sprintf(' <a href="%s" %s>%d</a>', get_pagenum_link($i), ($i == $page ? 'class="page active"' : 'class="page"'), $i);
		        }
		    }
		}

		// Get Categories
		public static function get_categories() {
			$thecategories = get_the_category();
			$numberofcategories = count( $thecategories );
			$categories = '';

			foreach ( $thecategories as $categorienumber => $category ) {
				if ( $categorienumber == $numberofcategories - 1 ) {
					$spacer = '';
				} else {
					$spacer = ', ';
				}
				$categories .= '<a href="' . get_category_link( $category->term_id ) . '">' .$category->name . '</a>' . $spacer;
			}

			if ( ! empty($categories) ) {
				$categories = '<span class="hidden">'.__('Category').': </span><span class="post-meta-category">' . $categories . '</span>';
				return $categories;
			}
		}

		private static function get_category_symbol($format) {
			$symbols = array(
					'link' => '&#58880;',
					'audio' => '&#58881;',
					'video' => '&#58883;',
					'quote' => '&#58885;',
					'aside' => '&#58891;',
					'image' => '&#58882;',
					'gallery' => '&#58904;'
				);

			if ( ! $format || ! isset($symbols[$format]) || ! $symbols[$format] )
				return '&#58896;';

			return $symbols[$format];
		}

		private static function get_headline($format) {
			switch ($format) {
				case 'link' :
					$link = get_post_meta( get_the_ID(), '_format_link_url', true );
					$headline = '<h2><a href="' . ( $link ? $link : get_the_permalink() ) . '">' . get_the_title() . '<span class="link_arrow">&#x2192;</span></a></h2>';
				break;
				default :
					$headline = '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
				break;
			}

			return $headline;
		}

		private static function get_meta($format) {
			switch ($format) {
				case 'quote' : case 'link' :
					$meta = '';
				break;
				case 'image' :
					$meta = '<span class="hidden">'
						. __('Published on:', 'default')
						. ' </span><span class="post-meta-date">'
						. get_the_date() .'</a></span>'
						. self::get_categories();
				break;
				default :
					$meta = '<hr class="before_content" /><span class="hidden">'
						. __('Published on:', 'default').' </span><span class="post-meta-date"><a href="'
						. get_the_permalink().'">'
						. get_the_date() .'</a></span>'
						. self::get_categories();
				break;
			}

			return $meta;
		}

		private static function get_thumbnail($format) {
			switch ($format) {
				case 'image':
					$thumbnail = '';
				break;
				default:
					$thumbnail = get_the_post_thumbnail();
				break;
			}

			return $thumbnail;
		}

		private static function get_content($format) {
			if ( is_archive() && has_excerpt() ) {
				$content = get_the_excerpt();
			} else {
				$content = get_the_content();
			}
				
			$oembed = wp_oembed_get( 
						get_post_meta( get_the_ID(), '_format_'.$format.'_embed', true ),
						array( 'width' => 677 )
					);

			if ($format == 'video' || $format == 'audio')
				return ( $oembed ? $oembed : get_post_meta( get_the_ID(), '_format_'.$format.'_embed', true ) ) . $content;
			
			if ($format == 'image' && $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ))
				return '<img class="hide" src="'.$featured_image[0].'" alt="'.get_the_title().'" />' . $content;

			return $content;
		}

		private static function get_class($format, $class='') {
			if ( $format == 'image' && has_post_thumbnail() )
				$class = "image-post-with-thumbnail";

			return $class;
		}

		private static function get_css($format, $css='') {
			if ( $format == 'image' && $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) )
				$css = "style=\"background-image: url('".$featured_image[0]."')\"";
			
			return $css;
		}

		// Get things for the post types…
		public static function get_post_vars( $format = '' ) {
			return array(
					'category_symbol' => self::get_category_symbol($format),
					'headline' => self::get_headline($format),
					'meta' => self::get_meta($format),
					'thumbnail' => self::get_thumbnail($format),
					'css' => self::get_css($format),
					'class' => self::get_class($format),
					'content' => self::get_content($format)
				);
		}

		// Customize "read-more button"
		// We remove those uggly brackets here!
		public static function remove_more_link_scroll( $link ) {
			$link = str_replace('(', '', $link);
			$link = str_replace(')', '', $link);
			$link = str_replace("&#160;&hellip;", '&hellip;', $link);
			return $link;
		}

	}