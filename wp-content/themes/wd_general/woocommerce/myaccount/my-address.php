<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', esc_html__( 'My Addresses', 'wpgeneral' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => esc_html__( 'Billing Address', 'wpgeneral' ),
		'shipping' => esc_html__( 'Shipping Address', 'wpgeneral' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', esc_html__( 'My Address', 'wpgeneral' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  esc_html__( 'Billing Address', 'wpgeneral' )
	), $customer_id );
}

$col = 1;
?>

<div class="wd_myaddress">
	<h2 class="my-account-title"><?php echo esc_html($page_title); ?></h2>
</div>
<div class="wd_myaddress_content">
	<p class="myaccount_address">
		<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'wpgeneral' ) ); ?>
	</p>

	<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="col2-set addresses">'; ?>

	<?php foreach ( $get_addresses as $name => $title ) : ?>

		<div class="col-<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> address">
			<header class="title">
				<h3><?php echo esc_html($title); ?></h3>
				<a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="edit"><i class="fa fa-pencil-square-o"></i></a>
			</header>
			<address><?php
				$address = wc_get_account_formatted_address( $name );
				echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'wpgeneral' );
			?>
			</address>
		</div>

	<?php endforeach; ?>

	<?php if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>
</div>