<?php 

if ( ! function_exists( 'vw_get_breaking_news_posts' ) ) {
	function vw_get_breaking_news_posts() {
		$args = array(
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'posts_per_page' => 10,
		);

		return new WP_Query( apply_filters( 'vw_filter_breaking_news_query_args', $args ) );
	}
}