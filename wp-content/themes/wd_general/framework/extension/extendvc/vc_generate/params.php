<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
//***********************************************************************


/*VC TABS*/

vc_add_param("vc_tabs", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Responsive Tab Items", 'wpgeneral'),
	"value" => array(esc_html__( "Responsive Tab Items full width?" , "wpgeneral") => "wd_responsive_fully_tabs_title" ),
	"param_name" => "wd_tab_items_full",
	"description" => "",
));

// Row
//***********************************************************************
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => esc_html__("Row Type", 'wpgeneral'),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Section" => "section"
	)
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Layout", 'wpgeneral'),
	"param_name" => "layout",
	"value" => array(
		"Wide" => "row-wide",
		"Box" => "row-boxed"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));


vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Minimum height", 'wpgeneral'),
	"param_name" => "min_height",
	"description" => esc_html__("You can use pixels (px) or percents (%).", 'wpgeneral')
));
// hidden phone
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Hidden on Phones", 'wpgeneral'),
	"param_name" => "hidden_on_phones",
	"value" => array(
		"" => "true"
	),
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Type", 'wpgeneral'),
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));


vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Content In Grid", 'wpgeneral'),
	"param_name" => "content_grid",
	"value" => array(
		"" => "false"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));

// parallax speed
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Enable parallax", 'wpgeneral'),
	"param_name" => "enable_parallax",
	"value" => array(
		"" => "false"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Fixed image", 'wpgeneral'),
	"param_name" => "parallax_fixed",
	"value" => array(
		"" => "true"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Parallax speed", 'wpgeneral'),
	"param_name" => "parallax_speed",
	"value" => "0.1",
	"dependency" => array(
		"element" => "enable_parallax",
		"not_empty" => true
	)
));

vc_add_param("vc_column", array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Font Color', 'wpgeneral' ),
		'param_name' => 'font_color',
		'description' => esc_html__( 'Select font color', 'wpgeneral' ),
		'edit_field_class' => 'vc_col-md-6 vc_column'
));

vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__( "Animate", 'wpgeneral'),
	"value" => array(esc_html__( "Use Animate?" , "wpgeneral") => "show_animate" ),
	"param_name" => "show_animate",
	"description" => "",
));

 $tvlgiao_wpdance_effect_arg = tvlgiao_wpdance_load_global_var_wd_effect_arg();

vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__( "Animate Type", "wpgeneral" ),
	"param_name" => "animate_type",
	"value" => $tvlgiao_wpdance_effect_arg,
	"dependency" => Array('element' => "show_animate", 'value' => array('show_animate'))
));

vc_add_param("vc_column", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__( "Animated Time", "wpgeneral" ),
	"value" => "600",
	"param_name" => "animate_time",
	"description" => "",
	"dependency" => Array('element' => "show_animate", 'value' => array('show_animate'))
));


?>