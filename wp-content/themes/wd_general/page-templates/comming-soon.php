<?php
/**
 *	Template Name: Comming Soon
 */	
 
get_header();
$tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");
?>
<div id="wd-container" class="blank-template content-wrapper">
	<div id="content-inner" class="row">	
		<div id="main-content" class="col-sm-24">
			<div class="entry-content">	
				<?php tvlgiao_wpdance_theme_logo();?>
				<?php
					// Start the Loop.
					if( have_posts() ) : the_post();
						get_template_part( 'content', 'page' );	
					endif;
				?>
			<div class="commingsoon_newsletter">
				<div>
					<?php if ( is_active_sidebar( 'first-footer-widget-area-1' ) ) : ?>
						<ul class="xoxo">
							<?php dynamic_sidebar( 'first-footer-widget-area-1' ); ?>
						</ul>
					<?php endif; ?>
				</div>
			</div><!-- end #footer-first-area -->
			<div class="social_sharing wd-social share-list" style="margin-bottom: 0px">	
				<div class="social_icon">					
					<div class="facebook">
						<a class="social_item" title="<?php esc_html_e("share on facebook", 'wpgeneral')?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink());?>"><i class="fa fa-facebook"></i></a>
					</div>
					
					<div class="twitter">
						<a class="social_item" title="<?php esc_html_e("Tweet on Twitter", 'wpgeneral')?>" href="https://twitter.com/home?status=<?php echo esc_url(get_permalink());?>"><i class="fa fa-twitter"></i></a>
					</div>
					
					<div class="google">
						<a class="social_item" title="<?php esc_html_e("share on Google +", 'wpgeneral')?>" href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink());?>"><i class="fa fa-google-plus"></i></a>
					</div>
					
					<div class="pinterest" >
						<?php $image_link  = wp_get_attachment_url( get_post_thumbnail_id() );?>
						<a class="social_item" title="<?php esc_html_e("Pin it", 'wpgeneral')?>" href="<?php echo esc_url("https://pinterest.com/pin/create/button/?url=" . get_permalink() . '&media=' . $image_link );?>"><i class="fa fa-pinterest"></i></a>
					</div>
					
					<script type="text/javascript">
						jQuery(document).ready(function(){
							"use strict";
							jQuery('.social_icon .social_item').click(function(){
								var url = jQuery(this).attr('href');
								var title = jQuery(this).attr('title');
								window.open(url, title,"width=700, height=520");
								return false;
							});
						});
					</script>
					
					
				</div>            
			</div>
			<div class="blank_copyright copy-right">
			<?php 
				
				echo stripslashes( do_shortcode($tvlgiao_wpdance_wd_data['footer_text']));
			?>
			</div>
			</div>
		</div>
	</div>	
</div><!-- #container -->
<?php get_footer(); ?>