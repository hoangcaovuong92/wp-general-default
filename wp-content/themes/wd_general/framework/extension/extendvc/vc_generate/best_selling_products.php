<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$wd_best_selling_products = array(
	"name" => esc_html__("WD Best Selling Products", 'wpgeneral'),
	"base" => "wd_best_selling_products",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Products', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
		// Title
		// Heading
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
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Box style", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "box_style",
			"value" => array(
				"No box" => "",
				"Boxed" => "style-boxed"
			),
			"description" => ""
		),
		
		// Heading
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Description", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => "",
		),
		
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "4",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "4",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "style",
			"value" => array(
				"Grid" => "grid",
				"List" => "list",
				"Widget" => 'widget'
			)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Shortcontent limit", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "shortc_limit",
			"value" => "15",
			"dependency" => Array('element' => "style", 'value' => array('list'))
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Number", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_number",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"dependency" => Array('element' => "style", 'value' => array('widget')),
		),
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
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"description" => esc_html__("Show short content of each product", "wpgeneral")
		),
		
	)
);
vc_map( $wd_best_selling_products );
?>