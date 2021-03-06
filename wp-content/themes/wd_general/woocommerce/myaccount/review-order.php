<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version   3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<p class="order-info"><?php printf( wp_kses_post(__( 'Order #<mark class="order-number">%s</mark> was placed on <mark class="order-date">%s</mark> and is currently <mark class="order-status">%s</mark>.', 'wpgeneral' )), $order->get_order_number(), esc_html( wc_format_datetime( $order->get_date_created() ) ), wc_get_order_status_name( $order->get_status() ) ); ?></p>

<?php if ( $notes = $order->get_customer_order_notes() ) :
	?>
	<h2><?php esc_html_e( 'Order Updates', 'wpgeneral' ); ?></h2>
	<ol class="commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="comment note">
			<div class="comment_container">
				<div class="comment-text">
					<p class="meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'wpgeneral' ), strtotime( $note->comment_date ) ); ?></p>
					<div class="description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php
endif;

do_action( 'woocommerce_view_order', $order_id );
