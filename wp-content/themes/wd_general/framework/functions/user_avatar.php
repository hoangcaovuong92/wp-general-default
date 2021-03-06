<?php 

function tvlgiao_wpdance_wd_custom_avatar_field( $user ) { ?>
	<h3><?php esc_html__( 'Custom Avatar', 'wpgeneral' ) ?></h3>
	 
	<table class="form-table">
		<tbody>
			<tr class="wd-user-avatar-wrap">
				<th><label for="user_avartar"><?php esc_html__( 'Custom atatar URL:', 'wpgeneral' ) ?></label></th>
				<td>
					<input type="hidden" class="user_avartar" name="user_avartar" value="" />
					<img src="" alt="" class="wd-image-preview" width="100px" height="100px" style="display: block; margin-bottom: 10px;" />
					<a href="#" class="wd-upload-avatar button button-secondary"><?php esc_html__( 'Select Image', 'wpgeneral' ) ?></a>
					<a href="#" class="wd-clear-avatar button button-delete"><?php esc_html__( 'Clear Image', 'wpgeneral' ) ?></a>
				</td>
			</tr>
		</tbody>
	</table>
	
	<?php 
}


add_action( 'show_user_profile', 'tvlgiao_wpdance_wd_custom_avatar_field' );
add_action( 'edit_user_profile', 'tvlgiao_wpdance_wd_custom_avatar_field' );

add_action('admin_enqueue_scripts', 'tvlgiao_wpdance_init_admin_script');

function tvlgiao_wpdance_init_admin_script(){
	wp_enqueue_script('jquery');
		
	if( !did_action('wp_enqueue_media') )
		wp_enqueue_media();
		
	wp_register_script('tvlgiao-wpdance-wdsi_admin_media_lib', TVLGiao_Wpdance_THEME_JS . '/admin-user-avatar-media-lib.js', 'jquery', false,false);
	wp_enqueue_script('tvlgiao-wpdance-wdsi_admin_media_lib');
		
}


?>