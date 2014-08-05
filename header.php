<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php
		global $page, $paged;
		wp_title('|', true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) { echo " | $site_description"; }
		if ( $paged >= 2 || $page >= 2 ) { echo ' | ' . sprintf('Page %s', max($paged, $page)); }
		?></title>
	<script>document.documentElement.className += " js";</script>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/vnd.microsoft.icon" />
	<link href='http://fonts.googleapis.com/css?family=Trocchi:400|Droid+Sans:400,700|Raleway:400,100,200,300' rel='stylesheet' type='text/css' />
	<?php wp_head(); ?>
	<script type="text/javascript">
		(function($) {
			$( document ).ready( function() {
				$('#search_link').popover({
					header: '#search-popover > .popover-header',
					content: '#search-popover > .popover-content',
					preventLeft: true,
					preventTop: true,
					preventRight: true
				});

				$('#tag_link').popover({
					header: '#tag-popover > .popover-header',
					content: '#tag-popover > .popover-content',
					preventLeft: true,
					preventTop: true,
					preventRight: true
				});

				$("#hamburger").on( 'click', function() {
					$(this).hide();
					$("#topnavigation").fadeIn();
					$("#topnavigation").delay( 20000 ).fadeOut();
					$(this).delay( 20790 ).fadeIn();
					$(".popover").delay( 20000 ).fadeOut();
				} );

				$("#wrapper").on( 'scroll', function() {
					$(".popover").hide();
				} );
			} );
		}(jQuery));
	</script>
</head>

<!--[if lt IE 7]><body <?php body_class('ie7 ie6'); ?>><![endif]-->
<!--[if IE 7]><body <?php body_class('ie7'); ?>><![endif]-->
<!--[if gt IE 7]><body <?php body_class(); ?>><![endif]-->
<!--[if !IE]><!--><body <?php body_class(); ?>><!-- <![endif]-->

<div id="wrapper">
<header>
	<nav>
		<a id="hamburger" href="#" title="Navigation">&#58887;</a>
		<ul id="topnavigation">
			<li>
				<a href="#information">&#58895;</a>
			</li>
			<li>
				<a href="#" id="tag_link">&#58884;</a>
			</li>
			<li>
				<a href="#" id="search_link">&#58902;</a>
			</li>
		</ul>
	</nav>
	<div class="picture-placeholder">

		<h1>
			<a href="<?php echo home_url(); ?>">
				<?php bloginfo('name'); ?>
			</a>
		</h1>
		<span class="description"><?php bloginfo('description'); ?></span>
	</div>
	<div id="search-popover" class="popover">
		<div class="popover-header">
			Suche
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
</header>

<section>