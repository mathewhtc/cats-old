<?php


/* -----------------------------------------------------------------------------
 * Render Custom JS
 * -------------------------------------------------------------------------- */
add_action( 'wp_footer', 'vw_render_footer_js' );
if ( ! function_exists( 'vw_render_footer_js' ) ) {
	function vw_render_footer_js() {
		/**
		 * Render Tracking Code
		 */
		echo vw_get_theme_option( 'tracking_code' );

		/**
		 * Render Custom JS code
		 */
		echo vw_get_theme_option( 'custom_js' );

		/**
		 * Render Custom JS
		 */
		?>
		<script type='text/javascript'>
			;(function( $, window, document, undefined ){
				"use strict";

				$( document ).ready( function () {
					/* Render registered custom scripts */
					<?php do_action( 'vw_action_render_custom_jquery' ); ?>

					/* Render custom jquery option */
					<?php echo vw_get_theme_option( 'custom_jquery' ); ?>

				} );

				$( window ).ready( function() {
					<?php vw_render_default_flexslider(); ?>
				} );
				
			})( jQuery, window , document );

		</script>
		<?php 
	}
}

/* -----------------------------------------------------------------------------
 * Render Flexslider
 * -------------------------------------------------------------------------- */
// add_action( 'vw_action_render_custom_jquery', 'vw_render_default_flexslider' );
if ( ! function_exists( 'vw_render_default_flexslider' ) ) {
	function vw_render_default_flexslider() {
	?>
		if ( $.flexslider ) {
			$( '.flexslider' ).flexslider({
				animation: "<?php echo vw_get_theme_option( 'flexslider_animation' ); ?>",
				easing: "<?php echo vw_get_theme_option( 'flexslider_easing' ); ?>",
				slideshow: <?php echo vw_get_theme_option( 'flexslider_slideshow' ) ? 'true' : 'false'; ?>,
				slideshowSpeed: <?php echo vw_get_theme_option( 'flexslider_slideshowspeed' ); ?>,
				animationSpeed: <?php echo vw_get_theme_option( 'flexslider_animationspeed' ); ?>,
				randomize: <?php echo vw_get_theme_option( 'flexslider_randomize' ) ? 'true' : 'false'; ?>,
				pauseOnHover: <?php echo (boolean)vw_get_theme_option( 'flexslider_pauseonhover' ) ? 'true' : 'false'; ?>,
				prevText: '',
				nextText: '',
				smoothHeight: <?php echo (boolean)vw_get_theme_option( 'flexslider_smooth_height' ) ? 'true' : 'false'; ?>,
			});
		}
	<?php
	}
}