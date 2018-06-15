<?php
/**
 * Order tracking form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post");
?>

<form action="<?php echo esc_url( get_permalink($post->ID) ); ?>" method="post" class="track_order">

	<p><?php esc_html_e( 'To track your order please enter your Order ID in the box below and press return. This was given to you on your receipt and in the confirmation email you should have received.', 'wpgeneral' ); ?></p>

	<p class="form-row form-row-first"><label for="orderid"><?php esc_html_e( 'Order ID', 'wpgeneral' ); ?></label> <input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php esc_html_e( 'Found in your order confirmation email.', 'wpgeneral' ); ?>" /></p>
	<p class="form-row form-row-last"><label for="order_email"><?php esc_html_e( 'Billing Email', 'wpgeneral' ); ?></label> <input class="input-text" type="text" name="order_email" id="order_email" placeholder="<?php esc_html_e( 'Email you used during checkout.', 'wpgeneral' ); ?>" /></p>
	<div class="clear"></div>

	<p class="form-row"><input type="submit" class="button" name="track" value="<?php esc_html_e( 'Track', 'wpgeneral' ); ?>" /></p>
	<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>

</form>