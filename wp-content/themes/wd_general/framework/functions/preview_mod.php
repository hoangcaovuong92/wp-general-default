<?php


$tvlgiao_wpdance_custom_style_config = get_option(TVLGiao_Wpdance_THEME_SLUG.'custom_style_config','');
$tvlgiao_wpdance_custom_style_config = unserialize($tvlgiao_wpdance_custom_style_config);
if( !is_array($tvlgiao_wpdance_custom_style_config) ){
    $tvlgiao_wpdance_custom_style_config = array();
}


add_action('wp_ajax_nopriv_wd_ajax_save_style', 'tvlgiao_wpdance_ajax_save_style');
add_action('wp_ajax_wd_ajax_save_style', 'tvlgiao_wpdance_ajax_save_style');

function tvlgiao_wpdance_ajax_save_style(){
    if(	! is_user_logged_in() ){
        die('You do not have sufficient permissions to do this action.');
    }else{
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( esc_html__( 'You do not have sufficient permissions to do this action.','wpgeneral' ) );
        }else{
            //TODO : check nonce & do font save
            if ( empty($_POST) || !wp_verify_nonce($_POST['ajax_preview'],'tvlgiao_wpdance_ajax_save_style') ){
                wp_die( esc_html__( 'Something goes wrong!Please login again','wpgeneral' ) );
            }else{
                // process form data
                global $tvlgiao_wpdance_smof_data;
                $style_datas = $tvlgiao_wpdance_smof_data;
                
                $style_datas['wd_layout_styles'] 	= strlen( $_POST['page_layout'] ) > 0 	? wp_kses_data($_POST['page_layout']) 	: $style_datas['wd_layout_styles'];

                foreach( $_POST as $_key => $_value ){
					if( array_key_exists( $_key ,$style_datas) ){
						$style_datas[$_key] = strlen( $_POST[$_key] ) > 0 	? wp_kses_data($_POST[$_key]) 	: $style_datas[$_key];
					}
                }
                of_save_options( $style_datas );
                wp_die( "1" );
            }
        }

    }

}

add_action('wp_ajax_nopriv_wd_ajax_load_custom_preview', 'tvlgiao_wpdance_wd_ajax_load_custom_preview');
add_action('wp_ajax_wd_ajax_load_custom_preview', 'tvlgiao_wpdance_wd_ajax_load_custom_preview');
function tvlgiao_wpdance_wd_ajax_load_custom_preview(){
	if( isset($_POST['custom_datas']) ){
		ob_start();
		$custom_datas = $_POST['custom_datas'];
		include get_template_directory() . '/framework/functions/custom_style.php';
		$dynamic_css = ob_get_contents();
		return $dynamic_css;
		die();
	}
	else{
		return '';
		die();
	}
}


function tvlgiao_wpdance_wd_preview_panel(){
    /***************Start font block****************/

    global $tvlgiao_wpdance_wd_data;
    $style_datas = $tvlgiao_wpdance_wd_data;
    ?>

    <div id="wd-control-panel" class="default-font hidden-phone">
        <div id="control-panel-main">
            <a id="wd-control-close" href="#"></a>
            <div class="accordion" id="review_panel_accordion">
                
				<div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#review_panel_accordion" href="#custom_color_layout">
                            <h2 class="wd-preview-heading">Home & Store</h2>
                        </a>
                    </div>
                    <div id="custom_color_layout" class="accordion-body collapse in">
                        <div class="accordion-inner">
							<?php  $_base_path = get_template_directory_uri() . '/images/custom_color/';?>
							<ul class='wd-custom-color'>
								<li><a href="http://demo2.wpdance.com/general/" title="General"><img id="custom_h1" class="wd-custom-color-image" src="<?php echo esc_url($_base_path);?>1.png" alt="custom_color h1"></a></li>								
							</ul>
							
                        </div>
                    </div>
                </div>
				
				<div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#review_panel_accordion" href="#collapse_layout">
                            <h2 class="wd-preview-heading">Layout Style</h2>
                        </a>
                    </div>
                    <div id="collapse_layout" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <select name="page_layout" id="_page_layout" class="page_layout">
                                <option value="wide" <?php if( strcmp(esc_html($style_datas['wd_layout_styles']),'wide') == 0 ) echo 'selected="selected"';?>>Wide</option>
                                <option value="boxed" <?php if( strcmp(esc_html($style_datas['wd_layout_styles']),'boxed') == 0 ) echo 'selected="selected"';?>>Box</option>
                            </select>
                        </div>
                    </div>
                </div>
				
				             
							<?php
                                    $_base_path = get_template_directory_uri() . '/images/custom_color/';
                                    echo "<ul class='wd-custom-color'>";
                                    for( $i = 1 ; $i <= 4 ; $i++ ){
                                        $temp_class = '';
										if($i==1){
											$temp_class = ' class="active"';
										}
                                        $_cur_path = $_base_path."{$i}.png";
                                        if($i==1){
											echo "<li".$temp_class."><a href='http://demo2.wpdance.com/oswadmarket'><img id='custom_{$i}' class='wd-custom-color-image' src='{$_cur_path}' title='custom_color {$i}' alt='custom_color {$i}'></a></li>";
										}
										else{
											echo "<li".$temp_class."><a href='http://demo2.wpdance.com/oswadmarket{$i}'><img id='custom_{$i}' class='wd-custom-color-image' src='{$_cur_path}' title='custom_color {$i}' alt='custom_color {$i}'></a></li>";
										}
                                    }
                                    echo "</ul>";
                                    ?>
                        </div>
                    </div>
                </div-->

                <?php global $tvlgiao_wpdance_demo_mod ;$tvlgiao_wpdance_demo_mod=1;?>
                <?php if( $tvlgiao_wpdance_demo_mod ): ?>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#review_panel_accordion" href="#collapse_textures">
                                <h2 class="wd-preview-heading">Textures</h2>
                            </a>
                        </div>
                        <div id="collapse_textures" class="accordion-body collapse ">
                            <div class="accordion-inner">
                                <hr/>
                                <div class="wd-background-wrapper">
									<h4 class="wd-preview-heading">Backgrounds Color and Background Image (Support Box Layout Only)</h4>
                                    <div class="input-append color colorpicker1 colorpicker_background_color" data-color="#f5f5f5" data-color-format="hex">
                                        <input name="background_color" id="background_color" type="text" class="span2" value="#f5f5f5" >
                                        <span class="add-on"><i style="background-color: #f5f5f5"></i></span>
                                    </div>
                                    <?php
                                    $_base_path = get_template_directory_uri() . '/images/partern/';
                                    echo "<ul class='wd-background-patten'>";
                                    for( $i = 0 ; $i <= 10 ; $i++ ){
                                        $temp_class = '';
                                        $_cur_path = $_base_path."{$i}.png";
                                        if($i==0)
                                            $temp_class = ' class="active"';
                                        echo "<li".$temp_class." style='width: 30px;'><img id='patten_{$i}' class='wd-background-patten-image' src='{$_cur_path}' title='patten {$i}' alt='patten {$i}'></li>";
                                    }
                                    echo "</ul>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
			<div class="button-control" style="display: block">
				<!--p class="button-save"><button class="btn btn-primary" data-loading-text="Saving..." id="font-save-btn" type="button">Save</button></p-->
				<p class="button-clear"><button class="btn btn-primary" data-loading-text="Clearing..." id="font-clear-btn" type="button">Clear</button></p>
			</div>
            <div id="preview-save-result" class="alert" style="display:none;">

            </div>

            <?php //TODO ?>
            <?php wp_nonce_field('tvlgiao_wpdance_ajax_save_style','preview_nonce_field'); ?>
        </div>
    </div>
    <script type="text/javascript">
    //<![CDATA[
	var _wd_site_url = '<?php echo get_option('siteurl',''); ?>';	

    function tvlgiao_wpdance_set_cookie(custom_datas){
        var json_object = JSON.stringify(custom_datas);
        var custom = [];
        if(custom_datas.length < 2883){
            jQuery.cookie("custom_datas",  JSON.stringify(custom_datas), {path: _wd_site_url});
        } else {
            var number_cookie = parseInt(json_object.length / 2800) + 1;
            for(i = 0 ; i < number_cookie; i++){
                custom[i]= {};
            }
            var j = 0;
            var flag = 2800;
            jQuery.each(custom_datas, function(key, value) {
                custom[j][key] = value;
                if(JSON.stringify(custom[j]).length > flag){
                    delete custom[j].key;
                    flag = flag * 2;
                    j++;
                    custom[j][key] = value;
                }
                //console.log('key: ' + key + '\n' + 'value: ' + value);
            });
            for(i = 0; i<custom.length;i++){
                if(i==0){
                    temp = '';
                } else {
                    temp = '_'+i;
                }
                //console.log(custom[i]);
                jQuery.cookie("custom_datas"+temp,  JSON.stringify(custom[i]), {path: _wd_site_url});
            }
        }
    }
    function tvlgiao_wpdance_get_number_cookie(custom_datas){
        var json_object = JSON.stringify(custom_datas);
        var number_cookie = parseInt(json_object.length / 2800) + 1;
        return number_cookie;
    }
    function tvlgiao_wpdance_get_from_cookie(number_cookie){
        var result = '';
        for(i = 0; i< number_cookie;i++){
            if(i==0){
                tempple = '';
            } else {
                tempple = '_' + i;
            }
            var temp = jQuery.cookie("custom_datas"+tempple);
            temp = temp.replace("{", "");
            temp = temp.replace("}", "");
            result = result + ',' + temp;
        }
        result = result.substring(1);
        result = '{' + result + '}';
        return result;
    }
    function tvlgiao_wpdance_remove_data_cookie(custom_datas){
        var number_cookie = tvlgiao_wpdance_get_number_cookie(custom_datas);
        for(i = 0; i< number_cookie;i++){
            if(i==0){
                tempple = '';
            } else {
                tempple = '_' + i;
            }
            jQuery.removeCookie("custom_datas"+tempple, {path: _wd_site_url});
        }
    }
    function tvlgiao_wpdance_set_color( selector_id,color_value ){
        jQuery(selector_id).find('input.span2').val(color_value);
        setTimeout(function(){
            jQuery(selector_id).find('i').eq(0).css('background-color',color_value);
        },1000);
    }

    jQuery(document).ready(function() {
        "use strict";
        jQuery.cookie.defaults = { path: '/', expires: 365 };
        <?php
            global $tvlgiao_wpdance_smof_data;
            $style_datas = $tvlgiao_wpdance_smof_data;
            foreach( $style_datas as $_key => $_value ){
                if(is_string($_value)){
                    //$style_datas[$_key] = strlen($_value) <= 0 ? "null" : $_value;
                }
            }
        ?>
        var custom_datas = {
        };
        var orgin_custom_datas = new Array();
        for(var key in custom_datas){
            orgin_custom_datas[key] = custom_datas[key];
        }		
        if ( jQuery.cookie("page_layout") !== undefined){
            jQuery('#_page_layout').val(jQuery.cookie("page_layout"));
            jQuery('body').removeClass('wide box').addClass(jQuery.cookie("page_layout"));
        }
        if ( jQuery.cookie("bg_image") !== undefined ){
            jQuery('ul.wd-background-patten > li.active').removeClass('active');
            var _img_id = '#'+jQuery.cookie("bg_image");
            if( jQuery(_img_id).length > 0 ){
                jQuery('body').css( "background-image",'url("' + jQuery(_img_id).attr('src') + '")' );
                jQuery('body').css( "background-repeat","repeat" );
                jQuery(_img_id).parent().addClass('active');
            }
        }
        if ( jQuery.cookie("bg_color") !== undefined ){
            tvlgiao_wpdance_set_color( '.colorpicker_background_color',jQuery.cookie("bg_color") );
            jQuery('body').css('background-color',jQuery.cookie("bg_color"));
        }
        if ( jQuery.cookie("custom_datas") !== undefined ){
            var number_cookie = tvlgiao_wpdance_get_number_cookie(custom_datas);
            custom_datas = tvlgiao_wpdance_get_from_cookie(number_cookie);
            if( typeof custom_datas == 'string' ){
                custom_datas = jQuery.parseJSON(custom_datas);
                jQuery('body').trigger('update_custom_preview');
            }
        }





        jQuery('ul.wd-background-patten > li > img.wd-background-patten-image').on('click', function(event){
            jQuery('ul.wd-background-patten > li.active').removeClass('active');
            var $_src_img = jQuery(this).attr('src');
			console.log($_src_img);
            jQuery('body').css( "background-image",'url("' + $_src_img + '")' );
            jQuery('body').css( "background-repeat","repeat" );
            jQuery.cookie("bg_image", jQuery(this).attr('id'), {path: _wd_site_url});
            jQuery(this).parent().addClass('active');
            if(jQuery(this).attr('id') == 'patten_0'){
                jQuery('.wd-background-wrapper .color').children('.add-on.default-style').hide();
                jQuery('.wd-background-wrapper .color').children('#background_color').prop('disabled', true);
            } else {
                jQuery('.wd-background-wrapper .color').children('.add-on.default-style').show();
                jQuery('.wd-background-wrapper .color').children('#background_color').prop('disabled', false);
            }
            event.preventDefault();
        });
        jQuery('#_page_layout').change(function(event){
            //less goes here
			console.log("wd-"+jQuery(this).val());
			jQuery('body #template-wrapper, body header').addClass(jQuery(this).val());
            jQuery('body #template-wrapper, body header').removeClass('wd-wide').removeClass('wd-boxed').addClass("wd-"+jQuery(this).val());
            jQuery.cookie("page_layout", jQuery(this).val(), {path: _wd_site_url});

            if( jQuery('.slideshow-wrapper').length > 0 ){
                if( jQuery(this).val() == 'wide' ){
                    jQuery('.slideshow-wrapper').removeClass('container').addClass('wide');
                    jQuery('.slideshow-sub-wrapper').removeClass('span24').addClass('wide-wrapper');
                }
                if( jQuery(this).val() == 'box' ){
                    jQuery('.slideshow-wrapper').removeClass('wide').addClass('container');
                    jQuery('.slideshow-sub-wrapper').removeClass('wide-wrapper').addClass('span24');
                    jQuery('body').css('background-color',jQuery('input#background_color').val());
                    jQuery.cookie("bg_color", jQuery('input#background_color').val(), {path: _wd_site_url});
                    //jQuery('body').css('background-color',jQuery.cookie("bg_color"));
                    //#f5f0f0

                }
                jQuery('body').trigger('resize');
            }
            else{
                if( jQuery(this).val() == 'box' ){
                    jQuery('body').css('background-color',jQuery('input#background_color').val());
                    jQuery.cookie("bg_color", jQuery('input#background_color').val(), {path: _wd_site_url});
                }
            }

        });


        jQuery('#wd-control-panel').find('p,span,a,button,div,input,textarea,button').addClass('default-style');


        /******************START FONT LOADER*******************/
       


        /******************START COLOR PICKER*******************/

        var $background_bg_picker = jQuery('.colorpicker_background_color').colorpicker({'format':'hex'}).on('changeColor', function(ev){
            jQuery('body').css('background-color',ev.color.toHex());
            jQuery.cookie("bg_color", ev.color.toHex(), {path: _wd_site_url});
        });
        /******************END COLOR PICKER*******************/

        /******************START PANEL CONTROLLER*******************/

        // open and close custom panel
        var $et_control_panel = jQuery('#wd-control-panel'),
            $et_control_close = jQuery('#wd-control-close');

        //$et_control_panel.animate( { left: -$et_control_panel.outerWidth() } );

        $et_control_close.on('click', function(){
            if ( jQuery(this).hasClass('control-open') ) {
                $et_control_panel.animate( { left: -jQuery("#wd-control-panel").outerWidth() } );
                //$et_control_panel.removeClass('open');
				jQuery(this).removeClass('control-open');
                jQuery.cookie('et_aggregate_control_panel_open', 0);
            } else {
                //$et_control_panel.addClass('open');
				$et_control_panel.animate( { left: 0 } );
                jQuery(this).addClass('control-open');
                jQuery.cookie('et_aggregate_control_panel_open', 1);
            }
            return false;
        });
        if ( jQuery.cookie('et_aggregate_control_panel_open') == 1 ) {
            $et_control_panel.animate( { left: 0 } );
            $et_control_close.addClass('control-open');
        }else{
            $et_control_panel.animate( { left: -jQuery("#wd-control-panel").outerWidth() } );
            $et_control_close.removeClass('control-open');
        }
        /******************END PANEL CONTROLLER*******************/

        /******************START AJAX SAVE CONFIG*******************/
        jQuery('#font-clear-btn').on('click', function(event){
            tvlgiao_wpdance_remove_data_cookie(custom_datas);
            jQuery.removeCookie("page_layout", {path: _wd_site_url});
            jQuery.removeCookie("bg_image", {path: _wd_site_url});
            jQuery.removeCookie("bg_color", {path: _wd_site_url});
            jQuery('body').css( "background-image",'' );
            jQuery('body').css( "background-color","#ffffff" );

            jQuery('#_page_layout').val('<?php echo esc_html($style_datas['wd_layout_styles']);?>').trigger('change');
            jQuery('ul.wd-background-patten > li.active').removeClass('active');

            for(key in orgin_custom_datas){
                custom_datas[key] = orgin_custom_datas[key];
            }
			tvlgiao_wpdance_set_color('.colorpicker_background_color',"#ffffff");
            jQuery('body').trigger('update_custom_preview');
        });


        jQuery('#font-save-btn').on('click', function(event){

            var current_btn = jQuery(this);
            current_btn.button('loading');

            var ajax_data =  {
                //action
                action  				: 'wd_ajax_save_style'
                //verify nonce
                ,ajax_preview			: jQuery('#preview_nonce_field').val()
                ,page_layout 			: jQuery('#_page_layout').val()
            };
            ajax_data = jQuery.extend(ajax_data, custom_datas);

            jQuery.ajax({
                type  :'POST'
                ,url   : '<?php echo admin_url('admin-ajax.php'); ?>'
                ,data  : ajax_data
                ,success : function(data){
                    console.log(data);
                    if( parseInt(data) == 1 ){
                        jQuery('#preview-save-result').html('Success').attr('class','alert alert-success').show();//.wait(3000).hide();
                        setTimeout(
                            function(){
                                jQuery('#preview-save-result').hide();
                            },3000);
                    }else{
                        jQuery('#preview-save-result').html('Error!Sufficient permissions').attr('class','alert alert-error').show()//.wait(3000).hide();
                        setTimeout(
                            function(){
                                jQuery('#preview-save-result').hide();
                            },3000);
                    }
                    current_btn.button('reset');
                }
            }).fail(function(){
                    current_btn.button('reset');
                });
        });



        /******************END AJAX SAVE CONFIG*******************/
	});
    //]]>
    </script>
<?php
}
?>