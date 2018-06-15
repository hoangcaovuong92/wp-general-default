<?php 
if(!function_exists ('tvl_wpdance_string_limit_words')){
	function tvl_wpdance_string_limit_words($string, $word_limit){
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
	}
}

if(!function_exists ('tvl_wpdance_the_excerpt_max_words')){
	function tvl_wpdance_the_excerpt_max_words($word_limit,$post = '',$echo = true) {
		if($post){
			$excerpt = wp_strip_all_tags(tvl_wpdance_get_the_excerpt_here($post->ID));
		}
		else
			$excerpt = get_the_excerpt();
		$result = tvl_wpdance_string_limit_words($excerpt,$word_limit);
		if($echo)
			echo wp_kses_post($result);
		return $result;
	}
}

if(!function_exists ('tvl_wpdance_get_the_excerpt_here')){
	function tvl_wpdance_get_the_excerpt_here($post_id)
	{
		global $wpdb;
		$query = $wpdb->prepare("SELECT post_excerpt,post_content FROM {$wpdb->posts} WHERE ID = %d LIMIT 1", $post_id );
		
		$result = $wpdb->get_results($query, ARRAY_A);
		if($result[0]['post_excerpt'])
			return $result[0]['post_excerpt'];
		else
			return $result[0]['post_content'];
	}
}
?>