<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 

// ! Register New Element: WD Specific Product

// **********************************************************************//

$specipic_product_params = array(
	"name" => esc_html__("WD Banner", 'wpgeneral'),
	"base" => "banner",
	"icon" => "icon-wpb-wpdance-banner",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
	
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'wpgeneral'),
			"param_name" => "link_url",
			"value" => "#",
			"description" => '',
		),
		
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Background color", 'wpgeneral'),
			"param_name" => "bg_color",
			"value" => "#cccccc",
			"description" => '',
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Background Image", 'wpgeneral'),
			"param_name" => "bg_image",
			"value" => "",
			"description" => '',
		),
		
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "content",
			"value" => "",
			"description" => '',
		),				
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Radius Style", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "radius_style",
				"value" => array(
					"Yes"	=> '1',
					"No"	=> '0',
				),
				"description" => ''
			),
		
		
		
	)
);
vc_map( $specipic_product_params );
?>