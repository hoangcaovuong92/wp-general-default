<?php
/*
*	Template Name: Full-width Template
*/
get_header(); 
 $tvlgiao_wpdance_page_datas = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("page_datas");
?>


<?php 

$page_title  = '<h1 class="heading-title page-title">';
$page_title .= get_the_title();
$page_title .= '</h1>';
$brd_data = array(
	'has_breadcrumb'	=> (isset($tvlgiao_wpdance_page_datas['hide_breadcrumb']) && absint($tvlgiao_wpdance_page_datas['hide_breadcrumb']) == 0),
	'has_page_title' 	=> ( (!is_home() && !is_front_page()) && absint($tvlgiao_wpdance_page_datas['hide_title']) == 0 ),
	'title'				=> $page_title,
);
 $tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
	if( isset($tvlgiao_wpdance_wd_data) ){
		$style = 'style="background: url('.esc_url($tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs']).');"';
	}
	tvlgiao_wpdance_wd_printf_breadcrumb($brd_data,$style);

?>
<div id="wd-container" class="content-wrapper fullwidth-template">
	<?php
				// Start the Loop.
				if( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );	
				endif;
			?>
</div>


<?php get_footer(); ?>