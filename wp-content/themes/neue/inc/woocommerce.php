<?php
/* -----------------------------------------------------------------------------
 * WooCommerce
 * -------------------------------------------------------------------------- */
defined( 'VW_CONST_WOO_PLUGIN_URL' ) || define( 'VW_CONST_WOO_PLUGIN_URL', get_template_directory_uri().'/framework/woocommerce' );

// define('WOOCOMMERCE_USE_CSS', false);

if ( ! function_exists( 'vw_setup_woocommerce' ) ) {
	function vw_setup_woocommerce() {
		add_theme_support( 'woocommerce' );

		// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
		// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
		// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

		add_filter( 'woocommerce_show_page_title', '__return_false' );

		// Hide archive description
		remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
	}
	add_action( 'after_setup_theme', 'vw_setup_woocommerce' );
}

if ( ! function_exists( 'vw_has_woocommerce' ) ) {
	function vw_has_woocommerce() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'vw_is_enable_sidebar' ) ) {
	function vw_woo_is_enable_sidebar() {
		$is_enable_sidebar = ( ! is_product() && vw_get_theme_option( 'woocommerce_enable_shop_sidebar' ) )
								|| ( is_product() && vw_get_theme_option( 'woocommerce_enable_product_sidebar' ) );
		return $is_enable_sidebar;
	}
}

if ( ! function_exists( 'vw_setup_woocommerce_image_dimensions' ) ) {
	function vw_setup_woocommerce_image_dimensions() {
		$catalog = array( // vw_square_medium size
			'width' 	=> '750',	// px
			'height'	=> '750',	// px
			'crop'		=> 1 		// true
		);
	 
		$single = array(
			'width' 	=> '750',	// px
			'height'	=> '750',	// px
			'crop'		=> 1 		// true
		);
	 
		$thumbnail = array(
			'width' 	=> '360',	// px
			'height'	=> '360',	// px
			'crop'		=> 0 		// false
		);
	 
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'vw_setup_woocommerce_image_dimensions' );
}

// add_filter( 'woocommerce_breadcrumb_defaults', 'vw_change_breadcrumb_delimiter' );
function vw_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimiter from '/' to '>'
	$defaults['delimiter'] = ' <span class="breadcrumb-delimiter">/</span> ';
	$defaults['wrap_before'] = '<div class="vw-woocommerce-breadcrumb header-font" itemprop="breadcrumb">';
	$defaults['wrap_after'] = '</div>';
	$defaults['home'] = __( 'Shop', 'envirra' );
	return $defaults;
}

// add_filter( 'woocommerce_breadcrumb_home_url', 'vw_woo_get_shop_permalink' );
if ( ! function_exists( 'vw_woo_get_shop_permalink' ) ) {
	function vw_woo_get_shop_permalink() {
	    return get_permalink( woocommerce_get_page_id( 'shop' ) );
	}
}

if ( ! function_exists( 'vw_woo_get_cart_permalink' ) ) {
	function vw_woo_get_cart_permalink() {
		global $woocommerce;
		return $woocommerce->cart->get_cart_url();
	}
}

add_filter( 'loop_shop_columns', 'vw_woo_product_columns' );
if ( ! function_exists( 'vw_woo_product_columns' ) ) {
	function vw_woo_product_columns() {
		if ( vw_woo_is_enable_sidebar() ) {
			return 3;
		} else {
			return 4;
		}
	}
}

/* -----------------------------------------------------------------------------
 * Product per page option
 * -------------------------------------------------------------------------- */
add_filter( 'loop_shop_per_page', 'vw_woo_setup_product_per_page' );
if ( ! function_exists( 'vw_woo_setup_product_per_page' ) ) {
	function vw_woo_setup_product_per_page() {
		return vw_get_theme_option( 'woocommerce_products_per_page' );
	}
}

/* -----------------------------------------------------------------------------
 * Add Body Classes
 * -------------------------------------------------------------------------- */
add_filter( 'body_class', 'vw_woo_body_class_options' );
if ( ! function_exists( 'vw_woo_body_class_options' ) ) {
	function vw_woo_body_class_options( $classes ) {
		if ( vw_has_woocommerce() && is_woocommerce() ) {
			if ( is_product() ) {
				$is_enable_sidebar = vw_get_theme_option( 'woocommerce_enable_product_sidebar' );

				if ( $is_enable_sidebar ) {
					$classes[] = 'woocommerce-enable-product-sidebar';
				} else {
					$classes[] = 'woocommerce-disable-product-sidebar';
				}
			} else {
				$is_enable_sidebar = vw_get_theme_option( 'woocommerce_enable_shop_sidebar' );

				if ( $is_enable_sidebar ) {
					$classes[] = 'woocommerce-enable-shop-sidebar';
				} else {
					$classes[] = 'woocommerce-disable-shop-sidebar';
				}
			}
		}

		return $classes;
	}
}

/* -----------------------------------------------------------------------------
 * Template Tag: Cart Button
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_woo_cart_button' ) ) {
	function vw_woo_cart_button() {
		if ( ! vw_has_woocommerce() ) return;
		?>
		<span class="vw-cart-button-wrapper">
			<?php vw_woo_render_cart_button(); ?>
			<?php vw_woo_render_cart_panel(); ?>
		</span>
		<?php
	}
}

if ( ! function_exists( 'vw_woo_render_cart_button' ) ) {
	function vw_woo_render_cart_button() {
		global $woocommerce;
		?>

		<a class="vw-cart-button" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'envirra'); ?>">
			<i class="icon-entypo-basket"></i>
			<?php if ( $woocommerce->cart->cart_contents_count ) : ?>
				<span class="vw-cart-button-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
			<?php endif; ?>
		</a>

		<?php
	}
}

if ( ! function_exists( 'vw_woo_render_cart_panel' ) ) {
	function vw_woo_render_cart_panel() {
		if ( ! is_woocommerce() ) return;
		?>

		<div class="vw-cart-button-panel">
			<?php the_widget( 'WC_Widget_Cart' ); ?>
		</div>

		<?php
	}
}

add_filter( 'add_to_cart_fragments', 'vw_woo_add_cart_fragment' );
if ( ! function_exists( 'vw_woo_add_cart_fragment' ) ) {
	function vw_woo_add_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start();
		vw_woo_render_cart_button();
		$fragments['.vw-cart-button'] = ob_get_clean();
		
		return $fragments;
	}
}