<?php

defined( 'VW_CONST_REVIEW_URL' ) || define( 'VW_CONST_REVIEW_URL', get_template_directory_uri().'/framework/review' );
defined( 'VW_CONST_REVIEW_DEFAULT_SCORE_STYLE' ) || define( 'VW_CONST_REVIEW_DEFAULT_SCORE_STYLE', 'image' );
defined( 'VW_CONST_REVIEW_DEFAULT_POSITION' ) || define( 'VW_CONST_REVIEW_DEFAULT_POSITION', 'bottom' );

/* -----------------------------------------------------------------------------
 * Enqueue Scripts
 * -------------------------------------------------------------------------- */
add_action( 'admin_enqueue_scripts', 'vwrev_enqueue_scripts' );
if ( ! function_exists( 'vwrev_enqueue_scripts' ) ) {
	function vwrev_enqueue_scripts() {
		wp_enqueue_script( 'vwjs-review', VW_CONST_REVIEW_URL.'/review-editor.js', array( 'jquery' ), VW_THEME_VERSION, true );
		wp_enqueue_style( 'vwcss-icon-entypo' );
	}
}

/* -----------------------------------------------------------------------------
 * Register meta boxes
 * -------------------------------------------------------------------------- */
add_filter( 'rwmb_meta_boxes', 'vwrev_register_meta_boxes' );
if ( ! function_exists( 'vwrev_register_review_meta_boxes' ) ) {
	function vwrev_register_meta_boxes( $meta_boxes ) {

		require_once 'meta-box-field-review-score.php';

		$meta_boxes[] = array(
			'id' => 'vw_review_editor',
			'title' => __( 'Review Options', 'envirra' ),
			'pages' => array( 'post' ),
			'fields' => array(
				array(
					'name' => __( 'Enable Review', 'envirra' ),
					'id' => 'vw_enable_review',
					'type' => 'checkbox',
				),
				array(
					'name' => __( 'Position', 'envirra' ),
					'id' => 'vw_review_position',
					'class' => 'field-review-position',
					'type' => 'select',
					'std' => VW_CONST_REVIEW_DEFAULT_POSITION,
					'options' => array(
						'top' => __( 'Top', 'envirra' ),
						'top-floating' => __( 'Top - Floating', 'envirra' ),
						'bottom' => __( 'Bottom', 'envirra' ),
						'custom' => __( 'Custom (using shortcode)', 'envirra' ),
					),
				),
				array(
					'name' => __( 'Review Summary', 'envirra' ),
					'id' => 'vw_review_summary',
					'class' => 'field-review-summary',
					'type' => 'textarea',
				),
				array(
					'name' => __( 'Score Style', 'envirra' ),
					'id' => 'vw_review_score_style',
					'class' => 'field-review-score-style',
					'type' => 'select',
					'std' => VW_CONST_REVIEW_DEFAULT_SCORE_STYLE,
					'options' => array(
						'star' => __( 'Star', 'envirra' ),
						'points' => __( 'Points', 'envirra' ),
						'percentage' => __( 'Percentage', 'envirra' ),
					),
				),
				array(
					'name' => __( 'Review Score', 'envirra' ),
					'id' => 'vw_review_scores',
					'class' => 'field-review-score',
					'type' => 'review_score',
				),
			)
		);

		return $meta_boxes;
	}
}

if ( ! function_exists( 'vw_has_review' ) ) {
	function vw_has_review() {
		return
			get_post_meta( get_the_id(), 'vw_enable_review', true )
			&& get_post_meta( get_the_id(), 'vw_review_score_1_score', true );
	}
}

if ( ! function_exists( 'vw_get_stared_score' ) ) {
	function vw_get_stared_score( $score ) {
		return $score * 5 / 100; // 5-starts based
	}
}
/* -----------------------------------------------------------------------------
 * Template Tag
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_review' ) ) {
	function vw_the_review() {
		if ( ! get_post_meta( get_the_id(), 'vw_enable_review', true ) ) {
			return;
		}

		get_template_part( 'templates/post-review' );
	}
}

if ( ! function_exists( 'vw_the_post_review_star' ) ) {
	function vw_the_post_review_star() {
		if ( ! get_post_meta( get_the_id(), 'vw_enable_review', true ) ) {
			return;
		}

		$total_score = get_post_meta( get_the_id(), 'vw_review_average_score', true );

		printf( '<span class="vw-post-review-star" data-score="%s"></span>', vw_get_stared_score( $total_score ) );
	}
}

/* -----------------------------------------------------------------------------
 * Shortcode
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vwrev_review_shortcode' ) ) {
	function vwrev_review_shortcode( $atts, $content = null ) {
		ob_start();
		vw_the_review();
		return ob_get_clean();
	}
}
add_shortcode( 'review', 'vwrev_review_shortcode' );

/* -----------------------------------------------------------------------------
 * Insert Review Box
 * ------------------------------------------------------------------------- */
add_filter( 'the_content', 'vwrev_insert_review_box' );
if ( ! function_exists( 'vwrev_insert_review_box' ) ) {
	function vwrev_insert_review_box( $content ) {
		global $post;
		$location = get_post_meta( $post->ID, 'vw_review_position', true );

		if ( ! is_single() || empty( $location ) || $location == 'custom' ) {
			return $content;
		}

		ob_start();
		vw_the_review();
		$review = ob_get_clean();

		if ( 'bottom' == $location ) {
			return $content .= $review;

		} elseif ( 'top' == $location || 'top-floating' == $location ) {
			return $review .= $content;

		} else {
			return $content;

		}
	}
}
