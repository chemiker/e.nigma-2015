<?php
/**
 * Page template
 *
 * This is the tempalte for pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

the_post();
get_header();
?>

<article <?php post_class(); ?>>
	<div class="modifyme singlepage">
		<?php echo '<h2><a href="' . esc_html( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h2>'; ?>
		<hr class="before_content" />
		<?php the_content(); ?>
	</div>
</article>

<?php 
comments_template( '/comments.php', true );

if ( comments_open() ) :
	?>
	<div id="comment_form">
		<span class="category enigma-icon" data-icon="&#61697;"></span>
		<div id="comment_reply_form">
			<?php comment_form(); ?>
		</div>
	</div>
	<?php
endif;
get_sidebar();
get_footer();
