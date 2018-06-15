<?php 
 $tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
// $tvlgiao_wpdance_wd_data['wd_tini_cart_in_sidebar']; die();
if ( ! function_exists( 'tvlgiao_wpdance_wd_tini_cart' ) ) {
	function tvlgiao_wpdance_wd_tini_cart(){
		global $tvlgiao_wpdance_wd_data;
		$cart_in_sidebar = (isset($tvlgiao_wpdance_wd_data['wd_tini_cart_in_sidebar']))? absint($tvlgiao_wpdance_wd_data['wd_tini_cart_in_sidebar']) : 1;
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		 global $woocommerce;
		$_cart_empty = sizeof( $woocommerce->cart->get_cart() ) > 0 ? false : true ;
		
		ob_start();
		if($cart_in_sidebar == 1){
			$class = ' wd-open-control-panel';
			$class2 = ' cart-list-in-sidebar';
			$pos = " data-position=\"right\" data-element=\".wd-cart-list-box\"";
		} else {
			$class = '';$pos = ''; $class2 = '';
		}
		?>
		<?php do_action( 'wd_before_tini_cart' ); ?>
		<div class="wd_tini_cart_wrapper <?php echo esc_attr($class2)?>">
			<div class="wd_tini_cart_control <?php echo esc_attr($class)?> heading" <?php echo esc_attr($pos);?>>
				
				<div class="cart_size">
					<a href="<?php echo esc_url( wc_get_cart_url() );?>" title="<?php esc_html_e('View your shopping bag','wpgeneral');?>">
						<span><i class="fa fa-shopping-cart"></i></span>
					</a>
					<!--<span class="cart_division">/</span>-->
					<span id="cart_size_value_head"><?php 
					$cart_contents_count = ( (int) $woocommerce->cart->cart_contents_count !== 0 )? $woocommerce->cart->cart_contents_count : 1;
					echo  esc_html($woocommerce->cart->cart_contents_count ). ' ' . _n("Item", "Items", $cart_contents_count, 'wpgeneral');
					?> - <span class="wd_cart_total"><?php echo  $woocommerce->cart->get_cart_subtotal(); ?></span></span>
				</div>
			</div>
			<?php if($cart_in_sidebar == 0): ?>
			<div class="cart_dropdown drop_down_container">
				
				<?php if ( !$_cart_empty ) : ?>
				<div class="dropdown_body">
					<h3 class="wd_cart_heading"><?php esc_html_e('shopping cart','wpgeneral'); ?></h3>
					<ul class="cart_list product_list_widget">
							
							<?php
								$_cart_array = $woocommerce->cart->get_cart();
								$_index = 0;
							?>
							
							<?php foreach ( $_cart_array as $cart_item_key => $cart_item ) :
								
								$_product = $cart_item['data'];

								// Only display if allowed
								if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
									continue;
								
								
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);

								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								
								if($_index < 3){
								?>

								<li class="media <?php echo esc_attr($_cart_li_class = ($_index == 0 ? "first" : ($_index == count($_cart_array) - 1 ? "last" : ""))) ?>">
									<div class="close-gray" style="position:absolute; width: 100%; height: 100%;"><i class="fa fa-spinner fa-spin"></i></div>
									<a class="pull-left" href="<?php echo  esc_url(get_permalink( $cart_item['product_id'] )); ?>">
										<?php echo wp_kses_post($_product->get_image('tvlgiao_wpdance_cart_dropdown')); ?>
									</a>
									<div class="cart_item_wrapper">	
										<a class="wd_cart_title" href="<?php echo esc_url(get_permalink( $cart_item['product_id']) ); ?>">
											<?php echo esc_html($_product->get_title()); ?>
										</a>
											<?php // $woocommerce->cart->get_item_data( $cart_item ); ?>
											<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s',$product_price, $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); ?>
											<?php
												echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', wc_get_cart_remove_url($cart_item_key), esc_html__( 'Remove this item', 'wpgeneral' ) ), $cart_item_key );
										?>
									</div>
								</li>
								<?php
								} else {
								?>
									<li class="media last"><i><?php esc_html_e('View more on cart page', 'wpgeneral');?></i></li>
								<?php
									break;
								}
								?>
								<?php $_index++; ?>
								
							<?php endforeach; ?>
					</ul><!-- end product list -->
					
					<p class="total"><span><?php esc_html_e( 'Subtotal', 'wpgeneral' ); ?>:</span> <?php echo wp_kses_post($woocommerce->cart->get_cart_subtotal()); ?></p>
					
				</div>
				<?php else: ?>
				<div class="size_empty">
					<?php esc_html_e('You have no items in your shopping cart.','wpgeneral');?>
				</div>
				<?php endif; ?>
				<?php if ( !$_cart_empty ) : ?>
					<div class="dropdown_footer">
						<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
						<p class="buttons">
							<a class="cart button none-bg primary button-white" href="<?php echo esc_url( wc_get_cart_url() );?>"><?php esc_html_e('view cart','wpgeneral');?></a>
							<a class="checkout button none-bg primary button-white" href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><?php _e( 'Checkout', 'wpgeneral' ); ?></a>
						</p>
						
						<!-- <span class="cart_dropdown_subtotal">
							<label for="cart-dropdown-subtotal"><?php esc_html_e('checkoutBag subtotal','wpgeneral');?> : </label>
							<?php echo wp_kses_post($woocommerce->cart->get_cart_subtotal()); ?>
						</span>		-->					
					</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
		</div>
		<?php do_action( 'wd_after_tini_cart' ); ?>
<?php
		$tini_cart = ob_get_clean();
		return $tini_cart;
	}
}


if ( ! function_exists( 'tvlgiao_wpdance_wd_ajax_tini_cart' ) ) {
	function tvlgiao_wpdance_wd_ajax_tini_cart(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) return;
		global $woocommerce,$tvlgiao_wpdance_wd_data;
		$_cart_empty = sizeof( $woocommerce->cart->get_cart() ) > 0 ? false : true ;
		
		ob_start();
		?>
			<div class="cart-close-gray" data-loader_url="<?php echo esc_url(get_admin_url() . 'images/spinner-2x.gif');?>" style="position:absolute; width: 100%; height: 100%; text-align: center; line-height: 100%; background-color: rgba(0,0,0,0.75); margin-left: -5px; padding: 35px 0px; z-index: 23; display: none; left: 0; top:0;"><div style="display: table-cell;vertical-align: middle;"><i class="fa fa-spinner fa-spin"></i></div></div>
			<div class="drop_down_container">
				
				<?php if ( !$_cart_empty ) : ?>
				<div class="dropdown_body">
					<h1 class="wd_cart_heading text-center"><?php esc_html_e('shopping cart','wpgeneral'); ?></h1>
					<div class="line line-30 line-margin text-center"></div>
					<ul class="cart_list product_list_widget">
							
							<?php 
								$tini_cart_limit = isset($tvlgiao_wpdance_wd_data['wd_tini_cart_prod_number'])? $tvlgiao_wpdance_wd_data['wd_tini_cart_prod_number']: 3;
								$_cart_array = $woocommerce->cart->get_cart();
								$_index = 0;
							?>
							
							<?php foreach ( $_cart_array as $cart_item_key => $cart_item ) :
								
								$_product = $cart_item['data'];

								// Only display if allowed
								if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
									continue;
								
								
								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);

								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								
								if($_index < $tini_cart_limit){
								?>

								<li class="media <?php echo esc_attr($_cart_li_class = ($_index == 0 ? "first" : ($_index == count($_cart_array) - 1 ? "last" : ""))) ?>">
									
									<a class="pull-left" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
										<?php echo wp_kses_post($_product->get_image('tvlgiao_wpdance_cart_dropdown')); ?>
									</a>
									<div class="cart_item_wrapper">	
										<a class="wd_cart_title" href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
											<?php echo esc_html($_product->get_title()); ?>
										</a>
											<?php // $woocommerce->cart->get_item_data( $cart_item ); ?>
											<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s',$product_price, $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); ?>
											<?php
												echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', wc_get_cart_remove_url($cart_item_key), esc_html__( 'Remove this item', 'wpgeneral' ) ), $cart_item_key );
										?>
									</div>
								</li>
								<?php
								} else {
								?>
									<li class="media last"><i><?php esc_html_e('View more in cart...', 'wpgeneral');?></i></li>
								<?php
									break;
								}
								?>
								<?php $_index++; ?>
								
							<?php endforeach; ?>
					</ul><!-- end product list -->
					
					<p class="total"><span><?php esc_html_e( 'Subtotal', 'wpgeneral' ); ?>:</span> <?php echo wp_kses_post($woocommerce->cart->get_cart_subtotal()); ?></p>
					
				</div>
				<?php else: ?>
				<h1 class="wd_cart_heading text-center"><?php esc_html_e('shopping cart','wpgeneral'); ?></h1>
				<div class="line line-30 line-margin text-center"></div>
				<div class="size_empty">
					<?php esc_html_e('You have no items in your shopping cart.','wpgeneral');?>
				</div>
				<?php endif; ?>
				<?php if ( !$_cart_empty ) : ?>
					<div class="dropdown_footer">
						<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
						<p class="buttons">
							<a class="cart button none-bg primary button-white" href="<?php echo esc_url( wc_get_cart_url() );?>"><?php esc_html_e('view cart','wpgeneral');?></a>
							<a class="checkout button none-bg primary button-white" href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><?php esc_html_e( 'Checkout', 'wpgeneral' ); ?></a>
						</p>
						
						<!-- <span class="cart_dropdown_subtotal">
							<label for="cart-dropdown-subtotal"><?php esc_html_e('checkoutBag subtotal','wpgeneral');?> : </label>
							<?php echo wp_kses_post($woocommerce->cart->get_cart_subtotal()); ?>
						</span>		-->					
					</div>
				<?php endif; ?>
			</div>
		<?php
		$tini_cart = ob_get_clean();
		return $tini_cart;
	}
}


if ( ! function_exists( 'tvlgiao_wpdance_wd_update_tini_cart' ) ) {
	function tvlgiao_wpdance_wd_update_tini_cart() {
		die($cart_html = tvlgiao_wpdance_wd_tini_cart());
	}
}

add_action('wp_ajax_update_tini_cart', 'tvlgiao_wpdance_wd_update_tini_cart');
add_action('wp_ajax_nopriv_update_tini_cart', 'tvlgiao_wpdance_wd_update_tini_cart');

if ( ! function_exists( 'tvlgiao_wpdance_wd_update_tini_cart_1' ) ) {
	function tvlgiao_wpdance_wd_update_tini_cart_1() {
		die($cart_html = tvlgiao_wpdance_wd_ajax_tini_cart());
	}
}

$cart_in_sidebar = (isset($tvlgiao_wpdance_wd_data['wd_tini_cart_in_sidebar']))? absint($tvlgiao_wpdance_wd_data['wd_tini_cart_in_sidebar']) : 1;

if($cart_in_sidebar) {
	add_action('wp_ajax_update_tini_cart_1', 'tvlgiao_wpdance_wd_update_tini_cart_1');
	add_action('wp_ajax_nopriv_update_tini_cart_1', 'tvlgiao_wpdance_wd_update_tini_cart_1');
}


?>