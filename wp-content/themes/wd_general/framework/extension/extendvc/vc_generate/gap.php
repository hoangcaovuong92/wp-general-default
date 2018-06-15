<?php
// **********************************************************************// 
// ! Register New Element: Gap
// **********************************************************************//
vc_map( array(
	"name" => esc_html__("WD Gap", 'wpgeneral'),
	"base" => "wd_gap",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Gap height", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "height",
			"value" => "10",
			"description" => esc_html__("In pixels.", 'wpgeneral')
		)
	)
) );
?>