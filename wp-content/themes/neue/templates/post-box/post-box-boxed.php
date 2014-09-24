<div class="vw-post-box vw-post-box-boxed">
	<div class="vw-post-box-thumbnail">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_BOX_BOXED ); ?>
	</div>

	<div class="vw-post-box-overlay">
		<?php vw_the_category(); ?>
		<h4 class="vw-post-box-post-title">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h4>
		<?php vw_the_post_review_star(); ?>
	</div>
</div>