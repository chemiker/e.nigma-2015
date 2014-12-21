<?php

	namespace enigma;

	class Widgets {

		public static function widgets_init() {
			register_sidebar(array(
				'name' => __('Information', 'enigma'),
				'id' => 'information'
			));
		}

	}

	// Podcast Network RSS Widget
	class Enigma_Info_Widget extends \WP_Widget {

		public function __construct() {
			parent::__construct(
						'podkasten_podcast_network_rss_widget',
						__('e.nigma Infotext', 'podkasten'),
						array( 'description' => __( 'Will be used to display a nice infotext in the footer of your blog.', 'podkasten' ), )
					);
		}

		public function widget( $args, $instance ) {
			?>
			<div class="modifyme">
				<span class="category enigma-icon" data-icon="&#58895;"></span>
				<div id="information">
					<img src="<?php echo ( isset( $_SERVER['HTTPS'] ) ? str_replace('http:', 'https:', $instance['picture']) : $instance['picture'] ); ?>" alt="<?php echo $instance['picture_description']; ?>" title="<?php echo $instance['picture_description']; ?>" />
					<?php echo apply_filters( 'the_content', $instance['infotext'] ); ?>
				</div>
			</div>
			<?php
		}

		public function form( $instance ) {
			$infotext = ( isset( $instance[ 'infotext' ] ) ? $instance[ 'infotext' ]  : '' );
			$picture = ( isset( $instance[ 'picture' ] ) ? $instance[ 'picture' ]  : '' );
			$picture_description = ( isset( $instance[ 'picture_description' ] ) ? $instance[ 'picture_description' ]  : '' );
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'picture' ); ?>"><?php _e( 'Picture', 'podkasten' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'picture' ); ?>"
					      name="<?php echo $this->get_field_name( 'picture' ); ?>" value="<?php echo $picture; ?>" />
				<label for="<?php echo $this->get_field_id( 'picture_description' ); ?>"><?php _e( 'Picture Title', 'podkasten' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'picture_description' ); ?>"
					      name="<?php echo $this->get_field_name( 'picture_description' ); ?>" value="<?php echo $picture_description; ?>" />				      
				<label for="<?php echo $this->get_field_id( 'infotext' ); ?>"><?php _e( 'Infotext', 'podkasten' ); ?></label> 
				<textarea class="widefat" rows="10" id="<?php echo $this->get_field_id( 'infotext' ); ?>"
					      name="<?php echo $this->get_field_name( 'infotext' ); ?>"><?php echo $infotext; ?></textarea>
			</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['infotext'] = ( ! empty( $new_instance['infotext'] ) ) ? $new_instance['infotext'] : '';
			$instance['picture'] = ( ! empty( $new_instance['picture'] ) ) ? strip_tags( $new_instance['picture'] ) : '';
			$instance['picture_description'] = ( ! empty( $new_instance['picture_description'] ) ) ? strip_tags( $new_instance['picture_description'] ) : '';

			return $instance;
		}
	}
	add_action( 'widgets_init', function(){
	     register_widget( '\enigma\Enigma_Info_Widget' );
	});