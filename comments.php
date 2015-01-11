<?php if ( have_comments() ) : ?>
	<aside id="comments">
		<span class="category comment-category enigma-icon" data-icon="&#xe61e;"></span>
		<div class="modifyme">
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