<?php get_header(); ?>

<?php
if ( '0' !== get_post_meta( get_queried_object_id(), 'show_page_title', true ) ) {
	get_template_part( 'templates/page-title', apply_filters( 'vw_filter_page_title_template_name', '' ) );
} ?>

<div class="vw-page-wrapper clearfix">
	<div class="container">
		<div class="row">
			<div class="vw-page-content col-md-8" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?>>

						<div class="entry-content clearfix">

							<?php the_content(); ?>

						</div><!-- .entry-content -->

						<?php wp_link_pages( array(
							'before'      => '<div class="vw-page-links"><span class="vw-page-links-title">' . __( 'Pages:', 'envirra' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="vw-page-link">',
							'link_after'  => '</span>',
						) ); ?>
						
					</article><!-- #post-## -->

				<?php endwhile; ?>

				<?php if ( ! vw_get_theme_option( 'page_force_disable_comments' ) && ( comments_open() || get_comments_number() ) ) comments_template(); ?>

			</div>

			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar( 'page' ); ?>

			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>