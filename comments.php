<?php if ( have_comments() ) : ?>
	<aside id="comments">
		<div class="modifyme">
			<span class="category comment-category enigma-icon" data-icon="&#58905;"></span>
			<ol class="commentlist">
				<?php
					wp_list_comments(array(
						'avatar_size' => 60
					));
				?>
				<li>
					<?php if ( get_option( 'page_comments' ) ) : ?>
					<div class="pagebar comment">
						<?php paginate_comments_links(); ?>
					</div>
					<?php endif; ?>
				</li>
			</ol>
		</div>
	</aside>
<?php endif;