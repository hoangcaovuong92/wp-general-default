<?php
// **********************************************************************// 
// ! Register New Element:Pricing Table
// **********************************************************************//
$ptable_params = array(
	"name" => esc_html__("Pricing Table", 'wpgeneral'),
	"base" => "wd_ptable",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'wpgeneral'),
			"param_name" => "title",
			"value" => esc_html__("Basic Plan", 'wpgeneral'),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Price", 'wpgeneral'),
			"param_name" => "price",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Currency", 'wpgeneral'),
			"param_name" => "currency",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Price Period", 'wpgeneral'),
			"param_name" => "price_period",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Link", 'wpgeneral'),
			"param_name" => "link",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Target", 'wpgeneral'),
			"param_name" => "target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank",	
				"Parent" => "_parent"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Button Text", 'wpgeneral'),
			"param_name" => "button_text",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Active", 'wpgeneral'),
			"param_name" => "active",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"	
			),
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "content",
			"value" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
			"description" => ""
		)
	)
);
vc_map($ptable_params);
?>