<div class="vw-post-meta">

	<div class="vw-post-meta-left">
		<!-- Author -->
		<?php echo vw_get_avatar( get_the_author_meta('user_email'), VW_CONST_AVATAR_SIZE_SMALL ); ?>
		<a class="author-name author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php _e('View all posts by', 'envirra'); ?> <?php the_author(); ?>"><?php the_author(); ?></a>
		
		<span class="vw-post-meta-separator">&mdash;</span>

		<?php if ( vw_has_review() ) : ?>
			<?php vw_the_post_review_star(); ?>
		<?php else : ?>
			<!-- Post date -->
			<a href="<?php the_permalink(); ?>" class="vw-post-date updated" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><i class="icon-entypo-clock"></i><?php vw_the_post_date(); ?></a>
		<?php endif; ?>
	</div>

	<div class="vw-post-meta-right">
		<?php vw_the_post_views(); ?>

		<?php vw_the_likes(); ?>

		<?php vw_the_comment_link(); ?>
		
		<?php if ( is_single() ) : ?>
		<div class="vw-post-shares">
			<a class="vw-post-share vw-post-share-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&amp;t=<?php echo urlencode( get_the_title() ); ?>" title="<?php esc_attr_e( 'Share on Facebook', 'envirra' ) ?>" target="_blank"><i class="icon-social-facebook"></i></a>
			<a class="vw-post-share vw-post-share-twitter" href="https://twitter.com/home?status=<?php echo urlencode( get_the_title().' '.get_permalink() ); ?>" title="<?php esc_attr_e( 'Share on Twitter', 'envirra' ) ?>" target="_blank"><i class="icon-social-twitter"></i></a>
			<a class="vw-post-share vw-post-share-googleplus" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>" title="<?php esc_attr_e( 'Share on Google+', 'envirra' ) ?>" target="_blank"><i class="icon-social-gplus"></i></a>
			<?php
			$media = '';
			if ( has_post_thumbnail() ) $media = '&amp;media='.wp_get_attachment_thumb_url( get_post_thumbnail_id() );

			$description = '';
			if ( get_the_title() ) $description = '&amp;description='.esc_attr( get_the_title() );
			?>
			<a class="vw-post-share vw-post-share-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ) . $media . $description; ?>" title="<?php esc_attr_e( 'Share on Pinterest', 'envirra' ) ?>" target="_blank"><i class="icon-social-pinterest"></i></a>
		</div>
		<?php endif; ?>
	</div>
	
	<div class="clearright"></div>
</div>