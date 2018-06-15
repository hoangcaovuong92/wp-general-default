<?php
/**
 * Additional Information tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $woocommerce = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("woocommerce");
 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");

$heading = apply_filters( 'woocommerce_product_additional_information_heading', esc_html__( 'Additional Information', 'wpgeneral' ) );
?>

<h2><?php echo esc_html($heading); ?></h2>

<?php wc_display_product_attributes($product); ?>