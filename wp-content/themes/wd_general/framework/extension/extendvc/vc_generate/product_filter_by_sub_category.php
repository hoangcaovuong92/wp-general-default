<?php
// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 

// ! Register New Element: WD Product filter by sub categories

// **********************************************************************//

$product_sub_category = array(
	'name' => esc_html__( 'WD Product Filter By Brands', 'wpgeneral' )
	,'base' => 'product_filter_by_sub_category'
	,"icon" => "icon-wpb-wpdance-banner"
	,"category" => esc_html__('WPDance Elements', 'wpgeneral')
	,'params' => array(		
		array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Block title', 'wpgeneral' )
			,'param_name' => 'title'
			,'admin_label' => true
			,'value' => ''
			,'description' => ''
		)
		,array(
			'type' => 'textarea'
			,'heading' => esc_html__( 'Block description', 'wpgeneral' )
			,'param_name' => 'desc'
			,'admin_label' => true
			,'value' => ''
			,'description' => ''
		)

		,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Columns', 'wpgeneral' )
			,'param_name' => 'columns'
			,'admin_label' => true
			,'value' => '4'
			,'description' => ''
		)
		,array(
			'type' => 'textfield'
			,'heading' => esc_html__( 'Number of products for each sub category', 'wpgeneral' )
			,'param_name' => 'per_page'
			,'admin_label' => true
			,'value' => '4'
			,'description' => ''
		)
		,array(
			'type' => 'exploded_textarea'
			,'heading' => esc_html__( 'Product Categories', 'wpgeneral' )
			,'param_name' => 'product_cats'
			,'admin_label' => true
			,'value' => ''
			,'description' => esc_html__('A comma separated list of parent product category slugs', 'wpgeneral')
		 )
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show product image', 'wpgeneral' )
			,'param_name' => 'show_image'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
				)
			,'description' => ''
		 )
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show product title', 'wpgeneral' )
			,'param_name' => 'show_title'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
			)
			,'description' => ''
		 )
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show price', 'wpgeneral' )
			,'param_name' => 'show_price'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
			)
			,'description' => ''
		 )
		 
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show rating', 'wpgeneral' )
			,'param_name' => 'show_rating'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
			)
			,'description' => ''
		 )
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show label', 'wpgeneral' )
			,'param_name' => 'show_label'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
			)
			,'description' => ''
		 ),
		 array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Show Short Content of Product", "wpgeneral"),
			"admin_label" => true,
			"param_name" => "show_short_content",
			"value" => array(
				"No" => "0",
				"Yes" => "1"
			),
			"description" => esc_html__("Show short content of each product", "wpgeneral")
		)
		 ,array(
			'type' => 'dropdown'
			,'heading' => esc_html__( 'Show Product Button', 'wpgeneral' )
			,'param_name' => 'show_prod_buttons'
			,'admin_label' => true
			,'value' => array(
				'Yes'		=> 1
				,'No'		=> 0
			)
			,'description' => ''
		 )
	)
);
vc_map( $product_sub_category );
?>