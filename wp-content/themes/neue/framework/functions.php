<?php 

/* -----------------------------------------------------------------------------
 * Get Theme Option Proxy
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_theme_option' ) ) {
	function vw_get_theme_option( $opt_name, $default = null ) {
		global $vw_neue;
		if ( isset( $vw_neue[ $opt_name ] ) ) return $vw_neue[ $opt_name ];
		else return $default;
	}
}

/* -----------------------------------------------------------------------------
 * Get Category Option Proxy
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_archive_category' ) ) {
	function vw_get_archive_category() {
		return get_category( get_query_var('cat') );
	}
}

if ( ! function_exists( 'vw_get_archive_category_id' ) ) {
	function vw_get_archive_category_id() {
		$category = get_category( get_query_var('cat') );

		if ( ! empty( $category ) ) {
			return $category->cat_ID;
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'vw_get_single_cat_id' ) ) {
	function vw_get_single_cat_id() {
		$category = get_the_category();
		if ( ! $category ) return false;

		return $category[0]->term_id;
	}
}

if ( ! function_exists( 'vw_get_category_option' ) ) {
	function vw_get_category_option( $cat_ID, $option_name, $default = null ) {
		$option_name = sprintf( 'category_%s_%s', $cat_ID, $option_name );
		return get_option( $option_name, $default );
	}
}

if ( ! function_exists( 'vw_get_product_category_option' ) ) {
	function vw_get_product_category_option( $cat_ID, $option_name, $default = null ) {
		$option_name = sprintf( 'product_cat_%s_%s', $cat_ID, $option_name );
		return get_option( $option_name, $default );
	}
}

/* -----------------------------------------------------------------------------
 * 
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_html_tag_schema' ) ) {
	function vw_html_tag_schema() {
		$schema = 'http://schema.org/';

		// Is single post
		if( is_single() ) {
			$type = "Article";
		}

		// Is author page
		elseif( is_author() ) {
			$type = 'ProfilePage';
		}

		// Is search results page
		elseif( is_search() ) {
			$type = 'SearchResultsPage';
		}

		else {
			$type = 'WebPage';
		}

		echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
	}
}


/* -----------------------------------------------------------------------------
 * Get Current Author
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_current_author' ) ) {
	function vw_get_current_author() {
		global $post;

		if ( isset( $post->post_author ) ) {
			return get_userdata( $post->post_author );

		} else {
			return (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

		}
	}
}

/* -----------------------------------------------------------------------------
 * Get Author Avatar
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_author_avatar' ) ) {
	function vw_get_author_avatar( $author = null ) {
		if ( ! $author ) {
			$author = vw_get_current_author();
		}

		return vw_get_avatar( get_the_author_meta( 'user_email', $author->ID ), VW_CONST_AVATAR_SIZE_LARGE, '', get_the_author_meta( 'display_name', $author->ID ) );
	}
}

/* -----------------------------------------------------------------------------
 * Get Avatar with Retina Supports
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_avatar' ) ) {
	function vw_get_avatar( $id_or_email, $size = '96', $default = '', $alt = false ) {
		if ( defined( 'VW_CONST_DISABLE_RETINA_AVATAR' ) ) {

			return get_avatar( $id_or_email, $size, $default, $alt );

		} else {

			$retina_size = $size*2;
			$html = get_avatar( $id_or_email, $retina_size, $default, $alt );
			return str_replace( '=\''.$retina_size.'\'', '=\''.$size.'\'', $html );

		}
	}
}

/* -----------------------------------------------------------------------------
 * Get Archive Date for Displaying on Archive Page
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_archive_date' ) ) {
	function vw_get_archive_date() {
		if ( is_year() ) {
			return get_the_date( _x( 'Y', 'yearly archives date format', 'envirra' ) );	

		} elseif ( is_month() ) {
			return get_the_date( _x( 'F Y', 'monthly archives date format', 'envirra' ) );

		} else {
			return get_the_date();
			
		}
	}
}

/* -----------------------------------------------------------------------------
 * Get Related Posts
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_get_related_posts' ) ) {
	function vw_get_related_posts( $count = 3, $post_ID = null ) {
		if ( empty( $post_ID ) ) {
			$post_ID = get_the_ID();
		}

		$args = array(
			'post__not_in' => array($post_ID),  
			'posts_per_page'=> $count, 
			'ignore_sticky_posts'=> 1,
			// 'meta_key' => '_thumbnail_id', //Only posts that have featured image
		);

		// Find the related posts
		$tags = wp_get_post_tags( $post_ID, array( 'fields' => 'ids' ) );
		if ( $tags ) {
			// Find the related posts by tag
			foreach( $tags as $tag ) {
				$args['tag__in'][] = $tag;	
			}
		} else {
			// Find the related posts by category when no tag.
			$cats = wp_get_post_categories( $post_ID, array('fields' => 'ids') );

			if ( ! $cats ) return;

			foreach( $cats as $cat_ID ) {
				$args['category__in'][] = $cat_ID;	
			}
		}

		return new WP_Query( apply_filters( 'vw_filter_related_post_query_args', $args ) );
	}
}

/* -----------------------------------------------------------------------------
 * Build Template Path
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_build_template_path' ) ) {
	function vw_build_template_path( $slug, $name, $format = '' ) {
		$new_name = $name;

		if ( ! empty( $format ) ) {
			$new_name .= '-'.$format;
		}

		return sprintf( 'templates/post-box/post-layout-%s.php', $new_name );
	}
}

/* -----------------------------------------------------------------------------
 * Is Caching Enabled?
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_is_caching_enabled' ) ) {
	function vw_is_caching_enabled() {
		return defined( 'WP_CACHE' ) && WP_CACHE;
	}
}

/* -----------------------------------------------------------------------------
 * Custom Walker, duplicated from Walker_Category_Checklist
 * -------------------------------------------------------------------------- */
class Vw_Walker_Category_Checklist extends Walker  {
	var $tree_type = 'category';
	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');
	var $field_name = 'post_category';

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);
		if ( empty($taxonomy) )
			$taxonomy = 'category';

		$name = $this->field_name;

		$class = in_array( $category->term_id, $popular_cats ) ? ' class="popular-category"' : '';
		$output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit"><input value="' . $category->term_id . '" type="checkbox" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $category->term_id . '"' . checked( in_array( $category->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' /> ' . esc_html( apply_filters('the_category', $category->name )) . '</label>';
	}

	function end_el( &$output, $category, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}

	function set_field_name( $field_name ) {
		$this->field_name = $field_name;
	}
}

if ( ! function_exists( 'vw_show_no_widget_warning' ) ) {
	function vw_show_no_widget_warning( $text = '' ) {
		if ( current_user_can( 'manage_options' ) ) {
			printf( '<div class="vw-no-widget-warning"><i class="icon-entypo-attention"></i> Please add widgets into <a href="%s/widgets.php" target="_blank">sidebar</a>.</div>', rtrim( get_admin_url(), '/' ) );
		}
	}
}