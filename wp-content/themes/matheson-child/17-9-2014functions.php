<?php 

function projecttax_init() {
	// create a new taxonomy
	register_taxonomy(
		'project',
		'post',
		array(
			'hierarchal' => true,
			'label' => __( 'Project' ),
			'rewrite' => array( 'slug' => 'project' ),
			'query_var' => true,
			'capabilities' => array(
				'manage__terms' => 'edit_posts',
				'edit_terms' => 'manage_categories',
				'delete_terms' => 'manage_categories',
				'assign_terms' => 'edit_posts'
			)
		)
	);
}
add_action( 'init', 'projecttax_init' );




add_action( 'init', 'project_cpt' );

function project_cpt() {

register_post_type( 'project', array(
  'labels' => array(
    'name' => 'Projects',
    'singular_name' => 'Project',
   ),
  'description' => 'Projects',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
  'taxonomies' => array('post_tag')
));
}

add_action( 'init', 'photoshoot_cpt' );

function photoshoot_cpt() {

register_post_type( 'photoshoot', array(
  'labels' => array(
    'name' => 'Photoshoots',
    'singular_name' => 'Photoshoot',
   ),
  'description' => 'Photoshoots',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' )
));
}

add_action( 'init', 'test_cpt' );

function test_cpt() {

register_post_type( 'test', array(
  'labels' => array(
    'name' => 'Tests',
    'singular_name' => 'Tests',
   ),
  'description' => 'Tests',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
  'taxonomies' => array('post_tag')
));
}

add_action( 'init', 'resource_cpt' );

function resource_cpt() {

register_post_type( 'resource', array(
  'labels' => array(
    'name' => 'Resources',
    'singular_name' => 'Resources',
   ),
  'description' => 'Resources',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'editor', 'custom-fields' ),
));
}



function add_query_vars($aVars) {
	$aVars[] = "test-sort"; 
	$aVars[] = "post-id";
	$aVars[] = "post-meta-id";
	return $aVars;
}
 
// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');



?>