<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//
$woo_product_attribute_params = array(
	"name" => esc_html__("Product Attribute", 'wpgeneral'),
	"base" => "product_attribute",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> '',
	"params" => array(		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "limit",
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
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Attribute", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "attribute",
			"value" => "",
			"description" => esc_html__("Example [product_attribute attribute='color' filter='black']", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Filter", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "filter",
			"value" => "",
			"description" => esc_html__("Example [product_attribute attribute='color' filter='black']", 'wpgeneral')
		),
	)
);
vc_map( $woo_feature_products_params );
?>