<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$wd_best_selling_products = array(
	"name" => esc_html__("WD Top Rated Products", 'wpgeneral'),
	"base" => "wd_top_rated_products",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('Woocommerce', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
		// Title
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
				"list" => "list"
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
			"heading" => esc_html__("Order By", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Rand" => "rand"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order way", "wpgeneral"),
			"param_name" => "order",
			"value" => array(
				"Descending" => "desc",
				"Ascending" => "asc"
			),
			"description" => esc_html__("Designates the ascending or descending order.", "wpgeneral")
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
		
	)
);
vc_map( $wd_best_selling_products );
?>