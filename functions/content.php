<?php

	namespace enigma;

	class Content {

		public static function searchform($randomize=false) {
			if ( $randomize ) {
				$seed = '-' . mt_rand();
			} else {
				$seed = '';
			}
			?>
			<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label for="s<?php echo $seed; ?>" class="screen-reader hidden"><?php _e('Search', 'enigma-2015'); ?></label>
				<input type="text" class="searchfield" name="s" id="s<?php echo $seed; ?>" placeholder="<?php _e('Search', 'enigma-2015'); ?>" />
			</form>
			<?php
		}

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
		            echo sprintf(' <a href="%s" %s>%d</a>',
		            		get_pagenum_link($i),
		            		($i == $page ? 'class="page active"' : 'class="page"'),
		            		$i
		            	);
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
				$categories .= sprintf('<a href="%s">%s</a>%s',
						get_category_link( $category->term_id ),
						$category->name,
						$spacer
					);
			}

			if ( ! empty($categories) ) {
				$categories = sprintf('<span class="screen-reader hidden">%s: </span><span class="post-meta-category">%s</span>',
						__('Category', 'enigma-2015'),
						$categories
					);
				return $categories;
			}
		}

		private static function get_category_symbol($format) {
			$symbols = array(
					'link' => '&#xe601;',
					'audio' => '&#xe602;',
					'video' => '&#xe604;',
					'quote' => '&#xe606;',
					'aside' => '&#xe60b;',
					'image' => '&#xe603;',
					'gallery' => '&#xe61d;',
					'chat' => '&#xe61e;'
				);

			if ( ! $format || ! isset($symbols[$format]) || ! $symbols[$format] )
				return '&#xe610;';

			return $symbols[$format];
		}

		private static function get_headline($format) {
			switch ($format) {
				case 'link' :
					$link = get_post_meta( get_the_ID(), '_format_link_url', true );
					$headline = sprintf('<h2><a href="%s">%s<span class="link_arrow">%s</span></a></h2>',
							( $link ? $link : get_the_permalink() ),
							get_the_title(),
							( is_rtl() ? '&#x2190;' : '&#x2192;' )
						);
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
				default :
					$meta = sprintf('<hr class="before_content" /><span class="screen-reader hidden">%s</span><span class="post-meta-date"><a href="%s">%s</a></span> %s',
							 __('Published on:', 'enigma-2015'),
							 get_the_permalink(),
							 get_the_date(),
							 self::get_categories()
						);
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

		private static function get_text_for_archive_page() {
			if ( ! is_single() && has_excerpt() )
				return get_the_excerpt();

			return get_the_content(
						sprintf(
								__( 'Continue reading%s', 'enigma-2015' ), 
								'<span class="screen-reader hidden">  '.get_the_title().'</span>&hellip;' 
							)
					);
		}

		private static function get_content($format) {
			$content = self::get_text_for_archive_page();
				
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
	}