<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=900" />
<?php wp_head(); ?>
<style type="text/css">
	header div.placeholder h1 a,
	header div.placeholder h1 a:visited,
	footer a,
	footer a:visited,
	footer aside#sidebar ul li a,
	footer aside#sidebar ul li a:visited {
		color: #<?php echo get_theme_mod('enigma_2015_header_link_color', 'FAFAFA') ?>;
	}
	
	header div.placeholder span.description, 
	footer,
	footer h2 {
		color: #<?php header_textcolor() ?>;
	}

	header div.placeholder span.description {
		border-color: #<?php header_textcolor() ?>;
	}
</style>
</head>
<body <?php body_class(); ?>>
<a href="#primary_content" class="screen-reader-text"><?php _e('Skip to content', 'enigma-2015'); ?></a>
<a href="#primary_navigation" class="screen-reader-text"><?php _e('Skip to Navigation', 'enigma-2015'); ?></a>
<div id="wrapper">
<header role="banner">
	<div id="navigationwrapper" <?php echo ( get_user_meta( get_current_user_id(), 'show_admin_bar_front', true) ? ' style="margin-top: 31px;"' : '' ) ?>>
	<nav>
		<a id="hamburger" tabindex="0" data-icon="&#62259;" class="enigma-icon"><span class="screen-reader-text"><?php _e('Navigation', 'enigma-2015'); ?></span></a>
		<ul id="topnavigation"><li>
				<a href="#information" id="information_link" data-icon="&#62280;" class="enigma-icon"><span class="screen-reader-text hidden"><?php _e('Information', 'enigma-2015'); ?></span></a>
			</li><li>
				<a href="#" id="tag_link" data-icon="&#62243;" class="enigma-icon popover-link"><span class="screen-reader-text hidden"><?php _e('Tags', 'enigma-2015'); ?></span></a>
			</li><li><a href="#" id="category_link" data-icon="&#62232;" class="enigma-icon popover-link"><span class="screen-reader-text hidden"><?php _e('Category', 'enigma-2015'); ?></span></a>
			</li><li>
				<a href="#" id="search_link" data-icon="&#61817;" class="enigma-icon popover-link"><span class="screen-reader-text hidden"><?php _e('Search', 'enigma-2015'); ?></span></a>
			</li>
		</ul>
	</nav>
	</div>
	<div class="placeholder">
		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( get_header_image() ) : ?>
					<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<?php else : ?>
					<?php bloginfo('name'); ?>
				<?php endif; ?>
			</a>
		</h1>
		<span class="description"><?php bloginfo('description'); ?></span>
	</div>
	<div id="search-popover" class="popover" role="search">
		<div class="popover-header">
			<?php _e('Search', 'enigma-2015'); ?>
		</div>
		<div class="popover-content">
	   		<?php get_search_form(); ?>
		</div>
	</div>
	<div id="tag-popover" class="popover">
		<div class="popover-header">
			<?php _e('Tags', 'enigma-2015'); ?>
		</div>
		<div class="popover-content tag-cloud">
		   	<?php 
		   		wp_tag_cloud( array(
		   			'number' => 40
		   		) );
		   	?>
		</div>
	</div>
	<div id="category-popover" class="popover">
		<div class="popover-header">
			<?php _e('Categories', 'enigma-2015'); ?>
		</div>
		<div class="popover-content tag-cloud">
		   	<?php 
		   		wp_tag_cloud( array(
		   			'taxonomy' => 'category'
		   		) );
		   	?>
		</div>
	</div>
</header>
<section id="primary_content" role="main">
<h2 class="screen-reader-text hidden"><?php _e('Content', 'enigma-2015'); ?></h2>