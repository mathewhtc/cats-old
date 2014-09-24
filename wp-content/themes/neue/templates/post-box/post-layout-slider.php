<div class="flexslider vw-post-slider vw-post-box-layout-slider vw-post-slider-no-control-nav vw-post-slider-template-default clearfix">
	<ul class="slides">

	<?php while( have_posts() ) : the_post(); ?>
		<li class="vw-post-slider-slide">

			<div class="vw-post-slider-image">
				<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SLIDER ); ?>
			</div>

			<div class="vw-post-slider-info">
				<?php $post_date = get_the_time(get_option('date_format')); ?>
				
				<?php vw_the_category(); ?>
				
				<h3 class="vw-post-slider-title">
					<a class="vw-post-slider-link" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h3>
			</div>
		</li>
	<?php endwhile; ?>
	
	</ul>
</div>