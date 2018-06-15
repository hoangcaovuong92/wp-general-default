<?php

// **********************************************************************// 
// ! Register New Element: Our Project
// **********************************************************************//
$our_project_params = array(
	'name' => 'Our Projects',
	'base' => 'wd_projects',
	'icon' => 'icon-wpb-wpdance',
	'category' => 'WPDance Elements',
	'params' => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "slider",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ''
		),
		
		array(
		  'type' => 'textfield',
		  "heading" => esc_html__("Columns", 'wpgeneral'),
		  "param_name" => "columns",
		  "value" => "4"
		),
		// add orderby dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Rand" => "rand"
			),
			"description" => ''
		),
		// Order
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order way", 'wpgeneral'),
			"param_name" => "order",
			"value" => array(
				"Descending" => "desc",
				"Ascending" => "asc"
			),
			"description" => esc_html__("Designates the ascending or descending order.", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"param_name" => "limit",
			"value" => "12",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Categories", 'wpgeneral'),
			"param_name" => "exclude_categories",
			"description" => esc_html__('Separated by ","', 'wpgeneral')
		)
	)
);  
vc_map($our_project_params);

?>