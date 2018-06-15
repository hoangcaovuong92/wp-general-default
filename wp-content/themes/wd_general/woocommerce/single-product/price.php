<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");

?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price"><?php echo wp_kses_post(@$product->get_price_html()); ?></p>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo esc_attr($product->is_in_stock() ? 'InStock' : 'OutOfStock'); ?>" />

</div>
