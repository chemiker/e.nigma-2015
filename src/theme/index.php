<?php get_header(); ?>

<?php if (have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
	<?php
		$format = get_post_format();
		$post_vars = \enigma\Content::get_post_vars( $format );
	?>
	<article <?php post_class($post_vars['class']); ?>  <?php echo $post_vars['css'] ?>>
		<span class="category enigma-icon" data-icon="<?php echo $post_vars['category_symbol']; ?>"></span>
		<div class="modifyme">
			<?php echo $post_vars['headline']; ?>
			<?php echo $post_vars['thumbnail'] ?>
			<?php echo apply_filters( 'the_content', $post_vars['content'] ); ?>
			<div class="post-meta">
				<?php echo $post_vars['meta'];  if ( comments_open() ) : ?>
					<span class="post-meta-comments"><?php comments_popup_link(); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
<?php else : ?>
	<article <?php post_class(); ?>>
		<span class="category enigma-icon" data-icon="&#61817;" aria-hidden="true"></span>
		<div class="modifyme">
			<h2><?php esc_html_e('Couldn\'t find any articles!', 'e.nigma-2015'); ?></h2>
		</div>
	</article>
<?php endif; ?>

<?php
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) :
		?>
		<span class="category pagebar-category enigma-icon" data-icon="&#62256;"></span><div class="pagebar">
		<?php previous_posts_link(); \enigma\Content::Pagebar(); next_posts_link();	?> </div>
		<?php
	endif;
?>

<?php get_sidebar(); ?>
<?php get_footer();
