<?php

add_action( 'tgmpa_register', 'vw_register_required_plugins' );
if ( ! function_exists( 'vw_register_required_plugins' ) ) {
	function vw_register_required_plugins() {

		$plugins = array(

			// This is an example of how to include a plugin pre-packaged with a theme
			// array(
			// 	'name'     				=> 'TGM Example Plugin', // The plugin name
			// 	'slug'     				=> 'tgm-example-plugin', // The plugin slug (typically the folder name)
			// 	'source'   				=> get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source
			// 	'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			// 	'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			// 	'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			// 	'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			// 	'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			// ),

			array(
				'name' => 'Envato WordPress Toolkit',
				'slug' => 'envato-wordpress-toolkit',
				'required' => false,
				'external_url' => 'https://github.com/envato/envato-wordpress-toolkit/archive/master.zip',
			),

			array(
				'name' => 'Better WordPress Minify',
				'slug' => 'bwp-minify',
				'required' => false,
			),

			array(
				'name' => 'Force Regenerate Thumbnails',
				'slug' => 'force-regenerate-thumbnails',
				'required' => false,
			),

			array(
				'name' => 'Contact Form 7',
				'slug' => 'contact-form-7',
				'required' => false,
			),

			array(
				'name' => 'WP Flexible Map',
				'slug' => 'wp-flexible-map',
				'required' => false,
			),

		);

		tgmpa( $plugins, array() );
	}
}