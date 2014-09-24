<?php get_header(); ?>

<?php
get_template_part( 'templates/page-title', apply_filters( 'vw_filter_page_title_template_name', '' ) );
?>

<div class="vw-page-wrapper clearfix">

	<div class="container">
		<div class="row">
			<div class="vw-page-content col-md-8" role="main">

				<?php if ( vw_has_category_top_content() ) vw_the_category_top_content(); ?>

				<?php if ( vw_has_category_slider() ) vw_the_category_post_slider(); ?>

				<?php do_action( 'vw_action_before_archive_posts' ); ?>
				
				<?php get_template_part( 'templates/post-box/post-layout-'.vw_get_archive_blog_layout() ); ?>

				<?php vw_the_pagination(); ?>

				<?php do_action( 'vw_action_after_archive_posts' ); ?>

			</div>

			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar( 'archive' ); ?>

			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>