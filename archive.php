<?php
get_header();

$theme_options = upstore_get_theme_options();

$page_column_class = upstore_page_layout_columns_class( $theme_options['ts_blog_layout'] );

$show_breadcrumb = apply_filters('upstore_show_breadcrumb_on_archive_post', true);
$show_page_title = apply_filters('upstore_show_page_title_on_archive_post', true);
$page_title = '';
$extra_class = '';
if( $show_breadcrumb || $show_page_title ){
	$extra_class = 'show_breadcrumb_'.$theme_options['ts_breadcrumb_layout'];
}

if( $show_page_title ){
	switch( true ){
		case is_day():
			$page_title = esc_html__( 'Day: ', 'upstore' ) . get_the_date();
		break;
		case is_month():
			$page_title = esc_html__( 'Month: ', 'upstore' ) . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'upstore' ) );
		break;
		case is_year():
			$page_title = esc_html__( 'Year: ', 'upstore' ) . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'upstore' ) );
		break;
		case is_search():
			$page_title = esc_html__( 'Search Results for: ', 'upstore' ) . get_search_query();
		break;
		case is_tag():
			$page_title = esc_html__( 'Tag: ', 'upstore' ) . single_tag_title( '', false );
		break;
		case is_category():
			$page_title = esc_html__( 'Category: ', 'upstore' ) . single_cat_title( '', false );
		break;
		case is_404():
			$page_title = esc_html__( 'OOPS! FILE NOT FOUND', 'upstore' );
		break;
		default:
			$page_title = esc_html__( 'Archives', 'upstore' );
		break;
	}
}

upstore_breadcrumbs_title($show_breadcrumb, $show_page_title, $page_title);
?>

<div class="page-container page-template archive-template <?php echo esc_attr($extra_class) ?>">
	
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<aside id="left-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['left_sidebar_class']); ?>">
		<?php if( is_active_sidebar( $theme_options['ts_blog_left_sidebar'] ) ): ?>
			<?php dynamic_sidebar( $theme_options['ts_blog_left_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>	
	
	<!-- Main Content -->
	<div id="main-content" class="<?php echo esc_attr($page_column_class['main_class']); ?>">	
		<div id="primary" class="site-content">
		
			<?php	
				if( have_posts() ):
					echo '<div class="list-posts">';
					while( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() ); 
					endwhile;
					echo '</div>';
				else:
					echo '<div class="alert alert-error">'.esc_html__('Sorry. There are no posts to display', 'upstore').'</div>';
				endif;
				
				upstore_pagination();
			?>
			
		</div>
	</div>
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<aside id="right-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['right_sidebar_class']); ?>">
		<?php if( is_active_sidebar( $theme_options['ts_blog_right_sidebar'] ) ): ?>
			<?php dynamic_sidebar( $theme_options['ts_blog_right_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>
	
</div>

<?php
get_footer();
