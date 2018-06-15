<?php

if ( ! function_exists( 'tvlgiao_wpdance_wd_tini_account' ) ) {
	function tvlgiao_wpdance_wd_tini_account(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return 'Woocommerce Plugin do not active';
		}
		$myaccount_page_url="";
		$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
		if ( $myaccount_page_id ) {
		  $myaccount_page_url = get_permalink( $myaccount_page_id );
		}		
		ob_start();
		
		$_user_logged = is_user_logged_in();
		
		?>
		<?php do_action( 'wd_before_tini_account' ); ?>
		
		
		<div class="wd_tini_account_wrapper">
			<div class="wd_tini_account_control">
			
				<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('My Account','wpgeneral');?>">
					<?php if(is_user_logged_in()): ?>
						<span><?php esc_html_e('My Account','wpgeneral');?></span>
					<?php else:?>
						<span><?php esc_html_e('Login','wpgeneral');?></span>
					<?php endif;?>		
				</a>	
			
			</div>
			<div class="form_drop_down drop_down_container <?php echo esc_attr($_user_logged ? "hidden" : "");?>">
				<?php 
					if( !$_user_logged ):
				?>
					
					<div class="form_wrapper">
						<form method="post" action="<?php echo wp_login_url();?>" class="login" id="loginform-custom" >		
						<div class="form_wrapper_body">
							
			
								<?php do_action( 'woocommerce_login_form_start' ); ?>
								<p class="login-username">
									<label for="user_login"><?php esc_html_e( 'User or Email', 'wpgeneral' ); ?><span class="required">*</span></label>
									<input type="text" size="20" value="" class="input" id="user_login" name="log">
								</p>
								<p class="login-password">
									<label for="user_pass"><?php esc_html_e( 'Password', 'wpgeneral' ); ?> <span class="required">*</span></label>
									<input type="password" size="20" value="" class="input" id="user_pass" name="pwd">
								</p>
								
								<div class="clear"></div>
								
							</div>
							<div class="form_wrapper_footer">
								<?php do_action( 'woocommerce_login_form' ); ?>								
								<span class="required"><?php esc_html_e('* Required','wpgeneral');?></span>
								<input type="hidden" name="redirect_to" value="<?php the_permalink();?>">
								<input type="submit" class="button none-bg primary button-white button-style2" name="wp-submit" id="wp-submit" value="<?php esc_html_e( 'Login', 'wpgeneral' ); ?>" />
								
								<?php do_action( 'woocommerce_login_form_end' ); ?>
							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" title="<?php esc_html_e('Forgot Your Password?','wpgeneral');?>"><?php esc_html_e('Forgot Your Password?','wpgeneral');?></a>	
							<p><span><?php esc_html_e('New Customer ?','wpgeneral');?></span><span><a class="register" href="<?php echo esc_url($myaccount_page_url); ?>"><?php esc_html_e('Sign up','wpgeneral');?></a></span></p>
							</div>
							
						</form>
					</div>	
				<?php else: ?>	
					<span class="my_account_wrapper"><a href="<?php echo admin_url( 'profile.php', 'https' ); ?>" title="<?php esc_html_e('My Account','wpgeneral');?>"><?php esc_html_e('My Account','wpgeneral');?></a></span>
					<span class="logout_wrapper"><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php esc_html_e('Logout','wpgeneral');?>"><?php esc_html_e('Logout','wpgeneral');?></a></span>
				<?php
					endif
				?>
			</div>
		</div>
		<?php do_action( 'wd_after_tini_account' ); ?>
<?php
		$tini_account = ob_get_clean();
		return $tini_account;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_wd_update_tini_account' ) ) {
	function tvlgiao_wpdance_wd_update_tini_account() {
		die( $_tini_account_html = tvlgiao_wpdance_wd_tini_account() );
	}
}



function tvlgiao_wpdance_wd_login_fail( $username ) {
	if(isset( $_REQUEST['redirect_to']) && ($_REQUEST['redirect_to'] == admin_url())){
		return;
	}
	if(isset( $_REQUEST['redirect_to']) && strripos($_REQUEST['redirect_to'],'wp-admin') > 0 ){
		return;
	}
	$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
		return 'Woocommerce Plugin do not active';
	}
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id ) {
		$myaccount_page_url = get_permalink( $myaccount_page_id );
		wp_safe_redirect( $myaccount_page_url );
		exit;
	}		
}
//add_action( 'wp_login_failed', 'tvlgiao_wpdance_wd_login_fail' );  // hook failed login
add_action('wp_ajax_update_tini_account', 'tvlgiao_wpdance_wd_update_tini_account');
add_action('wp_ajax_nopriv_update_tini_account', 'tvlgiao_wpdance_wd_update_tini_account');

?>
