<?php 
if(!class_exists('WP_Widget_EmAds')){
	/**
	 * Ads Widget class
	 *
	 */
	class WP_Widget_EmAds extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'widget_emads', 'description' => esc_html__('Advertisment  Widget','wpgeneral'));
			$control_ops = array('width' => 400, 'height' => 350);
			parent::__construct('emads', esc_html__('WD - Ads','wpgeneral'), $widget_ops);
		}

		function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
			$img = strlen($instance['img']) > 0 ? esc_url( $instance['img'] ) : "";
			$url = strlen($instance['url']) > 0 ? esc_url( $instance['url'] ) : "";
			$img_title = esc_attr($instance['img_title']);
			$img_height = (int)$instance['img_height'];
			$img_width = (int)$instance['img_width'];
			//we progress split youtube links and titles here
			
			$subHtml = ' ';
			if($img_height > 0 ){
				$subHtml = $subHtml."height = '$img_height' ";
			}
			if($img_width > 0 ){
				$subHtml = $subHtml."width = '$img_width' ";
			}
			echo wp_kses_post($before_widget);
			if ( !empty( $title ) ) { echo wp_kses_post($before_title . $title . $after_title); } ?>
			<div class="em-ads-widget"><?php // $instance['filter'] ? wpautop($text) : $text; ?>
				<a href="<?php echo esc_url($url); ?>"><img src="<?php echo esc_url($img)?>"  alt="<?php echo esc_attr($img_title); ?>" title="<?php echo esc_attr($img_title); ?>" <?php echo esc_attr($subHtml); ?>/></a>
			</div>
			<?php
			echo wp_kses_post($after_widget);
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = esc_attr($new_instance['title']);
			$instance['img'] = esc_url($new_instance['img']);
			$instance['url'] = esc_url($new_instance['url']);
			$instance['img_title'] = esc_attr($new_instance['img_title']);
			$instance['img_height'] = absint($new_instance['img_height']);
			$instance['img_width'] = absint($new_instance['img_width']);

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
			$title = strip_tags($instance['title']);
			$img = isset($instance['img']) ? esc_attr($instance['img']) : '';
			$url = isset($instance['url']) ? esc_attr($instance['url']) : '';
			$imageTitle = isset($instance['img_title']) ? esc_attr($instance['img_title']) : '';
			$imgHeight = isset($instance['img_height']) ? absint($instance['img_height']) : '';
			$imgWidth = isset($instance['img_width']) ? absint($instance['img_width']) : '';
	?>
			<p><label for="<?php echo esc_attr($this->get_field_id('img')); ?>"><?php esc_html_e('Image Url','wpgeneral'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('img')); ?>" name="<?php echo esc_attr($this->get_field_name('img')); ?>" type="text" value="<?php echo esc_attr($img); ?>" /></p>
			<p><label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Ads Url','wpgeneral'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" /></p>
			<p><label for="<?php echo esc_attr($this->get_field_id('img_title')); ?>"><?php esc_html_e('Image title','wpgeneral'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_title')); ?>" name="<?php echo esc_attr($this->get_field_name('img_title')); ?>" type="text" value="<?php echo esc_attr($imageTitle); ?>" /></p>
			<p><label for="<?php echo esc_attr($this->get_field_id('img_width')); ?>"><?php esc_html_e('Image Width','wpgeneral'); ?> : </label>
			<input id="<?php echo esc_attr($this->get_field_id('img_width')); ?>" name="<?php echo esc_attr($this->get_field_name('img_width')); ?>" type="text" value="<?php echo esc_attr($imgHeight); ?>" /> px</p>
			<p><label for="<?php echo esc_attr($this->get_field_id('img_height')); ?>"><?php esc_html_e('Image Height','wpgeneral'); ?> : </label>
			<input id="<?php echo esc_attr($this->get_field_id('img_height')); ?>" name="<?php echo esc_attr($this->get_field_name('img_height')); ?>" type="text" value="<?php echo esc_attr($imgWidth); ?>" /> px</p>

			<p>If you dont special the image width and height,system will use image size </p>
	<?php
		}
	}
}
?>