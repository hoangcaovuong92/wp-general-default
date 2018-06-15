<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
	<table class="shop_table cart woocommerce-checkout-review-order-table">
		<thead>
			<tr>
				<th class="product-name"><?php esc_html_e( 'Product', 'wpgeneral' ); ?></th>
				<th class="product-total"><?php esc_html_e( 'Total', 'wpgeneral' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );

				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						echo '
							<tr class="' . esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ) . '">
								<td class="product-name">' .
									'<div class="wd_product_content"><div class="wd_product_item"><a href="'.get_permalink( $cart_item['product_id'] ).'">'
										.$_product->get_image('tvlgiao_wpdance_cart_dropdown').
									'</a>'.									
									'</div><div class="wd_product_meta"><h3 class="wd_product_title">'.apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '</h3>' .
									'<p class="wd_product_excerpt">'.substr(strip_tags(get_the_excerpt($_product->get_id())),0,60).'</p>'.
									
									wc_get_formatted_cart_item_data($cart_item) .
									'<div class="wd_product_number">'.apply_filters( 'woocommerce_checkout_item_quantity', '<strong class="product-quantity">' . esc_html__('Quantity', 'wpgeneral'). ": " . $cart_item['quantity'] . '</strong>', $cart_item, $cart_item_key ) .'</div>'.
									
									'</div></div>'.
									
								'</td>
								<td class="product-total">' . apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) . '</td>
							</tr>';
					}
				}
				
				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>
		</tbody>
		<tfoot>
			<tr class="cart-subtotal">
				<th><?php esc_html_e( 'Cart Subtotal', 'wpgeneral' ); ?></th>
				<td><?php wc_cart_totals_subtotal_html(); ?></td>
			</tr>
			
			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<tr class="discount cart-discount coupon-<?php echo esc_attr( $code ); ?>">
					<th><?php esc_html_e( 'Coupon:', 'wpgeneral' ); ?> <?php echo esc_html( $code ); ?></th>
					<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
				</tr>
			<?php endforeach; ?>
			
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<?php wc_cart_totals_shipping_html(); ?>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<tr class="fee">
					<th><?php echo esc_html( $fee->name ); ?></th>
					<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
				</tr>
			<?php endforeach; ?>
			
			<?php if ( WC()->cart->tax_display_cart === 'excl' ) : ?>
				<?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr class="tax-total">
						<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
						<td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
					</tr>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<tr class="total">
				<th><?php esc_html_e( 'Order Total', 'wpgeneral' ); ?></th>
				<td><?php wc_cart_totals_order_total_html(); ?></td>
			</tr>

			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

		</tfoot>
	</table>

