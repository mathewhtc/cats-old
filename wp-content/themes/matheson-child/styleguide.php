<?php
/*
Template Name: Style User Guide
 */
get_header();
?>
	<header class="header-pos" id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
		
			<div class="container">

					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title"><?php echo the_title();?></h1><!-- .page-title -->
						</div>
					</div>

			</div>
	
	</header>		
			

	<div class="container">
		
		<div class="row">
				

				<div class="col-md-8">
					<div class="user-container clearfix">	
					
						<div class="wdt-percent"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/2g.jpg"  alt="Product" /></a></div>
						<div class="wdt-percent mgn2"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/2g.jpg"  alt="Product" /></a></div>

						<div class="wdt-percent"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/2g.jpg"  alt="Product" /></a></div>
						<div class="wdt-percent mgn2"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/2g.jpg"  alt="Product" /></a></div>
				
					</div>
				</div>

				<div class="col-md-4">
				
					<?php get_sidebar(); ?>

				</div>

		</div>
    </div>

<?php get_footer(); ?>	