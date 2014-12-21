</section>
<footer>
	<?php dynamic_sidebar('information'); ?>
	<span class="category category-light enigma-icon" data-icon="&#58887;"></span>	
	<nav>
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