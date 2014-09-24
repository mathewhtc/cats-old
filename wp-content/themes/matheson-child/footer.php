<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<div id="footer-content" class="container">
			<div class="row">
				<div class="copyright col-lg-12">
					<span class="pull-left"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'matheson' ), date( 'Y' ), ' <a href="' . home_url() . '">' . 'HTC' .'</a>' ); ?></span>
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
function loadContent(post_link){
	jQuery("#single-post-container").html('<div class="loading"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ajax-loader.gif"></div>');
    jQuery("#single-post-container").load(post_link+" #inner_post_content");
        return false;
}
   jQuery(document).ready(function(){
		
     });
</script>

</body>
</html>