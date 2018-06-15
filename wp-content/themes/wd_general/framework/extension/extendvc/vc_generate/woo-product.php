<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//
$woo_product_params = array(
	"name" => esc_html__("Product", 'wpgeneral'),
	"base" => "product",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> '',
	"params" => array(		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "sku",
			"value" => "",
			"description" => ''
		),
		
		
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("ID", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "id",
			"value" => "",
			"description" => ''
		),
	
		
	)
);
vc_map( $woo_product_params );
?>