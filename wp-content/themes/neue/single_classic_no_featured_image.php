<div class="vw-page-wrapper clearfix">
	<div class="container">
		<div class="row">
			<div class="vw-page-content col-md-8" role="main" itemprop="articleBody">

				<?php do_action( 'vw_action_before_single_post' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?>>

						<?php vw_the_category(); ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php get_template_part( 'templates/post-meta' ); ?>
						
						<?php vw_the_embeded_media(); ?>

						<div class="entry-content clearfix">

							<?php the_content(); ?>
							
						</div><!-- .entry-content -->

						<?php wp_link_pages( array(
							'before'      => '<div class="vw-page-links"><span class="vw-page-links-title">' . __( 'Pages:', 'envirra' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="vw-page-link">',
							'link_after'  => '</span>',
						) ); ?>

						<?php the_tags( '<div class="vw-tag-links"><span class="vw-tag-links-title">'.__( 'Tags:', 'envirra' ).'</span>', ',', '</div>' ); ?>

					</article><!-- #post-## -->

				<?php endwhile; ?>

				<?php do_action( 'vw_action_after_single_post' ); ?>

				<?php get_template_part( 'templates/pagination' ); ?>

				<?php vw_the_post_footer_sections(); ?>

			</div>

			<aside class="vw-page-sidebar col-md-4">

				<?php get_sidebar( apply_filters( 'vw_filter_single_post_sidebar_name', '' ) ); ?>

			</aside>
		</div>
	</div>
</div>