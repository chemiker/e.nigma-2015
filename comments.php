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
					<div class="pagebar comment">
						<?php paginate_comments_links(); ?>
					</div>
				</li>
			</ol>
		</div>
	</aside>
<?php endif;