<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$heading = esc_html( apply_filters('woocommerce_product_description_heading', esc_html__( 'Product Description', 'wpgeneral' ) ) );
?>

<?php the_content(); ?>