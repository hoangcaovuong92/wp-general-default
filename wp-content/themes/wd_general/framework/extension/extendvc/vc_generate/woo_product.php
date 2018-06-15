<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$custom_product_by_category_params = array(
	"name" => esc_html__("WD Products Category Thumbnail", 'wpgeneral'),
	"base" => "woo_product",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"description"	=> '',
	"params" => array(			
		
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "product_cat",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "cat_slug",
			"value" => "",
			"description" => ''
		),		
		
		
	)
);
vc_map( $custom_product_by_category_params );
?>