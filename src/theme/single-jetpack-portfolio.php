<?php
/**
 * Jetpack Portfolio
 *
 * This template is used to display single pages for the Jetpack Portfolio plugin.
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

<article <?php post_class(); ?>>
	<div class="modifyme singlepage">
		<?php
		echo '<h2><a href="' . esc_url( get_the_permalink() ) . '">' . get_the_title() . '</a></h2>';
		echo $post_vars['thumbnail'];
		the_content(); 
		?>
	</div>
	<?php
	previous_post_link( 
		'<span class="post-navigation previous-post">%link</span>', 
		'&laquo;<span class="screen-reader-text">%title</span>'
	);
	?>
	<?php
	next_post_link(
		'<span class="post-navigation next-post">%link</span>', 
		'&raquo;<span class="screen-reader-text">%title</span>'
	);
	?>
</article>

<?php 
get_sidebar();
get_footer();
