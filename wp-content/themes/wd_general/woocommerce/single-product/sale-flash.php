<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");
 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post");

	$lable = '<div class="product_label">';
	if ($product->is_on_sale()){ 
		if( $product->get_regular_price() > 0 ){
			$_off_percent = (1 - round($product->get_price() / $product->get_regular_price(), 2))*100;
			$_off_price = round($product->get_regular_price() - $product->get_price(), 0);
			$_price_symbol = get_woocommerce_currency_symbol();
			$lable .= "<span class=\"onsale show_off product_label\">{$_off_percent}%</span>";	
		}else{
			$lable .= "<span class=\"onsale product_label\">".esc_html__( 'Save','wpgeneral' )."</span>";
		}
	}
	elseif ($product->is_featured()){
		$lable .= "<span class=\"featured product_label\">".esc_html__( 'New','wpgeneral' )."</span>";
	}
	$lable .= "</div>";
?>
<?php echo apply_filters('woocommerce_sale_flash', $lable, $post, $product); ?>
