
</section>
<footer id="information">
	<div class="modifyme">
		<span class="category">
			&#58895;
		</span>
		<div id="information">
			<img src="http://enigma.local/wp-content/themes/e.nigma2015/img/profil.jpg" alt="Ich bin Alex." />
			<p>
				Moin! Ich bin Alex und betreibe dieses Blog. Wenn ich gerade einmal nicht programmiere oder podcaste, gehe ich meiner Tätigkeit als Chemiker nach.
			</p>
		</div>
		<p>
			<?php echo apply_filters( 'the_content', 
				'[button color="white" link="asd" icon="rss" label="Feed"] ' .
				'[button color="white" link="asd" icon="twitter" label="Twitter"] ' .
				'[button color="white" link="asd" icon="adn" label="App.net"] ' . 
				'[button color="white" link="asd" icon="github" label="Github"]'
			 );?>
		</p>
	</div>
	<span class="category category-light" style="top: 34px;">
		&#58887;
	</span>
	<nav>
		<?php wp_nav_menu( array( 
			'theme_location' => 'main_menu',
			'container' => FALSE
			) ); ?>
	</nav>
	<?php wp_footer(); ?>
</footer>
</div>
</body>
</html>