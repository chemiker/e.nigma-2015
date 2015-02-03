</section>
<footer>
	<span class="category enigma-icon" data-icon="&#58895;" aria-hidden="true"></span>
	<div class="modifyme">
		<div id="information">
			<img src="<?php echo get_theme_mod('enigma_2015_information_image', get_template_directory_uri().'/screenshot.png'); ?>"
				alt="<?php echo bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
			<?php echo apply_filters( 'the_content', get_theme_mod('enigma_2015_information_about', __('Welcome to my blog', 'enigma-2015')) ); ?>
		</div>
	</div>
	<aside id="sidebar" role="complementary">
		<ul>
			<?php dynamic_sidebar('footer'); ?>
		</ul>
	</aside>
	<nav id="primary_navigation" role="navigation">
		<span class="category category-light enigma-icon" data-icon="&#xe608;" aria-hidden="true"></span>
		<?php wp_nav_menu( array(
			'theme_location' => 'main_menu',
			'container' => FALSE
			) ); ?>
		<hr />
		<span class="copyright">
			<?php _e('Powered by', 'enigma-2015'); ?> <a href="http://e.nigma.de">e.nigma</a> <?php _e('and', 'enigma-2015'); ?> <a href="https://wordpress.org">WordPress</a>
		</span>
	</nav>
	<?php wp_footer(); ?>
</footer>
</div>
</body>
</html>