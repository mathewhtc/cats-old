<?php

add_filter( 'bbp_no_breadcrumb', 'vw_bbp_no_breadcrumb' );
if ( ! function_exists( 'vw_bbp_no_breadcrumb' ) ) {
	function vw_bbp_no_breadcrumb( $arg ) {
		return true;
	}
}

add_filter( 'bbp_after_get_user_subscribe_link_parse_args', 'vw_bbp_remove_subscribe_before' );
if ( ! function_exists( 'vw_bbp_remove_subscribe_before' ) ) {
	function vw_bbp_remove_subscribe_before( $args ) {
		$args[ 'before' ] = '';

		return $args;
	}
}

add_filter( 'bbp_after_get_topic_tag_list_parse_args', 'vw_bbp_edit_tag_list' );
if ( ! function_exists( 'vw_bbp_edit_tag_list' ) ) {
	function vw_bbp_edit_tag_list( $args ) {
		$args[ 'before' ] = '<div class="bbp-topic-tags"><p><strong>' . esc_html__( 'Tagged:', 'bbpress' ) . '</strong>&nbsp;';

		return $args;
	}
}