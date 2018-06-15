<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage wp_glory
 * @since Wpdance Glory
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<?php 
 $tvlgiao_wpdance_is_IE = tvlgiao_wpdance_load_global_var_is_IE();
$ie_id ='';
if($tvlgiao_wpdance_is_IE){
	$ie_id='id="wd_ie"';
}
?>
<html <?php echo esc_attr($ie_id); ?> <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php tvlgiao_wpdance_theme_icon();?>
    <?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			tvlgiao_wpdance_theme_icon();
     }
     ?>
	<?php 
		if ( is_singular() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}
		wp_head(); 
	?>
</head>

<?php
        
	$tvlgiao_wpdance_page_datas = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("page_datas");
	
	$tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
	
	$home4 = get_post_custom_values('home_class');
	if(isset($home4))
	{
		foreach ($home4 as $key => $value ) {
		  $homepage4 =$value; 
	}
  }
?>
<body <?php isset($homepage4) ? body_class($homepage4): body_class(); ?>>
	<div class="body-wrapper">
	<div class="page-gray-box"></div>
	<?php 
	if(isset($tvlgiao_wpdance_wd_data['wd_loading_page']) && absint($tvlgiao_wpdance_wd_data['wd_loading_page']) == 1 && !wp_is_mobile()){ 
		do_action( 'wd_loading_page' );
	}?>

	<?php do_action( 'wd_before_header' ); ?>
	
	<?php 
	
?>
	
<?php
	$wd_layout_style = '';
	if($tvlgiao_wpdance_wd_data['wd_layout_styles'] != '' && $tvlgiao_wpdance_wd_data['wd_layout_styles'] == 'boxed'){
		$wd_layout_style = ' wd-'.$tvlgiao_wpdance_wd_data['wd_layout_styles'];
	}
	$wd_layout_custom_width = '';
	if(strlen(trim($tvlgiao_wpdance_wd_data['wd_boxed_width'])) > 0 && $tvlgiao_wpdance_wd_data['wd_layout_styles'] == 'boxed'){
		$wd_layout_custom_width = 'max-width:'.absint($tvlgiao_wpdance_wd_data['wd_boxed_width']).'px';
	}
	$header_layout = '';
	
	if($tvlgiao_wpdance_wd_data['wd_header_styles'] != '' && $tvlgiao_wpdance_wd_data['wd_header_styles'] == 'boxed'){
		$header_layout .= ' wd-'.$tvlgiao_wpdance_wd_data['wd_header_styles'];
	}
	
	if(isset($tvlgiao_wpdance_wd_data['wd_header_style']) && $tvlgiao_wpdance_wd_data['wd_header_style'] !== ''){
		$header_layout .= " header_".$tvlgiao_wpdance_wd_data['wd_header_style'];
	}
	
?>
<div id="template-wrapper" class="hfeed site<?php echo esc_attr($wd_layout_style);?>" style="<?php echo esc_attr($wd_layout_custom_width);?>">
	<div class="wd-control-panel-gray"></div>
	<?php if ( !is_page_template('page-templates/comming-soon.php') ) :?>
	
	<?php 
		if(isset($tvlgiao_wpdance_page_datas['page_slider_pos']) && $tvlgiao_wpdance_page_datas['page_slider_pos'] == 'before_header' && trim($header_layout) !=='header_v2'){
			if(isset($tvlgiao_wpdance_page_datas['page_slider']) && $tvlgiao_wpdance_page_datas['page_slider'] != 'none'){
				//wd_print_header_slider();
			}
			tvlgiao_wpdance_wd_print_header($header_layout);
		} else {
			tvlgiao_wpdance_wd_print_header($header_layout);
			if(isset($tvlgiao_wpdance_page_datas['page_slider']) && $tvlgiao_wpdance_page_datas['page_slider'] != 'none'){
				//wd_print_header_slider();
			}
		}
		
	endif;
	?>

	<?php 
	function tvlgiao_wpdance_wd_print_header($header_layout){
		?>
		<div id="sticket-scroll-header-point"></div>
		<div class="header-box <?php echo esc_attr($header_layout);?>">
		<header id="header" class="<?php echo esc_attr( $header_layout );?> animated">
			<div class="header-main">
				<?php do_action( 'tvlgiao_wpdance_wd_header_init' ); ?>
			</div>
		</header><!-- #masthead -->
		</div>
		<?php do_action( 'wd_before_main_container' ); ?>
		<?php 
	}
	function tvlgiao_wpdance_wd_print_header_slider(){
		 $tvlgiao_wpdance_page_datas = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("page_datas");
	?>
		<div class="slideshow-wrapper main-slideshow <?php echo strcmp($tvlgiao_wpdance_page_datas['main_slider_layout'],'wide') == 0 ? "wd_wide" : "wd_box"; ?>">
				<div class="slideshow-sub-wrapper <?php echo strcmp($tvlgiao_wpdance_page_datas['main_slider_layout'],'wide') == 0 ? "wide-wrapper" : "col-sm-24"; ?>">
					<?php  tvlgiao_wpdance_show_page_slider();?>
				</div>
			</div>
	<?php 
	}
	
	?>
	
	<?php
		$main_content_layout = '';
		if($tvlgiao_wpdance_wd_data['wd_maincontent_styles'] != '' && $tvlgiao_wpdance_wd_data['wd_maincontent_styles'] == 'boxed'){
			$main_content_layout = ' wd-'.$tvlgiao_wpdance_wd_data['wd_maincontent_styles'];
		}
	?>
	
	<div id="main-module-container" class="site-main <?php echo esc_attr($main_content_layout);?>">
