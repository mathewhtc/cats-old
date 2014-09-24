<?php
/**
 * The template for completed projects
 *
 * @since 1.0.6
 */
?>
            <?php 


// Start Date
if(isset($wp_query->query_vars['start-date']) ) {

$start_date = $wp_query->query_vars['start-date']; 

}

// End Date
if(isset($wp_query->query_vars['end-date']) ) {

$end_date = $wp_query->query_vars['end-date']; 

}



$date_range =  array(
        'after' => $start_date, 'before' => $end_date);
$query = array ('post_type' => 'project', 'meta_key' => 'status', 'meta_value' => 'Active', 'posts_per_page' => 10, 'date_query' => $date_range);

query_posts( $query
      ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li>
                    	<?php 

                            echo '<i class="fa fa-eye" title="active"></i>';
                            
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
                        <h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
                        </li>
                    <?php endwhile; ?>
			</ul>
            <?php endif; wp_reset_query(); ?>  