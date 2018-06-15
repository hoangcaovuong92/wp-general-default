<?php

// **********************************************************************// 

// ! Register New Element: WD Icon

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Icon
// **********************************************************************//
$icon_params = array(
	"name" => esc_html__("Awesome Icon", 'wpgeneral'),
	"base" => "wd_icon",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	'params' => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Title", 'wpgeneral'),
			"param_name" => "title",
			"value" => "",
			"description" => "blank if you don't want to display"
		),
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"class" => "wd_awesome",
			"heading" => esc_html__("Size", 'wpgeneral'),
			"param_name" => "size",
			"value" => array(
				"Tiny" => "fa-lg",
				"Small" => "fa-2x",
				"Medium" => "fa-3x",	
				"Large" => "fa-4x",
				"Very Large" => "fa-5x"	
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"admin_label" => true,
			"class" => "",
			"heading" => esc_html__("Custom Size (px)", 'wpgeneral'),
			"param_name" => "custom_size",
			"value" => ""
		),
		array(
			"type" => "wd_icon",
			"class" => "",
			"heading" => esc_html__("Icon", 'wpgeneral'),
			"param_name" => "icon",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Type", 'wpgeneral'),
			"param_name" => "type",
			"value" => array(
				"Normal" => "normal",
				"Circle" => "circle",
				"Square" => "square"	
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Border Width", 'wpgeneral'),
			"param_name" => "border_width",
			"value" => '0',
			"description" => esc_html__("Blank or 0 if you don't want to show border", 'wpgeneral'),
			"dependency" => Array('element' => "type", 'value' => array('square'))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Border Color", 'wpgeneral'),
			"param_name" => "border_color",
			"description" => esc_html__("Only for Square type", 'wpgeneral'),
			"dependency" => Array('element' => "type", 'value' => array('square'))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Icon Color", 'wpgeneral'),
			"param_name" => "icon_color",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Background Color", 'wpgeneral'),
			"param_name" => "background_color",
			"description" => "",
			"dependency" => Array('element' => "type", 'value' => array('square','circle'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Margin (px)", 'wpgeneral'),
			"param_name" => "margin",
			"description" => esc_html__("Margin (top right bottom left - 5px 5px 5px 5px)", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Distance (px)", 'wpgeneral'),
			"param_name" => "distance",
			"description" => esc_html__("For example: 10", 'wpgeneral')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("CSS Animation", 'wpgeneral'),
			"param_name" => "css_animation",
			"value" => array(
				"No" => "",
				"Top to bottom" => "top-to-bottom",
				"Bottom to top" => "bottom-to-top",
				"Left to right" => "left-to-right",
				"Right to left" => "right-to-left",
				"Appear from center" => "appear"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link", 'wpgeneral'),
			"param_name" => "link",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Target", 'wpgeneral'),
			"param_name" => "target",
			"value" => array(
				"Self" => "_self",
				"Blank" => "_blank",
				"Parent" => "_parent"	
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)
);
vc_map( $icon_params );
?>