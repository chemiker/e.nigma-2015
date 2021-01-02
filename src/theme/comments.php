<?php
/**
 * Comments
 *
 * This template is used to display comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage e.nigma-2015
 * @since e.nigma-2015 1.0.0
 */

if ( have_comments() ) : 
	?>
	<aside id="comments">
		<span class="category comment-category enigma-icon" data-icon="&#61733;" aria-hidden="true"></span>
		<div class="modifyme">
			<ol class="commentlist">
				<?php wp_list_comments( array( 'avatar_size' => 60 ) ); ?>
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
	<?php
endif;
