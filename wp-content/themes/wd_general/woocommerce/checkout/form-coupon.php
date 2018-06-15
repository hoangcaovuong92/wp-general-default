<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! WC()->cart->coupons_enabled() )
	return;
?>
<form class="checkout_coupon" method="post" style="display:none">
	<p class="form-row form-row-first"><span class="question_coupon"><?php esc_html_e( 'Have A Coupon?', 'wpgeneral' ); ?></span><span class="click_coupon"><?php esc_html_e( 'Click here to enter code', 'wpgeneral' ); ?></span></p>
	<p class="form-row">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e( 'Coupon code', 'wpgeneral' ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-row form-row-last">
		<input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply', 'wpgeneral' ); ?>" />
	</p>

	<div class="clear"></div>
</form>