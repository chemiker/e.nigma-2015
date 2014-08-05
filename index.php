<?php get_header(); ?>

<?php if (have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
	<?php 
		$format = get_post_format();

		if ( ! $format )
			$format = '';

		// Set Category Symbol
		switch ( $format ) {
			case 'link' :
				$category_symbol = '&#58880;';
			break;
			case 'audio' :
				$category_symbol = '&#58881;';
			break;
			case 'video' :
				$category_symbol = '&#58883;';
			break;
			case 'quote' :
				$category_symbol = '&#58885;';
			break;
			case 'aside' :
				$category_symbol = '&#58891;';
			break;
			case 'image' :
				$category_symbol = '&#58882;';
			break;
			default :
				$category_symbol = '&#58896;';
			break;
		}

		// Adjust Headline
		switch ( $format ) {
			case 'link' :
				$headline = '<h2><a href="' . get_post_meta( get_the_ID(), '_format_link_url', true ) . '">' . get_the_title() . '<span class="link_arrow">&#x2192;</span></a></h2>';
			break;
			case 'quote' :
				$headline = NULL;
			break;
			default :
				$headline = '<h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
			break;
		}
	?>
	<article <?php post_class(); ?>>
		<div class="modifyme">
			<span class="category">
				<?php echo $category_symbol; ?>
			</span>
			<?php echo $headline; ?>
			<?php the_content( 'Weiterlesen…' ); ?>
		</div>
	</article>
	<?php do_action( 'art_direction' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<h2>Couldn’t find any articles!</h2>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>