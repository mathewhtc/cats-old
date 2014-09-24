<?php

/* -----------------------------------------------------------------------------
 * Load Shortcodes & Shortcode Editor
 * -------------------------------------------------------------------------- */
if ( ! defined( 'VW_CONST_ENABLE_SHORTCODES' ) ) define( 'VW_CONST_ENABLE_SHORTCODES', false );

if ( VW_CONST_ENABLE_SHORTCODES ) {
	add_action( 'after_setup_theme', 'vw_init_shortcodes' );

	if ( is_admin() ) {
		require_once get_template_directory().'/framework/shortcode-editor/shortcode-editor.php';
	}
}

/* -----------------------------------------------------------------------------
 * Register Shortcodes
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_init_shortcodes' ) ) {
	function vw_init_shortcodes() {
		// add_filter( 'the_content', 'vw_do_shortcode', 99 );
		// add_filter( 'widget_text', 'vw_do_shortcode', 99 );
		vw_register_shortcodes();

		add_action( 'wp_enqueue_scripts', 'vwsc_enqueue_front_assets' );
	}
}

/* -----------------------------------------------------------------------------
 * Enqueue Front-end Assets
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vwsc_enqueue_front_assets' ) ) {
	function vwsc_enqueue_front_assets() {
		wp_enqueue_script( 'vwscjs-main', get_template_directory_uri().'/js/shortcodes.js', array(
			'jquery',
			'jquery-effects-fade',
			'jquery-ui-accordion',
			'jquery-ui-tabs',
		), VW_THEME_VERSION, true );
	}
}

/* -----------------------------------------------------------------------------
 * Register Shortcodes
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_register_shortcodes' ) ) {
	function vw_register_shortcodes() {
		add_shortcode( '404', 'vw_shortcode_404' );
		add_shortcode( 'accordions', 'vw_shortcode_accordions' );
		add_shortcode( 'accordion', 'vw_shortcode_accordion' );
		add_shortcode( 'button', 'vw_shortcode_button' );
		add_shortcode( 'row', 'vw_shortcode_row' );
		add_shortcode( 'column', 'vw_shortcode_column' );
		add_shortcode( 'dropcap', 'vw_shortcode_dropcap' );
		add_shortcode( 'em', 'vw_shortcode_emphasize' );
		add_shortcode( 'gap', 'vw_shortcode_gap' );
		add_shortcode( 'infobox', 'vw_shortcode_infobox' );
		add_shortcode( 'list', 'vw_shortcode_list' );
		add_shortcode( 'list_item', 'vw_shortcode_list_item' );
		add_shortcode( 'logo', 'vw_shortcode_logo' );
		add_shortcode( 'map', 'flexmap_show_map' );
		add_shortcode( 'mark', 'vw_shortcode_mark' );
		add_shortcode( 'posts', 'vw_shortcode_posts' );
		add_shortcode( 'quote', 'vw_shortcode_quote' );
		add_shortcode( 'tabs', 'vw_shortcode_tabs' );
		add_shortcode( 'tab', 'vw_shortcode_tab_item' );
	}
}
/* -----------------------------------------------------------------------------
 * Process Shortcoedes
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_do_shortcode' ) ) {
	function vw_do_shortcode( $content ) {
		global $shortcode_tags;

		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();

		vw_register_shortcodes();

		// Do the shortcode (only the one above is registered)
		$content = do_shortcode($content);

		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		return $content;
	}
}

/* -----------------------------------------------------------------------------
 * 404 Text
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_404' ) ) {
	function vw_shortcode_404( $atts, $content = null ) {
		if ( empty( $content ) ) $content = '404';
		return sprintf( '<div class="vw-404-text">%s</div>', $content );
	}
}

/* -----------------------------------------------------------------------------
 * Accordion
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_accordion' ) ) {
	function vw_shortcode_accordions( $atts, $content = null ) {
		global $vw_shortcode_accordions;
		$vw_shortcode_accordions = array();

		// Parse inner shortcode
		do_shortcode( $content );

		$html = "<div class='vw-accordions'>". implode( $vw_shortcode_accordions, '' ) . "</div>";
		unset( $vw_shortcode_accordions );
		return $html;
	}
}

if ( ! function_exists( 'vw_shortcode_accordion' ) ) {
	function vw_shortcode_accordion( $atts, $content = null ) {
		$defaults = array(
			'title' => 'Accordion Title',
			'icon' => '',
			'open' => 'false',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$icon_html = '';
		if ( ! empty( $icon ) ) {
			$icon_html = "<i class='icon-".esc_attr( $icon )."'></i> ";
		}
	
		$html = '<div class="vw-accordion" data-open="'.esc_attr( $open ).'">';
		$html .= '<div class="vw-accordion-header"><span class="vw-accordion-header-text">'.$icon_html.$title.'</span></div>';
		$html .= '<div class="vw-accordion-content">'.do_shortcode( $content ).'</div>';
		$html .= '</div>';

		global $vw_shortcode_accordions;
		$vw_shortcode_accordions[] = $html;
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * Button
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_button' ) ) {
	function vw_shortcode_button( $atts, $content = 'Submit' ) {
		$defaults = array(
			'style' => '',
			'icon' => '',
			'target' => '_self',
			'url' => '#',
			'fullwidth' => '' // true, ''
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$icon_html = '';
		if ( ! empty( $icon ) ) {
			$icon_html = " ";
			$icon_html = sprintf( '<i class="icon-%s"></i>', esc_attr( $icon ) );
		}

		if ( $url == 'home' ) $url = get_home_url();

		$classes = '';
		if( $fullwidth == 'true' ) $classes .= ' btn-full-width';

		return "<a class='".esc_attr( "btn btn-{$style} {$classes}" )."' href='".esc_url( $url )."' target='".esc_attr( $target )."'>{$icon_html}{$content}</a>";
	}
}

/* -----------------------------------------------------------------------------
 * Columns / Row
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_row' ) ) {
	function vw_shortcode_row(  $atts, $content = null ) {
		global $vw_shortcode_columns;
		$vw_shortcode_columns = array();

		// Parse inner shortcode
		do_shortcode( $content );

		$html = "<div class='vw-row-shortcode'>". implode( $vw_shortcode_columns, '' ) . "</div>";
		unset( $vw_shortcode_columns );
		return $html;
	}
}

if ( ! function_exists( 'vw_shortcode_column' ) ) {
	function vw_shortcode_column( $atts, $content = null ) {
		$defaults = array(
			'size' => '1/2', // 1/1, 1/2, 1/3, 2/3, 1/4, 3/4, 1/5, 2/5, 3/5
			'class' => ''
		);
		
		extract( shortcode_atts( $defaults, $atts ) );

		$classes = array( 'vw-column-shortcode', $class );

		if ( '1/2' == $size ) : $classes[] = 'vw-one-half';
		elseif ( '1/3' == $size ) : $classes[] = 'vw-one-third';
		elseif ( '2/3' == $size ) : $classes[] = 'vw-two-third';
		elseif ( '1/4' == $size ) : $classes[] = 'vw-one-fourth';
		elseif ( '3/4' == $size ) : $classes[] = 'vw-three-fourth';
		elseif ( '1/5' == $size ) : $classes[] = 'vw-one-fifth';
		elseif ( '2/5' == $size ) : $classes[] = 'vw-two-fifth';
		elseif ( '3/5' == $size ) : $classes[] = 'vw-three-fifth';
		endif;

		$html = sprintf( "<div class='%s'>%s</div>", implode( $classes, ' ' ), do_shortcode( $content ) );

		global $vw_shortcode_columns;
		$vw_shortcode_columns[] = $html;
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * Dropcap
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_dropcap' ) ) {
	function vw_shortcode_dropcap( $atts, $content = null ) {
		$defaults = array(
			'style' => 'standard', // standard, circle, box
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		return "<span class='vw-dropcap ".esc_attr( 'vw-dropcap-'.$style )."'>{$content}</span>";
	}
}

/* -----------------------------------------------------------------------------
 * Emphasize
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_emphasize' ) ) {
	function vw_shortcode_emphasize( $atts, $content = null ) {
		$defaults = array(
			'color' => '',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$style = '';
		if ( ! empty( $color ) ) {
			$color = preg_replace( "/&quot;|&#039;/", '', $color ); /* Remove html entities for widget title */
			$style .= sprintf( 'color: %s;', $color );
		}

		if ( ! empty( $style ) ) {
			$style = sprintf( 'style="%s" ', $style );
		}

		return "<em {$style}>{$content}</em>";
	}
}

/* -----------------------------------------------------------------------------
 * Gap
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_gap' ) ) {
	function vw_shortcode_gap( $atts, $content = null ) {
		$defaults = array(
			'size' => '30',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$style = '';
		if ( ! empty( $color ) ) {
			$color = preg_replace( "/&quot;|&#039;/", '', $color ); /* Remove html entities for widget title */
			$style .= sprintf( 'color: %s;', $color );
		}

		$style = sprintf( 'style="%s" ', $style );

		return sprintf( '<span class="vw-gap clearfix" style="margin-top: %spx"></span>', $size );
	}
}

/* -----------------------------------------------------------------------------
 * Infobox
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_infobox' ) ) {
	function vw_shortcode_infobox(  $atts, $content = null ) {
		$defaults = array(
			'title' => '',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$title_html = '';
		if ( !empty( $title ) ) {
			$title_html = '<h3 class="vw-infobox-title">'.$title.'</h3>';
		}

		$content_html = '';
		if ( ! empty( $content ) ) {
			$content_html = '<div class="vw-infobox-content">'.do_shortcode( $content ).'</div>';
		}

		$html = '<div class="vw-infobox"><div class="vw-infobox-inner">';
		$html .= $title_html . $content_html;
		$html .= '</div></div>';
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * List
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_list' ) ) {
	function vw_shortcode_list( $atts, $content = null ) {
		global $vw_shortcode_list;
		$vw_shortcode_list = array();

		// Parse inner shortcode
		do_shortcode( $content );

		$html = "<ul class='vw-list-shortcode'>". implode( $vw_shortcode_list, '' ) . "</ul>";
		unset( $vw_shortcode_list );
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * List Item
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_list_item' ) ) {
	function vw_shortcode_list_item( $atts, $content = null ) {
		$defaults = array(
			'icon' => '',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$icon_html = '';
		if ( ! empty( $icon ) ) {
			$icon_html = "<i class='icon-".esc_attr( $icon )."'></i> ";
		}
		$html = "<li>{$icon_html}".do_shortcode( $content )."</li>";

		global $vw_shortcode_list;
		$vw_shortcode_list[] = $html;
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * Logo
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_logo' ) ) {
	function vw_shortcode_logo( $atts, $content = null ) {
		$defaults = array(
			'width' => '', // px
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$site_logo = vw_get_theme_option( 'site_logo' );
		$site_logo_2x = vw_get_theme_option( 'site_logo_2x' );

		if ( empty( $site_logo[ 'url' ] ) ) return;
		if ( ! empty( $width ) ) {
			$site_logo[ 'width' ] = $width;
		}

		ob_start();
		?>
		<div class="vw-logo-shortcode">
			<?php if ( ! empty( $site_logo_2x[ 'url' ] ) ): ?><img class="vw-site-logo-2x" src="<?php echo $site_logo_2x[ 'url' ]; ?>" width="<?php echo $site_logo[ 'width' ] ?>" height="<?php echo $site_logo[ 'height' ] ?>" alt="<?php bloginfo( 'name' ); ?>"><?php endif; ?>
			<img class="vw-site-logo" src="<?php echo $site_logo[ 'url' ]; ?>" width="<?php echo $site_logo[ 'width' ] ?>" height="<?php echo $site_logo[ 'height' ] ?>" alt="<?php bloginfo( 'name' ); ?>">
		</div>
		<?php

		return ob_get_clean();
	}
}

/* -----------------------------------------------------------------------------
 * Mark
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_mark' ) ) {
	function vw_shortcode_mark( $atts, $content = null ) {
		$defaults = array(
			'style' => 'yellow', // grey, dark, yellow
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		return "<mark class='vw-mark-shortcode vw-mark-style-".esc_attr( $style )."'>".do_shortcode( $content )."</mark>";
	}
}

/* -----------------------------------------------------------------------------
 * Posts
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_posts' ) ) {
	function vw_shortcode_posts( $atts, $content = null ) {
		$defaults = array(
			'title' => '',
			'cat' => '',// category ID
			'cat_name' => '',// category name
			'cat_exclude' => '', // category IDs, separated by comma (,)
			'tag' => '', // tag slugs, separated by comma (,)
			'format' => '', // standard, video, audio, gallery
			'featured' => '', // 'true' for show only featured posts
			'layout' => 'boxed',
			'count' => '6',
			'order' => 'latest', // latest, random, popular, viewed, reviews
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		global $post;

		$query_args = array(
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'posts_per_page' => $count,
			'order' => 'DESC',
			// 'meta_key' => '_thumbnail_id', // DEV: Only posts that have featured image
		);

		if ( ! empty( $cat_name ) ) {
			$query_args['category_name'] = $cat_name;

			if ( ! empty( $title ) ) {
				$category = get_category_by_slug( $cat_name );
				$title = '<span class="'.vw_get_the_category_class( $category->term_id ).'">'.$title.'</span>';
			}
		}

		if ( ! empty( $cat ) ) {
			$query_args['cat'] = $cat;

			if ( ! empty( $title ) ) {
				$title = '<span class="'.vw_get_the_category_class( $cat ).'">'.$title.'</span>';
			}
		}

		if ( ! empty( $cat_exclude ) ) {
			$query_args['category__not_in '] = $cat_exclude;
		}

		if ( ! empty( $tag ) ) {
			$query_args['tag__in'] = $tag;
		}

		if ( ! empty( $format ) ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => sprintf( 'post-format-%s', strtolower( $format ) ),
			);
		}

		if ( ! empty( $featured ) ) {
			$query_args['meta_query'][] = array(
				'key' => 'vw_post_featured',
				'value' => '1',
				'compare' => '=',
			);
		}

		if ( 'latest' == $order ) {
			$query_args['orderby'] = 'post_date';

		} elseif ( 'random' == $order ) {
			$query_args['orderby'] = 'rand';
			
		} elseif ( 'popular' == $order ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_post_likes';
			
		} elseif ( 'viewed' == $order ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_post_views';
			
		} elseif ( 'reviews' == $order ) {
			$query_args['orderby'] = 'meta_value_num';
			$query_args['meta_key'] = 'vw_review_average_score';

		}

		query_posts( $query_args );

		$template_file = vw_build_template_path( 'templates/post-box/post-layout-%s.php', $layout );

		ob_start();
		include( locate_template( $template_file, false, false ) );
		wp_reset_query();

		return ob_get_clean();
	}
}

/* -----------------------------------------------------------------------------
 * Quote
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_quote' ) ) {
	function vw_shortcode_quote( $atts, $content = null ) {
		$defaults = array(
			'align' => 'left', // left, right, none
			'cite' => ''
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$align = esc_attr( $align );

		$cite_html = '';
		if ( !empty( $cite ) ) {
			$cite_html = sprintf( '<div class="vw-quote-cite">&mdash; %s</div>', $cite );
		}

		return "<div class='vw-quote vw-quote-align-{$align}'>".do_shortcode( $content ).$cite_html."</div>";
	}
}

/* -----------------------------------------------------------------------------
 * Tabs
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_tabs' ) ) {
	function vw_shortcode_tabs( $atts, $content = null ) {
		$defaults = array(
			'style' => 'top-tab', // top-tab, left-tab
			'align' => 'left', // Only style=sidebar / left, right
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$tabs_html = '';
		$GLOBALS['vw_tab_headers'] = '';
		$GLOBALS['vw_tab_contents'] = '';

		if ( preg_match_all( '|\[tab.*\].*\[\/tab\]|Uims', $content, $tabs, PREG_SET_ORDER ) ) {
			foreach ( $tabs as $item ) {
				do_shortcode( $item[0] );
			}
		}

		$html = '<div class="vw-tabs vw-style-'.esc_attr( $style ).'">';
		$html .= '<div class="vw-tab-titles hidden-xs clearfix">'.$GLOBALS['vw_tab_headers'].'</div>';
		$html .= $GLOBALS['vw_tab_contents'];
		$html .= '<div class="clearfix"></div>';
		$html .= '</div>';
		return $html;
	}
}

/* -----------------------------------------------------------------------------
 * Tab Item
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_shortcode_tab_item' ) ) {
	function vw_shortcode_tab_item( $atts, $content = null ) {
		$defaults = array(
			'title' => 'Tab',
			'icon' => '',
		);
		
		extract( shortcode_atts( $defaults, $atts) );

		$icon_html = '';
		if ( ! empty( $icon ) ) {
			$icon_html = "<i class='icon-".esc_attr( $icon )."'></i> ";
		}

		if ( ! isset( $GLOBALS['vw_tab_id'] ) ) {
			$GLOBALS['vw_tab_id'] = 0;
		}
		$GLOBALS['vw_tab_id']++;

		$tab_inner_html = $icon_html.$title;

		$tab_header_html = sprintf( '<a class="vw-tab-title tab-id-%1$s" href="#tab-%1$s" data-tab-id="%1$s">', $GLOBALS['vw_tab_id'] );
		$tab_header_html .= $tab_inner_html . '</a>';

		$tab_content_html = sprintf( '<a class="vw-tab-title vw-full-tab visible-xs tab-id-%1$s" href="#tab-%1$s" data-tab-id="%1$s">', $GLOBALS['vw_tab_id'] );
		$tab_content_html .= $tab_inner_html . '</a>';
		$tab_content_html .= sprintf( '<div id="tab-%1$s" class="vw-tab-content" data-tab-id="%1$s">', $GLOBALS['vw_tab_id'] ) . do_shortcode( $content ) . '</div>';

		// Return
		$GLOBALS['vw_tab_headers'] .= $tab_header_html;
		$GLOBALS['vw_tab_contents'] .= $tab_content_html;
	}
}

/* -----------------------------------------------------------------------------
 * Fix the smk sidebar (using return instead echo)
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_smk_sidebar_shortcode' ) ) {
	function vw_smk_sidebar_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'name' => 'Default Sidebar',
		), $atts ) );
		ob_start();
		smk_custom_dynamic_sidebar($name);
		return ob_get_clean();
	}
	remove_shortcode( 'smk_sidebar' );
	add_shortcode( 'smk_sidebar', 'vw_smk_sidebar_shortcode' );
	add_shortcode( 'sidebar', 'vw_smk_sidebar_shortcode' );
}

/* -----------------------------------------------------------------------------
 * Force default width for flexmap
 * -------------------------------------------------------------------------- */
if ( ! function_exists( 'vw_flexmap_shortcode_attrs' ) ) {
	function vw_flexmap_shortcode_attrs($attrs) {
		if ( ! isset( $attrs['width'] ) )
			$attrs['width'] = '100%';
		
		return $attrs;
	}
	add_filter('flexmap_shortcode_attrs', 'vw_flexmap_shortcode_attrs');
}

/* -----------------------------------------------------------------------------
 * Configure Shortcode Editor
 * -------------------------------------------------------------------------- */

function vw_shortcode_editor_init() {
	$button_style_options = array(
		'primary' => __( 'Primary', 'envirra' ),
		'black' => __( 'Black', 'envirra' ),
		'orange' => __( 'Orange', 'envirra' ),
		'red' => __( 'Red', 'envirra' ),
		'yellow' => __( 'Yellow', 'envirra' ),
		'blue' => __( 'Blue', 'envirra' ),
		'green' => __( 'Green', 'envirra' ),
		'purple' => __( 'Purple', 'envirra' ),
		'pink' => __( 'Pink', 'envirra' ),
	);

	$shortcodes = array();

	$shortcodes[ 'accordion' ] = array(
		'atts' => array(
			'title' => array(
				'title' => __( 'Title', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
			),
			'open' => array(
				'title' => __( 'Open', 'envirra' ),
				'desc' => __( 'Open this toggle by default', 'envirra' ),
				'default' => 'false',
				'type' => 'dropdown',
				'options' => array(
					'false' => __( 'False', 'envirra' ),
					'true' => __( 'True', 'envirra' ),
				),
			),
			'content' => array(
				'title' => __( 'Content', 'envirra' ),
				'desc' => '',
				'default' => 'Lorem ipsum',
				'type' => 'html',
				'render_as' => 'content',
			),
		),
	);

	$shortcodes[ 'posts' ] = array(
		'atts' => array(
			'title' => array(
				'title' => __( 'Title', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
			),
			'count' => array(
				'title' => __( 'Post Counts', 'envirra' ),
				'desc' => '',
				'default' => '6',
				'type' => 'text',
			),
			'cat_name' => array(
				'title' => __( 'Post Category', 'envirra' ),
				'desc' => 'The slug of category',
				'default' => '',
				'type' => 'text',
			),
			'cat_exclude' => array(
				'title' => __( 'Exclude Categories', 'envirra' ),
				'desc' => 'The ID of categories. Separated by comma',
				'default' => '',
				'type' => 'text',
			),
			'tag' => array(
				'title' => __( 'Post Tagged', 'envirra' ),
				'desc' => 'The slug of tags. Separated by comma',
				'default' => '',
				'type' => 'text',
			),
			'format' => array(
				'title' => __( 'Post Format', 'envirra' ),
				'desc' => __( 'The format of post to be displayed', 'envirra' ),
				'default' => '',
				'type' => 'dropdown',
				'options' => array(
					'' => __( 'All', 'envirra' ),
					'video' => __( 'Video', 'envirra' ),
					'audio' => __( 'Audio', 'envirra' ),
					'gallery' => __( 'Gallery', 'envirra' ),
				),
			),
			'featured' => array(
				'title' => __( 'Only Featured Posts', 'envirra' ),
				'desc' => '',
				'default' => 'false',
				'type' => 'dropdown',
				'options' => array(
					'false' => __( 'False', 'envirra' ),
					'true' => __( 'True', 'envirra' ),
				),
			),
			'layout' => array(
				'title' => __( 'Layout', 'envirra' ),
				'desc' => __( 'The layout of posts', 'envirra' ),
				'default' => '',
				'type' => 'dropdown',
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
			'order' => array(
				'title' => __( 'Order', 'envirra' ),
				'desc' => __( 'The ordering of posts', 'envirra' ),
				'default' => '',
				'type' => 'latest',
				'options' => array(
					'latest' => __( 'Latest', 'envirra' ),
					'random' => __( 'Random', 'envirra' ),
					'popular' => __( 'Popular', 'envirra' ),
					'viewed' => __( 'Most Viewed', 'envirra' ),
					'reviews' => __( 'Most Review Scores', 'envirra' ),
				),
			),
		),
	);

	$shortcodes[ 'button' ] = array(
		'atts' => array(
			'label' => array(
				'title' => __( 'Label', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
				'render_as' => 'content',
			),
			'style' => array(
				'title' => __( 'Style', 'envirra' ),
				'desc' => '',
				'default' => 'primary',
				'type' => 'dropdown',
				'options' => $button_style_options,
			),
			'url' => array(
				'title' => __( 'Link to Url', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
			),
			'target' => array(
				'title' => __( 'Link Target', 'envirra' ),
				'desc' => __( 'The location to open link, enter "_blank" for open the link in new window', 'envirra' ),
				'default' => '_self',
				'type' => 'text',
			),
			'icon' => array(
				'title' => __( 'Icon', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'icon',
			),
			'fullwidth' => array(
				'title' => __( 'Full Width', 'envirra' ),
				'desc' => __( 'Expand button to fit the container', 'envirra' ),
				'default' => 'false',
				'type' => 'dropdown',
				'options' => array(
					'false' => __( 'False', 'envirra' ),
					'true' => __( 'True', 'envirra' ),
				),
			),
		),
	);

	$shortcodes[ 'dropcap' ] = array(
		'atts' => array(
			'text' => array(
				'title' => __( 'Character', 'envirra' ),
				'desc' => __( 'The character to be a dropcap', 'envirra' ),
				'default' => '',
				'type' => 'text',
				'render_as' => 'content',
			),
		),
	);

	$shortcodes[ 'infobox' ] = array(
		'atts' => array(
			'title' => array(
				'title' => __( 'Title', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
			),
			'text' => array(
				'title' => __( 'Content', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'html',
				'render_as' => 'content',
			),
		),
	);

	$shortcodes[ 'mark' ] = array(
		'atts' => array(
			'text' => array(
				'title' => __( 'Text', 'envirra' ),
				'desc' => __( 'the text to be marked', 'envirra' ),
				'default' => '',
				'type' => 'text',
				'render_as' => 'content',
			),
		),
	);

	$shortcodes[ 'quote' ] = array(
		'atts' => array(
			'text' => array(
				'title' => __( 'Text', 'envirra' ),
				'desc' => '',
				'default' => '',
				'type' => 'text',
				'render_as' => 'content',
			),
			'align' => array(
				'title' => __( 'Align', 'envirra' ),
				'desc' => '',
				'default' => 'none',
				'type' => 'dropdown',
				'options' => array(
					'none' => __( 'None', 'envirra' ),
					'left' => __( 'Left', 'envirra' ),
					'right' => __( 'Right', 'envirra' ),
				),
			),
		),
	);

	global $vwsce;
	$vwsce->register_shortcodes( $shortcodes );
}
add_action( 'vwsce_editor_init', 'vw_shortcode_editor_init' );

if ( ! function_exists( 'vwsce_theme_icon_entypo' ) ) {
	function vwsce_theme_icon_entypo( $icons ) {
		return array_merge( $icons, array(
			'icon-entypo-plus', 'icon-entypo-minus', 'icon-entypo-info', 'icon-entypo-left-thin',
			'icon-entypo-up-thin', 'icon-entypo-right-thin', 'icon-entypo-down-thin', 'icon-entypo-level-up',
			'icon-entypo-level-down', 'icon-entypo-switch', 'icon-entypo-infinity', 'icon-entypo-plus-squared',
			'icon-entypo-minus-squared', 'icon-entypo-home', 'icon-entypo-keyboard', 'icon-entypo-erase',
			'icon-entypo-pause', 'icon-entypo-fast-forward', 'icon-entypo-fast-backward', 'icon-entypo-to-end',
			'icon-entypo-to-start', 'icon-entypo-hourglass', 'icon-entypo-stop', 'icon-entypo-up-dir',
			'icon-entypo-play', 'icon-entypo-right-dir', 'icon-entypo-down-dir', 'icon-entypo-left-dir',
			'icon-entypo-adjust', 'icon-entypo-cloud', 'icon-entypo-star', 'icon-entypo-star-empty',
			'icon-entypo-cup', 'icon-entypo-menu', 'icon-entypo-moon', 'icon-entypo-heart-empty',
			'icon-entypo-heart', 'icon-entypo-note', 'icon-entypo-note-beamed', 'icon-entypo-layout',
			'icon-entypo-flag', 'icon-entypo-tools', 'icon-entypo-cog', 'icon-entypo-attention',
			'icon-entypo-flash', 'icon-entypo-record', 'icon-entypo-cloud-thunder', 'icon-entypo-tape',
			'icon-entypo-flight', 'icon-entypo-mail', 'icon-entypo-pencil', 'icon-entypo-feather',
			'icon-entypo-check', 'icon-entypo-cancel', 'icon-entypo-cancel-circled', 'icon-entypo-cancel-squared',
			'icon-entypo-help', 'icon-entypo-quote', 'icon-entypo-plus-circled', 'icon-entypo-minus-circled',
			'icon-entypo-right', 'icon-entypo-direction', 'icon-entypo-forward', 'icon-entypo-ccw',
			'icon-entypo-cw', 'icon-entypo-left', 'icon-entypo-up', 'icon-entypo-down',
			'icon-entypo-list-add', 'icon-entypo-list', 'icon-entypo-left-bold', 'icon-entypo-right-bold',
			'icon-entypo-up-bold', 'icon-entypo-down-bold', 'icon-entypo-user-add', 'icon-entypo-help-circled',
			'icon-entypo-info-circled', 'icon-entypo-eye', 'icon-entypo-tag', 'icon-entypo-upload-cloud',
			'icon-entypo-reply', 'icon-entypo-reply-all', 'icon-entypo-code', 'icon-entypo-export',
			'icon-entypo-print', 'icon-entypo-retweet', 'icon-entypo-comment', 'icon-entypo-chat',
			'icon-entypo-vcard', 'icon-entypo-address', 'icon-entypo-location', 'icon-entypo-map',
			'icon-entypo-compass', 'icon-entypo-trash', 'icon-entypo-doc', 'icon-entypo-doc-text-inv',
			'icon-entypo-docs', 'icon-entypo-doc-landscape', 'icon-entypo-archive', 'icon-entypo-rss',
			'icon-entypo-share', 'icon-entypo-basket', 'icon-entypo-shareable', 'icon-entypo-login',
			'icon-entypo-logout', 'icon-entypo-volume', 'icon-entypo-resize-full', 'icon-entypo-resize-small',
			'icon-entypo-popup', 'icon-entypo-publish', 'icon-entypo-window', 'icon-entypo-arrow-combo',
			'icon-entypo-chart-pie', 'icon-entypo-language', 'icon-entypo-air', 'icon-entypo-database',
			'icon-entypo-drive', 'icon-entypo-bucket', 'icon-entypo-thermometer', 'icon-entypo-down-circled',
			'icon-entypo-left-circled', 'icon-entypo-right-circled', 'icon-entypo-up-circled', 'icon-entypo-down-open',
			'icon-entypo-left-open', 'icon-entypo-right-open', 'icon-entypo-up-open', 'icon-entypo-down-open-mini',
			'icon-entypo-left-open-mini', 'icon-entypo-right-open-mini', 'icon-entypo-up-open-mini', 'icon-entypo-down-open-big',
			'icon-entypo-left-open-big', 'icon-entypo-right-open-big', 'icon-entypo-up-open-big', 'icon-entypo-progress-0',
			'icon-entypo-progress-1', 'icon-entypo-progress-2', 'icon-entypo-progress-3', 'icon-entypo-back-in-time',
			'icon-entypo-network', 'icon-entypo-inbox', 'icon-entypo-install', 'icon-entypo-lifebuoy',
			'icon-entypo-mouse', 'icon-entypo-dot', 'icon-entypo-dot-2', 'icon-entypo-dot-3',
			'icon-entypo-suitcase', 'icon-entypo-flow-cascade', 'icon-entypo-flow-branch', 'icon-entypo-flow-tree',
			'icon-entypo-flow-line', 'icon-entypo-flow-parallel', 'icon-entypo-brush', 'icon-entypo-paper-plane',
			'icon-entypo-magnet', 'icon-entypo-gauge', 'icon-entypo-traffic-cone', 'icon-entypo-cc',
			'icon-entypo-cc-by', 'icon-entypo-cc-nc', 'icon-entypo-cc-nc-eu', 'icon-entypo-cc-nc-jp',
			'icon-entypo-cc-sa', 'icon-entypo-cc-nd', 'icon-entypo-cc-pd', 'icon-entypo-cc-zero',
			'icon-entypo-cc-share', 'icon-entypo-picture', 'icon-entypo-globe', 'icon-entypo-leaf',
			'icon-entypo-graduation-cap', 'icon-entypo-mic', 'icon-entypo-palette', 'icon-entypo-ticket',
			'icon-entypo-video', 'icon-entypo-target', 'icon-entypo-music', 'icon-entypo-trophy',
			'icon-entypo-thumbs-up', 'icon-entypo-thumbs-down', 'icon-entypo-bag', 'icon-entypo-user',
			'icon-entypo-users', 'icon-entypo-lamp', 'icon-entypo-alert', 'icon-entypo-water',
			'icon-entypo-droplet', 'icon-entypo-credit-card', 'icon-entypo-monitor', 'icon-entypo-briefcase',
			'icon-entypo-floppy', 'icon-entypo-cd', 'icon-entypo-folder', 'icon-entypo-doc-text',
			'icon-entypo-calendar', 'icon-entypo-chart-line', 'icon-entypo-chart-bar', 'icon-entypo-clipboard',
			'icon-entypo-attach', 'icon-entypo-bookmarks', 'icon-entypo-book', 'icon-entypo-book-open',
			'icon-entypo-phone', 'icon-entypo-megaphone', 'icon-entypo-upload', 'icon-entypo-download',
			'icon-entypo-box', 'icon-entypo-newspaper', 'icon-entypo-mobile', 'icon-entypo-signal',
			'icon-entypo-camera', 'icon-entypo-shuffle', 'icon-entypo-loop', 'icon-entypo-arrows-ccw',
			'icon-entypo-light-down', 'icon-entypo-light-up', 'icon-entypo-mute', 'icon-entypo-sound',
			'icon-entypo-battery', 'icon-entypo-search', 'icon-entypo-key', 'icon-entypo-lock',
			'icon-entypo-lock-open', 'icon-entypo-bell', 'icon-entypo-bookmark', 'icon-entypo-link',
			'icon-entypo-back', 'icon-entypo-flashlight', 'icon-entypo-chart-area', 'icon-entypo-clock',
			'icon-entypo-rocket', 'icon-entypo-block',
		) );
	}

	add_filter( 'vwsce_icon_list', 'vwsce_theme_icon_entypo' );
}

if ( ! function_exists( 'vwsce_field_render_icon' ) ) {
	function vwsce_field_render_icon() {
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/framework/font-icons/entypo/css/entypo.css">
		<?php
	}
	add_action( 'vwsce_after_build_editor', 'vwsce_field_render_icon' );
}