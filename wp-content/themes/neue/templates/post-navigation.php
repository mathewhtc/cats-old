<div class="vw-post-navigation vw-post-navigation-style-default clearfix">
	<div class="vw-post-navigation-inner">

		<?php $prev_post = get_previous_post(); ?>
		<?php if ( ! empty( $prev_post ) ) : ?>
		<a class="vw-post-navigation-previous" href="<?php echo get_permalink( $prev_post->ID ); ?>">
			<i class="vw-post-navigation-icon icon-entypo-left-open-big"></i>

			<span class="vw-post-navigation-content">
				<span class="vw-post-navigation-label"><?php _e( 'Previous post', 'envirra' ); ?></span>
				<h4 class="vw-post-navigation-title">
					<?php echo $prev_post->post_title; ?>
				</h4>
			</span>
		</a>
		<?php else: ?>
			<div class="vw-post-navigation-previous">
				<span class="vw-post-navigation-content">
					<span class="vw-post-navigation-label"><?php _e( 'Previous post', 'envirra' ); ?></span>
					<h4 class="vw-post-navigation-title vw-post-navigation-title-no-link">
						<?php _e( 'There is no more story.', 'envirra' ); ?>
					</h4>
				</span>
			</div>
		<?php endif; ?>
		
		<?php $next_post = get_next_post(); ?>
		<?php if ( ! empty( $next_post ) ) : ?>
		<a class="vw-post-navigation-next" href="<?php echo get_permalink( $next_post->ID ); ?>">
			<i class="vw-post-navigation-icon icon-entypo-right-open-big"></i>

			<span class="vw-post-navigation-content">
				<span class="vw-post-navigation-label"><?php _e( 'Next post', 'envirra' ); ?></span>
				<h4 class="vw-post-navigation-title">
					<?php echo $next_post->post_title; ?>
				</h4>
			</span>
		</a>
		<?php else: ?>
			<div class="vw-post-navigation-next">
				<span class="vw-post-navigation-content">
					<span class="vw-post-navigation-label"><?php _e( 'Next post', 'envirra' ); ?></span>
					<h4 class="vw-post-navigation-title vw-post-navigation-title-no-link">
						<?php _e( 'This is the most recent story.', 'envirra' ); ?>
					</h4>
				</span>
			</div>
		<?php endif; ?>
	</div>
</div>