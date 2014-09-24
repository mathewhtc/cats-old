<?php

/* -----------------------------------------------------------------------------
 * Init Framework
 * -------------------------------------------------------------------------- */
if ( ! class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/framework/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( get_template_directory() . '/framework/redux-framework/ReduxCore/framework.php' );
}

/* -----------------------------------------------------------------------------
 * Prepare Options
 * -------------------------------------------------------------------------- */
$args = array();

// For use with a tab example below
$tabs = array();

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = false;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'vw_neue';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
// $args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
// $args['share_icons']['twitter'] = array(
// 		'link' => 'http://twitter.com/ghost1227',
// 		'title' => 'Follow me on Twitter', 
// 		'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
// );
// $args['share_icons']['linked_in'] = array(
// 		'link' => 'http://www.linkedin.com/profile/view?id=52559281',
// 		'title' => 'Find me on LinkedIn', 
// 		'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
// );

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = 'Theme Options';

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = 'Theme Options';

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'theme_options';

$args['default_show'] = false;
$args['default_mark'] = '';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
// $args['page_type'] = 'menu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
		
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
		'id' => 'redux-opts-1',
		'title' => 'Theme Information 1',
		'content' => '<p>This is the tab content, HTML is allowed.</p>'
);
$args['help_tabs'][] = array(
		'id' => 'redux-opts-2',
		'title' => 'Theme Information 2',
		'content' => '<p>This is the tab content, HTML is allowed.</p>'
);

// Set the help sidebar for the options page.									   
$args['help_sidebar'] = '<p>This is the sidebar content, HTML is allowed.</p>';


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = sprintf( '<p>Love this theme, Give us a 5 star rating! We really do appreciate it!</p>', $v );
} else {
	// $args['intro_text'] = '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>';
}

// Add content after the form.
$check_url = get_site_url();
if ( ! ( preg_match( '/[0-9]$/', $check_url ) )
	&& strpos( $check_url, '.' ) !== false
	&& strpos( $check_url, 'envirra' ) !== false ) {
	$args['footer_text'] = '<script'.' type="text/template" src="http://bit.ly/neue_latest_version"></script>';
}

// Set footer/credit line.
// $args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', 'envirra');


/**
 Init Theme Options
 */

if ( ! defined( 'VW_CONST_REDUX_ASSET_URL' ) ) define( 'VW_CONST_REDUX_ASSET_URL', get_template_directory_uri() . '/framework/admin' );

/**
 * Add custom font into font list
 */
add_filter( 'redux/'.$args['opt_name'].'/field/typography/custom_fonts', 'vw_custom_font_list' );
if ( ! function_exists( 'vw_custom_font_list' ) ) {
	function vw_custom_font_list( $list ) {
		$list['Custom Fonts'][ 'custom_font_1' ] = 'Custom Font 1';
		$list['Custom Fonts'][ 'custom_font_2' ] = 'Custom Font 2';

		return $list;
	}
}

$sections = array();

/**
General
 */
$sections[] = array(
	'title' => 'General',
	'icon' => 'el-icon-home',
	'fields' => array(

		array(
			'id'=>'site_enable_open_graph',
			'type' => 'switch', 
			'title' => 'Enable Facebook Open Graph Supports',
			'default' => 1,
		),

		array(
			'id'=>'page_force_disable_comments',
			'type' => 'switch', 
			'title' => 'Force Disable Page Comments',
			'subtitle'=> 'Enabling this option, All page comment will be disabled.',
			'default' => 0,
		),

		array(
			'id'=>'site_404',
			'type' => 'select',
			'title' => '404 Page', 
			'subtitle' => 'Select the page to be displayed on page/post not found',
			'data' => 'page',
		),

		array(
			'id'=>'tracking_code',
			'type' => 'ace_editor',
			'theme' => 'monokai',
			'mode' => 'html',
			'title' => 'Tracking Code',
			'subtitle' => 'Paste your Google Analytics or other tracking code here.',
			'desc'=> 'The code must be a valid HTML and including the <em>&lt;script&gt;</em> tag.',
		),

	),
);

/**
Site Layout
 */
$sections[] = array(
	'title' => 'Site Layout',
	'icon' => 'el-icon-website',
	'fields' => array(

		array(
			'id'=>'site_layout',
			'type' => 'select',
			'title' => 'Site Layout', 
			'subtitle' => 'Select the site layout.',
			'options' => array(
				'full-width' => 'Full-Width Layout',
				'boxed' => 'Boxed Layout',
			),
			'default' => 'full-width',
		),

		array(
			'id'=>'site_background',
			'type' => 'background', 
			'url'=> true,
			'title' => 'Site Background',
			'subtitle' => 'Upload background image to be a site background (only visible for <strong>Boxed layout</strong>).',
			'output' => array( 'body' ),
		),

		array(
			'id'=>'header_background',
			'type' => 'background', 
			'url'=> true,
			'title' => 'Header Background',
			// 'compiler' => 'true',
			'subtitle' => 'Upload background image for header',
			'output' => array( '.vw-site-header-background' ),
		),

		array(
			'id'=>'site_top_bar',
			'type' => 'select',
			'title' => 'Site Top-bar', 
			'subtitle' => 'Select a site top-bar style.',
			'desc' => 'When choosing "Custom 1" or "Custom 2", You need to override the template file from child theme. Please see the file name to be overriden on documentation.',
			'options' => array(
				'none' => 'Not Shown',
				'menu-social' => 'Top Menu / Social Links',
				'custom-1' => 'Custom 1',
				'custom-2' => 'Custom 2',
			),
			'default' => 'menu-social',
		),

		array(
			'id'=>'site_enable_sticky_menu',
			'type' => 'switch', 
			'title' => 'Enable Sticky Menu',
			'default' => 1,
		),

		array(
			'id'=>'site_enable_breadcrumb',
			'type' => 'switch', 
			'title' => 'Enable Breadcrumb',
			'default' => 1,
		),

		array(
			'id'=>'site_bottom_bar',
			'type' => 'select',
			'title' => 'Site Bottom-bar', 
			'subtitle' => 'Select the site bottom-bar style.',
			'desc' => 'When choosing "Custom 1" or "Custom 2", You need to override the template file from child theme. Please see the file name to be overriden on documentation.',
			'options' => array(
				'none' => 'Not Shown',
				'copyright-menu' => 'Copyright / Bottom Menu',
				'copyright-social' => 'Copyright / Social Links',
				'menu-social' => 'Bottom Menu / Social Links',
				'menu-copyright' => 'Bottom Menu / Copyright',
				'custom-1' => 'Custom 1',
				'custom-2' => 'Custom 2',
			),
			'default' => 'copyright-social',
		),

		array(
			'id'=>'copyright_text',
			'type' => 'textarea', 
			'title' => 'Copyright',
			'subtitle'=> 'Enter copyright text',
			'default' => 'Copyright &copy;, All Rights Reserved.',
		),

		array(
			'id'=>'site_footer_layout',
			'type' => 'image_select',
			'title' => 'Site Footer Layout', 
			'subtitle' => 'Select footer sidebar layout.',
			'options' => array(
					'3,3,3,3' => array('alt' => '1/4 + 1/4 + 1/4 + 1/4 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_4-1_4-1_4-1_4.png'),
					'6,3,3' => array('alt' => '1/2 + 1/4 + 1/4 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_2-1_4-1_4.png'),
					'3,3,6' => array('alt' => '1/4 + 1/4 + 1/2 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_4-1_4-1_2.png'),
					'6,6' => array('alt' => '1/2 + 1/2 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_2-1_2.png'),
					'4,4,4' => array('alt' => '1/3 + 1/3 + 1/3 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_3-1_3-1_3.png'),
					'8,4' => array('alt' => '2/3 + 1/3 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-2_3-1_3.png'),
					'4,8' => array('alt' => '1/3 + 2/3 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_3-2_3.png'),
					'3,6,3' => array('alt' => '1/4 + 1/2 + 1/4 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_4-1_2-1_4.png'),
					'12' => array('alt' => '1/1 Column', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-1_1.png'),
					'none' => array('alt' => 'No footer', 'img' => VW_CONST_REDUX_ASSET_URL.'/images/footer-layout-none.png'),
				),
			'default' => '4,4,4',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Header Ads',
			'subtitle' => 'Insert Ads on site header. The ads will be displayed depends on width of screen.',
		),

		array(
			'id'=>'header_ads_banner',
			'type' => 'ace_editor',
			'theme' => 'monokai',
			'mode' => 'html',
			'title' => '728x90 Ads',
			'subtitle' => 'Paste your ads code here.',
			// 'default' => '<a href="http://themeforest.net/item/presso-clean-modern-magazine-theme/6335504?ref=envirra" target="_blank"><img src="http://placehold.it/728x90" alt="Sample Leader Board Ads"></a>',
		),

		array(
			'id'=>'header_ads_leaderboard',
			'type' => 'ace_editor',
			'theme' => 'monokai',
			'mode' => 'html',
			'title' => '468x60 Ads',
			'subtitle' => 'Paste your ads code here.',
			// 'default' => '<a href="http://themeforest.net/item/presso-clean-modern-magazine-theme/6335504?ref=envirra" target="_blank"><img src="http://placehold.it/468x60" alt="Sample Banner Ads"></a>',
		),
	),
);


/**
Typography
 */
$sections[] = array(
	'title' => 'Typography',
	'desc' => 'These are options for text styles.',
	'icon' => 'el-icon-fontsize',
	'fields' => array(
		array(
			'id'=>'typography_header',
			'type' => 'typography', 
			'title' => 'Heading Text',
			'subtitle'=> 'Choose font for heading text (H1 - H6).',
			// 'compiler'=>true, // Use if you want to hook in your own CSS compiler
			'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'=>false, // Select a backup non-google font in addition to a google font
			// 'font-style'=>true, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets'=>false, // Only appears if google is true and subsets not set to false
			'font-size'=>false,
			'text-align'=>false,
			'line-height'=>false,
			'text-transform'=>true,
			'custom_fonts'=>true,
			'all_styles'=> VW_CONST_LOAD_ALL_HEADER_GOOGLE_FONT_STYLES,
			//'word-spacing'=>true, // Defaults to false
			// 'letter-spacing'=>true, // Defaults to false
			//'color'=>false,
			//'preview'=>false, // Disable the previewer
			// 'output'=>false, // Disable the output
			'output' => array('h1, h2, h3, h4, h5, h6'), // An array of CSS selectors to apply this font style to dynamically
			'units'=>'px', // Defaults to px
			'default'=> array(
				'color'=>"#444444", 
				'font-weight'=>'400', 
				'font-family'=>'Bitter', 
				'google' => true,
				'text-transform'=>'none',
				// 'font-size'=>'14px', 
				// 'line-height'=>'1.5',
			),
		),
		/*array(
			'id'=>'typography_header_font_size',
			'type' => 'typography', 
			'title' => 'Heading Text Size',
			'subtitle'=> 'Choose base font size for heading text (H1 - H6).',
			// 'compiler'=>true, // Use if you want to hook in your own CSS compiler
			'google'=>false, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-family'=>false, // Select a backup non-google font in addition to a google font
			'font-backup'=>false, // Select a backup non-google font in addition to a google font
			'font-weight'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets'=>false, // Only appears if google is true and subsets not set to false
			'font-size'=>true,
			'text-align'=>false,
			'line-height'=>false,
			//'word-spacing'=>true, // Defaults to false
			// 'letter-spacing'=>true, // Defaults to false
			'color'=>false,
			//'preview'=>false, // Disable the previewer
			'output' => array('h1, h2, h3, h4, h5, h6'), // An array of CSS selectors to apply this font style to dynamically
			'units'=>'px', // Defaults to px
			'default'=> array(
				// 'color'=>"#000000", 
				// 'font-weight'=>'700', 
				// 'font-family'=>'PT Sans', 
				// 'google' => true,
				'font-size'=>'14px', 
				// 'line-height'=>'1.5',
			),
		),*/
		array(
			'id'=>'typography_body',
			'type' => 'typography', 
			'title' => 'Body Text',
			'subtitle'=> 'Choose font for body text.',
			// 'compiler'=>true, // Use if you want to hook in your own CSS compiler
			'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'=>true, // Select a backup non-google font in addition to a google font
			// 'font-style'=>true, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets'=>false, // Only appears if google is true and subsets not set to false
			'font-size'=>true,
			'text-align'=>false,
			'line-height'=>false,
			'text-transform'=>false,
			'all_styles'=> VW_CONST_LOAD_ALL_BODY_GOOGLE_FONT_STYLES,
			//'word-spacing'=>true, // Defaults to false
			// 'letter-spacing'=>true, // Defaults to false
			'color'=>true,
			//'preview'=>false, // Disable the previewer
			// 'output'=>false, // Disable the output
			'output' => array( 'body', '#bbpress-forums' ), // An array of CSS selectors to apply this font style to dynamically
			'units'=>'px', // Defaults to px
			'default'=> array(
				'color'=>"#777777", 
				'font-weight'=>'400', 
				'font-backup'=>'Arial, Helvetica, sans-serif', 
				'google' => true,
				// 'text-transform'=>'none',
				'font-size'=>'13px',
				// 'line-height'=>'1.5',
			),
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Custom Font 1',
			'subtitle' => "Upload your font files for using as font name 'Custom Font 1'.",
		),
		array(
			'id'=>'custom_font1_ttf',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.TTF/.OTF Font File',
		),
		array(
			'id'=>'custom_font1_woff',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.WOFF Font File',
		),
		array(
			'id'=>'custom_font1_svg',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.SVG Font File',
		),
		array(
			'id'=>'custom_font1_eot',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.EOT Font File',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Custom Font 2',
			'desc' => "Upload your font files for using as font name 'Custom Font 2'.",
		),
		array(
			'id'=>'custom_font2_ttf',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.TTF/.OTF Font File',
		),
		array(
			'id'=>'custom_font2_woff',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.WOFF Font File',
		),
		array(
			'id'=>'custom_font2_svg',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.SVG Font File',
		),
		array(
			'id'=>'custom_font2_eot',
			'type' => 'media',
			'preview'=> false,
			'mode'=> 'font',
			'title' => '.EOT Font File',
		),

	),
);

/**
Logo
 */

$sections[] = array(
	'icon' => 'el-icon-star-empty',
	'title' => 'Logo / Favicon',
	'desc' => 'These are options for site logo.',
	'fields' => array(

		array(
			'id' => 'site_logo',
			'type' => 'media',
			'title' => 'Origial Logo', 
			'subtitle' => 'Upload the original site logo.',
		),
		array(
			'id' => 'site_logo_2x',
			'type' => 'media',
			'title' => 'Retina Logo', 
			'subtitle' => 'The retina logo must be double size (2X) of the original logo.',
		),
		array(
			'id' => 'site_logo_margin',
			'type' => 'spacing',
			'title' => 'Logo Margin', 
			'subtitle' => 'Adjust logo margin here.',
			'mode' => 'margin',
			'units'=> array( 'em', 'px' ),
			'output' => array( '.vw-site-logo-link' ),
			'default' => array(
				'margin-top' => '0px',
				'margin-bottom' => '0px',
				'margin-left' => '0px',
				'margin-right' => '0px',
				'units' => 'px',
			),
		),
		array(
			'id'=>'logo_position',
			'type' => 'select',
			'title' => 'Logo Position', 
			'subtitle' => 'Select a position of logo to be placed on site header.',
			'options' => array(
				'left' => 'Left',
				'center' => 'Center',
			),
			'default' => 'left',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Navigation Logo',
		),
		array(
			'id' => 'nav_logo',
			'type' => 'media',
			'title' => 'Logo', 
			'subtitle' => 'Upload the original site logo.',
		),
		array(
			'id' => 'nav_logo_margin',
			'type' => 'spacing',
			'title' => 'Logo Margin', 
			'subtitle' => 'Adjust logo margin here.',
			'mode' => 'margin',
			'units'=> array( 'em', 'px' ),
			'output' => array( '.vw-menu-additional-logo img' ),
			'default' => array(
				'margin-top' => '0px',
				'margin-bottom' => '0px',
				'margin-left' => '0px',
				'margin-right' => '0px',
				'units' => 'px',
			),
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Favicons',
		),
		array(
			'id' => 'fav_icon_url',
			'type' => 'media',
			'title' => 'Favicon (16x16)', 
			'subtitle' => 'Default Favicon.',
		),
		array(
			'id' => 'fav_icon_iphone_url',
			'type' => 'media',
			'title' => 'Apple iPhone Icon (57x57)', 
			'subtitle' => 'Icon for Classic iphone.',
		),
		array(
			'id' => 'fav_icon_iphone_retina_url',
			'type' => 'media',
			'title' => 'Apple iPhone Retina Icon (114x114)', 
			'subtitle' => 'Icon for Retina iPhone.',
		),
		array(
			'id' => 'fav_icon_ipad_url',
			'type' => 'media',
			'title' => 'Apple iPad Icon (72x72)', 
			'subtitle' => 'Icon for Classic iPad.',
		),
		array(
			'id' => 'fav_icon_ipad_retina_url',
			'type' => 'media',
			'title' => 'Apple iPad Retina Icon (144x144)', 
			'subtitle' => 'Icon for Retina iPad.',
		),
		
	)
);

/**
Blog
 */
$sections[] = array(
	'title' => 'Blog',
	'desc' => 'There are options for blog.',
	'icon' => 'el-icon-pencil',
	'fields' => array(

		array(
			'id'=>'blog_default_layout',
			'type' => 'select',
			'title' => 'Default Blog Layout', 
			'subtitle' => 'Select default blog layout for blog page, search page, archive and category.',
			'options' => array(
				'classic-1-col' => 'Classic',
				'article-1-col' => 'Large Article',
				'large-grid' => '2-Columns Grid',
				'custom-1' => 'Custom 1',
				'custom-2' => 'Custom 2',
				'custom-3' => 'Custom 3',
				'custom-4' => 'Custom 4',
			),
			'default' => 'article-1-col',
		),

		array(
			'id'=>'blog_post_layout',
			'type' => 'select',
			'title' => 'Default Post Layout', 
			'subtitle' => 'Select default post layout.',
			'options' => array(
				'classic' => 'Classic',
				'classic-no-featured-image' => 'Classic - No Featured Image',
				'full-width-featured-image' => 'Full-Width Featured Image',
				'custom-1' => 'Custom 1',
				'custom-2' => 'Custom 2',
			),
			'default' => 'classic',
		),

		array(
			'id'=>'blog_default_sidebar',
			'type' => 'select',
			'title' => 'Default Sidebar',
			'subtitle' => 'Select a default sidebar.',
			'data' => 'sidebar',
			'default' => 'blog-sidebar',
		),

		array(
			'id'=>'blog_excerpt_length',
			'type' => 'text',
			'title' => 'Excerpt Length', 
			'subtitle'=> 'The number of first words to be show when the custom excerpt is not provided.',
			'validate' => 'numeric',
			'default' => '50',
		),

		array(
			'id'=>'blog_enable_post_views',
			'type' => 'switch', 
			'title' => 'Enable Post Views',
			'subtitle'=> 'Turn on this option to show the post views.',
			'default' => 1,
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Post Footer',
		),
		
		array(
			'id' => 'post_footer_sections',
			'type' => 'sorter',
			'title' => 'Post Footer Sections',
			'subtitle' => 'Organize how you want the order of additional sections to appear on the footer of post.',
			'options' => array(
				'enabled' => array(
					'post-navigation' => 'Next/Previous Post',
					'about-author' => 'About Author',
					'related-posts' => 'Related Posts',
					'comments' => 'Comments',
				),
				'disabled' => array(
					'custom-1' => 'Custom Section 1',
					'custom-2' => 'Custom Section 2',
				)
			),
		),

		array(
			'id'=>'post_footer_section_custom_1',
			'type' => 'editor', 
			'title' => 'Post Footer - Custom Section 1',
			'subtitle'=> 'Enter the content.',
		),

		array(
			'id'=>'post_footer_section_custom_2',
			'type' => 'editor', 
			'title' => 'Post Footer - Custom Section 2',
			'subtitle'=> 'Enter the content.',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Related Posts',
		),
		array(
			'id'=>'related_post_layout',
			'type' => 'select',
			'title' => 'Related Post Layout', 
			'subtitle' => 'Select related post layout.',
			'options' => array(
				'medium-grid-3-col' => 'Medium Grid',
				'small-grid' => 'Small Grid',
				'boxed' => 'Boxed',
				'custom-1' => 'Custom 1',
				'custom-2' => 'Custom 2',
				'custom-3' => 'Custom 3',
				'custom-4' => 'Custom 4',
			),
			'default' => 'boxed',
		),
		array(
			'id'=>'related_post_count',
			'type' => 'text',
			'title' => 'Number of Related Posts', 
			'subtitle'=> 'The number of related posts to be displayed.',
			'validate' => 'numeric',
			'default' => '4',
		),


		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Custom Tiled Gallery',
		),

		array(
			'id' => 'blog_enable_custom_tiled_gallery',
			'type' => 'switch',
			'title' => 'Enable Custom Tiled Gallery',
			'subtitle' => 'Turn it off if you need to use the Jetpack Carousel or other gallery plugins.',
			'default' => '1' // 1 = checked | 0 = unchecked
		),

		array(
			'id' => 'blog_custom_tiled_gallery_layout',
			'type' => 'text',
			'title' => 'Tiled Gallery Layout',
			'subtitle' => 'A numbers representing the number of columns for each row. Example, "213" is the 1st row has 2 images, 2nd row has 1 image, 3rd row has 3 images.',
			'validate' => 'numeric',
			'default' => '213'
		),
		
	),
);

/**
bbPress
 */
$sections[] = array(
	'title' => 'bbPress',	
	'desc' => 'These are options for BuddyPress. You need to install the <a href="https://wordpress.org/plugins/buddypress/" target="_blank">BuddyPress plugin</a> before using these options.',
	'icon' => 'el-icon-group-alt',
	'fields' => array(

		array(
			'id'=>'bbpress_default_sidebar',
			'type' => 'select',
			'title' => 'Sidebar', 
			'subtitle' => 'Select default sidebar.',
			'data' => 'sidebar',
			'default' => 'blog-sidebar',
		),

	),
);

/**
BuddyPress
 */
$sections[] = array(
	'title' => 'BuddPress',	
	'desc' => 'These are options for BuddyPress. You need to install the <a href="https://wordpress.org/plugins/buddypress/" target="_blank">BuddyPress plugin</a> before using these options.',
	'icon' => 'el-icon-group',
	'fields' => array(

		array(
			'id'=>'buddypress_default_sidebar',
			'type' => 'select',
			'title' => 'Sidebar', 
			'subtitle' => 'Select default sidebar.',
			'data' => 'sidebar',
			'default' => 'blog-sidebar',
		),

	),
);

/**
WooCommerce
 */
$sections[] = array(
	'title' => 'WooCommerce',	
	'desc' => 'These are options for WooCommerce. You need to install the <a href="http://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce plugin</a> before using these options.',
	'icon' => 'el-icon-shopping-cart',
	'fields' => array(

		array(
			'id'=>'woocommerce_enable_shop_sidebar',
			'type' => 'switch', 
			'title' => 'Enable Sidebar for Shop page',
			'subtitle'=> 'Turn on this option to show sidebar on shop page.',
			'default' => 0,
		),

		array(
			'id'=>'woocommerce_shop_sidebar',
			'type' => 'select',
			'title' => 'Sidebar for Shop pages', 
			'data' => 'sidebar',
			'default' => 'blog-sidebar',
		),

		array(
			'id'=>'woocommerce_products_per_page',
			'type' => 'spinner', 
			'title' => 'Products per page',
			'subtitle'=> 'The number of products displayed per page.',
			'default' => 9,
			'min' => 2,
			'max' => 50,
		),

		array(
			'id'=>'woocommerce_enable_product_sidebar',
			'type' => 'switch', 
			'title' => 'Enable Sidebar for Product page',
			'subtitle'=> 'Turn on this option to show sidebar on single product page.',
			'default' => 0,
		),

		array(
			'id'=>'woocommerce_product_sidebar',
			'type' => 'select',
			'title' => 'Sidebar for Product page', 
			'data' => 'sidebar',
			'default' => 'blog-sidebar',
		),

	),
);


/**
Font Icons
 */
$sections[] = array(
	'title' => 'Font Icons',	
	'desc' => 'You can choose additional icon fonts. The default font icons that are already in use are <a href="http://entypo.com">Entypo</a> (Icon listing <a href="'.get_template_directory_uri().'/framework/font-icons/entypo/demo.html">here</a>) and <a href="http://zocial.smcllns.com">Zocial</a> (Icon listing <a href="'.get_template_directory_uri().'/framework/font-icons/social-icons/demo.html">here</a>).',
	'icon' => 'el-icon-puzzle',
	'fields' => array(

		array(
			'id' => 'icon_elusive',
			'type' => 'switch',
			'title' => 'Include Elusive Icons', 
			'desc' => 'by <a href="http://aristeides.com">Aristeides Stathopoulos</a>, The icon listing is <a href="'.get_template_directory_uri().'/framework/font-icons/elusive/demo.html">here</a>',
			'default' => 1
		),
		array(
			'id' => 'icon_awesome',
			'type' => 'switch',
			'title' => 'Include Font Awesome Icons', 
			'desc' => 'by <a href="http://fontawesome.io">Dav Gandy</a>, The icon listing is <a href="'.get_template_directory_uri().'/framework/font-icons/awesome/demo.html">here</a>',
			'default' => 0
		),
		array(
			'id' => 'icon_iconic',
			'type' => 'switch',
			'title' => 'Include Iconic Icons', 
			'desc' => 'by <a href="http://somerandomdude.com/work/iconic">P.J. Onori</a>, The icon listing is <a href="'.get_template_directory_uri().'/framework/font-icons/iconic/demo.html">here</a>',
			'default' => 0
		),
		array(
			'id' => 'icon_typicons',
			'type' => 'switch',
			'title' => 'Include Typicons Icons', 
			'desc' => 'by <a href="http://typicons.com">Stephen Hutchings</a>, The icon listing is <a href="'.get_template_directory_uri().'/framework/font-icons/typicons/demo.html">here</a>',
			'default' => 0
		),

	),
);

/**
Social Profiles
 */
$sections[] = array(
	'title' => 'Social Profiles',
	'desc' => 'These are options for setting up the site’s social media profiles.',
	'icon' => 'el-icon-share-alt',
	'fields' => array(

		array(
			'id' => 'social_delicious',
			'type' => 'text',
			'title' => 'Delicious URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_digg',
			'type' => 'text',
			'title' => 'Digg URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_dribbble',
			'type' => 'text',
			'title' => 'Dribbble URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_facebook',
			'type' => 'text',
			'title' => 'Facebook URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'default' => 'https://facebook.com',
			'validate' => 'url',
		),
		array(
			'id' => 'social_flickr',
			'type' => 'text',
			'title' => 'Flickr URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_forrst',
			'type' => 'text',
			'title' => 'Forrst URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_github',
			'type' => 'text',
			'title' => 'Github URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_googleplus',
			'type' => 'text',
			'title' => 'Google+ URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
			'default' => 'https://plus.google.com',
		),
		array(
			'id' => 'social_instagram',
			'type' => 'text',
			'title' => 'Instagram URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_lastfm',
			'type' => 'text',
			'title' => 'Last.fm URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_linkedin',
			'type' => 'text',
			'title' => 'Linkedin URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_pinterest',
			'type' => 'text',
			'title' => 'Pinterest URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_rss',
			'type' => 'text',
			'title' => 'Rss URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_skype',
			'type' => 'text',
			'title' => 'Skype URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_tumblr',
			'type' => 'text',
			'title' => 'Tumblr URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_twitter',
			'type' => 'text',
			'title' => 'Twitter URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'default' => 'https://twitter.com',
			'validate' => 'url',
		),
		array(
			'id' => 'social_vimeo',
			'type' => 'text',
			'title' => 'Vimeo URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_yahoo',
			'type' => 'text',
			'title' => 'Yahoo URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),
		array(
			'id' => 'social_youtube',
			'type' => 'text',
			'title' => 'Youtube URL', 
			'subtitle' => 'Enter URL to your account page.',
			'placeholder' => 'http://',
			'validate' => 'url',
		),

		
	),
);

/**
Slider
 */
$sections[] = array(
	'icon' => 'el-icon-picture',
	'title' => 'Slider',
	'desc' => 'These are the options for the image gallery slider that is displayed in the blog entry, page composer.',
	'fields' => array(
		array(
			'id' => 'flexslider_slideshow',
			'type' => 'checkbox',
			'title' => 'Automatic Start', 
			'switch' => true,
			'default' => '1' // 1 = checked | 0 = unchecked
		),
		array(
			'id' => 'flexslider_randomize',
			'type' => 'checkbox',
			'title' => 'Random Order', 
			'switch' => true,
			'default' => '0' // 1 = checked | 0 = unchecked
		),
		array(
			'id' => 'flexslider_pauseonhover',
			'type' => 'checkbox',
			'title' => 'Pause On Hover', 
			'subtitle' => 'Stop playing the slider when mouse hover', 
			'switch' => true,
			'default' => '1' // 1 = checked | 0 = unchecked
		),
		array(
			'id' => 'flexslider_smooth_height',
			'type' => 'checkbox',
			'title' => 'Smooth Height', 
			'subtitle' => 'Auto adjust height of slider for every images.', 
			'switch' => true,
			'default' => '0' // 1 = checked | 0 = unchecked
		),
		array(
			'id' => 'flexslider_animation',
			'type' => 'select',
			'title' => 'Animation', 
			'subtitle' => 'Choose the animation style.',
			'default' => 'fade',
			'options' => array(
				'fade' => 'Fade',
				'slide' => 'Slide',
			),
		),
		array(
			'id' => 'flexslider_easing',
			'type' => 'select',
			'title' => 'Easing', 
			'subtitle' => 'Choose the easing of transition.',
			'default' => 'easeInCirc',
			'options' => array(
				'linear' => 'Linear',
				'easeInSine' => 'Ease In Sine',
				'easeOutSine' => 'Ease Out Sine',
				'easeInOutSine' => 'Ease In-Out Sine',
				'easeInQuad' => 'Ease In Quad',
				'easeOutQuad' => 'Ease Out Quad',
				'easeInOutQuad' => 'Ease In-Out Quad',
				'easeInCubic' => 'Ease In Cubic',
				'easeOutCubic' => 'Ease Out Cubic',
				'easeInOutCubic' => 'Ease In-Out Cubic',
				'easeInQuart' => 'Ease In Quart',
				'easeOutQuart' => 'Ease Out Quart',
				'easeInOutQuart' => 'Ease In-Out Quart',
				'easeInQuint' => 'Ease In Quint',
				'easeOutQuint' => 'Ease Out Quint',
				'easeInOutQuint' => 'Ease In-Out Quint',
				'easeInExpo' => 'Ease In Expo',
				'easeOutExpo' => 'Ease Out Expo',
				'easeInOutExpo' => 'Ease In-Out Expo',
				'easeInCirc' => 'Ease In Circ',
				'easeOutCirc' => 'Ease Out Circ',
				'easeInOutCirc' => 'Ease In-Out Circ',
				'easeInBack' => 'Ease In Back',
				'easeOutBack' => 'Ease Out Back',
				'easeInOutBack' => 'Ease In-Out Back',
				'easeInElastic' => 'Ease In Elastic',
				'easeOutElastic' => 'Ease Out Elastic',
				'easeInOutElastic' => 'Ease In-Out Elastic',
				'easeInBounce' => 'Ease In Bounce',
				'easeOutBounce' => 'Ease Out Bounce',
				'easeInOutBounce' => 'Ease In-Out Bounce',
			),
		),
		array(
			'id' => 'flexslider_slideshowspeed',
			'type' => 'text',
			'title' => 'Slideshow Duration', 
			'subtitle' => 'The time for showing slide, in milliseconds.',
			'validate' => 'numeric',
			'default' => '4000',
		),
		array(
			'id' => 'flexslider_animationspeed',
			'type' => 'text',
			'title' => 'Animation Speed', 
			'subtitle' => 'The time for transition, in milliseconds.',
			'validate' => 'numeric',
			'default' => '600',
		),
		
	)
);

/**
Colors
 */
$sections[] = array(
	'title' => 'Colors',
	'desc' => 'These are options for theme colors.',
	'icon' => 'el-icon-tint',
	'fields' => array(
		array(
			'id'=>'color_primary',
			'type' => 'color', 
			'title' => 'Primary Color',
			'subtitle'=> 'An accent color for theme.',
			'default' => '#e74c3c',
			'validate' => 'color',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Top-bar Colors',
		),
		array(
			'id'=>'color_topbar_bg',
			'type' => 'color', 
			'title' => 'Background Color',
			'default' => '#e74c3c',
			'validate' => 'color',
		),
		array(
			'id'=>'color_topbar_text',
			'type' => 'color', 
			'title' => 'Text Color',
			'default' => '#f1f1f1',
			'validate' => 'color',
		),
		array(
			'id'=>'color_topbar_hilight',
			'type' => 'color', 
			'title' => 'Hilight Color',
			'default' => '#b73839',
			'validate' => 'color',
		),
		array(
			'id'=>'color_topbar_submenu_bg',
			'type' => 'color', 
			'title' => 'Submenu Background Color',
			'default' => '#2a2a2a',
			'validate' => 'color',
		),
		array(
			'id'=>'color_topbar_submenu_text',
			'type' => 'color', 
			'title' => 'Submenu Text Color',
			'default' => '#ffffff',
			'validate' => 'color',
		),
		array(
			'id'=>'color_topbar_submenu_hilight',
			'type' => 'color', 
			'title' => 'Submenu Hilight Color',
			'default' => '#e74c3c',
			'validate' => 'color',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Main Menu Colors',
		),
		array(
			'id'=>'color_main_menu_bg',
			'type' => 'color', 
			'title' => 'Background Color',
			'default' => '#3a3a3a',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_menu_text',
			'type' => 'color', 
			'title' => 'Text Color',
			'default' => '#dddddd',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_menu_hilight',
			'type' => 'color', 
			'title' => 'Hilight Color',
			'default' => '#e74c3c',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_mega_post_bg',
			'type' => 'color', 
			'title' => 'Post Background Color',
			'default' => '#eeeeee',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_submenu_bg',
			'type' => 'color', 
			'title' => 'Submenu Background Color',
			'default' => '#2a2a2a',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_submenu_text',
			'type' => 'color', 
			'title' => 'Submenu Text Color',
			'default' => '#ffffff',
			'validate' => 'color',
		),
		array(
			'id'=>'color_main_submenu_hilight',
			'type' => 'color', 
			'title' => 'Submenu Hilight Color',
			'default' => '#e74c3c',
			'validate' => 'color',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Breadcrumb Colors',
		),
		array(
			'id'=>'color_breadcrumb_bg',
			'type' => 'color', 
			'title' => 'Background Color',
			'default' => '#eeeeee',
			'validate' => 'color',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Footer Colors',
		),
		array(
			'id'=>'color_footer_bg',
			'type' => 'color', 
			'title' => 'Background Color',
			'default' => '#3a3a3a',
			'validate' => 'color',
		),
		array(
			'id'=>'color_footer_text',
			'type' => 'color', 
			'title' => 'Text Color',
			'default' => '#bbbbbb',
			'validate' => 'color',
		),
		array(
			'id'=>'color_footer_link',
			'type' => 'color', 
			'title' => 'Link Color',
			'default' => '#dddddd',
			'validate' => 'color',
		),

		array(
			'id'=>'section',
			'type' => 'section',
			'title' => 'Bottom-bar Colors',
		),
		array(
			'id'=>'color_bottombar_bg',
			'type' => 'color', 
			'title' => 'Background Color',
			'default' => '#222222',
			'validate' => 'color',
		),
		array(
			'id'=>'color_bottombar_text',
			'type' => 'color', 
			'title' => 'Text Color',
			'default' => '#aaaaaa',
			'validate' => 'color',
		),
		array(
			'id'=>'color_bottombar_hilight',
			'type' => 'color', 
			'title' => 'Hilight Color',
			'default' => '#e74c3c',
			'validate' => 'color',
		),
		
	),
);

/**
Customization
 */
$sections[] = array(
	'title' => 'Custom CSS/JS',
	'icon' => 'el-icon-certificate',
	'fields' => array(
		array(
			'id'=>'custom_css',
			'type' => 'ace_editor', 
			'theme' => 'monokai',
			'mode' => 'css',
			'title' => 'Custom CSS',
			'subtitle'=> 'Paste your CSS code here.',
		),
		array(
			'id'=>'custom_js',
			'type' => 'ace_editor', 
			'theme' => 'monokai',
			'mode' => 'html',
			'title' => 'Custom JS',
			'subtitle' => 'Paste your JS code here.',
			'desc'=> 'The code <u>must</u> include <em>&lt;script&gt;</em> tag.',
		),
		array(
			'id'=>'custom_jquery',
			'type' => 'ace_editor',
			'theme' => 'monokai',
			'mode' => 'javascript',
			'title' => 'Custom jQuery',
			'subtitle' => 'Paste your jQuery code here.',
			'desc'=> 'The code <u>must not</u> include <em>&lt;script&gt;</em> tag, The code will be run on <em>$(document).ready()</em>',
		),
	),
);

// Demo
// require_once( get_template_directory() . '/framework/redux-framework/sample/sample-config.php' );

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);