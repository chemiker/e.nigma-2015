<?php the_post(); ?>
<?php get_header(); ?>

<?php
	global $numpages;
	$format = get_post_format();
	$post_vars = \enigma\Content::get_post_vars( $format );
?>
<article <?php post_class(); ?>  <?php echo $post_vars['css'] ?>>
	<div class="modifyme single-page">
		<span class="category enigma-icon" data-icon="<?php echo $post_vars['category_symbol']; ?>"></span>
		<?php echo $post_vars['headline']; ?>
		<?php echo $post_vars['thumbnail'] ?>
		<?php echo apply_filters( 'the_content', $post_vars['content'] ); ?>
		<?php
			if ( $numpages > 1 ) :
		?>
		<div class="pagebar sitepages">
		<?php
		    wp_link_pages(array(
		        'before' =>  '',
		        'after' => '',
		        'nextpagelink' => __('Next Page &raquo;', 'default'),
		        'previouspagelink' => __('&laquo; Previous Page', 'default'),
		        'next_or_number' => 'next_and_number',
		        'pagelink' => '%',
		        'echo' => 1 )
		    );
		?>
		</div>
		<?php
			endif; 
		?>
		<div class="post-meta">
			<div class="tags">
				<?php the_tags( '', '', '' ); ?>
			</div>
			<?php echo $post_vars['meta']; ?>
		</div>
	</div>
</article>

<?php 
	comments_template( '/comments.php', true ); 

	if ( comments_open() ) : ?>
		<div id="comment_form">
			<span class="category enigma-icon" data-icon="&#58892;"></span>
			<?php 
				comment_form();
			?>
		</div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer();