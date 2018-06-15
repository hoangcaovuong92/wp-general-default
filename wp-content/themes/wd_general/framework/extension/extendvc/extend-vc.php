<?php

// **********************************************************************// 
// ! Register New Element: WD Product Category

// ! Register New Element: WD Product Category Grid Style

// ! Register New Element: WD Popular Product Category

// ! Register New Element: WD Product Category List Style

// ! Register New Element: WD Feature Product

// ! Register New Element: WD Popular Product

// ! Register New Element: WD Recent Products

// ! Register New Element: WD Best Selling Products

// ! Register New Element: WD Best Selling By Category Products

// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$args = array(
	'number'     => '',
	'orderby'    => 'name',
	'order'      => 'ASC',
	'hide_empty' => true,
	'include'    => array()
);
/*
$product_categories = get_terms( 'product_cat', $args );
$arr_categories = array();
foreach($product_categories as $category){
	if(isset($category->slug)){
		if(trim($category->slug) == trim($check)){
			$checked = 'selected="selected"';
		}
		$categories_show  .= '<option '.$checked.' value="'.$category->slug.'">'.$category->name.'</option>';
		$checked = '';
	}
}
*/
// Removing shortcodes
vc_remove_element("vc_button", 'wpgeneral');
vc_remove_element("vc_button2", 'wpgeneral');
vc_remove_element("vc_cta_button", 'wpgeneral');
vc_remove_element("vc_cta_button2", 'wpgeneral');


//***********************************************************************
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
	"type" => "textfield",
	"heading" => esc_html__("Minimum height", 'wpgeneral'),
	"param_name" => "min_height",
	"description" => esc_html__("You can use pixels (px) or percents (%).", 'wpgeneral')
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
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Video background", 'wpgeneral'),
	"value" => array(esc_html__("Use video background?", 'wpgeneral') => "show_video" ),
	"param_name" => "bg_video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => esc_html__("Video overlay", 'wpgeneral'),
	"value" => array(esc_html__("Use transparent overlay over video?", 'wpgeneral') => "show_video_overlay" ),
	"param_name" => "bg_video_overlay",
	"description" => "",
	"dependency" => Array('element' => "bg_video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => esc_html__("Video poster image", 'wpgeneral'),
	"param_name" => "video_poster",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "bg_video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Video background (mp4) file url", 'wpgeneral'),
	"value" => "",
	"param_name" => "bg_video_src_mp4",
	"description" => "",
	"dependency" => Array('element' => "bg_video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Video background (ogv) file url", 'wpgeneral'),
	"value" => "",
	"param_name" => "bg_video_src_ogv",
	"description" => "",
	"dependency" => Array('element' => "bg_video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Video background (webm) file url", 'wpgeneral'),
	"value" => "",
	"param_name" => "bg_video_src_webm",
	"description" => "",
	"dependency" => Array('element' => "bg_video", 'value' => array('show_video'))
));


//***********************************************************************
// Column Text
//***********************************************************************
vc_add_param("vc_column_text", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Align", 'wpgeneral'),
	"param_name" => "align",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
));




//***********************************************************************
// Separator
//***********************************************************************

//Get current values stored in the style param in "Separator" element
$param = WPBMap::getParam('vc_separator', 'style');
//Append new value to the 'value' array
$param['type'] = 'dropdown';
$param['value'] = array(
		"New" => "new",
		"Border" => "",
		"Dashed" => "dashed",
		"Dotted" => "dotted",
		"Double" => "double"
	);
//Finally "mutate" param with new values
WPBMap::mutateParam('vc_separator', $param);

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Thickness (px)", 'wpgeneral'),
	"param_name" => "thickness",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Top Margin (px)", 'wpgeneral'),
	"param_name" => "up",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Bottom Margin (px)", 'wpgeneral'),
	"param_name" => "down",
	"value" => "",
	"description" => ""
));


//***********************************************************************
// Single image
//***********************************************************************
vc_add_param("vc_single_image", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Widget title color", 'wpgeneral'),
	"param_name" => "title_color",
	"value" => ""
));
vc_add_param("vc_single_image", array(
	"type" => "textarea_html",
	"class" => "",
	"heading" => esc_html__("Text below the image", 'wpgeneral'),
	"param_name" => "img_description",
	"value" => "",
	"description" => "Enter text which will be used as description. Leave blank if no description is needed."
));
vc_add_param("vc_single_image", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Button text", 'wpgeneral'),
	"param_name" => "img_button",
	"value" => "",
	"description" => "Enter text which will be used as button text. Leave blank if no button is needed."
));
vc_add_param("vc_single_image", array(
	"type" => "attach_images",
	"class" => "",
	"heading" => esc_html__("Label", 'wpgeneral'),
	"param_name" => "label",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_single_image", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Label size", 'wpgeneral'),
	"param_name" => "label_size",
	"value" => "",
	"description" => "Enter image size. Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size."
));


//***********************************************************************
// Default button
//***********************************************************************
vc_add_param("vc_button", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Margin (px)", 'wpgeneral'),
	"param_name" => "margin",
	"value" => "",
	"description" => esc_html__("Margin (top right bottom left - 5px 5px 5px 5px)", 'wpgeneral')
));


//***********************************************************************
// Default button 2
//***********************************************************************
vc_add_param("vc_button2", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Margin (px)", 'wpgeneral'),
	"param_name" => "margin",
	"value" => "",
	"description" => esc_html__("Margin (top right bottom left - 5px 5px 5px 5px)", 'wpgeneral')
));


//***********************************************************************
// Pie chart
//***********************************************************************

//Get current values stored in the color param in "Pie chart" element
$param = WPBMap::getParam('vc_pie', 'color');
//Append new value to the 'value' array
$param['value'] = '#f7f7f7';
$param['type'] = 'colorpicker';
//Finally "mutate" param with new values
WPBMap::mutateParam('vc_pie', $param);

// add appearance dropdown
vc_add_param("vc_pie", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Appearance", 'wpgeneral'),
	"admin_label" => true,
	"param_name" => "appearance",
	"value" => array(
		"Pie chart (default)" => "default",
		"Counter" => "counter"
	),
	"description" => ''
));

// add custom color selector
vc_add_param("vc_pie", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Bar color", 'wpgeneral'),
	"param_name" => "color",
	"value" => '#f7f7f7',
	"description" => ''
));

// add Pie Chart Line Width
vc_add_param("vc_pie", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Pie Chart Line Width (px)", 'wpgeneral'),
	"param_name" => "line_width",
	"value" => "",
	"description" => "Width of the bar line in px.",
	"dependency" => Array('element' => "appearance", 'value' => array('default'))
));
// add pie size
vc_add_param("vc_pie", array(
	"type" => "textfield",
	"class" => "",
	"heading" => esc_html__("Size (px)", 'wpgeneral'),
	"param_name" => "size",
	"value" => ""
));


//***********************************************************************
// Progress bar
//***********************************************************************
vc_add_param("vc_progress_bar", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Values color", 'wpgeneral'),
	"param_name" => "color",
	"value" => '#ffffff',
	"description" => ''
));


// **********************************************************************// 
// ! Register New Element: Awesome Icon
// **********************************************************************//
$icon_box_params = array(
	'name' => 'Awesome Icon',
	'base' => 'wd_icon',
	'icon' => 'icon-wpb-wpdance',
	'category' => 'by WPDance',
	'class'	=> '',
	'params' => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'wpgeneral'),
			"param_name" => "title",
			"value" => "",
			"description" => "blank if you don't want to display"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
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
			"holder" => "div",
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
		/*array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Position", 'wpgeneral'),
			"param_name" => "position",
			"value" => array(
				"Normal" => "",
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"	
			),
			"description" => ""
		),*/
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Border", 'wpgeneral'),
			"param_name" => "border",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"	
			),
			"description" => ""
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
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Margin (px)", 'wpgeneral'),
			"param_name" => "margin",
			"description" => esc_html__("Margin (top right bottom left - 5px 5px 5px 5px)", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
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
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Link", 'wpgeneral'),
			"param_name" => "link",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
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
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Enable tooltip", 'wpgeneral'),
			"param_name" => "enable_tooltip",
			"value" => array(
				"" => "false"
			)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Tooltip title", 'wpgeneral'),
			"param_name" => "tooltip_title",
			"value" => "",
			"dependency" => array(
				"element" => "enable_tooltip",
				"not_empty" => true
			)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Tooltip direction", 'wpgeneral'),
			"param_name" => "tooltip_direction",
			"value" => array(
				"Left" => "left",
				"Top" => "top",
				"Bottom" => "bottom",
				"Right" => "right"
			),
			"dependency" => array(
				"element" => "enable_tooltip",
				"not_empty" => true
			)
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)
);  
vc_map($icon_box_params);


// **********************************************************************// 
// ! Register New Element: Bar Chart shortcode
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Bar Chart", 'wpgeneral'),
		"base" => "wd_bar_chart",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Width", 'wpgeneral'),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Height", 'wpgeneral'),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Custom Color", 'wpgeneral'),
				"param_name" => "custom_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Scale steps", 'wpgeneral'),
				"param_name" => "scalesteps",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Scale step width", 'wpgeneral'),
				"param_name" => "scalestepwidth",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Labels", 'wpgeneral'),
				"param_name" => "labels",
				"value" => esc_html__("Label 1 | Label 2 | Label 3", 'wpgeneral')
			),
			array(
				"type" => "exploded_textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "chart",
				"value" => "#eb005d|Legend One|1|5|10 \n #80c5d2|Legend Two|3|7|20 \n #f07d6f|Legend Three|10|2|34",
				"description" => "Input chart values here. Divide values with linebreaks (Enter). Example: #eb005d|Legend One|1|5|10"
			)
		)
) );


// **********************************************************************// 
// ! Register New Element: Button
// **********************************************************************//
$button_params = array(
	"name" => esc_html__("Button", 'wpgeneral'),
	"base" => "wd_button",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"params" => array(
		
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Button text", 'wpgeneral'),
			"param_name" => "content",
			"value" => "Label 1"
		),
		// Link Url
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link URL", 'wpgeneral'),
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),		

		// Style
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'wpgeneral'),
			"param_name" => "size",
			"value" => array(
				"Mini" => "mini",
				"Small button" => "small",
				"Medium" => "medium",
				"Big button" => "big",
				"Extra button" => "extra"
			),
			"description" => ""
		),

		// Button color
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Button color", 'wpgeneral'),
			"param_name" => "color",
			"value" => array(
				"Custom color" => "custom",
				"Aqua" => "aqua",
				"Black" => "black",
				"Brown" => "brown",
				"Blue Violet" => "blue_violet",
				"Green" => "green",
				"Indigo" => "indigo",
				//"Magenta" => "magenta",			
				"Orange" => "orange",
				//"Purple" => "purple",
				//"Pink" => "pink",
				"Red" => "red",
				//"White" => "white",
				"Yellow" => "yellow"
			),
			"description" => ""
		),
		
		// Button color
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Button opacity", 'wpgeneral'),
			"param_name" => "opacity",
			"value" => array(
				"1x" => "1x",
				"2x" => "2x",
				"3x" => "3x",
				"4x" => "4x",
			),
			"description" => ""
		),
		
		// with Background
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Button background", 'wpgeneral'),
			"param_name" => "background",
			"value" => array(
				"With background" => "yes",
				"No background" => "no"
			),
			"description" => "",
		),
				
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "custom_class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)
);
vc_map( $button_params );



// **********************************************************************// 
// ! Register New Element: Call to Action
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Call to Action", 'wpgeneral'),
		"base" => "wd_action",
		"category" => 'by WPDance',
		"icon" => "icon-wpb-wpdance",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Type", 'wpgeneral'),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Border" => "with_border"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Background Color", 'wpgeneral'),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Border Color", 'wpgeneral'),
				"param_name" => "border_color",
				"description" => "",
				"dependency" => array(
					"element" => "type",
					"value" => array(
						"with_border"
					)
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Border Style", 'wpgeneral'),
				"param_name" => "border_style",
				"description" => "",
				"value" => array(
					"Border" => "",
					"Dashed" => "dashed",
					"Dotted" => "dotted",
					"Double" => "double"
				),
				"dependency" => array(
					"element" => "type",
					"value" => array(
						"with_border"
					)
				)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Border Color", 'wpgeneral'),
				"param_name" => "border_color",
				"description" => "",
				"dependency" => array(
					"element" => "type",
					"value" => array(
						"with_border"
					)
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Border Width (in px)", 'wpgeneral'),
				"param_name" => "border_width",
				"description" => "",
				"value" => "1",
				"dependency" => array(
					"element" => "type",
					"value" => array(
						"with_border"
					)
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Border Radius (in px)", 'wpgeneral'),
				"param_name" => "border_radius",
				"description" => "",
				"value" => "",
				"dependency" => array(
					"element" => "type",
					"value" => array(
						"with_border"
					)
				)
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
				"heading" => esc_html__("Link Target", 'wpgeneral'),
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
				"heading" => esc_html__("Link Text", 'wpgeneral'),
				"param_name" => "link_text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Link Text Color", 'wpgeneral'),
				"param_name" => "link_text_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Link Background Color", 'wpgeneral'),
				"param_name" => "link_background_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Link Size", 'wpgeneral'),
				"param_name" => "link_size",
				"value" => array(
					"Default" => "default",
					"Small" => "small",
					"Big" => "big",
					"Extra" => "extra"
				),
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "content",
				"value" => "<p>".esc_html__("I am test text for Call to Action.", 'wpgeneral')."</p>",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Align", 'wpgeneral'),
				"param_name" => "align",
				"value" => array(
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				),
				"description" => ""
			)
		)
) );


// **********************************************************************// 
// ! Register New Element: Code
// **********************************************************************//
$code_params = array(
	"name" => esc_html__("Code", 'wpgeneral'),
	"base" => "wd_code",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'wpgeneral'),
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textarea_raw_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "code",
			"value" => "",
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
vc_map($code_params);


// **********************************************************************// 
// ! Register New Element: Counter
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Counter", 'wpgeneral'),
		"base" => "wd_counter",
		"category" => 'by WPDance',
		"icon" => "icon-wpb-wpdance",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Widget title", 'wpgeneral'),
				"param_name" => "title",
				"description" => "Enter text which will be used as widget title. Leave blank if no title is needed."
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"admin_label" => true,
				"heading" => esc_html__("Counter value", 'wpgeneral'),
				"param_name" => "value",
				"description" => "Input integer value for label"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Counter value start", 'wpgeneral'),
				"param_name" => "init",
				"description" => "Input integer value for label. If empty 0 will be used"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Units", 'wpgeneral'),
				"param_name" => "units",
				"description" => "Enter measurement units (if needed) Eg. %, px, points, etc."
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Color", 'wpgeneral'),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Size (in px)", 'wpgeneral'),
				"param_name" => "size",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Caption", 'wpgeneral'),
				"param_name" => "caption",
				"value" => "",
				"description" => "Enter text which will be used as widget caption. Leave blank if no caption is needed."
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Extra class name", 'wpgeneral'),
				"param_name" => "class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'wpgeneral')
			)
		)
) );


// **********************************************************************// 
// ! Register New Element: Custom Text
// **********************************************************************//
$customtext_params = array(
	"name" => esc_html__("Custom Text", 'wpgeneral'),
	"base" => "wd_custom_text",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Font family", 'wpgeneral'),
			"param_name" => "font_family",
			"value" => esc_html__("Oswald", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Font size", 'wpgeneral'),
			"param_name" => "font_size",
			"value" => "15"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Line height", 'wpgeneral'),
			"param_name" => "line_height",
			"value" => "26"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Font Style", 'wpgeneral'),
			"param_name" => "font_style",
			"value" => array(
				"Normal" => "normal",
				"Italic" => "italic"	
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Text Align", 'wpgeneral'),
			"param_name" => "text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"	
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Font weight", 'wpgeneral'),
			"param_name" => "font_weight",
			"value" => "300"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"param_name" => "color",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Text decoration", 'wpgeneral'),
			"param_name" => "text_decoration",
			"value" => array(
				"None" => "none",
				"Underline" => "underline",
				"Overline" => "overline",
				"Line Through" => "line-through"	
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Background Color", 'wpgeneral'),
			"param_name" => "background_color",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Padding (px)", 'wpgeneral'),
			"param_name" => "padding",
			"value" => "0"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Margin (px)", 'wpgeneral'),
			"param_name" => "margin",
			"value" => "0",
			"description" => esc_html__("Margin (top right bottom left - 5px 5px 5px 5px)", 'wpgeneral')
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "content",
			"value" => "<p>content content content</p>",
			"description" => ""
		)
	)
);
vc_map( $customtext_params );


// **********************************************************************// 
// ! Register New Element: DropCap
// **********************************************************************//
$dropcap_params = array(
	"name" => esc_html__("DropCap", 'wpgeneral'),
	"base" => "dropcap",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"param_name" => "color",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Dropcap Text", 'wpgeneral'),
			"param_name" => "dropcap",
			"value" => "Text",
			"description" => ""
		),		
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "content",
			"value" => "content content content",
			"description" => ""
		)
	)
);
vc_map( $dropcap_params );

// **********************************************************************// 
// ! Register New Element: Feedburner Subscription
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Feedburner Subscription", 'wpgeneral'),
		"base" => "wd_feedburner",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
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
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Default text", 'wpgeneral'),
				"param_name" => "text",
				"value" => "Subscribe",
				"description" => ""
			),
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Box border", 'wpgeneral'),
				"param_name" => "box_border",
				"description" => ""
			),
			
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => esc_html__("Show button", 'wpgeneral'),
				"param_name" => "show_button",
				"value" => array(
					"" => "false"
				)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button text", 'wpgeneral'),
				"param_name" => "button_text",
				"value" => "",
				"dependency" => array(
					"element" => "show_button",
					"not_empty" => true
				)
			),
			
			// Style
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Button size", 'wpgeneral'),
				"param_name" => "button_size",
				"value" => array(
					"Default button" => "default",
					"Small button" => "small",
					"Big button" => "big",
					"Extra button" => "extra"
				),
				"description" => "",
				"dependency" => array(
					"element" => "show_button",
					"not_empty" => true
				)
			),
			
			// Fluid width
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => esc_html__("Fluid width", 'wpgeneral'),
				"param_name" => "button_fluid",
				"value" => array(
					"" => "true"
				),
				"dependency" => array(
					"element" => "show_button",
					"not_empty" => true
				)
			),

			// Button style
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Button style", 'wpgeneral'),
				"param_name" => "button_style",
				"value" => array(
					"White" => "white",
					"Red" => "red",
					"Orange" => "orange",
					"Yellow" => "yellow",
					"Green" => "green",
					"Aquamarine" => "aquamarine",
					"Aqua" => "aqua",
					"Azure" => "azure",
					"Dark purple" => "dark_purple",
					"Purple" => "purple",
					"Pink" => "pink",
					"Black" => "black",
					"Custom color" => "custom"
				),
				"description" => "",
				"dependency" => array(
					"element" => "show_button",
					"not_empty" => true
				)
			),
			
			// with Background
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("With background", 'wpgeneral'),
				"param_name" => "isbackground",
				"value" => array(
					"With background" => "yes",
					"No background" => "no"
				),
				"description" => "",
				"dependency" => array(
					"element" => "button_style",
					"value" => array(
						"red",
						"orange",
						"yellow",
						"green",
						"aquamarine",
						"aqua",
						"azure",
						"dark_purple",
						"purple",
						"pink",
						"black",
						"white"
					)
				)
			),
			
			// Custom button color
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Button color", 'wpgeneral'),
				"param_name" => "custom_color",
				"description" => "",
				"dependency" => array(
					"element" => "style",
					"value" => array(
						"custom"
					)
				)
			),
			
			// Custom button background color
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Button background color", 'wpgeneral'),
				"param_name" => "custom_background_color",
				"description" => "",
				"dependency" => array(
					"element" => "style",
					"value" => array(
						"custom"
					)
				)
			),
			
			// Custom button border color
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Button border color", 'wpgeneral'),
				"param_name" => "custom_border_color",
				"description" => "",
				"dependency" => array(
					"element" => "style",
					"value" => array(
						"custom"
					)
				)
			)
		)
) );


// **********************************************************************// 
// ! Register New Element: Gap
// **********************************************************************//
vc_map( array(
	"name" => esc_html__("Gap", 'wpgeneral'),
	"base" => "wd_gap",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
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


// **********************************************************************// 
// ! Register New Element: Line Graph shortcode
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Line Graph", 'wpgeneral'),
		"base" => "wd_line_graph",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Type", 'wpgeneral'),
				"param_name" => "type",
				"value" => array(
					"" => "",
					"Rounded edges" => "rounded",
					"Sharp edges" => "sharp"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Width", 'wpgeneral'),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Height", 'wpgeneral'),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Custom Color", 'wpgeneral'),
				"param_name" => "custom_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Scale steps", 'wpgeneral'),
				"param_name" => "scalesteps",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Scale step width", 'wpgeneral'),
				"param_name" => "scalestepwidth",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Labels", 'wpgeneral'),
				"param_name" => "labels",
				"value" => esc_html__("Label 1 | Label 2 | Label 3", 'wpgeneral')
			),
			array(
				"type" => "exploded_textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "graph",
				"value" => "#eb005d|Legend One|1|5|10 \n #80c5d2|Legend Two|3|7|20 \n #f07d6f|Legend Three|10|2|34",
				"description" => "Input graph values here. Divide values with linebreaks (Enter). Example: #eb005d|Legend One|1|5|10"
			)
		)
) );


// **********************************************************************// 
// ! Register New Element: Our Project
// **********************************************************************//
$our_project_params = array(
	'name' => 'Our Project',
	'base' => 'wd_our_project',
	'icon' => 'icon-wpb-wpdance',
	'category' => 'by WPDance',
	'params' => array(
		array(
		  'type' => 'textfield',
		  "heading" => esc_html__("Project name", 'wpgeneral'),
		  "param_name" => "name"
		),
		array(
		  'type' => 'attach_image',
		  "heading" => esc_html__("Image", 'wpgeneral'),
		  "param_name" => "img"
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Image size", 'wpgeneral'),
		  "param_name" => "img_size",
		  "description" => esc_html__("Enter image size. Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link URL", 'wpgeneral'),
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Open link in", 'wpgeneral'),
			"param_name" => "target_blank",
			"value" => array(
				"Same window" => "false",
				"New window" => "true"
			),
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"heading" => esc_html__("Project information", 'wpgeneral'),
			"param_name" => "content",
			"value" => esc_html__("Project description", 'wpgeneral')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Type", 'wpgeneral'),
			"param_name" => "type",
			"value" => array( 
				"", 
				esc_html__("Vertical", 'wpgeneral') => 1,
				esc_html__("Horizontal", 'wpgeneral') => 2
			)
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)
);  
vc_map($our_project_params);


// **********************************************************************// 
// ! Register New Element: Pie Chart 2 (Pie)
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Pie Chart 2 (Pie)", 'wpgeneral'),
		"base" => "wd_pie_chart2",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Width", 'wpgeneral'),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Height", 'wpgeneral'),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Legend Text Color", 'wpgeneral'),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "exploded_textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "pie",
				"value" => "15|#eb005d|Legend One \n 35|#80c5d2|Legend Two \n 50|#f07d6f|Legend Three",
				"description" => "Input pie values here. Divide values with linebreaks (Enter). Example: 15|#eb005d|Legend One"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Align", 'wpgeneral'),
				"param_name" => "align",
				"value" => array(
					"" => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				)
			)
		)
) );



// **********************************************************************// 
// ! Register New Element: Pie Chart 3 (Doughnut)
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Pie Chart 3 (Doughnut)", 'wpgeneral'),
		"base" => "wd_pie_chart3",
		"category" => 'by WPDance',
		"icon" => "icon-wpb-wpdance",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Width", 'wpgeneral'),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Height", 'wpgeneral'),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Legend Text Color", 'wpgeneral'),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "exploded_textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Content", 'wpgeneral'),
				"param_name" => "pie",
				"value" => "15|#eb005d|Legend One \n 35|#80c5d2|Legend Two \n 50|#f07d6f|Legend Three",
				"description" => "Input pie values here. Divide values with linebreaks (Enter). Example: 15|#eb005d|Legend One"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Align", 'wpgeneral'),
				"param_name" => "align",
				"value" => array(
					"" => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				)
			)
		)
) );


// **********************************************************************// 
// ! Register New Element:Pricing Table
// **********************************************************************//
$ptable_params = array(
	"name" => esc_html__("Pricing Table", 'wpgeneral'),
	"base" => "wd_ptable",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
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


// **********************************************************************// 
// ! Register New Element: Horizontal progress bar shortcode
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Progress Bar - Horizontal", 'wpgeneral'),
		"base" => "wd_progress_bar",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title", 'wpgeneral'),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title Color", 'wpgeneral'),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Title Tag", 'wpgeneral'),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Percentage", 'wpgeneral'),
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Percentage Color", 'wpgeneral'),
				"param_name" => "percent_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Active Background Color", 'wpgeneral'),
				"param_name" => "active_background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("No active Background Color", 'wpgeneral'),
				"param_name" => "noactive_background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Progress Bar Height (px)", 'wpgeneral'),
				"param_name" => "height",
				"description" => ""
			)
		)
) );



// **********************************************************************// 
// ! Register New Element: Vertical progress bar shortcode
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Progress Bar - Vertical", 'wpgeneral'),
		"base" => "wd_progress_bar_vertical",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title", 'wpgeneral'),
				"param_name" => "title",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title Color", 'wpgeneral'),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Title Tag", 'wpgeneral'),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Title Size", 'wpgeneral'),
				"param_name" => "title_size",
				"description" => ""
			),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Active Background Color", 'wpgeneral'),
				"param_name" => "active_background_color",
				"description" => ""
			),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("No active Background Color", 'wpgeneral'),
				"param_name" => "noactive_background_color",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Percent", 'wpgeneral'),
				"param_name" => "percent",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Percentage Text Size", 'wpgeneral'),
				"param_name" => "percentage_text_size",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Percentage Color", 'wpgeneral'),
				"param_name" => "percentage_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Progress Bar Width", 'wpgeneral'),
				"param_name" => "width",
				"description" => ""
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Text", 'wpgeneral'),
				"param_name" => "text",
				"value" => "",
				"description" => "Put some content here"
			)
		)
) );

// **********************************************************************// 
// ! Register New Element: Quote
// **********************************************************************//
$quote_params = array(
	"name" => esc_html__("Quote", 'wpgeneral'),
	"base" => "quote",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'wpgeneral'),
			"param_name" => "class",
			"value" => "",
			"description" => ""
		),		
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Content", 'wpgeneral'),
			"param_name" => "content",
			"value" => "content content content",
			"description" => ""
		)
	)
);
vc_map( $quote_params );

// **********************************************************************// 
// ! Register New Element: Recent Blog Slider Shortcode
// **********************************************************************//
vc_map( array(
		"name" => esc_html__("Recent Blog", 'wpgeneral'),
		"base" => "wd_recent_blog",
		"category" => 'by WPDance',
		"icon" => "icon-wpb-wpdance",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => esc_html__("Widget title", 'wpgeneral'),
				"param_name" => "title"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Limit", 'wpgeneral'),
				"param_name" => "limit",
				"description" => esc_html__('How many posts to show? Enter number.', 'wpgeneral')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Display type", 'wpgeneral'),
				"param_name" => "type",
				"value" => array( 
				  "", 
				  esc_html__("Slider", 'wpgeneral') => 'slider',
				  esc_html__("Grid", 'wpgeneral') => 'grid'
				)
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Auto play", 'wpgeneral'),
				"param_name" => "autoslide",
				"value" => array( 
				  "", 
				  esc_html__("Yes", 'wpgeneral') => '1',
				  esc_html__("No", 'wpgeneral') => '0'
				),
				"dependency" => Array('element' => "type", 'value' => array('slider'))
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Interval", 'wpgeneral'),
				"param_name" => "interval",
				"description" => esc_html__('Interval between slides. In milliseconds. Default: 10000', 'wpgeneral'),
				"dependency" => Array('element' => "autoslide", 'value' => array('1'))
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Show Control Navigation", 'wpgeneral'),
				"param_name" => "navigation",
				"dependency" => Array('element' => "type", 'value' => array('slider')),
				"value" => array( 
				  "", 
				  esc_html__("Hide", 'wpgeneral') => false,
				  esc_html__("Show", 'wpgeneral') => true
				)
			),
			array(
				"type" => "wd_taxonomy",
				"taxonomy" => "category",
				"class" => "",
				"heading" => esc_html__("Category", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "category",
				"value" => "",
				"description" => esc_html__('Display testimonials from category.', 'wpgeneral')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Introtext word limit", 'wpgeneral'),
				"param_name" => "word_limit"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'wpgeneral'),
				"param_name" => "class",
				"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
			)			
		)
) );


// **********************************************************************// 
// ! Register New Element: Single product
// **********************************************************************//
$product_params = array(
  'name' => 'Single product',
  'base' => 'wd_single_post',
  'icon' => 'icon-wpb-wpdance',
  'category' => 'by WPDance',
  'params' => array(
	array(
	  "type" => "textfield",
	  "heading" => esc_html__("Title", 'wpgeneral'),
	  "param_name" => "title"
	),
	array(
	  "type" => "textfield",
	  "heading" => esc_html__("Product ID", 'wpgeneral'),
	  "param_name" => "id"
	),
	array(
	  "type" => "textfield",
	  "heading" => esc_html__("Product SKU", 'wpgeneral'),
	  "param_name" => "sku"
	),
	array(
	  "type" => "textfield",
	  "heading" => esc_html__("Extra class name", 'wpgeneral'),
	  "param_name" => "class",
	  "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
	)
  )

);  
vc_map($product_params);



// **********************************************************************// 
// ! Register New Element: SoundCloud
// **********************************************************************//
$audio_params = array(
	"name" => esc_html__("SoundCloud", 'wpgeneral'),
	"base" => "wd_soundcloud",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'wpgeneral'),
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("URL", 'wpgeneral'),
			"param_name" => "url",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Width", 'wpgeneral'),
			"param_name" => "width",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Height", 'wpgeneral'),
			"param_name" => "height",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Comments", 'wpgeneral'),
			"param_name" => "comments",
			"value" => array(
				"No" => "false",
				"Yes" => "true"	
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Auto play", 'wpgeneral'),
			"param_name" => "auto_play",
			"value" => array(
				"No" => "false",
				"Yes" => "true"	
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"param_name" => "color",
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
vc_map($audio_params);


// **********************************************************************// 
// ! Register New Element: Static Blocks
// **********************************************************************//
$staticblocks_params = array(
	'name' => 'Static Blocks',
	'base' => 'wd_staticblocks',
	'icon' => 'icon-wpb-wpdance',
	'category' => 'by WPDance',
	'params' => array(
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"param_name" => "color"
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"param_name" => "limit",
			"description" => esc_html__('How many testimonials to show? Enter number.', 'wpgeneral')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display type", 'wpgeneral'),
			"param_name" => "type",
			"value" => array( 
			  "", 
			  esc_html__("Slider", 'wpgeneral') => 'slider',
			  esc_html__("Grid", 'wpgeneral') => 'grid'
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Auto play", 'wpgeneral'),
			"param_name" => "autoslide",
			"value" => array( 
			  "", 
			  esc_html__("Yes", 'wpgeneral') => '1',
			  esc_html__("No", 'wpgeneral') => '0'
			),
			"dependency" => Array('element' => "type", 'value' => array('slider'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Interval", 'wpgeneral'),
			"param_name" => "interval",
			"description" => esc_html__('Interval between slides. In milliseconds. Default: 10000', 'wpgeneral'),
			"dependency" => Array('element' => "autoslide", 'value' => array('1'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Control Navigation", 'wpgeneral'),
			"param_name" => "navigation",
			"dependency" => Array('element' => "type", 'value' => array('slider')),
			"value" => array( 
			  "", 
			  esc_html__("Hide", 'wpgeneral') => false,
			  esc_html__("Show", 'wpgeneral') => true
			)
		),
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "wd_staticblocks_category",
			"class" => "",
			"heading" => esc_html__("Category", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "category",
			"value" => "",
			"description" => esc_html__('Display testimonials from category.', 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)

);  
vc_map($staticblocks_params);



// ! Team
vc_map( array(
	"name" => esc_html__("Team", 'wpgeneral'),
	"base" => "wd_team",
	"icon" => "icon-wpb-wpdance",
	"category" => 'by WPDance',
	"params" => array(

		// Terms
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "wd_team_category",
			"class" => "",
			"heading" => esc_html__("Categories", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "category"
		),

		// Appearance
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Appearance", 'wpgeneral'),
			"param_name" => "type",
			"value" => array(
				"Masonry" => "masonry",
				"Grid" => "grid"
			),
			"description" => ""
		),

		// Gap
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Gap between team members (px)", 'wpgeneral'),
			"description" => esc_html__("Team member paddings (e.g. 5 pixel padding will give you 10 pixel gaps between team members)", 'wpgeneral'),
			"param_name" => "padding",
			"value" => "20"
		),

		// Column width
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Column target width (px)", 'wpgeneral'),
			"param_name" => "column_width",
			"value" => "370"
		),

		// 100% width
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("100% width", 'wpgeneral'),
			"param_name" => "full_width",
			"value" => array(
				"" => "true",
			)
		),

		// Number of posts
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Number of team members to show", 'wpgeneral'),
			"param_name" => "number",
			"value" => "12",
			"description" => esc_html__("(Integer)", 'wpgeneral')
		),

		// Order by
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order by", 'wpgeneral'),
			"param_name" => "orderby",
			"value" => array(
				"Date" => "date",
				"Author" => "author",
				"Title" => "title",
				"Slug" => "name",
				"Date modified" => "modified",
				"ID" => "id",
				"Random" => "rand"
			),
			"description" => esc_html__("Select how to sort retrieved posts.", 'wpgeneral')
		),

		// Order
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order way", 'wpgeneral'),
			"param_name" => "order",
			"value" => array(
				"Descending" => "desc",
				"Ascending" => "asc"
			),
			"description" => esc_html__("Designates the ascending or descending order.", 'wpgeneral')
		)
	)
) );



// **********************************************************************// 
// ! Register New Element: Testimonials
// **********************************************************************//
$testimonials_params = array(
	'name' => 'Testimonials',
	'base' => 'testimonials',
	'icon' => 'icon-wpb-wpdance',
	'category' => 'by WPDance',
	'params' => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Widget title", 'wpgeneral'),
			"param_name" => "heading",
			"description" => esc_html__("Blank if you don't want to display", 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"param_name" => "limit",
			"description" => esc_html__('How many testimonials to show? Enter number.', 'wpgeneral')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display type", 'wpgeneral'),
			"param_name" => "type",
			"value" => array( 
			  "", 
			  esc_html__("Slider", 'wpgeneral') => 'slider',
			  esc_html__("Grid", 'wpgeneral') => 'grid'
			)
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Interval", 'wpgeneral'),
			"param_name" => "interval",
			"description" => esc_html__('Interval between slides. In milliseconds. Default: 10000', 'wpgeneral'),
			"dependency" => Array('element' => "type", 'value' => array('slider'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Control Navigation", 'wpgeneral'),
			"param_name" => "navigation",
			"dependency" => Array('element' => "type", 'value' => array('slider')),
			"value" => array( 
			  "", 
			  esc_html__("Hide", 'wpgeneral') => 0,
			  esc_html__("Show - Center", 'wpgeneral') => 1,
			  esc_html__("Show - Top", 'wpgeneral') => 2
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Image type", 'wpgeneral'),
			"param_name" => "image",
			"value" => array(
				"Default" => "",
				"Circle" => "circle",
				"Rounded" => "rounded"
			),
			"description" => ""
		),
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "testimonial-category",
			"class" => "",
			"heading" => esc_html__("Category", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "category",
			"value" => "",
			"description" => esc_html__('Display testimonials from category.', 'wpgeneral')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name", 'wpgeneral'),
			"param_name" => "class",
			"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wpgeneral')
		)
	)

);
vc_map($testimonials_params);



if(function_exists("is_woocommerce", 'wpgeneral')){

	// **********************************************************************// 
	// ! Register New Element: WooCommerce Products
	// **********************************************************************//

	$woo_products_params = array(
		"name" => esc_html__("WooCommerce Products", 'wpgeneral'),
		"base" => "wd_woo_products",
		"icon" => "icon-wpb-wpdance",
		"category" => 'by WPDance',
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Widget title", 'wpgeneral'),
				"param_name" => "title",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Number", 'wpgeneral'),
				"param_name" => "number",
				"value" => "5",
				"description" => "Number of products to show"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show", 'wpgeneral'),
				"param_name" => "show",
				"value" => array(
					"All Products" => "",
					"Featured Products" => "featured",
					"On-sale Products" => "onsale"	
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Order by", 'wpgeneral'),
				"param_name" => "orderby",
				"value" => array(
					"Date" => "date",
					"Price" => "price",
					"Random" => "random",
					"Sales" => "sales"	
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Sorting order", 'wpgeneral'),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Hide free products", 'wpgeneral'),
				"param_name" => "hide_free",
				"value" => array(
					"No" => "0",
					"Yes" => "1"
				)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show hidden products", 'wpgeneral'),
				"param_name" => "show_hidden",
				"value" => array(
					"No" => "0",
					"Yes" => "1"
				)
			)
		)
	);

	vc_map( $woo_products_params );




}

// **********************************************************************// 
// ! Register New Element: WD Product Category
// **********************************************************************//
$product_category_params = array(
	"name" => esc_html__("WD Product Category", 'wpgeneral'),
	"base" => "custom_products_category",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
	
		// Text
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ""
		),
		
		// Link Category Slug
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"param_name" => "category",
			"value" => "",
			"description" => ""
		),
		
		// add orderby dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Title" => "title",
				"Date" => "date",
				"Price" => "price",
				"Popularity" => "popularity",
				"Rating" => "rating",
				"Rand" => "rand"
			),
			"description" => ""
		),
		
		// add order dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "order",
			"value" => array(
				"Desc" => "desc",
				"Asc" => "asc"	
			),
			"description" => ""
		),

		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
	)
);
vc_map( $product_category_params );


// **********************************************************************// 
// ! Register New Element: WD Product Category Grid Style
// **********************************************************************//
$product_category_style2_params = array(
	"name" => esc_html__("WD Product Category Grid Style", 'wpgeneral'),
	"base" => "custom_products_category_grid_image",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
			
		// Image Url
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Image Url", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "image_url",
			"value" => "",
			"description" => esc_html__("image url of big image on the left shortcode layout", 'wpgeneral')
		),
		
		// add Color dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "color",
			"value" => array(
				"black" => "black",
				"blue" => "blue",
				"green" => "green",
				"indigo" => "indigo",
				"orange" => "orange",
				"pink" => "pink",
				"red" => "red"
			),
			"description" => ""
		),
		
		// add orderby dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Title" => "title",
				"Date" => "date",
				"Price" => "price",
				"Rating" => "rating",
				"Popularity" => "popularity",
				"Rand" => "rand"
			),
			"description" => ""
		),
		
		// add order dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "order",
			"value" => array(
				"Desc" => "desc",
				"Asc" => "asc"
			),
			"description" => ""
		),

		// Link Category Slug
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"param_name" => "category",
			"value" => "",
			"description" => ""
		),

		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
	)
);
vc_map( $product_category_style2_params );

// **********************************************************************// 
// ! Register New Element: WD Product Category List Style
// **********************************************************************//
$product_category_list_params = array(
	"name" => esc_html__("WD Product Category List Style", 'wpgeneral'),
	"base" => "wd_product_category_list_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
	
		// Text
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => ""
		),
		
		// add Color dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "color",
			"value" => array(
				"black" => "black",
				"blue" => "blue",
				"green" => "green",
				"indigo" => "indigo",
				"orange" => "orange",
				"pink" => "pink",
				"red" => "red"
			),
			"description" => ""
		),
		
		// Link Category Slug
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"param_name" => "category",
			"value" => "",
			"description" => ""
		),
		
		// add orderby dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Title" => "title",
				"Date" => "date",
				"Price" => "price",
				"Popularity" => "popularity",
				"Rating" => "rating",
				"Rand" => "rand"
			),
			"description" => ""
		),
		
		// add order dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "order",
			"value" => array(
				"Desc" => "desc",
				"Asc" => "asc"
			),
			"description" => ""
		),

		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
	)
);
vc_map( $product_category_list_params );

// **********************************************************************// 
// ! Register New Element: WD Popular Product Category
// **********************************************************************//
$product_popular_params = array(
	"name" => esc_html__("WD Popular Product by Category", 'wpgeneral'),
	"base" => "wd_popular_product",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	'description' => esc_html__( 'Show popular product of one category', 'wpgeneral' ),
	"params" => array(
	
		// Text
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number show on slider", 'wpgeneral')
		),
		
		// Icon Url
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon Url", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "icon",
			"value" => "",
			"description" => esc_html__("icon url on the left category name", 'wpgeneral')
		),
		
		// add Color dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Color", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "color",
			"value" => array(
				"black" => "black",
				"blue" => "blue",
				"green" => "green",
				"indigo" => "indigo",
				"orange" => "orange",
				"pink" => "pink",
				"red" => "red"
			),
			"description" => ""
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("If it's empty,heading is title of category", 'wpgeneral')
		),
		
		// Link Category Slug
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"param_name" => "category",
			"value" => "",
			"description" => ""
		),
		
		// add orderby dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Title" => "title",
				"Date" => "date",
				"Price" => "price",
				"Popularity" => "popularity",
				"Rating" => "rating",
				"Rand" => "rand"
			),
			"description" => ""
		),
		
		// add order dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "order",
			"value" => array(
				"Desc" => "desc",
				"Asc" => "asc"
			),
			"description" => ""
		),

		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
		
		// add Related dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Related of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_related",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
	)
);
vc_map( $product_popular_params );


// **********************************************************************// 
// ! Register New Element: WD Feature Products
// **********************************************************************//
$feature_product_params = array(
	"name" => esc_html__("WD Feature Products", 'wpgeneral'),
	"base" => "featured_product_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
	)
);
vc_map( $feature_product_params );


// **********************************************************************// 
// ! Register New Element: WD Popular Products
// **********************************************************************//
$popular_product_params = array(
	"name" => esc_html__("WD Popular Products", 'wpgeneral'),
	"base" => "popular_product_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
	)
);
vc_map( $popular_product_params );

// **********************************************************************// 
// ! Register New Element: WD Recent Products
// **********************************************************************//
$popular_product_params = array(
	"name" => esc_html__("WD Recent Products", 'wpgeneral'),
	"base" => "recent_product_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Short content dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),
		
		// add Auto dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Auto Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "auto",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"description" => ""
		),
	)
);
vc_map( $popular_product_params );

// **********************************************************************// 
// ! Register New Element: WD Best Selling Products
// **********************************************************************//
$best_selling_product_params = array(
	"name" => esc_html__("WD Best Selling Products", 'wpgeneral'),
	"base" => "best_selling_product_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"description"	=> esc_html__('Show Top Sale Products', 'wpgeneral'),
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// Show Heading
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Show Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_heading_title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Short content dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),

	)
);
vc_map( $best_selling_product_params );

// **********************************************************************// 
// ! Register New Element: WD Best Selling By Category Products
// **********************************************************************//
$best_selling_product_by_category_params = array(
	"name" => esc_html__("WD Best Selling Products By Category", 'wpgeneral'),
	"base" => "best_selling_product_by_category_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"description"	=> esc_html__('Show Top Sale Products in the same category', 'wpgeneral'),
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// category
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "cat_slug",
			"value" => "",
			"description" => ""
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// Show Heading
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Show Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_heading_title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Short content dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),

	)
);
vc_map( $best_selling_product_by_category_params );

// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//
$recent_product_by_category_params = array(
	"name" => esc_html__("WD Best Selling Products By Category", 'wpgeneral'),
	"base" => "recent_product_by_categories_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Slider',
	"description"	=> esc_html__('Show Recent products in the same category', 'wpgeneral'),
	"params" => array(
		
		// Columns
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Layout dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Layout", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "layout",
			"value" => array(
				"Small" => "small",
				"Big" => "big"
			),
			"description" => ""
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Number", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "",
			"description" => esc_html__("product number in slider includes invisible products", 'wpgeneral')
		),
		
		// category
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "cat_slug",
			"value" => "",
			"description" => ""
		),
		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		
		// desc
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => ""
		),
		
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", 'wpgeneral')
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Icon Nav Slider", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add image dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Image", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_image",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add title dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_title",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Sku dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Sku", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_sku",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Price dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Price", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_price",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Rating dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Rating", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Label dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Label", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_label",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		
		// add Categories dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Categories of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show all categories of each product", 'wpgeneral')
		),
		
		// add Short content dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => esc_html__("Show short content of each product", 'wpgeneral')
		),

	)
);
vc_map( $recent_product_by_category_params );
?>