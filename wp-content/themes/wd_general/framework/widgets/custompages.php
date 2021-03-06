<?php 
if(!class_exists('WP_Widget_Custompages')){
	class WP_Widget_Custompages extends WP_Widget {
		function __construct() {
			$widget_ops = array('classname' => 'widget_custom_pages', 'description' => esc_html__( 'This widget show pages you select','wpgeneral') );
			parent::__construct('custompages', esc_html__('WD - Custom Pages','wpgeneral'), $widget_ops);
		}

		function widget( $args, $instance ) {
			extract( $args );

			$title = apply_filters('widget_title', empty( $instance['title'] ) ? esc_html__( 'Pages','wpgeneral' ) : $instance['title'], $instance, $this->id_base);
			$sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
			$include = empty( $instance['include'] ) ? '' : $instance['include'];

			if ( $sortby == 'menu_order' )
				$sortby = 'menu_order, post_title';

			$out = wp_list_pages( apply_filters('widget_pages_args', array('title_li' => '', 'echo' => 0, 'sort_column' => $sortby, 'include' => $include) ) );

			// add first last
			$out = preg_replace('/li class\=\"/', 'li class="first ', $out, 1);
			$out = strrev($out);
			$out = preg_replace('/\"\=ssalc il/', ' tsal"=ssalc il', $out, 1);
			
			
			if ( !empty( $out ) ) {
				echo wp_kses_post($before_widget);
				if ( $title)
					echo wp_kses_post($before_title . $title . $after_title);
			?>
			<ul>
				<?php echo strrev($out); ?>
			</ul>
			<?php
				echo wp_kses_post($after_widget);
			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID' ) ) ) {
				$instance['sortby'] = $new_instance['sortby'];
			} else {
				$instance['sortby'] = 'menu_order';
			}

			$instance['include'] =  $new_instance['include'] ;

			return $instance;
		}

		function form( $instance ) {
			//Defaults
			$instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '', 'exclude' => '') );
			$title = esc_attr( $instance['title'] );
			$exclude = esc_attr( $instance['exclude'] );
		?>
			<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','wpgeneral'); ?>:</label> <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo  esc_attr($title); ?>" /></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('sortby')); ?>"><?php esc_html_e( 'Sort by','wpgeneral' ); ?>:</label>
				<select name="<?php echo esc_attr($this->get_field_name('sortby')); ?>" id="<?php echo esc_attr($this->get_field_id('sortby')); ?>" class="widefat">
					<option value="post_title"<?php selected( $instance['sortby'], 'post_title' ); ?>><?php esc_html_e('Page title','wpgeneral'); ?></option>
					<option value="menu_order"<?php selected( $instance['sortby'], 'menu_order' ); ?>><?php esc_html_e('Page order','wpgeneral'); ?></option>
					<option value="ID"<?php selected( $instance['sortby'], 'ID' ); ?>><?php _e( 'Page ID','wpgeneral' ); ?></option>
				</select>
			</p>
			<p>
			<?php
			$page_ids =  get_all_page_ids();
			$page_select = empty($instance['include']) ? array() : $instance['include'];
			?>
			<select multiple="multiple" SIZE=5 name="<?php echo esc_attr($this->get_field_name( 'include')); ?>[]" class="widefat" style="height:auto;">
			<?php
			foreach($page_ids as $p){ ?>
			
				<?php if( get_post_status ( $p ) == 'private' || get_post_status ( $p ) == 'publish' || get_post_status ( $p ) == 'inherit' ): ?>
			
				<?php if(in_array($p,$page_select)){?>
					<option value="<?php echo esc_attr($p); ?>" selected ><?php echo esc_html(get_the_title($p)); ?></option>
				<?php } else {?>
					<option value="<?php echo esc_attr($p); ?>"><?php echo esc_html(get_the_title($p)); ?></option>
				<?php } ?>	
				
				<?php endif;?>
				
			<?php }
	?>
			</select>
				
			</p>
	<?php
		}

	}
}
?>