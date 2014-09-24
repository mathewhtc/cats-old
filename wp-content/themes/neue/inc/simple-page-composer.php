<?php

/* -----------------------------------------------------------------------------
 * Include The Simple Page Composer
 * -------------------------------------------------------------------------- */
require_once( get_template_directory().'/framework/simple-page-composer/simple-page-composer.php' );

/* -----------------------------------------------------------------------------
 * Section Settings
 * -------------------------------------------------------------------------- */
add_filter( 'vwspc_filter_init_sections', 'vw_init_spc_sections' );
if ( ! function_exists( 'vw_init_spc_sections' ) ) {
	function vw_init_spc_sections( $available_sections ) {
		$sections = array(
			'post_box' => array(
				'title' =>'Post Box',
				'options' => array(
					'title' => array(
						'title' => 'Title',
						'description' => 'Enter the title',
						'field' => 'text',
						'default' => '',
					),
					'number' => array(
						'title' => 'Number of post',
						'description' => 'Enter the number',
						'field' => 'number',
						'default' => 5,
					),
					'category' => array(
						'title' => 'Category',
						'description' => 'Choose a post category to be shown up',
						'field' => 'category_with_all_option',
						'default' => '0',
					),
					'exclude_categories' => array(
						'title' => 'Exclude Categories',
						'description' => 'Choose the post categories to be excluded',
						'field' => 'categories',
						'default' => '',
					),
					'posts_order' => array(
						'title' => 'Posts Order',
						'description' => 'Choose the post s ordering',
						'field' => 'select',
						'default' => 'latest_posts',
						'options' => array(
							'latest_posts' => 'Latest Posts',
							'latest_gallery_posts' => 'Latest Gallery Posts',
							'latest_video_posts' => 'Latest Video Posts',
							'latest_audio_posts' => 'Latest Audio Posts',
							'latest_featured' => 'Latest Featured Posts',
							'latest_reviews' => 'Latest Reviews',
							'most_viewed' => 'Most Viewed',
							'most_review_scores' => 'Most Review Scores',
						),
					),
					'layout' => array(
						'title' => 'Layout',
						'description' => 'Choose the post box layout',
						'field' => 'select',
						'default' => 'large-grid',
						'options' => array(
							'grid-3-col' => 'Grid (3-Col)',
							'large-grid' => 'Large Grid',
							'large-grid-3-col' => 'Large Grid (3-Col)',
							'medium-grid' => 'Medium Grid',
							'medium-grid-3-col' => 'Medium Grid (3-Col)',
							'small-grid' => 'Small Grid',
							'small-grid-3-col' => 'Small Grid (3-Col)',
							'large-small' => 'Large &amp; Small',
							'large-small-3-col' => 'Large &amp; Small (3-Col)',
							'custom-1' => 'Custom 1',
							'custom-2' => 'Custom 2',
							'custom-3' => 'Custom 3',
							'custom-4' => 'Custom 4',
						),
					),
					/*'show_pagination' => array(
						'title' => 'Pagination',
						'description' => 'Show pagination',
						'field' => 'select',
						'default' => 'no',
						'options' => array(
							'yes' => 'Yes',
							'no' => 'No',
						),
					),*/
				),
			),

			'post_box_sidebar' => array(
				'title' =>'Post Box with Sidebar',
				'options' => array(
					'title' => array(
						'title' => 'Title',
						'description' => 'Enter the title',
						'field' => 'text',
						'default' => '',
					),
					'number' => array(
						'title' => 'Number of post',
						'description' => 'Enter the number',
						'field' => 'number',
						'default' => 5,
					),
					'category' => array(
						'title' => 'Category',
						'description' => 'Choose a post category to be shown up',
						'field' => 'category_with_all_option',
						'default' => '0',
					),
					'exclude_categories' => array(
						'title' => 'Exclude Categories',
						'description' => 'Choose the post categories to be excluded',
						'field' => 'categories',
						'default' => '',
					),
					'posts_order' => array(
						'title' => 'Posts Order',
						'description' => 'Choose the post s ordering',
						'field' => 'select',
						'default' => 'latest_posts',
						'options' => array(
							'latest_posts' => 'Latest Posts',
							'latest_gallery_posts' => 'Latest Gallery Posts',
							'latest_video_posts' => 'Latest Video Posts',
							'latest_audio_posts' => 'Latest Audio Posts',
							'latest_featured' => 'Latest Featured Posts',
							'latest_reviews' => 'Latest Reviews',
							'most_viewed' => 'Most Viewed',
							'most_review_scores' => 'Most Review Scores',
						),
					),
					'layout' => array(
						'title' => 'Layout',
						'description' => 'Choose the post box layout',
						'field' => 'select',
						'default' => 'large-grid',
						'options' => array(
							'grid-3-col' => 'Grid (3-Col)',
							'large-grid' => 'Large Grid',
							'large-grid-3-col' => 'Large Grid (3-Col)',
							'medium-grid' => 'Medium Grid',
							'medium-grid-3-col' => 'Medium Grid (3-Col)',
							'small-grid' => 'Small Grid',
							'small-grid-3-col' => 'Small Grid (3-Col)',
							'large-small' => 'Large &amp; Small',
							'large-small-3-col' => 'Large &amp; Small (3-Col)',
							'custom-1' => 'Custom 1',
							'custom-2' => 'Custom 2',
							'custom-3' => 'Custom 3',
							'custom-4' => 'Custom 4',
						),
					),
					'sidebar' => array(
						'title' => 'Sidebar',
						'description' => 'Choose a sidebar to be shown up',
						'field' => 'sidebar',
						'default' => '0',
					),
				),
			),

			'post_slider' => array(
				'title' => 'Post Slider',
				'options' => array(
					'number' => array(
						'title' => 'Number of slide',
						'description' => 'Enter the number',
						'field' => 'number',
						'default' => 3,
					),
					'category' => array(
						'title' => 'Category',
						'description' => 'Choose a post category to be shown up',
						'field' => 'category_with_all_option',
						'default' => '0',
					),
					'posts_order' => array(
						'title' => 'Posts Order',
						'description' => 'Choose the post s ordering',
						'field' => 'select',
						'default' => '0',
						'options' => array(
							'latest_posts' => 'Latest Posts',
							'latest_featured' => 'Latest Featured Posts',
							'latest_reviews' => 'Latest Reviews',
							'most_review_scores' => 'Most Review Scores',
						),
					),
				),
			),

			'custom_content' => array(
				'title' => 'Custom Content',
				'options' => array(
					'title' => array(
						'title' => 'Title',
						'description' => 'The section title',
						'field' => 'text',
						'default' => '',
					),
					'content' => array(
						'title' => 'Content',
						'description' => 'Enter the content (HTML is allowance)',
						'field' => 'html',
						'default' => '',
					),
					'sidebar' => array(
						'title' => 'Sidebar',
						'description' => 'Choose a sidebar to be shown up',
						'field' => 'sidebar',
						'default' => '0',
					),
				),
			),
		);

		return array_merge( $sections, $available_sections);
	}
}

/**
Renderers
 */

/* -----------------------------------------------------------------------------
 * Render Section: Post Slider
 * -------------------------------------------------------------------------- */
add_action( 'vwspc_action_render_section_post_slider', 'vw_render_spc_section_post_slider' );
if ( ! function_exists( 'vw_render_spc_section_post_slider' ) ) {
	function vw_render_spc_section_post_slider( $args ) {
		extract( $args );
		$number_of_slide = get_post_meta( $page_id, $field_prefix.'_number', true );
		$category = get_post_meta( $page_id, $field_prefix.'_category', true );
		$posts_order = get_post_meta( $page_id, $field_prefix.'_posts_order', true );

		printf( $before_section, 'post-slider-section' );

		echo '<div class="container"><div class="row"><div class="col-md-12">';
		$slider_args = array(
			'cat' => $category,
			'posts_order' => $posts_order,
			'number_of_post' => $number_of_slide * 3, // 3 posts per slide
			'template' => 'large',
		);

		vw_the_post_slider( $slider_args );
		echo '</div></div></div>';

		echo $after_section;
	}
}

/* -----------------------------------------------------------------------------
 * Render Section: Post Box
 * -------------------------------------------------------------------------- */
add_action( 'vwspc_action_render_section_post_box', 'vw_render_spc_section_post_box' );
if ( ! function_exists( 'vw_render_spc_section_post_box' ) ) {
	function vw_render_spc_section_post_box( $args ) {
		extract( $args );
		$number_of_post = get_post_meta( $page_id, $field_prefix.'_number', true );
		$layout = get_post_meta( $page_id, $field_prefix.'_layout', true );
		$title = get_post_meta( $page_id, $field_prefix.'_title', true );
		$category = get_post_meta( $page_id, $field_prefix.'_category', true );
		$exclude_categories = get_post_meta( $page_id, $field_prefix.'_exclude_categories', true );
		$posts_order = get_post_meta( $page_id, $field_prefix.'_posts_order', true );

		printf( $before_section, 'post-box' );

		$query_args = array(
			'post_type' => 'post',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page' => $number_of_post,
			'meta_query' => array(),
		);

		if ( ! empty( $category ) ) {
			$query_args['cat'] = $category;

			if ( ! empty( $title ) ) {
				$title = '<span class="'.vw_get_the_category_class( $category ).'">'.$title.'</span>';
			}
		}

		if ( ! empty( $exclude_categories ) ) {
			$query_args['category__not_in'] = explode( ',', $exclude_categories );
		}

		if ( $posts_order == 'latest_posts' ) {
			// do nothing, it's a default ordering

		} elseif ( $posts_order == 'latest_gallery_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-gallery' )
				)
			);

		} elseif ( $posts_order == 'latest_video_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-video' )
				)
			);

		} elseif ( $posts_order == 'latest_audio_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-audio' )
				)
			);

		} elseif ( $posts_order == 'latest_featured' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_post_featured',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'latest_reviews' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'most_review_scores' ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_review_average_score';
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'most_viewed' ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_post_views';

		}

		// ==== Begin temp query =====================================
		// $query_args['p'] = 1292;
		// $query_args['post__in'] = array( 1292, 1304 );
		// $query_args['meta_query'][] = array(
		// 	'key' => '_thumbnail_id',
		// 	'compare' => 'EXISTS'
		// );
		// ==== End temp query =====================================
		
		query_posts( $query_args );

		$template_file = sprintf( 'templates/post-box/post-layout-%s.php', $layout );

		?>
		<div class="container">
			<?php include( locate_template( $template_file, false, false ) ); ?>
		</div>
		<?php
		echo $after_section;
		wp_reset_query();
	}
}

/* -----------------------------------------------------------------------------
 * Render Section: Post Box with Sidebar
 * -------------------------------------------------------------------------- */
add_action( 'vwspc_action_render_section_post_box_sidebar', 'vw_render_spc_section_post_box_sidebar' );
if ( ! function_exists( 'vw_render_spc_section_post_box_sidebar' ) ) {
	function vw_render_spc_section_post_box_sidebar( $args ) {
		extract( $args );
		$number_of_post = get_post_meta( $page_id, $field_prefix.'_number', true );
		$layout = get_post_meta( $page_id, $field_prefix.'_layout', true );
		$title = get_post_meta( $page_id, $field_prefix.'_title', true );
		$category = get_post_meta( $page_id, $field_prefix.'_category', true );
		$exclude_categories = get_post_meta( $page_id, $field_prefix.'_exclude_categories', true );
		$posts_order = get_post_meta( $page_id, $field_prefix.'_posts_order', true );
		$sidebar = get_post_meta( $page_id, $field_prefix.'_sidebar', true );

		printf( $before_section, 'post-box-sidebar' );

		$query_args = array(
			'post_type' => 'post',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page' => $number_of_post,
			'meta_query' => array(),
		);

		if ( ! empty( $category ) ) {
			$query_args['cat'] = $category;
			
			if ( ! empty( $title ) ) {
				$title = '<span class="'.vw_get_the_category_class( $category ).'">'.$title.'</span>';
			}
		}

		if ( ! empty( $exclude_categories ) ) {
			$query_args['category__not_in'] = explode( ',', $exclude_categories );
		}

		if ( $posts_order == 'latest_posts' ) {
			// do nothing, it's a default ordering

		} elseif ( $posts_order == 'latest_gallery_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-gallery' )
				)
			);

		} elseif ( $posts_order == 'latest_video_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-video' )
				)
			);

		} elseif ( $posts_order == 'latest_audio_posts' ) {
			$query_args['tax_query'] =  array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-audio' )
				)
			);

		} elseif ( $posts_order == 'latest_featured' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_post_featured',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'latest_reviews' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'most_review_scores' ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_review_average_score';
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $posts_order == 'most_viewed' ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_post_views';

		}

		// ==== Begin temp query =====================================
		// $query_args['p'] = 1292;
		// $query_args['post__in'] = array( 1292, 1304 );
		// $query_args['meta_query'][] = array(
		// 	'key' => '_thumbnail_id',
		// 	'compare' => 'EXISTS'
		// );
		// ==== End temp query =====================================
		
		query_posts( $query_args );

		$template_file = sprintf( 'templates/post-box/post-layout-%s.php', $layout );

		?>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php include( locate_template( $template_file, false, false ) ); ?>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			</div>
			
		</div>
		<?php
		echo $after_section;
		wp_reset_query();
	}
}


/* -----------------------------------------------------------------------------
 * Render Section: Custom Content
 * -------------------------------------------------------------------------- */
add_action( 'vwspc_action_render_section_custom_content', 'vw_render_spc_section_custom_content' );
if ( ! function_exists( 'vw_render_spc_section_custom_content' ) ) {
	function vw_render_spc_section_custom_content( $args ) {
		extract( $args );

		$title = get_post_meta( $page_id, $field_prefix.'_title', true );
		$sidebar = get_post_meta( $page_id, $field_prefix.'_sidebar', true );

		printf( $before_section, 'custom-section' );
		echo '<div class="container"><div class="row">';

		if ( '0' == $sidebar ) :
		echo '<div class="col-sm-12 vwspc-content-column clearfix">';
		else :
		echo '<div class="col-md-8 vwspc-content-column clearfix">';
		endif;

		if ( ! empty( $title ) ) {
			printf( '<h3 class="vwspc-section-title">%s</h3>', do_shortcode( $title ) );
		}

		echo apply_filters( 'the_content', get_post_meta( $page_id, $field_prefix.'_content', true ) );
		echo '</div>';

		if ( '0' != $sidebar ) : ?>
			<div class="col-md-4 vwspc-sidebar-column">
				<aside class="vw-sidebar-wrapper">
					<div class="vw-sidebar-inner">
						<?php dynamic_sidebar( $sidebar ); ?>
					</div>
				</aside>
			</div>
		<?php
		endif;

		echo '</div></div>';

		echo $after_section;
	}
}