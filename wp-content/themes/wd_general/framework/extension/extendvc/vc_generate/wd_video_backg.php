<?php

// **********************************************************************// 

// ! Register New Element: WD Recent Blogs

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Recent Blogs
// **********************************************************************//

$wd_video_params = array(
	"name" => esc_html__("WD Video Background", 'wpgeneral'),
	"base" => "wd_video",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Elements', 'wpgeneral'),
	"params" => array(
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("use cover", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "use_cover",
			"value" => array(
					'yes' 		=> '1',
					'no' 		=> '0'
			)
		),
		
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => esc_html__("Cover url", 'wpgeneral'),
			"param_name" => "cover_url",
			"value" => "",
			"dependency" => Array('element' => "use_cover", 'value' => array('1'))
		),
		
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Background color", 'wpgeneral'),
			"param_name" => "bg_color",
			"value" => "",
			"dependency" => Array('element' => "use_cover", 'value' => array('1'))
		),
		
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__("MP4 url", 'wpgeneral'),
			"param_name" => "mp4",
			"value" => "",
		),
		
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__("Webm url", 'wpgeneral'),
			"param_name" => "webm",
			"value" => "",
		),
		
		array(
			"type" => "vc_link",
			"class" => "",
			"heading" => esc_html__("Ogv url", 'wpgeneral'),
			"param_name" => "ogv",
			"value" => "",
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Height", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "height",
			"value" => "480px",
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Video color", 'wpgeneral'),
			"param_name" => "v_bg_color",
			"value" => array(
				'None' 			=> 'none',
				'Dark' 		=> 'black',
				'Light' 		=> 'White'
			)
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Opacity", 'wpgeneral'),
			"param_name" => "bg_opacity",
			"value" => "0.15",
			"dependency" => Array('element' => "v_bg_color", 'value' => array('black','White'))
		),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Play Button Margin top", 'wpgeneral'),
			"param_name" => "v_margin_top",
			"value" => "",
		),
		
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Auto play", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "auto_play",
			"value" => array(
					'No' 		=> '0',
					'Yes' 		=> '1'
			)
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Loop", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "loop",
			"value" => array(
				'Yes' 		=> '1',
				'No' 		=> '0'	
			)
		),
		
	)
);
vc_map( $wd_video_params );
?>