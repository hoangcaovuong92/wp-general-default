<?php 
get_header(); ?>
	
<?php 
	
	$page_title = '';
	if( true ) {
		if ( is_category() ) {
			$page_title .= "<h1 class=\"page-title heading-title archive-title catagory-title site-title\">";
			$page_title .= sprintf( esc_html__( 'Category : %s', 'wpgeneral' ), single_cat_title( '', false ) );
			$page_title .= "</h1>";
		}
		elseif ( is_search() ) {
			$page_title .= '<h1 class="search-title page-title heading-title site-title">';
			$page_title .= sprintf( esc_html__( 'Search Results for : %s', 'wpgeneral' ), get_search_query() );
			$page_title .= '</h1>';
			 
		}elseif ( is_day() ) {
			$page_title .= '<h1 class="page-title heading-title archive-title site-title">';
			$page_title .= sprintf( esc_html__( 'Day : %s', 'wpgeneral' ), get_the_date() );
			$page_title .= '</h1>';
		} elseif ( is_month() ) {
			$page_title .= '<h1 class="page-title heading-title archive-title  site-title">';
			$page_title .= sprintf( esc_html__( 'Month : %s', 'wpgeneral' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpgeneral' ) ) ); 
			$page_title .= '</h1>';
	 
		} elseif ( is_year() ) {
			$page_title .= '<h1 class="page-title heading-title archive-title site-title">';
			$page_title .= sprintf( esc_html__( 'Year : %s', 'wpgeneral' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpgeneral' ) ) ); 
			$page_title .= '</h1>';
		} elseif ( is_single() && !is_attachment() ) {
			$page_title .= '<div class="ads-info">';
			$page_title .= '<h1 class="page-title heading-title post-title single-title site-title">';
			$page_title .= $_echo_out_string;
			$page_title .= '</h1>';
			$_home_button_text = get_option(TVLGiao_Wpdance_THEME_SLUG.'_home_button_text','Learn More');
			$_home_button_link = get_option(TVLGiao_Wpdance_THEME_SLUG.'promotion_button_uri','http://wpdance.com');					
			$page_title .= '<a class="read_more" href="'.$_home_button_link.'">'.$_home_button_text.'</a>';
			$page_title .= "</div>";
		} elseif ( is_page() ) {
			$page_title .= '<h1 class="page-title heading-title single-title site-title">';
			$page_title .= get_the_title();
			$page_title .= '</h1>';
		} elseif ( is_attachment() ) {
			$page_title .= '<h1 class="page-title heading-title attachment-title single-title site-title">';
			$page_title .= get_the_title();
			$page_title .= '</h1>';
		} elseif ( is_tag() ) {
			$page_title .= '<h1 class="page-title heading-title tag-title archive-title site-title">';
			$page_title .= sprintf( esc_html__( 'Tag : %s', 'wpgeneral' ), single_tag_title( '', false ) );
			$page_title .= '</h1>';
	 
		} elseif ( is_author() ) {	
			 $author = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("author");
			$userdata = get_userdata($author);
			$page_title .= '<h1 class="page-title heading-title author-title archive-title site-title">';
			$page_title .= sprintf( esc_html__( 'Author : %s', 'wpgeneral' ), $userdata->display_name );
			$page_title .= '</h1>';
	 
		} elseif ( is_404() ) {
			$page_title .= '<h1 class="page-title heading-title title-404 page-title site-title">';
			$page_title .= esc_html__( 'OOPS! FILE NOT FOUND', 'wpgeneral' );
			$page_title .= '</h1>';
		} elseif( is_archive() ){
			$page_title .= '<h1 class="page-title heading-title attachment-title single-title site-title">';
			$page_title .= esc_html__( 'Archive', 'wpgeneral' );
			$page_title .= '</h1>';
		}
	}
	
	
	
	$brd_data = array(
		'has_breadcrumb'	=> ( !is_home() && !is_front_page() ),
		'has_page_title' 	=> true,
		'title'				=> $page_title,
	);
	tvlgiao_wpdance_wd_printf_breadcrumb($brd_data);
	
		$_left_sidebar = 0;
		$_right_sidebar = 1;
		$_main_class = 'col-sm-18';
		$_left_sidebar_name = '';
		$_right_sidebar_name = 'blog-right-widget-area';
		if( is_category() ){
			
			$_layout_config = explode("-",$tvlgiao_wpdance_wd_data['wd_blog_layout']);
			
			$_left_sidebar = (int)$_layout_config[0];
			$_right_sidebar = (int)$_layout_config[2];
			$_main_class = ( $_left_sidebar + $_right_sidebar ) == 2 ? "col-sm-12" : ( ( $_left_sidebar + $_right_sidebar ) == 1 ? "col-sm-18" : "col-sm-24" );		
			$_left_sidebar_name = $tvlgiao_wpdance_wd_data['wd_blog_left_sidebar'];
			$_right_sidebar_name = $tvlgiao_wpdance_wd_data['wd_blog_right_sidebar'];
		}
	
	?>	
		
		<div id="container" class="page-template archive-page">
			<div id="content" class="container" role="main">
				
				<?php if( $_left_sidebar ): ?>
						<div id="left-content" class="col-sm-6">
							<div class="sidebar-content wd-sidebar">
								<?php
									if ( is_active_sidebar( $_left_sidebar_name ) ) : ?>
										<ul class="xoxo">
											<?php dynamic_sidebar( $_left_sidebar_name ); ?>
										</ul>
								<?php endif; ?>
							</div>
						</div>
					<?php wp_reset_postdata();?>
				<?php endif;?>
				
				<div id="container-main" class="<?php echo esc_attr($_main_class);?>">
					<div class="main-content">
								
						<?php	
							get_template_part( 'content', get_post_format() ); 
						?>
						<?php  $wp_query = TvlgiaoWpdanceClassNameVar::TVLGiao_wpdance_GetVar("wp_query");
							$total_pages = max( 1, $wp_query->max_num_pages );
							if( $total_pages>1 ){
						?>
							<div class="page_navi">
								<!--div class="nav-previous"><?php previous_posts_link( esc_html__( 'Prev Entries', 'wpgeneral' ) ); ?></div-->
								<div class="nav-content"><?php tvlgiao_wpdance_ew_pagination();?></div>
								<!--div class="nav-next"><?php next_posts_link( esc_html__( 'Next Entries', 'wpgeneral' ) ); ?></div-->
							</div>
						<?php } ?>
					<?php wp_reset_postdata();?>
	
					</div>
				</div><!-- end content -->
				
				
				<?php if( $_right_sidebar ): ?>
					<div id="right-content" class="col-sm-6">
						<div class="sidebar-content wd-sidebar">
						<?php
							if ( is_active_sidebar( $_right_sidebar_name ) ) : ?>
								<ul class="xoxo">
									<?php dynamic_sidebar( $_right_sidebar_name ); ?>
								</ul>
						<?php endif; ?>
						</div>
					</div>
					<?php wp_reset_postdata();?>
				<?php endif;?>
			
			</div><!-- #content -->
		</div><!-- #container -->
		
<?php get_footer(); ?>