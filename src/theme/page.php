<?php the_post(); ?>
<?php get_header(); ?>

<article <?php post_class(); ?>>
	<div class="modifyme singlepage">
		<?php echo '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>'; ?>
		<hr class="before_content" />
		<?php the_content(); ?>
	</div>
</article>

<?php 
	comments_template( '/comments.php', true );

	if ( comments_open() ) : ?>
		<div id="comment_form">
			<span class="category enigma-icon" data-icon="&#61697;"></span>
			<div id="comment_reply_form">
			<?php 
				comment_form();
			?>
			</div>
		</div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer();