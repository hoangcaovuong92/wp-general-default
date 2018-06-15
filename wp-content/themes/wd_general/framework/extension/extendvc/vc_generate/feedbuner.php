<?php
// **********************************************************************// 
// ! Register New Element: Feedburner Subscription
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Feedburner Subscription", 'wpgeneral'),
		"base" => "wd_feedburner",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wpgeneral'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Feedburner ID", 'wpgeneral'),
				"param_name" => "feedburner",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "intro",
				"value" => "Sign-up for our newsletter. We promise only send good news!",
				"description" => ""
			),			
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Style", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "style",
				"value" => array(
					"Style 1" => "style-1",
					"Style 2" => "style-2"
				),
				"description" => ''
			),	
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Align", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "align",
				"value" => array(
					"Left" 		=> "text-left",
					"Center" 	=> "text-center",
					"Right" 	=> "text-right"
				),
				"description" => ''
			),	
			
			
		)
) );
?>