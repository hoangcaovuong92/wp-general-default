<?php

// **********************************************************************// 

// ! Register New Element: WD Portfolio

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Portfolio
// **********************************************************************//
if( class_exists('WD_Portfolio') ){
	
	$portfolio_params = array(
		"name" => esc_html__("Portfolio", 'wpgeneral'),
		"base" => "wd-portfolio",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wpgeneral'),
		"params" => array(
		
			// Heading
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Columns", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "columns",
				"value" => '4',
				"description" => '',
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "portf_style",
				"value" => array(
						'Full Style' => 'full',
						'Wide style' => 'wide'
					),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Filter", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_filter",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Title", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_title",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Description", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_desc",
				"value" => array(
						'Yes' => 'yes',
						'No' => 'no'
					),
				"dependency" => Array('element' => "portf_style", 'value' => array('full'))
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "count",
				"value" => '-1',
				"description" => ''
			),
		)
	);
	vc_map( $portfolio_params );
}
?>