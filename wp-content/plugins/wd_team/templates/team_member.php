<?php
if(!function_exists('wd_team_member')){
	function wd_team_member($atts = array(),$content) {
		extract(shortcode_atts(array(
			'style'  => 'style2',
			'id'=>'',
			'slug' => '',
			'width' => '350',
			'height' => '350'
		), $atts));
		
		//$content = do_shortcode($content);
		if( absint($id) > 0 ){
			$query = new WP_Query( array( 'post_type' => 'team', 'post__in' => array($id )) );
		}elseif( strlen(trim($slug)) > 0 ){
			$_post = get_page_by_path($slug, OBJECT, 'team');
			if( !is_null($_post) ){
				$query = new WP_Query( array( 'post_type' => 'team', 'post__in' => array($_post->ID )) );
			} else {
				return;
			}
		} else {
			return;
		}
		global $post;
		$count=0;
			if($query->have_posts()) : 
				while($query->have_posts()) : $query->the_post();
					$name = esc_html(get_the_title($post->ID));
					$post_url =  esc_url(get_permalink($post->ID));
					$role = esc_html(get_post_meta($post->ID,'wd_member_role',true));
					$email= esc_html(get_post_meta($post->ID,'wd_member_email',true));
					$phone= esc_html(get_post_meta($post->ID,'wd_member_phone',true));
					$link= esc_url(get_post_meta($post->ID,'wd_member_link',true));
					//$social= esc_html(get_post_meta($post->ID,'wd_member_social',true));
					$facebook_link= esc_url(get_post_meta($post->ID,'wd_member_facebook_link',true));
					$twitter_link= esc_url(get_post_meta($post->ID,'wd_member_twitter_link',true));
					$rss_link= esc_url(get_post_meta($post->ID,'wd_member_rss_link',true));
					$google_link= esc_url(get_post_meta($post->ID,'wd_member_google_link',true));
					$linkedlin_link= esc_url(get_post_meta($post->ID,'wd_member_linkedlin_link',true));
					$dribble_link= esc_url(get_post_meta($post->ID,'wd_member_dribble_link',true));
					/*$content = substr($post->post_content,50).'...';*/
					$content = wp_trim_words( $post->post_content, 15 );
					if($link == '') { $link = '#'; }		
		if($email){
			$email = '<p class="wd_email">'.$email.'</p>';
		}
		if($phone){
			$phone = '<p class="wd_phone">'.$phone.'</p>';
		}
		$_social = '';
		if($facebook_link){
			$_social .= '<a class="facebook_link" href="'.$facebook_link.'">facebook link</a>';
		}
		if($twitter_link){
			$_social .= '<a class="twitter_link" href="'.$twitter_link.'">twitter link</a>';
		}
		if($google_link){
			$_social .= '<a class="google_link" href="'.$google_link.'">google link</a>';
		}
		if($rss_link){
			$_social .= '<a class="rss_link" href="'.$rss_link.'">rss link</a>';
		}
		if($linkedlin_link){
			$_social .= '<a class="linkedlin_link" href="'.$linkedlin_link.'">linkedlin link</a>';
		}
		ob_start();
		$style_class="style1";
		if($style == 'style1'){
			$style_class = "style1";
		} elseif($style == 'style2'){
			$style_class = "style2";
		}elseif($style == 'style3'){
			$style_class = "style3";
		}elseif($style == 'style4'){
			$style_class = "style4";
		}
		?>
		<div class="wd_meet_team <?php echo $style_class; ?>">
			<?php if(has_post_thumbnail()): ?>
			<div class="wd_thumb">
				<a title="<?php echo esc_attr($name); ?>" href="<?php echo $link; ?>"><?php the_post_thumbnail('wd_team_thumb'); ?> </a>
				<div class="social"><?php echo $_social; ?></div>
			</div>
			<?php endif;?>
			<div>
				<div class="info">
					<em><?php echo $role; ?></em>
					<h3><a href="<?php echo $link; ?>"><?php echo $name; ?></a></h3>
					<!--<?php echo $email.$phone; ?> -->
					
					<p class="wd_des"><?php echo $content; ?></p>
				</div>
			</div>
		</div>
		<?php
				endwhile;
			endif;
			$output = ob_get_contents();
			ob_end_clean();
			wp_reset_query();
		return $output;
	}
}
add_shortcode('team_member','wd_team_member');
?>