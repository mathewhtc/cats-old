<div class="vw-post-box-meta vw-post-box-meta-tiny">

	<div class="vw-post-meta-left">
		<?php vw_the_post_views(); ?>
	<?php if ( vw_has_review() ) : ?>
		<?php vw_the_post_review_star(); ?>
	<?php else : ?>
		<a href="<?php the_permalink(); ?>" class="vw-post-date updated" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><i class="icon-entypo-clock"></i><?php vw_the_post_date(); ?></a>
	<?php endif; ?>
	</div>

	<div class="clearright"></div>
</div>