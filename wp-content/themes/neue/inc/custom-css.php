<?php

/* -----------------------------------------------------------------------------
 * Render Custom CSS
 * -------------------------------------------------------------------------- */
add_action( 'wp_head', 'vw_render_custom_css', 99 );
if ( ! function_exists( 'vw_render_custom_css' ) ) {
	function vw_render_custom_css() {
		global $vw_neue;
	?>
	<style type="text/css">
		<?php
		$font_url_format = "url( '%s' )";
		?>
		<?php
		$font1_urls = array();
		if ( ! empty( $vw_neue['custom_font1_ttf']['url'] ) ) $font1_urls[] = sprintf( $font_url_format, $vw_neue['custom_font1_ttf']['url'] );
		if ( ! empty( $vw_neue['custom_font1_woff']['url'] ) ) $font1_urls[] = sprintf( $font_url_format, $vw_neue['custom_font1_woff']['url'] );
		if ( ! empty( $vw_neue['custom_font1_svg']['url'] ) ) $font1_urls[] = sprintf( $font_url_format, $vw_neue['custom_font1_svg']['url'] );
		if ( ! empty( $vw_neue['custom_font1_eot']['url'] ) ) $font1_urls[] = sprintf( $font_url_format, $vw_neue['custom_font1_eot']['url'] );

		if ( ! empty( $font1_urls ) ) : ?>
		@font-face {
			font-family: 'custom_font_1';
			src: <?php echo implode( ",", $font1_urls ); ?>;
		}
		<?php endif; ?>

		<?php
		$font2_urls = array();
		if ( ! empty( $vw_neue['custom_font2_ttf']['url'] ) ) $font2_urls[] = sprintf( $font_url_format, $vw_neue['custom_font2_ttf']['url'] );
		if ( ! empty( $vw_neue['custom_font2_woff']['url'] ) ) $font2_urls[] = sprintf( $font_url_format, $vw_neue['custom_font2_woff']['url'] );
		if ( ! empty( $vw_neue['custom_font2_svg']['url'] ) ) $font2_urls[] = sprintf( $font_url_format, $vw_neue['custom_font2_svg']['url'] );
		if ( ! empty( $vw_neue['custom_font2_eot']['url'] ) ) $font2_urls[] = sprintf( $font_url_format, $vw_neue['custom_font2_eot']['url'] );
			
		if ( ! empty( $font2_urls ) ) : ?>
		@font-face {
			font-family: 'custom_font_2';
			src: <?php echo implode( ",", $font2_urls ); ?>;
		}
		<?php endif; ?>

		.header-font, .vw-menu-location-main .main-menu-link span,
		.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce-page ul.cart_list li a, .woocommerce-page ul.product_list_widget li a
		{
			<?php if ( ! empty( $vw_neue['typography_header']['font-family'] ) ) : 
				echo 'font-family: ', $vw_neue['typography_header']['font-family'];
			endif; ?>

			<?php if ( ! empty( $vw_neue['typography_header']['font-backup'] ) ) : 
				echo 'font-backup: ', $vw_neue['typography_header']['font-backup'];
			endif; ?>

			<?php if ( ! empty( $vw_neue['typography_header']['font-style'] ) ) : 
				echo 'font-style: ', $vw_neue['typography_header']['font-style'];
			endif; ?>

			font-weight: <?php echo $vw_neue['typography_header']['font-weight']; ?>;
		}

		.woocommerce .cart-collaterals .shipping_calculator h2, .woocommerce-page .cart-collaterals .shipping_calculator h2,
		body.buddypress.groups .vw-page-title .bp-title-button,
		body.buddypress.groups div#item-header div#item-actions h3
		{
			<?php if ( ! empty( $vw_neue['typography_body']['font-family'] ) ) : 
				echo 'font-family: ', $vw_neue['typography_body']['font-family'];
			endif; ?>

			<?php if ( ! empty( $vw_neue['typography_body']['font-backup'] ) ) : 
				echo 'font-backup: ', $vw_neue['typography_body']['font-backup'];
			endif; ?>

			<?php if ( ! empty( $vw_neue['typography_body']['font-style'] ) ) : 
				echo 'font-style: ', $vw_neue['typography_body']['font-style'];
			endif; ?>

			font-weight: <?php echo $vw_neue['typography_body']['font-weight']; ?>;
		}

		a, a:hover, a:focus,
		.vw-404-text,
		.vw-accent-text,
		.vw-accent-text-hover:hover,
		.flex-direction-nav a:hover,
		.vw-post-date:hover, .vw-post-date:hover i,
		.vw-post-meta a:hover,
		.vw-post-likes.vw-post-liked i,
		.vw-search-form .vw-search-icon,
		em, .entry-title em, .widget-title em, .vw-related-posts-title em, .vw-post-comments-title em, .vw-page-title em, .vw-post-box-layout-title em, .vwspc-section-title em,
		.woocommerce .star-rating span, .woocommerce-page .star-rating span,
		.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
		.woocommerce #content div.product div.summary .price, .woocommerce div.product div.summary .price, .woocommerce-page #content div.product div.summary .price, .woocommerce-page div.product div.summary .price,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a
		{ color: <?php echo $vw_neue['color_primary']; ?>; }

		
		button, input[type=button], input[type=submit], .btn-primary,
		.vw-cart-button-count,
		.vw-cart-button-panel .widget.woocommerce.widget_shopping_cart a.button,
		.vw-page-links > .vw-page-link,
		.vw-dropcap-circle, .vw-dropcap-box,
		.vw-accent-bg,
		.vw-label,
		.vw-featured-image-button,
		.vw-post-categories a,
		.vw-page-navigation-pagination .page-numbers.current,
		.vw-page-navigation-pagination .page-numbers:hover,
		.vw-review-total-score, .vw-review-item-score.vw-review-score-percentage,
		.vw-post-tabed-tab.ui-state-active,
		.vw-post-meta-right > *:hover,
		article.post .vw-post-meta-right > *:hover,
		.vw-gallery-direction-button:hover,
		#wp-calendar tbody td:hover,
		.woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt,
		.woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li span.current,
		.bbp-pagination-links a:hover, .bbp-pagination-links span.current
		{ background-color: <?php echo $vw_neue['color_primary']; ?>; }

		::selection { background: <?php echo $vw_neue['color_primary']; ?>; }
		::-moz-selection { color: white; background: <?php echo $vw_neue['color_primary']; ?>; }

		#buddypress button:hover, #buddypress a.button:hover, #buddypress a.button:focus, #buddypress input[type=submit]:hover, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress ul.button-nav li a:hover, #buddypress ul.button-nav li.current a, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover,
		#buddypress div.item-list-tabs ul li.selected a, #buddypress div.item-list-tabs ul li.current a,
		.widget.buddypress.widget_bp_groups_widget div.item-options a.selected,
		.widget.buddypress.widget_bp_core_members_widget div.item-options a.selected,
		.woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a,
		.woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a
		{
			background-color: <?php echo $vw_neue['color_primary']; ?>;
			border-color: <?php echo $vw_neue['color_primary']; ?>;
		}

		.woocommerce span.onsale, .woocommerce-page span.onsale,
		.woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt,
		.woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range
		{ background: <?php echo $vw_neue['color_primary']; ?>; }

		.comment .author-name a, .pingback .author-name a,
		.vw-quote, blockquote,
		.woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .woocommerce-page ul.cart_list li a, .woocommerce-page ul.product_list_widget li a
		{ color: <?php echo $vw_neue['typography_header']['color']; ?>; }

		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle
		{ border-color: <?php echo $vw_neue['color_primary']; ?>; }
		
		/* Site top bar */
		.vw-site-top-bar {
			background-color: <?php echo $vw_neue['color_topbar_bg']; ?>;
		}

		.vw-site-top-bar, .vw-site-top-bar a {
			color: <?php echo $vw_neue['color_topbar_text']; ?>;
		}

		.vw-site-top-bar .main-menu-item:hover,
		.vw-site-top-bar .vw-site-social-profile-icon:hover {
			background-color: <?php echo $vw_neue['color_topbar_hilight']; ?>;
		}

		.vw-menu-location-top .sub-menu { background-color: <?php echo $vw_neue['color_topbar_submenu_bg']; ?>; }
		.vw-menu-location-top .sub-menu-link { color: <?php echo $vw_neue['color_topbar_submenu_text']; ?>; }
		.no-touch .vw-menu-location-top .sub-menu-item:hover { background-color: <?php echo $vw_neue['color_topbar_submenu_hilight']; ?>; }
		
		.vw-menu-main-wrapper .vw-menu-main-inner,
		.vw-menu-mobile-wrapper .vw-menu-mobile-inner {
			background-color: <?php echo $vw_neue['color_main_menu_bg']; ?>;
		}

		.vw-menu-main-wrapper,
		.vw-menu-location-main .main-menu-link,
		.vw-menu-mobile-wrapper,
		.vw-menu-mobile-wrapper .main-menu-link,
		.vw-instant-search-result-link,
		.vw-cart-button {
			color: <?php echo $vw_neue['color_main_menu_text']; ?>;
		}

		.vw-menu-location-main .sub-menu-link,
		.vw-menu-location-mobile .sub-menu-link {
			color: <?php echo $vw_neue['color_main_submenu_text']; ?>;
		}

		.vw-menu-location-main .main-menu-item:hover,
		.vw-menu-location-main .menu-item-depth-0.current-menu-item:after,
		.vw-menu-location-main .menu-item-depth-0.current-menu-parent:after,
		.vw-menu-location-main .menu-item-depth-0.current-category-ancestor:after,
		.vw-menu-location-main .menu-item-depth-0.current-post-ancestor:after,
		.vw-menu-location-mobile .main-menu-item > a:hover,
		.vw-mobile-menu-button:hover,
		.vw-instant-search-buton:hover,
		.vw-user-login-button:hover,
		.vw-cart-button-wrapper:hover .vw-cart-button {
			background-color: <?php echo $vw_neue['color_main_menu_hilight']; ?>;
		}

		.vw-instant-search-result-link:hover,
		.vw-instant-search-all-result a:hover {
			color: <?php echo $vw_neue['color_main_menu_hilight']; ?>;
		}

		.vw-menu-location-main .sub-menu,
		.vw-menu-location-mobile,
		.vw-menu-location-mobile .sub-menu,
		.vw-instant-search-panel,
		.vw-cart-button-panel {
			background-color: <?php echo $vw_neue['color_main_submenu_bg']; ?>;
			color: <?php echo $vw_neue['color_main_submenu_text']; ?>;
		}
		.vw-cart-button-panel *,
		.vw-cart-button-panel .cart_list.product_list_widget a {
			color: <?php echo $vw_neue['color_main_submenu_text']; ?>;
		}

		.vw-menu-location-main .sub-menu-wrapper,
		.vw-menu-location-mobile .sub-menu-wrapper {
			background-color: <?php echo $vw_neue['color_main_mega_post_bg']; ?>;
		}

		.vw-menu-location-main .sub-menu-item:hover,
		.vw-menu-location-mobile .sub-menu-link:hover {
			background-color: <?php echo $vw_neue['color_main_submenu_hilight']; ?>;
		}
		
		.vw-breadcrumb-wrapper { background-color: <?php echo $vw_neue['color_breadcrumb_bg']; ?>; }

		/* Footer */
		.vw-site-footer {
			background-color: <?php echo $vw_neue['color_footer_bg']; ?>;
		}

		.vw-site-footer,
		.vw-site-footer h1,
		.vw-site-footer h2,
		.vw-site-footer h3,
		.vw-site-footer h4,
		.vw-site-footer h5,
		.vw-site-footer h6
		{
			color: <?php echo $vw_neue['color_footer_text']; ?>;
		}

		
		.vw-site-footer .widget-title,
		.vw-site-footer a
		{
			color: <?php echo $vw_neue['color_footer_link']; ?>;
		}

		/* Site bottom bar */
		.vw-site-bottom-bar {
			background-color: <?php echo $vw_neue['color_bottombar_bg']; ?>;
			color: <?php echo $vw_neue['color_bottombar_text']; ?>;
		}

		.vw-site-bottom-bar .vw-site-social-profile-icon:hover {
			background-color: <?php echo $vw_neue['color_bottombar_hilight']; ?>;
		}

		/* Custom Styles */
		<?php do_action( 'vw_action_render_custom_css' ); ?>
	</style>
	<?php
	}
}

/* -----------------------------------------------------------------------------
 * Render Custom CSS option
 * -------------------------------------------------------------------------- */
add_action( 'vw_action_render_custom_css', 'vw_render_custom_css_option' );
if ( ! function_exists( 'vw_render_custom_css_option' ) ) {
	function vw_render_custom_css_option() {
		echo vw_get_theme_option( 'custom_css' );
	}
}

/* -----------------------------------------------------------------------------
 * Render Category Color
 * -------------------------------------------------------------------------- */
add_action( 'vw_action_render_custom_css', 'vw_render_category_color' );
if ( ! function_exists( 'vw_render_category_color' ) ) {
	function vw_render_category_color() {
		$category_ids = get_all_category_ids();

		foreach( $category_ids as $cat_id ) :
			$color = vw_get_category_option( $cat_id, 'category_color' );
			if ( empty( $color ) ) continue;
			?>

			.vw-label.vw-cat-id-<?php echo $cat_id ?>,
			.vw-menu-location-main .main-menu-item.vw-cat-id-<?php echo $cat_id ?>:hover,
			.vw-menu-location-main .menu-item-depth-0.current-menu-item.vw-cat-id-<?php echo $cat_id ?>:after,
			.vw-menu-location-main .menu-item-depth-0.current-menu-parent.vw-cat-id-<?php echo $cat_id ?>:after,
			.vw-menu-location-main .menu-item-depth-0.current-category-ancestor.vw-cat-id-<?php echo $cat_id ?>:after,
			.vw-menu-location-main .menu-item-depth-0.current-post-ancestor.vw-cat-id-<?php echo $cat_id ?>:after,
			.vw-post-categories a.vw-cat-id-<?php echo $cat_id ?> {
				background-color: <?php echo $color ?>;
			}

			.vw-post-box-layout-title .vw-cat-id-<?php echo $cat_id ?> em {
				color: <?php echo $color ?>;
			}
		
		<?php endforeach;
	}
}