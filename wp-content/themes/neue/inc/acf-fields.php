<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_category-options',
		'title' => 'Category Options',
		'fields' => array (
			array (
				'key' => 'field_5306c8646f240',
				'label' => 'Category Thumbnail',
				'name' => 'category_thumbnail',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5386a318f4273',
				'label' => 'Category Color',
				'name' => 'category_color',
				'type' => 'color_picker',
				'instructions' => 'An accent color for a category label.',
				'default_value' => '',
			),
			array (
				'key' => 'field_534612bd4d301',
				'label' => 'Background Image',
				'name' => 'category_background_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5315595ae5222',
				'label' => 'Category Blog Layout',
				'name' => 'category_blog_layout',
				'type' => 'select',
				'choices' => array (
					'site_default' => 'Site Default',
					'classic-1-col' => 'Classic',
					'article-1-col' => 'Large Article',
					'large-grid' => '2-Columns Grid',
					'custom-1' => 'Custom 1',
					'custom-2' => 'Custom 2',
					'custom-3' => 'Custom 3',
					'custom-4' => 'Custom 4',
				),
				'default_value' => 'site_default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_531595fed6949',
				'label' => 'Category Post Slider',
				'name' => 'category_post_slider',
				'type' => 'select',
				'choices' => array (
					'none' => 'Not Shown',
					'featured_post_slider' => 'Featured Post Slider',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5385a2e74df6a',
				'label' => 'Category Top Content',
				'name' => 'category_top_content',
				'type' => 'textarea',
				'instructions' => 'Enter the content or Ads code to display on the top of category page. Shortcode and HTML can be input.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_53589f5471f4d',
				'label' => 'Page Sidebar',
				'name' => 'page_sidebar',
				'type' => 'sidebar_selector',
				'allow_null' => 1,
				'default_value' => '',
			),
			array (
				'key' => 'field_537c6c4cfe712',
				'label' => 'Show Page Title',
				'name' => 'show_page_title',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-options',
		'title' => 'Post Options',
		'fields' => array (
			array (
				'key' => 'field_5316adef21ca1',
				'label' => 'Post Layout',
				'name' => 'vw_post_layout',
				'type' => 'select',
				'choices' => array (
					'site-default' => 'Site Default',
					'classic' => 'Classic',
					'classic-no-featured-image' => 'Classic - No Featured Image',
					'full-width-featured-image' => 'Full-Width Featured Image',
					'custom-1' => 'Custom 1',
					'custom-2' => 'Custom 2',
				),
				'default_value' => 'site_default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5350e9ea43cf7',
				'label' => 'Featured Post',
				'name' => 'vw_post_featured',
				'type' => 'true_false',
				'message' => 'Mark this post as featured',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_featured-image-2',
		'title' => 'Featured Image 2',
		'fields' => array (
			array (
				'key' => 'field_530849e0ce505',
				'label' => 'Featured Image for a single post page',
				'name' => 'vw_featured_image_2',
				'type' => 'image',
				'instructions' => 'This is an optional. If you don\'t have a featured image 2, The default featured image will be shown.',
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 300,
	));
}
