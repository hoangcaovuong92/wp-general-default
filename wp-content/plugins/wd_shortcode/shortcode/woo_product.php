<?php
/**
 * @package WordPress
 * @since WD_GoMarket
 */

if(!function_exists('wd_woo_category')){
	function wd_woo_category($atts,$content){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		global $woocommerce_loop, $woocommerce,$tvlgiao_wpdance_wd_data;
         $shortc_limit =15; 		
		extract(shortcode_atts(array(
			'columns' 			=> 3
			,'num_best_selling' => 3
			,'big_product'		=> ''
			,'per_page' 		=> 10
			,'cat_slug'			=> ''
			//,'title' 			=> ''			
		),$atts));
		
		
		wp_reset_postdata(); 
		$args_query = array(
				'post_type'	=> 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'	=> 1,
				'posts_per_page' => $num_best_selling,
				'orderby' => 'date',
				'order' => 'desc',				
				'meta_query' => array(
					array(
						'key' => '_visibility',
						'value' => array('catalog', 'visible'),
						'compare' => 'IN'
					)
				)
			);
			if(trim($cat_slug) != ''){
			$args_query['tax_query'] 			= array(
				array(
					'taxonomy' 		=> 'product_cat',
					'terms' 		=> array( esc_attr($cat_slug) ),
					'field' 		=> 'slug',
					'operator' 		=> 'IN'
				)
			);
		}
		//get prices min
		$argsPrices = array(
        'posts_per_page' => -1,
        'post_type' => 'product',
        'orderby' => 'meta_value_num',
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $cat_slug,
                'operator' => 'IN'
            )
        ),
        'meta_query' => array(
            array(
                'key' => '_price',
                )
            )       
        );			
		    ob_start();
			$category = get_term_by('slug', $cat_slug, 'product_cat', 'ARRAY_A');
			$best_selling= new WP_Query( $args_query );
			$loop = new WP_Query($argsPrices);
?>			
		<div class="sd-product-thumbnail">
			<div class="product-bigger-image">
			<div class="product-bigger">
					<?php tvlgiao_wpdance_wd_woocommerce_product_loop_start('list'); $i =0;?>
					<?php while ( $best_selling->have_posts() ) : $best_selling->the_post(); global $product; ?>
						
						<?php if($i == 0):?>
						<div class="prod_slide_box prod_box_<?php echo absint($product->get_id())?>" data-prod_box="<?php echo absint($product->get_id())?>">						
						<?php wc_get_template( 'content-product-custom-thumbnail.php', array( 'columns' => 1,'shortc_limit' => 15) );?>
						<?php else: ?>
						<div class="prod_slide_box hide prod_box_<?php echo absint($product->get_id())?>" data-prod_box="<?php echo absint($product->get_id())?>">
						<?php endif; $i++;?>
						
						</div>
						<?php endwhile; // end of the loop. ?>
					<?php woocommerce_product_loop_end(); ?>
				</div>
					<?php $_random_id = 'widget_product_slider_'.rand(); ?>
					<div class="widget_product_slider wd-loading" id="<?php echo esc_attr($_random_id);?>">
						<div class="products">
						<?php while ($best_selling->have_posts()) : $best_selling->the_post();?>
							<?php 
							global $product;
							$prouct_link = (!wp_is_mobile())?
								esc_url(home_url('/wp-admin/admin-ajax.php') . "?action=widget_product_slide_func1&prod_id=".$product->get_id()."&shortc_limit=".$shortc_limit ):
								get_permalink($product->get_id());
							?>
							<div class="thumbnail"><a class="<?php echo (!wp_is_mobile())? "wd_category_product_slide_func1": ''; ?>" title="<?php echo esc_attr($product->get_title());?>" href="<?php echo esc_url($prouct_link);?>" data-prod_id="<?php echo esc_attr($product->get_id());?>"><?php echo $product->get_image(array( 150, 180 )); ?></a></div>
						<?php endwhile;?>
						</div><!--.products-->
					</div>	
				</div>	
					<div class="product-category">	
						<div class="left">
							<h1 class="title"><?php echo esc_html($category['name']);?></h3>
							<h3 class="description"><?php echo esc_html($category['description']);?></h3>
						</div>
						<div class="right">
							<p><?php if ( $category['count'] > 0 ) echo $category['count']. ' items'; ?></p>
							<?php $tp_price = get_post_meta($loop->posts[0]->ID,'_price', true);
								_e('start as $','wpdance');
								echo esc_attr($tp_price);?>					
						</div>		
			        </div>
						<script type='text/javascript'>
			//<![CDATA[
				
				jQuery('body').on('click', '.wd_category_product_slide_func1', function(e){
					e.preventDefault();
					var url = jQuery(this).attr('href');
					var _this = jQuery(this);
					var prod_id = jQuery(this).data('prod_id');
					var curent_id_box = jQuery(this).parents('.woocommerce').find('.products.list .prod_box_'+prod_id);
					if(jQuery.trim(curent_id_box.html()) !== '') {
						_this.parents('.woocommerce').find('.products.list .prod_slide_box').addClass('hide');
						curent_id_box.removeClass('hide');
					} else {
						jQuery.ajax({
							type: "GET",
							url: url,
							beforeSend: function(o){
								_this.parents('.woocommerce').block({message: null, overlayCSS: {background: '#fff url('+wd_loading_icon+') no-repeat center'}});
							},
							success: function(data){
								curent_id_box.html(data);
								_this.parents('.woocommerce').unblock();
								_this.parents('.woocommerce').find('.products.list .prod_slide_box').addClass('hide');
								curent_id_box.removeClass('hide');
							}
						});
					}
	});
			//]]>				
			</script>
			</div>
			<?php 	wp_reset_postdata();
			return '<div class="woocommerce">' . ob_get_clean() . '</div>';	
	}
}		
add_shortcode('woo_product','wd_woo_category');	
?>