<?php 
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.2
 */

 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");
 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post"); ?>
<li>
	<a class="thumbnail" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo wp_kses_post($product->get_image()); ?>
	</a>
	<div class="content">
		<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="product-title-widget" ><?php echo esc_attr(get_the_title($post->ID)); ?></a>
		<?php echo wp_kses_post(wc_get_rating_html( $product->get_average_rating() )); ?>
		<?php echo wp_kses_post($product->get_price_html());?>
	</div>
	
</li>
