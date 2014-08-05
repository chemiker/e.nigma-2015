<?php the_post(); ?>
<?php get_header(); ?>

<article <?php post_class(); ?>>
	<div class="modifyme singlepage">
		<?php echo '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>'; ?>
		<?php the_content( 'Weiterlesen…' ); ?>
	</div>
</article>
<?php do_action( 'art_direction' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>