<?php
/**
 * Searchform
 *
 * This template is used to display the search form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

$form_id = wp_rand( 100, 999 );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s-<?php echo esc_attr( $form_id ); ?>">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'e.nigma-2015' ); ?></span>
		<input id="s-<?php echo esc_attr( $form_id ); ?>" type="search" class="search-field" placeholder="<?php echo esc_attr_e( 'Search &hellip;', 'e.nigma-2015' ); ?>" value="<?php echo esc_html( get_search_query() ); ?>" name="s" title="<?php echo esc_attr_e( 'Search for:', 'e.nigma-2015' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_e( 'Search', 'e.nigma-2015' ); ?>" />
</form>
