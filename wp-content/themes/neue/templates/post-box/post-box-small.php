<div class="vw-post-box vw-post-box-style-left-thumbnail vw-post-box-small clearfix">
	<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_BOX_SMALL ); ?>
	</a>
	
	<h5 class="vw-post-box-post-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h5>

	<?php get_template_part( 'templates/post-box/post-box-meta-tiny' ); ?>

</div>