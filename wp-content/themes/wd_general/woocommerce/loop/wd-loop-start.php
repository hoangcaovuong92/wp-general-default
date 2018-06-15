<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */
 $woocommerce_loop = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("woocommerce_loop");

// Store column count for displaying the grid
/*if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
$_grid_clas = " products-4";
if( absint($tvlgiao_wpdance_wd_data['wd_prod_cat_column']) > 0 ){
	$_columns = absint($tvlgiao_wpdance_wd_data['wd_prod_cat_column']);
	$_grid_clas = " products-".$_columns;
}else{
	$_columns = absint($woocommerce_loop['columns']);
	$_grid_clas = " products-".$_columns;
}*/
	
 ?>
<div class="products <?php echo esc_attr($style);?>">