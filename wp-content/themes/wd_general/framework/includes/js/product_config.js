jQuery(document).ready(function(){
    "use strict";//CUSTOM
	// Add a new attribute (via ajax)
	jQuery('.wd_area-content').on('click', 'button.wd_add_new_ads_sidebar', function() {
		var tr_old = 	'<div class="wd_item_ads">\
							<div class="wd_ads_sidebar">\
								<div class="wd_ads_remove_bt">\
									<button type="button" class="button wd_remove_ads_sidebar">Remove</button>\
								</div>\
								<div>\
									<div class="wd_ads_title form-field">\
										<div class="label"><label>Title:</label></div>\
										<input type="text" name="wd_ads_name[]" class="attribute_position" value="" />\
									</div>\
									<div class="wd_ads_cont form-field">\
										<div class="label"><label>Content</label></div>\
										<textarea name="wd_ads_content[]" cols="40" rows="2"></textarea>\
									</div>\
									<div class="wd_ads_pos form-field">\
										<div class="label"><label>Position</label></div>\
										<select name="wd_ads_position[]">\
											<option value="left">Left</option>\
											<option value="right">Right</option>\
										</select>\
									</div>\
								</div>\
							</div>\
						</div>';
		jQuery('.wd_area_wrapper').append(tr_old);
	});
	jQuery('.wd_area-content').on('click', 'button.wd_remove_ads_sidebar', function() {
		jQuery(this).closest('div.wd_item_ads').remove();
	});
	
});