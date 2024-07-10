<?php 
/*** Activate Theme ***/
function upstore_theme_activation(){
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset($_GET['activated']) )
	{
		if( get_option( 'woocommerce_single_image_width' ) === false ){
			/* Single Image */
			update_option('woocommerce_single_image_width', 900);
			
			/* Thumbnail Image */
			update_option('woocommerce_thumbnail_image_width', 350);
			update_option('woocommerce_thumbnail_cropping', 'custom');
			update_option('woocommerce_thumbnail_cropping_custom_width', 350);
			update_option('woocommerce_thumbnail_cropping_custom_height', 420);
		}
		
		if( get_option( 'yith_woocompare_image_size' ) === false ){
			update_option( 'yith_woocompare_image_size', array( 'width' => '350', 'height' => '420', 'crop' => 1 ) );
		}
	}
}
add_action('admin_init', 'upstore_theme_activation');

/*** Theme Setup ***/
function upstore_theme_setup(){
	/* Add editor-style.css file*/
	add_editor_style();
	
	/* Add Theme Support */
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'quote', 'video' ) );		
	
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	$defaults = array(
		'default-color'         => ''
		,'default-image'        => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
	add_theme_support( 'woocommerce' );
	
	remove_theme_support( 'widgets-block-editor' );
	
	if ( ! isset( $content_width ) ){ $content_width = 1200; }
	
	/* Translation */
	load_theme_textdomain( 'upstore', get_template_directory() . '/languages' );
	
	/* Register Menu Location */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Navigation', 'upstore' ),
	) );
	register_nav_menus( array(
		'vertical' => esc_html__( 'Vertical Navigation', 'upstore' ),
	) );
	register_nav_menus( array(
		'mobile' => esc_html__( 'Mobile Navigation', 'upstore' ),
	) );
}
add_action( 'after_setup_theme', 'upstore_theme_setup');

add_action('init', 'upstore_support_wc_product_gallery_lightbox');
function upstore_support_wc_product_gallery_lightbox(){
	if( !upstore_get_theme_options('ts_prod_cloudzoom') ){
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
}

/*** Add Image Size ***/
function upstore_add_image_size(){
	add_image_size('upstore_menu_icon_thumb', (int) upstore_get_theme_options('ts_menu_thumb_width'), (int) upstore_get_theme_options('ts_menu_thumb_height'), true);
	
	add_image_size('upstore_blog_shortcode_thumb', 690, 460, true);
	add_image_size('upstore_blog_thumb', 1170, 780, true);
	
	add_image_size('upstore_product_cat', 450, 700, true);
}
add_action('init', 'upstore_add_image_size');

add_filter('subcategory_archive_thumbnail_size', 'upstore_subcategory_archive_thumbnail_size');
function upstore_subcategory_archive_thumbnail_size(){
	return 'upstore_product_cat';
}

/*** Get Theme Version ***/
function upstore_get_theme_version(){
	$theme = wp_get_theme();
	if( $theme->parent() ){
		return $theme->parent()->get('Version');
	}
	else{
		return $theme->get('Version');
	}
}

/*** Register Front End Scripts  ***/
function upstore_register_scripts(){
	$theme_version = upstore_get_theme_version();
	wp_deregister_style( 'font-awesome' ); /* Prevent loading version 5 */
	wp_deregister_style( 'yith-wcwl-font-awesome' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), $theme_version );
	
	wp_enqueue_style( 'upstore-reset', get_template_directory_uri() . '/css/reset.css', array(), $theme_version );
	
	wp_enqueue_style( 'upstore-style', get_stylesheet_uri(), array(), $theme_version );
	
	if( upstore_get_theme_options('ts_responsive') ){
		wp_enqueue_style( 'upstore-responsive', get_template_directory_uri() . '/css/responsive.css', array(), $theme_version );
	}
	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), $theme_version );
	
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), $theme_version );
	
	if( upstore_get_theme_options('ts_search_by_category') ){
		wp_enqueue_style( 'select2', get_template_directory_uri() . '/css/select2.css', array(), $theme_version );
	}
	
	if( upstore_get_theme_options('ts_enable_rtl') ){
		wp_enqueue_style( 'upstore-rtl', get_template_directory_uri() . '/css/rtl.css', array(), $theme_version );
		if( upstore_get_theme_options('ts_responsive') ){
			wp_enqueue_style( 'upstore-rtl-responsive', get_template_directory_uri() . '/css/rtl-responsive.css', array(), $theme_version );
		}
	}
	
	wp_enqueue_script( 'wc-cart-fragments' );
	
	wp_enqueue_script( 'jquery-throttle-debounce', get_template_directory_uri() . '/js/jquery.throttle-debounce.min.js', array('jquery'), $theme_version, true );
	
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), $theme_version, true );
	
	wp_register_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), $theme_version, true );
	
	wp_enqueue_script( 'upstore-script', get_template_directory_uri() . '/js/main.js', array('jquery'), $theme_version, true );
	
	if( wp_is_mobile() && upstore_get_theme_options('ts_add_to_cart_effect') == 'fly_to_cart' ){
		upstore_change_theme_options('ts_add_to_cart_effect', '');
	}
	
	if( defined('ICL_LANGUAGE_CODE') ){
		$ajax_url = admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE, 'relative');
	}
	else{
		$ajax_url = admin_url('admin-ajax.php', 'relative');
	}
	
	$script_params = array(
		'ajax_url'					=> $ajax_url
		,'sticky_header'			=> (int)(!wp_is_mobile() && upstore_get_theme_options('ts_enable_sticky_header'))
		,'responsive'				=> (int)upstore_get_theme_options('ts_responsive')
		,'ajax_search'				=> (int)upstore_get_theme_options('ts_ajax_search')
		,'show_cart_after_adding'	=> (int)upstore_get_theme_options('ts_show_shopping_cart_after_adding')
		,'add_to_cart_effect'		=> upstore_get_theme_options('ts_add_to_cart_effect')
	);
	
	wp_localize_script( 'upstore-script', 'upstore_params', $script_params );
	
	if( is_singular('product') && upstore_get_theme_options('ts_prod_cloudzoom') ){
		wp_enqueue_script( 'cloud-zoom', get_template_directory_uri() . '/js/cloud-zoom.js', array('jquery'), $theme_version, true );
	}
	
	wp_register_script( 'jquery-caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1.min.js', array(), $theme_version, true );
	if( is_singular('product') && upstore_get_theme_options('ts_prod_thumbnails_style') == 'vertical' ){
		wp_enqueue_script( 'jquery-caroufredsel' );
	}
	
	wp_register_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.min.js', array('jquery'), $theme_version, true );
	
	if( upstore_get_theme_options('ts_search_by_category') ){
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array(), $theme_version, true );
	}
	
	wp_register_script( 'threesixty', get_template_directory_uri() . '/js/threesixty.js', array(), $theme_version, true );
	
	if( !wp_is_mobile() && upstore_get_theme_options('ts_smooth_scroll') ){
		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array(), $theme_version, true );
	}
	
	wp_register_script( 'jquery-mb-ytplayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.min.js', array(), $theme_version, true );
	
	if( !wp_is_mobile() && upstore_get_theme_options('ts_enable_sticky_header') ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), $theme_version, true );
	}
	
	if( is_single() && get_option( 'thread_comments' ) ){ 	
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* Load default google fonts */
	if( !class_exists('ReduxFramework') ){
		wp_enqueue_style( 'upstore-google-fonts', '//fonts.googleapis.com/css?family=Poppins:400,500,600|Damion:400' );
	}
	
	/* Custom JS */
	if( $custom_js = upstore_get_theme_options('ts_custom_javascript_code') ){
		wp_add_inline_script( 'upstore-script', stripslashes( trim( $custom_js ) ) );
	}
}
add_action('wp_enqueue_scripts', 'upstore_register_scripts', 1000);

function upstore_get_last_save_theme_options(){
	$transients = get_option('upstore_theme_options-transients', array());
	if( isset($transients['last_save']) ){
		return $transients['last_save'];
	}
	return time();
}

function upstore_register_custom_style(){
	$upload_dir = wp_get_upload_dir();
	$theme_name = strtolower(str_replace(' ', '', wp_get_theme()->get('Name')));
	$filename = trailingslashit($upload_dir['baseurl']) . $theme_name . '.css';
	$filename_dir = trailingslashit($upload_dir['basedir']) . $theme_name . '.css';

	if( file_exists( $filename_dir ) ){ 
		wp_enqueue_style('upstore-dynamic-css', $filename, array(), upstore_get_last_save_theme_options());
	}
	else{
		ob_start();
		include_once get_template_directory() . '/framework/dynamic_style.php';
		$dynamic_css = ob_get_contents();
		ob_end_clean();
		wp_add_inline_style( 'upstore-style', $dynamic_css );
	}
}
add_action('wp_enqueue_scripts', 'upstore_register_custom_style', 9999);

/* Add font style to compare popup - can not use wp_enqueue_scripts hook */
if( isset($_GET['action']) && $_GET['action'] == 'yith-woocompare-view-table' ){
	add_action('wp_print_styles', 'upstore_add_font_style_to_compare_popup', 1000);
}
function upstore_add_font_style_to_compare_popup(){
	wp_enqueue_style( 'redux-google-fonts-upstore_theme_options' ); /* upstore_theme_options is the variable/key of theme options, so it has to use _ */
	wp_enqueue_style( 'upstore-reset' );
	wp_enqueue_style( 'upstore-style' );
	wp_enqueue_style( 'font-awesome' );
	if( upstore_get_theme_options('ts_enable_rtl') ){
		wp_enqueue_style( 'upstore-rtl' );
	}
	wp_enqueue_style( 'upstore-dynamic-css' );
}

/*** Register Back End Scripts ***/
function upstore_register_admin_scripts(){
	$theme_version = upstore_get_theme_version();
	wp_enqueue_media();
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), $theme_version );
	
	wp_enqueue_style( 'upstore-admin-style', get_template_directory_uri() . '/css/admin_style.css', array(), $theme_version );
	
	wp_enqueue_script( 'upstore-admin-script', get_template_directory_uri() . '/js/admin_main.js', array('jquery'), $theme_version, true );
}
add_action('admin_enqueue_scripts', 'upstore_register_admin_scripts');

/*** Global Page Options ***/
if( !function_exists('upstore_set_global_page_options') ){
	function upstore_set_global_page_options( $page_id = 0 ){
		global $upstore_page_options;
		$post_custom = get_post_custom( $page_id );
		if( !is_array($post_custom) ){
			$post_custom = array();
		}
		foreach( $post_custom as $key => $value ){
			if( isset($value[0]) ){
				$upstore_page_options[$key] = $value[0];
			}
		}
		
		$default_options = array(
							'ts_layout_style'						=> 'default'
							,'ts_page_layout'						=> '0-1-0'
							,'ts_left_sidebar'						=> ''
							,'ts_right_sidebar'						=> ''
							,'ts_header_layout'						=> 'default'
							,'ts_header_transparent'				=> 0
							,'ts_header_text_color'					=> 'default'
							,'ts_menu_id'							=> 0
							,'ts_display_vertical_menu_by_default'	=> 0
							,'ts_breadcrumb_layout'					=> 'default'
							,'ts_breadcrumb_bg_parallax'			=> 'default'
							,'ts_bg_breadcrumbs'					=> ''
							,'ts_logo'								=> ''
							,'ts_logo_mobile'						=> ''
							,'ts_logo_sticky'						=> ''
							,'ts_show_breadcrumb'					=> 1
							,'ts_show_page_title'					=> 1
							,'ts_page_slider'						=> 0
							,'ts_page_slider_position'				=> 'before_main_content'
							,'ts_rev_slider'						=> 0
							,'ts_first_footer_area'					=> 0
							,'ts_second_footer_area'				=> 0
							);
		$upstore_page_options = array_merge($default_options, (array) $upstore_page_options);
		return $upstore_page_options;
	}
}

if( !function_exists('upstore_get_page_options') ){
	function upstore_get_page_options( $key = '', $default = '' ){
		global $upstore_page_options;
		if( !$key ){
			return $upstore_page_options;
		}
		else if( isset($upstore_page_options[$key]) ){
			return $upstore_page_options[$key];
		}
		else{
			return $default;
		}
	}
}

/*** Vertical Menu Heading ***/
if( !function_exists ('upstore_get_vertical_menu_heading') ){
	function upstore_get_vertical_menu_heading(){
		$locations = get_nav_menu_locations();
		if( isset($locations['vertical']) ){
			$menu = wp_get_nav_menu_object($locations['vertical']);
			if( isset( $menu->name ) ){
				return $menu->name;
			}
		}
		return esc_html__('Shop by category', 'upstore');
	}
}

/*** Get excerpt ***/
if( !function_exists ('upstore_string_limit_words') ){
	function upstore_string_limit_words($string, $word_limit){
		$words = explode(' ', $string, ($word_limit + 1));
		if( count($words) > $word_limit ){
			array_pop($words);
		}
		return implode(' ', $words);
	}
}

if( !function_exists ('upstore_the_excerpt_max_words') ){
	function upstore_the_excerpt_max_words( $word_limit = -1, $post = '', $strip_tags = true, $extra_str = '', $echo = true ) {
		if( $post ){
			$excerpt = upstore_get_the_excerpt_by_id($post->ID);
		}
		else{
			$excerpt = get_the_excerpt();
		}
			
		if( $strip_tags ){
			$excerpt = wp_strip_all_tags($excerpt);
			$excerpt = strip_shortcodes($excerpt);
		}
			
		if( $word_limit != -1 )
			$result = upstore_string_limit_words($excerpt, $word_limit);
		else
			$result = $excerpt;
		
		$result .= $extra_str;
			
		if( $echo ){
			echo do_shortcode($result);
		}
		return $result;
	}
}

if( !function_exists('upstore_get_the_excerpt_by_id') ){
	function upstore_get_the_excerpt_by_id( $post_id = 0 )
	{
		global $wpdb;
		$query = "SELECT post_excerpt, post_content FROM $wpdb->posts WHERE ID = %d LIMIT 1";
		$result = $wpdb->get_results( $wpdb->prepare($query, $post_id), ARRAY_A );
		if( $result[0]['post_excerpt'] ){
			return $result[0]['post_excerpt'];
		}
		else{
			return $result[0]['post_content'];
		}
	}
}

/* Get User Role */
if( !function_exists('upstore_get_user_role') ){
	function upstore_get_user_role( $user_id ){
		global $wpdb;
		$user = get_userdata( $user_id );
		$capabilities = $user->{$wpdb->prefix . 'capabilities'};
		if( empty($capabilities) ){
			return '';
		}
		if ( !isset( $wp_roles ) ){
			$wp_roles = new WP_Roles();
		}
		foreach ( $wp_roles->role_names as $role => $name ) {
			if ( array_key_exists( $role, $capabilities ) ) {
				return $role;
			}
		}
		return '';
	}
}

/*** Page Layout Columns Class ***/
if( !function_exists('upstore_page_layout_columns_class') ){
	function upstore_page_layout_columns_class($page_column){
		$data = array();
		
		if( empty($page_column) ){
			$page_column = '0-1-0';
		}
		
		$layout_config = explode('-', $page_column);
		$left_sidebar = (int)$layout_config[0];
		$right_sidebar = (int)$layout_config[2];
		$main_class = ($left_sidebar + $right_sidebar) == 2 ?'ts-col-12':( ($left_sidebar + $right_sidebar) == 1 ?'ts-col-18':'ts-col-24' );			
		
		$data['left_sidebar'] = $left_sidebar;
		$data['right_sidebar'] = $right_sidebar;
		$data['main_class'] = $main_class;
		$data['left_sidebar_class'] = 'ts-col-6';
		$data['right_sidebar_class'] = 'ts-col-6';
		
		return $data;
	}
}

/*** Show Page Slider ***/
function upstore_show_page_slider(){
	$page_options = upstore_get_page_options();
	switch( $page_options['ts_page_slider'] ){
		case 'revslider':
			if( class_exists('RevSliderSlider') && $page_options['ts_rev_slider'] ){
				echo do_shortcode('[rev_slider alias="'.$page_options['ts_rev_slider'].'"]');
			}
		break;
		default:
		break;
	}
}

/*** Get Portfolio Page Info ***/
function upstore_get_portfolio_page_info( $return_url = false ){
	$page_id = upstore_get_theme_options('ts_portfolio_page');
	if( $page_id ){
		if( $return_url ){
			return get_permalink($page_id);
		}
		else{
			$page = get_post( $page_id );
			if( $page ){
				return array( 'title' => $page->post_title, 'url' => get_permalink($page_id) );
			}
		}
	}
	return '';
}

/*** Breadcrumbs ***/
if( !function_exists('upstore_breadcrumbs') ){
	function upstore_breadcrumbs(){
		$delimiter_char = '&#47;';
		if( class_exists('WooCommerce') ){
			if( function_exists('woocommerce_breadcrumb') && function_exists('is_woocommerce') && is_woocommerce() ){
				woocommerce_breadcrumb(array('wrap_before'=>'<div class="breadcrumbs"><div class="breadcrumbs-container">','delimiter'=>'<span>'.$delimiter_char.'</span>','wrap_after'=>'</div></div>'));
				return;
			}
		}
		
		if( function_exists('bbp_breadcrumb') && function_exists('is_bbpress') && is_bbpress() ){
			$args = array(
				'before' 			=> '<div class="breadcrumbs"><div class="breadcrumbs-container">'
				,'after' 			=> '</div></div>'
				,'sep' 				=> $delimiter_char
				,'sep_before' 		=> '<span class="brn_arrow">'
				,'sep_after' 		=> '</span>'
				,'current_before' 	=> '<span class="current">'
				,'current_after' 	=> '</span>'
			);
			
			bbp_breadcrumb( $args );
			/* Remove bbpress breadcrumbs */
			add_filter('bbp_no_breadcrumb', '__return_true', 999);
			return;
		}

		$allowed_html = array(
			'a'		=> array('href' => array(), 'title' => array())
			,'span'	=> array('class' => array())
			,'div'	=> array('class' => array())
		);
		$output = '';

		$delimiter = '<span class="brn_arrow">'.$delimiter_char.'</span>';
		
		$front_id = get_option( 'page_on_front' );
		if( !empty( $front_id ) ){
			$home = get_the_title( $front_id );
		}else{
			$home = esc_html__( 'Home', 'upstore' );
		}
		$ar_title = array(
					'search' 		=> esc_html__('Search results for ', 'upstore')
					,'404' 			=> esc_html__('Error 404', 'upstore')
					,'tagged' 		=> esc_html__('Tagged ', 'upstore')
					,'author' 		=> esc_html__('Articles posted by ', 'upstore')
					,'page' 		=> esc_html__('Page', 'upstore')
					);
	  
		$before = '<span class="current">'; /* tag before the current crumb */
		$after = '</span>'; /* tag after the current crumb */
		global $wp_rewrite, $post;
		$rewriteUrl = $wp_rewrite->using_permalinks();
		if( !is_home() && !is_front_page() || is_paged() ){
			$output .= '<div class="breadcrumbs"><div class="breadcrumbs-container">';
	 
			$homeLink = esc_url( home_url('/') ); 
			$output .= '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
			if( is_category() ){
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				if( $thisCat->parent != 0 ){ 
					$output .= get_category_parents($parentCat, true, ' ' . $delimiter . ' ');
				}
				$output .= $before . single_cat_title('', false) . $after;
			}
			elseif( is_search() ){
				$output .= $before . $ar_title['search'] . '"' . get_search_query() . '"' . $after;
			}elseif( is_day() ){
				$output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				$output .= '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				$output .= $before . get_the_time('d') . $after;
			}elseif( is_month() ){
				$output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				$output .= $before . get_the_time('F') . $after;
			}elseif( is_year() ){
				$output .= $before . get_the_time('Y') . $after;
			}elseif( is_single() && !is_attachment() ){
				if( get_post_type() != 'post' ){
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					$post_type_name = $post_type->labels->singular_name;
					if( is_singular('ts_portfolio') ){
						$portfolio_page_info = upstore_get_portfolio_page_info();
						if( $portfolio_page_info ){
							$post_type_name = $portfolio_page_info['title'];
							$portfolio_url = $portfolio_page_info['url'];
						}
					}
					if( $rewriteUrl ){
						$output .= '<a href="' . (isset($portfolio_url)?$portfolio_url:$homeLink . $slug['slug'] . '/') . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}else{
						$output .= '<a href="' . (isset($portfolio_url)?$portfolio_url:$homeLink . '?post_type=' . get_post_type()) . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}
					$output .= $before . get_the_title() . $after;
			    }else{
					$cat = get_the_category(); $cat = $cat[0];
					$output .= get_category_parents($cat, true, ' ' . $delimiter . ' ');
					$output .= $before . get_the_title() . $after;
			    }
			}elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				$post_type_name = $post_type->labels->singular_name;
			    if( isset($slug['slug']) && $slug['slug'] == 'portfolio' ){
					$portfolio_page_info = upstore_get_portfolio_page_info();
					if( $portfolio_page_info ){
						$post_type_name = $portfolio_page_info['title'];
						$portfolio_url = $portfolio_page_info['url'];
					}
			    }
				if( is_tag() ){
					$output .= $before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after;
				}
				elseif( is_taxonomy_hierarchical(get_query_var('taxonomy')) ){
					if( $rewriteUrl ){
						$output .= '<a href="' . (isset($portfolio_url)?$portfolio_url:$homeLink . $slug['slug'] . '/') . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}else{
						$output .= '<a href="' . (isset($portfolio_url)?$portfolio_url:$homeLink . '?post_type=' . get_post_type()) . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
					}			
					
					$curTaxanomy = get_query_var('taxonomy');
					$curTerm = get_query_var( 'term' );
					$termNow = get_term_by( 'name', $curTerm, $curTaxanomy );
					$pushPrintArr = array();
					if( $termNow !== false ){
						while( (int)$termNow->parent != 0 ){
							$parentTerm = get_term((int)$termNow->parent,get_query_var('taxonomy'));
							array_push($pushPrintArr,'<a href="' . get_term_link((int)$parentTerm->term_id,$curTaxanomy) . '">' . $parentTerm->name . '</a> ' . $delimiter . ' ');
							$curTerm = $parentTerm->name;
							$termNow = get_term_by( 'name', $curTerm, $curTaxanomy );
						}
					}
					$pushPrintArr = array_reverse($pushPrintArr);
					array_push($pushPrintArr,$before  . get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )->name  . $after);
					$output .= implode($pushPrintArr);
				}else{
					$output .= $before . $post_type_name . $after;
				}
			}elseif( is_attachment() ){
				if( (int)$post->post_parent > 0 ){
					$parent = get_post($post->post_parent);
					$cat = get_the_category($parent->ID);
					if( count($cat) > 0 ){
						$cat = $cat[0];
						$output .= get_category_parents($cat, true, ' ' . $delimiter . ' ');
					}
					$output .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				}
				$output .= $before . get_the_title() . $after;
			}elseif( is_page() && !$post->post_parent ){
				$output .= $before . get_the_title() . $after;
			}elseif( is_page() && $post->post_parent ){
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while( $parent_id ){
					$page = get_post($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
			    }
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach( $breadcrumbs as $crumb ){
					$output .= $crumb . ' ' . $delimiter . ' ';
				}
				$output .= $before . get_the_title() . $after;
			}elseif( is_tag() ){
				$output .= $before . $ar_title['tagged'] . '"' . single_tag_title('', false) . '"' . $after;
			}elseif( is_author() ){
				global $author;
				$userdata = get_userdata($author);
				$output .= $before . $ar_title['author'] . $userdata->display_name . $after;
			}elseif( is_404() ){
				$output .= $before . $ar_title['404'] . $after;
			}
			if( get_query_var('paged') || get_query_var('page') ){
				if( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ){ 
					$output .= $before .' ('; 
				}
				$output .= $ar_title['page'] . ' ' . ( get_query_var('paged')?get_query_var('paged'):get_query_var('page') );
				if( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() ||  is_post_type_archive() || is_archive() ){ 
					$output .= ')'. $after; 
				}
			}
			$output .= '</div></div>';
	    }
		
		echo wp_kses($output, $allowed_html);
		
		wp_reset_postdata();
	}
}

if( !function_exists('upstore_breadcrumbs_title') ){
	function upstore_breadcrumbs_title( $show_breadcrumb = false, $show_page_title = false, $page_title = '', $extra_class_title = '' ){
		$theme_options = upstore_get_theme_options();
		if( $show_breadcrumb || $show_page_title ){
			$breadcrumb_bg_option = is_array($theme_options['ts_bg_breadcrumbs'])?$theme_options['ts_bg_breadcrumbs']['url']:$theme_options['ts_bg_breadcrumbs'];
			$breadcrumb_bg = '';
			$classes = array();
			$classes[] = 'breadcrumb-title-wrapper breadcrumb-' . $theme_options['ts_breadcrumb_layout'];
			$classes[] = $show_breadcrumb?'':'no-breadcrumb';
			$classes[] = $show_page_title?'':'no-title';
			if( $theme_options['ts_enable_breadcrumb_background_image'] && $theme_options['ts_breadcrumb_layout'] != 'v2' ){
				if( $breadcrumb_bg_option == '' ){ /* No Override */
					$breadcrumb_bg = get_template_directory_uri() . '/images/bg_breadcrumb_'.$theme_options['ts_breadcrumb_layout'].'.jpg';
				}	
				else{
					$breadcrumb_bg = $breadcrumb_bg_option;
				}
			}
			
			$style = '';
			if( $breadcrumb_bg != '' ){
				$style = 'style="background-image: url('. esc_url($breadcrumb_bg) .')"';
				if( $theme_options['ts_breadcrumb_bg_parallax'] ){
					$classes[] = 'ts-breadcrumb-parallax';
				}
			}
			echo '<div class="'.esc_attr(implode(' ', array_filter($classes))).'" '.$style.'><div class="breadcrumb-content"><div class="breadcrumb-title">';
				if( $show_page_title ){
					echo '<h1 class="heading-title page-title entry-title '.$extra_class_title.'">'.$page_title.'</h1>';
				}
				if( $show_breadcrumb ){
					upstore_breadcrumbs();
				}
			echo '</div></div></div>';
		}
	}
}

/*** Pagination ***/
if( !function_exists('upstore_pagination') ){
	function upstore_pagination( $query = null ){
		global $wp_query;
		$max_num_pages = $wp_query->max_num_pages;
		$paged = $wp_query->get( 'paged' );
		if( $query != null ){
			$max_num_pages = $query->max_num_pages;
			$paged = $query->get( 'paged' );
		}
		if( !$paged ){
			$paged = 1;
		}
		?>
		<nav class="ts-pagination">
			<?php
			echo paginate_links( array(
				'base'         	=> esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) )
				,'format'       => ''
				,'add_args'     => ''
				,'current'      => max( 1, $paged )
				,'total'        => $max_num_pages
				,'prev_text'    => '&larr;'
				,'next_text'    => '&rarr;'
				,'type'         => 'list'
				,'end_size'     => 3
				,'mid_size'     => 3
			) );
			?>
		</nav>
		<?php
	}
}

/*** Logo ***/
if( !function_exists('upstore_theme_logo') ){
	function upstore_theme_logo(){
		$theme_options = upstore_get_theme_options();
		$logo_image = is_array($theme_options['ts_logo'])?$theme_options['ts_logo']['url']:$theme_options['ts_logo'];
		$logo_image_mobile = is_array($theme_options['ts_logo_mobile'])?$theme_options['ts_logo_mobile']['url']:$theme_options['ts_logo_mobile'];
		$logo_image_sticky = is_array($theme_options['ts_logo_sticky'])?$theme_options['ts_logo_sticky']['url']:$theme_options['ts_logo_sticky'];
		$logo_text = stripslashes($theme_options['ts_text_logo']);
		
		if( !$logo_image_sticky ){
			$logo_image_sticky = $logo_image;
		}
		if( !$logo_image_mobile ){
			$logo_image_mobile = $logo_image;
		}
		if( !$logo_text ){
			$logo_text = get_bloginfo('name');
		}
		?>
		<div class="logo">
			<a href="<?php echo esc_url( home_url('/') ); ?>">
			<!-- Main logo -->
			<?php if( $logo_image ): ?>
				<img src="<?php echo esc_url($logo_image); ?>" alt="<?php echo esc_attr($logo_text); ?>" title="<?php echo esc_attr($logo_text); ?>" class="normal-logo" />
			<?php endif; ?>
			
			<!-- Main logo on mobile -->
			<?php if( $logo_image_mobile ): ?>
				<img src="<?php echo esc_url($logo_image_mobile); ?>" alt="<?php echo esc_attr($logo_text); ?>" title="<?php echo esc_attr($logo_text); ?>" class="normal-logo mobile-logo" />
			<?php endif; ?>
			
			<!-- Sticky logo -->
			<?php if( $logo_image_sticky ): ?>
				<img src="<?php echo esc_url($logo_image_sticky); ?>" alt="<?php echo esc_attr($logo_text); ?>" title="<?php echo esc_attr($logo_text); ?>" class="normal-logo sticky-logo" />
			<?php endif; ?>
			
			<!-- Logo Text -->
			<?php 
			if( !$logo_image ){
				echo esc_html($logo_text); 
			}
			?>
			</a>
		</div>
		<?php
	}
}

/*** Pingback URL ***/
add_action('wp_head', 'upstore_pingback_header');
if( !function_exists('upstore_pingback_header') ){
	function upstore_pingback_header(){
		if( is_singular() && pings_open() ){
		?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php
		}
	}
}

/*** Favicon ***/
if( !function_exists('upstore_theme_favicon') ){
	function upstore_theme_favicon(){
		if( function_exists('wp_site_icon') && function_exists('has_site_icon') && has_site_icon() ){
			return;
		}
		$favicon_option = upstore_get_theme_options('ts_favicon');
		$favicon = is_array($favicon_option)?$favicon_option['url']:$favicon_option;
		if( $favicon ):
		?>
			<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" />
		<?php
		endif;
	}
}

/*** Header Template ***/
if( !function_exists('upstore_get_header_template') ){
	function upstore_get_header_template(){
		get_template_part('templates/headers/header', upstore_get_theme_options('ts_header_layout'));
	}
}

if( !function_exists('upstore_get_footer_content') ){
	function upstore_get_footer_content( $footer_block_id = 0 ){
		global $post;
		$args = array(
			'post_type' 		=> 'ts_footer_block'
			,'posts_per_page' 	=> 1
			,'p' 				=> $footer_block_id
		);
		$posts = get_posts($args);
		if( is_array($posts) ){
			add_filter( 'the_content', 'do_shortcode', 11 ); /* Some plugins remove do_shortcode from the_content */
			foreach( $posts as $post ){
				setup_postdata($post);
				the_content();
			}
		}
		wp_reset_postdata();
	}
}

/*** Product Search Form by Category ***/
if( !function_exists('upstore_get_search_form_by_category') ){
	function upstore_get_search_form_by_category(){
		$enable_category = upstore_get_theme_options('ts_search_by_category');
		
		$search_for_product = class_exists('WooCommerce');
		if( $search_for_product ){
			$taxonomy = 'product_cat';
			$post_type = 'product';
			$placeholder_text = esc_html__('Search for products', 'upstore');
		}
		else{
			$taxonomy = 'category';
			$post_type = 'post';
			$placeholder_text = esc_html__('Search', 'upstore');
		}
		
		?>
		<div class="ts-search-by-category <?php echo esc_attr($enable_category?'':'no-category'); ?>">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if( $enable_category ): ?>
					<select class="select-category" name="term"><?php echo upstore_search_by_category_get_option_html($taxonomy, 0, 0); ?></select>
				<?php endif; ?>
				<div class="search-content">
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo esc_attr($placeholder_text) ?>" autocomplete="off" />
					<input type="submit" title="<?php esc_attr_e( 'Search', 'upstore' ); ?>" value="<?php esc_attr_e( 'Search', 'upstore' ); ?>" />
					<input type="hidden" name="post_type" value="<?php echo esc_attr($post_type) ?>" />
					<?php if( $enable_category ): ?>
						<input type="hidden" name="taxonomy" value="<?php echo esc_attr($taxonomy) ?>" />
					<?php endif; ?>
				</div>
			</form>
		</div>
		<?php	
	}
}

if( !function_exists('upstore_search_by_category_get_option_html') ){
	function upstore_search_by_category_get_option_html($taxonomy = 'product_cat', $parent = 0, $level = 0){
		$options = '';
		$spacing = '';
		
		if( $level == 0 ){
			$options = '<option value="">'.esc_html__('All categories', 'upstore').'</option>';
		}
		
		for( $i = 0; $i < $level * 3 ; $i++ ){
			$spacing .= '&nbsp;';
		}
		
		$args = array(
			'taxonomy'		=> $taxonomy
			,'number'     	=> ''
			,'hide_empty'	=> 1
			,'orderby'		=>'name'
			,'order'		=>'asc'
			,'parent'		=> $parent
		);
		
		$select = '';
		$categories = get_terms($args);
		if( is_search() &&  isset($_GET['term']) && $_GET['term'] != '' ){
			$select = $_GET['term'];
		}
		$level++;
		if( is_array($categories) ){
			foreach( $categories as $cat ){
				$options .= '<option value="' . $cat->slug . '" ' . selected($select, $cat->slug, false) . '>' . $spacing . $cat->name . '</option>';
				$options .= upstore_search_by_category_get_option_html($taxonomy, $cat->term_id, $level);
			}
		}
		
		return $options;
	}
}

/* Ajax search */
add_action( 'wp_ajax_upstore_ajax_search', 'upstore_ajax_search' );
add_action( 'wp_ajax_nopriv_upstore_ajax_search', 'upstore_ajax_search' );
if( !function_exists('upstore_ajax_search') ){
	function upstore_ajax_search(){
		global $wpdb, $post;
		
		$search_for_product = class_exists('WooCommerce');
		if( $search_for_product ){
			$taxonomy = 'product_cat';
			$post_type = 'product';
		}
		else{
			$taxonomy = 'category';
			$post_type = 'post';
		}
		
		$num_result = (int)upstore_get_theme_options('ts_ajax_search_number_result');
		$desc_limit_words = (int)upstore_get_theme_options('ts_prod_cat_grid_desc_words');
		
		$search_string = stripslashes($_POST['search_string']);
		$category = isset($_POST['category'])? $_POST['category']: '';
		
		$args = array(
			'post_type'			=> $post_type
			,'post_status'		=> 'publish'
			,'s'				=> $search_string
			,'posts_per_page'	=> $num_result
			,'tax_query'		=> array()
		);
		
		if( $search_for_product ){
			$args['meta_query'] = WC()->query->get_meta_query();
			$args['tax_query'] = WC()->query->get_tax_query();
		}
		
		if( $category != '' ){
			$args['tax_query'][] = array(
					'taxonomy'  => $taxonomy
					,'terms'	=> $category
					,'field'	=> 'slug'
				);
		}
		
		$results = new WP_Query($args);
		
		if( $results->have_posts() ){
			$extra_class = '';
			if( isset($results->post_count, $results->found_posts) && $results->found_posts > $results->post_count ){
				$extra_class = 'has-view-all';
			}
			
			$html = '<ul class="'.$extra_class.'">';
			while( $results->have_posts() ){
				$results->the_post();
				$link = get_permalink($post->ID);
				
				$image = '';
				if( $post_type == 'product' ){
					$product = wc_get_product($post->ID);
					$image = $product->get_image();
				}
				else if( has_post_thumbnail($post->ID) ){
					$image = get_the_post_thumbnail($post->ID, 'thumbnail');
				}
				
				$html .= '<li>';
					$html .= '<div class="thumbnail">';
						$html .= '<a href="'.esc_url($link).'">'. $image .'</a>';
					$html .= '</div>';
					$html .= '<div class="meta">';
						$html .= '<a href="'.esc_url($link).'" class="title">'. upstore_search_highlight_string($post->post_title, $search_string) .'</a>';
						$html .= '<div class="description">'. upstore_the_excerpt_max_words($desc_limit_words, '', true, ' ...', false) .'</div>';
						if( $post_type == 'product' ){
							if( $price_html = $product->get_price_html() ){
								$html .= '<span class="price">'. $price_html .'</span>';
							}
						}
					$html .= '</div>';
				$html .= '</li>';
			}
			$html .= '</ul>';
			
			if( isset($results->post_count, $results->found_posts) && $results->found_posts > $results->post_count ){
				$view_all_text = sprintf( esc_html__('View all %d results', 'upstore'), $results->found_posts );
				
				$html .= '<div class="view-all-wrapper">';
					$html .= '<a href="#">'. $view_all_text .'</a>';
				$html .= '</div>';
			}
			
			wp_reset_postdata();
			
			$return = array();
			$return['html'] = $html;
			$return['search_string'] = $search_string;
			die( json_encode($return) );
		}
		
		$return = array();
		$return['html'] = '<p>'.esc_html__('No products were found', 'upstore').'</p>';
		$return['search_string'] = $search_string;
		die( json_encode($return) );
	}
}

if( !function_exists('upstore_search_highlight_string') ){
	function upstore_search_highlight_string($string, $search_string){
		$new_string = '';
		$pos_left = stripos($string, $search_string);
		if( $pos_left !== false ){
			$pos_right = $pos_left + strlen($search_string);
			$new_string_right = substr($string, $pos_right);
			$search_string_insensitive = substr($string, $pos_left, strlen($search_string));
			$new_string_left = stristr($string, $search_string, true);
			$new_string = $new_string_left . '<span class="hightlight">' . $search_string_insensitive . '</span>' . $new_string_right;
		}
		else{
			$new_string = $string;
		}
		return $new_string;
	}
}

/* Get post comment count */
if( !function_exists('upstore_post_comment_count') ){
	function upstore_post_comment_count( $post_id = 0 ){
		global $post;
		if( !$post_id ){
			$post_id = $post->ID;
		}
		
		$comments_count = wp_count_comments($post_id); 
		$comment_number = $comments_count->approved;
		echo esc_html($comment_number);
	}
}

/* Match with ajax search results */
add_filter('woocommerce_get_catalog_ordering_args', 'upstore_woocommerce_get_catalog_ordering_args_filter');
if( !function_exists('upstore_woocommerce_get_catalog_ordering_args_filter') ){
	function upstore_woocommerce_get_catalog_ordering_args_filter( $args ){
		if( is_search() && !isset($_GET['orderby']) && get_option( 'woocommerce_default_catalog_orderby' ) == 'menu_order' 
			&& upstore_get_theme_options('ts_ajax_search') ){
			$args['orderby'] = '';
			$args['order'] = '';
		}
		return $args;
	}
}

if( !function_exists('upstore_get_mailchimp_forms') ){
	function upstore_get_mailchimp_forms(){
		$args = array(
			'post_type'			=> 'mc4wp-form'
			,'post_status'		=> 'publish'
			,'posts_per_page'	=> -1
		);
		$results = array();
		$forms = new WP_Query( $args );
		if( !empty( $forms->posts ) && is_array( $forms->posts ) ){
			foreach( $forms->posts as $p ){
				$results[] = array(
					'id'		=> $p->ID
					,'title'	=> $p->post_title
				);
			}
		}
		
		return $results;
	}
}

/* Add to cart popup */
add_action('wp_footer', 'upstore_add_to_cart_popup_modal');
function upstore_add_to_cart_popup_modal(){
	if( upstore_get_theme_options('ts_add_to_cart_effect') == 'show_popup' ){
	?>
	<div id="ts-add-to-cart-popup-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="add-to-cart-popup-container popup-container">
			<span class="close"><?php esc_html_e('Close', 'upstore'); ?><i class="fa fa-close"></i></span>
			<div class="add-to-cart-popup-content"></div>
		</div>
	</div>
	<?php
	}
}

add_action('wp_ajax_upstore_load_product_added_to_cart', 'upstore_load_product_added_to_cart' );
add_action('wp_ajax_nopriv_upstore_load_product_added_to_cart', 'upstore_load_product_added_to_cart' );
function upstore_load_product_added_to_cart(){
	if( isset($_POST['product_id']) ){
		$product_id = absint($_POST['product_id']);
		if( !$product_id ){
			die( esc_html__('Invalid Product', 'upstore') );
		}
		$product = wc_get_product( $product_id );
		ob_start();
		?>
		<div class="product-image">
			<?php echo wp_kses_post($product->get_image()); ?>
		</div>
		<div class="content-message">
			<div class="message">
				<?php echo sprintf( esc_html__('You have added %s to your shopping cart', 'upstore'), '<strong>' . $product->get_title() . '</strong>' ); ?>
			</div>
			<div class="action">
				<a href="<?php echo wc_get_cart_url(); ?>" class="button view-cart button-border"><?php esc_html_e('View Cart', 'upstore'); ?></a>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="button checkout button-special"><?php esc_html_e('Checkout', 'upstore'); ?></a>
			</div>
		</div>
		<?php
		die( ob_get_clean() );
	}
}

/* Support Dokan */
add_action('dokan_dashboard_wrap_before', 'upstore_dokan_dashboard_wrap_before', 10, 2);
add_action('dokan_edit_product_wrap_before', 'upstore_dokan_dashboard_wrap_before', 10, 2);
function upstore_dokan_dashboard_wrap_before( $post, $post_id ){
	$from_shortcode = false;
	if( isset( $_GET['product_id'] ) ){
		$from_shortcode = true;
	}
	if( ! $from_shortcode ){
		upstore_breadcrumbs_title(true, true, get_the_title());
	}
	if( ! $from_shortcode ){
	?>
		<div class="page-container show_breadcrumb_<?php echo upstore_get_theme_options('ts_breadcrumb_layout') ?>">
			<div id="main-content" class="ts-col-24">
	<?php
	}
}

add_action('dokan_dashboard_wrap_after', 'upstore_dokan_dashboard_wrap_after', 10, 2);
add_action('dokan_edit_product_wrap_after', 'upstore_dokan_dashboard_wrap_after', 10, 2);
function upstore_dokan_dashboard_wrap_after( $post, $post_id ){
	$from_shortcode = false;
	if( isset( $_GET['product_id'] ) ){
		$from_shortcode = true;
	}
	if( ! $from_shortcode ){
	?>
		</div>
	</div>
	<?php
	}
}

/* Install Required Plugins */
add_action( 'tgmpa_register', 'upstore_register_required_plugins' );
function upstore_register_required_plugins(){
	$plugin_dir_path = get_template_directory() . '/framework/plugins/';
    $plugins = array(

        array(
            'name'                => 'ThemeSky'
            ,'slug'               => 'themesky'
            ,'source'             => $plugin_dir_path . 'themesky.zip'
            ,'required'           => true
            ,'version'            => '1.3.7'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'One Click Demo Import'
            ,'slug'               => 'one-click-demo-import'
			,'source'             => 'https://downloads.wordpress.org/plugin/one-click-demo-import.3.2.1.zip'
            ,'required'           => false
			,'version'            => '3.2.1'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'Redux Framework'
            ,'slug'               => 'redux-framework'
			,'source'             => 'https://downloads.wordpress.org/plugin/redux-framework.4.4.17.zip'
            ,'required'           => true
			,'version'            => '4.4.17'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'WooCommerce'
            ,'slug'               => 'woocommerce'
			,'source'             => 'https://downloads.wordpress.org/plugin/woocommerce.9.0.2.zip'
            ,'required'           => true
			,'version'            => '9.0.2'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'WPBakery Page Builder'
            ,'slug'               => 'js_composer'
            ,'source'             => $plugin_dir_path . 'js_composer.zip'
            ,'required'           => true
            ,'version'            => '7.7.2'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'Slider Revolution'
            ,'slug'               => 'revslider'
            ,'source'             => $plugin_dir_path . 'revslider.zip'
            ,'required'           => false
            ,'version'            => '6.7.14'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'Contact Form 7'
            ,'slug'               => 'contact-form-7'
			,'source'             => 'https://downloads.wordpress.org/plugin/contact-form-7.5.9.6.zip'
            ,'required'           => false
			,'version'            => '5.9.6'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'MailChimp for WordPress'
            ,'slug'               => 'mailchimp-for-wp'
			,'source'             => 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.4.9.13.zip'
            ,'required'           => false
			,'version'            => '4.9.13'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'YITH WooCommerce Wishlist'
            ,'slug'               => 'yith-woocommerce-wishlist'
			,'source'             => 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.3.35.0.zip'
            ,'required'           => false
			,'version'            => '3.35.0'
            ,'external_url'       => ''
        )
		,array(
            'name'                => 'YITH WooCommerce Compare'
            ,'slug'               => 'yith-woocommerce-compare'
            ,'required'           => false
        )

    );

    $config = array(
		'id'           	=> 'tgmpa'
		,'default_path' => ''
		,'menu'         => 'tgmpa-install-plugins'
		,'parent_slug'  => 'themes.php'
		,'capability'   => 'edit_theme_options'
		,'has_notices'  => true
		,'dismissable'  => true
		,'dismiss_msg'  => ''
		,'is_automatic' => false
		,'message'      => ''
	);

    tgmpa( $plugins, $config );
}
?>