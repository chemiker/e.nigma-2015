<?php the_post(); ?>
<?php get_header(); ?>

<?php 
	$format = get_post_format();
	$post_vars = \enigma\Content::get_post_vars( $format );
?>
	<article <?php post_class(); ?>  <?php echo $post_vars['css'] ?>>
		<div>
			<?php echo $post_vars['headline']; ?>
			<?php echo wp_get_attachment_image( $post->ID, 'full' ); ?>
			<?php echo apply_filters( 'the_content', $post_vars['content'] ); ?>
		</div>
	</article>

<?php get_sidebar(); ?>
<?php get_footer();