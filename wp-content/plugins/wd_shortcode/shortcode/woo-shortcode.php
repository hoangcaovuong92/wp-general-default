<?php
/**
 * @package WordPress
 * @subpackage Roedok
 * @since WD_Responsive
 */

	
	
	if(!function_exists('site_url_function')){
		function site_url_function($atts,$content){
			extract(shortcode_atts(array(
				'method' => 'return'
			),$atts));
			switch($method){
				case 'echo': echo site_url(); break;
				case 'return': return site_url(); break;
				default: return site_url(); break;
			}
			
		}
	}
	add_shortcode('wd_site_url','site_url_function');
	
	
	if(!function_exists('wd_custom_product_function')){
		function wd_custom_product_function($atts,$content){
			extract(shortcode_atts(array(
				'id' => 0
				,'sku' => ''
				,'title' => ''
			),$atts));
			
			
			if (empty($atts)) return;
			
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return;
			}
		
			wp_reset_query(); 
			
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 1,
				'no_found_rows' => 1,
				'post_status' => 'publish',
				'meta_query' => array(
					array(
						'key' => '_visibility',
						'value' => array('catalog', 'visible'),
						'compare' => 'IN'
					)
				)
			);

			if(isset($atts['sku']) && strlen(trim($atts['sku'])) > 0){
				$args['meta_query'][] = array(
					'key' => '_sku',
					'value' => $atts['sku'],
					'compare' => '='
				);
			}

			if(isset($atts['id'])){
				$args['p'] = $atts['id'];
			}

			ob_start();

			$products = new WP_Query( $args );

			if ( $products->have_posts() ) : ?>
				<div class="custom-product-shortcode">
				<?php woocommerce_product_loop_start(); ?>

					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						
						<?php		
						//start product-content.Copy from core code
							
						global $product, $woocommerce_loop;
						$old_loop = $woocommerce_loop;
						// Store loop count we're currently on
						if ( empty( $woocommerce_loop['loop'] ) )
							$woocommerce_loop['loop'] = 0;

						// Store column count for displaying the grid
						if ( empty( $woocommerce_loop['columns'] ) )
							$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

						// Ensure visibility
						if ( ! $product->is_visible() )
							return;

						// Increase loop count
						$woocommerce_loop['loop']++;

						// Extra post classes
						$classes = array();
						if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
							$classes[] = 'first';
						if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
							$classes[] = 'last';
						?>
						<li <?php post_class( $classes ); ?>>
							
							<div>

								<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

								<div class="product_thumbnail_wrapper">
									
									
								
									<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">

										<?php
											/**
											 * woocommerce_before_shop_loop_item_title hook
											 *
											 * @hooked woocommerce_show_product_loop_sale_flash - 10
											 * @hooked woocommerce_template_loop_product_thumbnail - 10
											 */
											do_action( 'woocommerce_before_shop_loop_item_title' );
										?>

										<?php
											/**
											 * woocommerce_after_shop_loop_item_title hook
											 *
											 * @hooked woocommerce_template_loop_price - 10
											 */
											do_action( 'woocommerce_after_shop_loop_item_title' );
										?>

									</a>
								
								</div>
								
								<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
							
							</div>
						</li>
						
						<?php //end of copy ?>
						
					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>
				</div>
			<?php endif;
			$woocommerce_loop = $old_loop;
			wp_reset_postdata();
			
			return '<div class="woocommerce">' . ob_get_clean() . '</div>';
		}
	}
	add_shortcode('custom_product','wd_custom_product_function');
	
	
	
	if(!function_exists('wd_custom_products_function')){
		function wd_custom_products_function($atts,$content){
			extract(shortcode_atts(array(
				'ids' => 0
				,'skus' => ''
			),$atts));
			

			if (empty($atts)) return;
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return;
			}
		
			global $woocommerce_loop;
			wp_reset_query(); 

			extract(shortcode_atts(array(
				'columns' 	=> '4',
				'orderby'   => 'title',
				'order'     => 'asc'
				), $atts));

			$args = array(
				'post_type'	=> 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'	=> 1,
				'orderby' => $orderby,
				'order' => $order,
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key' 		=> '_visibility',
						'value' 	=> array('catalog', 'visible'),
						'compare' 	=> 'IN'
					)
				)
			);

			if(isset($atts['skus']) && strlen(trim($atts['skus'])) > 0) {
				$skus = explode(',', $atts['skus']);
				$skus = array_map('trim', $skus);
				$args['meta_query'][] = array(
					'key' 		=> '_sku',
					'value' 	=> $skus,
					'compare' 	=> 'IN'
				);
			}

			if(isset($atts['ids'])){
				$ids = explode(',', $atts['ids']);
				$ids = array_map('trim', $ids);
				$args['post__in'] = $ids;
			}

			ob_start();
			
			$_old_woocommerce_loop_columns = $woocommerce_loop['columns'];
			
			//$products = new WP_Query( $args );
			$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
			
			$woocommerce_loop['columns'] = $columns;

			if ( $products->have_posts() ) : ?>
				<div class="custom-products-shortcode">
				<?php woocommerce_product_loop_start(); ?>

					<?php while ( $products->have_posts() ) : $products->the_post(); ?>

						<?php woocommerce_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>
				</div>
			<?php endif;
			
			wp_reset_postdata();
			$woocommerce_loop['columns'] = $_old_woocommerce_loop_columns;
			return '<div class="woocommerce">' . ob_get_clean() . '</div>';			
			
		}
	}	
	
	
	add_shortcode('custom_products','wd_custom_products_function');
	
	
	if(!function_exists('wd_theme_url_function')){
		function wd_theme_url_function($atts,$content){
			extract(shortcode_atts(array(
				'method' => 'return'
			),$atts));
			switch($method){
				case 'echo': echo get_template_directory_uri(); break;
				case 'return': return get_template_directory_uri(); break;
				default: return get_template_directory_uri(); break;
			}
			
		}
	}
	add_shortcode('wd_theme_url','wd_theme_url_function');
	
	if(!function_exists('wd_auto_copyright_function')){
		function wd_auto_copyright_function($atts,$content){
			extract(shortcode_atts(array(
				'year' => 'auto',
			),$atts));
			if(!is_numeric($year)) { $res = date('Y'); }
			if(intval($year) == 'auto'){ $year = date('Y'); }
			if(intval($year) >= date('Y')){ $res = date('Y'); }
			if(intval($year) < date('Y')){ $res = intval($year) . ' - ' . date('Y'); }
			return $res;
		}
	}
	add_shortcode('wd_auto_copyright','wd_auto_copyright_function');
	
	if(!function_exists('wd_current_url_function')){
		function wd_current_url_function($atts,$content){
			extract(shortcode_atts(array(
				'method' => 'return'
			),$atts));
			switch($method){
				case 'echo': echo get_permalink(); break;
				case 'return': return get_permalink(); break;
				default: return get_permalink(); break;
			}
			
		}
	}
	add_shortcode('wd_c_url','wd_current_url_function');
	
	if(!function_exists('wd_featured_by_category_function')){
		function wd_featured_by_category_function($cat_slug = '',$per_page = 1){
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return;
			}
			wp_reset_query(); 
			$args = array(
				'post_type'	=> 'product'
				,'post_status' => 'publish'
				,'ignore_sticky_posts'	=> 1
				,'posts_per_page' => $per_page
				,'meta_query' => array(
					array(
						'key' => '_visibility',
						'value' => array('catalog', 'visible'),
						'compare' => 'IN'
					)
					,array(
						'key' => '_featured',
						'value' => 'yes'
					)
				)
				,'tax_query' 			=> array(
					array(
						'taxonomy' 		=> 'product_cat',
						'terms' 		=> array( esc_attr($cat_slug) ),
						'field' 		=> 'slug',
						'operator' 		=> 'IN'
					)
				)
			);
			wp_reset_query(); 
			$products = new WP_Query( $args );
			if( $products->have_posts() ){
				global $post;
				$products->the_post();
				$product = get_product( $post->ID );
				return $product;
			}
			return NULL;
		}
	}
	
	function wd_order_by_popularity_post_clauses( $args ) {
		global $wpdb;

		$args['orderby'] = "$wpdb->postmeta.meta_value+0 DESC, $wpdb->posts.post_date DESC";

		return $args;
	}	

	function wd_order_by_rating_post_clauses( $args ) {

		global $wpdb;

		$args['where'] .= " AND $wpdb->commentmeta.meta_key = 'rating' ";

		$args['join'] .= "
			LEFT JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
			LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
		";

		$args['orderby'] = "$wpdb->commentmeta.meta_value DESC";

		$args['groupby'] = "$wpdb->posts.ID";

		return $args;
	}	
	
	
?>