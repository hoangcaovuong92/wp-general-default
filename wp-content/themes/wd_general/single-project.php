<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage wp_glory
 * @since Wpdance Glory
 */

get_header(); ?>
	<?php 
	
	$page_title  = '<h1 class="heading-title page-title">';
	$page_title .= get_the_title();
	$page_title .= '</h1>';
	$brd_data = array(
		'has_breadcrumb'	=> true,
		'has_page_title' 	=> ( apply_filters( 'woocommerce_show_page_title', true ) ),
		'title'				=> $page_title,
	);
	
	if( isset($tvlgiao_wpdance_wd_data) ){
		$style = 'style="background: url('.esc_url($tvlgiao_wpdance_wd_data['wd_bg_breadcrumbs']).');"';
	}
	tvlgiao_wpdance_wd_printf_breadcrumb($brd_data,$style);

	?>
	
	<div id="wd-container" class="blog-template content-wrapper content-area container">
		<div id="content-inner" class="row">
			<?php
				
				$_layout_config = explode("-", '0-1-0' );
				$_left_sidebar = (int)$_layout_config[0];
				$_right_sidebar = (int)$_layout_config[2];
				$_main_class = ( $_left_sidebar + $_right_sidebar ) == 2 ? "col-sm-12" : ( ( $_left_sidebar + $_right_sidebar ) == 1 ? "col-sm-18" : "col-sm-24" );
			?>
			
			<div id="main-content" class="<?php echo esc_attr($_main_class);?>">
				
				<div class="single-project">
					<div class="left_project col-sm-18">
					<?php	
						if(have_posts()) : while(have_posts()) : the_post(); 
						 $post = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("post");
						$tvlgiao_wpdance_wd_data = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wd_data");									
						?>
							<div class="custom_code">
								<?php if( isset($tvlgiao_wpdance_wd_data['wd_top_blog_code']) && $tvlgiao_wpdance_wd_data['wd_top_blog_code'] != 'null') echo stripslashes($tvlgiao_wpdance_wd_data['wd_top_blog_code']);?>
							</div>
									
							<?php if( 1||$data['wd_blog_details_thumbnail'] == 1 ) : ?>
									<div class="thumbnail">
										<?php 
											$video_url = get_post_meta( $post->ID, TVLGiao_Wpdance_THEME_SLUG.'url_video', true);
											if( $video_url!= ''){
												echo get_embbed_video( $video_url, 280, 246 );
											}
											else{
												?>
												<div class="image">
													
													<?php 
														if ( has_post_thumbnail() ) {
															the_post_thumbnail('tvlgiao_wpdance_blog_single',array('class' => 'thumbnail-blog'));
															
														} 			
													?>	
														
												</div>
												<?php
											}
										?>	
									</div>
								<?php endif;?>
							<div class="post-title">
								<h2 class="heading-title"><?php the_title(); ?>
								<?php edit_post_link( esc_html__( 'Edit', 'wpgeneral' ), '<span class="wd-edit-link hidden-phone">', '</span>' ); ?>	</h2>
								<div class="navi">
									<div class="navi-next"><?php next_post_link('%link', 'Next'); ?></div>
									<div class="navi-prev"><?php previous_post_link('%link', 'Previous'); ?> </div>
								</div>
							</div>	
							
							<div <?php post_class("single-post");?>>
								<?php if($tvlgiao_wpdance_wd_data['wd_top_blog_code'] != 'null') echo stripslashes($tvlgiao_wpdance_wd_data['wd_top_blog_code']);?>
								
								<div class="post_inner">							
									<div class="post-info-content">
										<div class="post-description"><?php the_content(); ?></div>										
										<?php wp_link_pages(); ?>										
									</div>											
								</div>	
								<div class="social_sharing wd-social share-list">	
									<div class="social_icon">
										
										<div class="facebook">
											<a class="social_item" title="<?php esc_html_e("share on facebook", 'wpgeneral')?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink());?>"><i class="fa fa-facebook"></i></a>
										</div>
										
										<div class="twitter" >
											<a class="social_item" title="<?php esc_html_e("Tweet on Twitter", 'wpgeneral')?>" href="https://twitter.com/home?status=<?php echo esc_url(get_permalink());?>"><i class="fa fa-twitter"></i></a>
										</div>
										
										<div class="google" >
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
							</div>
						</div>
						<div class="right_project col-sm-6">
								<div class="single-project-short-description" itemprop="description">
									<h3><?php echo esc_html__( 'Project Description', 'wpgeneral' ) ?></h3>
									<?php echo apply_filters( 'post_excerpt', wpautop( $post->post_excerpt ) ) ?>
								</div>
								<div class="project-meta">
									<h3><?php echo esc_html__( 'Project Detail', 'wpgeneral' ) ?></h3>
										<?php
											// Categories
											$terms_as_text 	= get_the_term_list( $post->ID, 'project-category', '<li>', '</li><li>', '</li>' );

											// Meta
											$client 		= esc_attr( get_post_meta( $post->ID, '_client', true ) );
											$url 			= esc_url( get_post_meta( $post->ID, '_url', true ) );

											do_action( 'projects_before_meta' );
											if ( $client ) {
												echo '<div class="client">';
												echo '<h5>' . esc_html__( 'Client', 'wpgeneral' ) . '</h3>';
												echo '<span class="client-name">' . $client . '</span>';
												echo '</div>';
											}	
												echo '<div class="entry-date">';
												echo '<h5>' . esc_html__( 'Date', 'wpgeneral' ) . '</h3>';
												echo get_the_date('F d, Y');
												echo '</div>';
											if ( $terms_as_text ) {
												echo '<div class="categories">';
												echo '<h5>' . esc_html__( 'Categories', 'wpgeneral' ) . '</h3>';
												echo '<ul class="single-project-categories">';
												echo wp_kses_post($terms_as_text);
												echo '</ul>';
												echo '</div>';
											}																											
											do_action( 'projects_after_meta' );
										?>
									</div>																													</div>																							
						<?php						
						endwhile;
						endif;	
						wp_reset_postdata();
					?>	
				</div>
				
			</div>
			
		</div>
	</div><!-- #primary -->

<?php
get_footer();
