<?php
/**
 * Image template
 *
 * This template is called to display images.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

the_post();
get_header(); 

$format    = get_post_format();
$post_vars = \enigma\Content::get_post_vars( $format );
?>
	<article <?php post_class(); ?>  <?php echo esc_html( $post_vars['css'] ); ?>>
		<div>
			<?php echo esc_html( $post_vars['headline'] ); ?>
			<?php echo wp_get_attachment_image( $post->ID, 'full' ); ?>
			<?php echo esc_html( apply_filters( 'the_content', $post_vars['content'] ) ); ?>
		</div>
	</article>

<?php
get_sidebar();
get_footer();
