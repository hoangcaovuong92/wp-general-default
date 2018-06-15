<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$woo_product_page_params = array(
	"name" => esc_html__("Product Page", 'wpgeneral'),
	"base" => "product_page",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> esc_html__('Show a single product page', 'wpgeneral'),
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
vc_map( $woo_product_page_params );
?>