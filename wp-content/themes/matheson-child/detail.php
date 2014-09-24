<?php
/*
Template Name: Detail
 */
get_header();


// Process query strings we feed in
if(isset($wp_query->query_vars['post-id'])) {
$post_id = urldecode($wp_query->query_vars['post-id']); 
if(!is_numeric($post_id)){
	$post_id = "";
}
}

if(isset($wp_query->query_vars['sprint'])) {
$sprint_id = urldecode($wp_query->query_vars['sprint']); 
if(!is_numeric($sprint_id)){
	$sprint_id = "";
}
}

//echo "sprint " . $sprint_id; exit();

$sprint_post = get_posts(array(
    'post_type' => 'test',
    'orderby'=> 'date', 
    'order'=> 'ASC',
    'posts_per_page' => 10, 
    'tax_query' => array(
        array(
        'taxonomy' => 'sprint',
        'field' => 'term_id',
        'terms' => $sprint_id)
    ))
);
 
//print_r($sprint_post); exit();

if($sprint_id){
	$post = $sprint_post;
	//print_r($post);
	$post_id = $post[0]->ID;
}
else{
	$post = get_post($post_id);
}

$s_id = $post_id;

//echo "sid " . $s_id; 

$meta_values = get_post_meta($post_id);

$term = wp_get_post_terms( $post_id, 'sprint', $args );


?>
	<header class="header-pos" id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
		
			<div class="container">

					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title"><?php echo $term[0]->name;?></h1><!-- .page-title -->
						</div>
					</div>

			</div>
	
	</header>		
			

	<div class="container" id="ajax-container">
		
		<div class="row">
				

				<div class="col-md-12">
					
					<div class="user-container clearfix">	
						<div class="top-heading clearfix">
				
							<h4><a href="/user-research/">< Back to User Research</a></h4>
							<h2><?php


$test_query = array ( 'post_type' => 'test', 'orderby'=> 'date', 'order'=> 'ASC', 'posts_per_page' => 10,  'sprint' => $term[0]->name);

?></b></h2>

							<select class="fltr" name="menu" onChange="loadContent(this.options[this.selectedIndex].value);">	


							<?php 



query_posts($test_query ); 
                    
  if( have_posts() ) { while ( have_posts() ) { the_post();?>


							
				
								<option value="index.php?post-id=<?php echo get_the_id(); ?>" <?php if($s_id == get_the_id()){?>selected="selected"<?php }?>><?php echo get_the_title();?></option>

							<?php  }} ?>
							</select> 

							
						</div>
					
					
						
						<div class="content" id="single-post-container">						<div id="inner_post_content">

						<br /><br />

						Name: &nbsp;<?php echo get_the_title();?>
						<br /><br />

						Status: &nbsp;<?php echo get_field("upcoming/tested", $post_id);?>
						<br /><br />

						Modified: &nbsp;<?php echo human_time_diff(get_post_modified_time('U', $post->ID), current_time('timestamp'));  ?> ago

						<br /><br />
					
						<?php if(get_field("date_testing_was_performed", $post_id) != ""){?>Date Testing Was Performed: &nbsp;<?php 
$date = new DateTime(get_field("date_testing_was_performed", $post_id));
echo $date->format('F j, Y');

}
?>
<?php if(get_field("upload_file_1", $post_id) != ""){?><br /><br />
File: &nbsp;<a href="<?php echo get_field("upload_file_1", $post_id); ?>" target="_blank"><?php echo get_field("name_1", $post_id); ?></a>
<?php } ?>

<?php if(get_field("upload_file_2", $post_id) != ""){?><br /><br />
File: &nbsp;<a href="<?php echo get_field("upload_file_2", $post_id); ?>" target="_blank"><?php echo get_field("name_2", $post_id); ?></a>
<?php } ?>

<?php if(get_field("upload_file_3", $post_id) != ""){?><br /><br />
File: &nbsp;<a href="<?php echo get_field("upload_file_3", $post_id); ?>" target="_blank"><?php echo get_field("name_3", $post_id); ?></a>
<?php } ?>
						<br /><br />

						

						<?php if(strpos(get_field("link_to_final_pdf_report", $post_id),'pdf') !== false) {
    ?>Final Report: <a href="<?php echo get_field("link_to_final_pdf_report", $post_id); ?>" target="_blank">View PDF</a><?php
}?>
						
						<br /><br />

<?php echo get_field("summary", $post_id);?>
						</div>
						</div>
						

				
					</div>
				</div>


		</div>
    </div>

<?php get_footer(); ?>	