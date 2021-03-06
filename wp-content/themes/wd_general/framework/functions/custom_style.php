<?php
	add_action('of_save_options_after','tvlgiao_wpdance_save_custom_style',10000);
	add_action('wp_enqueue_scripts', 'tvlgiao_wpdance_custom_style_inline_script');
if(!function_exists ('tvlgiao_wpdance_save_custom_style')){
	function tvlgiao_wpdance_save_custom_style( $data = array() ){
		//wrong input type
		if( !is_array($data) ){
			return -1;
		}
		$check_custom = 0;
		$cache_file = TVLGiao_Wpdance_THEME_CACHE.'custom.css';	
		$data_style = $data['data'];
		//print_r($data_style);		
		try{	
			$faces = array('arial'=>'Arial',
				'verdana'=>'Verdana, Geneva',
				'trebuchet'=>'Trebuchet',
				'georgia' =>'Georgia',
				'times'=>'Times New Roman',
				'tahoma'=>'Tahoma, Geneva',
				'palatino'=>'Palatino',
				'helvetica'=>'Helvetica',
				'helvetica-neue'=>'Helvetica Neue' );
			ob_start();
			//font
			if (file_exists(TVLGiao_Wpdance_THEME_DIR."/config_xml/font_config.xml")) {	
				$objXML = simplexml_load_file(TVLGiao_Wpdance_THEME_DIR."/config_xml/font_config.xml");
				foreach ($objXML->children() as $child) {	//items
					$name =  $child->name;
					$slug =  $child->slug; 
					$type =  $child->type; 
					$std =  $child->std; 
					$selector =  $child->selector;
					
					
					if (isset($data_style["wd_".$slug."_googlefont_enable"])) {
						$font_name = $data_style["wd_".$slug."_googlefont_enable"] == 1 ? esc_attr( $data_style["wd_".$slug."_family"] ) : esc_attr( $data_style["wd_".$slug."_googlefont"] );
															
					if($data_style["wd_".$slug."_googlefont_enable"] == 1 && strlen($font_name) > 0){
						$font_name = str_replace(' ','-',$font_name);
						$font_name = $faces[$font_name];
					}
					if((strtolower($font_name) != strtolower($std)) || ($data_style["wd_".$slug."_googlefont_enable"] == 0 && $type == "family_font") || ($data_style["wd_".$slug."_googlefont_enable"] == 1 && $type == "google_font")){
						
						echo $selector.'{';
						echo 'font-family: "' . $font_name . '";';
						echo '}'."\n";	
						$check_custom = 1;
					}
				  }
				}
			}
			
			$xml_file = isset($data_style["wd_color_scheme"]) && strlen(trim($data_style["wd_color_scheme"])) > 0 ? $data_style["wd_color_scheme"] : 'color_default';
			//color
			if (file_exists(TVLGiao_Wpdance_THEME_DIR."/config_xml/".$xml_file.".xml")) {	
				$objXML_color = simplexml_load_file(TVLGiao_Wpdance_THEME_DIR."/config_xml/".$xml_file.".xml");
				foreach ($objXML_color->children() as $child) {	 //items_setting => general
					$group_name = (string)$child->text;						//text
					foreach ($child->items->children() as $childofchild) { //items => item
					
						$name =  (string)$childofchild->name;				//name
						$slug =  (string)$childofchild->slug; 				//slug
						$std =  (string)$childofchild->std; 				//std
						$important =  (isset($childofchild->important) &&  (int)$childofchild->important == 1) ? '!important' : '';
						
						$css = '';
						if($childofchild->getName()=='background_item'){
							if (isset($data_style["wd_".$slug.'_image'])) {
								if($data_style["wd_".$slug.'_image']){
									$data_style = apply_filters('of_options_after_load', $data_style);
									$css .= 'background-image: url("'.esc_url($data_style["wd_".$slug.'_image']).'")'.$important.';'; 
								}
								if($data_style["wd_".$slug.'_repeat'] && $data_style["wd_".$slug.'_repeat'] != "repeat"){
									$css .= 'background-repeat: '.$data_style["wd_".$slug.'_repeat'].$important.';' ;
								}
								if($data_style["wd_".$slug.'_position'] && $data_style["wd_".$slug.'_position'] != "left top"){
									$css .=  'background-position: '.$data_style["wd_".$slug.'_position'].$important.';';
								}
							}
						}
						if(isset($data_style["wd_".$slug])){
						if($xml_file != 'color_default' || $data_style["wd_".$slug] != $std || ( ($childofchild->getName()=='background_item') && strlen(trim($css)) >0 )){
							$frontend =  $childofchild->frontend;	//frontend
						if(isset($data_style["wd_".$slug])){
							foreach ($frontend->children() as $childoffrontend) {	//frondend => f*
								$attr = $childoffrontend->attribute;
								$selector = $childoffrontend->selector;
									echo $selector.'{';
									if($xml_file != 'color_default' || $data_style["wd_".$slug] != $std){
										echo $attr.': '.$data_style["wd_".$slug].$important.';';
									}
									echo $css;
									echo '}'."\n";
									$check_custom = 1;
							}
						  }							
						}
					  }
					}
				}	
			}
			if(isset($data_style["wd_custom_css"])){
				if($data_style["wd_custom_css"] && strlen(trim($data_style["wd_custom_css"])) > 0){
					echo $data_style["wd_custom_css"];
					$check_custom = 1;
				}
			}			
			?>
			<?php 
			$upload_dir = wp_upload_dir();
			//$filename = trailingslashit($upload_dir['basedir']) .''.THEME_SLUG.'theme/custom.css';	
			$filename = TVLGiao_Wpdance_THEME_CACHE.'custom.css';
			//$filename_dir = THEME_URI.'/cache_theme/custom.css';			
			global $wp_filesystem;
			if( empty( $wp_filesystem ) ) {
				require_once( ABSPATH .'/wp-admin/includes/file.php' );
				WP_Filesystem();
			}
			if( $wp_filesystem ) {
				$wp_filesystem->put_contents(
					$filename,
					ob_get_contents(),
					FS_CHMOD_FILE // predefined mode settings for WP files
				);
			}else{
				define('TVLGiao_Wpdance_USING_CSS_CACHE', false);
			}
			update_option(TVLGiao_Wpdance_THEME_SLUG.'custom_style', ob_get_contents());
			update_option(TVLGiao_Wpdance_THEME_SLUG.'custom_check', $check_custom);
			update_option(TVLGiao_Wpdance_THEME_SLUG.'color_select', $xml_file);	
			ob_end_clean();
			
			return TVLGiao_Wpdance_USING_CSS_CACHE == true ? 1 : 0;
		}catch(Excetion $e){
			return -1;
		}
	}
}	
if(!function_exists ('tvlgiao_wpdance_wd_load_gg_fonts')){	
	function tvlgiao_wpdance_wd_load_gg_fonts() {
		global $tvlgiao_wpdance_font_name,$tvlgiao_wpdance_font_size;	
		$font_size_str = "";
		if( isset($tvlgiao_wpdance_font_size) && strlen($tvlgiao_wpdance_font_size) > 0 ){
			$font_size_str = ":{$tvlgiao_wpdance_font_size}";
		}
		if( isset($tvlgiao_wpdance_font_name) && strlen( $tvlgiao_wpdance_font_name ) > 0 ){
			$font_name_id = strtolower($tvlgiao_wpdance_font_name);
			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( "goodly-{$font_name_id}", "{$protocol}://fonts.googleapis.com/css?family={$tvlgiao_wpdance_font_name}{$font_size_str}" );		
		}
	}		
}		
if(!function_exists ('tvlgiao_wpdance_custom_style_inline_script')){	
	function tvlgiao_wpdance_custom_style_inline_script(){
		global $tvlgiao_wpdance_wd_data;
		$check_custom = get_option(TVLGiao_Wpdance_THEME_SLUG.'custom_check');
		if($check_custom == 0) { return; }
		global $tvlgiao_wpdance_font_name,$tvlgiao_wpdance_font_size;	
		
		//font
		if (file_exists(TVLGiao_Wpdance_THEME_DIR."/config_xml/font_config.xml")) {	
			$objXML = simplexml_load_file(TVLGiao_Wpdance_THEME_DIR."/config_xml/font_config.xml");
			foreach ($objXML->children() as $child) {	//items
				$name =  $child->name;
				$slug =  $child->slug; 
				$type =  $child->type; 
				$std =  $child->std; 
				$selector =  $child->selector;
				
				$font_name =  esc_attr( $tvlgiao_wpdance_wd_data["wd_".$slug."_googlefont"] );
				$font_name  = str_replace( " ", "+", $font_name );

				if( $tvlgiao_wpdance_wd_data["wd_".$slug."_googlefont_enable"] == 0 && strcmp($font_name,'none') != 0 ){
						$tvlgiao_wpdance_font_name = trim( $font_name );
						//$tvlgiao_wpdance_font_size = trim( $font_weight );
						tvlgiao_wpdance_wd_load_gg_fonts();
				}

			}
		}
		if( TVLGiao_Wpdance_USING_CSS_CACHE == false ){
			echo '<style type="text/css">';
			echo get_option(TVLGiao_Wpdance_THEME_SLUG.'custom_style', '');
			echo '</style>';
		}		
	}
}		
			
if(!function_exists ('tvlgiao_wpdance_include_cache_css')){		
	function tvlgiao_wpdance_include_cache_css(){
		 global $tvlgiao_wpdance_wd_data;
		$check_custom = get_option(TVLGiao_Wpdance_THEME_SLUG.'custom_check');
		
		$upload_dir = wp_upload_dir();
		//$filename = trailingslashit($upload_dir['baseurl']) .THEME_SLUG.'theme/custom.css';
		//$filename_dir = trailingslashit($upload_dir['basedir']) .''.THEME_SLUG.'theme/custom.css';
		$filename_dir = TVLGiao_Wpdance_THEME_CACHE.'custom.css';
		$filename = TVLGiao_Wpdance_THEME_URI.'/cache_theme/custom.css';
		global $wp_filesystem;
		if( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		if ($check_custom == 1 && $wp_filesystem) {
			if($wp_filesystem->exists($filename_dir) ){
				$file_status = $wp_filesystem->get_contents( $filename_dir );
				if( trim( $file_status )) { 	
					wp_register_style( 'tvlgiao-wpdance-custom-style',$filename );
					wp_enqueue_style('tvlgiao-wpdance-custom-style');
				}
			}
		}
		
	}
}
	if( TVLGiao_Wpdance_USING_CSS_CACHE == true ){
		add_action('wp_enqueue_scripts','tvlgiao_wpdance_include_cache_css',10000000000000);
	}	
?>