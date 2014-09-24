<div class="vw-post-box vw-post-box-style-top-thumbnail vw-post-box-article">
	<?php if ( has_post_thumbnail() ) : ?>
	<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_BOX_ARTICLE ); ?>
	</a>
	<?php endif; ?>

	<?php vw_the_category(); ?>
	<h3 class="vw-post-box-post-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h3>

	<?php get_template_part( 'templates/post-box/post-box-meta' ); ?>

	<div class="vw-post-box-excerpt"><?php the_excerpt(); ?></div>

	<div class="vw-post-box-footer">
		<a href="<?php the_permalink(); ?>" class="vw-read-more"><?php _e( 'READ MORE &rarr;', 'envirra' ); ?></a>
	</div>
</div>