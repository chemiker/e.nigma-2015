<?php

	namespace enigma;

	class Widgets {

		public static function widgets_init() {
			register_sidebar(array(
				'name' => __('Footer', 'e.nigma-2015'),
				'id' => 'footer'
			));
		}

	}
