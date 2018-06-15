<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 

// ! Register New Element: WD Child categories

// **********************************************************************//

$child_categories_params = array(
	"name" => esc_html__("WD Child Categories", 'wpgeneral'),
	"base" => "wd_child_categories",
	"icon" => "icon-wpb-wpdance-banner",
	"category" => esc_html__('WPDance Products', 'wpgeneral'),
	'params' => array(

		/*array(
			"type" => "wd_taxonomy",
			"taxonomy" => "product_cat",
			"class" => "",
			"heading" => esc_html__("Category Slug", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "category",
			"value" => "",
			"description" => ""
		)*/
		array(
			'type' => 'exploded_textarea'
			,'heading' => esc_html__( 'Product Categories', 'wpgeneral' )
			,'param_name' => 'category'
			,'admin_label' => true
			,'value' => ''
			,'description' => esc_html__('A comma separated list of parent product category slugs', 'wpgeneral')
		 )
		 ,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Columns', 'wpgeneral' )
			,'param_name' => 'columns'
			,'admin_label' => true
			,'value' => 3
			,'description' => ''
		 )
		,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Number of sub categories', 'wpgeneral' )
			,'param_name' => 'limit'
			,'admin_label' => true
			,'value' => 5
			,'description' => ''
		 )
		 ,array(
			'type' => 'textarea'
			,'heading' => esc_html__( 'Description', 'wpgeneral' )
			,'param_name' => 'desc'
			,'admin_label' => true
			,'value' => ''
			,'description' => esc_html__('Input your description or it will load description of category', 'wpgeneral')
		 )
		 ,array(
			'type' => 'colorpicker'
			,'heading' => esc_html__( 'Background color', 'wpgeneral' )
			,'param_name' => 'bg_color'
			,'admin_label' => true
			,'value' => ''
			,'description' => ''
		 )
		 ,array(
			'type' => 'colorpicker'
			,'heading' => esc_html__( 'Text color', 'wpgeneral' )
			,'param_name' => 'text_color'
			,'admin_label' => true
			,'value' => ''
			,'description' => ''
		 )
		 ,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Height', 'wpgeneral' )
			,'param_name' => 'height'
			,'admin_label' => true
			,'value' => ''
			,'description' => esc_html__('Ex: 400px, 5em, ...', 'wpgeneral')
		 )	
		 ,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Button text', 'wpgeneral' )
			,'param_name' => 'button_text'
			,'admin_label' => true
			,'value' => 'View All'
			,'description' => ''
		 )
		 ,array(
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
		)
		
		,array(
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
		)
	)
);
vc_map( $child_categories_params );
?>