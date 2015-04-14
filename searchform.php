<?php $form_id = rand( 100, 999 ); ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s-<?php echo $form_id; ?>">
		<span class="screen-reader-text"><?php  __( 'Search for:', 'enigma-2015' ) ?></span>
		<input id="s-<?php echo $form_id; ?>" type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search &hellip;', 'e.nigma-2015' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr( 'Search for:', 'e.nigma-2015' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr( 'Search', 'e.nigma-2015' ) ?>" />
</form>