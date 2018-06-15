<?php

// **********************************************************************// 

// ! Register New Element: WD Button

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Button
// **********************************************************************//

$button_params = array(
	"name" => esc_html__("Button", 'wpgeneral'),
	"base" => "wd_button",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
	
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Font size", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "font_size",
			"value" => '14',
			"description" => esc_html__("In Pixels. Text font size", 'wpgeneral'),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Text Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "color",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Text Color On Hover", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "color_hover",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Background Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "bg_color",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Background Color On Hover", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "bg_color_hover",
			"value" => '',
			"description" => ''
		),
		
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Border Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "border_color",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Border Color On Hover", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "border_color_hover",
			"value" => '',
			"description" => ''
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Border Width", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "border_width",
			"value" => '0',
			"description" => ''
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Margin", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "margin",
			"value" => '',
			"description" => '',
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Padding", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "padding",
			"value" => '',
			"description" => '',
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "link",
			"value" => '',
			"description" => esc_html__("Input URL you want it to link to", 'wpgeneral'),
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Opacity", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "opacity",
			"value" => '100',
			"description" => esc_html__("Input Opacity Number. Min: 0, Max: 100", 'wpgeneral')
		),
		
		array(
			"type" => "textarea",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Button Text", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => '',
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Custom Class", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "custom_class",
			"value" => '',
			"description" => '',
		),
		
	)
);
vc_map( $button_params );
?>