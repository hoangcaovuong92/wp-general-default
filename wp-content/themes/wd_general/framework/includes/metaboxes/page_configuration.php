<?php 
	 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post");
	$revolution_exists = ( class_exists('RevSlider') && class_exists('UniteFunctionsRev') );
	$layerslider_exists = ( class_exists('LS_Sliders') );
	$datas = unserialize(get_post_meta($post->ID,TVLGiao_Wpdance_THEME_SLUG.'page_configuration',true));
	$datas = wd_array_atts(array(
										"page_layout" 			=> '0'
										,"main_content_layout"	=> 'wide'
										,"header_style"			=> '0'
										,"header_layout"		=> 'wide'
										,"footer_layout"		=> 'wide'
										,"main_slider_layout"	=> 'wide'
										,"page_column"			=> '0-1-0'
										,"left_sidebar" 		=>'primary-widget-area'
										,"right_sidebar" 		=> 'primary-widget-area'
										,"page_slider" 			=> 'none'
										,"page_slider_pos"		=> ''
										,"page_revolution" 		=> ''
										,"page_layerslider"		=> ''	
										,"hide_breadcrumb" 		=> 0		
										,"hide_title" 			=> 0
										,"toggle_vertical_menu" => 1
										,"hide_top_content"		=> 1
								),$datas);								
?>
<div class="page_config_wrapper">
	<div class="page_config_wrapper_inner">
		<input type="hidden" value="1" name="_page_config">
		<?php wp_nonce_field( "_update_page_config", "nonce_page_config" ); ?>
		<ul class="page_config_list">
			<li class="first">
				<p>
					<label><?php esc_html_e('Layout Style','wpgeneral');?> : </label>
					<select name="page_layout" id="page_layout">
						<option value="0" <?php if( strcmp($datas['page_layout'],'0') == 0 ) echo "selected";?>>Inherit</option>
						<option value="wide" <?php if( strcmp($datas['page_layout'],'wide') == 0 ) echo "selected";?>>Wide</option>
						<option value="boxed" <?php if( strcmp($datas['page_layout'],'boxed') == 0 ) echo "selected";?>>Boxed</option>
					</select>
				</p> 
			</li>
			
			<?php 
				$main_content_show = 'style="display:none;"';
				$header_show = 'style="display:none;"';
				$footer_show = 'style="display:none;"';
				$main_slider_show = 'style="display:none;"';
				$banner_show = 'style="display:none;"';
				if( strcmp($datas['page_layout'],'wide') == 0 ) {
					$main_content_show = "";
					$header_show = "";	
					$footer_show = "";
					$main_slider_show = "";
					$banner_show ="";
				}
			?>
			<li class="sub_layout header_layout" <?php echo esc_attr($header_show); ?>>
				<p>
					<label><?php esc_html_e('Header layout Style','wpgeneral');?> : </label>
					<select name="header_layout" id="header_layout">
						<option value="wide" <?php if( strcmp($datas['header_layout'],'wide') == 0 ) echo "selected";?>>Wide</option>
						<option value="boxed" <?php if( strcmp($datas['header_layout'],'boxed') == 0 ) echo "selected";?>>Boxed</option>
					</select>
				</p> 
			</li>
			<li class="sub_layout main_slider_layout" <?php echo esc_attr($main_slider_show); ?>>
				<p>
					<label><?php esc_html_e('Main slide layout Style','wpgeneral');?> : </label>
					<select name="main_slider_layout" id="slider_layout">
						<option value="wide" <?php if( strcmp($datas['main_slider_layout'],'wide') == 0 ) echo "selected";?>>Wide</option>
						<option value="boxed" <?php if( strcmp($datas['main_slider_layout'],'boxed') == 0 ) echo "selected";?>>Boxed</option>
					</select>
				</p> 
			</li>
			
			<li class="sub_layout main_content_layout" <?php echo esc_attr($main_content_show); ?>>
				<p>
					<label><?php esc_html_e('Main content layout Style','wpgeneral');?> : </label>
					<select name="main_content_layout" id="main_content_layout">
						<option value="wide" <?php if( strcmp($datas['main_content_layout'],'wide') == 0 ) echo "selected";?>>Wide</option>
						<option value="boxed" <?php if( strcmp($datas['main_content_layout'],'boxed') == 0 ) echo "selected";?>>Boxed</option>
					</select>
				</p> 
			</li>

			<li class="sub_layout footer_layout" <?php echo esc_attr($footer_show); ?>>
				<p>
					<label><?php esc_html_e('Footer layout Style','wpgeneral');?> : </label>
					<select name="footer_layout" id="footer_layout">
						<option value="wide" <?php if( strcmp($datas['footer_layout'],'wide') == 0 ) echo "selected";?>>Wide</option>
						<option value="boxed" <?php if( strcmp($datas['footer_layout'],'boxed') == 0 ) echo "selected";?>>Boxed</option>
					</select>
				</p> 
			</li>
			
			<li>
				<p>
					<label><?php esc_html_e('Header Style','wpgeneral');?> : </label>
					<select name="header_style" id="header_style">
						<option value="0" <?php if( strcmp($datas['header_style'],'0') == 0 ) echo "selected";?>>Inherit</option>
						<option value="v1" <?php if( strcmp($datas['header_style'],'v1') == 0 ) echo "selected";?>>Style 1</option>						
					</select>
				</p> 
			</li>
			
			<li>
				<p>
					<label><?php esc_html_e('Page Layout','wpgeneral');?> : </label>
					<select name="page_column" class="global_config" id="page_column" data-config=".layout_">
						<option value="0-1-0" <?php if( strcmp($datas['page_column'],'0-1-0') == 0 ) echo "selected";?>>Fullwidth</option>
						<option value="1-1-0" <?php if( strcmp($datas['page_column'],'1-1-0') == 0 ) echo "selected";?>>Left Sidebar</option>
						<option value="0-1-1" <?php if( strcmp($datas['page_column'],'0-1-1') == 0 ) echo "selected";?>>Right Sidebar</option>
						<option value="1-1-1" <?php if( strcmp($datas['page_column'],'1-1-1') == 0 ) echo "selected";?>>Left & Right Sidebar</option>
					</select>
				</p> 
			</li>

			<li class="global_sub layout_sub layout_1-1-0 layout_1-1-1" style="display:none">
				<p>
					<label><?php esc_html_e('Left Sidebar','wpgeneral');?> : </label>
					<select name="left_sidebar" id="_left_sidebar">
						<?php
							 $tvlgiao_wpdance_default_sidebars = tvlgiao_wpdance_load_global_var_default_sidebars();
							foreach( $tvlgiao_wpdance_default_sidebars as $key => $_sidebar ){
								$_selected_str = ( strcmp($datas["left_sidebar"],$_sidebar['id']) == 0 ) ? "selected='selected'"  : "";
								echo "<option value='{$_sidebar['id']}' {$_selected_str}>{$_sidebar['name']}</option>";
							}
						?>
					</select>
				</p> 
			</li>
			<li class="global_sub layout_sub layout_0-1-1 layout_1-1-1" style="display:none">
				<p>
					<label><?php esc_html_e('Right Sidebar','wpgeneral');?> : </label>
					<select name="right_sidebar" id="_right_sidebar">
						<?php
							 $tvlgiao_wpdance_default_sidebars = tvlgiao_wpdance_load_global_var_default_sidebars();
							foreach( $tvlgiao_wpdance_default_sidebars as $key => $_sidebar ){
								$_selected_str = ( strcmp($datas["right_sidebar"],$_sidebar['id']) == 0 ) ? "selected='selected'"  : "";
								echo "<option value='{$_sidebar['id']}' {$_selected_str}>{$_sidebar['name']}</option>";
							}
						?>
					</select>
				</p> 
			</li>			
			
			<li>
				<p>
					<label><?php esc_html_e('Toggle Vertical Menu','wpgeneral');?> : </label>
					<select name="toggle_vertical_menu" id="_toggle_vertical_menu">
						<option value="0" <?php if( absint($datas['toggle_vertical_menu']) == 0 ) echo "selected";?>>No</option>
						<option value="1" <?php if( absint($datas['toggle_vertical_menu']) == 1 ) echo "selected";?>>Yes</option>
					</select>
				</p> 			
			</li>
			
			<li>
				<p>
					<label><?php esc_html_e('Hide Breadcrumb','wpgeneral');?> : </label>
					<select name="hide_breadcrumb" id="_hide_breadcrumb">
						<option value="0" <?php if( absint($datas['hide_breadcrumb']) == 0 ) echo "selected";?>>No</option>
						<option value="1" <?php if( absint($datas['hide_breadcrumb']) == 1 ) echo "selected";?>>Yes</option>
					</select>
				</p> 			
			</li>
			<li>
				<p>
					<label><?php esc_html_e('Hide Page Title','wpgeneral');?> : </label>
					<select name="hide_title" id="_hide_title">
						<option value="0" <?php if( absint($datas['hide_title']) == 0 ) echo "selected";?>>No</option>
						<option value="1" <?php if( absint($datas['hide_title']) == 1 ) echo "selected";?>>Yes</option>
					</select>
				</p> 			
			</li>
			<li class="last">
				<p>
					<label><?php esc_html_e('Hide Top Content Widget Area','wpgeneral');?> : </label>
					<select name="hide_top_content" id="_hide_top_content">
						<option value="0" <?php if( absint($datas['hide_top_content']) == 0 ) echo "selected";?>>No</option>
						<option value="1" <?php if( absint($datas['hide_top_content']) == 1 ) echo "selected";?>>Yes</option>
					</select>
				</p> 			
			</li>
			
			<li>
				<p>
					<label><?php esc_html_e('Page Slider','wpgeneral');?> : </label>
					<select name="page_slider" id="page_slider" class="global_config" data-config=".slider_">
						<option value="none" <?php if( strcmp($datas['page_slider'],'none') == 0 ) echo "selected";?>>No Slider</option>
						<?php if( $revolution_exists ):?>
						<option value="revolution" <?php if( strcmp($datas['page_slider'],'revolution') == 0 ) echo "selected";?>>Revolution Slider</option>
						<?php endif; ?>
						<?php if( $layerslider_exists):?>
						<option value="layerslider" <?php if( strcmp($datas['page_slider'],'layerslider') == 0 ) echo "selected";?>>Layer Slider</option>
						<?php endif; ?>
					</select>
				</p> 			
			</li>
			
			<li class="global_sub slider_sub slider_revolution slider_layerslider slider_flex slider_nivo" style="display:none">
				<p>
					<label><?php esc_html_e('Page Slider position','wpgeneral');?> : </label>
					<select name="page_slider_pos" id="page_slider_pos">
						<option value="after_header" <?php if( strcmp($datas['page_slider_pos'],'after_header') == 0 ) echo "selected";?>>After header</option>
						<option value="before_header" <?php if( strcmp($datas['page_slider_pos'],'before_header') == 0 ) echo "selected";?>>Before header</option>
					</select>
				</p> 			
			</li>
			
			<?php if( $revolution_exists ): ?>
			<li class="global_sub slider_sub slider_revolution" style="display:none">
				<p>
					<label><?php esc_html_e('Revolution Slider','wpgeneral');?> : </label>
					<?php
						$slider = new RevSlider();
						$arrSliders = $slider->getArrSlidersShort();
						$sliderID = $datas['page_revolution'];
						if(count($arrSliders) > 0):
					?>
					<?php echo $select = UniteFunctionsRev::getHTMLSelect($arrSliders,$sliderID,'name="page_revolution" id="page_revolution_id"',true); ?>					
					<?php 
						else:
							echo '<strong>'. esc_html_e( 'Please Create A Revolution Slider.', 'wpgeneral' ). '</strong>';
						endif;
					?>
				</p> 			
			</li>
			<?php endif;?>
		</ul>
	</div>
</div>
