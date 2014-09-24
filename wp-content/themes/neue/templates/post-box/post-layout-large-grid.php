<div class="vw-post-box-layout vw-post-box-layout-large-grid">
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
			<div class="block-grid block-grid-xxs-1 block-grid-xs-2 block-grid-sm-2">

			<?php while( have_posts() ) : the_post(); ?>
				<div class="block-grid-item">
				<?php get_template_part( 'templates/post-box/post-box-large', get_post_format() ); ?>
				</div>
			<?php endwhile; ?>

			</div>
		</div>
	</div>
</div>