<?php get_header(); ?>

<?php get_template_part( 'templates/page-title' ); ?>

<div class="vw-page-wrapper clearfix">
	<div class="container">
		<div class="row">
			<div class="vw-page-content col-md-8" role="main">
				
				<?php do_action( 'vw_action_before_archive_posts' ); ?>
				
				<?php get_template_part( 'templates/post-box/post-layout-'.vw_get_archive_blog_layout() ); ?>

				<?php do_action( 'vw_action_after_archive_posts' ); ?>

				<?php vw_the_pagination(); ?>

			</div>

			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar( 'search' ); ?>

			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>