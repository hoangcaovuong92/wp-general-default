<?php
	include_once (get_template_directory().'/framework/functions/wdmenus-init.php');
	include_once (get_template_directory().'/framework/functions/wdmenus-admin.php');

/*########################################Custom Frontend########################################*/
/*
 * Walker for the Front End UberMenu
 */
class WD_Walker_Nav_Menu extends Walker_Nav_Menu{
	
	public $lv1_order;
	public $lv2_order;
	public $lv0_subcount;
	public $lv1_subcount;
	public $lv0_desc;
	public $lv1_desc;
	public $parent_mega_enable;
	public $parent_widecolumn;
	public $parent_sidebar;
	public $parent_sidebar_str;
	//public $parent_static_html;
	//public $parent_static_html_str;
	public $menu_config;
	public $parent_fullwidth;
	public $sum_column_count;
	
	public $more_menu;
	
	function __construct() {
		//parent dunt have contruct method
		//parent::__construct();
		$wd_mega_menu_config = get_option(TVLGiao_Wpdance_THEME_SLUG.'wd_mega_menu_config','');
		$tvlgiao_wpdance_mega_menu_config_arr = unserialize($wd_mega_menu_config);
		if( is_array($tvlgiao_wpdance_mega_menu_config_arr) && count($tvlgiao_wpdance_mega_menu_config_arr) > 0 ){
			if ( !array_key_exists('area_number', $tvlgiao_wpdance_mega_menu_config_arr) ) {
				$tvlgiao_wpdance_mega_menu_config_arr['area_number'] = 1;
			}
			
			if ( !array_key_exists('menu_text', $tvlgiao_wpdance_mega_menu_config_arr) ) {
				$tvlgiao_wpdance_mega_menu_config_arr['menu_text'] = 'Menu';
			}	
			if ( !array_key_exists('disabled_on_phone', $tvlgiao_wpdance_mega_menu_config_arr) ) {
				$tvlgiao_wpdance_mega_menu_config_arr['disabled_on_phone'] = 0;
			}			
		}else{
			$tvlgiao_wpdance_mega_menu_config_arr = array(
				'area_number' 			=> 110
				/*,'thumbnail_width' 		=> 16
				,'thumbnail_height' 	=> 16*/
				,'menu_text' 			=> 'Menu'
				,'disabled_on_phone' 	=> 0
			);
		}
		$this->menu_config = $tvlgiao_wpdance_mega_menu_config_arr;
		$this->more_menu = false;
		
    }	

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$wide_style = (int) get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_wide_style', true );
		$wide_column = (int) get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_wide_column', true );
		$sub_column = (int) get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_sub_column', true );
		$wide_thumbnail = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_thumbnail', true );		
		$wide_thumbnail_id = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_thumbnail_id', true );
		
		$wd_icon = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_icon', true );		
		$wd_icon_id = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_icon_id', true );
		$wd_more_hiden = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_more_hiden', true );	
		
		$side_bar = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_sidebars', true );
		$align_right = (int) get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_align_right', true );
		//$static_html = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_static_html', true );
		//$static_html = stripslashes(htmlspecialchars_decode( base64_decode($static_html) ));
		$sup_label = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_sup_label', true );
		$sup_label_background_color = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_sup_label_background_color', true );
		
		$click_icon_html = $prepend = $append = $inline_style = $_desc_sub_class = $sup_label_html = '';
		
		if( $item->menu_order == 1 ){
			$output .= $indent . '<li class="menu-item-0 menu-item-level-0 menu-dropdown" id="wd-menu-item-dropdown" style="display:none;"><span class="menu-text">'.stripslashes(esc_attr($this->menu_config['menu_text'])).'</span><span class="menu-icon"></span></li>';
			
		}
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'menu-item-level' . $depth;
		if( $item->menu_order == 1 ){
			$classes[] = 'first';
		}
		
		if( (int) $item->sub_count > 0 ){
			$classes[] = "have-child";
		}

		if($depth < 3){
			/************************ ADD CLASSES FOR WDMENU ************************/
			if($depth == 0 ){
				$this->parent_fullwidth = false;
				$this->sum_column_count = 0 ;
				if($wide_style == 1){
					$this->parent_mega_enable = true ;
					$this->parent_widecolumn = $wide_column ;
					$classes[] = "wd-mega-menu";
					$classes[] = "columns-{$wide_column}";
					if( $wide_column == 0 ){
						$classes[] = "fullwidth-menu";
						$this->parent_fullwidth = true;
					}
					if( $align_right == 1 ){
						$classes[] = "align-right";
					}
					$this->lv1_order = 0;
					
					if(strlen($side_bar) > 0){
						$number_widget =  tvlgiao_wpdance_wd_mega_sidebar_count($side_bar);
						$classes[] = "wd-mega-menu-sidebar sidebar-column-{$number_widget}";
						$this->parent_sidebar = true ;
					}else{
						$this->parent_sidebar = false ;
					}
					
					/*if( strlen($static_html) > 0 ){
						$this->parent_static_html = true;
					}
					else{
						$this->parent_static_html = false;
					}*/
				}else{
					$this->parent_mega_enable = false ;
				}
				
				$this->lv0_subcount = (int) $item->sub_count;

			}
			
			if( absint($this->menu_config['disabled_on_phone']) == 1 && wp_is_mobile() && WD_IS_MOBILE === true ){
				$this->parent_mega_enable = false ;
			}
			
			//if( strlen($item->description) > 0 && $this->parent_mega_enable == true ){
			if( strlen($item->description) > 0 ){
				if(	absint($this->menu_config['disabled_on_phone']) == 1 && WD_IS_MOBILE === true ){
					$_desc_sub_class = "hidden-phone";
				}
				$append = "{$indent}\t\t<span class=\"menu-desc-lv{$depth} {$_desc_sub_class}\">". esc_attr($item->description) ."</span>";
			}
			if( (int) $item->sub_count > 0 || ( $this->parent_mega_enable == true && strlen($side_bar) > 0 ) ){
				$click_icon_html = "{$indent}\t\t<span class=\"menu-drop-icon drop-icon-lv{$depth}\"></span>";
				//$click_icon_html = "{$indent}\t\t<span class=\"visible-xs menu-drop-icon drop-icon-lv{$depth}\"></span>";
				//$click_icon_html .= "{$indent}\t\t<span class=\"menu-close-icon close-icon-lv{$depth}\">X</span>";
			}	

			if( strlen($sup_label) > 0 ){
				$style_inline = '';
				if( strlen($sup_label_background_color) > 0 ){
					$style_inline = 'style="background-color: '.$sup_label_background_color.'"';
				}
				else{
					$style_inline = 'style="background-color: transparent"';
				}
				$sup_label_html = "{$indent}\t\t<span class=\"menu-sup-label\" {$style_inline}>{$sup_label}</span>";
			}
			
			
			if($depth == 1 && $this->parent_mega_enable){
				if( $this->parent_fullwidth == true && $sub_column > 0){
					$classes[] = "span{$sub_column}";
					$this->sum_column_count = $this->sum_column_count + $sub_column;
				}
				$this->lv1_subcount = (int) $item->sub_count;
				$this->lv2_order = 0;
				$this->lv1_order = $this->lv1_order + 1; 
				
				
				if(strlen($side_bar) > 0){
					$number_widget =  tvlgiao_wpdance_wd_mega_sidebar_count($side_bar);
					$classes[] = "wd-mega-menu-sidebar sidebar-column-{$number_widget}";
				}
				
			}

			if($depth == 2 && $this->parent_mega_enable){
				$this->lv2_order = $this->lv2_order + 1; 
			}		

			if( !$this->parent_mega_enable ){
				$classes[] = "wd-fly-menu";
			}	
			/************************ END ADD CLASSES FOR WDMENU ************************/
			
			/************************ ADD THUMB FOR WDMENU ************************/
			if( (int)$wide_thumbnail_id > 0 && $depth < 3){
				/*$thumb_html = wp_get_attachment_image( $wide_thumbnail_id, 'wd_menu_thumb',false,array(
					'class'	=> "icon_menu",
					'alt'   => trim(strip_tags( get_post_meta($wide_thumbnail_id, '_wp_attachment_image_alt', true) )),
				));*/
				$thumb_url = wp_get_attachment_image( $wide_thumbnail_id, 'full',false);
				$thumb_url = $thumb_url[0];
			}else{
				/*$thumb_html = '';*/
				$thumb_url = "#";
			}
			/************************ END ADD THUMB FOR WDMENU ************************/
		
		}
		$li_style = '';
		if( absint($wd_more_hiden) > 0 ) {
			$classes[] = 'wd_varical_menu_hide';
			$this->more_menu = true;
			
			$li_style = ' style="display:none;"';
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_style .'>';
		if( absint($wd_icon_id) > 0 ) {
			$output .= "<div class=\"wd_verti_icon_img\">" . wp_get_attachment_image( $wd_icon_id, 'wd_menu_icon' ) . "</div><!--.wd_verti_icon_img-->";
		}
				
		
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}		
		
		if( is_object($args) && isset($args->before) ){
			$item_output = $args->before;
		}else{
			$item_output = '';
		}
		
		$item_output .= "\n{$indent}\t<a". $attributes .'>';
		
		if( !isset($item->title) || strlen($item->title) <= 0 ){
			$item->title = $item->post_title;
		}

		/****************** ADD ON HTML **************/
		$title = "\n{$indent}\t\t<span {$inline_style}  class='menu-label-level-{$depth}'>" . apply_filters( 'the_title', $item->title, $item->ID ) . "</span>\n";
		//$item_output.= $thumb_html ;
		
		if( is_object($args) && isset($args->link_before) && isset($args->link_after) ){
			
			$item_output.= $args->link_before . $prepend . $title . $append . $args->link_after ;
		}else{
			$item_output.=  $prepend . $title . $append  ;
		}
	    		
		
		/****************** END ADD ON HTML **************/
		
		$item_output .= "{$indent}\t</a>";
		$item_output .= "{$indent}\t{$sup_label_html}";
		$item_output .= "{$indent}\t{$click_icon_html}";
		
		if( is_object($args) && isset($args->after) ){
			$item_output .= $args->after;
		}
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}	
	
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		
		/**
			thu tu in nhu sau
			in child truoc ( neu co )
			in side bar ( neu co )
			in description cuoi cung ( neu co )
		
		**/
		//neu enable mega thi lam
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		if( $this->parent_mega_enable == true ){
			$parent_id = $item->menu_item_parent;
			$side_bar = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_sidebars', true );
			$parent_side_bar = get_post_meta( $parent_id, WD_MEGA_MENU.'_menu_item_sidebars', true );			
			$wide_thumbnail_id = get_post_meta( $item->ID, WD_MEGA_MENU.'_menu_item_thumbnail_id', true );	
			
			if( $depth == 1 && strlen($side_bar) > 0 && $this->lv1_subcount == 0 ){			
				$sidebar_str = '';
				$sidebar_str .= "{$indent}<li class=\"sidebar-" . ($depth-1). "\">\n" ;
				$class.= ' wpmega-widgetarea ss-colgroup-'.tvlgiao_wpdance_wd_mega_sidebar_count($side_bar);	
				$gooeyCenter = wd_mega_sidebar($side_bar);
				$sidebar_str .= '<div class="'.$class.'">';
				$sidebar_str .= $gooeyCenter;
				$sidebar_str .= '<div class="clear"></div>';	
				$sidebar_str .= '</div>';
				$sidebar_str .=  "{$indent}</li>\n";
				
				if($thumb_url !=='') {
					$style = 'style="background-image: url('.$thumb_url.'); background-position: top left;"';
				} else {$style = "";}
				
				$output .= "{$indent}<ul class=\"sub-menu\" ".$style.">\n";
				$output .= $sidebar_str;
				$output .= "{$indent}</ul>\n";
				$output .= "{$indent}\t";
			}			
			
			//co sidebar o lv 0 hoac 1
			if( $depth < 3 && $depth > 0  && ( strlen($parent_side_bar) > 0 /*|| strlen($parent_static_html) > 0*/ ) ){
				// neu co desc,in luon desc tiep theo,vi desc luon in cuoi cung
				if( strlen($parent_side_bar) > 0 ){
					if ( $this->lv0_subcount == $this->lv1_order && $depth == 1){
						$class = 'wpmega-nonlink';
						$class.= ' wpmega-widgetarea ss-colgroup-'.tvlgiao_wpdance_wd_mega_sidebar_count($parent_side_bar);	
						$this->parent_sidebar_str = '';
						$gooeyCenter = wd_mega_sidebar($parent_side_bar);
						$this->parent_sidebar_str .= '<div class="'.$class.'">';
						$this->parent_sidebar_str .= $gooeyCenter;
						$this->parent_sidebar_str .= '<div class="clear"></div>';	
						$this->parent_sidebar_str .= '</div>';

						$output .= "{$indent}</li>\n";
						$output .= "{$indent}<li class='mega-new-line'></li>\n";
						//$output .= "{$indent}<li class=\"sidebar-menu sidebar-" . ($depth). "\">\n" . $this->parent_sidebar_str . "{$indent}</li>\n"; 
						$output .= "{$indent}<li class=\"sidebar-menu sidebar-" . ($depth). "\">\n" . $this->parent_sidebar_str . "{$indent}\n"; 
						$output .= "{$indent}\t";
						
						$this->parent_sidebar_str = '';
					}			

					if ( $this->lv1_subcount == $this->lv2_order && $depth == 2){
						$class = 'wpmega-nonlink';
						$class.= ' wpmega-widgetarea ss-colgroup-'.tvlgiao_wpdance_wd_mega_sidebar_count($parent_side_bar);	
						$this->parent_sidebar_str = '';
						$gooeyCenter = wd_mega_sidebar($parent_side_bar);
						$this->parent_sidebar_str .= '<div class="'.$class.'">';
						$this->parent_sidebar_str .= $gooeyCenter;
						$this->parent_sidebar_str .= '<div class="clear"></div>';	
						$this->parent_sidebar_str .= '</div>';

						$output .= "{$indent}</li>\n";
						$output .= "{$indent}<li class='mega-new-line'></li>\n";
						//$output .= "{$indent}<li class=\"sidebar-menu sidebar-" . ($depth). "\">\n" . $this->parent_sidebar_str . "{$indent}</li>\n"; 
						$output .= "{$indent}<li class=\"sidebar-menu sidebar-" . ($depth). "\">\n" . $this->parent_sidebar_str . "{$indent}\n"; 
						$output .= "{$indent}\t";
						$this->parent_sidebar_str = '';
					}
				}									

			}			
		

			
			if( ( $this->parent_widecolumn != 0 && ($this->lv1_order % $this->parent_widecolumn) == 0 ) && 
					$this->lv1_order != $this->lv0_subcount && $depth == 1 && $this->lv0_subcount > 0 ){
				$output .= "{$indent}</li>\n";
				$output .= "{$indent}<li class='mega-new-line'>";
			}
	
			if( $this->parent_widecolumn == 0 && $this->sum_column_count >= 12 && $depth == 1 && $this->lv0_subcount > 0 ){
				$this->sum_column_count = 0;
				$output .= "{$indent}</li>\n";
				$output .= "{$indent}<li class='mega-new-line'>";
			}
	

			
			if( $depth == 0 && $this->lv0_subcount == 0 ){
				if( (int)$wide_thumbnail_id > 0 ){
					$thumb_url = wp_get_attachment_image_src( $wide_thumbnail_id, 'full',false);
					$thumb_url = $thumb_url[0];
				}else{
					$thumb_url = "";
				}
				if( $this->parent_sidebar == true /*|| $this->parent_static_html == true*/ ){
					if($thumb_url !=='') {
						$style = 'style="background-image: url('.$thumb_url.'); background-position: left top;"';
					} else {$style = "";}
					$output .= "{$indent}<ul class=\"sub-menu\" ".$style.">\n";
					if( $this->parent_sidebar == true ){
						$class = 'wpmega-nonlink';
						$class.= ' wpmega-widgetarea ss-colgroup-'.tvlgiao_wpdance_wd_mega_sidebar_count($side_bar);	
						$sidebar_str = '';
						$gooeyCenter = wd_mega_sidebar($side_bar);
						$sidebar_str .= '<div class="'.$class.'">';
						$sidebar_str .= $gooeyCenter;
						$sidebar_str .= '<div class="clear"></div>';	
						$sidebar_str .= '</div>';
						$output .= "{$indent}<li class=\"sidebar-menu sidebar-" . ($depth). "\">\n" . $sidebar_str . "{$indent}</li>\n"; 
					}										

					$output .= "{$indent}</ul>\n";
					$output .= "{$indent}\t";
				}

			}

		
		}
		$output .= "\n{$indent}</li>\n";
		
		global $tvlgiao_wpdance_wd_data;
		if( $item->menu_order == $item->item_count){
			if( $this->more_menu ) {
				$output .= $indent . '<li class="menu-item wd-more-menu"><a href="javascript:void(0);"><span class="menu-label-level-0">' . esc_html__( 'More ', 'wpgeneral' ) . $tvlgiao_wpdance_wd_data['wd_vertical_menu_heading'] . '</span></a></li>';
			}
		}
		
	}
}



 

?>