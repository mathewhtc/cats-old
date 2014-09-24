<?php /* Init the post data */
if ( is_single() && have_posts() ) { the_post(); }
?>
<div class="vw-page-title-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 vw-page-title-wrapper-inner">

				<?php if ( is_single() && has_post_format( 'gallery' ) ): ?>
				<div class="vw-gallery-direction-nav">
					<a href="#" class="vw-gallery-direction-button vw-gallery-direction-prev">
						<i class="icon-entypo-left-open"></i>
					</a>
					<a href="#" class="vw-gallery-direction-button vw-gallery-direction-next">
						<i class="icon-entypo-right-open"></i>
					</a>
				</div>
				<?php endif; ?>

				<div class="vw-page-title-box clearfix">

					<?php if ( is_author() ) : ?>

						<div class="vw-page-title-thumbnail"><?php vw_the_author_avatar(); ?></div>

						<div class="vw-page-title-box-inner">
							<span class="vw-label"><?php _e( 'Author Archive', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php echo get_the_author(); ?></h1>
							<?php $author = vw_get_current_author(); ?>
							<p class="vw-author-bio note"><?php echo $author->user_description; ?></p>

							<div class="vw-author-socials clearfix">
								<?php vw_the_author_social_links(); ?>
							</div>
						</div>

					<?php elseif ( function_exists( 'is_shop' ) && is_shop() ) :
						$shop_page_id = wc_get_page_id( 'shop' );
						$shop_name = $shop_page_id ? get_the_title( $shop_page_id ) : __( 'Shop', 'envirra' );
						?>

						<h1 class="vw-page-title"><?php echo $shop_name; ?></h1>

					<?php elseif ( function_exists( 'is_product' ) && is_product() ) : ?>

						<h1 class="vw-page-title"><?php _e( 'Product', 'envirra' ); ?></h1>

					<?php elseif ( function_exists( 'is_product_tag' ) && is_product_tag() ) : ?>

						<span class="vw-label"><?php _e( 'Products tagged', 'envirra' ); ?></span>
						<h1 class="vw-page-title"><?php echo single_tag_title( '', false ); ?></h1>

					<?php elseif ( function_exists( 'is_product_category' ) && is_product_category() ) : ?>

						<?php $the_category_thumbnail = vw_get_the_category_thumbnail();
						if ( $the_category_thumbnail ) : ?>
						<div class="vw-page-title-thumbnail"><?php echo $the_category_thumbnail; ?></div>
						<?php endif; ?>
						
						<div class="vw-page-title-box-inner">
							<span class="vw-label"><?php _e( 'Products in', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php echo single_cat_title( '', false ); ?></h1>

							<?php if ( category_description() ) : ?>
							<div class="vw-page-description"><?php echo category_description(); ?></div>
							<?php endif; ?>
						</div>

					<?php elseif ( function_exists( 'bp_is_user' ) && bp_is_user() ) : ?>

						<h1 class="vw-page-title"><?php _e( 'Member', 'envirra' ); ?></h1>

					

					<?php elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) : ?>

						<?php if ( bbp_is_single_forum() ) : ?>
							<span class="vw-label"><?php _e( 'Forum', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php the_title(); ?></h1>

						<?php elseif ( bbp_is_single_user() ) : ?>

							<span class="vw-label"><?php _e( 'User', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php the_title(); ?></h1>

						<?php elseif ( bbp_is_single_topic() ) : ?>
							<span class="vw-label"><?php _e( 'Topic', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php the_title(); ?></h1>

						<?php else : ?>

							<h1 class="vw-page-title"><?php the_title(); ?></h1>

						<?php endif; ?>
					
					<?php elseif ( is_page() ) : ?>

						<h1 class="vw-page-title"><?php the_title(); ?></h1>
					
					<?php elseif ( is_single() ) : ?>

						<?php vw_the_category(); ?>
						<h1 class="vw-page-title"><?php the_title(); ?></h1>

						<?php get_template_part( 'templates/post-meta' ); ?>

					<?php elseif ( is_day() || is_month() || is_year() ) : ?>

						<span class="vw-label"><?php _e( 'All posts on', 'envirra' ); ?></span>
						<h1 class="vw-page-title"><?php echo vw_get_archive_date(); ?></h1>

					<?php elseif ( is_tag() ) : ?>

						<span class="vw-label"><?php _e( 'All posts tagged', 'envirra' ); ?></span>
						<h1 class="vw-page-title"><?php echo single_tag_title( '', false ); ?></h1>

					<?php elseif ( is_category() ) : ?>

						<?php $the_category_thumbnail = vw_get_the_category_thumbnail();
						$cat_ID = get_query_var('cat');
						if ( $the_category_thumbnail ) : ?>
						<div class="vw-page-title-thumbnail"><?php echo $the_category_thumbnail; ?></div>
						<?php endif; ?>
						
						<div class="vw-page-title-box-inner">
							<span class="vw-label <?php echo vw_the_category_class( $cat_ID ); ?>"><?php _e( 'All posts in', 'envirra' ); ?></span>
							<h1 class="vw-page-title"><?php echo single_cat_title( '', false ); ?></h1>

							<?php if ( category_description( $cat_ID ) ) : ?>
							<div class="vw-page-description"><?php echo category_description( $cat_ID ); ?></div>
							<?php endif; ?>
						</div>

					<?php elseif ( is_search() ) : ?>

						<h1 class="vw-page-title"><?php printf( __( 'Search Result for &ldquo;%s&rdquo;', 'envirra' ), get_search_query() ); ?></h1>

					<?php elseif ( is_404() ) : ?>

						<h1 class="vw-page-title"><?php _e( "We Couldn't Find Your Page!", 'envirra' ); ?></h1>

					<?php elseif ( is_home() ) : ?>

						<h1 class="vw-page-title"><?php _e( 'Blog', 'envirra' ); ?></h1>

					<?php else : ?>

						<?php if ( is_single() ) : vw_the_category(); endif; ?>
						<h1 class="vw-page-title"><?php _e( 'Archives', 'envirra' ); ?></h1>

					<?php endif; ?>
				
				</div>

			</div>
		</div>
	</div>
</div>

<?php /* Rewind the post data */
if ( is_single() && have_posts() ) { rewind_posts(); }
?>