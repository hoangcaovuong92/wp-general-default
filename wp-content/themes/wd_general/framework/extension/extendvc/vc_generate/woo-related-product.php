<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
$woo_related_products_params = array(
	"name" => esc_html__("Related Product", 'wpgeneral'),
	"base" => "related_products",
	"icon" => "icon-wpb-woo",
	"category" => 'Woocommerce',
	"description"	=> '',
	"params" => array(		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "posts_per_page",
			"value" => "2",
			"description" => ''
		),
	)
);
vc_map( $woo_related_products_params );
?>