<?php
/**
 * EW Social Widget
 */
if(!class_exists('WP_Widget_Coupon')){
	class WP_Widget_Coupon extends WP_Widget {
		function __construct() {
	    	$widget_setting = array(
				'name' 		=> esc_html__('WD - Coupon','wpgeneral'),
				'desc' 		=> esc_html__('Display coupon form','wpgeneral'),
				'slug' 	  	=> 'ew_social',
				'class' 	=> 'widget_coupon',
			);
			$widget_ops 		= array('classname' => $widget_setting['class'], 'description' => $widget_setting['desc']);
			$control_ops 		= array('width' => 400, 'height' => 350);
			parent::__construct($widget_setting['slug'], $widget_setting['name'], $widget_ops);
		}

		function widget( $args, $instance ) {
			extract($args);
			$title = esc_attr(apply_filters( 'widget_title', $instance['title'] ));
			
			
			
			if ( ! WC()->cart->coupons_enabled() || is_null(WC()->checkout()))
				return;
			$checkout_link =  esc_url( wc_get_checkout_url() );
			$pageURL = 'http';
			
			if ($_SERVER["HTTPS"] == "on") {
				$pageURL .= "s";
			}
			$pageURL .="://";
			$pageURL .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
			if(strcasecmp($checkout_link, $pageURL) !== 0){
				return;
			}			
			?>

			<form class="wd_checkout_coupon" method="post">
				<p class="form-row form-row-first"><span class="question_coupon"><?php esc_html_e( 'Have a coupon?', 'wpgeneral' ); ?></span><span class="click_coupon"><?php esc_html_e( 'Click here to enter code', 'wpgeneral' ); ?></span></p>
				<p class="form-row">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e( 'Coupon code', 'wpgeneral' ); ?>" id="coupon_code" value="" />
				</p>

				<p class="form-row form-row-last">
					<input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Login', 'wpgeneral' ); ?>" />
				</p>

				<div class="clear"></div>
			</form>
			
			<?php
			echo wp_kses_post($after_widget);
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;			
			return $instance;
		}

		function form( $instance ) { 
		}
	}
}

