<?php 
/**
 *	Template Name: Fullwidth Template
 */
get_header();

$page_options = upstore_get_page_options();

$extra_class = '';

$show_breadcrumb = ( !is_home() && !is_front_page() && $page_options['ts_show_breadcrumb'] );
$show_page_title = ( !is_home() && !is_front_page() && $page_options['ts_show_page_title'] );

if( $show_breadcrumb || $show_page_title ){
	$extra_class = 'show_breadcrumb_'.upstore_get_theme_options('ts_breadcrumb_layout');
}

upstore_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
?>
<div class="page-template fullwidth-template <?php echo esc_attr($extra_class) ?>">
	<!-- Page slider -->
	<?php if( $page_options['ts_page_slider'] && $page_options['ts_page_slider_position'] == 'before_main_content' ): ?>
	<div class="top-slideshow">
		<div class="top-slideshow-wrapper">
			<?php upstore_show_page_slider(); ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="page-fullwidth-template">
		
		<!-- Main Content -->
		<div id="main-content">	
			<div id="primary" class="site-content">
			<?php 
				if( class_exists('WooCommerce') ){
					wc_print_notices();
				}
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php 
						if( have_posts() ) the_post();
						the_content();
						wp_link_pages();
					?>
				</article>
			</div>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>