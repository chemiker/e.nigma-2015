<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title(); ?></title>
<link rel="shortcut icon" href="<?php get_template_directory_uri(); ?>/img/favicon.png"  />
<link href="https://fonts.googleapis.com/css?family=Raleway:100%7CRoboto+Slab:400,700%7COpen+Sans:400italic,400,700" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
<meta name="viewport" content="width=900" />
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<header>
	<div id="navigationwrapper" <?php echo ( get_user_meta( get_current_user_id(), 'show_admin_bar_front', true) ? ' style="margin-top: 31px;"' : '' ) ?>>
	<nav>
		<a id="hamburger" title="Navigation" data-icon="&#58887;" class="enigma-icon"></a>
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
	<div id="search-popover" class="popover">
		<div class="popover-header">
			<?php _e('Search', 'default'); ?>
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
			<?php _e('Categories', 'default'); ?>
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
<section>