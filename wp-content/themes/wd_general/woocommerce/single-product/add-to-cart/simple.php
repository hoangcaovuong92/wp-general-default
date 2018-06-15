<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 $product = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("product");

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	/*$availability = $product->get_availability();

	if ( $availability['availability'] ) {
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
	}	*/
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="cart product_detail" method="post" enctype='multipart/form-data'>

	 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>
		
		<?php
	 		if ( ! $product->is_sold_individually() )
			?>
			<span class="pre_quantity"><?php esc_html_e('Quantity','wpgeneral');?></span>
			<?php
	 			woocommerce_quantity_input( array(
	 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
	 			) );
	 	?>		
		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />		
		<div class="wd-product-buttons">
			<button type="submit" class="single_add_to_cart_button button alt"><?php echo apply_filters('single_add_to_cart_text', esc_html__( 'Add to cart', 'wpgeneral' ), $product->get_type()); ?></button>
			<?php do_action('woocommerce_after_add_to_cart_button'); ?>
		</div>
		
	</form>
	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>