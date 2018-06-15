<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$custom_product_by_category_params = array(
	"name" => esc_html__("WD Products Brand Thumbnail", 'wpgeneral'),
	"base" => "wd_product_brand",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"description"	=> '',
	"params" 	=> array(
			array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => "",
			),
			array(
				"type" => "product_brands",
				"holder" => "div",
				"class" 		=> "hide_in_vc_editor",
				"admin_label" 	=> true,
				"heading" => esc_html__("Brand", "wpgeneral"),
				"param_name" => "brand"
			),
	)
);
vc_map( $custom_product_by_category_params );
?>