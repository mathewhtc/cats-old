<div class="vw-post-box-layout vw-post-box-layout-grid-3-col">
	<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
	<div class="vw-post-box-layout-title-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="vw-post-box-layout-title"><?php echo do_shortcode( $title ); ?></h2>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-sm-12">
			<?php while( have_posts() ) : ?>
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
			<?php endwhile; ?>
		</div>
	</div>
</div>