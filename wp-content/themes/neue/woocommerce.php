<?php get_header(); ?>

<?php if ( ! is_product() ) get_template_part( 'templates/page-title', apply_filters( 'vw_filter_page_title_template_name', '' ) ); ?>

<div class="vw-page-wrapper clearfix">
	<div class="container">
		<div class="row">
			<?php if ( vw_woo_is_enable_sidebar() ) : ?>
			<div class="vw-page-content col-md-8" role="main">
			<?php else: ?>
			<div class="vw-page-content col-sm-12" role="main">
			<?php endif; ?>

				<?php woocommerce_content(); ?>

			</div>

			<?php if ( vw_woo_is_enable_sidebar() ) : ?>
			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar( 'woocommerce' ); ?>

			</aside>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>