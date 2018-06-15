<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$woo_product_add_to_cart_params = array(
	"name" => esc_html__("Add To Cart", 'wpgeneral'),
	"base" => "add_to_cart",
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
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Style", 'wpgeneral'),
			"param_name" => "style",
			"value" => "border:4px solid #ccc; padding: 12px;",
			"description" => ""
		),
		// add dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ''
		),
	)
);
vc_map( $woo_product_add_to_cart_params );


$woo_product_add_to_cart_url_params = array(
	"name" => esc_html__("Add To Cart Url", 'wpgeneral'),
	"base" => "add_to_cart_url",
	"icon" => "icon-wpb-woo",
	"category" => esc_html__('Woocommerce', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
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
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "sku",
			"value" => "",
			"description" => ''
		)
	)
);
vc_map( $woo_product_add_to_cart_url_params );
?>