<?php	
	 $wd_custom_size;
	$_default_size = array(
							array(1200,450)
							,array(960,350)
							,array(190,122)
						);
	$wd_custom_size = get_option(TVLGiao_Wpdance_THEME_SLUG.'custom_size','');
	if( strlen($wd_custom_size) > 0 ){
		$wd_custom_size = unserialize($wd_custom_size);
	}else{
		$wd_custom_size = $_default_size ;
	}
if (!function_exists('tvlgiao_wpdance_datas_config'))
{	
	function tvlgiao_wpdance_datas_config($data = array()){
		$data = $data['data'];
		if($data && isset($data['wd_menu_num_widget'])){
			$tvlgiao_wpdance_mega_menu_config_arr = array(
				'area_number' => $data['wd_menu_num_widget']
			);
			update_option(TVLGiao_Wpdance_THEME_SLUG.'wd_mega_menu_config',serialize($tvlgiao_wpdance_mega_menu_config_arr));
		}
	}
}	
	add_action('of_save_options_after','tvlgiao_wpdance_datas_config',20);
?>