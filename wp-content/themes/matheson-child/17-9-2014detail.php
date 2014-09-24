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


if(isset($wp_query->query_vars['post-meta-id'])) {
$post_meta_key = urldecode($wp_query->query_vars['post-meta-id']); 
if(!is_numeric($post_meta_key)){
	$post_meta_key = "";
}
}

$post = get_post($post_id);

$meta_values = get_post_meta($post_id);

//define meta ids


/*switch ($post_meta_key) {
  case "1":
    $meta = 1;
    break;
  case "2":
    $meta = 2;
    break;
  case "3":
    $meta = 3;
    break;
  default:
    $meta = 1;
}*/


?>
	<header class="header-pos" id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
		
			<div class="container">

					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title"><?php echo get_the_title();?></h1><!-- .page-title -->
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
$posttags = get_the_tags();
$count=0;
if ($posttags) {
  foreach($posttags as $tag) {
    $count++;
    if (1 == $count) {
      echo $tag->name . ' ';
    }
  }
}
?></b></h2>

							<select class="fltr" name="menu" onChange="loadContent(this.options[this.selectedIndex].value);">	


							<?php query_posts(array ( 'post_type' => 'test', 'posts_per_page' => 20, 'meta_key' => 'type', 'meta_value' => $test_sort, 'tag' => $tag->slug ) ); 
                    
  if( have_posts() ) { while ( have_posts() ) { the_post();?>


							
				
								<option value="index.php?post-id=<?php echo get_the_id(); ?>&post-meta-id=<?php echo $x;?>" <?php if($post_meta_key == $x){?>selected="selected"<?php }?>><?php echo get_the_title();?></option>

							<?php $x++; }} ?>
							</select> 

							
						</div>
					
					
						
						<div class="content" id="single-post-container">						<div id="inner_post_content">

						<br /><br />

						Type: &nbsp;<?php echo get_field("type", $post_id);?>
						<br /><br />

						Status: &nbsp;<?php echo get_field("upcoming/tested", $post_id);?>
						<br /><br />

						Modified: &nbsp;<?php echo get_the_modified_date( $d ); ?>

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

						<br /><br />

						<?php if(strpos(get_field("link_to_final_pdf_report", $post_id),'pdf') !== false) {
    ?><center><?php echo do_shortcode('[pdf]' . get_field("link_to_final_pdf_report", $post_id) . '[/pdf]' ); ?></center><?php
}?>
						
						

						
						<br /><br />


						</div>
						</div>
						

				
					</div>
				</div>


		</div>
    </div>

<?php get_footer(); ?>	