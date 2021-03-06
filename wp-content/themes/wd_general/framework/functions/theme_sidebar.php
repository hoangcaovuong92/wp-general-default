<?php
	
	$tvlgiao_wpdance_default_sidebars = array(

						array(
							'name' => esc_html__( 'Primary Widget Area', 'wpgeneral' ),
							'id' => 'primary-widget-area',
							'description' => esc_html__( 'The primary sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Header Top Left Widget Area', 'wpgeneral' ),
							'id' => 'wd-header-top-wider-area-left',
							'description' => esc_html__( 'The Header top sidebar widget area - left', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Header Top Right Widget Area', 'wpgeneral' ),
							'id' => 'wd-header-top-wider-area-right',
							'description' =>esc_html__( 'The Header top sidebar widget area - left', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Header Middle Slidshow Widget Area', 'wpgeneral' ),
							'id' => 'wd-header-middle-slidshow-wider-area',
							'description' => esc_html__( 'Using for header v4 (SuperMarket)', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Top Content Widget Area', 'wpgeneral' ),
							'id' => 'wd-top-content-wider-area',
							'description' => esc_html__( 'The widget area top content', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Category Widget Area', 'wpgeneral' ),
							'id' => 'category-widget-area',
							'description' => esc_html__( 'The Category sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Home Right Widget Area', 'wpgeneral' ),
							'id' => 'home-right-widget-area',
							'description' => esc_html__( 'The Home left sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Home 5 Right Widget Area ', 'wpgeneral' ),
							'id' => 'home5-right-widget-area',
							'description' => esc_html__( 'The Home left sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Blog Left Widget Area', 'wpgeneral' ),
							'id' => 'blog-left-widget-area',
							'description' => esc_html__( 'The Blog left sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Blog Right Widget Area', 'wpgeneral' ),
							'id' => 'blog-right-widget-area',
							'description' => esc_html__( 'The Blog left sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Shop Left Widget Area', 'wpgeneral' ),
							'id' => 'shop-left-widget-area',
							'description' => esc_html__( 'The Category sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Shop Right Widget Area', 'wpgeneral' ),
							'id' => 'shop-right-widget-area',
							'description' => esc_html__( 'The Category sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						
						,array(
							'name' => esc_html__( 'Product Widget Area', 'wpgeneral' ),
							'id' => 'product-widget-area',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'First Footer Widget Area 1', 'wpgeneral' ),
							'id' => 'first-footer-widget-area-1',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'First Footer Widget Area 2', 'wpgeneral' ),
							'id' => 'first-footer-widget-area-2',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'First Footer Widget Area 3', 'wpgeneral' ),
							'id' => 'first-footer-widget-area-3',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Recent Blogs Widget Area ', 'wpgeneral' ),
							'id' => 'recent-blogs-widget-area',
							'description' => esc_html__( 'Recent Blogs sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Second Footer Widget Area', 'wpgeneral' ),
							'id' => 'second-footer-widget-area-1',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
												
						
						,array(
							'name' => esc_html__( 'Third Footer Widget Area 1', 'wpgeneral' ),
							'id' => 'third-footer-widget-area-1',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Third Footer Widget Area 2', 'wpgeneral' ),
							'id' => 'third-footer-widget-area-2',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Third Footer Widget Area 3', 'wpgeneral' ),
							'id' => 'third-footer-widget-area-3',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
						)
						,array(
							'name' => esc_html__( 'Third Footer Widget Area 4', 'wpgeneral' ),
							'id' => 'third-footer-widget-area-4',
							'description' => esc_html__( 'Product default sidebar widget area', 'wpgeneral' ),
							'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
							'after_widget' => '</li>',
							'before_title' => '<div class="widget_title_wrapper"><a class="block-control open_def" href="javascript:void(0)"></a><h3 class="widget-title heading-title">',
							'after_title' => '</h3></div>',
							
						)
						
	);
	TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_SetVarSlidebar($tvlgiao_wpdance_default_sidebars);
function tvlgiao_wpdance_widgets_init() {
	 global $tvlgiao_wpdance_default_sidebars;
	
	$custom_sidebar_str = get_option(TVLGiao_Wpdance_THEME_SLUG.'areas');
	if($custom_sidebar_str){
		$custom_sidebar_arr = json_decode($custom_sidebar_str);		
	}else{
		$custom_sidebar_arr = array();
	}	

		
	$_init_sidebar_array = array();	
	if( count($custom_sidebar_arr) > 0 ){
		
			foreach( $custom_sidebar_arr as $_area ){
				$_area_name = stripslashes(esc_html (ucwords( str_replace("-"," ",$_area) ) ));
				$_init_sidebar_array[] = array(
							'name' => sprintf( wp_kses_post(__( '%s Widget Area','wpgeneral' )), $_area_name )
							,'id' => strtolower( str_replace(" ","-",$_area) )
							,'description' => sprintf( wp_kses_post(__( '%s sidebar widget area','wpgeneral' )), $_area_name )
							,'before_widget' => '<li id="%1$s" class="widget-container %2$s">'
							,'after_widget' => '</li>'
							,'before_title' => '<div class="widget_title_wrapper"><a class="block-control" href="javascript:void(0)"></a><h3 class="widget-title heading-title">'
							,'after_title' => '</h3></div>'
				);	
				
			}	
	}	
	
	$tvlgiao_wpdance_default_sidebars = array_merge($tvlgiao_wpdance_default_sidebars,$_init_sidebar_array);
	
	foreach( $tvlgiao_wpdance_default_sidebars as $sidebar ){
		register_sidebar($sidebar);
	}	
}
/** Register sidebars by running tvlgiao_wpdance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'tvlgiao_wpdance_widgets_init' );

?>