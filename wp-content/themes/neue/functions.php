<?php
// Define content width
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

/* -----------------------------------------------------------------------------
 * Constants
 * -------------------------------------------------------------------------- */
if ( ! defined( 'VW_THEME_VERSION' ) ) define( 'VW_THEME_VERSION', '1.0.0' );
if ( ! defined( 'VW_THEME_NAME' ) ) define( 'VW_THEME_NAME', 'NEUE' );

// Plugin url for MetaBox
defined( 'RWMB_URL' ) || define( 'RWMB_URL', get_template_directory_uri().'/framework/meta-box/' );

// Avatar size
if ( ! defined( 'VW_CONST_AVATAR_SIZE_SMALL' ) ) define( 'VW_CONST_AVATAR_SIZE_SMALL', 26 );
if ( ! defined( 'VW_CONST_AVATAR_SIZE_LARGE' ) ) define( 'VW_CONST_AVATAR_SIZE_LARGE', 100 );

// Backstretch
if ( ! defined( 'VW_CONST_BACKSTRETCH_OPT_FADE' ) ) define( 'VW_CONST_BACKSTRETCH_OPT_FADE', 600 );
if ( ! defined( 'VW_CONST_BACKSTRETCH_OPT_CENTEREDX' ) ) define( 'VW_CONST_BACKSTRETCH_OPT_CENTEREDX', 'true' ); // True/False must be a string
if ( ! defined( 'VW_CONST_BACKSTRETCH_OPT_CENTEREDY' ) ) define( 'VW_CONST_BACKSTRETCH_OPT_CENTEREDY', 'false' ); // True/False must be a string
if ( ! defined( 'VW_CONST_BACKSTRETCH_OPT_DURATION' ) ) define( 'VW_CONST_BACKSTRETCH_OPT_DURATION', 5000 );

if ( ! defined( 'VW_CONST_LOAD_ALL_HEADER_GOOGLE_FONT_STYLES' ) ) define( 'VW_CONST_LOAD_ALL_HEADER_GOOGLE_FONT_STYLES', true );
if ( ! defined( 'VW_CONST_LOAD_ALL_BODY_GOOGLE_FONT_STYLES' ) ) define( 'VW_CONST_LOAD_ALL_BODY_GOOGLE_FONT_STYLES', true );
if ( ! defined( 'VW_CONST_PAGINATE_LINKS_END_SIZE' ) ) define( 'VW_CONST_PAGINATE_LINKS_END_SIZE', 1 );
if ( ! defined( 'VW_CONST_PAGINATE_LINKS_MID_SIZE' ) ) define( 'VW_CONST_PAGINATE_LINKS_MID_SIZE', 3 );
if ( ! defined( 'VW_CONST_WIDGET_COMMENT_EXCERPT_LENGTH' ) ) define( 'VW_CONST_WIDGET_COMMENT_EXCERPT_LENGTH', 30 );

if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_SMALL' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_SMALL', 'vw_small_squared_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_MEDIUM' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_MEDIUM', 'vw_two_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_LARGE' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_LARGE', 'vw_two_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_BOXED' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_BOXED', 'vw_post_box_boxed_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_ARTICLE' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_ARTICLE', 'vw_two_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_CLASSIC' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_BOX_CLASSIC', 'vw_medium_squared_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_SLIDER' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_SLIDER', 'vw_two_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_SMALL' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_SMALL', 'vw_one_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND', 'full' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_INSTANT_SEARCH' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_INSTANT_SEARCH', 'vw_small_squared_thumbnail' );

if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_CATEGORY' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_CATEGORY', 'vw_category_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC', 'vw_two_third_thumbnail' );
if ( ! defined( 'VW_CONST_THUMBNAIL_SIZE_CUSTOM_TILED_GALLERY' ) ) define( 'VW_CONST_THUMBNAIL_SIZE_CUSTOM_TILED_GALLERY', 'vw_two_third_thumbnail' );

if ( ! defined( 'VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER' ) ) define( 'VW_CONST_ENQUEUE_SCRIPTS_ON_FOOTER', true );

/* -----------------------------------------------------------------------------
 * Includes
 * -------------------------------------------------------------------------- */
require_once get_template_directory().'/framework/functions.php';
require_once get_template_directory().'/framework/custom-sidebar-generator.php';
require_once get_template_directory().'/framework/facebook-open-graph.php';
require_once get_template_directory().'/framework/breaking-news.php';
require_once get_template_directory().'/framework/instant-search/instant-search.php';
require_once get_template_directory().'/framework/post-likes/post-likes.php';
require_once get_template_directory().'/framework/review/review.php';
require_once get_template_directory().'/framework/post-views/post-views.php';
require_once get_template_directory().'/framework/breadcrumb.php';

require_once get_template_directory().'/inc/options.php';
require_once get_template_directory().'/inc/enqueue.php';
require_once get_template_directory().'/inc/simple-page-composer.php';
require_once get_template_directory().'/inc/sidebars.php';
require_once get_template_directory().'/inc/shortcodes.php';
require_once get_template_directory().'/inc/mega-menu.php';
require_once get_template_directory().'/inc/bbpress.php';
require_once get_template_directory().'/inc/woocommerce.php';
require_once get_template_directory().'/inc/template-tags.php';
require_once get_template_directory().'/inc/custom-tiled-gallery.php';
require_once get_template_directory().'/inc/custom-font.php';
require_once get_template_directory().'/inc/custom-css.php';
require_once get_template_directory().'/inc/custom-js.php';

require_once get_template_directory().'/widgets/widget-latest-posts.php';
require_once get_template_directory().'/widgets/widget-post-tabbed.php';
require_once get_template_directory().'/widgets/widget-author-list.php';
require_once get_template_directory().'/widgets/widget-social-counter.php';
require_once get_template_directory().'/widgets/widget-social-profile.php';
require_once get_template_directory().'/widgets/widget-feedburner.php';
require_once get_template_directory().'/widgets/widget-login.php';

if ( is_admin() ) {
	// Plugin activation
	require_once get_template_directory().'/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory().'/inc/plugin-activation.php';

	// Meta-box
	require_once get_template_directory().'/framework/meta-box/meta-box.php';
	require_once get_template_directory().'/inc/meta-boxes.php';

	// Additional fields for user profile
	require_once get_template_directory().'/framework/user-profile-fields.php';

	// Envato toolkit for checking the new theme version
	require_once get_template_directory().'/framework/envato-wordpress-toolkit-library/connect-wordpress-toolkit.php';
	
	require_once get_template_directory().'/framework/demo-importer/demo-importer.php';

	// Advanced Custom Fields
	if( ! class_exists( 'acf' ) ) {
		if ( ! defined( 'ACF_LITE' ) ) define( 'ACF_LITE' , true );
		require_once get_template_directory().'/framework/advanced-custom-fields/acf.php';
	}

	if( ! class_exists( 'acf_field_sidebar_selector_plugin' ) ) {
		require_once get_template_directory().'/framework/acf-sidebar-selector/acf-sidebar_selector.php';
	}

	require_once get_template_directory().'/inc/acf-fields.php';
}

/* -----------------------------------------------------------------------------
 * Setup theme
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_after_theme_setup' ) ) {
	function vw_after_theme_setup() {
		/**
		 * Make theme translatable
		 */
		load_theme_textdomain( 'envirra', get_template_directory() . '/languages' );

		/**
		 * Add supported features
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'audio', 'gallery', 'video' ) );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

		/**
		 * Define thumbnail sizes
		 */
		add_theme_support( 'post-thumbnails' );
		vw_add_image_sizes();

		/**
		 * Register menu
		 */
		register_nav_menu( 'vw_menu_main', 'Main Menu' );
		register_nav_menu( 'vw_menu_top', 'Top Menu' );
		register_nav_menu( 'vw_menu_bottom', 'Bottom Menu' );
		register_nav_menu( 'vw_menu_mobile', 'Mobile Menu' );

		/**
		 * Add custom filters
		 */
		add_filter( 'excerpt_length', 'vw_custom_excerpt_length' );

		add_filter( 'excerpt_more', 'vw_custom_excerpt_more' );
		// add_filter( 'the_content_more_link', 'vw_custom_read_more' );
		add_filter( 'body_class', 'vw_body_class_options' );
		add_filter( 'wp_title', 'vw_wp_title', 10, 2 );
		add_filter( 'widget_title', 'do_shortcode', 10, 2 );
		add_filter( 'widget_text', 'do_shortcode', 10, 2 );

		/**
		 * Add custom actions
		 */
		add_action( 'vw_action_site_header', 'vw_init_site_top_bar', 9 );
		add_action( 'vw_action_site_header', 'vw_init_site_header', 10 );
		add_action( 'vw_action_site_footer', 'vw_init_site_footer', 10 );
		add_action( 'vw_action_site_footer', 'vw_init_site_bottom_bar', 11 );
	}
	add_action( 'after_setup_theme', 'vw_after_theme_setup' );
}

/* -----------------------------------------------------------------------------
 * Add Image Sizes
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_add_image_sizes' ) ) {
	function vw_add_image_sizes() {
		add_image_size( 'vw_one_third_thumbnail', 360, 180, true ); // Size 1/3, Ratio 2:1
		add_image_size( 'vw_two_third_thumbnail', 750, 375, true );  // Size 2/3, Ratio 2:1
		add_image_size( 'vw_small_squared_thumbnail', 60, 60, true ); // Squared
		add_image_size( 'vw_medium_squared_thumbnail', 230, 230, true ); // Squared
		add_image_size( 'vw_full_width_thumbnail', 1140, 570, true ); // Size 1/1, Ratio 2:1
		add_image_size( 'vw_category_thumbnail', 200, 200, true ); // Squared
		add_image_size( 'vw_post_box_boxed_thumbnail', 788, 350, true );
	}
}

/* -----------------------------------------------------------------------------
 * Add Custom Excerpt Length
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_custom_excerpt_length' ) ) {
	function vw_custom_excerpt_length( $length ) {
		return intval( vw_get_theme_option( 'blog_excerpt_length' ) );
	}
}

/* -----------------------------------------------------------------------------
 * Add Custom Excerpt More
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_custom_excerpt_more' ) ) {
	function vw_custom_excerpt_more( $length ) {
		global $post;
		return ' ...';
	}
}

/* -----------------------------------------------------------------------------
 * Add Custom Read More
 * -------------------------------------------------------------------------- */
// if ( ! function_exists( 'vw_custom_read_more' ) ) {
// 	function vw_custom_read_more( $link ) {
// 		return __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'envirra' );
// 	}
// }

/* -----------------------------------------------------------------------------
 * Add Body Classes
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_body_class_options' ) ) {
	function vw_body_class_options( $classes ) {

		// Site layout class
		$site_layout = vw_get_theme_option( 'site_layout' );
		$classes[] = sprintf( 'vw-site-layout-%s', $site_layout );

		// Logo position class
		$logo_position = vw_get_theme_option( 'logo_position' );
		$classes[] = sprintf( 'vw-logo-position-%s', $logo_position );

		// Top bar layout class
		$top_bar = vw_get_theme_option( 'site_top_bar' );
		$classes[] = sprintf( 'vw-site-top-bar-%s', $top_bar );

		// Post layout class for single post page
		if ( is_single() ) {
			$post_layout = vw_get_post_layout();
			$classes[] = sprintf( 'vw-post-layout-%s', $post_layout );
		}

		if ( is_page() ) {
			if ( has_post_thumbnail( get_queried_object_id() ) ) {
				$classes[] = 'vw-page-has-thumbnail';
			}
		}

		return $classes;
	}
}

/* -----------------------------------------------------------------------------
 * Add Site Title
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_wp_title' ) ) {
	function vw_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', 'envirra' ), max( $paged, $page ) );
		}

		return $title;
	}
}

/* -----------------------------------------------------------------------------
 * Backsretch
 * -------------------------------------------------------------------------- */
add_action( 'wp_footer', 'vw_enqueue_scripts_backstretch', 99 );
if ( ! function_exists( 'vw_enqueue_scripts_backstretch' ) ) {
	function vw_enqueue_scripts_backstretch() {

		if ( function_exists( 'is_product' ) && is_product() ) return;

		if ( have_posts() ) { the_post();
			global $post;

			$image_urls = array();
			$image_captions = array();

			if ( is_single() && has_post_format( 'gallery' ) ) {
				$attachments = get_post_meta( get_the_ID(), 'vw_post_format_gallery_images', false );
				
				foreach ( $attachments as $attachment_ID ) {
					$full_image_url = wp_get_attachment_image_src( $attachment_ID, VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND );
					if ( $full_image_url ) {
						$image_urls[] = $full_image_url[0];

						$image_caption = get_post( $attachment_ID )->post_excerpt;
						if ( ! empty( $image_caption ) ) {
							$image_captions[] = sprintf( '<div class="vw-featured-image-caption hidden"><i class="icon-entypo-camera"></i> %s</div>', $image_caption );
						}
					}
				}
			}
			
			if ( ( is_single() && has_post_thumbnail() && empty( $image_urls ) ) || is_page() ) {
				$featured_image_id = vw_get_featured_image_id( $post->ID );

				$full_image_url = wp_get_attachment_image_src( $featured_image_id, VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND );
				if ( $full_image_url ) $image_urls[] = $full_image_url[0];

				$image_caption = get_post( $featured_image_id )->post_excerpt;
				if ( ! empty( $image_caption ) ) {
					$image_captions[] = sprintf( '<div class="vw-featured-image-caption hidden"><i class="icon-entypo-camera"></i> %s</div>', $image_caption );
				}
			}

			if ( is_category() ) {
				$image_id = vw_get_category_option( vw_get_archive_category_id(), 'category_background_image' );
				$full_image_url = wp_get_attachment_image_src( $image_id, VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND );

				if ( $full_image_url ) $image_urls[] = $full_image_url[0];
			}

			if ( function_exists( 'is_product_category' ) && is_product_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$image_id = vw_get_product_category_option( $cat_obj->term_id, 'category_background_image' );
				$full_image_url = wp_get_attachment_image_src( $image_id, VW_CONST_THUMBNAIL_SIZE_PAGE_TILE_BACKGROUND );

				if ( $full_image_url ) $image_urls[] = $full_image_url[0];
			}

			if ( ! empty( $image_urls ) ) { ?>

				<script id="vw-backstretch-image-captions-template" type="text/template">
					<div class="vw-page-title-image-captions .vw-featured-image-caption-wrapper">
						<?php echo implode( '', $image_captions ); ?>
					</div>
				</script>

				<script type='text/javascript'>
					"use strict";
					if ( jQuery.backstretch ) {
						var $target = jQuery( '.vw-page-title-wrapper' );
						$target.backstretch(
							['<?php echo implode( "','", $image_urls ) ?>'], {
								fade: <?php echo VW_CONST_BACKSTRETCH_OPT_FADE; ?>,
								centeredY: <?php echo VW_CONST_BACKSTRETCH_OPT_CENTEREDY; ?>,
								centeredX: <?php echo VW_CONST_BACKSTRETCH_OPT_CENTEREDX; ?>,
								duration: <?php echo VW_CONST_BACKSTRETCH_OPT_DURATION; ?>,
							}
						).addClass( 'vw-backstretch vw-has-background' );

						var $image_captions = jQuery( '#vw-backstretch-image-captions-template' ).html();
						$target.find( '.vw-page-title-wrapper-inner' ).before( $image_captions );

						jQuery( '.vw-gallery-direction-button.vw-gallery-direction-next' ).click( function() {
							$target.backstretch("next");
						} );

						jQuery( '.vw-gallery-direction-button.vw-gallery-direction-prev' ).click( function() {
							$target.backstretch("prev");
						} );

						jQuery(window).on("backstretch.after", function (e, instance, index) {
							jQuery( '.vw-page-title-image-captions .vw-featured-image-caption' )
								.addClass( 'hidden' )
								.eq( index ).removeClass( 'hidden' );
						});
					}
				</script>

			<?php }

			rewind_posts();
		}
	}
}

/* -----------------------------------------------------------------------------
 * Init Site Header
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_init_site_header' ) ) {
	function vw_init_site_header() {
		get_template_part( 'templates/site-header' );

		if ( vw_get_theme_option( 'site_enable_breadcrumb' ) && ! is_front_page()) {
			get_template_part( 'templates/breadcrumb' );
		}
	}
}

/* -----------------------------------------------------------------------------
 * Init Site Meta Tags
 * -------------------------------------------------------------------------- */
add_action( 'wp_head', 'vw_init_site_meta_tags' );
if ( ! function_exists( 'vw_init_site_meta_tags' ) ) {
	function vw_init_site_meta_tags() {
		get_template_part( 'templates/site-meta' );
	}
}

/* -----------------------------------------------------------------------------
 * Init Site Top-bar
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_init_site_top_bar' ) ) {
	function vw_init_site_top_bar() {
		$site_top_bar = vw_get_theme_option( 'site_top_bar' );
		if ( 'none' != $site_top_bar ) {
			get_template_part( 'templates/site-top-bar', $site_top_bar );
		}

		get_template_part( 'templates/breaking-news' );
	}
}

/* -----------------------------------------------------------------------------
 * Init Site Footer
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_init_site_footer' ) ) {
	function vw_init_site_footer() {
		$site_footer_layout = vw_get_theme_option( 'site_footer_layout' );
		if ( 'none' != $site_footer_layout ) {
			get_template_part( 'templates/site-footer' );
		}
	}
}

/* -----------------------------------------------------------------------------
 * Init Site Bottom-bar
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_init_site_bottom_bar' ) ) {
	function vw_init_site_bottom_bar() {
		$site_bottom_bar = vw_get_theme_option( 'site_bottom_bar' );
		if ( 'none' != $site_bottom_bar ) {
			get_template_part( 'templates/site-bottom-bar', $site_bottom_bar );
		}
	}
}

/* -----------------------------------------------------------------------------
 * Post Classes
 * -------------------------------------------------------------------------- */
add_filter( 'post_class', 'vw_post_classes' );
function vw_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

/* -----------------------------------------------------------------------------
 * Get Archive Blog Layout
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_archive_blog_layout' ) ) {
	function vw_get_archive_blog_layout() {
		$blog_layout = vw_get_theme_option( 'blog_default_layout' );

		if ( is_category() ) {
			$category_blog_layout = vw_get_category_option( vw_get_archive_category_id(), 'category_blog_layout', $blog_layout );

			if ( $category_blog_layout != 'site_default' ) $blog_layout = $category_blog_layout;
		}

		return $blog_layout;
	}
}

if ( ! function_exists( 'vw_get_post_layout' ) ) {
	function vw_get_post_layout() {
		global $post;
		$post_layout = get_post_meta( $post->ID, 'vw_post_layout', true );

		if ( 'site_default' == $post_layout ) {
			$post_layout = vw_get_theme_option( 'blog_post_layout' );
		}

		return $post_layout;
	}
}

/* -----------------------------------------------------------------------------
 * Allow Font File Uploads
 * -------------------------------------------------------------------------- */
add_filter('upload_mimes', 'vw_allowed_upload_mimes');
if ( ! function_exists( 'vw_allowed_upload_mimes' ) ) {
	function vw_allowed_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['ttf'] = 'font/ttf';
		$existing_mimes['otf'] = 'font/opentype';
		$existing_mimes['woff'] = 'font/woff';
		$existing_mimes['svg'] = 'font/svg';
		$existing_mimes['eot'] = 'font/eot';
		
		return $existing_mimes;
	}
}

/* -----------------------------------------------------------------------------
 * Add Link To Author Page
 * -------------------------------------------------------------------------- */
add_filter( 'get_comment', 'vw_force_comment_author_url' );
function vw_force_comment_author_url( $comment ) {
	// does the comment have a valid author URL?
	$no_url = !$comment->comment_author_url || $comment->comment_author_url == 'http://';

	if ( $comment->user_id && $no_url ) {
		// comment was written by a registered user but with no author URL
		$comment->comment_author_url = get_author_posts_url( $comment->user_id );
	}

	return $comment;
}

/* -----------------------------------------------------------------------------
 * Post box class
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_post_box_class' ) ) {
	function vw_post_box_class( $class = '' ) {		
		$classes = array( 'vw-post-box' );

		if ( ! empty( $class ) ) {
			$classes[] = $class;
		}

		if ( has_post_format() ) {
			$classes[] = ' vw-post-box-format-'.get_post_format();
		} else {
			$classes[] = ' vw-post-box-format-standard';
		}

		if ( vw_has_review() ) {
			$classes[] = ' vw-post-box-has-review';
		} else {
			$classes[] = ' vw-post-box-has-no-review';
		}

		echo 'class="' . join( ' ', $classes ) . '"';
	}
}