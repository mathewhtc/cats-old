<?php
defined( 'VW_CONST_POST_VIEWS_URL' ) || define( 'VW_CONST_POST_VIEWS_URL', get_template_directory_uri().'/framework/post-views' );

/* -----------------------------------------------------------------------------
 * Render Post Views Element
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_post_views' ) ) {
	function vw_the_post_views( $post_id = '' ) {
		echo vw_get_the_post_views( $post_id );
	}
}

if ( ! function_exists( 'vw_get_the_post_views' ) ) {
	function vw_get_the_post_views( $post_id = '' ) {
		global $post;

		if ( ! vw_get_theme_option( 'blog_enable_post_views' ) ) return;

		if( empty( $post_id ) ) $post_id = $post->ID;
		
		$count = vw_get_post_views( $post_id );
		$output = '<span class="vw-post-views vw-post-views-id-'.$post_id.'" data-post-id="'.$post_id.'">';
		$output .= '<i class="vw-post-views-icon icon-entypo-eye"></i>';
		$output .= '<span class="vw-post-views-count">'.number_format_i18n( $count ).'</span>';
		$output .= '</span>';

		return $output;
	}
}

if ( ! function_exists( 'vw_get_post_views' ) ) {
	function vw_get_post_views( $post_id = '' ) {
		global $post;

		if ( ! vw_get_theme_option( 'blog_enable_post_views' ) ) return;

		if( empty( $post_id ) ) $post_id = $post->ID;

		$count = get_post_meta( $post_id, 'vw_post_views', true );

		if( $count == '' ) {
			$count = 0;
			delete_post_meta( $post_id, 'vw_post_views' );
			add_post_meta( $post_id, 'vw_post_views', 0 );
		}

		return $count;
	}
}

/* -----------------------------------------------------------------------------
 * Count Post Views
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_count_post_views' ) ) {
	function vw_count_post_views( $post_id = '' ) {
		global $post;

		if ( ! vw_get_theme_option( 'blog_enable_post_views' ) ) return;

		if( empty( $post_id ) ) $post_id = $post->ID;

		$count = vw_get_post_views( $post_id );


			$count++;
			update_post_meta( $post_id, 'vw_post_views', $count );
		

		return $count;
	}
}

/* -----------------------------------------------------------------------------
 * Post Views Script
 * -------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'vw_enqueue_post_views_scripts' );
if ( ! function_exists( 'vw_enqueue_post_views_scripts' ) ) {
	function vw_enqueue_post_views_scripts() {
		global $post;

		if ( ! vw_get_theme_option( 'blog_enable_post_views' ) ) return;

		if ( is_single() ) {
			wp_enqueue_script( 'vwjs-post-views', VW_CONST_POST_VIEWS_URL.'/post-views-ajax.js', array( 'jquery' ) );
			wp_localize_script( 'vwjs-post-views', 'vw_post_views', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'post_id' => intval( $post->ID )
			) );
		}
	}
}

/* -----------------------------------------------------------------------------
 * Post Views AJAX
 * -------------------------------------------------------------------------- */
add_action( 'wp_ajax_postviews', 'vw_ajax_count_post_views' );
add_action( 'wp_ajax_nopriv_postviews', 'vw_ajax_count_post_views' );
if ( ! function_exists( 'vw_ajax_count_post_views' ) ) {
	function vw_ajax_count_post_views() {

		if ( ! vw_get_theme_option( 'blog_enable_post_views' ) ) return;

		if( ! empty( $_GET['postviews_id'] ) ) {
			$post_id = intval( $_GET['postviews_id'] );

			if( $post_id > 0 ) {
				$count = vw_count_post_views( $post_id );
				echo $count;
			}
		}

		exit();
	}
}

/* -----------------------------------------------------------------------------
 * Add Post Views Column
 * -------------------------------------------------------------------------- */
add_filter( 'manage_posts_columns', 'vw_posts_column_views' );
if ( ! function_exists( 'vw_posts_column_views' ) ) {
	function vw_posts_column_views( $defaults ) {
		$defaults['vw_post_views'] = __( 'Views', 'envirra' );
		return $defaults;
	}
}

add_action( 'manage_posts_custom_column', 'vw_posts_custom_column_views', 5, 2 );
if ( ! function_exists( 'vw_posts_custom_column_views' ) ) {
	function vw_posts_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'vw_post_views' ){
			$count = vw_get_post_views( get_the_ID() );

			echo '<span class="vw-post-views">';
			printf( __( '%s Views', 'envirra' ), number_format_i18n( $count ) );
			echo '</span>';
		}
	}
}