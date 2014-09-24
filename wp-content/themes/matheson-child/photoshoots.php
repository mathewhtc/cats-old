<?php
/*
Template Name: Photoshoots
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


<?php query_posts(array ( 'post_type' => 'photoshoot', 'posts_per_page' => 10 ) ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="product-container clearfix">
         <?php $project = get_the_term_list($post->ID, 'photoshoot'); ?>
         <?php $post_meta = get_post_meta(get_the_ID());?>
         
                    <h2 class="top-heading"><?php the_title(); ?></h2>
                    <br />
					<?php if(isset($post_meta['image_1'][0]) && ($post_meta['image_1'][0] != '')){?> 
                    <div class="featured-img-main" style="float:left; width:400px;">
						
                        <a href="<?php echo $post_meta['image_1'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_1'][0];?>" width="400" height="190" border="0"  /></a>				

                    </div>
        <?php }?>
		<!--
         <?php if(isset($post_meta['image_1'][0]) && ($post_meta['image_1'][0] != '')){?> 
                    <div class="feature-img">
						
                        <a href="<?php echo $post_meta['image_1'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_1'][0];?>" width="190" height="190" border="0"  /></a>				

                    </div>
        <?php }?>
        <?php if(isset($post_meta['image_2'][0]) && ($post_meta['image_2'][0] != '')){?>
		   <div class="showcase">
						
			<a href="<?php echo $post_meta['image_2'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_2'][0];?>" width="89" height="89" border="0" /></a>
						
						<?php if(isset($post_meta['image_3'][0]) && ($post_meta['image_3'][0] != '')){?>
                        <a href="<?php echo $post_meta['image_3'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_3'][0];?>" width="89" height="89" border="0" /></a>
                        <?php }?>			
					
            </div>
        <?php }?>
        <?php if(isset($post_meta['image_4'][0]) && ($post_meta['image_4'][0] != '')){?>	
            <div class="showcase">
					
                        <a href="<?php echo $post_meta['image_4'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_4'][0];?>" width="89" height="89" border="0" /></a>
						
						<?php if(isset($post_meta['image_5'][0]) && ($post_meta['image_5'][0] != '')){?>
                        <a href="<?php echo $post_meta['image_5'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_5'][0];?>" width="89" height="89" border="0" /></a>
                        <?php }?>			
					
            </div>
        <?php }?>
		<?php if(isset($post_meta['image_6'][0]) && ($post_meta['image_6'][0] != '')){?>			
            <div class="showcase">
					
			<a href="<?php echo $post_meta['image_6'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_6'][0];?>" width="89" height="89" border="0" /></a>
						
						<?php if(isset($post_meta['image_7'][0]) && ($post_meta['image_7'][0] != '')){?>
                        <a href="<?php echo $post_meta['image_7'][0];?>" target="_blank"><img src="<?php echo $post_meta['image_7'][0];?>" width="89" height="89" border="0" /></a>
                        <?php }?>				
					
            </div>
            <?php  }?>
               -->     
                    
            <div class="txt-product">
					
						<h2>Final Selects</h2>
						
						<?php if(isset($post_meta[link_to_google_drive_folder_lores][0]) && ( $post_meta[link_to_google_drive_folder_lores][0] != '')){?><a href="<?php echo $post_meta[link_to_google_drive_folder_lores][0];?>" target="_blank">Lores Previews</a><?php }?>
						<?php if(isset($post_meta[link_to_google_drive_folder_tiff][0]) && ( $post_meta[link_to_google_drive_folder_tiff][0] != '')){?><a href="<?php echo $post_meta[link_to_google_drive_folder_tiff][0];?>" target="_blank">Hires TIFFs</a><?php }?>
						<?php if(isset($post_meta[link_to_google_drive_folder_jpg][0]) && ( $post_meta[link_to_google_drive_folder_jpg][0] != '')){?><a href="<?php echo $post_meta[link_to_google_drive_folder_jpg][0];?>" target="_blank">Hires JPGs</a><?php }?>				
						<?php if(isset($post_meta[link_to_production_brief][0]) && ( $post_meta[link_to_production_brief][0] != '')){?><h3><a href="<?php echo $post_meta[link_to_production_brief][0];?>" target="_blank">Production Brief</a></h3><?php }?>
				
					</div>
                    
                    <?php endwhile; ?>
			</div>
            <?php endif; wp_reset_query(); ?>  

		</div>
	</div>

		 
					<div class="col-md-4">
					
						<?php get_sidebar(); ?>

					</div>
		</div>
    </div>

<?php get_footer(); ?>	