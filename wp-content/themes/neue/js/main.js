/* -----------------------------------------------------------------------------
 * Document ready
 * -------------------------------------------------------------------------- */
;(function( $, window, document, undefined ){
	"use strict";

	$( document ).ready( function ($) {

		// Breaking News
		if ( $.fn.newsTicker ) {
			$('.vw-breaking-news-list').newsTicker( {
				row_height: 40,
				max_rows: 1,
				speed: 600,
				direction: 'up',
				duration: 4000,
				autostart: 1,
				pauseOnHover: 1
			} ).addClass( 'loaded' );
		}

		// Sticky Bar
		if ( $.fn.sticky ) {
			$( '.vw-sticky' ).sticky( {
				wrapperClassName: 'vw-sticky-wrapper'
			} );

			$(window).on("debouncedresize", function( event ) {
			    $( '.vw-sticky' ).css('height','auto').sticky('update');
			});
		}

		// Swipebox
		if ( $.fn.swipebox ) {
			$(".swipebox, .vw-custom-tiled-gallery a").swipebox();
		}

		// FitVid
		if ( $.fn.fitVids ) {
			$( '.vw-embeded-media, .vw-featured-image-wrapper, .flxmap-container, .comment-body, .post-content, #footer' ).fitVids( { customSelector: "iframe[src*='maps.google.']" });
		}

		// imgLiquid
		if ( $.fn.imgLiquid ) {
			$('.vw-post-box-boxed .vw-post-box-thumbnail').imgLiquid( {
				verticalAlign: 'top',
				horizontalAlign: 'center',
			} );
		}

		// Text Menu
		$( '.vw-menu-type-text .menu-item' ).hoverIntent( function() {
			$( '> .sub-menu', this ).stop().slideDown( 'fast' );

		}, function() {
			$( '> .sub-menu', this ).stop().slideUp( 'fast' );
			
		} );

		$( '.vw-menu-type-mega-post .main-menu-item' )
		.filter( '.menu-item-has-children, .vw-mega-menu-has-posts' ).hoverIntent( function() {
			$( '> .sub-menu-wrapper', this ).stop().slideDown( 'fast' );

		}, function() {
			$( '> .sub-menu-wrapper', this ).stop().slideUp( 'fast' );

		} );

		// Mobile menu
		$( '.vw-menu-mobile-wrapper .vw-mobile-menu-button' ).click( function() {
			$( '.vw-menu-mobile-wrapper .vw-menu' ).slideToggle( 'fast' );
		} );

		//  Instant search
		if ( $.fn.instant_search ) {
			$( '.vw-instant-search-buton' ).instant_search();
		}

		// Star Rating
		if ( $.fn.raty ) {
			$( '.vw-post-review-star, .vw-review-score-star .vw-review-score-number' ).raty( {
				path: vw_main_js.theme_path+'/js/raty/images',
				readOnly: true,
				half: true,
				space: false,
				size: 16,
				width: 110,
				score: function() {
					return $( this ).attr( 'data-score' );
				}
			} );
		}

		// Widget Tabs
		$( ".vw-post-tabed" ).tabs( {
			show: { effect: "fade", duration: 300 }
		} );

		// Wordpress gallery grid
		$( '.vw-custom-tiled-gallery' ).each( function ( i, el ) {
			var $gallery =  $( el );
			var layout = $gallery.attr( 'data-gallery-layout' );
			if ( ! ( parseInt( layout, 10 ) > 0 ) ) {
				layout = '213'; // Default layout
			}

			layout = layout.split('');
			var columnLayout = [];
			for (var i in layout ) {
				var columnCount = parseInt( layout[i], 10 );
				var columnWidth = 100.0 / columnCount;
				for ( var j = 1; j <= columnCount; j++ ) {
					columnLayout.push( columnWidth );
				}
			}

			$gallery.find( '> figure' ).each( function( i, el ) {
				var $el = $( el );
				var layoutIndex = i % columnLayout.length;
				$el.css( 'width', columnLayout[ layoutIndex ] - 1 + '%' );
			} );
		} );
	} );

})( jQuery, window , document );


/**
 * No-touch detection
 */
if (!("ontouchstart" in document.documentElement)){ 
    document.documentElement.className += " no-touch"; 
} else {
    document.documentElement.className += " touchable"; 
}