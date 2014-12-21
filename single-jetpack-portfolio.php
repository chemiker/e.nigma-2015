<?php the_post(); ?>
<?php 
	get_header(); 
	$format = get_post_format();
	$post_vars = \enigma\Content::get_post_vars( $format );
?>

<article <?php post_class(); ?>>
	<div class="modifyme singlepage">
		<?php echo '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>'; ?>
		<?php echo $post_vars['thumbnail'] ?>
		<?php the_content(); ?>
	</div>
</article>

<?php get_sidebar(); ?>
<?php get_footer();