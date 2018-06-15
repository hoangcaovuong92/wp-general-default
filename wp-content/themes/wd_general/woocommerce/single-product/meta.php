<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");
 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post");
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<!--<?php //if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		

	<?php //endif; ?>-->

	<?php
		//$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		// $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $size, 'wpgeneral' ) . ' ', '.</span>' );
	?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo wp_kses_post($product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $size, 'wpgeneral' ) . ' ', '.</span>' ));
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>