<?php
/*
Template Name: Research
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
						<div class="top-heading clearfix">
				

							<h2>Testing Reports <b>By <?php if(isset($wp_query->query_vars['test-sort'])) {
$test_sort = urldecode($wp_query->query_vars['test-sort']); echo ucfirst($test_sort);
} else{$test_sort = "sprint"; echo ucfirst($test_sort); }?></b></h2>							


							<select class="fltr" name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;">	
				
								<option value="index.php?test-sort=content" <?php if($test_sort == 'content'){?>selected="selected"<?php }?>>SORT BY CONTENT</option>
								<option value="index.php?test-sort=sprint" <?php if($test_sort == 'sprint'){?>selected="selected"<?php }?>>SORT BY SPRINT</option>
				
							</select> 

							
						</div>
<div class="widget research-page">
					<?php 


if($test_sort == 'sprint'){
	$tax = 'sprint';
	$link = '/detail/?sprint=';
}

if($test_sort == 'content'){
	$tax = 'section';
	$link = '/section/?section=';
}



$tags = get_terms($tax);

$i=1; foreach ( $tags as $tag ) {


query_posts(array ( 'post_type' => 'test', 'posts_per_page' => 20, $tax => $tag->slug ) ); 

                    
  if( have_posts() ) {?>

<div class="wdt-percent<?php if(is_float($i/2)){?> mgn2<?php } ?>">
<br />
<ul>
<li>		
<h5><a href="<?php echo $link; echo $tag->term_id; ?>"><?php echo $tag->name;?></a></h5>

<ul>
<?php while ( have_posts() ) { the_post(); ?>
<li><a href="/detail/?post-id=<?php echo get_the_ID();?>"><?php echo get_the_title(); ?></a></li><?php
$post_meta = get_post_meta(get_the_ID());

} 
?>
</ul>
</li>
</ul>
</div>

<?php
} wp_reset_query();  



 $i++;}


?>
				

				 
                 </div>
					</div>
				</div>

				<div class="col-md-4">
				
					<?php get_sidebar(); ?>

				</div>

		</div>
    </div>

<?php get_footer(); ?>	