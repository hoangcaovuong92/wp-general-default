<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$recent_product_by_category_params = array(
	"name" => esc_html__("WD Recent Products - SD", 'wpgeneral'),
	"base" => "recent_product_by_categories_slider",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Slider', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
		// Title
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ''
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Heading Style", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title_style",
			"value" => array(
				"Style 1" => "style1",
				"Style 2" => "style2"			
			),
			"description" => ''
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
		
		// desc
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"param_name" => "desc",
			"value" => "",
			"description" => ''
		),
		
		// Columns
		
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "4",
			"description" => esc_html__("product number visible on slider", 'wpgeneral')
		),
		
		// add Row
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Row", 'wpgeneral'),
			"param_name" => "row",
			"value" => "1",
		),
		

		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show type", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_type",
			"value" => array(
				"Grid" => "grid",
				"List" => "list",
				"Widget" => "widget"
			),
			"description" => ''
		),		
		// Big product
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Big Product", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "big_product",
			"value" => "",
			"description" => '',
		),
		
		// Per page
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "8",
			"description" => esc_html__("Limit number of products", 'wpgeneral')
		),
		
		array(
			"type" => "wd_taxonomy",
			"taxonomy" => "product_cat",
			"class" => "",
			"heading" => esc_html__("Category Slug", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "cat_slug",
			"value" => "",
			"description" => ''
		),
		// product_tag
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Product Tags", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "product_tag",
			"value" => "",
			"description" => esc_html__("Get all products have this tag", "wpgeneral")
		),
		
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Product Title", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_title",
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
			"heading" => esc_html__("Show Product Price", "wpgeneral"),
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
			"heading" => esc_html__("Show Product Rating", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_rating",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"description" => ""
		),
		// add add to cart
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show product buttons", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_prod_buttons",
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
			"heading" => esc_html__("Show Product Label", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_label",
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
			"param_name" => "show_except_limit",
			"value" => "15",
			"description" => esc_html__("Limit number of Excerpt words", 'wpgeneral'),
			"dependency" => Array('element' => "show_type", 'value' => array('list'))
		),
		
		// add nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Nav", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			)
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
		
		// add icon nav dropdown
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Pagination", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "show_icon_nav",
			"value" => array(
				"Yes" => "1",
				"No" => "0"
			),
			"dependency" => Array('element' => "slider", 'value' => array('1'))
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Autoplay", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "autoplay",
			"value" => array(
				"No" => "0",
				"Yes" => "1",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Slider base this element", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "slider_base_e",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"description" => ""
		),
		
	)
);
vc_map( $recent_product_by_category_params );
?>