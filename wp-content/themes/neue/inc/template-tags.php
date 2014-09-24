<?php
if ( ! function_exists( 'vw_the_pagination' ) ) {
	function vw_the_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'end_size' => VW_CONST_PAGINATE_LINKS_END_SIZE,
			'mid_size' => VW_CONST_PAGINATE_LINKS_MID_SIZE,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&larr; Previous', 'envirra' ),
			'next_text' => __( 'Next &rarr;', 'envirra' ),
		) );

		if ( $links ) :
		?>
		<nav class="vw-page-navigation clearfix" role="navigation">
			<span class="vw-page-navigation-title"><?php _e( 'Page : ', 'envirra' ); ?></span>
			<div class="vw-page-navigation-pagination">
				<?php echo $links; ?>
			</div><!-- .pagination -->
		</nav><!-- .navigation -->
		<?php
		endif;
	}
}

if ( ! function_exists( 'vw_more_posts' ) ) {
	function vw_more_posts() {
		global $wp_query;
		return $wp_query->current_post + 1 < $wp_query->post_count;
	}
}
/* -----------------------------------------------------------------------------
 * The Author Avatar
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_author_avatar' ) ) {
	function vw_the_author_avatar( $author = null ) {
		if ( ! $author ) {
			$author = vw_get_current_author();
		}

		$author_avatar = vw_get_avatar( get_the_author_meta( 'user_email', $author->ID ), VW_CONST_AVATAR_SIZE_LARGE, '', get_the_author_meta( 'display_name', $author->ID ) );

		if ( is_author() ) {
			echo '<span class="vw-author-avatar">'.$author_avatar.'</span>';
			
		} else {
			echo '<a class="vw-author-avatar" href="' . get_author_posts_url(get_the_author_meta( 'ID' )).'" title="' . sprintf( __('View all posts by %s', 'envirra'), get_the_author_meta( 'display_name', $author->ID ) ) . '">';
			echo $author_avatar;
			echo '</a>';
		}
	}
}

/* -----------------------------------------------------------------------------
 * The Author Social Link
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_author_social_links' ) ) {
	function vw_the_author_social_links() {
		vw_the_author_social_link( 'vw_user_twitter' );
		vw_the_author_social_link( 'vw_user_facebook' );
		vw_the_author_social_link( 'vw_user_pinterest' );
		vw_the_author_social_link( 'vw_user_tumblr' );
		vw_the_author_social_link( 'vw_user_instagram' );
		vw_the_author_social_link( 'vw_user_500px' );
		vw_the_author_social_link( 'vw_user_dribbble' );
		vw_the_author_social_link( 'vw_user_flickr' );
		vw_the_author_social_link( 'vw_user_linkedin' );
		vw_the_author_social_link( 'vw_user_skype	' );
		vw_the_author_social_link( 'vw_user_youtube' );
		vw_the_author_social_link( 'vw_user_vimeo' );
		vw_the_author_social_link( 'vw_user_email' );
	}
}
if ( ! function_exists( 'vw_the_author_social_link' ) ) {
	function vw_the_author_social_link( $social_field ) {
		$author = vw_get_current_author();
		$social_link = esc_url( get_the_author_meta( $social_field, $author->ID ) );

		if ( empty( $social_link ) ) return;

		if ( 'vw_user_twitter' == $social_field ) :
			$social_icon = 'icon-social-twitter';
			$social_label = __( 'Twitter', 'envirra' );

		elseif ( 'vw_user_facebook' == $social_field ) :
			$social_icon = 'icon-social-facebook';
			$social_label = __( 'Facebook', 'envirra' );
			
		elseif ( 'vw_user_google' == $social_field ) :
			$social_icon = 'icon-social-gplus';
			$social_label = __( 'Google+', 'envirra' );

		elseif ( 'vw_user_pinterest' == $social_field ) :
			$social_icon = 'icon-social-pinterest';
			$social_label = __( 'Pinterest', 'envirra' );

		elseif ( 'vw_user_tumblr' == $social_field ) :
			$social_icon = 'icon-social-tumblr';
			$social_label = __( 'Tumblr', 'envirra' );

		elseif ( 'vw_user_instagram' == $social_field ) :
			$social_icon = 'icon-social-instagram';
			$social_label = __( 'Instagram', 'envirra' );

		elseif ( 'vw_user_500px' == $social_field ) :
			$social_icon = 'icon-social-fivehundredpx';
			$social_label = __( '500px', 'envirra' );

		elseif ( 'vw_user_dribbble' == $social_field ) :
			$social_icon = 'icon-social-dribbble';
			$social_label = __( 'Dribbble', 'envirra' );

		elseif ( 'vw_user_flickr' == $social_field ) :
			$social_icon = 'icon-social-flickr';
			$social_label = __( 'Flickr', 'envirra' );

		elseif ( 'vw_user_linkedin' == $social_field ) :
			$social_icon = 'icon-social-linkedin';
			$social_label = __( 'Linkedin', 'envirra' );

		elseif ( 'vw_user_skype' == $social_field ) :
			$social_icon = 'icon-social-skype';
			$social_label = __( 'Skype', 'envirra' );

		elseif ( 'vw_user_youtube' == $social_field ) :
			$social_icon = 'icon-social-youtube';
			$social_label = __( 'Youtube', 'envirra' );

		elseif ( 'vw_user_vimeo' == $social_field ) :
			$social_icon = 'icon-social-vimeo';
			$social_label = __( 'Vimeo', 'envirra' );

		elseif ( 'vw_user_email' == $social_field ) :
			$social_icon = 'icon-social-email';
			$social_label = __( 'Email', 'envirra' );
		endif;
		
		?>
		<a class="url <?php printf( 'vw-%1s', $social_icon ); ?>" rel="author" href="<?php echo $social_link; ?>" title="<?php echo $social_label ?>" target="_blank">
			<i class="<?php echo $social_icon; ?> icon-small"></i>
		</a>
		<?php
	}
}

/* -----------------------------------------------------------------------------
 * The Copyright Text
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_copyright' ) ) {
	function vw_the_copyright() {
		echo '<div class="vw-copyright">';
		echo do_shortcode( vw_get_theme_option( 'copyright_text' ) );
		echo '</div>';
	}
}

/* -----------------------------------------------------------------------------
 * The Post Date
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_post_date' ) ) {
	function vw_the_post_date() {
		echo get_the_time( get_option('date_format') );
	}
}

/* -----------------------------------------------------------------------------
 * The Comment Link
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_comment_link' ) ) {
	function vw_the_comment_link() {
		?>
		<a href="<?php comments_link(); ?>" class="vw-post-comment-number"><i class="icon-entypo-chat"></i> <span><?php comments_number( __( '0', 'envirra' ), __( '1', 'envirra' ), __( '%', 'envirra' ) ); ?></span></a>
		<?php
	}
}

/* -----------------------------------------------------------------------------
 * The Post Slider
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_post_slider' ) ) {
	function vw_the_post_slider( $args=array() ) {
		$default = array(
			'template' => '',
			'cat' => null,
			'posts_order' => 'latest_posts', // latest_posts, latest_featured, latest_reviews, most_review_scores
			'number_of_post' => 5,
			'before' => '',
			'after' => '',
		);

		$args = wp_parse_args( $args, $default );
	
		$query_args = array(
			'post_type' => 'post',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'ignore_sticky_posts' => true,
			'posts_per_page' => $args['number_of_post'],
			'meta_query' => array(),
		);

		if ( $args['cat'] ) {
			$query_args['cat'] = $args['cat'];
		}

		if ( $args['posts_order'] == 'latest_posts' ) {
			// do nothing, it's a default ordering

		} elseif ( $args['posts_order'] == 'latest_featured' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_post_featured',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $args['posts_order'] == 'latest_reviews' ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		} elseif ( $args['posts_order'] == 'most_review_scores' ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_review_average_score';
			$query_args['meta_query'][] = array(
				'key' => 'vw_enable_review',
				'value' => '1',
				'compare' => '=',
			);

		}

		// ==== Begin temp query =====================================
		// $query_args['p'] = 1292;
		// $query_args['post__in'] = array( 1292, 1304 );
		// $query_args['meta_query'][] = array(
		// 	'key' => '_thumbnail_id',
		// 	'compare' => 'EXISTS'
		// );
		// ==== End temp query =====================================

		query_posts( apply_filters( 'vw_filter_the_post_slider_query', $query_args ) );
		global $wp_query;
		
		if ( have_posts() ) {
			echo $args['before'];
			// get_template_part( 'templates/post-slider', $args['template'] );
			get_template_part( 'templates/post-box/post-layout-slider', $args['template'] );
			echo $args['after'];
		}

		wp_reset_query();
	}
}

if ( ! function_exists( 'vw_the_category_post_slider' ) ) {
	function vw_the_category_post_slider() {
		$cat_ID = vw_get_archive_category_id();
		$posts_order = vw_get_category_option( $cat_ID, 'category_post_slider' );

		$args = array(
			'cat' => $cat_ID,
			'posts_order' => $posts_order,
			'before' => '<div class="vw-category-post-slider">',
			'after' => '</div>',
		);
		
		vw_the_post_slider( $args );
	}
}

/* -----------------------------------------------------------------------------
 * Has Category Slider
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_has_category_slider' ) ) {
	function vw_has_category_slider() {
		if ( ! is_category() ) return false;
		
		return 'none' != vw_get_category_option( vw_get_archive_category_id(), 'category_post_slider' );
	}
}

/* -----------------------------------------------------------------------------
 * Has Category Top Content
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_has_category_top_content' ) ) {
	function vw_has_category_top_content() {
		if ( ! is_category() ) return false;
		
		return 'none' != vw_get_category_option( vw_get_archive_category_id(), 'category_top_content' );
	}
}

/* -----------------------------------------------------------------------------
 * The Category Top Content
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_category_top_content' ) ) {
	function vw_the_category_top_content() {
		$content = vw_get_category_option( vw_get_archive_category_id(), 'category_top_content' );

		if ( ! empty( $content ) ) {
			echo '<div class="vw-category-top-content">';
			echo do_shortcode( $content );
			echo '</div>';
		}
	}
}

/* -----------------------------------------------------------------------------
 * The category class
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_the_category_class' ) ) {
	function vw_get_the_category_class( $cat_ID = '' ) {
		if ( empty( $cat_ID ) ) {
			$cat_ID = vw_get_single_cat_id();
		}

		return sprintf( 'vw-cat-id-%s', $cat_ID );
	}
}

if ( ! function_exists( 'vw_the_category_class' ) ) {
	function vw_the_category_class( $cat_ID = '' ) {
		echo vw_get_the_category_class( $cat_ID );
	}
}

/* -----------------------------------------------------------------------------
 * Render Comments
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_render_comments' ) ) {
	function vw_render_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 

				<?php echo get_avatar($comment, $size = '100'); ?>

				<div class="comment-text">

					<div class="author">
						<div class="author-name"><?php printf( __( '%s', 'envirra'), get_comment_author_link() ) ?></div>
						<div class="date">
							<?php printf(__('%1$s at %2$s', 'envirra'), get_comment_date(),  get_comment_time() ) ?><?php edit_comment_link( __( '(Edit)', 'envirra'),'  ','' ) ?>
							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>  
					</div>

					<div class="text"><?php comment_text() ?></div>

					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'envirra' ) ?></em>
						<br>
					<?php endif; ?>

				</div>

			</div>
		<?php
	}
}

/* -----------------------------------------------------------------------------
 * Render Categories
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_category' ) ) {
	function vw_the_category( $classes='' ) {
		$categories = get_the_category();

		if( $categories ){
			echo '<div class="vw-post-categories">';
			foreach( $categories as $category ) {
				$classes .= ' vw-category-link ' . vw_get_the_category_class( $category->term_id );
				echo '<a class="'.esc_attr( $classes ).'" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'envirra' ), $category->name ) ) . '" rel="category">'.$category->cat_name.'</a>';
			}
			echo '</div>';
		}
	}
}

/* -----------------------------------------------------------------------------
 * Render Post Footer Sections
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_post_footer_sections' ) ) {
	function vw_the_post_footer_sections() {
		$sections = vw_get_theme_option( 'post_footer_sections' );
		if ( empty( $sections ) || empty( $sections['enabled'] ) ) return;

		foreach ( $sections['enabled'] as $slug => $label ) {
			if ( 'post-navigation' == $slug ) {
				get_template_part( 'templates/post-navigation', get_post_format() );

			} elseif ( 'about-author' == $slug ) {
				get_template_part( 'templates/about-author', get_post_format() );

			} elseif ( 'related-posts' == $slug ) {
				$the_query = vw_get_related_posts( vw_get_theme_option( 'related_post_count' ) );
				if ( $the_query->have_posts() ) {
					$GLOBALS['wp_query'] = $the_query;
					get_template_part( 'templates/related-posts', get_post_format() );
					wp_reset_query();
				}


			} elseif ( 'comments' == $slug ) {
				comments_template();

			} else {
				// For 'custom-1', 'custom-2' or else
				get_template_part( 'templates/post-footer-section-'.$slug, get_post_format() );

			}
		}
	}
}

/* -----------------------------------------------------------------------------
 * Render Site Social Icons
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_site_social_profiles' ) ) {
	function vw_the_site_social_profiles() {
		echo '<span class="vw-site-social-profile">';

		 $url = vw_get_theme_option( 'social_delicious' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-delicious" href="%s" title="Delicious"><i class="icon-social-delicious"></i></a>', $url );

		$url = vw_get_theme_option( 'social_digg' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-digg" href="%s" title="Digg"><i class="icon-social-digg"></i></a>', $url );

		$url = vw_get_theme_option( 'social_dribbble' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-dribbble" href="%s" title="Dribbble"><i class="icon-social-dribbble"></i></a>', $url );

		$url = vw_get_theme_option( 'social_facebook' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-facebook" href="%s" title="Facebook"><i class="icon-social-facebook"></i></a>', $url );

		$url = vw_get_theme_option( 'social_flickr' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-flickr" href="%s" title="Flickr"><i class="icon-social-flickr"></i></a>', $url );

		$url = vw_get_theme_option( 'social_forrst' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-forrst" href="%s" title="Forrst"><i class="icon-social-forrst"></i></a>', $url );

		$url = vw_get_theme_option( 'social_github' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-github" href="%s" title="GitHub"><i class="icon-social-github"></i></a>', $url );

		$url = vw_get_theme_option( 'social_googleplus' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-googleplus" href="%s" title="Google+"><i class="icon-social-gplus"></i></a>', $url );

		$url = vw_get_theme_option( 'social_instagram' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-instagram" href="%s" title="Instagram"><i class="icon-social-instagram"></i></a>', $url );

		$url = vw_get_theme_option( 'social_linkedin' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-linkedin" href="%s" title="LinkedIn"><i class="icon-social-linkedin"></i></a>', $url );

		$url = vw_get_theme_option( 'social_lastfm' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-lastfm" href="%s" title="Last.fm"><i class="icon-social-lastfm"></i></a>', $url );

		$url = vw_get_theme_option( 'social_pinterest' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-pinterest" href="%s" title="Pinterest"><i class="icon-social-pinterest"></i></a>', $url );

		$url = vw_get_theme_option( 'social_rss' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-rss" href="%s" title="RSS"><i class="icon-social-rss"></i></a>', $url );

		$url = vw_get_theme_option( 'social_skype' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-skype" href="%s" title="Skype"><i class="icon-social-skype"></i></a>', $url );

		$url = vw_get_theme_option( 'social_tumblr' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-tumblr" href="%s" title="Tumblr"><i class="icon-social-tumblr"></i></a>', $url );

		$url = vw_get_theme_option( 'social_twitter' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-twitter" href="%s" title="Twitter"><i class="icon-social-twitter"></i></a>', $url );

		$url = vw_get_theme_option( 'social_vimeo' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-vimeo" href="%s" title="Vimeo"><i class="icon-social-vimeo"></i></a>', $url );

		$url = vw_get_theme_option( 'social_yahoo' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-yahoo" href="%s" title="Yahoo"><i class="icon-social-yahoo"></i></a>', $url );

		$url = vw_get_theme_option( 'social_youtube' );
		if ( ! empty( $url ) ) printf( '<a class="vw-site-social-profile-icon vw-site-social-youtube" href="%s" title="Youtube"><i class="icon-social-youtube"></i></a>', $url );

		echo '</span>';
	}
}

/* -----------------------------------------------------------------------------
 * The Categoy Thumbnail
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_the_category_thumbnail' ) ) {
	function vw_get_the_category_thumbnail( $size = VW_CONST_THUMBNAIL_SIZE_CATEGORY ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();

		if ( 'product_cat' == $cat_obj->taxonomy ) {
			$image_id = vw_get_product_category_option( $cat_obj->term_id, 'category_thumbnail' );

		} else {
			$image_id = vw_get_category_option( $cat_obj->term_id, 'category_thumbnail' );
			
		}

		if ( ! $image_id ) return;

		$image = wp_get_attachment_image_src( $image_id, $size );

		if ( ! $image ) return;

		if ( ! defined( 'VW_CONST_DISABLE_RETINA_CATEGORY_THUMBNAIL' ) ) {
			$image[1] = $image[1] / 2; // 0.5x width
			$image[2] = $image[2] / 2; // 0.5x height
		}
		
		return sprintf( '<img class="vw-category-thumbnail" src="%s" width="%s" height="%s">', $image[0], $image[1], $image[2] );
	}
}

/* -----------------------------------------------------------------------------
 * The Post Thumbnail (to support the featured image 2)
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_featured_image_id' ) ) {
	function vw_get_featured_image_id( $post_id = '' ) {
		global $post;
		if ( empty( $post_id ) ) {
			$post_id = $post->ID;
		}

		$featured_image_2_id = get_post_meta( $post_id, 'vw_featured_image_2', true );
		if ( empty( $featured_image_2_id ) ) {
			return get_post_thumbnail_id( $post_id );
		} else {
			return $featured_image_2_id;
		}
		
	}
}

if ( ! function_exists( 'vw_the_post_thumbnail' ) ) {
	function vw_the_post_thumbnail( $size = VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC, $attr = '' ) {
		$featured_image_id = vw_get_featured_image_id();
		if ( empty( $featured_image_id ) ) return;

		$full_image_url = wp_get_attachment_image_src( $featured_image_id, 'full' );
		?>
		<a class="swipebox" href="<?php echo $full_image_url[0]; ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php echo wp_get_attachment_image( $featured_image_id, $size, false, array( 'class' => "attachment-$size wp-post-image", 'itemprop'=>'image' ) ); ?>
		</a>
		<?php

		$image_caption = get_post( $featured_image_id )->post_excerpt;
		if ( ! empty( $image_caption ) ) {
			printf( '<div class="vw-featured-image-caption-wrapper"><div class="vw-featured-image-caption"><i class="icon-entypo-camera"></i> %s</div></div>', $image_caption );
		}
	}
}

/* -----------------------------------------------------------------------------
 * The Post Embeded Media
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_embeded_media' ) ) {
	function vw_the_embeded_media( $thumbnail_size = VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC ) {
		  vw_the_embeded_gallery( $thumbnail_size );
		  vw_the_embeded_video();
		  vw_the_embeded_audio();
	}
}

if ( ! function_exists( 'vw_the_featured_image' ) ) {
	function vw_the_featured_image( $thumbnail_size = VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC ) {
		if ( has_post_thumbnail() ) {
			echo '<div class="vw-featured-image">';
			vw_the_post_thumbnail( $thumbnail_size );
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'vw_the_embeded_gallery' ) ) {
	function vw_the_embeded_gallery( $thumbnail_size = VW_CONST_THUMBNAIL_SIZE_SINGLE_POST_CLASSIC ) {
		if ( has_post_format( 'gallery' ) ) {
			$attachments = get_post_meta( get_the_ID(), 'vw_post_format_gallery_images' );

			if ( ! empty( $attachments ) ) : ?>

				<div class="flexslider no-control-nav vw-embeded-media vw-embeded-gallery">
					<ul class="slides">
						<?php foreach( $attachments as $attachment_ID ) :
							$full_image_url = wp_get_attachment_image_src( $attachment_ID, 'full' );
						?>
							<li>
								<a class="swipebox" href="<?php echo $full_image_url[0]; ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
									<?php echo wp_get_attachment_image( $attachment_ID, $thumbnail_size ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php endif;
		}
	}
}

if ( ! function_exists( 'vw_the_embeded_video' ) ) {
	function vw_the_embeded_video() {
		if ( has_post_format( 'video' ) ) {
			$video_oembed_url = get_post_meta( get_the_ID(), 'vw_post_format_video_oembed_url', true );
			$video_oembed_code = get_post_meta( get_the_ID(), 'vw_post_format_video_oembed_code', true );

			if ( ! empty( $video_oembed_url ) ) {
				echo '<div class="vw-embeded-media vw-embeded-video vw-embeded-video-url">';
				echo wp_oembed_get( $video_oembed_url );
				echo '</div>';

			} else if ( ! empty( $video_oembed_code ) ) {
				echo '<div class="vw-embeded-media vw-embeded-video vw-embeded-video-code">';
				echo $video_oembed_code;
				echo '</div>';

			}

		}
	}
}

if ( ! function_exists( 'vw_the_embeded_audio' ) ) {
	function vw_the_embeded_audio() {
		if ( has_post_format( 'audio' ) ) {
			$audio_oembed_url = get_post_meta( get_the_ID(), 'vw_post_format_audio_oembed_url', true );
			$audio_oembed_code = get_post_meta( get_the_ID(), 'vw_post_format_audio_oembed_code', true );
			
			if ( ! empty( $audio_oembed_url ) ) {
				echo '<div class="vw-embeded-media vw-embeded-audio vw-embeded-audio-url">';
				echo wp_oembed_get( $audio_oembed_url );
				echo '</div>';

			} else if ( ! empty( $audio_oembed_code ) ) {
				echo '<div class="vw-embeded-media vw-embeded-audio vw-embeded-audio-code">';
				echo $audio_oembed_code;
				echo '</div>';

			}

		}
	}
}

/* -----------------------------------------------------------------------------
 * The Menu Icons (Search icon, login icon, etc.)
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_the_menu_icons' ) ) {
	function vw_the_menu_icons() {
		echo vw_get_the_menu_icons();
	}
}

if ( ! function_exists( 'vw_get_the_menu_icons' ) ) {
	function vw_get_the_menu_icons() {
		ob_start(); ?>

		<div class="vw-instant-search-buton">
			<i class="icon-entypo-search"></i>
		</div>
		
		<!-- <div class="vw-user-login-button">
			<i class="icon-entypo-users"></i>
		</div> -->

		<?php vw_woo_cart_button(); ?>
		
		<?php
		return ob_get_clean();
	}
}