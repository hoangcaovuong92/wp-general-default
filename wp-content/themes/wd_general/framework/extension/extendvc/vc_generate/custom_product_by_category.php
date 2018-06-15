<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$custom_product_by_category_params = array(
	"name" => esc_html__("WD Custom Products by Category", 'wpgeneral'),
	"base" => "custom_product_by_category",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
	/*	
	// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ''
		),
	*/
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "10",
			"description" => esc_html__("Limit number of products", 'wpgeneral')
		),
		
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
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Category Name", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_cat_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		/*
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		// add add to cart
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show product buttons", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_prod_buttons",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Excerpt word number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_except_limit",
			"value" => "15",
			"description" => esc_html__("Limit number of Excerpt words", 'wpgeneral'),
			"dependency" => Array('element' => "show_type", 'value' => array('list'))
		),
		*/
		
	)
);
vc_map( $custom_product_by_category_params );
?>