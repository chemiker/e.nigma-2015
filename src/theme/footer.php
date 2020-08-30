</section>
<footer>
	<span class="category enigma-icon" data-icon="&#62280;" aria-hidden="true"></span>
	<div class="modifyme">
		<div id="information">
			<img src="<?php echo esc_attr( get_theme_mod('enigma_2015_information_image', get_template_directory_uri().'/screenshot.png') ); ?>"
				alt="<?php echo bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
			<?php echo apply_filters( 'the_content', get_theme_mod('enigma_2015_information_about', __('Welcome to my blog', 'e.nigma-2015')) ); ?>
		</div>
	</div>
	<aside id="sidebar" role="complementary">
		<ul>
			<?php dynamic_sidebar('footer'); ?>
		</ul>
	</aside>
	<nav id="primary_navigation" role="navigation">
		<span class="category category-light enigma-icon" data-icon="&#62259;" aria-hidden="true"></span>
		<?php wp_nav_menu( array(
			'theme_location' => 'main_menu',
			'container' => FALSE
			) ); ?>
		<hr />
		<span class="copyright">
			<?php esc_html_e('Powered by', 'e.nigma-2015'); ?> <a href="https://sciolism.de">e.nigma</a> <?php esc_html_e('and', 'e.nigma-2015'); ?> <a href="https://wordpress.org">WordPress</a>
		</span>
	</nav>
	<?php wp_footer(); ?>
</footer>
</div>
</body>
</html>
