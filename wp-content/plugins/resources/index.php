<?php
/*
Plugin Name: Resources Widget
Description: List entered resources in list format.
Author: HTC
Version: 1
*/
 
class htc_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'htc_widget', 

// Widget name will appear in UI
__('Resources Widget', 'htc_widget_resources'), 

// Widget description
array( 'description' => __( 'This widget will add a list of the latest 10 resources.', 'htc_widget_resources' ), ),

array( 'class' => 'widget-resources') 
);
}



// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

query_posts(array ( 'post_type' => 'resource', 'posts_per_page' => 10 ) ); ?>
                    <ul>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		    //Grab postmeta
		    $post_meta = get_post_meta(get_the_ID());

//print_r($post_meta); die();
			
		    if($post_meta[type][0] == 'External link'){?>
                    <li>
                    	<i class="fa fa-external-link" title="active"></i>
                        <h5><a href="<?php echo $post_meta[link_to_resource][0]; ?>" target="_blank"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
                    </li>
		    <?php } else{ ?>
		    <li>
                    	<i class="fa fa-file" title="active"></i>
                        <h5><a href="<?php echo $post_meta[link_to_production_brief][0]; ?>" target="_blank"><?php the_title(); ?></a></h5>
                        <p><span class="updated">Last updated <?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago</span></p>
                    </li>
                    <?php } endwhile; ?>
			</ul>

<?php endif; wp_reset_query();

}
		

} // Class htc_widget ends here

// Register and load the widget
function htc_load_widget() {
	register_widget( 'htc_widget' );
}
add_action( 'widgets_init', 'htc_load_widget' );

?>