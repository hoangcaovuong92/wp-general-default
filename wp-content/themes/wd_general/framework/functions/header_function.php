<?php 
	add_action( 'tvlgiao_wpdance_wd_header_init', 'tvlgiao_wpdance_wd_print_header_top', 10 );
	if(!function_exists ('tvlgiao_wpdance_wd_print_header_top')){
		function tvlgiao_wpdance_wd_print_header_top(){ 
			global $tvlgiao_wpdance_wd_data;
		?>
			<div class="header-top hidden-xs">
				<div class="header-top-content container">
					<div class="row">					
					<div class="header-top-left-area col-sm-8">
						<?php if ( is_active_sidebar( 'wd-header-top-wider-area-left' )): ?>
						<ul class="xoxo">
							<?php dynamic_sidebar( 'wd-header-top-wider-area-left' ); ?>
						</ul>
						<?php endif; ?>
					</div>
					
					<div class="header-top-right-area col-sm-16">
						
						<?php if(!isset($tvlgiao_wpdance_wd_data['wd_header_style']) || $tvlgiao_wpdance_wd_data['wd_header_style'] !== 'v4'):?>
						<div class="shopping-cart shopping-cart-wrapper hidden-xs <?php echo ( isset($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) && !absint($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) )? 'wd_cart_disable':'';?>">
							<?php if( !isset($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) || absint($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) ) echo tvlgiao_wpdance_wd_tini_cart();?>
						</div>
						<?php endif;?>
						<div class="header-currency hidden-sticky">
								<?php 
								tvlgiao_wpdance_wd_header_currency_convert();
								?>
					    </div>
						<?php if ( is_active_sidebar( 'wd-header-top-wider-area-right' )): ?>
						<div class="header-top-custom-sidebar hidden-xs">
							<ul class="xoxo">
								<?php dynamic_sidebar( 'wd-header-top-wider-area-right' ); ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php if ( tvlgiao_wpdance_wd_is_woocommerce() ) { ?>
						<div class="header-top-account hidden-xs">
							<?php echo tvlgiao_wpdance_wd_tini_account();//TODO : account form goes here?>
						</div>
						<?php } ?>
						<?php if ( tvlgiao_wpdance_wd_is_woocommerce() && defined('YITH_WCWL') ) { ?>
							<div class="wd_tini_wishlist_wrapper hidden-xs"><?php echo tvlgiao_wpdance_wd_tini_wishlist(); ?></div>
						<?php } ?>
						
						<?php if ( tvlgiao_wpdance_wd_is_woocommerce() ) { ?>
						<div class="phone_quick_menu_1 hidden-lg hidden-sm hidden-md">
							<div class="mobile_my_account">
								<?php if ( is_user_logged_in() ) { ?>
									<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id'))); ?>" title="<?php esc_html_e('My Account','wpgeneral'); ?>"><?php esc_html_e('My Account','wpgeneral'); ?></a>
								<?php }
								else { ?>
									<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_html_e('Login / Register','wpgeneral'); ?>"><?php esc_html_e('Login / Register','wpgeneral'); ?></a>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="mobile_cart_container  hidden-lg hidden-sm hidden-md">
							<div class="mobile_cart">
							<?php
								 $woocommerce = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("woocommerce");
								if( isset($woocommerce) && isset($woocommerce->cart) ){
									$cart_url = esc_url( wc_get_cart_url() );
									echo "<a href='{$cart_url}' title='View Cart'>".esc_html__('View Cart','wpgeneral')."</a>";
								}

							?>
							</div>
							<div class="mobile_cart_number">0</div>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		<?php
			tvlgiao_wpdance_menu_effect_js_var();
		
		}
	}	
		
	add_action( 'tvlgiao_wpdance_wd_header_init', 'tvlgiao_wpdance_wd_print_header_body', 20 );
	if(!function_exists ('tvlgiao_wpdance_wd_print_header_body')){
		function tvlgiao_wpdance_wd_print_header_body(){
			global $tvlgiao_wpdance_wd_data;
			get_template_part('framework/headers/header', $tvlgiao_wpdance_wd_data['wd_header_style']);
		}
	}
	
	function tvlgiao_wpdance_theme_logo(){
		global $tvlgiao_wpdance_wd_data;
		
		$header_type = 'wd_logo';	
		$logo = strlen(trim($tvlgiao_wpdance_wd_data[$header_type])) > 0 ? esc_url($tvlgiao_wpdance_wd_data[$header_type]) : '';
		$default_logo = get_template_directory_uri()."/images/logo_v1.png";
		$textlogo = stripslashes(esc_attr($tvlgiao_wpdance_wd_data['wd_text_logo']));
	?>
		<div class="logo heading-title">
		<?php if( strlen( trim($logo) ) > 0 ){?>
				<a href="<?php  echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url($logo);?>" alt="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>" title="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>"/></a>	
		<?php } else {
			if($textlogo){
			?>
				<a href="<?php   echo esc_url( home_url( '/' ) );?>" title="<?php echo esc_attr($textlogo);?>"><?php echo esc_html($textlogo);?></a>
			<?php }else{ ?>
				<a href="<?php   echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url($default_logo); ?>"  alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>"/></a>
			<?php
			}
		}?>	
		</div>
	<?php 
	}
	
	function tvlgiao_wpdance_theme_mobile_logo(){
		global $tvlgiao_wpdance_wd_data;
		
		$header_type = 'wd_logo_mobile';
		if(isset($tvlgiao_wpdance_wd_data['wd_logo_mobile']) && strlen(trim($tvlgiao_wpdance_wd_data['wd_logo_mobile'])) > 0 ){
			$logo = esc_url($tvlgiao_wpdance_wd_data['wd_logo_mobile']);
		} else {
			$logo = strlen(trim($tvlgiao_wpdance_wd_data['wd_logo'])) > 0 ? esc_url($tvlgiao_wpdance_wd_data['wd_logo']) : '';
		}
		
		$default_logo = get_template_directory_uri()."/images/logo-mobile.png";
		$textlogo = stripslashes(esc_attr($tvlgiao_wpdance_wd_data['wd_text_logo']));
	?>
	<div class="top_header_mobile">
		<div class="header-currency hidden-sticky">
								<?php 
								tvlgiao_wpdance_wd_header_currency_convert();
								?>
		</div>
		<?php if ( is_active_sidebar( 'wd-header-top-wider-area-right' )): ?>
						<div class="header-top-custom-sidebar">
							<ul class="xoxo">
								<?php dynamic_sidebar( 'wd-header-top-wider-area-right' ); ?>
							</ul>
						</div>
		<?php endif; ?>
		<div class="logo heading-title">
		<?php if( strlen( trim($logo) ) > 0 ){?>
				<a href="<?php  echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url($logo);?>" alt="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>" title="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>"/></a>	
		<?php } else {
			if($textlogo){
			?>
				<a href="<?php   echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr($textlogo);?>"><?php echo esc_html($textlogo);?></a>
			<?php }else{ ?>
				<a href="<?php   echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($default_logo); ?>"  alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>"/></a>
			<?php
			}
		}?>	
		</div>
		<?php if(tvlgiao_wpdance_wd_is_woocommerce()) {
				$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
				$myaccount_page_url = "#";
				if ( $myaccount_page_id ) {
					$myaccount_page_url = get_permalink( $myaccount_page_id );
				}
				$wishlist_page = esc_url( get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ) );
				?>
				<div class="wd_mobile_account">
					<a class="wishlist_header" href="<?php echo esc_url($wishlist_page); ?>">
						<?php tvlgiao_wpdance_wd_tini_wishlist() ?>
		           </a>
					<?php if(!is_user_logged_in()):?>
						
						<a class="sign-in-form-control" href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('Log in/Sign up','wpgeneral');?>">
							<i class="fa fa-user"></i>
						</a>
						<span class="visible-xs login-drop-icon"></span>			
					<?php else:?>		
						<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_html_e('My Account','wpgeneral'); ?>">
							<i class="fa fa-user"></i>
						</a>	
					<?php endif;?>
				</div>
				<?php
			} ?>
	</div>
	<?php 
	}
	
	function tvlgiao_wpdance_theme_logo_fullwidth(){
		global $tvlgiao_wpdance_wd_data;
		$logo = strlen(trim($tvlgiao_wpdance_wd_data['wd_logo_fullwidth'])) > 0 ? esc_url($tvlgiao_wpdance_wd_data['wd_logo_fullwidth']) : '';
		$default_logo = get_template_directory_uri()."/images/logo.png";
		$textlogo = stripslashes(esc_attr($tvlgiao_wpdance_wd_data['wd_text_logo']));
	?>
		<div class="logo heading-title">
		<?php if( strlen( trim($logo) ) > 0 ){?>
				<a href="<?php   echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($logo);?>" alt="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>" title="<?php echo esc_attr($textlogo ? $textlogo : get_bloginfo('name'));?>"/></a>	
		<?php } ?>	
		</div>
	<?php 
	}
	if(!function_exists ('tvlgiao_wpdance_wd_get_search_form1')){
		function tvlgiao_wpdance_wd_get_search_form1(){
			ob_start();
            $categories_show = '<option value="">'.esc_html__('All Categories','wpgeneral').'</option>';
		?>
			<div class="wd_woo_search_box">
				<select class="wd_search_product" name="term"><?php echo ($categories_show); ?></select>
				<label class="screen-reader-text"><?php esc_html_e('Search', 'wpgeneral');?></label>				
				<form class="wd_search_form" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<input type="text" name="s" id="s" <?php if(isset($_GET['s'])) echo "value=\"".esc_attr($_GET['s']) . "\""; ?> placeholder="<?php esc_html_e('Search here...', 'wpgeneral');?>" />
					<div class="button_search"><button type="submit" title="<?php echo esc_attr__( 'Search', 'wpgeneral' ); ?>"><i class="fa fa-search"></i></button></div>
					<input type="hidden" name="post_type" value="<?php echo esc_attr((class_exists('WooCommerce'))? "product": 'post');?>" />
				</form>
			</div>
			
		<?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	
	if(!function_exists ('tvlgiao_wpdance_wd_get_mobile_search_form')){
		function tvlgiao_wpdance_wd_get_mobile_search_form(){
			ob_start();
		?>
			<div class="wd_woo_search_box">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<input type="text" placeholder="<?php echo esc_attr__("Search here...", 'wpgeneral');?>" name="s" id="s" <?php if(isset($_GET['s'])) echo "value=\"".esc_attr($_GET['s']) . "\""; ?> />
					<div class="button_search"><button type="submit" title="<?php echo esc_attr__( 'Search', 'wpgeneral' ); ?>"><i class="fa fa-search"></i></button></div>
					<input type="hidden" name="post_type" value="<?php echo esc_attr((class_exists('WooCommerce'))? "product": 'post');?>" />
				</form>
			</div>
			
		<?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	
	if(!function_exists ('tvlgiao_wpdance_wd_get_search_form')){
		function tvlgiao_wpdance_wd_get_search_form(){
			global $tvlgiao_wpdance_wd_data;			
			if(shortcode_exists('wd_woo_search')) {
				
				echo strcmp(trim($tvlgiao_wpdance_wd_data['wd_header_style']), 'v4') == 0? do_shortcode("[wd_woo_search use_header_v4='1']"): do_shortcode("[wd_woo_search]");
			}
				
			else echo tvlgiao_wpdance_wd_get_search_form1();
		}
	}
	
	
	
	function tvlgiao_wpdance_theme_icon(){
		 global $tvlgiao_wpdance_wd_data;
		$icon = $tvlgiao_wpdance_wd_data['wd_icon'];		
			  if( strlen(trim($icon)) > 0 ):?>
						<link rel="shortcut icon" href="<?php echo esc_url($icon);?>" />
					<?php endif;	
	}
	
	function tvlgiao_wpdance_wd_printf_breadcrumb($datas,$style=''){
		if( $datas['has_breadcrumb']== true){
		   global $tvlgiao_wpdance_wd_data;
			
			$tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs'] = (isset($datas['backg_url']) && $datas['backg_url'] !=='') ? $datas['backg_url']: $tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs'];
			$break_pace ="";$height ='';
			
			if( isset($tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs']) && $tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs'] != '' ){
				if(isset($tvlgiao_wpdance_wd_data['wd_header_style']) && $tvlgiao_wpdance_wd_data['wd_header_style'] == 'v2' && !wp_is_mobile()) $height = "height: 330px;";
				if(empty($style)){
				   $style = 'style="background: url('.esc_url($tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs_other']).');"';
				}
			}
			if(isset($tvlgiao_wpdance_wd_data['wd_header_style']) && $tvlgiao_wpdance_wd_data['wd_header_style'] == 'v2' && !wp_is_mobile()){
				$break_pace = "<div style=\"height: 116px; width: 100%;\"></div>";
			}
			if( isset($datas['type']) && $datas['type'] === 'postdetail' && isset($datas['backg_url']) && $datas['backg_url'] !=='' ) {
				//$break_pace = "<div style=\"height: 166px; width: 100%;\"></div>";
			}
			
			echo '<div class="breadcrumb-title-wrapper"><div class="breadcrumb-title" '.trim($style).'>';
			echo esc_html($break_pace);
			if( $datas['has_page_title'] ) {
				echo wp_kses_post($datas['title']);
			}
			
			if( $datas['has_breadcrumb'] ) tvlgiao_wpdance_wd_show_breadcrumbs();
			echo '</div></div>';
			
		}
	}
	function tvlgiao_wpdance_wd_header_currency_convert(){
		global $tvlgiao_wpdance_wd_data;					
			if( class_exists('WooCommerce_Widget_Currency_Converter') && class_exists('WooCommerce') ){
				$args = array(
								'title' => ''
								,'currency_codes' => $tvlgiao_wpdance_wd_data['wd_currency_codes']
							);
				$list_currencies = get_woocommerce_currencies();
				$currency_symbol = get_woocommerce_currency_symbol('USD');
				?>
				<div class="currency_control">
					<a href="javascript: void(0)">
						<span class="current_currency"><?php echo get_option( 'woocommerce_currency' ); ?></span>
						<span class="symbol"></span>
					</a>
				</div>
				<div class="currency_dropdown drop_down_container" style="display: none">
					<form method="post">
						<div>
							<?php
								if ( isset($args['message']) && $args['message'] )
									echo wpautop( $args['message'] );

								$currencies = array_map( 'trim', array_filter( explode( "\n", $args['currency_codes'] ) ) );

								if ( $currencies ) {

									echo '<ul class="currency_switcher font-second">';

									foreach ( $currencies as $currency ) {

										$class    = '';

										if ( $currency == get_option( 'woocommerce_currency' ) )
											$class = 'reset default';
										$text_line = '';
										$text_line .= '<span class="name">'.esc_html($currency).'</span>';
										$text_line .= '<span class="symbol">'.esc_html(get_woocommerce_currency_symbol($currency)).'</span>';
										echo '<li><a href="#" class="' . esc_attr( $class ) . '" data-currencycode="' . esc_attr( $currency ) . '">' . $text_line . '</a></li>';
									}

									if ( isset($args['show_reset']) && $args['show_reset'] )
										echo '<li><a href="#" class="reset">' . esc_html__('Reset', 'wpgeneral') . '</a></li>';

									echo '</ul>';
								}
							?>
						</div>
					</form>
				</div>
				<?php
			}
	}
	
	function tvlgiao_wpdance_menu_effect_js_var(){
		global $tvlgiao_wpdance_wd_data;
	?>

		<script type="text/javascript">
		     "use strict";
			var _sub_menu_show_effect = '<?php echo isset($tvlgiao_wpdance_wd_data['wd_sub_menu_show_effect'])?$tvlgiao_wpdance_wd_data['wd_sub_menu_show_effect']:'dropdown'; ?>';
			var _sub_menu_show_duration = <?php echo (isset($tvlgiao_wpdance_wd_data['wd_sub_menu_show_duration']) && (int)$tvlgiao_wpdance_wd_data['wd_sub_menu_show_duration']>0)?(int)$tvlgiao_wpdance_wd_data['wd_sub_menu_show_duration']:'200'; ?>;
		</script>
	<?php }
?>