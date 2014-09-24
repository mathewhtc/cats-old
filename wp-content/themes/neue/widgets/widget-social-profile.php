<?php

add_action( 'widgets_init', 'vw_widgets_init_social_profile' );
if ( ! function_exists( 'vw_widgets_init_social_profile' ) ) {
	function vw_widgets_init_social_profile() {
		register_widget( 'Vw_widget_social_profile' );
	}
}

if ( ! class_exists( 'Vw_widget_social_profile' ) ) {
	class Vw_widget_social_profile extends WP_Widget {
		private $default = array(
			'title' => '',
		);

		public function __construct() {
			// widget actual processes
			parent::__construct(
		 		'vw_widget_social_profile', // Base ID
				VW_THEME_NAME.': Social Profile', // Name
				array( 'description' => 'Display social profile icon with link' ) // Args
			);
		}

		function widget( $args, $instance ) {
			extract($args);

			if ( function_exists( 'icl_t' ) ) {
				$instance['title'] = icl_t( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			$title_html = '';
			if ( ! empty( $instance['title'] ) ) {
				$title_html = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
			}

			echo $before_widget;
			if ( $instance['title'] ) echo $before_title . $title_html . $after_title;

			vw_the_site_social_profiles();

			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, $this->default );
			$instance['title'] = $new_instance['title'];

			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->default );

			$title = $instance['title'];
			?>

			<!-- title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<?php
		}
	}
}