<div class="vw-post-box vw-post-box-style-top-thumbnail vw-post-box-medium">
	<?php if ( has_post_thumbnail() ) : ?>
	<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_BOX_MEDIUM ); ?>
	</a>
	<?php endif; ?>

	<?php vw_the_category(); ?>
	<h4 class="vw-post-box-post-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h4>
	
	<?php get_template_part( 'templates/post-box/post-box-meta-small' ); ?>

</div>