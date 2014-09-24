<?php
/* -----------------------------------------------------------------------------
 * Register Theme's Scripts & Styles
 * -------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'vw_register_scripts', 9 );
add_action( 'admin_enqueue_scripts', 'vw_register_scripts', 9 );
if ( ! function_exists( 'vw_register_scripts' ) ) {
	function vw_register_scripts() {
		wp_register_style( 'vwcss-icon-entypo', get_template_directory_uri().'/framework/font-icons/entypo/css/entypo.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-social', get_template_directory_uri().'/framework/font-icons/social-icons/css/zocial.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-symbol', get_template_directory_uri().'/framework/font-icons/symbol/css/symbol.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-typicons', get_template_directory_uri().'/framework/font-icons/typicons/css/typicons.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-awesome', get_template_directory_uri().'/framework/font-icons/awesome/css/awesome.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-iconic', get_template_directory_uri().'/framework/font-icons/iconic/css/iconic.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-icon-elusive', get_template_directory_uri().'/framework/font-icons/elusive/css/elusive.css', array(), VW_THEME_VERSION );

		wp_register_style( 'vwcss-animate', get_template_directory_uri().'/css/animate.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-bbpress-rtl', get_template_directory_uri().'/css/bbpress-rtl.css', array(), VW_THEME_VERSION );

		wp_register_style( 'vwcss-theme-root', get_template_directory_uri().'/style.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-theme', get_bloginfo( 'stylesheet_url' ), array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-theme-rtl', get_template_directory_uri().'/style-rtl.css', array(), VW_THEME_VERSION );

		wp_register_script( 'vwjs-img-liquid', get_template_directory_uri().'/js/imgLiquid.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-jquery-easing', get_template_directory_uri().'/js/jquery.easing.compatibility.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-hoverintent', get_template_directory_uri().'/js/jquery.hoverIntent.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-backstretch', get_template_directory_uri().'/js/jquery-backstretch/jquery.backstretch.min.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		wp_register_script( 'vwjs-raty', get_template_directory_uri().'/js/raty/jquery.raty.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		wp_register_script( 'vwjs-flexslider', get_template_directory_uri().'/js/flex-slider/jquery.flexslider-min.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_style( 'vwcss-flexslider', get_template_directory_uri().'/js/flex-slider/flexslider-custom.css', array(), VW_THEME_VERSION );
		wp_register_style( 'vwcss-flexslider-rtl', get_template_directory_uri().'/js/flex-slider/flexslider-custom-rtl.css', array(), VW_THEME_VERSION );

		wp_register_script( 'vwjs-swipebox', get_template_directory_uri().'/js/swipebox/js/jquery.swipebox.min.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_style( 'vwcss-swipebox', get_template_directory_uri().'/js/swipebox/css/swipebox.css', array(), VW_THEME_VERSION );

		wp_register_script( 'vwjs-debouncer', get_template_directory_uri().'/js/jquery.debouncedresize.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-sticky', get_template_directory_uri().'/js/jquery.sticky.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-newsticker', get_template_directory_uri().'/js/jquery.newsTicker.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );

		wp_register_style( 'vwcss-bootstrap-admin', get_template_directory_uri().'/framework/bootstrap-admin/bootstrap.css', array(), VW_THEME_VERSION );
		wp_register_script( 'vwjs-bootstrap-admin', get_template_directory_uri().'//framework/bootstrap-admin/bootstrap.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		
		wp_register_style( 'vwcss-admin', get_template_directory_uri().'/css/admin.css', array(), VW_THEME_VERSION );
		wp_register_script( 'vwjs-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
		wp_register_script( 'vwjs-bootstrap-dropdown', get_template_directory_uri().'/js/bootstrap/bootstrap.dropdown.js', array( 'jquery' ), VW_THEME_VERSION, VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER );
	}
}

/* -----------------------------------------------------------------------------
 * Front-End Scripts
 * -------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'vw_enqueue_scripts' );
if ( ! function_exists( 'vw_enqueue_scripts' ) ) {
	function vw_enqueue_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-effects-fade' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'vwjs-jquery-easing' );
		wp_enqueue_script( 'vwjs-hoverintent' );
		wp_enqueue_script( 'vwjs-fitvids' );
		wp_enqueue_script( 'vwjs-backstretch' );
		
		wp_enqueue_script( 'vwjs-flexslider' );

		wp_enqueue_script( 'vwjs-swipebox' );
		wp_enqueue_style( 'vwcss-swipebox' );

		if ( vw_get_theme_option( 'site_enable_sticky_menu' ) ) wp_enqueue_script( 'vwjs-sticky' );
		
		wp_enqueue_script( 'vwjs-img-liquid' );
		wp_enqueue_script( 'vwjs-debouncer' );
		wp_enqueue_script( 'vwjs-raty' );
		wp_enqueue_script( 'vwjs-newsticker' );
		wp_enqueue_script( 'vwjs-main' );
		wp_localize_script( 'vwjs-main', 'vw_main_js', array(
			'theme_path' => get_template_directory_uri()
		) );

		wp_enqueue_style( 'vwcss-icon-entypo' );
		wp_enqueue_style( 'vwcss-icon-social' );
		if ( vw_get_theme_option( 'icon_elusive' ) ) wp_enqueue_style( 'vwcss-icon-elusive' );
		if ( vw_get_theme_option( 'icon_awesome' ) ) wp_enqueue_style( 'vwcss-icon-awesome' );
		if ( vw_get_theme_option( 'icon_iconic' ) ) wp_enqueue_style( 'vwcss-icon-iconic' );
		if ( vw_get_theme_option( 'icon_typicons' ) ) wp_enqueue_style( 'vwcss-icon-typicons' );

		wp_enqueue_style( 'vwcss-animate' );
		wp_enqueue_style( 'vwcss-bootstrap' );

		if ( is_rtl() ) {
			if (class_exists('bbpress')) {
				wp_enqueue_style( 'vwcss-bbpress-rtl' );
			}
			wp_enqueue_style( 'vwcss-flexslider-rtl' );
			wp_enqueue_style( 'vwcss-theme-rtl' );
		} else {
			wp_enqueue_style( 'vwcss-flexslider' );
			if ( is_child_theme() ) {
				wp_enqueue_style( 'vwcss-theme-root' );
			}
			wp_enqueue_style( 'vwcss-theme' );
		}

	}
}

/* -----------------------------------------------------------------------------
 * Back-End Scripts
 * -------------------------------------------------------------------------- */
add_action( 'admin_enqueue_scripts', 'vw_admin_enqueue_scripts' );
if ( ! function_exists( 'vw_admin_enqueue_scripts' ) ) {
	function vw_admin_enqueue_scripts() {
		$screen = get_current_screen();
		if ( $screen->id != 'toplevel_page_theme_options' ) {
			wp_enqueue_style( 'vwcss-bootstrap-admin' );
			wp_enqueue_script( 'vwjs-bootstrap-admin' );
		}

		wp_enqueue_script( 'vwjs-fitvids' );

		wp_enqueue_style( 'vwcss-admin' );
		wp_enqueue_script( 'vwjs-admin' );
	}
}
