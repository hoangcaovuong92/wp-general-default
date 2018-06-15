<?php

// **********************************************************************// 

// ! Register New Element: WD Countdown

// **********************************************************************//

// ! File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// **********************************************************************// 
// ! Register New Element: WD Countdown
// **********************************************************************//
$countdown_params = array(
	"name" => "CountDown",
	"base" => "wd_countdown",
	"icon" => "icon-wpb-wpdance",
	"category" => 'WPDance Elements',
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Day", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "day",
			"value" => "20",
			"description" => '',
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Month", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "month",
			"value" => "10",
			"description" => '',
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Year", 'wpgeneral'),
			"admin_label" => true,
			"param_name" => "year",
			"value" => "2014",
			"description" => '',
		),
	)
);
vc_map( $countdown_params );
?>