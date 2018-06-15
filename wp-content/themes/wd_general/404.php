<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage RoeDok
 * @since WD_Responsive
 */	
get_header();
 
	$tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
	$style = '';
	if( isset( $tvlgiao_wpdance_wd_data['wd_404_backg'] ) && $tvlgiao_wpdance_wd_data['wd_404_backg'] !== '' ) {
		$style = 'background-image: url('. esc_url($tvlgiao_wpdance_wd_data['wd_404_backg']).');';
	}
?>

	<div class="swapper-404 background-404" style="<?php echo esc_attr($style);?>">
		<div  class="content-wrapper container-404 container">
			<div id="content-inner" class="row">
				<?php 
				if(isset($tvlgiao_wpdance_wd_data['wd_header_style']) && $tvlgiao_wpdance_wd_data['wd_header_style'] == 'v2' && !wp_is_mobile()): ?>			
				<?php endif;?>
					<div class="entry-content table-cell">
						
						<div>
							<h2 class="my-account-title"><?php esc_html_e( 'Page not found', 'wpgeneral');	?></h2>
							<div>
								<p>
									<?php esc_html_e( 'Oops! That page can not be found', 'wpgeneral');	?>
								</p>
								<p>
									<?php esc_html_e('It looks like nothing was found at this location. Maybe try to use a search?', 'wpgeneral' );?>
								</p>
								
							</div>
							<?php if(isset($tvlgiao_wpdance_wd_data['wd_page404_content']) && shortcode_exists( 'wd_feedburner' ) ) echo do_shortcode(stripslashes($tvlgiao_wpdance_wd_data['wd_page404_content']));
							?>
						</div>
					</div>
			</div><!-- #content -->
		</div><!-- #container -->
	</div><!--swapper-404-->
<?php get_footer();
 ?>
