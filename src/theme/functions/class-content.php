<?php
/**
 * Content class
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

namespace enigma;

/**
 * Content class
 *
 * Prefetches content and provides it to the theme templates.
 */
class Content {
	/**
	 * Get_categories() fetches the post categories and provides them to the theme templates.
	 */
	public static function get_categories() {
		$categories = get_the_category_list( ', ' );

		if ( ! empty( $categories ) ) {
			$categories = sprintf(
				'<span class="screen-reader hidden">%s: </span><span class="post-meta-category">%s</span>',
				__( 'Category', 'e.nigma-2015' ),
				$categories
			);
			return $categories;
		}
	}

	/**
	 * Get_category_symbol() returns a symbol depending on the post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @return string
	 */
	private static function get_category_symbol( $format ) {
		$symbols = array(
			'link'    => '&#61699;',
			'audio'   => '&#61735;',
			'video'   => '&#62006;',
			'quote'   => '&#61730;',
			'aside'   => '&#61731;',
			'image'   => '&#62214;',
			'gallery' => '&#61793;',
			'chat'    => '&#61733;',
			'status'  => '&#61744;',
		);

		if ( ! $format || ! isset( $symbols[ $format ] ) || ! $symbols[ $format ] ) {
			return '&#61972;';
		}

		return $symbols[ $format ];
	}

	/**
	 * Get_headline() adjusts the post headline depending on the used post format.
	 *
	 * @param  string $format This is the format of the post.
	 * @return string
	 */
	private static function get_headline( $format ) {
		switch ( $format ) {
			case 'link':
				$link     = get_post_meta( get_the_ID(), '_format_link_url', true );
				$headline = sprintf(
					'<h2><a href="%s">%s<span class="link_arrow">%s</span></a></h2>',
					( $link ? $link : get_the_permalink() ),
					get_the_title(),
					( is_rtl() ? '&#x2190;' : '&#x2192;' )
				);
				break;
			default:
				$headline = '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
				break;
		}

		return $headline;
	}

	/**
	 * Get_meta() adjusts the meta of the post depending on the used post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @return string
	 */
	private static function get_meta( $format ) {
		switch ( $format ) {
			case 'quote':
			case 'link':
				$meta = '';
				break;
			default:
				$meta = sprintf(
					'<hr class="before_content" /><span class="screen-reader hidden">%s</span><span class="post-meta-date"><a href="%s">%s</a></span> %s',
					__( 'Published on:', 'e.nigma-2015' ),
					get_the_permalink(),
					get_the_date(),
					self::get_categories()
				);
				break;
		}

		return $meta;
	}

	/**
	 * Get_thumbnail() fetches the post thumbnail depending on the used post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @return string
	 */
	private static function get_thumbnail( $format ) {
		switch ( $format ) {
			case 'image':
				$thumbnail = '';
				break;
			default:
				$thumbnail = get_the_post_thumbnail();
				break;
		}

		return $thumbnail;
	}

	/**
	 * Get_text_for_archive_page() fetches the text for the archive page.
	 * 
	 * @return string
	 */
	private static function get_text_for_archive_page() {
		if ( ! is_single() && has_excerpt() ) {
			return get_the_excerpt();
		}

		return get_the_content(
			sprintf(
				// Translators: %s is replaced with the title of the post.
				__( 'Continue reading%s', 'e.nigma-2015' ),
				'<span class="screen-reader hidden">  ' . get_the_title() . '</span>&hellip;'
			)
		);
	}

	/**
	 * Get_content() adjusts the post content depending on the used post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @return string
	 */
	private static function get_content( $format ) {
		$content = self::get_text_for_archive_page();

		$oembed = wp_oembed_get(
			get_post_meta( get_the_ID(), '_format_' . $format . '_embed', true ),
			array( 'width' => 677 )
		);

		if ( 'video' === $format || 'audio' === $format ) {
			return ( $oembed ? $oembed : get_post_meta( get_the_ID(), '_format_' . $format . '_embed', true ) ) . $content;
		}

		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		if ( $featured_image && 'image' === $format ) {
			return '<img class="hide" src="' . $featured_image[0] . '" alt="' . get_the_title() . '" />' . $content;
		}

		return $content;
	}

	/**
	 * Get_class() returns CSS classes based on the post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @param  string $class CSS class.
	 * @return string
	 */
	private static function get_class( $format, $class = '' ) {
		if ( 'image' === $format && has_post_thumbnail() ) {
			$class = 'image-post-with-thumbnail';
		}

		return $class;
	}

	/**
	 * Get_class() returns CSS based on the post format.
	 * 
	 * @param  string $format This is the format of the post.
	 * @param  string $css CSS.
	 * @return string
	 */
	private static function get_css( $format, $css = '' ) {
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		if ( $featured_image && 'image' === $format ) {
			$css = "style=\"background-image: url( '" . $featured_image[0] . "' )\"";
		}

		return $css;
	}

	/**
	 * Get_post_vars() fetches all required information for a post and supplies it in an array.
	 * 
	 * @param  string $format This is the format of the post.
	 * @return array
	 */
	public static function get_post_vars( $format = '' ) {
		return array(
			'category_symbol' => self::get_category_symbol( $format ),
			'headline'        => self::get_headline( $format ),
			'meta'            => self::get_meta( $format ),
			'thumbnail'       => self::get_thumbnail( $format ),
			'css'             => self::get_css( $format ),
			'class'           => self::get_class( $format ),
			'content'         => self::get_content( $format ),
		);
	}
}
