<?php
/**
 * Single post template
 *
 * This template is called if a a post is shown in single view. I.e. by visiting the post URL.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

the_post();
get_header();

global $numpages;
$format    = get_post_format();
$post_vars = \enigma\Content::get_post_vars( $format );
?>
<article <?php post_class( $post_vars['class'] ); ?>  <?php echo $post_vars['css']; ?>>
	<span class="category enigma-icon" data-icon="<?php echo esc_html( $post_vars['category_symbol'] ); ?>" aria-hidden="true"></span>
	<div class="modifyme single-page">
		<?php echo $post_vars['headline']; ?>
		<?php echo $post_vars['thumbnail']; ?>
		<?php echo apply_filters( 'the_content', $post_vars['content'] ); ?>
		<?php if ( $numpages > 1 ) : ?>
		<div class="pagebar sitepages">
			<?php wp_link_pages(); ?>
		</div>
		<?php endif; ?>
		<div class="post-meta">
			<div class="tags">
				<?php the_tags( '', '', '' ); ?>
			</div>
			<?php echo $post_vars['meta']; ?>
		</div>
		<?php
		previous_post_link(
			'<span class="post-navigation previous-post">%link</span>',
			'&laquo;<span class="screen-reader-text">%title</span>'
		);
		next_post_link(
			'<span class="post-navigation next-post">%link</span>',
			'&raquo;<span class="screen-reader-text">%title</span>'
		);
		?>
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
<?php endif; ?>

<?php
get_sidebar();
get_footer();
