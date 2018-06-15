<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//
$woo_best_selling_products_params = array(
	"name" => esc_html__("Best Selling Products", 'wpgeneral'),
	"base" => "best_selling_products",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> '',
	"params" => array(		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ''
		),
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
	)
);
vc_map( $woo_best_selling_products_params );
?>