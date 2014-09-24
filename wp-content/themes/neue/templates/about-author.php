<div class="vw-about-author-section vcard author">

	<?php vw_the_author_avatar(); ?>

	<div class="vw-about-author">
		<?php $author = vw_get_current_author(); ?>
		<h3 class="vw-author-name fn"><?php echo $author->display_name; ?></h3>
		<p class="vw-author-bio note"><?php echo $author->user_description; ?></p>

		<div class="vw-author-socials clearfix">
			<?php vw_the_author_social_links(); ?>
		</div>
	</div>
</div>