<div class="vw-post-box vw-post-box-style-left-thumbnail vw-post-box-small-comment clearfix">
	<a class="vw-post-box-thumbnail" href="<?php echo get_permalink( $comment->comment_post_ID ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), get_the_title( $comment->comment_post_ID ) ); ?>" rel="bookmark">
		<?php echo vw_get_avatar( $comment->comment_author_email, 60 ); ?>
	</a>

	<h5 class="vw-post-box-post-title">
		<a href="<?php echo get_permalink( $comment->comment_post_ID ); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'envirra'), get_the_title( $comment->comment_post_ID ) ); ?>" rel="bookmark">
			<?php echo $comment->comment_author ?>
		</a>
	</h5>

	<p class="">
		<?php echo wp_trim_words( $comment->comment_content, VW_CONST_WIDGET_COMMENT_EXCERPT_LENGTH ) ?>
	</p>

</div>