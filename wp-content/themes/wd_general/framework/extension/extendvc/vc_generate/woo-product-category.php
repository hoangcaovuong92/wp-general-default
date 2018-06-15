<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$woo_product_category_params = array(
	"name" => esc_html__("Product Category", 'wpgeneral'),
	"base" => "product_category",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> esc_html__('List products in a category shortcode', 'wpgeneral'),
	"params" => array(		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ''
		),
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "4",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "category",
			"value" => "",
			"description" => ''
		),
		
	)
);
vc_map( $woo_product_category_params );


$wd_product_categories_params = array(
	"name" => esc_html__("WD Product Categories", 'wpgeneral'),
	"base" => "wd_product_cat_slider",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> esc_html__('List categories in store shortcode', 'wpgeneral'),
	"params" => array(		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "limit",
			"value" => "6",
			"description" => ''
		),
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "3",
			"description" => ''
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Rows", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "rows",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "style",
			"value" => array(
				"Style 1"	=> 'style-1',
				"Style 2"	=> 'style-2',
			),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes"	=> '1',
				"No"	=> '0',
			),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Hide empty", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "hide_empty",
			"value" => array(
				"Yes"	=> '1',
				"No"	=> '0',
			),
		),
		
	)
);
vc_map( $wd_product_categories_params );


?>