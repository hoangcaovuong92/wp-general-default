<?php

// **********************************************************************// 

// ! Register New Element: WD Feature

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Feature
// **********************************************************************//
$wd_is_feature = true;
$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
	if ( !in_array( "features-by-woothemes/woothemes-features.php", $_actived ) ) {
		$wd_is_feature = false;
	}
if( $wd_is_feature ){
	$features = woothemes_get_features( array('limit' => -1,'size' => 'feature-thumbnail' ));
	$list_features = array();
	if( is_array($features) ){
		foreach( $features as $feature ){
			$list_features[$feature->post_title] = $feature->ID;
		}
	}
	
	$feature_params = array(
		"name" => esc_html__("Feature", 'wpgeneral'),
		"base" => "wd_feature",
		"icon" => "icon-wpb-wpdance",
		"category" => esc_html__('WPDance Elements', 'wpgeneral'),
		"params" => array(
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
				"class" => "",
				"heading" => esc_html__("Style", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "style",
				"value" => array(
					"Style 1"	=> 'style-1',
					"Style 2"	=> 'style-2',
					"Style 3"	=> 'style-3',
				),
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Feature", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "id",
				"value" => $list_features,
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple'))
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Limit", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "limit",
				"value" => '6',
				"description" => '',
				"dependency" => Array('element' => "wd_query_type", 'value' => array('slider'))
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Icon Feature", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "icon_image",
				"value" => "",
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple')),
				"description" => esc_html__("Ex:fa fa-home (use font Awesome icon)", 'wpgeneral')
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__("Icon color", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "icon_color",
				"value" => "",
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple')),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Icon", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_icon",
				"value" => array(
						'Yes' => '1',
						'No' => '0'
					),
				"dependency" => Array('element' => "wd_query_type", 'value' => array('simple'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Title", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_title",
				"value" => array(
						'Yes' => '1',
						'No' => '0'
					),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Show Excerpt", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "show_excerpt",
				"value" => array(
						'Yes' => '1',
						'No' => '0'
					),
				"description" => ''
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Excerpt Words Limit", 'wpgeneral'),
				"admin_label" => true,
				"param_name" => "excerpt_words",
				"value" => '10',
				"description" => '',
				"dependency" => Array('element' => "show_excerpt", 'value' => array('1'))
			),
			
		)
	);
	vc_map( $feature_params );
}
?>