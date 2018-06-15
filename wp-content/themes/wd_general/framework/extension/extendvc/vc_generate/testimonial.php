<?php

// **********************************************************************// 

// ! Register New Element: WD Testimonial

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Testimonial
// **********************************************************************//
$is_woo_testimonial = true;
$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
if ( !in_array( "testimonials-by-woothemes/woothemes-testimonials.php", $_actived ) ) {
	$is_woo_testimonial = false;
}
if( $is_woo_testimonial ){
	$testimonials = woothemes_get_testimonials(array('limit'=>-1, 'size' => 100));
	$list_testimonials = array();
	if(!empty($testimonials)) {
		foreach( $testimonials as $testimonial ){
			$list_testimonials[$testimonial->post_title] = $testimonial->ID;
		}
	}
	
	$testimonial_params = array(
		"name" => esc_html__("Testimonial", 'wpgeneral'),
		"base" => "wd_testimonial",
		"icon" => "icon-wpb-wpdance",
		"category" => "WPDance Elements",
		"params" => array(
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Heading", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "title",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Box style", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "box_style",
				"value" => array(
					"No box" => "",
					"Boxed" => "style-boxed"
				),
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Type", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "wd_query_type",
				"value" => array(
					"Simple"	=> 'simple',
					"Slider"	=> 'slider',
				),
				"description" => ''
			),
			
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", 'wpgeneral'),
				"param_name" => "style",
				"value" => array(
					"Meta style"	=> 'meta',
					"Avatar style"	=> 'avatar'
				),
				"description" => '',
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple'))
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Testimonial", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "id",
				"value" => $list_testimonials,
				"description" => '',
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple'))
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "limit",
				"value" => '3',
				"description" => '',
				"dependency" => Array('element' => "wd_query_type", 'value' => array('slider'))
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Image", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "show_img",
				"value" => array(
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Meta Time", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "show_date",
				"value" => array(
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Short Content", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "show_short",
				"value" => array(
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt word number", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "short_limit",
				"value" => "20",
				"description" => esc_html__("Limit number of Excerpt words", 'wpgeneral')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Nav", "wpgeneral"),
				"admin_label" => true,
				"param_name" => "show_nav",
				"value" => array(
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Nav Position", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_nav_pos",
				"value" => array(
					"Pos 1 (Top Right)" 	=> "top_right",
                    "Pos 2 (Middle center)" => "middle_center",
                    "Pos 3 (Bottom Center)" => "bottom_center",
				),
				"dependency" => Array('element' => "show_nav", 'value' => array('1'))
			),
			
		)
	);
	vc_map( $testimonial_params );
}
?>