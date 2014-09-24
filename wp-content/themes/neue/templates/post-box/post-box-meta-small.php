<div class="vw-post-box-meta vw-post-box-meta-small">

	<div class="vw-post-meta-left">
		<?php if ( vw_has_review() ) : ?>
			<?php vw_the_post_review_star(); ?>
		<?php else : ?>
			<!-- Post date -->
			<a href="<?php the_permalink(); ?>" class="vw-post-date updated" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><i class="icon-entypo-clock"></i><?php vw_the_post_date(); ?></a>
		<?php endif; ?>
	</div>

	<div class="vw-post-meta-right">
		<?php vw_the_post_views(); ?>

		<?php vw_the_comment_link(); ?>
	</div>
	
	<div class="clearright"></div>
</div>