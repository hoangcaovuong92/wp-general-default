<?php

// **********************************************************************// 

// ! Register New Element: WD Recent Blogs

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Recent Blogs
// **********************************************************************//
$categories = get_categories();
$list_categories = array(''=>'');
foreach($categories as $category ){
	$list_categories[$category->name] = $category->slug;
}
$recent_blogs_params = array(
	"name" => esc_html__("Recent Blogs", 'wpgeneral'),
	"base" => "wd_recent_blogs",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
	
		// Heading
		/*array(
			"type" => "wd_taxonomy",
			"class" => "",
			"heading" => esc_html__("Category", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "category",
			"value" => $list_categories,
			"description" => ''
		),*/
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "category",
			"class" => "",
			"heading" => esc_html__("Category", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "category",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Type", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_type",
			"value" => array(
					'Grid' 		=> 'grid-posts',
					'List' 		=> 'list-posts',
					'Widget' 	=> 'widget'
				),
			"description" => ''
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Use isotope", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_type_isotope",
			"value" => array(
					'Yes' 		=> 'yes',
					'No' 		=> 'no',
			),
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'grid-posts'))
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => '1',
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'list-posts'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "number_posts",
			"value" => '4',
			"description" => ''
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Thumbnail", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "thumbnail",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Post Meta", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "meta",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Excerpt", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "excerpt",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'list-posts'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Read More", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "read_more",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'list-posts'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show View More Post", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "view_more",
			"value" => array(
					'Yes' => 'yes',
					'No' => 'no'
				),
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'list-posts'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Blog link", 'wpgeneral'),
			"param_name" => "view_more_link",
			"value" => '',
			"dependency" => Array('element' => "view_more", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit Excerpt Words", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "excerpt_words",
			"value" => '30',
			"dependency" => Array('element' => "show_type", 'value' => array('grid-posts', 'list-posts'))
		),
		
	)
);
vc_map( $recent_blogs_params );
?>