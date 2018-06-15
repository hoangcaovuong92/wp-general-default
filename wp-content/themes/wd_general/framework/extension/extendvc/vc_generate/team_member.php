<?php

// **********************************************************************// 

// ! Register New Element: WD Team

// **********************************************************************//

// ! File Security Check

if ( ! defined( 'ABSPATH' ) ) { exit; }

$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );

if ( in_array( "wd_team/wd_team.php", $_actived ) ) {
	
	$query = new WP_Query( array( 'post_type' => 'team' ) );
	$slug_arg = array();
	if($query->have_posts()) : 
		while($query->have_posts()) : $query->the_post();
			$name = esc_html(get_the_title($query->post->ID));
			$id = absint($query->post->ID);
			$slug_arg[$name] = $id;
		endwhile;
	endif;

	/// ! Team
	vc_map( array(
		"name" => esc_html__("Team member", 'wpgeneral'),
		"base" => "team_member",
		"icon" => "icon-wpb-wpdance",
		"category" => "WPDance Elements",
		"params" => array(
			/*array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Appearance"),
				"param_name" => "style",
				"value" => array(
					"Style 1" => "style1",
					"Style 2" => "style2",
					"Style 3" => "style3",
					"Style 4" => "style4"
				),
				"description" => __("")
			),*/
			
			// Column width
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Member", 'wpgeneral'),
				"param_name" => "id",
				"value" => $slug_arg,
				"admin_label" => true,
				"description" => esc_html__("Slug of Team member item", 'wpgeneral')
			),


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Width", 'wpgeneral'),
				"param_name" => "width",
				"value" => "350"
			),


			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Height", 'wpgeneral'),
				"param_name" => "height",
				"value" =>"350"
			)
		)
	) );
}
?>