</section>
<footer>
	<div class="modifyme">
		<span class="category enigma-icon" data-icon="&#58895;"></span>
		<div id="information">
			<img src="<?php echo get_theme_mod('enigma_2015_information_image', get_template_directory_uri().'/screenshot.png'); ?>"
				alt="<?php echo bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
			<?php echo apply_filters( 'the_content', get_theme_mod('enigma_2015_information_about', __('Welcome to my blog', 'enigma')) ); ?>
		</div>
	</div>
	<aside id="sidebar">
		<ul>
			<?php dynamic_sidebar('footer'); ?>
		</ul>
	</aside>
	<nav>
		<span class="category category-light enigma-icon" data-icon="&#58887;"></span>
		<?php wp_nav_menu( array( 
			'theme_location' => 'main_menu',
			'container' => FALSE
			) ); ?>
		<hr />
		<span class="copyright">
			Powered by <a href="http://e.nigma.de">e.nigma</a> and <a href="https://wordpress.org">WordPress</a>
		</span>
	</nav>
	<?php wp_footer(); ?>
</footer>
</div>
</body>
</html>