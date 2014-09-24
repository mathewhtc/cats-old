<div class="flexslider vw-post-slider vw-post-box-layout-slider-large vw-post-slider-no-control-nav vw-post-slider-template-default clearfix">
	<ul class="slides">

	<?php while( have_posts() ) : ?>
		<li class="vw-post-slider-slide">
			<div class="vw-box-3-wrapper clearfix">
					<?php if ( vw_more_posts() ) : the_post(); ?>
					<div class="vw-box-3 vw-box-3-left">
						<?php get_template_part( 'templates/post-box/post-box-boxed', get_post_format() ); ?>
					</div>
					<?php endif; ?>

					<?php if ( vw_more_posts() ) : the_post(); ?>
					<div class="vw-box-3 vw-box-3-right-top">
						<?php get_template_part( 'templates/post-box/post-box-boxed', get_post_format() ); ?>
					</div>
					<?php endif; ?>

					<?php if ( vw_more_posts() ) : the_post(); ?>
					<div class="vw-box-3 vw-box-3-right-bottom">
						<?php get_template_part( 'templates/post-box/post-box-boxed', get_post_format() ); ?>
					</div>
					<?php endif; ?>
				</div>
		</li>
	<?php endwhile; ?>
	
	</ul>
</div>