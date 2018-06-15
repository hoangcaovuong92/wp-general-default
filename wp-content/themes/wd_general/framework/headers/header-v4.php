<?php 
   $tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
	?>
<div class="wd-sticky animated" id="wd-sticky">
	<div class="header-middle hidden-xs" style="float: none;">
		<div class="header-middle-content">
			<div class="container">
				<div class="row">
					<div class="header-middle-left col-sm-6">
					<?php tvlgiao_wpdance_theme_logo();?>
					</div>
					<div class="nav wd_mega_menu_wrapper col-sm-18 col-md-18 col-xs-24">
						<?php 
							if ( has_nav_menu( 'primary' )) {
								wp_nav_menu( array( 'container_class' => 'main-menu pc-menu wd-mega-menu-wrapper','theme_location' => 'primary','walker' => new WD_Walker_Nav_Menu() ) );
							}else{
								wp_nav_menu( array( 'container_class' => 'main-menu pc-menu wd-mega-menu-wrapper', 'walker' => new WD_Walker_Nav_Menu() ) );
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div><!-- end .header-middle -->	
	<?php wp_reset_postdata();?>

	<div class="header-bottom hidden-xs" style="float:none;" id="header-bottom">
		<div class="header-bottom-content">
			<div class="container">
				<div class="row">
					<?php $toggle_class = (is_page() && isset($tvlgiao_wpdance_page_datas['toggle_vertical_menu']) && absint($tvlgiao_wpdance_page_datas['toggle_vertical_menu']) == 0 && !wp_is_mobile() )? 'no_toggle': 'toggle_active'; 
					
					?>
					<div class="header-bottom-wrapper">
					<div class="row">
						<div class="vertical_menu_header col-sm-6 col-xs-24">
							<div class="wd_vertical_cat wd_vertical_control <?php echo esc_attr($toggle_class);?>">
								<?php echo isset($tvlgiao_wpdance_wd_data['wd_vertical_menu_heading'])? $tvlgiao_wpdance_wd_data['wd_vertical_menu_heading']: esc_html__('Categories', 'wpgeneral');?>							
							</div>
							<div class="nav wd_vertical_cat_content <?php echo esc_attr($toggle_class)?> animated">
									<?php 
										if ( has_nav_menu( 'vertical_menu' ) ) {
											wp_nav_menu( array( 'container_class' => 'vertical-menu pc-menu wd-mega-menu-wrapper','theme_location' => 'vertical_menu','walker' => new WD_Walker_Nav_Menu() ) );
										}else{
											wp_nav_menu( array( 'container_class' => 'vertical-menu pc-menu wd-mega-menu-wrapper','theme_location' => 'vertical_menu' ) );
										}
									?>
							</div>
						</div>					
						<div class="search_wrapper col-sm-12"><?php tvlgiao_wpdance_wd_get_search_form(); ?></div>
						<div class="shopping-cart shopping-cart-wrapper hidden-xs col-sm-6 col-xs-24 <?php echo ( isset($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) && !absint($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) )? 'wd_cart_disable':'';?>">
							<?php if( !isset($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) || absint($tvlgiao_wpdance_wd_data['wd_enable_cart_header_top']) ) echo tvlgiao_wpdance_wd_tini_cart();?>
						</div>					
					</div>					
					</div>
					
				</div>
			</div>
		</div>
	</div><!-- end .header-bottom -->
	
	
</div><!-- #wd-sticky -->

