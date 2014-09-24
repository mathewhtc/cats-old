<?php
/*
Template Name: Home
 */
get_header();
?>

		<?php
		// Header image section
		header_images();
		?>

	<div class="container">
    	<div class="row">
            <div class="col-md-4">
            	<div class="widget widget-menu">
	            	<h3 class="widget-title">Active Projects</h3>
                    <?php query_posts('category_name=projects&showposts=10'); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                    	<?php 
                            $all_the_tags = get_the_tags();
                            if($all_the_tags):
                                
                                foreach($all_the_tags as $tag) {
                                    if($tag->name == "active") {
                                        echo '<i class="fa fa-pencil" title="active"></i>';
                                    } else if($tag->name == "final") {
                                        echo '<i class="fa fa-archive" title="final"></i>';
                                    }
                                }
                            
                            endif;
							$project = get_the_term_list($post->ID, 'project');
                        ?>
                        <p><span class="cat"><?php echo $project; ?></span></p>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php the_modified_date() ?></span></p>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="widget widget-menu">
	            	<h3 class="widget-title">User Research Reports</h3>
                    <?php query_posts('category_name=user-research&showposts=10'); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                    	<?php 
                            $all_the_tags = get_the_tags();
                            if($all_the_tags):
                                
                                foreach($all_the_tags as $tag) {
                                    if($tag->name == "active") {
                                        echo '<i class="fa fa-eye" title="active"></i>';
                                    } else if($tag->name == "final") {
                                        echo '<i class="fa fa-check-square" title="final"></i>';
                                    }
                                }
                            
                            endif;
                        ?>
			<h4>test</h4>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php the_modified_date() ?></span></p>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-4">
            	<?php get_sidebar(); ?>
            </div>
        </div>
    
<?php /*
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="entry-title"><?php the_title(); ?></h1>

						    <div class="entry-content">
							    <?php the_content( __( 'Read more', 'matheson') ); ?>
						    </div><!-- .entry-content -->

						    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
*/ ?>

<?php get_footer(); ?>