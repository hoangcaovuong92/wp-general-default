<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
// **********************************************************************// 
// ! Register New Element: WD Recent Products By Category Products
// **********************************************************************//

$wd_recent_products = array(
	"name" => esc_html__("WD Sale Products", 'wpgeneral'),
	"base" => "wd_sale_products",
	"icon" => "icon-wpb-wpdance",
	"category" => esc_html__('WPDance Products', 'wpgeneral'),
	"description"	=> '',
	"params" => array(		
		// Heading
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Heading", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => '',
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
		
		// Heading
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => esc_html__("Description", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "desc",
			"value" => "",
			"description" => '',
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Auto Deal Repeat", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "auto_sale_repeat",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
		),
		
		array(
			'type' => 'exploded_textarea'
			,'heading' => esc_html__( 'Deals product params', 'wpgeneral' )
			,'param_name' => 'auto_sale_ids'
			,'admin_label' => true
			,'value' => ''
			,"dependency" => array('element' => "auto_sale_repeat", 'value' => array('1'))
			,'description' => esc_html__('A comma separated list of parent product category slugs', 'wpgeneral')
		 ),
		
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Limit", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "per_page",
			"value" => "4",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Columns", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "columns",
			"value" => "4",
			"dependency" => array('element' => "style", 'value' => array('grid','list','widget')),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "style",
			"value" => array(
				"Grid" => "grid",
				"List" => "list",
				"Widget" => "widget",
				"Big product" => "big_prod"
			)
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Shortcontent limit", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "shortc_limit",
			"value" => "15",
			"dependency" => Array('element' => "style", 'value' => array('list', 'big_prod'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Deals filter", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "deals_filter",
			"value" => array(
				"All" => "",
				"Day" => "d",
				"Week" => "w",
				"Month" => "mo",
				"Year" => "ye",
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order By", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "orderby",
			"value" => array(
				"Date" => "date",
				"Title" => "title",
				"Rand" => "rand"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Order way", "wpgeneral"),
			"param_name" => "order",
			"value" => array(
				"Descending" => "desc",
				"Ascending" => "asc"
			),
			"dependency" => Array('element' => "orderby", 'value' => array('date','title')),
			"description" => esc_html__("Designates the ascending or descending order.", "wpgeneral")
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Number", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_number",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"dependency" => Array('element' => "style", 'value' => array('widget')),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Countdown", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_countdown",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
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
		
		/*array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Show nav", "wpgeneral"),
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
			"heading" => __("Nav position", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_nav_pos",
			"dependency" => Array('element' => "show_nav", 'value' => array('1')),
			"value" => array(
				"Pos 1 (Top Right)" 	=> "top_right",
				"Pos 2 (Middle center)" => "middle_center",
				"Pos 3 (Bottom Center)" => "bottom_center",
			),
			"description" => ""
		),*/
		
		
	)
);
vc_map( $wd_recent_products );
?>