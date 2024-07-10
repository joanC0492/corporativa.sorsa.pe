<?php
/*************************************************
* WooCommerce Custom Hook                        *
**************************************************/

/*** Shop - Category ***/

/* Remove hook */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);

/* Add new hook */

add_action('woocommerce_before_shop_loop_item_title', 'upstore_template_loop_product_thumbnail', 10);
add_action('woocommerce_after_shop_loop_item_title', 'upstore_template_loop_product_label', 1);

add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_brands', 5);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_categories', 10);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_product_title', 20);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_product_sku', 30);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 40);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 50);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_short_description', 60);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_short_description_listview', 65);
add_action('woocommerce_after_shop_loop_item', 'upstore_template_loop_add_to_cart', 70);

add_action('woocommerce_before_shop_loop', 'upstore_product_per_page_form', 40);
add_action('woocommerce_before_shop_loop', 'upstore_add_top_filter_button', 25);
add_filter('loop_shop_per_page', 'upstore_change_products_per_page_shop' ); 
add_filter('woocommerce_product_get_rating_html', 'upstore_get_empty_rating_html', 10, 2);
add_filter('woocommerce_get_stock_html', 'upstore_empty_woocommerce_stock_html', 10, 2);

add_filter('woocommerce_before_output_product_categories', 'upstore_before_output_product_categories');
add_filter('woocommerce_after_output_product_categories', 'upstore_after_output_product_categories');

function upstore_template_loop_product_label(){
	global $product;
	?>
	<div class="product-label">
	<?php 
	if( $product->is_in_stock() ){
		/* New label */
		if( upstore_get_theme_options('ts_product_show_new_label') ){
			$now = current_time( 'timestamp', true );
			$post_date = get_post_time('U', true);
			$num_day = (int)( ( $now - $post_date ) / ( 3600*24 ) );
			$num_day_setting = absint( upstore_get_theme_options('ts_product_show_new_label_time') );
			if( $num_day <= $num_day_setting ){
				echo '<div><span class="new">'.esc_html( upstore_get_theme_options('ts_product_new_label_text') ).'</span></div>';
			}
		}
		
		/* Sale label */
		if( $product->is_on_sale() ){
			if( upstore_get_theme_options('ts_show_sale_label_as') != 'text' ){
				if( $product->get_type() == 'variable' ){
					$regular_price = $product->get_variation_regular_price('max');
					$sale_price = $product->get_variation_sale_price('min');
				}
				else{
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_price();
				}
				if( $regular_price ){
					if( upstore_get_theme_options('ts_show_sale_label_as') == 'number' ){
						$_off_price = round($regular_price - $sale_price, wc_get_price_decimals());
						$price_display = '-' . sprintf(get_woocommerce_price_format(), get_woocommerce_currency_symbol(), $_off_price);
						echo '<div><span class="onsale amount" data-original="'.$price_display.'">'.$price_display.'</span></div>';
					}
					if( upstore_get_theme_options('ts_show_sale_label_as') == 'percent' ){
						$_off_percent = ( 1 - round($sale_price / $regular_price, 2) ) * 100;
						echo '<div><span class="onsale percent">-'.$_off_percent.'%</span></div>';
					}
				}
			}
			else{
				echo '<div><span class="onsale">'.esc_html( upstore_get_theme_options('ts_product_sale_label_text') ).'</span></div>';
			}
		}
		
		/* Hot label */
		if( $product->is_featured() ){
			echo '<div><span class="featured">'.esc_html( upstore_get_theme_options('ts_product_feature_label_text') ).'</span></div>';
		}
	}
	else{ /* Out of stock */
		echo '<div><span class="out-of-stock">'.esc_html( upstore_get_theme_options('ts_product_out_of_stock_label_text') ).'</span></div>';
	}
	?>
	</div>
	<?php
}

function upstore_template_loop_product_thumbnail(){
	global $product;
	$lazy_load = upstore_get_theme_options('ts_prod_lazy_load') && !( defined( 'DOING_AJAX' ) && DOING_AJAX );
	$placeholder_img_src = upstore_get_theme_options('ts_prod_placeholder_img')['url'];
	
	if( defined( 'YITH_INFS' ) && (is_shop() || is_product_taxonomy()) ){ /* Compatible with YITH Infinite Scrolling */
		$lazy_load = false;
	}
	
	$prod_galleries = $product->get_gallery_image_ids();
	
	$image_size = apply_filters('upstore_loop_product_thumbnail', 'woocommerce_thumbnail');
	
	$dimensions = wc_get_image_size( $image_size );
	
	$has_back_image = upstore_get_theme_options('ts_effect_product');
	
	if( !is_array($prod_galleries) || ( is_array($prod_galleries) && count($prod_galleries) == 0 ) ){
		$has_back_image = false;
	}
	 
	if( wp_is_mobile() ){
		$has_back_image = false;
	}
	
	echo '<figure class="' . ($has_back_image?'has-back-image':'no-back-image') . '">';
		if( !$lazy_load ){
			echo woocommerce_get_product_thumbnail( $image_size );
			
			if( $has_back_image ){
				echo wp_get_attachment_image( $prod_galleries[0], $image_size, 0, array('class' => 'product-image-back') );
			}
		}
		else{
			$front_img_src = '';
			$alt = '';
			if( has_post_thumbnail( $product->get_id() ) ){
				$post_thumbnail_id = get_post_thumbnail_id($product->get_id());
				$image_obj = wp_get_attachment_image_src($post_thumbnail_id, $image_size, 0);
				if( isset($image_obj[0]) ){
					$front_img_src = $image_obj[0];
				}
				$alt = trim(strip_tags( get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true) ));
			}
			else{
				$front_img_src = wc_placeholder_img_src();
			}
			
			echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($front_img_src).'" class="attachment-shop_catalog wp-post-image ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
		
			if( $has_back_image ){
				$back_img_src = '';
				$alt = '';
				$image_obj = wp_get_attachment_image_src($prod_galleries[0], $image_size, 0);
				if( isset($image_obj[0]) ){
					$back_img_src = $image_obj[0];
					$alt = trim(strip_tags( get_post_meta($prod_galleries[0], '_wp_attachment_image_alt', true) ));
				}
				else{
					$back_img_src = wc_placeholder_img_src();
				}
				
				echo '<img src="'.esc_url($placeholder_img_src).'" data-src="'.esc_url($back_img_src).'" class="product-image-back ts-lazy-load" alt="'.esc_attr($alt).'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" />';
			}
		}
	echo '</figure>';
}

function upstore_template_loop_product_variable_color(){
	global $product;
	if( $product->get_type() == 'variable' ){
		$attribute_color = wc_attribute_taxonomy_name( 'color' ); // pa_color
		$attribute_color_name = wc_variation_attribute_name( $attribute_color ); // attribute_pa_color
		
		$color_terms = wc_get_product_terms( $product->get_id(), $attribute_color, array( 'fields' => 'all' ) );
		if( empty($color_terms) || is_wp_error($color_terms) ){
			return;
		}
		$color_term_ids = wp_list_pluck( $color_terms, 'term_id' );
		$color_term_slugs = wp_list_pluck( $color_terms, 'slug' );
		
		$color_html = array();
		$price_html = array();
		
		$added_colors = array();
		$count = 0;
		$number = apply_filters('upstore_loop_product_variable_color_number', 3);
		
		$children = $product->get_children();
		if( is_array($children) && count($children) > 0 ){
			foreach( $children as $children_id ){
				$variation_attributes = wc_get_product_variation_attributes( $children_id );
				foreach( $variation_attributes as $attribute_name => $attribute_value ){
					if( $attribute_name == $attribute_color_name ){
						if( in_array($attribute_value, $added_colors) ){
							break;
						}
						
						$term_id = 0;
						$found_slug = array_search($attribute_value, $color_term_slugs);
						if( $found_slug !== false ){
							$term_id = $color_term_ids[ $found_slug ];
						}
						
						if( $term_id !== false && absint( $term_id ) > 0 ){
							$thumbnail_id = get_post_meta( $children_id, '_thumbnail_id', true );
							if( $thumbnail_id ){
								$image_src = wp_get_attachment_image_src($thumbnail_id, 'woocommerce_thumbnail');
								if( $image_src ){
									$thumbnail = $image_src[0];
								}
								else{
									$thumbnail = wc_placeholder_img_src();
								}
							}
							else{
								$thumbnail = wc_placeholder_img_src();
							}
							
							$color_datas = get_term_meta( $term_id, 'ts_product_color_config', true );
							if( $color_datas ){
								$color_datas = unserialize( $color_datas );	
							}else{
								$color_datas = array('ts_color_color' => '#ffffff', 'ts_color_image' => 0);
							}
							$color_datas['ts_color_image'] = absint($color_datas['ts_color_image']);
							if( $color_datas['ts_color_image'] ){
								$color_html[] = '<div class="color-image" data-thumb="'.$thumbnail.'" data-term_id="'.$term_id.'"><span>'.wp_get_attachment_image( $color_datas['ts_color_image'], 'upstore_prod_color_thumb', true, array('alt' => $attribute_value) ).'</span></div>';
							}
							else{
								$color_html[] = '<div class="color" data-thumb="'.$thumbnail.'" data-term_id="'.$term_id.'"><span style="background-color: '.$color_datas['ts_color_color'].'"></span></div>';
							}
							$variation = wc_get_product( $children_id );
							$price_html[] = '<span class="price" data-term_id="'.$term_id.'">' . $variation->get_price_html() . '</span>';
							$count++;
						}
						
						$added_colors[] = $attribute_value;
						break;
					}
				}
				
				if( $count == $number ){
					break;
				}
			}
		}
		
		if( $color_html ){
			echo '<div class="color-swatch">'. implode('', $color_html) . '</div>';
			echo '<span class="variable-prices hidden">' . implode('', $price_html) . '</span>';
		}
	}
}

function upstore_template_loop_product_title(){
	global $product;
	echo '<h3 class="heading-title product-name">';
	echo '<a href="' . esc_url($product->get_permalink()) . '">' . esc_html($product->get_title()) . '</a>';
	echo '</h3>';
}

function upstore_template_loop_add_to_cart(){
	if( upstore_get_theme_options('ts_enable_catalog_mode') ){
		return;
	}
	
	echo '<div class="loop-add-to-cart">';
	woocommerce_template_loop_add_to_cart();
	echo '</div>';
}

function upstore_template_loop_product_sku(){
	global $product;
	echo '<span class="product-sku">' . esc_html($product->get_sku()) . '</span>';
}

function upstore_template_loop_short_description(){
	global $product;
	$has_grid_list = upstore_get_theme_options('ts_prod_cat_glt');
	$grid_limit_words = absint(upstore_get_theme_options('ts_prod_cat_grid_desc_words'));
	$grid_limit_words = apply_filters('upstore_grid_short_desc_limit_words', $grid_limit_words);
	$show_grid_desc = upstore_get_theme_options('ts_prod_cat_grid_desc');
	
	if( !$product->get_short_description() ){
		return;
	}
	
	if( !(is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product')) ):
	?>
	<div class="short-description">
		<?php upstore_the_excerpt_max_words($grid_limit_words, '', true, '', true); ?>
	</div>
	<?php
	else:
		if( $show_grid_desc ):
		?>
			<div class="short-description grid" style="<?php echo esc_attr($has_grid_list?'display: none':''); ?>" >
				<?php upstore_the_excerpt_max_words($grid_limit_words, '', true, '', true); ?>
			</div>
		<?php
		endif;
	endif;
}

function upstore_template_loop_short_description_listview(){
	$has_grid_list = upstore_get_theme_options('ts_prod_cat_glt');
	$list_limit_words = absint(upstore_get_theme_options('ts_prod_cat_list_desc_words'));
	$show_list_desc = upstore_get_theme_options('ts_prod_cat_list_desc');
	$is_archive = is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product');
	if( $has_grid_list && $show_list_desc && $is_archive ):
	?>
		<div class="short-description list" style="display: none" >
			<?php upstore_the_excerpt_max_words($list_limit_words, '', true, '', true); ?>
		</div>
	<?php
	endif;
}

function upstore_template_loop_brands(){
	global $product;
	if( upstore_get_theme_options('ts_prod_cat_brand') ){
		echo get_the_term_list($product->get_id(), 'ts_product_brand', '<div class="product-brands">', ', ', '</div>');
	}
}

function upstore_template_loop_categories(){
	global $product;
	$categories_label = esc_html__('Categories: ', 'upstore');
	echo wc_get_product_category_list($product->get_id(), ', ', '<div class="product-categories"><span>'.$categories_label.'</span>', '</div>');
}

function upstore_change_products_per_page_shop(){
    if( is_tax( get_object_taxonomies( 'product' ) ) || is_post_type_archive('product') ){
		if( isset($_GET['per_page']) && absint($_GET['per_page']) > 0 ){
			return absint($_GET['per_page']);
		}
		$per_page = absint( upstore_get_theme_options('ts_prod_cat_per_page') );
        if( $per_page ){
            return $per_page;
        }
    }
}

function upstore_product_per_page_form(){
	if( !upstore_get_theme_options('ts_prod_cat_per_page_dropdown') ){
		return;
	}
	if( function_exists('woocommerce_products_will_display') && !woocommerce_products_will_display() ){
		return;
	}
	
	$per_page = absint( upstore_get_theme_options('ts_prod_cat_per_page') );
	if( !$per_page ){
		return;
	}
	
	$options = array();
	for( $i = 1; $i <= 4; $i++ ){
		$options[] = $per_page * $i;
	}
	$selected = isset($_GET['per_page'])?absint($_GET['per_page']):$per_page;
	
	$action = '';
	$cat 	= get_queried_object();
	if( isset( $cat->term_id ) && isset( $cat->taxonomy ) ){
		$action = get_term_link( $cat->term_id, $cat->taxonomy );
	}
	else{
		$action = wc_get_page_permalink('shop');
	}
?>
	<form method="get" action="<?php echo esc_url($action) ?>" class="product-per-page-form">
		<span><?php esc_html_e('Show', 'upstore'); ?></span>
		<select name="per_page" class="perpage">
			<?php foreach( $options as $option ): ?>
			<option value="<?php echo esc_attr($option) ?>" <?php selected($selected, $option) ?>><?php echo esc_html($option) ?></option>
			<?php endforeach; ?>
		</select>
		<ul class="perpage">
			<li>
				<span class="perpage-current"><?php echo esc_html($selected) ?></span>
				<ul class="dropdown">
					<?php foreach( $options as $option ): ?>
					<li><a href="#" data-perpage="<?php echo esc_attr($option) ?>" class="<?php echo esc_attr($option == $selected?'current':''); ?>"><?php echo esc_html($option) ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
		</ul>
		<?php wc_query_string_form_fields( null, array( 'per_page', 'submit', 'paged', 'product-page' ) ); ?>
	</form>
<?php
}

function upstore_add_top_filter_button(){
	if( is_active_sidebar('top-filter-widget-area') && upstore_get_theme_options('ts_top_filter_widget_area') && woocommerce_products_will_display() ){
	?>
		<div class="top-filter-widget-area-button <?php echo upstore_get_theme_options('ts_top_filter_widget_area_sidebar')?'show-sidebar':''; ?>">
			<a href="#"><?php esc_html_e('Filter', 'upstore') ?></a>
		</div>
	<?php
		if( upstore_get_theme_options('ts_top_filter_widget_area_sidebar') ){
		?>
			<div id="ts-top-filter-widget-area-sidebar" class="ts-floating-sidebar">
				<div class="ts-sidebar-content">
					<span class="close"><i class="fa fa-remove"></i></span>
					<aside class="ts-sidebar top-filter-widget-area">
						<?php dynamic_sidebar( 'top-filter-widget-area' ); ?>
					</aside>
				</div>
			</div>
		<?php
		}
	}
}

function upstore_get_empty_rating_html( $rating_html, $rating ){
	if( $rating == 0 ){
		$rating_html  = '<div class="star-rating no-rating">';
		$rating_html .= '<span style="width:0%"></span>';
		$rating_html .= '</div>';
	}
	return $rating_html;
}

function upstore_empty_woocommerce_stock_html( $html, $product ){
	if( $product->get_type() == 'simple' ){
		return '';
	}
	return $html;
}

function upstore_before_output_product_categories(){
	return '<div class="list-categories">';
}

function upstore_after_output_product_categories(){
	return '</div>';
}
/*** End Shop - Category ***/



/*** Single Product ***/

/* Remove hook */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

/* Add hook */
add_action('woocommerce_before_single_product', 'upstore_single_product_top_thumbnail_slider');

add_action('woocommerce_before_single_product_summary', 'upstore_single_product_fullwidth_before', 1);
add_action('woocommerce_after_single_product_summary', 'upstore_single_product_fullwidth_after', 1);

add_action('upstore_before_product_image', 'upstore_template_loop_product_label', 10);
add_action('upstore_after_single_product_thumbnails', 'upstore_template_single_product_video_360_buttons', 10);

add_action('woocommerce_single_product_summary', 'upstore_template_single_navigation', 1);
add_action('woocommerce_single_product_summary', 'upstore_template_single_sku', 5);
add_action('woocommerce_single_product_summary', 'upstore_template_single_availability', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);
add_action('woocommerce_single_product_summary', 'upstore_template_single_email_button', 16);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 25);

add_action('woocommerce_single_product_summary', 'upstore_template_single_meta', 60);

add_action('woocommerce_after_single_product_summary', 'upstore_product_ads_banner', 12);

if( function_exists('ts_template_social_sharing') ){
	add_action('woocommerce_share', 'ts_template_social_sharing', 10);
}

if( function_exists('ts_template_loop_time_deals') ){
	add_action('woocommerce_single_product_summary', 'ts_template_loop_time_deals', 22);
}

add_filter('woocommerce_grouped_product_columns', 'upstore_woocommerce_grouped_product_columns');

add_filter('woocommerce_product_description_heading', '__return_empty_string');
add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');

add_filter('woocommerce_output_related_products_args', 'upstore_output_related_products_args_filter');

add_filter('upstore_single_product_thumbnails_class', 'upstore_add_classes_to_single_product_thumbnail');

if( !is_admin() ){ /* Fix for WooCommerce Tab Manager plugin */
	add_filter( 'woocommerce_product_tabs', 'upstore_product_remove_tabs', 999 );
	add_filter( 'woocommerce_product_tabs', 'upstore_add_product_custom_tab', 90 );
}

function upstore_single_product_top_thumbnail_slider(){
	global $product;
	if( upstore_get_theme_options('ts_prod_thumbnail_summary_layout') == 'top_thumbnail_slider' && has_post_thumbnail() ){
		$cloud_zoom = upstore_get_theme_options('ts_prod_cloudzoom');
		$index = 0;
		$image_ids = array();
		$image_ids[] = get_post_thumbnail_id();
		$attachment_ids = $product->get_gallery_image_ids();
		if( is_array($attachment_ids) ){
			$image_ids = array_merge($image_ids, $attachment_ids);
		}
		wp_enqueue_script( 'wpb_composer_front_js' );
	?>
	<div class="vc_row wpb_row vc_row-fluid vc_column-gap-default loading" data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true">
		<div class="single-product-top-thumbnail-slider loading woocommerce-product-gallery">
		<?php foreach( $image_ids as $image_id ):
			$full_size_image  = wp_get_attachment_image_src( $image_id, 'full' );
			$attributes = array(
					'title'                    => get_post_field( 'post_title', $image_id )
					,'data-caption'            => get_post_field( 'post_excerpt', $image_id )
					,'data-src'                => $full_size_image[0]
					,'data-large_image'        => $full_size_image[0]
					,'data-large_image_width'  => $full_size_image[1]
					,'data-large_image_height' => $full_size_image[2]
					,'data-index'			   => $index++
				);
		?>
			<div class="item woocommerce-product-gallery__image">
				<a href="<?php echo (!$cloud_zoom)?esc_url( $full_size_image[0] ):'javascript:void(0)' ?>">
					<?php echo wp_get_attachment_image($image_id, 'woocommerce_single', false, $attributes); ?>
				</a>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
	<div class="vc_row-full-width"></div>
	<?php
	upstore_template_single_product_video_360_buttons();
	}
}

function upstore_single_product_fullwidth_before(){
	if( upstore_get_theme_options('ts_prod_thumbnail_summary_layout') == 'fullwidth' ){
		wp_enqueue_script( 'wpb_composer_front_js' );
	?>
	<div class="vc_row wpb_row vc_row-fluid vc_column-gap-default loading" data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true">
	<?php
	}
}

function upstore_single_product_fullwidth_after(){
	if( upstore_get_theme_options('ts_prod_thumbnail_summary_layout') == 'fullwidth' ){
	?>
	</div>
	<div class="vc_row-full-width"></div>
	<?php
	}
}

add_action('wp_ajax_upstore_load_product_video', 'upstore_load_product_video_callback' );
add_action('wp_ajax_nopriv_upstore_load_product_video', 'upstore_load_product_video_callback' );
/*** End Product ***/

function upstore_template_single_product_video_360_buttons(){
	global $product;
	$show_button = !in_array(upstore_get_theme_options('ts_prod_thumbnail_summary_layout'), array('scrolling', 'top_thumbnail_slider'));
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		if( $show_button ){
			echo '<a class="ts-product-video-button" href="#" data-product_id="'.$product->get_id().'"></a>';
			add_action('wp_footer', 'upstore_add_product_video_popup_modal', 999);
		}
		else{
			echo do_shortcode('[ts_video src='.esc_url($video_url).']');
		}
	}
	
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$galleries = array_map('trim', explode(',', $gallery_360));
		$image_array = array();
		foreach($galleries as $gallery ){
			$image_src = wp_get_attachment_image_url($gallery, 'woocommerce_single');
			if( $image_src ){
				$image_array[] = "'" . $image_src . "'";
			}
		}
		wp_enqueue_script('threesixty');
		wp_add_inline_script('threesixty', 'var _ts_product_360_image_array = ['.implode(',', $image_array).'];');
		if( $show_button ){
			echo '<a class="ts-product-360-button" href="#"></a>';
			add_action('wp_footer', 'upstore_add_product_360_popup_modal', 999);
		}
		else{
			upstore_load_product_360();
		}
	}
}

function upstore_add_product_video_popup_modal(){
	?>
	<div id="ts-product-video-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-video-container popup-container">
			<span class="close"><?php esc_html_e('Close', 'upstore') ?><i class="fa fa-close"></i></span>
			<div class="product-video-content"></div>
		</div>
	</div>
	<?php
}

function upstore_add_product_360_popup_modal(){
	?>
	<div id="ts-product-360-modal" class="ts-popup-modal">
		<div class="overlay"></div>
		<div class="product-360-container popup-container">
			<span class="close"><?php esc_html_e('Close', 'upstore') ?><i class="fa fa-close"></i></span>
			<div class="product-360-content"><?php upstore_load_product_360(); ?></div>
		</div>
	</div>
	<?php
}

function upstore_add_classes_to_single_product_thumbnail( $classes ){
	global $product;
	$video_url = get_post_meta($product->get_id(), 'ts_prod_video_url', true);
	if( $video_url ){
		$classes[] = 'has-video';
	}
	$gallery_360 = get_post_meta($product->get_id(), 'ts_prod_360_gallery', true);
	if( $gallery_360 ){
		$classes[] = 'has-360-gallery';
	}
	return $classes;
}

/* Single Product Video - Register ajax */
function upstore_load_product_video_callback(){
	if( empty($_POST['product_id']) ){
		die( esc_html__('Invalid Product', 'upstore') );
	}
	
	$prod_id = absint($_POST['product_id']);

	if( $prod_id <= 0 ){
		die( esc_html__('Invalid Product', 'upstore') );
	}
	
	$video_url = get_post_meta($prod_id, 'ts_prod_video_url', true);
	ob_start();
	if( !empty($video_url) ){
		echo do_shortcode('[ts_video src='.esc_url($video_url).']');
	}
	die( ob_get_clean() );
}

function upstore_load_product_360(){
	?>
	<div class="threesixty ts-product-360">
		<div class="spinner">
			<span>0%</span>
		</div>
		<ol class="threesixty_images"></ol>
	</div>
	<?php
}

function upstore_template_single_navigation(){
	if( !upstore_get_theme_options('ts_prod_next_prev_navigation') ){
		return;
	}
	$prev_post = get_adjacent_post(false, '', true, 'product_cat');
	$next_post = get_adjacent_post(false, '', false, 'product_cat');
	?>
	<div class="single-navigation">
	<?php 
		if( $prev_post ){
			$post_id = $prev_post->ID;
			$product = wc_get_product($post_id);
			?>
			<div class="prev">
				<a href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="prev"></a>
				<div class="product-info prev-product-info">
					<?php echo wp_kses_post($product->get_image()); ?>
					<div>
						<span><?php echo esc_html($product->get_title()); ?></span>
						<span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
					</div>
				</div>
			</div>
			<?php
		}
		
		if( $next_post ){
			$post_id = $next_post->ID;
			$product = wc_get_product($post_id);
			?>
			<div class="next">
				<a href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="next"></a>
				<div class="product-info next-product-info">
					<?php echo wp_kses_post($product->get_image()); ?>
					<div>
						<span><?php echo esc_html($product->get_title()); ?></span>
						<span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
					</div>
				</div>
			</div>
			<?php
		}
	?>
	</div>
	<?php
}

function upstore_template_single_email_button(){
	?>
	<div class="email">
		<a href="mailto:?subject=<?php echo esc_attr(sanitize_title(get_the_title())); ?>&amp;body=<?php echo esc_url(get_permalink()); ?>">
			<?php esc_html_e('Email to a friend', 'upstore'); ?>
		</a>
	</div>
	<?php
}

function upstore_template_single_meta(){
	global $product;
	
	echo '<div class="meta-content">';
		do_action( 'woocommerce_product_meta_start' );
		if( upstore_get_theme_options('ts_prod_brand') ){
			echo get_the_term_list($product->get_id(), 'ts_product_brand', '<div class="brands-link"><span>' . esc_html__( 'Brands:', 'upstore' ) . '</span><span class="brand-links">', ', ', '</span></div>');
		}
		if( upstore_get_theme_options('ts_prod_cat') ){
			echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="cats-link"><span>' . esc_html__( 'Categories:', 'upstore' ) . '</span><span class="cat-links">', '</span></div>' );
		}
		if( upstore_get_theme_options('ts_prod_tag') ){
			echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tags-link"><span>' . esc_html__( 'Tags:', 'upstore' ) . '</span><span class="tag-links">', '</span></div>' );	
		}
		if( upstore_get_theme_options('ts_prod_sharing') ){
			woocommerce_template_single_sharing();
		}
		do_action( 'woocommerce_product_meta_end' );
	echo '</div>';
}

function upstore_template_single_sku(){
	global $product;
	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ){
		echo '<div class="sku-wrapper product_meta"><span>' . esc_html__( 'SKU:', 'upstore' ) . '</span><span class="sku">' . (( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'upstore' )) . '</span></div>';
	}
}
function upstore_template_single_availability(){
	global $product;

	$product_stock = $product->get_availability();
	$availability_text = empty($product_stock['availability'])?esc_html__('In Stock', 'upstore'):esc_attr($product_stock['availability']);
	?>	
		<p class="availability stock <?php echo esc_attr($product_stock['class']); ?>" data-original="<?php echo esc_attr($availability_text) ?>" data-class="<?php echo esc_attr($product_stock['class']) ?>">
			<label><?php esc_html_e('Availability:', 'upstore') ?></label>
			<span><?php echo esc_html($availability_text); ?></span>
		</p>	
	<?php
}


/*** Product tab ***/
function upstore_product_remove_tabs( $tabs = array() ){
	if( !upstore_get_theme_options('ts_prod_tabs') ){
		return array();
	}
	return $tabs;
}

function upstore_add_product_custom_tab( $tabs = array() ){
	global $post;
	if( upstore_get_theme_options('ts_prod_custom_tab') ){
		if( get_post_meta( $post->ID, 'ts_prod_custom_tab', true ) ){
			$custom_tab_title = get_post_meta( $post->ID, 'ts_prod_custom_tab_title', true );
		}
		else{
			$custom_tab_title = upstore_get_theme_options('ts_prod_custom_tab_title');
		}
	
		$tabs['ts_custom'] = array(
			'title'    	=> esc_html( $custom_tab_title )
			,'priority' => 90
			,'callback' => 'upstore_product_custom_tab_content'
		);
	} 
	return $tabs;
}

function upstore_product_custom_tab_content(){
	global $post;
	
	if( get_post_meta( $post->ID, 'ts_prod_custom_tab', true ) ){
		$custom_tab_content = get_post_meta( $post->ID, 'ts_prod_custom_tab_content', true );
	}
	else{
		$custom_tab_content = upstore_get_theme_options('ts_prod_custom_tab_content');
	}
	
	echo do_shortcode( stripslashes( wp_specialchars_decode( $custom_tab_content ) ) );
}

/* Ads Banner */
function upstore_product_ads_banner(){
	if( upstore_get_theme_options('ts_prod_ads_banner') ){
		echo '<div class="ads-banner">';
		echo do_shortcode( stripslashes( wp_specialchars_decode( upstore_get_theme_options('ts_prod_ads_banner_content') ) ) );
		echo '</div>';
	}
}

/* Related Products */
function upstore_output_related_products_args_filter( $args ){
	$args['posts_per_page'] = 6;
	$args['columns'] = 5;
	return $args;
}

/* Change grouped product columns */
function upstore_woocommerce_grouped_product_columns( $columns ){
	$columns = array('label', 'price', 'quantity');
	return $columns;
}

/*** General hook ***/

/*************************************************************
* Custom group button on product (quickshop, wishlist, compare) 
* Begin tag: 	10000
* Quickshop: 	10001
* Compare:   	10002
* Wishlist:  	10003
* Add To Cart: 	10004
* End tag:   	10005
**************************************************************/
add_action('woocommerce_after_shop_loop_item_title', 'upstore_template_loop_add_to_cart', 10004 );
function upstore_product_group_button_start(){
	$num_icon = 0;
	$extra_classes = '';
	if( has_action('woocommerce_after_shop_loop_item_title', 'upstore_template_loop_add_to_cart') && !upstore_get_theme_options('ts_enable_catalog_mode') ){
		$num_icon++;
	}
	else{
		$extra_classes = ' no-addtocart';
	}
	if( upstore_get_theme_options('ts_enable_quickshop') ){
		$num_icon++;
	}
	if( class_exists('YITH_WCWL') ){
		$num_icon++;
	}
	if( class_exists('YITH_Woocompare') && get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
		$num_icon++;
	}
	
	$classes = array(0 => '', 1 => 'one-button', 2 => 'two-button', 3 => 'three-button', 4 => 'four-button');
	
	echo "<div class=\"product-group-button {$classes[$num_icon]}{$extra_classes}\" >";
}

function upstore_product_group_button_end(){
	echo '</div>';
}

add_action('woocommerce_after_shop_loop_item_title', 'upstore_product_group_button_start', 10000 );
add_action('woocommerce_after_shop_loop_item_title', 'upstore_product_group_button_end', 10005 );

/* Wishlist */
if( class_exists('YITH_WCWL') ){
	function upstore_add_wishlist_button_to_product_list(){
		echo '<div class="button-in wishlist">';
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		echo '</div>';
	}
	
	if( 'yes' == get_option( 'yith_wcwl_show_on_loop', 'no' ) ){
		add_action( 'woocommerce_after_shop_loop_item_title', 'upstore_add_wishlist_button_to_product_list', 10003 );
		add_action( 'woocommerce_after_shop_loop_item', 'upstore_add_wishlist_button_to_product_list', 80 );
		
		add_filter( 'yith_wcwl_loop_positions', '__return_empty_array' ); /* Remove button which added by plugin */
	}
	
	add_filter('yith_wcwl_add_to_wishlist_params', 'upstore_yith_wcwl_add_to_wishlist_params');
	function upstore_yith_wcwl_add_to_wishlist_params( $additional_params ){
		if( isset($additional_params['container_classes']) && $additional_params['exists'] ){
			$additional_params['container_classes'] .= ' added';
		}
		$additional_params['label'] = '<span class="ts-tooltip button-tooltip">' . esc_html__('Wishlist', 'upstore') . '</span>';
		return $additional_params;
	}
	
	add_filter('yith-wcwl-browse-wishlist-label', 'upstore_yith_wcwl_browse_wishlist_label');
	function upstore_yith_wcwl_browse_wishlist_label(){
		return '<span class="ts-tooltip button-tooltip">' . esc_html__('Wishlist', 'upstore') . '</span>';
	}
}

/* Compare */
if( class_exists('YITH_Woocompare') ){
	add_action('init', 'upstore_yith_compare_handle', 30);
	function upstore_yith_compare_handle(){
		global $yith_woocompare;
		$is_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX );
		if( $yith_woocompare->is_frontend() || $is_ajax ){
			if( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
				if( $is_ajax ){
					if( defined('YITH_WOOCOMPARE_DIR') && !class_exists('YITH_Woocompare_Frontend') ){
						$compare_frontend_class = YITH_WOOCOMPARE_DIR . 'includes/class.yith-woocompare-frontend.php';
						if( file_exists($compare_frontend_class) ){
							require_once $compare_frontend_class;
						}
					}
					$yith_woocompare->obj = new YITH_Woocompare_Frontend();
				}
				remove_action( 'woocommerce_after_shop_loop_item', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
				
				add_action( 'woocommerce_after_shop_loop_item_title', 'upstore_add_compare_button_to_product_list', 10002 );
				add_action( 'woocommerce_after_shop_loop_item', 'upstore_add_compare_button_to_product_list', 70 );
			}
			
			add_filter( 'option_yith_woocompare_button_text', 'upstore_compare_button_text_filter', 99 );
		}
	}
	
	function upstore_add_compare_button_to_product_list(){
		global $yith_woocompare, $product;
		echo '<div class="button-in compare">';
		echo '<a class="compare" href="'.$yith_woocompare->obj->add_product_url( $product->get_id() ).'" data-product_id="'.$product->get_id().'">'.get_option('yith_woocompare_button_text').'</a>';
		echo '</div>';
	}
	
	function upstore_compare_button_text_filter( $button_text ){
		return '<i class="fa fa-retweet"></i><span class="ts-tooltip button-tooltip">'.esc_html($button_text).'</span>';
	}
}

/*************************************************************
* Group button on product meta (add to cart, wishlist, compare) 
* Begin tag: 69
* Add to cart: 70
* Compare: 70
* quicklist: 80
* End tag: 81
*************************************************************/
add_action('woocommerce_after_shop_loop_item', 'upstore_product_group_button_meta_start', 69);
add_action('woocommerce_after_shop_loop_item', 'upstore_product_group_button_meta_end', 81);
function upstore_product_group_button_meta_start(){
	echo '<div class="product-group-button-meta">';
}
function upstore_product_group_button_meta_end(){
	echo '</div>';
}
/*** End General hook ***/

/*** Cart - Checkout hooks ***/
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

add_action('woocommerce_proceed_to_checkout', 'upstore_cart_continue_shopping_button', 20);

/* Continue Shopping button */
function upstore_cart_continue_shopping_button(){
	echo '<a href="'.esc_url(wc_get_page_permalink('shop')).'" class="button continue-shopping">'.esc_html__('Continue Shopping', 'upstore').'</a>';
}

add_action('woocommerce_before_checkout_form', 'upstore_before_checkout_form_start', 1);
add_action('woocommerce_before_checkout_form', 'upstore_before_checkout_form_end', 999);
function upstore_before_checkout_form_start(){
	echo '<div class="checkout-login-coupon-wrapper">';
}
function upstore_before_checkout_form_end(){
	echo '</div>';
}

add_action('woocommerce_thankyou', 'upstore_insert_snapppt_conversion_code');
function upstore_insert_snapppt_conversion_code( $order_id ){
	$account_id = upstore_get_theme_options('ts_instagram_shop_account_id');
	if( !$account_id ){
		return;
	}
	$order = wc_get_order($order_id);
	if( !is_object($order) ){
		return;
	}
	$order_number    = $order->get_order_number();
	$order_currency  = $order->get_currency();
	$order_total     = $order->get_total();
	
	echo "<script>
			window.snapppt_order_number = '" . $order_number . "';
			window.snapppt_order_total = '" . $order_total . "';
			window.snapppt_order_currency = '" . $order_currency . "';
			window.snapppt_account = '" . $account_id . "';
			window.snapppt_platform = 'woocommerce';
		</script>
		<script src='https://snapppt.com/conversion-tracker.js'></script>";
}
?>