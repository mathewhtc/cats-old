<?php $author = vw_get_current_author(); ?>
<div class="vw-post-box vw-post-box-style-left-thumbnail vw-post-box-small-author clearfix">
	<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php echo vw_get_author_avatar(); ?>
	</a>

	<h5 class="vw-post-box-post-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h5>

	<div class="vw-post-box-meta">
		<span class="vw-post-box-author-name"><i class="icon-entypo-user"></i>	<?php echo get_the_author_meta( 'display_name', $author->ID ); ?></span>
	</div>

</div>