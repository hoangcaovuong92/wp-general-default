<?php 
if(!class_exists('WP_Widget_Customrecent')){
	class WP_Widget_Customrecent extends WP_Widget {
		function __construct() {
	    	$widget_setting = array(
				'name' 		=> esc_html__('WD - Recent Posts','wpgeneral'),
				'desc' 		=> esc_html__('This widget show recent post in each category you select.','wpgeneral'),
				'slug' 	  	=> 'customrecent',
				'class' 	=> 'widget_customrecent',
			);
			$widget_ops 		= array('classname' => $widget_setting['class'], 'description' => $widget_setting['desc']);
			$control_ops 		= array('width' => 400, 'height' => 350);
			parent::__construct($widget_setting['slug'], $widget_setting['name'], $widget_ops);
		}
	  
		function widget($args, $instance){						
			$cache = wp_cache_get('customrecent', 'widget');			
			
			if ( ! is_array( $cache ) )
				$cache = array();

			if ( isset( $cache[$args['widget_id']] ) ) {
				echo wp_kses_post($cache[$args['widget_id']]);
				return;
			}

			ob_start();			
			
			extract($args); // gives us the default settings of widgets
			
			$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent','wpgeneral') : $instance['title']);
			
			$link = empty( $instance['link'] ) ? '#' : esc_url($instance['link']);
			$link = ( isset($link) && strlen($link) > 0 ) ? $link : "#" ;
			$show_image = ( isset($instance['show_image']) && strcmp(esc_attr($instance['show_image']), 'yes') == 0)? 1: 0;
			
			$_limit = absint($instance['limit']) == 0 ? 5 : absint($instance['limit']);
			
			echo wp_kses_post($before_widget); // echos the container for the widget || obtained from $args
			if($title){
				echo wp_kses_post($before_title . $title . $after_title);
			}
			
			 $args = array(
                    'showposts' => $_limit,
                    'post_type' => 'post',
                    'ignore_sticky_posts' => 1
                );
                $the_query = new WP_Query( $args );	
			
			$num_count = $the_query->post_count;;						
			if($the_query->have_posts())	{
				$id_widget = 'recent-'.rand(0,1000);
				echo '<ul class="recentposts" id="'.$id_widget.'">';
				$i = 0;
				while($the_query->have_posts()) {$the_query->the_post();
					?>
					<li class="item<?php if($i == 0) echo ' first';?><?php if(++$i == $num_count) echo ' last';?>">
						<div class="media">							
							<div class="detail">
								<div class="entry-title">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpgeneral' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php echo esc_attr(get_the_title()); ?>
									</a>
									<p class="entry-desc">
									<?php echo tvl_wpdance_the_excerpt_max_words(10,$the_query->post);?>
								    </p>
								</div>
								<p class="entry-meta">
									<?php echo get_the_date('F d, Y') ?>
								</p>
								<div class="author"><i class="fa fa-user"></i><?php esc_html_e('','wpgeneral');?> <?php the_author_posts_link();?></div>
							</div><!-- .detail -->
						</div>
					</li>
				
					
				<?php }
				echo '</ul>';
			}
			wp_reset_postdata();
			
			echo wp_kses_post($after_widget); // close the container || obtained from $args
			$content = ob_get_clean();

			if ( isset( $args['widget_id'] ) ) $cache[$args['widget_id']] = $content;

			echo wp_kses_post($content);

			wp_cache_set('customrecent', $cache, 'widget');			
			
		}

		
		function update($new_instance, $old_instance) {
			return $new_instance;
		}

		
		function form($instance) {        

			//Defaults
			$instance = wp_parse_args( (array) $instance, array( 'title' => 'From Our Blog','link'=>'#', 'show_image' => 'yes','limit'=>4) );
			$title = esc_attr( $instance['title'] );
			$limit = absint( $instance['limit'] );
			$link = esc_url( $instance['link'] );
			$show_image = esc_attr( $instance['show_image'] );
			
			?>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title','wpgeneral' ); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e( 'Title Link','wpgeneral' ); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id('show_image')); ?>"><?php esc_html_e( 'Show Image','wpgeneral' ); ?> : </label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('show_image')); ?>" name="<?php echo esc_attr($this->get_field_name('show_image')); ?>">
				<option value="yes" <?php echo strcmp('yes', esc_attr($show_image)) == 0? "selected": ''?>>Yes</option>
				<option value="no" <?php echo strcmp('no', esc_attr($show_image)) == 0? "selected": ''?>>No</option>
			</select></p>
			
			<p><label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_html_e( 'Limit','wpgeneral' ); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="number" min="2" max="10" value="<?php echo esc_attr($limit); ?>" /></p>
			
	<?php
		   
		}
	}
}
?>