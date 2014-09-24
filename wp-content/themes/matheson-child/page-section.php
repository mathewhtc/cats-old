<?php
/*
Template Name: Section
 */
get_header();
?>
	
<div class="container">
<div class="row">
<div class="col-sm-12">
							<h1 class="page-title">
<?php $section = urldecode($wp_query->query_vars['section']); $term = get_term_by('id', $section, 'section'); //print_r($term); 
echo "Section: " . $term->name ;?>
</h1>
</div>
</div>
</div>
	<div class="container">
    	<div class="row">

            <div class="col-md-4">
            	<div class="widget widget-menu">
	            	<h3 class="widget-title">Active Projects</h3>
                    <?php query_posts(array ( 'post_type' => 'project', 'posts_per_page' => 10, 'section' => $term->slug ) ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                    	<?php 
                            $status = get_post_meta(get_the_ID(), 'status');
                                
                             
                                    if($status == "active") {
                                        echo '<i class="fa fa-pencil" title="active"></i>';
                                    } else {
                                        echo '<i class="fa fa-archive" title="final"></i>';
                                    
                                }
                            
                           
							//$project = get_the_term_list($post->ID, 'project');
                        ?>
                        <p><span class="cat"><?php $posttags = get_the_terms($post_ID, 'section');
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							?><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a><?php
    							}
  						}
			} ?></span></p>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="widget widget-menu">
	            	<h3 class="widget-title">User Research Reports</h3>
                    <?php query_posts(array ( 'post_type' => 'test', 'posts_per_page' => 10, 'section' => $term->slug ) ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                    	<?php 
                            $status = get_post_meta(get_the_ID(), 'status');
                                
                             
                                    if($status == "active") {
                                        echo '<i class="fa fa-eye" title="active"></i>';
                                    } else {
                                        echo '<i class="fa fa-check-square" title="final"></i>';
                                    
                                }
                            
                           
							//$project = get_the_term_list($post->ID, 'project');
                        ?>
                        <p><span class="cat"><?php $posttags = get_the_terms($post->ID, 'section');
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							?><a href="/section/?section=<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a><?php
    							}
  						}
			} ?></span></p>
                        <h5><a href="/detail/?post-id=<?php echo $post->ID;?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
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