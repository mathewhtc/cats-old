<div class="flexslider vw-post-slider vw-post-box-layout-slider-small vw-flexslider-small-nav vw-post-slider-no-control-nav vw-post-slider-template-default clearfix">
	<ul class="slides">

	<?php while( have_posts() ) : the_post(); ?>
		<li class="vw-post-slider-slide">

			<div class="vw-post-slider-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_SLIDER_SMALL ); ?>
				</a>
			</div>
		
		</li>
	<?php endwhile; ?>
	
	</ul>
</div>