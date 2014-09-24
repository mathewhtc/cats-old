<?php

require_once get_template_directory().'/framework/menu/menu-walkers.php';
require_once get_template_directory().'/framework/menu/mega-menu-edit.php';

add_filter( 'vw_filter_main_menu_additional_items', 'vw_main_menu_additional_items' );
if ( ! function_exists( 'vw_main_menu_additional_items' ) ) {
	function vw_main_menu_additional_items( $content ) {
		// Nav Logo
		$nav_logo_html = '';
		$nav_logo = vw_get_theme_option( 'nav_logo' );
		if ( ! empty( $nav_logo['url'] ) ) {
			$nav_logo_html .= '<li class="vw-menu-additional-logo">';
			$nav_logo_html .= '<a href="'.home_url().'">';
			$nav_logo_html .= '<img class="animated" src="'.$nav_logo['url'].'" alt="'.get_bloginfo( 'name' ).'">';
			$nav_logo_html .= '</a>';
			$nav_logo_html .= '</li>';
		}

		// Menu icons
		$menu_icons_html = '<li class="vw-menu-additional-icons">'.vw_get_the_menu_icons().'</li>';

		return $nav_logo_html.$menu_icons_html;
	}
}

add_action( 'vw_action_mega_menu_render_as_category', 'vw_mega_menu_render_as_category_recent', 10, 2 );
if ( ! function_exists( 'vw_mega_menu_render_as_category_recent' ) ) {
	function vw_mega_menu_render_as_category_recent( $item, $depth ) {
		if ( $item->object != 'category' ) return;

		if ( $item->vw_menu_type == 'category' ) { 
			$post_args = array(
				'posts_per_page' => 3,
				'offset'=> 0,
				'cat' => $item->object_id,
				'ignore_sticky_posts' => 1,
				'meta_query' => array(
					array(
						'key' => '_thumbnail_id',
						'compare' => 'EXISTS'
					),
				),
			);
			query_posts( apply_filters( 'vw_filter_mega_menu_query_args', $post_args ) );

			$template_file = sprintf( 'templates/mega-post-menu.php' );
			include( locate_template( $template_file, false, false ) );

			wp_reset_query();
		}
	}
}