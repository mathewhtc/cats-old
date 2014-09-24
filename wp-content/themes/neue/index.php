<?php get_header(); ?>

<?php get_template_part( 'templates/page-title', apply_filters( 'vw_filter_page_title_template_name', '' ) ); ?>

<div class="vw-page-wrapper clearfix">
	<div class="container">
		<div class="row">
			<div class="vw-page-content col-md-8" role="main">
				
				<?php get_template_part( 'templates/post-box/post-layout-'.vw_get_archive_blog_layout() ); ?>

				<?php vw_the_pagination(); ?>
				
			</div>

			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar(); ?>

			</aside>
		
		</div>
	</div>

</div>

<?php get_footer(); ?>