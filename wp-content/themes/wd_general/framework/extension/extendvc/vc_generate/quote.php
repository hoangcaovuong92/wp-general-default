<?php

// **********************************************************************// 

// ! Register New Element: WD Quote

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Quote
// **********************************************************************//

$quote_params = array(
	"name" => esc_html__("Quote", 'wpgeneral'),
	"base" => "wd_quote",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
	
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Custom class", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "class",
			"value" => '',
			"description" => '',
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => '',
		),
		
	)
);
vc_map( $quote_params );
?>