<?php
/*
*	Template Name: Contact Template
*/
get_header(); ?>
				
		<div id="wd-container" class="content-wrapper page-template">
			<?php if( (!is_home() && !is_front_page()) && absint($tvlgiao_wpdance_page_datas['hide_title']) == 0 ):?>
				<div class="heading-title page-title">
					<h1><?php the_title();?></h1>
				</div>
			<?php endif;
			$_main_class = "col-sm-24";
			?>
			<div id="content-inner" class="row" >
				
					<div id="main-content" class="<?php echo esc_attr($_main_class);?>">
						<div class="main-content">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content-post">
									<?php the_content(); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpgeneral' ), 'after' => '</div>' ) ); ?>
								</div><!-- .entry-content -->
								<footer class="entry-meta">
									<?php edit_post_link( esc_html__( 'Edit', 'wpgeneral' ), '<span class="edit-link">', '</span>' ); ?>
								</footer><!-- .entry-meta -->
							</article><!-- #post -->					
						</div>
					</div><!-- end content -->
				
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>