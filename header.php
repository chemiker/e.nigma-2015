<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<link href="https://fonts.googleapis.com/css?family=Raleway:100%7CRoboto+Slab:400,700%7COpen+Sans:400italic,400,700" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
<meta name="viewport" content="width=900" />
</head>
<body <?php body_class(); ?>>
<a href="#primary_content" class="screen-reader"><?php _e('Skip to content', 'enigma-2015'); ?></a>
<a href="#primary_navigation" class="screen-reader"><?php _e('Skip to Navigation', 'enigma-2015'); ?></a>
<div id="wrapper">
<header role="banner">
	<div id="navigationwrapper" <?php echo ( get_user_meta( get_current_user_id(), 'show_admin_bar_front', true) ? ' style="margin-top: 31px;"' : '' ) ?>>
	<nav role="complementary">
		<a id="hamburger" tabindex="0" data-icon="&#58887;" class="enigma-icon"><span class="screen-reader"><?php _e('Navigation', 'enigma-2015'); ?></span></a>
		<ul id="topnavigation"><li>
				<a href="#information" id="information_link" data-icon="&#58895;" class="enigma-icon"></a>
			</li><li>
				<a href="#" id="tag_link" data-icon="&#58884;" class="enigma-icon"></a>
			</li><li><a href="#" id="category_link" data-icon="&#58897;" class="enigma-icon"></a>
			</li><li>
				<a href="#" id="search_link" data-icon="&#58902;" class="enigma-icon"></a>
			</li>
		</ul>
	</nav>
	</div>
	<div class="placeholder">
		<h1>
			<a href="<?php echo home_url(); ?>">
				<?php bloginfo('name'); ?>
			</a>
		</h1>
		<span class="description"><?php bloginfo('description'); ?></span>
	</div>
	<div id="search-popover" class="popover" role="search">
		<div class="popover-header">
			<label for="s"><?php _e('Search', 'enigma-2015'); ?></label>
		</div>
		<div class="popover-content">
	   		<?php get_search_form(); ?>
		</div>
	</div>
	<div id="tag-popover" class="popover">
		<div class="popover-header">
			Tags
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
<h2 class="screen-reader hidden"><?php _e('Content', 'enigma-2015'); ?></h2>