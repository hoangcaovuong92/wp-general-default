<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$wd_recent_products = array(
	"name" => esc_html__("WD Sale Products Countdown", 'wpgeneral'),
	"base" => "wd_sale_products_countdown",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Products', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
		// Heading
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("ID Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "id_sale_product",
			"value" => "",
			"description" => '',
		),						
	)
);
vc_map( $wd_recent_products );
?>