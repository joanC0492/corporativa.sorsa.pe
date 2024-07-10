<?php
if( !isset($data) ){
	$data = upstore_get_theme_options();
}

$default_options = array(
				'ts_responsive'										=> 1
				,'ts_enable_rtl'									=> 0
				,'ts_layout_fullwidth'								=> 0
				,'ts_blockoverplay'									=> 'light'
				,'ts_logo_width'									=> "140"
				,'ts_custom_css_code'								=> ''
				,'ts_custom_font_ttf'								=> array( 'url' => '' )
				,'ts_small_loading_icon'							=> array( 'url' => '' )
				,'ts_big_loading_icon'								=> array( 'url' => '' )
		);
		
foreach( $default_options as $option_name => $value ){
	if( isset($data[$option_name]) ){
		$default_options[$option_name] = $data[$option_name];
	}
}

extract($default_options);
		
$default_colors = array(
				'ts_primary_color'									=> "#27af7d"
				,'ts_text_color_in_bg_primary'						=> "#ffffff"

				,'ts_heading_color'									=> "#282828"

				,'ts_main_content_background_color'					=> "#ffffff"
				,'ts_widget_content_background_color'				=> "#ffffff"
				,'ts_text_color'									=> "#555555"
				,'ts_text_bold_color'								=> "#181818"
				,'ts_text_light_color'								=> "#a9a9a9"

				,'ts_link_color'									=> "#27af7d"
				,'ts_link_color_hover'								=> "#27af7d"

				,'ts_border_color'									=> "#efefef"
				
				,'ts_input_text_color'								=> "#555555"
				,'ts_input_text_color_hover'						=> "#666666"
				,'ts_input_border_color'							=> "#e5e5e5"
				,'ts_input_border_color_hover'						=> "#c0c0c0"

				,'ts_button_text_color'								=> "#ffffff"
				,'ts_button_text_color_hover'						=> "#ffffff"
				,'ts_button_background_color'						=> "#282828"
				,'ts_button_background_hover'						=> "#27af7d"
				
				,'ts_special_button_text_color'						=> "#ffffff"
				,'ts_special_button_background_color'				=> "#ed4545"
				
				// BREADCRUMB
				,'ts_breadcrumb_text_color'							=> "#ffffff"
				,'ts_breadcrumb_heading_color'						=> "#ffffff"
				,'ts_breadcrumb_link_color_hover'					=> "#27af7d"
				,'ts_breadcrumb_background_color'					=> "#fafafa"
				
				// HEADER
				,'ts_header_notice_text_color'						=> "#ffffff"
				,'ts_header_logo_background'						=> "#27af7d"
				,'ts_top_header_background_color'					=> "#1b1b1b"
				,'ts_top_header_text_color'							=> "#a9a9a9"
				,'ts_top_header_text_color_hover'					=> "#27af7d"
				,'ts_top_header_border_color'						=> "#2c2c2c"
				,'ts_middle_header_background_color'				=> "#ffffff"
				,'ts_middle_header_text_color'						=> "#1f1f1f"
				,'ts_bottom_header_background_color'				=> "#27af7d"
				,'ts_bottom_header_border_color'					=> "#27af7d"
				
				,'ts_search_border_color'							=> "#efefef"
				,'ts_search_categories_background_color'			=> "#f1f1f1"
				,'ts_search_categories_text_color'					=> "#000000"
				,'ts_search_input_text_background_color'			=> "#ffffff"
				,'ts_search_input_text_color'						=> "#666666"

				,'ts_header_cart_text_color'						=> "#1b1b1b"
				,'ts_header_cart_text_color_hover'					=> "#ffffff"
				,'ts_header_cart_amount_color'						=> "#ffffff"
				,'ts_header_cart_amount_background_color'			=> "#27af7d"
				,'ts_header_cart_border_color'						=> "#27af7d"
				
				
				// MENU
				,'ts_vertical_menu_title_text'						=> "#ffffff"
				,'ts_vertical_menu_title_background_color'			=> "#189163"
				,'ts_vertical_menu_title_text_hover'				=> "#ffffff"
				,'ts_vertical_menu_title_background_hover'			=> "#000000"
				,'ts_vertical_menu_text_color'						=> "#000000"
				,'ts_vertical_menu_background_color'				=> "#ffffff"
				,'ts_vertical_menu_text_color_hover'				=> "#27af7d"
				,'ts_vertical_menu_background_hover'				=> "#ffffff"
				
				,'ts_menu_text_color'								=> "#000000"
				,'ts_menu_text_color_hover'							=> "#27af7d"
				,'ts_menu_background_color_hover'					=> "#e51515"

				,'ts_sub_menu_background_color'						=> "#ffffff"
				,'ts_sub_menu_text_color'							=> "#1f1f1f"
				,'ts_sub_menu_text_color_hover'						=> "#27af7d"
				,'ts_sub_menu_heading_color'						=> "#000000"
				
				,'ts_menu_mobile_text_color'						=> "#000000"
				,'ts_menu_mobile_background_color'					=> "#ffffff"
				
				// FOOTER
				,'ts_footer_social_icon_border_color'				=> "#555555"
				,'ts_footer_social_icon_color'						=> "#ffffff"
				,'ts_footer_background_color'						=> "#1b1b1b"
				,'ts_footer_text_color'								=> "#a9a9a9"
				,'ts_footer_text_color_hover'						=> "#27af7d"
				,'ts_footer_heading_color'							=> "#ffffff"
				,'ts_footer_border_color'							=> "#353535"
				,'ts_footer_end_background_color'					=> "#171717"
				,'ts_footer_end_text_color'							=> "#a9a9a9"

				// PRODUCT
				,'ts_product_countdown_background_color'			=> "#f7f7f7"
				,'ts_product_countdown_number_color'				=> "#1f1f1f"
				,'ts_product_countdown_text_color'					=> "#848484"
				,'ts_product_countdown_border_color'				=> "#e5e5e5"
				,'ts_product_countdown_day_text_color'				=> "#ffffff"
				,'ts_product_countdown_day_background_color'		=> "#f43e3d"
				
				,'ts_rating_color'									=> "#ffca27"
				
				,'ts_product_name_text_color'						=> "#202020"

				,'ts_product_button_thumbnail_text_color'			=> "#858585"
				,'ts_product_button_thumbnail_text_color_hover'		=> "#ffffff"
				,'ts_product_button_thumbnail_background_color'		=> "#ffffff"
				,'ts_product_button_thumbnail_background_hover'		=> "#282828"
				
				,'ts_product_button_thumbnail_mobile_text_color'			=> "#666666"
				,'ts_product_button_thumbnail_mobile_background_color'		=> "#ffffff"

				,'ts_product_sale_label_text_color'					=> "#ffffff"
				,'ts_product_sale_label_background_color'			=> "#27af7d"
				,'ts_product_new_label_text_color'					=> "#ffffff"
				,'ts_product_new_label_background_color'			=> "#3a93ca"
				,'ts_product_feature_label_text_color'				=> "#ffffff"
				,'ts_product_feature_label_background_color'		=> "#f43e3e"
				,'ts_product_outstock_label_text_color'				=> "#ffffff"
				,'ts_product_outstock_label_background_color'		=> "#989898"

				,'ts_product_price_color'							=> "#000000"
				,'ts_product_del_price_color'						=> "#555555"
				,'ts_product_sale_price_color'						=> "#000000"
				
				// REVOLUTION SLIDER
				,'ts_revo_button_color'								=> "#cccccc"
				,'ts_revo_button_border_color'						=> "#cccccc"
				,'ts_revo_button_color_hover'						=> "#000000"
				,'ts_revo_button_border_color_hover'				=> "#000000"
);

$data = apply_filters('upstore_custom_style_data', $data);

foreach( $default_colors as $option_name => $default_color ){
	if( isset($data[$option_name]['rgba']) ){
		$default_colors[$option_name] = $data[$option_name]['rgba'];
	}
	else if( isset($data[$option_name]['color']) ){
		$default_colors[$option_name] = $data[$option_name]['color'];
	}
}

extract( $default_colors );

/* Parse font option. Ex: if option name is ts_body_font, we will have variables below:
* ts_body_font (font-family)
* ts_body_font_weight
* ts_body_font_style
* ts_body_font_size
* ts_body_font_line_height
*/
$font_option_names = array(
							'ts_body_font', 
							'ts_body_2_font',
							'ts_menu_font',
							'ts_heading_font',
							'ts_heading_2_font'							
							);
$font_size_option_names = array(
							'ts_button_font', 
							'ts_h1_font', 
							'ts_h2_font', 
							'ts_h3_font', 
							'ts_h4_font', 
							'ts_h5_font', 
							'ts_h6_font',
							'ts_product_name_font'
							);
$font_option_names = array_merge($font_option_names, $font_size_option_names);
foreach( $font_option_names as $option_name ){
	$default = array(
		$option_name 					=> 'inherit'
		,$option_name . '_weight' 		=> 'normal'
		,$option_name . '_style' 		=> 'normal'
		,$option_name . '_size' 		=> 'inherit'
		,$option_name . '_line_height' 	=> 'inherit'
	);
	if( is_array($data[$option_name]) ){
		if( !empty($data[$option_name]['font-family']) ){
			$default[$option_name] = $data[$option_name]['font-family'];
		}
		if( !empty($data[$option_name]['font-weight']) ){
			$default[$option_name . '_weight'] = $data[$option_name]['font-weight'];
		}
		if( !empty($data[$option_name]['font-style']) ){
			$default[$option_name . '_style'] = $data[$option_name]['font-style'];
		}
		if( !empty($data[$option_name]['font-size']) ){
			$default[$option_name . '_size'] = $data[$option_name]['font-size'];
		}
		if( !empty($data[$option_name]['line-height']) ){
			$default[$option_name . '_line_height'] = $data[$option_name]['line-height'];
		}
	}
	extract( $default );
}
?>	
	
	/*
	1. FONT FAMILY
	2. GENERAL COLORS
	3. HEADER COLORS
	4. MENU COLORS
	5. FOOTER COLORS
	6. PRODUCT COLORS
	7. CUSTOM FONT SIZE
	8. RESPONSIVE
	9. FULLWIDTH LAYOUT
	10. DISABLED REPONSIVE
	*/
	header .logo img,
	header .logo-header img{
		max-width:<?php echo absint($ts_logo_width); ?>px;
	}
	/* ============= 1. FONT FAMILY ============== */
	<?php 
	/* Custom Font */
	if( isset($ts_custom_font_ttf) && $ts_custom_font_ttf['url'] ):
	?>
	@font-face {
		font-family: 'CustomFont';
		src:url('<?php echo esc_url($ts_custom_font_ttf['url']); ?>') format('truetype');
		font-weight: normal;
		font-style: normal;
	}
	<?php endif; ?>
	<?php 
	/* Custom Icon Loading */
	if( isset($ts_small_loading_icon) && $ts_small_loading_icon['url'] ):
	?>
	.woocommerce a.button.loading:after,
	.woocommerce button.button.loading:after,
	.woocommerce input.button.loading:after,
	.ts-youtube-video-bg .loading,
	.ts-blogs-wrapper .load-more-wrapper .button.loading:before,
	.ts-portfolio-wrapper .load-more-wrapper .button.loading:before,
	.woocommerce .wishlist_table .product-add-to-cart a.loading:after{
		background-image:url('<?php echo esc_url($ts_small_loading_icon['url']); ?>');
	}
	.single-portfolio .ic-like.loading:after,
	.compare-list div.blockUI.blockOverlay:before,
	.meta-wrapper .button-in a.compare div.blockUI.blockOverlay,
	.thumbnail-wrapper .button-in a.compare div.blockUI.blockOverlay,
	div.product a.compare div.blockUI.blockOverlay,
	.ts-search-by-category .search-content.loading input[type="submit"],
	.ts-search-by-category .search-content.loading ~ .search-button input[type="submit"],
	.ts-tiny-cart-wrapper ul li div.blockUI.blockOverlay:before,
	.widget_shopping_cart ul li div.blockUI.blockOverlay:before,
	.woocommerce .product-wrapper .button-in div.blockUI.blockOverlay:before,
	.woocommerce .summary .yith-wcwl-add-to-wishlist  div.blockUI.blockOverlay:before{
		background-image:url('<?php echo esc_url($ts_small_loading_icon['url']); ?>') !important;
	}
	<?php endif; ?>
	
	<?php 
	/* Custom Background Overplay */
	if( isset($ts_blockoverplay) && $ts_blockoverplay == 'dark' ):
	?>
	
	#yith-wcwl-form .blockOverlay,
	div.blockUI.blockOverlay{
		background-color:rgba(0,0,0,0.5) !important;
	}
	
	<?php endif; ?>
	
	<?php 
	/* Custom Big Icon Loading */
	if( isset($ts_big_loading_icon) && $ts_big_loading_icon['url'] ):
	?>
	.images.loading:before,
	.list-posts article .gallery.loading:before,
	.widget-container .gallery.loading figure:before,
	.related-posts.loading .content-wrapper:before,
	.ts-product .content-wrapper.loading:before,
	.thumbnails-container.loading:before,
	.thumbnails.loading:before,
	.ts-logo-slider-wrapper.loading .content-wrapper:before,
	.ts-products-widget .ts-products-widget-wrapper.loading:before,
	.ts-blogs-widget .ts-blogs-widget-wrapper.loading:before,
	.ts-recent-comments-widget .ts-recent-comments-widget-wrapper.loading:before,
	.blogs article a.gallery.loading:before,
	.ts-blogs-wrapper.loading .content-wrapper:before,
	.ts-products-video-wrapper .content-products.loading:before,
	.ts-products-video-wrapper .content-video.loading:before,
	.ts-testimonial-wrapper .items.loading:before,
	.ts-twitter-slider .items.loading:before,
	.single .gallery.loading:before,
	.ts-portfolio-wrapper.loading:before,
	.ts-team-members.loading:before,
	.ts-product-category-wrapper .content-wrapper.loading:before,
	.woocommerce .product figure.loading:before,
	.ts-instagram-wrapper.loading:before,
	.vc_row.loading:before,
	.single-product-top-thumbnail-slider.loading:before,
	.images-slider-wrapper .image-items.loading:before,
	.banners.loading:before,
	.column-products.loading:before,
	.big-product.loading:before,
	.small-products.loading:before,
	#cboxLoadingGraphic{
		background-image:url('<?php echo esc_url($ts_big_loading_icon['url']); ?>');
	}
	div.blockUI.blockOverlay:before{
		background-image:url('<?php echo esc_url($ts_big_loading_icon['url']); ?>') !important;
	}
	<?php endif; ?>
		
	
	/* 1. FONT FAMILY */
	html,
	body,
	label,
	input,
	textarea,
	keygen,
	select,
	button,
	.hotspot-modal,
	.mc4wp-form-fields label,
	.font-body,
	.ts-button.fa,
	li.fa,
	h3.product-name > a,
	h3.product-name,
	h3.heading-title > a,
	.avatar-name a,
	h1 > a,
	h2 > a,
	h3 > a,
	h4 > a,
	h5 > a,
	h6 > a,
	.woocommerce div.product .images .product-label span.onsale, 
	.woocommerce div.product .images .product-label span.new, 
	.woocommerce div.product .images .product-label span.featured, 
	.woocommerce div.product .images .product-label span.out-of-stock, 
	.woocommerce div.product .images .product-label span,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab a,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-right .vc_tta-tab a,
	.ts-testimonial-wrapper .testimonial-content h4.name a,
	.ts-twitter-slider.twitter-content h4.name > a,
	.vc_toggle_default .vc_toggle_title h4,
	.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title,
	.cart_totals table th,
	.woocommerce #order_review table.shop_table tfoot td,
	.woocommerce table.shop_table.order_details tfoot th,
	body.wpb-js-composer .vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	body .pp_nav .currentTextHolder,
	body .theme-default .nivo-caption,
	.dokan-category-menu .sub-block h3,
	.menu-wrapper nav > ul.menu li .menu-desc,
	body #yith-woocompare > *,
	.horizontal-icon-small .feature-header h3 a,
	body .hotspot-moda,
	body .compare-list,
	.ts-milestone h3.subject,
	del .amount,
	body .font-family-body{
		font-family:<?php echo esc_html($ts_body_font); ?>;
		font-weight:<?php echo esc_html($ts_body_font_weight); ?>;
	}
	blockquote span.author,
	.comment-meta span.author,
	.entry-author .author-info .author,
	.avatar-name a,
	.comments-area .reply a,
	.ts-price-table .table-title,
	.woocommerce form .form-row label.inline,
	.list-posts .button-readmore,
	.ts-blogs .button-readmore,
	.ts-tiny-cart-wrapper .total > span.total-title,
	.widget_shopping_cart .total-title,
	.brands-link span:not(.brand-links),
	.cats-link span:not(.cat-links),
	.tags-link span:not(.tag-links),
	.vertical-menu-wrapper .vertical-menu-heading,
	.ts-social-sharing span,
	.widget_calendar caption,
	table#wp-calendar thead th,
	.widget_rss .rsswidget,
	.widget_rss cite,
	.woocommerce-account .woocommerce-MyAccount-navigation li a,
	.wp-caption p.wp-caption-text,
	body div.ppt,
	.woocommerce #reviews #reply-title,
	.widget_shopping_cart_content p.total strong,
	.wp-caption p.wp-caption-text,
	.woocommerce div.product .product_title,
	.ts-blogs-widget-wrapper .post-title
	.cart_list .quantity,
	body #yith-woocompare table.compare-list .add-to-cart td a,
	body #yith-woocompare table.compare-list tr.price th,
	body #yith-woocompare table.compare-list tr.price td,
	a.button,
	button,
	input[type^="submit"],
	.shopping-cart p.buttons a,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce-page a.button,
	.woocommerce-page button.button,
	.woocommerce-page input.button,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce-page a.button.alt,
	.woocommerce-page button.button.alt,
	.woocommerce-page input.button.alt,
	#content button.button,
	.woocommerce #respond input#submit, 
	body .yith-woocompare-widget a.compare,
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.woocommerce-page .widget_price_filter .price_slider_amount .button,
	.bbp-meta .bbp-topic-permalink,
	.bbp-topic-title-meta a,
	#bbpress-forums div.bbp-topic-author a.bbp-author-name,
	#bbpress-forums div.bbp-reply-author a.bbp-author-name,
	#bbpress-forums .bbp-header div.bbp-topic-content a,
	#bbpress-forums .bbp-header div.bbp-reply-content a,
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation a,
	#bbpress-forums fieldset.bbp-form legend,
	#bbpress-forums .status-category > li.bbp-forum-info > .bbp-forum-title,
	#bbpress-forums #bbp-user-navigation ,
	#bbpress-forums .type-forum .bbp-forum-title,
	.type-topic .bbp-topic-title > a,
	#favorite-toggle a,
	#subscription-toggle a,
	#bbpress-forums ul.bbp-lead-topic .bbp-header,
	#bbpress-forums ul.bbp-topics .bbp-header,
	#bbpress-forums ul.bbp-forums .bbp-header,
	#bbpress-forums ul.bbp-replies > .bbp-header,
	#bbpress-forums ul.bbp-search-results .bbp-header,
	.portfolio-info > span:first-child,
	.single-portfolio .social-sharing > span,
	.woocommerce > form > fieldset legend,
	.cloud-zoom-title,
	.woocommerce-cart .cart-collaterals .cart_totals .order-total th,
	.woocommerce-cart .cart-collaterals .cart_totals table td:before,
	.woocommerce-cart .cart-collaterals .cart_totals table,
	.woocommerce-cart .cart-collaterals .cart_totals table th,
	.woocommerce-cart .cart-collaterals .cart_totals table td,
	.ts-tiny-cart-wrapper .total > span.total-title,
	.widget_shopping_cart .total-title,
	.wishlist_table tr td.product-stock-status span.wishlist-in-stock,
	body:not(.product-style-2) .thumbnail-wrapper .product-group-button .loop-add-to-cart .button-tooltip,
	body .product-edit-new-container .dokan-btn-lg,
	#ts-search-result-container .view-all-wrapper,
	.ts-search-result-container li a span.hightlight,
	.shopping-cart-wrapper .cart-item-wrapper > span,
	.ts-countdown.style-border .counter-wrapper > div .ref-wrapper,
	.vc_pie_chart .vc_pie_chart_value,
	.vc_progress_bar .vc_single_bar .vc_label,
	.ts-button.fa,
	.ts-button,
	.amount,
	.vc_column_container .vc_btn,
	.vc_column_container .wpb_button,
	.woocommerce div.product .woocommerce-tabs ul.tabs li > a,
	body.wpb-js-composer .vc_toggle_default .vc_toggle_title h4,
	body.wpb-js-composer .vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a span,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a span,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab a span,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-right .vc_tta-tab a span,
	.title-contact,
	.single-portfolio .single-navigation > div a:first-child,
	#ts-search-sidebar .ts-search-result-container .view-all-wrapper a,
	.ts-search-result-container > p,
	.comment-form-rating label,
	.ts-product-attribute > div a:hover,
	.vertical-icon-circle2 .feature-header h3 a,
	.products .product.product-category div.button,
	.woocommerce .products .product.product-category div.button,
	body a.button-text,
	.ts-banner-image .button-link,
	.big-product h3.product-name > a,
	.ts-label span,
	h3.entry-title > a,
	.ts-team-members h3 a,
	.event .title-time .title,
	.portfolio-inner h3 a,
	body h4.wpb_pie_chart_heading,
	.dropdown-container .form-content .cart-number,
	.woocommerce-account-fields > p > label,
	.woocommerce #payment ul.payment_methods > li > label,
	.woocommerce-checkout .checkout #ship-to-different-address label,
	.woocommerce div.product form.cart div.quantity span,
	.wishlist_table tr td.product-stock-status span,
	.wishlist_table tr td.product-stock-status span.wishlist-in-stock,
	.woocommerce #order_review table.shop_table tfoot th,
	body #yith-woocompare table.compare-list th,
	.ts-price-table.style-5 .table-price,
	.ts-price-table.style-6 .table-price,
	.ts-price-table.style-7 .table-price,
	.ts-milestone.style-2 .number,
	.widget-title,
	.widgettitle,
	/* Event */
	#tribe-events .tribe-events-button,
	#tribe_events_filters_wrapper input[type=submit],
	.tribe-events-button,
	.tribe-events-button.tribe-inactive,
	#tribe-events-footer ~ a.tribe-events-ical.tribe-events-button,
	.text-feature-bg,
	.heading-wrapper > h2, 
	.heading-shortcode > h3, 
	.theme-title > h3, 
	.cross-sells > h2, 
	.upsells > h2, 
	.related > h2,
	.woocommerce .wishlist_table .product-add-to-cart a{
		font-family:<?php echo esc_html($ts_body_2_font); ?>;/* font body 2 */
		font-weight:<?php echo esc_html($ts_body_2_font_weight); ?>;/* font body 2 */
	}
	body .font-family-body.font-bold,
	.events .date > span:first-child{
		font-weight:<?php echo esc_html($ts_body_2_font_weight); ?>;/* font body 2 */
	}
	.testimonial-content h4 > a,
	.events .date > span:last-child,
	.ts-feature-wrapper .feature-header h3 a,
	.ts-feature-wrapper .feature-header h3,
	.ts-product-in-product-type-tab-wrapper.style-3 .tabs li{
		font-size:<?php echo esc_html($ts_body_2_font_size); ?>;/* font body 2 */
		line-height:<?php echo esc_html($ts_body_2_font_line_height); ?>;/* font body 2 */
	}
	.ts-banner.style-1 .description,
	.ts-label span,
	.ts-blogs-wrapper .blogs article.quote blockquote,
	.ts-product-in-category-tab-wrapper.style-2 .column-tabs .tabs li{
		font-size:<?php echo esc_html($ts_body_2_font_size); ?>;/* font body 2 */
	}
	
	h1,h2,h3,h4,h5,h6,
	.h1,.h2,.h3,.h4,.h5,.h6,
	h1.wpb_heading,
	h2.wpb_heading,
	h3.wpb_heading,
	h4.wpb_heading,
	h5.wpb_heading,
	h6.wpb_heading,
	.table-title-2,
	.table-title,

	body.woocommerce > h1,
	#order_review_heading,
	.breadcrumb-title-wrapper.breadcrumb-v2 .breadcrumb-title > h1,
	.ts-heading > *,
	.shortcode-heading-wrapper .heading-title,
	#customer_login h2,
	.woocommerce-account div.woocommerce > h2,
	.account-content h2,
	.woocommerce-MyAccount-content > h2,
	.woocommerce-customer-details > h2,
	.woocommerce-order-details > h2,
	.woocommerce-billing-fields > h3,
	.woocommerce-additional-fields > h3,
	header.woocommerce-Address-title > h3,
	.woocommerce div.wishlist-title h2,
	.woocommerce-cart .cart-collaterals .cart_totals > h2,

	.big-price-2 .amount,
	.ts-team-members.style-5 .member-role,
	.ts-milestone.style-2 h3.subject,
	.testimonial-content .byline,
	.category-name h3 a,
	.ts-product-brand-wrapper .item h3 a,
	.list-posts .entry-title a{
		font-family:<?php echo esc_html($ts_heading_font); ?>;
		font-weight:<?php echo esc_html($ts_heading_font_weight); ?>;
	}
	
	.heading-font-2,
	.ts-banner.style-1 .description,
	.style-1 .product-category .count,
	.style-3 .product-category .count{
		font-family:<?php echo esc_html($ts_heading_2_font); ?>;
		font-weight:<?php echo esc_html($ts_heading_2_font_weight); ?>;
	}
	
	.menu-wrapper nav > ul.menu > li > a,
	.menu-wrapper nav > ul > li > a,
	.vertical-menu-wrapper .vertical-menu-heading{
		font-family:<?php echo esc_html($ts_menu_font); ?>;
		font-weight:<?php echo esc_html($ts_menu_font_weight); ?>;
	}
	.menu-wrapper nav > ul.menu ul.sub-menu > li > a, 
	.menu-wrapper nav div.list-link li > a, 
	.menu-wrapper nav > ul.menu li.widget_nav_menu li > a,
	.mobile-menu-wrapper li a{
		font-family:<?php echo esc_html($ts_body_font); ?>;
		font-weight:<?php echo esc_html($ts_body_font_weight); ?>;
	}
	.mobile-menu-wrapper nav > ul > li > a{
		font-weight:<?php echo esc_html($ts_menu_font_weight); ?>;
	}
	/* 2. GENERAL COLORS */
	
	/* Background Content Color */
	body #main,
	body.dokan-store #main:before,
	#cboxLoadedContent,
	form.checkout div.create-account,
	#main > .page-container,
	#main > .fullwidth-template,
	.images.loading:before,
	.list-posts article .gallery.loading:before,
	.widget-container .gallery.loading figure:before,
	.related-posts.loading .content-wrapper:before,
	.ts-product .content-wrapper.loading:before,
	.thumbnails-container.loading:before,
	.thumbnails.loading:before,
	.ts-logo-slider-wrapper.loading .content-wrapper:before,
	.ts-products-widget .ts-products-widget-wrapper.loading:before,
	.ts-blogs-widget .ts-blogs-widget-wrapper.loading:before,
	.ts-recent-comments-widget .ts-recent-comments-widget-wrapper.loading:before,
	.blogs article a.gallery.loading:before,
	.ts-blogs-wrapper.loading .content-wrapper:before,
	.ts-testimonial-wrapper .items.loading:before,
	.ts-twitter-slider .items.loading:before,
	.single .gallery.loading:before,
	.ts-portfolio-wrapper.loading:before,
	.ts-team-members.loading:before,
	.ts-product-category-wrapper .content-wrapper.loading:before,
	.woocommerce .product figure.loading:before,
	.ts-instagram-wrapper.loading:before,
	.vc_row.loading:before,
	.single-product-top-thumbnail-slider.loading:before,
	.small-products.loading:before,
	body .flexslider .slides,
	body .wpb_gallery_slides.wpb_slider_nivo,
	.ts-floating-sidebar .ts-sidebar-content,
	.ts-popup-modal .popup-container,
	#ts-account-modal .account-content,
	#cboxContent,
	body #ts-search-result-container ul:before,
	.ts-products-video-wrapper.title-background-border ul.product_list_widget li.current,
	.ts-products-video-wrapper.title-background-border ul.product_list_widget li:hover,
	.ts-products-video-wrapper .content-products.loading:before,
	.ts-products-video-wrapper .content-video.loading:before,
	.active-table.style-2 .group-price,
	body .select2-container--default .select2-selection--single .select2-selection__rendered,
	#yith-wcwl-popup-message,
	#ts-top-filter-widget-area-sidebar .ts-sidebar-content,
	.woocommerce a.button.loading:after,
	.woocommerce button.button.loading:after,
	.woocommerce input.button.loading:after,
	.woocommerce .wishlist_table .product-add-to-cart a.loading:after,
	.ts-blogs-wrapper .load-more-wrapper .button.loading:before,
	.ts-portfolio-wrapper .load-more-wrapper .button.loading:before,
	.thumbnail-wrapper .button-in.wishlist a.loading:before,
	.meta-wrapper .button-in.wishlist a.loading:before,
	.thumbnail-wrapper .button-in.compare a.loading:after,
	.meta-wrapper .button-in.compare a.loading:after,
	.woocommerce .add_to_wishlist.loading:after,
	.single-portfolio .ic-like.loading:after,
	.dataTables_wrapper,
	body.woocommerce > h1,
	body > .compare-list,
	body #ts-search-result-container > p{
		background-color:<?php echo esc_html($ts_main_content_background_color); ?>;
	}
	body .prev-button,
	body .next-button,
	body #cboxClose{
		background-color:<?php echo esc_html($ts_main_content_background_color); ?> !important;
	}
	.single-image-padding > div:first-child .ts-single-image,
	.product-wrapper .color-swatch > div:before{
		border-color:<?php echo esc_html($ts_main_content_background_color); ?>;
	}

	/* Widget & Shortcode Background */
	body.main-content-wide #main > .page-container.show_breadcrumb_v3 div.product > .vc_row,
	body.main-content-wide #main > .fullwidth-template.show_breadcrumb_v3 div.product > .vc_row,
	body.wide #main > .page-container.show_breadcrumb_v3 div.product > .vc_row,
	body.wide #main > .fullwidth-template.show_breadcrumb_v3 div.product > .vc_row,
	.show_breadcrumb_v3 #primary > .vc_row,
	.ts-team-members.style-5 .team-content,
	.ts-team-members.style-2 .team-content,
	.ts-youtube-video-bg .loading,
	.vertical-icon-circle:before,
	.horizontal-icon-circle .feature-icon,
	.ts-price-table,
	.ts-price-table.style-1 header:before,
	.ts-price-table.style-1 header:after,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-2 .vc_tta-panels-container .vc_tta-panel-body,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-4 .vc_tta-panels-container .vc_tta-panel-body,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-1 .vc_tta-panel .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-2 .vc_tta-panel .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-4 .vc_tta-panel.vc_active .vc_tta-panel-title > a,
	.single-navigation > div .product-info:before,
	.woocommerce .woocommerce-ordering .orderby ul:before,
	.product-per-page-form ul.perpage ul:before,
	.woocommerce .filter-widget-area .widget_price_filter .price_slider_wrapper .ui-widget-content,
	body .wpml-ls-legacy-dropdown .wpml-ls-sub-menu:after,
	body .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu:after,
	.shopping-cart-wrapper .dropdown-container:after,
	.my-account-wrapper .dropdown-container:after,
	.header-currency ul:after,
	.shopping-cart-wrapper .dropdown-container:before,
	.my-account-wrapper .dropdown-container:before,
	body .wpml-ls-legacy-dropdown .wpml-ls-sub-menu:before,
	body .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu:before,
	.header-currency ul:before,
	.product-category-top-content:before,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle:before,
	body.wpb-js-composer .vc_tta-tabs.vc_tta-tabs-position-left,
	body.wpb-js-composer .vc_tta-tabs.vc_tta-tabs-position-right,
	body.wpb-js-composer .vc_toggle_default.vc_toggle_active .vc_toggle_icon,
	body.wpb-js-composer .vc_toggle_default.vc_toggle_active .vc_toggle_title h4,
	body.wpb-js-composer .vc_toggle_default.vc_toggle_active .vc_toggle_content,
	body.wpb-js-composer .vc_tta-container .vc_tta-tabs.vc_tta-style-1 .vc_tta-tab,
	body.wpb-js-composer .vc_tta-container .vc_tta-tabs.vc_tta-style-1 .vc_tta-panels-container,
	body.wpb-js-composer .vc_tta-container .vc_tta-tabs.vc_tta-style-2,
	.single-navigation .product-info:before,
	body .select2-container--default .select2-selection--single,
	body .select2-dropdown,
	html input[type="search"],
	html input[type="text"],
	html input[type="password"],
	html input[type="email"],
	html input[type="number"],
	html input[type="date"],
	html input[type="tel"],
	html textarea,
	select,
	#bbpress-forums #bbp-your-profile fieldset input,
	#bbpress-forums #bbp-your-profile fieldset textarea,
	.bbp-login-form .bbp-username input,
	.bbp-login-form .bbp-email input,
	.bbp-login-form .bbp-password input,
	.woocommerce form .form-row input.input-text,
	.woocommerce form .form-row textarea,
	.woocommerce table.cart td.actions .coupon .input-text,
	.widget-container .gallery.loading figure:before,
	.woocommerce .product figure.loading:before,
	.ts-product .content-wrapper.loading:before,
	.ts-products-widget .ts-products-widget-wrapper.loading:before,
	.ts-blogs-widget .ts-blogs-widget-wrapper.loading:before,
	.ts-recent-comments-widget .ts-recent-comments-widget-wrapper.loading:before,
	.images-slider-wrapper .image-items.loading:before,
	.banners.loading:before,
	.column-products.loading:before,
	.big-product.loading:before,
	.woocommerce #payment div.payment_box,
	.ts-blogs article .content-meta,
	.list-posts article,
	.vc_toggle,
	.ts-blogs.item-list .article-content,
	.ts-masonry.item-grid .article-content,
	.google-map-container .information,
	.ts-price-table.style-6 .button-border:hover,
	.ts-price-table.style-7 .button-border:hover,
	.has-background.style-2 .column-products,
	footer .style-vertical.vertical-button-text .mailchimp-subscription input[type="email"],
	.ts-product-in-product-type-tab-wrapper .column-content,
	/* Compare table */
	#cboxLoadingOverlay,
	/* Forum */
	#bbpress-forums ul.bbp-lead-topic,
	#bbpress-forums ul.bbp-topics,
	#bbpress-forums ul.bbp-forums,
	#bbpress-forums ul.bbp-replies,
	#bbpress-forums ul.bbp-search-results{
		background-color:<?php echo esc_html($ts_widget_content_background_color); ?>;
	}

	.dropdown-container .form-content:after,
	.my-account-wrapper .form-content:after,
	body .wpml-ls-legacy-dropdown > ul > li:before,
	body .wpml-ls-legacy-dropdown-click > ul > li:before,
	.header-currency > div:before{
		border-bottom-color:<?php echo esc_html($ts_widget_content_background_color); ?>;
	}

	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle:before{
		border-color:<?php echo esc_html($ts_widget_content_background_color); ?>;
	}

	.woocommerce-checkout #payment div.payment_box:before{
		border-bottom-color:<?php echo esc_html($ts_widget_content_background_color); ?>;
	}
	
	/* BODY COLOR */

	body,
	.gridlist-toggle a:hover,
	.gridlist-toggle a.active,
	.woocommerce-account-fields > p > label,
	.woocommerce #payment ul.payment_methods > li > label,
	.woocommerce-checkout .checkout #ship-to-different-address label,
	.woocommerce div.product p.stock span,
	.wishlist_table tr td.product-stock-status span,
	.wishlist_table tr td.product-stock-status span.wishlist-in-stock,
	body.wpb-js-composer .vc_toggle .vc_toggle_icon:before,
	body .star-rating.no-rating:before,
	div.product .summary .yith-wcwl-add-to-wishlist a,
	.woocommerce div.product .summary a.compare,
	.woocommerce div.product.summary .woocommerce-product-details__short-description,
	.cats-link,
	.tags-link,
	.brands-link,
	.cats-link a,
	.tags-link a,
	.brands-link a,
	.ts-feature-wrapper .see-more,
	/* Widget */
	span.bbp-admin-links a,
	span.bbp-admin-links,
	.ts-product-attribute > div a,
	.comment_list_widget .comment-body,
	.woocommerce table.shop_attributes td,
	.woocommerce table.shop_attributes th,
	.woocommerce p.stars a,
	.woocommerce-product-rating .woocommerce-review-link,
	table tfoot th,
	.woocommerce-checkout #payment div.payment_box,
	body .pp_nav .currentTextHolder,
	.dashboard-widget.products ul li a,
	.single-portfolio .cat-links > a,
	.portfolio-inner .item .cats-portfolio a,
	/* Forum */
	.bbp-login-links a,
	#bbpress-forums .status-category > li > .bbp-forums-list > li a,
	li.bbp-forum-freshness a,
	li.bbp-topic-freshness a,
	.list-cats li a,
	.widget-container ul li > a,
	.dokan-widget-area .widget ul li > a,
	.dokan-orders-content .dokan-orders-area ul.order-statuses-filter li a,
	.dokan-dashboard .dokan-dashboard-content ul.dokan_tabs li.active > a,
	.dokan-dashboard .dokan-dashboard-content ul.dokan_tabs li > a:hover,
	.product-categories .count,
	.header-top .wpml-ls ul ul li a:not(.button),
	.header-transparent.header-text-light.header-v7 .header-currency .wcml_currency_switcher ul li a:not(.button),
	.header-transparent.header-text-light.header-v7 .header-top .wpml-ls ul ul li a:not(.button),
	.header-currency .wcml_currency_switcher ul li a:not(.button),
	.ts-team-members .member-social a,
	.before-loop-wrapper .top-filter-widget-area-button a,
	.single-portfolio .single-navigation > div a,
	.single-portfolio .single-navigation > a,
	.horizontal-icon-small .feature-header h3 a,
	body #yith-woocompare table.compare-list tr.remove td > a .remove:before,
	.horizontal-box-border .feature-content > a,
	.woocommerce-product-rating .woocommerce-review-link,
	div.product .summary .email a,
	.dataTables_wrapper,
	footer .style-vertical.vertical-button-text .mailchimp-subscription input[type="email"],
	.ts-list-of-product-categories-wrapper.style-2 ul li a,
	.yith-wcwl-share ul li a{
		color:<?php echo esc_html($ts_text_color); ?>;
	}
	body .theme-default .nivo-controlNav a:before,
	.owl-dots > div > span:before,
	.owl-dots > div > span{
		background:<?php echo esc_html($ts_text_color); ?>;
	}
	.comment_list_widget .comment-meta span.date,
	.post_list_widget .blockquote-meta,
	.post_list_widget .entry-meta > span,
	.ts-product-video-button,
	.ts-product-360-button,
	.ts-social-sharing li a,
	.gridlist-toggle a,
	.gridlist-toggle a:hover,
	.widget-container .tagcloud a,
	.product-categories a,
	.product .product-brands a,
	.widget_recent_entries .post-date,
	.widget_rss .rss-date,
	.ts-twitter-widget .date-time,
	.woocommerce .woocommerce-ordering ul li a,
	.product-per-page-form ul.perpage ul li a,
	.woocommerce-checkout #payment .payment_method_paypal .about_paypal,
	header .header-template .my-account-wrapper .forgot-pass a,
	p.lost_password a{
		color:<?php echo esc_html($ts_text_light_color); ?>;
	}
	header .header-template .my-account-wrapper .forgot-pass a,
	.woocommerce table.shop_table .product-remove a,
	.cart_list li .cart-item-wrapper a.remove,
	.woocommerce .widget_shopping_cart .cart_list li a.remove,
	.woocommerce.widget_shopping_cart .cart_list li a.remove{
		color:<?php echo esc_html($ts_text_light_color); ?> !important;
	}
	.ts-heading.style-border-primary,
	.ts-shortcode.style-border-thin .shortcode-heading-wrapper{
		border-color:<?php echo esc_html($ts_text_light_color); ?>;
	}
	.wpcf7-form-control-wrap::-webkit-input-placeholder,
	.wpcf7-form-control-wrap:-moz-placeholder,
	.wpcf7-form-control-wrap::-moz-placeholder,
	.wpcf7-form-control-wrap:-ms-input-placeholder{
		color:<?php echo esc_html($ts_text_color); ?>;
	}
	/* Event */
	#tribe-bar-collapse-toggle span.tribe-bar-toggle-arrow:after{
		border-top-color:<?php echo esc_html($ts_text_color); ?>;
	}
	/* Quick view */
	body #cboxClose,
	#ts-search-popup .ts-button-close,
	#ts-quickshop-modal span.close{
		color:<?php echo esc_html($ts_text_color); ?> !important;
	}
	select,
	textarea,
	html input[type="search"],
	html input[type="text"],
	html input[type="email"],
	html input[type="password"],
	html input[type="date"],
	html input[type="number"],
	html input[type="tel"],
	body .select2-container--default .select2-search--dropdown .select2-search__field,
	body .select2-container--default .select2-selection--single,
	body .select2-dropdown,
	#bbpress-forums #bbp-your-profile fieldset input,
	#bbpress-forums #bbp-your-profile fieldset textarea,
	.bbp-login-form .bbp-username input,
	.bbp-login-form .bbp-email input,
	.bbp-login-form .bbp-password input,
	body .select2-container--default .select2-selection--single,
	body .select2-container--default .select2-search--dropdown .select2-search__field,
	.woocommerce form .form-row.woocommerce-validated .select2-container,
	.woocommerce form .form-row.woocommerce-validated input.input-text,
	.woocommerce form .form-row.woocommerce-validated select,
	body .select2-container--default .select2-selection--multiple{
		color:<?php echo esc_html($ts_input_text_color); ?>;
		border-color:<?php echo esc_html($ts_input_border_color); ?>;
	}
	body .select2-container--default .select2-selection--single .select2-selection__rendered{
		color:<?php echo esc_html($ts_input_text_color); ?>;
	}
	html input[type="search"]:hover,
	html input[type="text"]:hover,
	html input[type="email"]:hover,
	html input[type="password"]:hover,
	html input[type="date"],
	html input[type="number"]:hover,
	html input[type="tel"]:hover,
	html textarea:hover,
	html input[type="search"]:focus,
	html input[type="text"]:focus,
	html input[type="email"]:focus,
	html input[type="password"]:focus,
	html input[type="date"]:focus,
	html input[type="number"]:focus,
	html input[type="tel"]:focus,
	input:-webkit-autofill,
	textarea:-webkit-autofill,
	select:-webkit-autofill,
	html textarea:focus,
	.woocommerce form .form-row textarea:hover,
	.woocommerce form .form-row textarea:focus,
	#bbpress-forums #bbp-your-profile fieldset input:hover,
	#bbpress-forums #bbp-your-profile fieldset textarea:hover,
	#bbpress-forums #bbp-your-profile fieldset input:focus,
	#bbpress-forums #bbp-your-profile fieldset textarea:focus,
	.bbp-login-form .bbp-username input:hover,
	.bbp-login-form .bbp-email input:hover,
	.bbp-login-form .bbp-password input:hover,
	.bbp-login-form .bbp-username input:focus,
	.bbp-login-form .bbp-email input:focus,
	.bbp-login-form .bbp-password input:focus,
	body .select2-container--default.select2-container--focus .select2-selection--multiple,
	.woocommerce form .form-row.woocommerce-validated .select2-container,
	.woocommerce form .form-row.woocommerce-validated input.input-text,
	.woocommerce form .form-row.woocommerce-validated select,
	body .select2-container--open .select2-selection--single,
	body .select2-container--open .select2-dropdown--below,
	#ts-search-sidebar .search-table .search-content input[type="text"]{
		color:<?php echo esc_html($ts_input_text_color_hover); ?>;
		border-color:<?php echo esc_html($ts_input_border_color_hover); ?>;
	}
	.woocommerce .woocommerce-ordering ul.orderby:hover,
	.product-per-page-form ul.perpage:hover{
		border-color:<?php echo esc_html($ts_input_border_color_hover); ?>;
	}
	.woocommerce .woocommerce-ordering .orderby:hover ul:before,
	.product-per-page-form ul.perpage:hover ul:before{
		border-bottom-color:<?php echo esc_html($ts_input_border_color_hover); ?>;
		border-left-color:<?php echo esc_html($ts_input_border_color_hover); ?>;
		border-right-color:<?php echo esc_html($ts_input_border_color_hover); ?>;
	}
	body .select2-container--open .select2-selection--single .select2-selection__rendered{
		color:<?php echo esc_html($ts_input_text_color_hover); ?>;
	}
	
	/* HEADING COLOR */

	h1,h2,h3,h4,h5,h6,
	.h1,.h2,.h3,.h4,.h5,.h6,
	.woocommerce > form > fieldset legend{
		color:<?php echo esc_html($ts_heading_color); ?>;
	}

	/* LINK COLOR */

	a{
		color:<?php echo esc_html($ts_link_color); ?>;
	}
	a:hover,
	a:active{
		color:<?php echo esc_html($ts_link_color_hover); ?>;
	}
	
	/* PRIMARY TEXT COLOR */
	table thead th,
	label ,
	p > label,
	fieldset div > label,
	.wpcf7 p,
	.primary-text,
	.list-posts .button-readmore,
	.ts-blogs .button-readmore,
	/* Widget */
	.widget_recent_entries ul li > a,
	.widget_recent_comments ul li > a,
	.widget_rss .rsswidget,
	.widget_rss cite,
	table#wp-calendar thead th,
	.widget-container .tagcloud a:hover,
	/* Product Detail */
	h3.heading-title > a,
	.woocommerce .widget-container .price_slider_amount .price_label,
	.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li > a,
	.ts-heading h1,
	.ts-heading h2,
	.ts-heading h3,
	.ts-heading h4,
	blockquote.style-2 span.author,
	blockquote p.author-role > span.author a,
	.avatar-name a,
	h1 > a,
	h2 > a,
	h3 > a,
	h4 > a,
	h5 > a,
	h6 > a,
	.ol-style > li:before,
	.ul-style > li:before,
	.comment-meta > span.author a,
	.comments-area .reply a:hover,
	.woocommerce div.product .sku-wrapper span:not(.sku),
	.woocommerce div.product p.availability.stock label,
	.brands-link span:not(.brand-links),
	.cats-link span:not(.cat-links),
	.tags-link span:not(.tag-links),
	.ts-social-sharing span,
	.woocommerce div.product form.cart div.quantity span,
	.secondary-color,
	.ts-sidebar-content h4.title,
	p.author-role > span,
	.vc_col-sm-12 .vertical-button-icon .subscribe-email .button:hover,
	.vertical-button-icon .subscribe-email .button,
	.vertical-border-round-button-icon .subscribe-email .button,
	.title-primary-color h3 a:hover,
	.style-6 .table-price,
	.style-6 .during-price,
	.style-7 .table-price,
	.style-7 .during-price,
	.ts-price-table .table-description,
	.ts-product-deals-2-wrapper .short-description,
	.ts-product-deals-2-wrapper .availability-bar,
	.ts-product-deals-2-wrapper .products .owl-nav > div,
	body a.button-text,
	.ts-product-category-wrapper .category-name h3 > a,
	.ts-product-brand-wrapper .meta-wrapper h3 > a,
	.ts-search-result-container > p,
	.single-portfolio .single-navigation > div a:first-child,
	.title-contact,
	.ts-price-table.style-4 header *,
	.ts-price-table.style-2 header *,
	.woocommerce .cart_totals .continue-shopping,
	.woocommerce .button.button-border,
	.button.button-border,
	.ts-milestone .number,
	.dropdown-container .form-content .cart-number,
	.widget-title,
	.woocommerce .woocommerce-ordering ul li a:hover,
	.product-per-page-form ul.perpage ul li a:hover,
	.product-per-page-form ul.perpage ul li a.current,
	.woocommerce .woocommerce-ordering .orderby li a.current,
	.woocommerce .woocommerce-ordering ul.orderby:hover .orderby-current,
	.product-per-page-form ul.perpage:hover > li span,
	.ts-product-categories-widget ul.product-categories > li > a,
	.widget_categories > ul > li > a,
	.ts-countdown.text-light .counter-wrapper > div,
	.total .total-title,
	.cart_list .icon,
	.woocommerce div.product .product_title,
	.products .product.product-category div.button a,
	.woocommerce .products .product.product-category div.button a,
	/* Portfolio */
	.portfolio-inner .item h3 a,
	.ts-portfolio-wrapper .filter-bar li,
	.widget-container .post_list_widget > li a.post-title,
	.entry-author .author-info .role,
	.vc_progress_bar .vc_single_bar .vc_label,
	.vc_progress_bar .vc_single_bar .vc_bar:before,
	.vc_toggle .vc_toggle_icon:before,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
	.woocommerce p.stars a:hover,
	.woocommerce-cart .cart-collaterals .cart_totals table td,
	.woocommerce-cart .cart-collaterals .cart_totals table th,
	.shipping-calculator-button,
	.wp-caption p.wp-caption-text,
	#order_review_heading,
	.woocommerce form.login,
	.woocommerce form.register,
	.woocommerce .checkout #order_review table th,
	.mailchimp-subscription .widgettitle,
	.dashboard-widget.products ul li a,
	.row-heading-tabs ul li,
	.row-heading-tabs ul li a,
	.widget-container .tagcloud a:hover,
	.heading-title,
	.woocommerce-account .woocommerce-MyAccount-navigation li a,
	.woocommerce .widget_layered_nav ul li a,
	.woocommerce table.shop_table.order_details tfoot th,
	.woocommerce table.shop_table.customer_details th,
	.woocommerce #reviews #reply-title,
	.ts-gravatar-profile-widget .meta h4,
	.widget-container .social-icons li > a,
	.widget-title-wrapper a.block-control,
	.ts-social-icons .social-icons.style-square-fullwidth .ts-tooltip,
	.ts-social-icons .social-icons.style-vertical .ts-tooltip,
	fieldset legend,
	.woocommerce ul.order_details li strong,
	.ts-list-of-product-categories-wrapper ul li a,
	.column-tabs .tabs li,
	.vertical-button-icon .subscribe-email .button:after,
	.banner-row ul.categories li a,
	.vertical-border-button-icon .subscribe-email .button,
	.ts-list-of-product-categories-wrapper.style-2 ul li.view-all a,
	/* Portfolio */
	.portfolio-info > span:first-child,
	.single-portfolio .social-sharing > span,
	.single-portfolio .info-content .entry-title,
	.vc_pie_chart .vc_pie_chart_value,
	/* Forum */
	#bbpress-forums li.bbp-header .bbp-search-author,
	#bbpress-forums li.bbp-footer .bbp-search-author,
	#bbpress-forums li.bbp-header .bbp-forum-author,
	#bbpress-forums li.bbp-footer .bbp-forum-author,
	#bbpress-forums li.bbp-header .bbp-topic-author,
	#bbpress-forums li.bbp-footer .bbp-topic-author,
	#bbpress-forums li.bbp-header .bbp-reply-author,
	#bbpress-forums li.bbp-footer .bbp-reply-author,
	#bbpress-forums li.bbp-header .bbp-search-content,
	#bbpress-forums li.bbp-footer .bbp-search-content,
	#bbpress-forums li.bbp-header .bbp-forum-content,
	#bbpress-forums li.bbp-footer .bbp-forum-content,
	#bbpress-forums li.bbp-header .bbp-topic-content,
	#bbpress-forums li.bbp-footer .bbp-topic-content,
	#bbpress-forums li.bbp-header .bbp-reply-content,
	#bbpress-forums li.bbp-footer .bbp-reply-content,
	#bbpress-forums ul.bbp-lead-topic .bbp-header li,
	#bbpress-forums ul.bbp-topics .bbp-header li,
	#bbpress-forums ul.bbp-forums .bbp-header li,
	#bbpress-forums ul.bbp-replies > .bbp-header li,
	#bbpress-forums ul.bbp-search-results .bbp-header li,
	.type-forum .bbp-forum-title,
	#bbpress-forums li.bbp-footer,
	span.bbp-admin-links a:hover,
	#bbpress-forums fieldset.bbp-form legend,
	.type-topic .bbp-topic-title > a,
	#bbpress-forums div.bbp-topic-author a.bbp-author-name,
	#bbpress-forums div.bbp-reply-author a.bbp-author-name,
	.bbp-meta .bbp-topic-permalink,
	.bbp-topic-title-meta a,
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation a,
	#favorite-toggle a,
	#subscription-toggle a,
	div.quantity .number-button:hover:before,
	div.quantity .number-button:hover:after,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .tabs li,
	/* Event */
	.tribe-events-style-skeleton #tribe-bar-collapse-toggle,
	.tribe-events-day .tribe-events-day-time-slot h5,
	.tribe-events-list-separator-month span,
	.tribe-events-calendar td.tribe-events-past div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-past div[id*=tribe-events-daynum-] > a,
	.tribe-events-calendar thead th,
	.ts-list-of-product-categories-wrapper.style-2 .heading-title,
	.ts-product-deals-wrapper .availability-bar,
	/* Compare table */
	body.woocommerce > h1,
	body.woocommerce > h1 .close,
	body #yith-woocompare table.compare-list th,
	body.woocommerce > h1 a.close{
		color:<?php echo esc_html($ts_text_bold_color); ?>;
	}
	.shopping-cart-wrapper.cart-primary a > .ic-cart{
		background-color:<?php echo esc_html($ts_text_bold_color); ?>;
		border-color:<?php echo esc_html($ts_text_bold_color); ?>;
		color:<?php echo esc_html($ts_middle_header_background_color); ?>;
	}
	.ts-heading h1,
	.ts-heading h2,
	.ts-heading h3,
	.ts-heading h4,
	h1.wpb_heading,
	h2.wpb_heading,
	h3.wpb_heading,
	h4.wpb_heading,
	h5.wpb_heading,
	h6.wpb_heading,
	.ts-instagram-shortcode .widget-title-wrapper i,
	.shortcode-heading-wrapper .heading-title,
	.widget-title,
	#customer_login h2,
	.woocommerce-account div.woocommerce > h2,
	.account-content h2,
	.woocommerce-MyAccount-content > h2,
	.woocommerce-customer-details > h2,
	.woocommerce-order-details > h2,
	.woocommerce-billing-fields > h3,
	.woocommerce-additional-fields > h3,
	header.woocommerce-Address-title > h3,
	.woocommerce div.wishlist-title h2,
	.theme-title .heading-title,
	.comments-title .heading-title,
	#comment-wrapper .heading-title,
	.woocommerce .cross-sells > h2,
	.woocommerce .upsells > h2,
	.woocommerce .related > h2,
	.woocommerce ul.product_list_widget li > a.ts-wg-thumbnail:before,
	.ts-search-result-container ul li .thumbnail a:hover:before{
		border-color:<?php echo esc_html($ts_text_bold_color); ?>;
	}
	.ts-product-in-product-type-tab-wrapper.style-2 .column-tabs .heading-tab h3,
	.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range:before{
		background-color:<?php echo esc_html($ts_text_bold_color); ?>;
	}
	
	/* Button Dots Slider */
	.owl-nav > div,
	.prev-button,
	.next-button,
	div.product .single-navigation > div >  a{
		color:<?php echo esc_html($ts_input_text_color); ?>;
		border-color:<?php echo esc_html($ts_input_border_color); ?>;
		background:transparent;
	}
	/* Button Slider */
	div.product .single-navigation > div >  a:hover,
	.owl-nav > div:hover,
	.prev-button:hover,
	.next-button:hover{
		border-color:<?php echo esc_html($ts_primary_color); ?>;
		background:transparent;
		color:<?php echo esc_html($ts_primary_color); ?>;
	}
	.woocommerce .product figure .color-image.active span:before,
	.woocommerce .product figure .color.active span:before{
		border-color:<?php echo esc_html($ts_primary_color); ?>;
	}
	
	/* PRIMARY COLOR */
	.shopping-cart-wrapper.cart-primary a > .cart-number,
	.vertical-icon-circle .feature-icon,
	.horizontal-icon-circle .feature-icon:hover,
	.ts-blogs-wrapper .blogs article.quote blockquote,
	.ts-blogs-wrapper .blogs article.quote .entry-meta-bottom *,
	.ts-social-icons .ts-tooltip,
	.product-group-button .button-tooltip,
	.horizontal-icon-square .feature-icon:hover i,
	.portfolio-inner .icon-group a,
	/* Event */
	.single-tribe_events .tribe-events-schedule .tribe-events-cost,
	#tribe-bar-form .tribe-bar-submit input[type=submit],
	#tribe-events .tribe-events-button,
	#tribe_events_filters_wrapper input[type=submit],
	.tribe-events-button,
	.tribe-events-button.tribe-inactive,
	.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a,
	#tribe-events .tribe-events-button:hover,
	#tribe_events_filters_wrapper input[type=submit]:hover,
	.tribe-events-button:hover,
	.tribe-events-button.tribe-inactive:hover,
	#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
	.tribe-events-button:hover,
	.tribe-events-button.tribe-inactive:hover,
	#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
	#tribe-events-content .tribe-events-calendar .mobile-active:hover,
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active,
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-],
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-] a,
	.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-],
	.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-] a,
	.tribe-events-calendar td.mobile-active,
	#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover,
	.tribe-events-calendar td.tribe-events-present.mobile-active,
	.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a,
	.button.button-border.border-primary:hover,
	.ts-team-members.style-4 .team-content:hover .team-info *,
	.ts-team-members.style-5 .team-content:hover .team-info *{
		color:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.button.button-border.border-primary{
		background:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.ts-team-members.style-4 .team-content:hover h3:after,
	.vertical-office-address h6:before,
	.vertical-phone-numbers h6:before,
	.vertical-email-address h6:before,
	.vertical-fax-numbers h6:before,
	.ts-blogs-wrapper .blogs article.quote .entry-meta-bottom:before{
		border-color:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}

	blockquote:after,
	blockquote:before,
	blockquote span.author,
	.style-2 .testimonial-content .content:before,
	.list-posts .button-readmore:hover,
	.ts-blogs .button-readmore:hover,
	.ts-blogs.title-background-border .button-readmore,
	.widget_recent_entries ul li > a:hover,
	.widget_recent_comments ul li > a:hover,
	.widget_rss .rsswidget:hover,
	.ts-team-members .member-social a.custom:hover,
	.primary-color,
	.yith-wcwl-share ul li:hover a,
	.ts-testimonial-wrapper.style-5 .content:before,
	.ts-product-in-product-type-tab-wrapper.style-2 .column-tabs .tabs li:hover,
	.ts-product-deals-2-wrapper .products .owl-nav > div:hover,
	body .hotspot-modal .ico-close:hover,
	body .hotspot-modal--frontend .public-hotspot--username:hover,
	body a.button-text:hover,
	.ts-product-category-wrapper .category-name h3 > a:hover,
	.ts-product-brand-wrapper .meta-wrapper h3 > a:hover,
	.products .product.product-category div.button a:hover,
	.woocommerce .products .product.product-category div.button a:hover,
	.vertical-icon-circle2 .feature-icon,
	.horizontal-icon-small .feature-header h3 a:before,
	.horizontal-icon-small .feature-header h3 a:hover,
	.header-v2 .vertical-menu-wrapper .vertical-menu-heading:before,
	.background-style .box-header a:hover,
	.ts-product-video-button:hover,
	.ts-product-360-button:hover,
	.single-portfolio .single-navigation > a:hover,
	.single-portfolio .single-navigation > div a:hover,
	.before-loop-wrapper .top-filter-widget-area-button a:hover,
	.before-loop-wrapper .top-filter-widget-area-button a.active,
	.member-role,
	blockquote p.author-role > span.author a:hover,
	body.wpb-js-composer .vc_toggle_default .vc_toggle_title:hover h4,
	.ts-feature-wrapper .see-more:hover,
	.widget-container .tagcloud a:hover,
	.comment-meta > span.author a:hover,
	.ol-style.icon-primary li:before,
	.ul-style.icon-primary > li:before,
	.office-address:before,
	.phone-numbers:before,
	.email-address:before,
	.fax-numbers:before,
	.office-address:after,
	.phone-numbers:after,
	.email-address:after,
	.fax-numbers:after,
	.ts-dropcap,
	h1 > a:hover,
	h2 > a:hover,
	h3 > a:hover,
	h4 > a:hover,
	h5 > a:hover,
	h6 > a:hover,
	ul.product_list_widget li .product-categories a:hover,
	.brands-link a:hover,
	.cats-link a:hover,
	.tags-link a:hover,
	div.product .summary .email a:hover,
	.woocommerce-product-rating .woocommerce-review-link:hover,
	.woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover,
	p.lost_password a:hover,
	body.wpb-js-composer .vc_toggle_default.vc_toggle_active .vc_toggle_title h4,
	body.wpb-js-composer .vc_tta.vc_tta-accordion .vc_tta-panel-title > a:focus,
	body.wpb-js-composer .vc_tta.vc_tta-accordion .vc_tta-panel-title > a:hover,
	body.wpb-js-composer .vc_tta.vc_tta-accordion .vc_active .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_tta-tabs:not(.vc_tta-style-2) .vc_tta-tab.vc_active > a,
	body.wpb-js-composer .vc_tta-tabs:not(.vc_tta-style-2) .vc_tta-tab > a:hover,
	body.wpb-js-composer .vc_tta-tabs:not(.vc_tta-style-1) .vc_tta-tab.vc_active > a:after,
	body.wpb-js-composer .vc_tta-tabs:not([class*=vc_tta-gap]):not(.vc_tta-o-no-fill):not(.vc_tta-style-1).vc_tta-tabs-position-top .vc_tta-tab.vc_active > a:after,
	/* Portfolio */
	.ts-portfolio-wrapper .filter-bar li:hover,
	.ts-portfolio-wrapper .filter-bar li.current,
	.portfolio-inner .item h3 a:hover,
	.portfolio-inner .item .cats-portfolio a:hover,
	.widget-container ul.product_list_widget li .ts-wg-meta > a:hover,
	.woocommerce .widget-container ul.product_list_widget li .ts-wg-meta > a:hover,
	.ts-social-icons li.custom .ts-tooltip:before,
	body .style-3 .mailchimp-subscription.text-light button.button:hover,
	/* Product Detail */
	.order-number a,
	label a:hover,
	.column-tabs .tabs li:hover,
	.column-tabs .tabs li.current,
	.widget-container ul > li a:hover,
	.dokan-widget-area .widget ul li > a:hover,
	.dokan-orders-content .dokan-orders-area ul.order-statuses-filter li.active a,
	.dokan-orders-content .dokan-orders-area ul.order-statuses-filter li:hover a,
	.dokan-dashboard .dokan-dashboard-content li.active > a,
	span.author a,
	.widget_nav_menu > div > ul > li > a:hover,
	.widget-container ul ul li > a:hover,
	.list-posts .heading-title a:hover,
	p.lost_password a:hover,
	.product .product-brands a:hover,
	.products .product.product-category a:hover h3,
	.woocommerce .products .product.product-category a:hover h3,
	.woocommerce .products .product .product-categories a:hover,
	.woocommerce .widget-container il li .product-categories a:hover,
	.widget-container ul li .product-categories a:hover,
	.widget.ts-products-widget .product-categories a:hover,
	.woocommerce .widget_layered_nav ul li:hover a,
	.woocommerce .widget_layered_nav ul li:hover span.count,
	.woocommerce .widget_layered_nav ul li.chosen a,
	.woocommerce .widget_layered_nav ul li.chosen span.count,
	.ts-product-attribute > div:hover a,
	.ts-product-categories-widget ul.product-categories span.icon-toggle,
	.widget_categories > ul li.cat-parent > span.icon-toggle,
	.widget_categories > ul li.current-cat > a,
	.widget_categories > ul li a:hover,
	.ts-testimonial-wrapper.text-light .testimonial-content h4.name a:hover,
	.ts-twitter-slider.text-light .twitter-content h4.name > a:hover,
	.woocommerce .ts-product-deals-wrapper .products .product .product-categories a:hover,
	.woocommerce .ts-product-deals-wrapper .products .center .product-name a:hover,
	.shipping-calculator-button:hover,
	.widget-container .post_list_widget > li a.post-title:hover,
	.single-portfolio .cat-links > a:hover,
	body .select2-container--default .select2-results__option[aria-selected=true],
	body .select2-container--default .select2-results__option--highlighted[aria-selected],
	.ts-product-categories-widget ul.product-categories > li.current > a,
	.vertical-text .feature-excerpt,
	.button.button-border.border-primary,
	/* Header */
	.ts-floating-sidebar .close:hover i,
	.header-v2 .vertical-menu-wrapper:hover .vertical-menu-heading,
	/* Menu phone */
	.mobile-menu-wrapper li:hover > a,
	.mobile-menu-wrapper li .ts-menu-drop-icon:hover,
	.mobile-menu-wrapper li.current-menu-item > a,
	.mobile-menu-wrapper li.current_page_item > a,
	.mobile-menu-wrapper li:hover:before,
	.mobile-menu-wrapper li.current-menu-item:before,
	.mobile-menu-wrapper li.current_page_item:before,
	/* Event */
	.tribe-events-event-cost span,
	#tribe-events-content .tribe-events-tooltip h4,
	#tribe_events_filters_wrapper .tribe_events_slider_val,
	.single-tribe_events a.tribe-events-gcal,
	.single-tribe_events a.tribe-events-ical,
	/* Product detail */
	#ts-search-result-container .view-all-wrapper a:hover,
	.ts-search-result-container ul li a:hover,
	/* Product name */
	.list-cats li a:hover,
	.widget-container .product_list_widget li a:hover,
	.woocommerce .widget-container .product_list_widget li a:hover,
	.widget.ts-products-widget .ts-wg-meta > a:hover,
	.woocommerce ul.product_list_widget .ts-wg-meta > a:hover,
	.ts-header .header-top h3.product-name > a:hover,
	h3.product-name > a:hover,
	h3.product-name:hover,
	.product-name a:hover,
	.group_table a:hover,
	/* Forum */
	.bbp-login-links a.bbp-author-name,
	#bbpress-forums .status-category > li > .bbp-forums-list > li a.bbp-author-name,
	li.bbp-forum-freshness a.bbp-author-name,
	li.bbp-topic-freshness a.bbp-author-name,
	.bbp-login-links a:hover,
	#bbpress-forums .status-category > .bbp-forum-info > a.bbp-forum-title:hover,
	.type-forum .bbp-forum-title:hover,
	.bbp-topic-started-in > a:hover,
	#bbpress-forums .status-category > li > .bbp-forums-list > li a:hover,
	li.bbp-forum-freshness a:hover,
	li.bbp-topic-freshness a:hover,
	.type-topic .bbp-topic-title > a:hover,
	#bbpress-forums div.bbp-topic-author a.bbp-author-name:hover,
	#bbpress-forums div.bbp-reply-author a.bbp-author-name:hover,
	.bbp-meta .bbp-topic-permalink:hover,
	.bbp-topic-title-meta a:hover,
	#favorite-toggle a:hover,
	#subscription-toggle a:hover,
	.dashboard-widget.products ul li a:hover,
	.horizontal-box-border .feature-content > a:hover,
	.ts-team-members.style-4 h3 > a:hover,
	.banner-row ul.categories li a:hover,
	.title-primary-color h3 a,
	.ts-product-category-wrapper.style-3 .products .product.product-category div.button a,
	.vc_col-sm-12 .vertical-button-icon .subscribe-email .button,
	.vertical-button-icon .subscribe-email .button:hover,
	.vertical-border-button-icon .subscribe-email .button:hover,
	.vertical-border-round-button-icon .subscribe-email .button:hover,
	.style-1.tab-heading-style-2 .column-tabs .tabs li:hover,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .tabs li:hover,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .tabs li.current,
	.ts-list-of-product-categories-wrapper.style-2 ul li:hover a,
	.ts-list-of-product-categories-wrapper.style-2 ul li.view-all:hover a{
		color:<?php echo esc_html($ts_primary_color); ?>;
	}
	header .header-template .my-account-wrapper .forgot-pass a:hover,
	body .pp_nav .pp_play:hover:before,
	body .pp_nav .pp_pause:hover:before,
	body .pp_arrow_previous:hover:before,
	body .pp_arrow_next:hover:before,
	/* Quick view hover */
	body #cboxClose:hover,
	#ts-search-popup .search-button input:hover,
	#ts-search-popup .ts-button-close:hover,
	.ts-popup-modal span.close:hover,
	#ts-quickshop-modal span.close:hover,
	body .pp_nav .pp_play:hover,
	body .pp_nav .pp_pause:hover,
	body a.pp_close:hover,
	body a.pp_expand:hover,
	body a.pp_contract:hover{
		color:<?php echo esc_html($ts_primary_color); ?> !important;
	}

	table thead th,
	.woocommerce table.wishlist_table thead th,
	.woocommerce form.checkout_coupon,
	.horizontal-icon-square .feature-icon:before,
	.vertical-icon-square .feature-icon:hover,
	/* Forum */
	#bbpress-forums ul.bbp-lead-topic .bbp-header,
	#bbpress-forums ul.bbp-topics .bbp-header,
	#bbpress-forums ul.bbp-forums .bbp-header,
	#bbpress-forums ul.bbp-replies > .bbp-header,
	#bbpress-forums ul.bbp-search-results .bbp-header,
	/* Pagination */
	.woocommerce nav.woocommerce-pagination ul li a.next:hover,
	.woocommerce nav.woocommerce-pagination ul li a.prev:hover,
	.ts-pagination ul li a.prev:hover,
	.ts-pagination ul li a.next:hover,

	.woocommerce nav.woocommerce-pagination ul li a.next:focus,
	.woocommerce nav.woocommerce-pagination ul li a.prev:focus,
	.ts-pagination ul li a.prev:focus,
	.ts-pagination ul li a.next:focus,

	.dokan-pagination-container .dokan-pagination li:hover a,
	.dokan-pagination-container .dokan-pagination li.active a,
	.ts-pagination ul li a:hover,
	.ts-pagination ul li a:focus,
	.ts-pagination ul li span.current,
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.current,
	.woocommerce nav.woocommerce-pagination ul li a:focus,

	.woocommerce nav.woocommerce-pagination ul li a.next:focus
	.woocommerce nav.woocommerce-pagination ul li a.prev:focus,

	.woocommerce nav.woocommerce-pagination ul li a.next:hover,
	.woocommerce nav.woocommerce-pagination ul li a.prev:hover,

	.bbp-pagination-links a:hover,
	.bbp-pagination-links span.current,

	body.wpb-js-composer .vc_toggle_default.vc_toggle_active:before,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab a:before,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-right .vc_tta-tab a:before,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-1 .vc_tta-panel-title > a:before,
	body.wpb-js-composer .vc_tta-tabs.vc_tta-style-3 .vc_tta-tab.vc_active > a:before,
	body.wpb-js-composer .vc_tta-tabs:not([class*=vc_tta-gap]):not(.vc_tta-o-no-fill).vc_tta-style-3.vc_tta-tabs-position-top .vc_tta-tab.vc_active > a:before,
	.wpb-js-composer .vc_tta.vc_tta-style-4 .vc_tta-panel:before,

	.woocommerce .checkout-login-coupon-wrapper .checkout_coupon,
	.woocommerce .cart-collaterals .cart_totals,
	.woocommerce .checkout #order_review,
	.woocommerce .checkout #order_review table thead th,
	.woocommerce #payment,
	blockquote:after,
	blockquote:before,
	.widget-container:before,
	.menu-wrapper > .ic-close-menu-button:hover,
	.woocommerce div.product div.thumbnails li:hover a img,
	.ts-footer-block .widget-container ul li.custom:hover > a,
	footer#colophon .ts-social-icons li.custom:hover a,
	.ts-social-icons li.custom:hover a,
	.ts-social-icons li.custom:hover a:before,
	.ts-image-box .box-wrapper > .button:hover:before,
	.mobile-menu-wrapper nav > ul > li > ul,
	.style-2 .testimonial-content .content:after,
	.background-style .thumbnail:after,
	.vertical-icon-circle2 .feature-icon,
	.horizontal-box-border .feature-content > a:after,
	.ts-products-widget.title-border-primary > .widgettitle:after,
	.woocommerce .title-border-bottom ul.product_list_widget li > a.ts-wg-thumbnail:before,
	.title-border-bottom .woocommerce ul.product_list_widget li > a.ts-wg-thumbnail:before,
	.ts-product-in-product-type-tab-wrapper.style-1 .column-tabs .heading-tab:after,
	.ts-heading.style-border-primary > *:after,
	.ts-shortcode.title-border-primary .shortcode-heading-wrapper h3:after,
	.ts-team-members.style-4 h3:after,
	.woocommerce .ts-product-deals-2-wrapper ul.product_list_widget li a.ts-wg-thumbnail:before,
	.ts-product-in-product-type-tab-wrapper.style-2 .column-tabs:before,
	body.woocommerce > h1,
	.ts-team-members.style-5 .team-content,
	.group-milestone-2 .ts-milestone:before,
	.button.button-border.border-primary,
	.button.button-border.border-primary:hover,
	.style-1.tab-heading-style-2 .column-tabs .tabs li:hover,
	.style-1.tab-heading-style-2 .column-tabs .tabs li.curent,
	.ts-heading.title-background-border:after,
	body .ts-product-in-product-type-tab-wrapper.style-3 .column-tabs:after,
	.title-background-border .shortcode-heading-wrapper:after,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs,
	.ts-heading.style-border-primary-2 > *,
	.ts-shortcode.title-border-primary-2 .shortcode-heading-wrapper,
	.ts-products-widget.title-border-primary-2 > h2.widgettitle,
	/* Event */
	.tribe-events-event-cost span{
		border-color:<?php echo esc_html($ts_primary_color); ?>;
	}
	.style-1 .testimonial-content,
	.woocommerce .checkout #order_review table .cart-subtotal th,
	.woocommerce .checkout #order_review table .cart-subtotal td{
		border-top-color:<?php echo esc_html($ts_primary_color); ?>;
	}
	.availability-bar .progress-bar span,
	.ts-list-of-product-categories-wrapper .heading-title,
	.horizontal-icon-circle .feature-icon:hover,
	.horizontal-icon-square .feature-icon:hover:after,
	.list-posts article.post_format-post-format-quote .entry-format .thumbnail,
	.ts-blogs-wrapper .blogs article .quote-wrapper,
	body.single-post.single-format-quote .entry-format,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle:before,
	.ts-team-members .image-thumbnail figure:before,
	.ts-testimonial-wrapper.style-4 .image,
	.portfolio-inner .item figure span.bg-hover,
	.ts-instagram-shortcode .ts-instagram-wrapper a:after,
	.ts-product-in-product-type-tab-wrapper.style-2 .column-tabs .tabs li.current,
	.style-2 .product-category:hover > a:before,
	.button.button-border.border-primary:hover,
	.ts-store-notice,
	.ts-team-members.style-4 .team-content:hover .team-info,
	.ts-team-members.style-5 .team-content:hover,
	/* Event */
	.single-tribe_events .tribe-events-schedule .tribe-events-cost,
	.tribe-events-list .tribe-events-loop .tribe-event-featured,
	#tribe-bar-form .tribe-bar-submit input[type=submit],
	#tribe-events .tribe-events-button,
	#tribe_events_filters_wrapper input[type=submit],
	.tribe-events-button,
	.tribe-events-button.tribe-inactive,
	.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-] > a,
	#tribe-events .tribe-events-button:hover,
	#tribe_events_filters_wrapper input[type=submit]:hover,
	.tribe-events-button:hover,
	.tribe-events-button.tribe-inactive:hover,
	#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
	#tribe-events-content .tribe-events-calendar .mobile-active:hover,
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active,
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-],
	#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-] a,
	.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-],
	.tribe-events-calendar .mobile-active div[id*=tribe-events-daynum-] a,
	.tribe-events-calendar td.mobile-active,
	#tribe-events-content .tribe-events-calendar td.tribe-events-present.mobile-active:hover,
	.tribe-events-calendar td.tribe-events-present.mobile-active,
	.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-],
	.tribe-events-calendar td.tribe-events-present.mobile-active div[id*=tribe-events-daynum-] a,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .heading-tab h3,
	/* Social */
	.ts-social-icons .style-vertical li.custom:hover a i:after,
	footer#colophon .ts-social-icons .style-vertical li.c:hover a i:after,
	.ts-social-icons li.custom:hover a,
	footer#colophon .ts-social-icons li.custom:hover a,
	.ts-social-icons li.custom  .ts-tooltip,
	footer#colophon .ts-social-icons li.custom .ts-tooltip,
	/* Header */
	.ts-tiny-cart-wrapper .ic-cart:after,
	.shopping-cart-wrapper.cart-primary a > .cart-number{
		background-color:<?php echo esc_html($ts_primary_color); ?>;
	}

	blockquote.style-4:before,
	.widget_calendar #today,
	body.page .item-background .owl-controls > .owl-nav > div:hover,
	body .hotspot-modal .modal-dialog .chevron:hover,
	.single-product-top-thumbnail-slider .owl-nav > div:hover,
	.images-slider-wrapper .owl-nav > div:hover,
	.images-thumbnails > .thumbnails .owl-nav > div:hover,
	.ts-dropcap.style-2,
	.vertical-office-address h6:before,
	.vertical-phone-numbers h6:before,
	.vertical-email-address h6:before,
	.vertical-fax-numbers h6:before,
	.vertical-icon-circle .feature-icon,
	.vertical-icon-square .feature-icon:hover,
	.ts-product-attribute > div.selected a,
	.vertical-icon-circle2 .feature-icon:hover,
	.style-1.tab-heading-style-2 .column-tabs .tabs li.current,
	.events .event,
	.vertical-border-round-button-icon-2 .subscribe-email .button,
	.vertical-border-round-button-icon-2.text-light .subscribe-email .button:hover,
	.ts-team-members.style-6 .member-social a.custom:hover,
	.ts-team-members.style-2 .member-social a.custom:hover,
	.ts-product-in-product-type-tab-wrapper.style-3 .column-tabs .tabs li:hover, 
	.ts-product-in-product-type-tab-wrapper.style-3 .column-tabs .tabs li.current{
		background-color:<?php echo esc_html($ts_primary_color); ?>;
		color:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.events .event a,
	.ic-mobile-menu-close-button:hover i,
	.ic-mobile-menu-close-button{
		color:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
	}
	.button-white:hover{
		background-color:<?php echo esc_html($ts_primary_color); ?> !important;
		color:<?php echo esc_html($ts_text_color_in_bg_primary); ?> !important;
	}
	.owl-dots > div.active > span:before,
	.owl-dots > div:hover > span:before,
	.owl-dots > div.active > span,
	.owl-dots > div:hover > span,
	body .theme-default .nivo-controlNav a.active,
	body .theme-default .nivo-controlNav a.active:before,
	body .theme-default .nivo-controlNav a.hover:before{
		background-color:<?php echo esc_html($ts_primary_color); ?>;
		border-color:<?php echo esc_html($ts_primary_color); ?>;
	}
	
	@media only screen and (min-width:1279px){
		.ts-blogs.item-background .entry-content .author a,
		.ts-blogs.item-background .entry-content a:hover{
			color:<?php echo esc_html($ts_primary_color); ?>;
		}
		body.nav-circle .nav-middle .owl-nav > div:hover,
		.single-portfolio .thumbnails .owl-nav > div:hover{
			color:<?php echo esc_html($ts_text_color_in_bg_primary); ?>;
		}
		body.nav-circle .nav-middle .owl-nav > div:hover,
		.single-portfolio .thumbnails .owl-nav > div:hover{
			background-color:<?php echo esc_html($ts_primary_color); ?>;
		}
	}
	@media only screen and (max-width:1279px){
		body:not(.product-style-2) .thumbnail-wrapper .product-group-button .loop-add-to-cart a span,
		.woocommerce .product .thumbnail-wrapper .button-in a,
		.button-in a,
		.meta-wrapper .button-in.wishlist a,
		.meta-wrapper .button-in.compare a,
		.woocommerce .product .thumbnail-wrapper .product-group-button > div a,
		.woocommerce .product .meta-wrapper a.added_to_cart,
		.woocommerce .product .meta-wrapper a.button,
		.woocommerce .product .meta-wrapper a.added_to_cart,
		.woocommerce .product .meta-wrapper a.button,
		.woocommerce .product .meta-wrapper .wishlist a,
		.woocommerce .product .meta-wrapper .wishlist a,
		.meta-wrapper div.wishlist a,
		.meta-wrapper div.compare a{
			background-color:<?php echo esc_html($ts_product_button_thumbnail_mobile_background_color); ?> !important;
			color:<?php echo esc_html($ts_product_button_thumbnail_mobile_text_color); ?> !important;
		}
		.woocommerce .loop-add-to-cart a.button.loading:after,
		.woocommerce .add_to_wishlist.loading:after,
		.thumbnail-wrapper .button-in.wishlist a.loading:before,
		.meta-wrapper .button-in.wishlist a.loading:before,
		.thumbnail-wrapper .button-in.compare a.loading:after,
		.meta-wrapper .button-in.compare a.loading:after{
			background-color:<?php echo esc_html($ts_product_button_thumbnail_mobile_background_color); ?> !important;
		}
	}
	@media only screen and (max-device-width:1279px){
		body:not(.product-style-2) .thumbnail-wrapper .product-group-button .loop-add-to-cart a span,
		.woocommerce .product .thumbnail-wrapper .button-in a,
		.button-in a,
		.meta-wrapper .button-in.wishlist a,
		.meta-wrapper .button-in.compare a,
		.woocommerce .product .thumbnail-wrapper .product-group-button > div a,
		.woocommerce .product .meta-wrapper a.added_to_cart,
		.woocommerce .product .meta-wrapper a.button,
		.woocommerce .product .meta-wrapper a.added_to_cart,
		.woocommerce .product .meta-wrapper a.button,
		.woocommerce .product .meta-wrapper .wishlist a,
		.woocommerce .product .meta-wrapper .wishlist a,
		.meta-wrapper div.wishlist a,
		.meta-wrapper div.compare a{
			background-color:<?php echo esc_html($ts_product_button_thumbnail_mobile_background_color); ?> !important;
			color:<?php echo esc_html($ts_product_button_thumbnail_mobile_text_color); ?> !important;
		}
		.woocommerce .loop-add-to-cart a.button.loading:after,
		.woocommerce .add_to_wishlist.loading:after,
		.thumbnail-wrapper .button-in.wishlist a.loading:before,
		.meta-wrapper .button-in.wishlist a.loading:before,
		.thumbnail-wrapper .button-in.compare a.loading:after,
		.meta-wrapper .button-in.compare a.loading:after{
			background-color:<?php echo esc_html($ts_product_button_thumbnail_mobile_background_color); ?> !important;
		}
	}
	
	/* BORDER COLOR */
	*,
	*:before,
	*:after,
	table.compare-list th,
	table.compare-list td,
	body table.dataTable.compare-list tbody th, 
	body table.dataTable.compare-list tbody td,
	.vertical-icon-square > a,
	.woocommerce .button.button-border,
	.button.button-border,
	.woocommerce .cart_totals .continue-shopping,
	.woocommerce table.shop_table,
	.woocommerce-page table.shop_table,
	.woocommerce ul.order_details li,
	.woocommerce div.product form.cart .group_table td,
	#add_payment_method table.cart td.actions .coupon .input-text,
	.woocommerce-cart table.cart td.actions .coupon .input-text,
	.woocommerce-checkout table.cart td.actions .coupon .input-text,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab a,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-right .vc_tta-tab a,
	body.wpb-js-composer .vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_toggle_default .vc_toggle_content,
	body.wpb-js-composer .vc_toggle_size_md.vc_toggle_default .vc_toggle_content,
	body.wpb-js-composer .vc_tta-accordion .vc_tta-panels-container .vc_tta-panel-body,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	.widget.ts-products-widget li > a.ts-wg-thumbnail,
	.woocommerce ul.product_list_widget li > a.ts-wg-thumbnail,
	.dokan-dashboard .dokan-dashboard-content .edit-account fieldset,
	body > table.compare-list,
	.woocommerce table.my_account_orders tbody tr:first-child td:first-child,
	body .woocommerce table.my_account_orders td.order-actions,
	body.wpb-js-composer .vc_separator.border-color .vc_sep_line,
	.woocommerce table.shop_attributes th,
	.woocommerce table.shop_attributes td,
	.woocommerce .widget_layered_nav ul,
	.woocommerce table.shop_table,
	.woocommerce table.shop_table td,
	body .wpb_flexslider.flexslider,
	.woocommerce table.wishlist_table tbody td,
	.widget_product_search,
	.widget_search,
	.widget_display_search,
	.widget-container.widget_calendar,
	.woocommerce p.stars a.star-1,
	.woocommerce p.stars a.star-2,
	.woocommerce p.stars a.star-3,
	.woocommerce p.stars a.star-4,
	.woocommerce p.stars a.star-5,
	.woocommerce #reviews #comments ol.commentlist li .comment-text,
	.woocommerce table.shop_attributes,
	.woocommerce #reviews #comments ol.commentlist li ,
	.dataTables_wrapper,
	.woocommerce div.product div.thumbnails li a img,
	.woocommerce div.product div.images-thumbnails img,
	.woocommerce ul.cart_list li img,
	.woocommerce ul.product_list_widget li img,
	/* Forum */
	#bbpress-forums li.bbp-body ul.forum,
	#bbpress-forums li.bbp-body ul.topic,
	#bbpress-forums ul.bbp-lead-topic,
	#bbpress-forums ul.bbp-topics,
	#bbpress-forums ul.bbp-forums,
	#bbpress-forums ul.bbp-replies,
	#bbpress-forums ul.bbp-search-results,
	#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content,
	#bbpress-forums div.bbp-forum-header,
	#bbpress-forums div.bbp-topic-header,
	#bbpress-forums div.bbp-reply-header,
	#bbpress-forums li.bbp-header,
	#bbpress-forums li.bbp-footer,
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation a{
		border-color:<?php echo esc_html($ts_border_color); ?>;
	}
	#bbpress-forums div.bbp-the-content-wrapper div.quicktags-toolbar,
	.ts-product-attribute > div:before{
		background-color:<?php echo esc_html($ts_border_color); ?>;
		border-color:<?php echo esc_html($ts_border_color); ?>;
	}
	.availability-bar .progress-bar{
		background-color:<?php echo esc_html($ts_border_color); ?>;
	}
	/* Pagination */
	.ts-pagination ul li a,
	.dokan-pagination-container .dokan-pagination li a,
	.woocommerce nav.woocommerce-pagination ul li a,
	.woocommerce nav.woocommerce-pagination ul li span,
	.bbp-pagination-links a{
		background-color:transparent !important;
		color:<?php echo esc_html($ts_text_color); ?>;/* color text default */
		border-color:<?php echo esc_html($ts_border_color); ?>;/* border default */
	}
	
	/* BUTTON */
	#to-top a:hover,
	a.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce #respond input#submit:hover, 
	.woocommerce form.register .button,
	.woocommerce .button.button-primary,
	.button.button-primary,
	.woocommerce .button.button-primary,
	.woocommerce input[type="submit"].button-primary,
	.woocommerce a.button-primary,
	input[type="submit"].button-primary,
	a.button-primary,
	body .yith-woocompare-widget a.compare:hover,
	div.product .summary .yith-wcwl-add-to-wishlist a:hover,
	.woocommerce div.product .summary a.compare:hover,
	.shopping-cart p.buttons a:hover,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active > a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li > a:hover,
	body.wpb-js-composer .vc_tta-tabs.vc_tta-style-2 .vc_tta-tab:hover > a,
	body.wpb-js-composer .vc_tta-tabs.vc_tta-style-2 .vc_tta-tab.vc_active > a,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-2 .vc_tta-panel.vc_active .vc_tta-controls-icon,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-3 .vc_tta-panel.vc_active .vc_tta-controls-icon,
	body .mfp-close-btn-in .mfp-close:hover,
	#ts-search-sidebar .ts-search-result-container .view-all-wrapper a,
	.woocommerce .single-style-layout-list .meta-wrapper .loop-add-to-cart a.button:hover,
	.woocommerce .style-horizontal .subscribe-email .button:hover,
	.style-horizontal .subscribe-email .button:hover,
	body #yith-woocompare table.compare-list .add-to-cart td a:hover,
	.woocommerce .wishlist_table .product-add-to-cart a:hover{
		background-color:<?php echo esc_html($ts_button_background_hover); ?>;
		color:<?php echo esc_html($ts_button_text_color_hover); ?>;
	}
	body.wpb-js-composer .vc_tta-tabs.vc_tta-style-2 .vc_tta-tab.vc_active > a:after,
	body.wpb-js-composer .vc_tta-tabs:not([class*=vc_tta-gap]):not(.vc_tta-o-no-fill).vc_tta-style-2.vc_tta-tabs-position-top .vc_tta-tab.vc_active > a:after,
	.woocommerce div.product .woocommerce-tabs ul.tabs li > a:after{
		color:<?php echo esc_html($ts_button_background_hover); ?>;
	}
	#to-top a,
	a.button,
	button,
	input[type="submit"],
	.shopping-cart p.buttons a,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit, 
	.mc4wp-form-fields input[type="submit"],
	.woocommerce form.register .button:hover,
	.woocommerce-account .woocommerce-MyAccount-navigation li:hover a,
	.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
	body footer .style-1 .mailchimp-subscription button.button:hover,
	.woocommerce footer .style-1 .mailchimp-subscription button.button:hover,

	.woocommerce a.button.alt.disabled,
	.woocommerce a.button.alt.disabled:hover,
	.woocommerce a.button.alt:disabled,
	.woocommerce a.button.alt:disabled:hover,
	.woocommerce a.button.alt:disabled[disabled],
	.woocommerce a.button.alt:disabled[disabled]:hover,
	.woocommerce button.button.alt.disabled,
	.woocommerce button.button.alt.disabled:hover,
	.woocommerce button.button.alt:disabled,
	.woocommerce button.button.alt:disabled:hover,
	.woocommerce button.button.alt:disabled[disabled],
	.woocommerce button.button.alt:disabled[disabled]:hover,
	.woocommerce input.button.alt.disabled,
	.woocommerce input.button.alt.disabled:hover,
	.woocommerce input.button.alt:disabled,
	.woocommerce input.button.alt:disabled:hover,
	.woocommerce input.button.alt:disabled[disabled],
	.woocommerce input.button.alt:disabled[disabled]:hover,

	body .yith-woocompare-widget a.compare,
	.woocommerce .cart_totals .continue-shopping:hover,
	.woocommerce .button.button-border:hover,
	.button.button-border:hover,
	.woocommerce .button.button-primary:hover,
	.button.button-primary:hover,
	.woocommerce input[type="submit"].button-primary:hover,
	.woocommerce a.button-primary:hover,
	input[type="submit"].button-primary:hover,
	a.button-primary:hover,
	.woocommerce .widget_price_filter .price_slider_amount .button:hover,
	.woocommerce div.product form.cart table .button:hover,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-2 .vc_tta-panel .vc_tta-controls-icon,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-2 .vc_tta-panel.vc_active .vc_tta-panel-title > a,
	body.wpb-js-composer .vc_tta-accordion.vc_tta-style-3 .vc_tta-panel .vc_tta-controls-icon,
	#ts-search-sidebar .ts-search-result-container .view-all-wrapper a:hover,
	.woocommerce .single-style-layout-list .meta-wrapper .loop-add-to-cart a.button,
	.woocommerce .style-horizontal .subscribe-email .button,
	.style-horizontal .subscribe-email .button,
	/* Forum */
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation a:hover,
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a,
	body #yith-woocompare table.compare-list .add-to-cart td a,
	.woocommerce .wishlist_table .product-add-to-cart a{
		background-color:<?php echo esc_html($ts_button_background_color); ?>;
		color:<?php echo esc_html($ts_button_text_color); ?>;
	}
	.woocommerce .cart_totals .continue-shopping:hover,
	.woocommerce .button.button-border:hover,
	.button.button-border:hover{
		border-color:<?php echo esc_html($ts_button_background_color); ?>;
	}
	div.product .summary .yith-wcwl-add-to-wishlist a:hover,
	.woocommerce .summary div.yith-wcwl-add-to-wishlist a:hover,
	.woocommerce div.product .summary a.compare:hover{
		background-color:<?php echo esc_html($ts_button_background_hover); ?>;
		color:<?php echo esc_html($ts_button_text_color_hover); ?>;
		border-color:<?php echo esc_html($ts_button_background_hover); ?>;
	}
	.woocommerce table.shop_table .product-remove a:hover,
	.cart_list li .cart-item-wrapper a.remove:hover,
	body #yith-woocompare table.compare-list tr.remove td > a .remove:hover:before,
	.woocommerce .widget_shopping_cart .cart_list li a.remove:hover,
	.woocommerce.widget_shopping_cart .cart_list li a.remove:hover,
	.order-total .amount,
	#order_review .cart-subtotal .amount{
		color:<?php echo esc_html($ts_special_button_background_color); ?> !important;
	}
	.woocommerce .cart_totals a.checkout-button.button,
	.woocommerce a.button-special.button,
	a.button-special.button,
	.woocommerce #payment #place_order{
		background-color:<?php echo esc_html($ts_special_button_background_color); ?>;
		color:<?php echo esc_html($ts_special_button_text_color); ?>;
		border-color:<?php echo esc_html($ts_special_button_background_color); ?>;
	}
	div.product .woocommerce-variation-price .amount,
	.woocommerce div.product form.cart .reset_variations,
	.woocommerce div.product .woocommerce-variation-price .amount,
	.woocommerce .products .product .price.variation-price .amount{
		color:<?php echo esc_html($ts_special_button_background_color); ?>;
	}
	.woocommerce .cart_totals a.checkout-button.button:hover,
	.woocommerce a.button-special.button:hover,
	a.button-special.button:hover,
	.woocommerce #payment #place_order:hover{
		background-color:transparent;
		color:<?php echo esc_html($ts_special_button_background_color); ?>;
		border-color:<?php echo esc_html($ts_special_button_background_color); ?>;
	}
	.ts-tiny-cart-wrapper .total > span.amount,
	.widget_shopping_cart .total .amount{
		color:<?php echo esc_html($ts_special_button_background_color); ?>;
	}
	
	
	/* BREADCRUMB */
	
	.breadcrumb-title-wrapper{
		background-color:<?php echo esc_html($ts_breadcrumb_background_color); ?>;
	}
	.breadcrumb-title-wrapper .breadcrumb-title *{
		color:<?php echo esc_html($ts_breadcrumb_text_color); ?>;
	}
	.breadcrumb-title-wrapper .breadcrumb-title a:hover{
		color:<?php echo esc_html($ts_breadcrumb_link_color_hover); ?>;
	}
	.breadcrumb-title-wrapper .breadcrumb-title h1{
		color:<?php echo esc_html($ts_breadcrumb_heading_color); ?>;
	}
	
	/* HEADER COLOR */
	/* Notice */
	.ts-store-notice *{
		color:<?php echo esc_html($ts_header_notice_text_color); ?>;
	}
	/* Header top */
	.header-top{
		border-color:<?php echo esc_html($ts_top_header_border_color); ?>;
		background-color:<?php echo esc_html($ts_top_header_background_color); ?>;
	}
	.group-meta-header > div:before,
	.header-left > div:before,
	.header-top:before{
		border-color:<?php echo esc_html($ts_top_header_border_color); ?>;
	}
	.header-top .header-right a:not(.button),
	.ts-header-social-icons li a,
	.header-top{
		color:<?php echo esc_html($ts_top_header_text_color); ?>;
	}
	/* Text Hover Header Top */
	.info-desc a,
	.header-top .ts-group-meta-icon-toggle:hover,
	.ts-header-social-icons li a:hover,
	.header-top .wpml-ls ul ul li:hover a:not(.button),
	.header-currency .wcml_currency_switcher ul li:hover a:not(.button),
	.header-top .my-account-wrapper .account-control > a:hover,
	.header-top .my-wishlist-wrapper > a:hover,
	.header-top .wpml-ls a:hover,
	.header-top .wpml-ls a:focus,
	.header-top .wpml-ls ul ul li a:hover,
	.header-top .wpml-ls ul ul li a:focus,
	.header-top .header-currency > div > a:hover,
	.header-transparent.header-text-light.header-v7 .ts-header-social-icons li a:hover,
	.header-transparent.header-text-light.header-v7 .header-top .header-right a:not(.button):hover{
		color:<?php echo esc_html($ts_top_header_text_color_hover); ?>;
	}
	/* Header middle */
	.header-middle,
	header .header-v9 .header-bottom,
	.header-v7 .header-middle > .container,
	header.ts-header .header-container .header-v7 .logo-wrapper.logo-ipad{
		background-color:<?php echo esc_html($ts_middle_header_background_color); ?>;
	}
	header .header-v1 .search-button .icon:before,
	header .header-v2 .search-button .icon:before,
	header .header-v2 .vertical-menu-wrapper .vertical-menu-heading{
		color:<?php echo esc_html($ts_middle_header_text_color); ?>;
	}
	.ts-header .header-container .logo-background{
		background-color:<?php echo esc_html($ts_header_logo_background); ?>;
	}
	/* Header bottom */
	header .header-bottom,
	header .header-v2 .header-bottom .menu-wrapper{
		background-color:<?php echo esc_html($ts_bottom_header_background_color); ?>;
	}
	header .header-v4 .header-bottom:before,
	header .header-v4 .header-bottom:after{
		border-color:<?php echo esc_html($ts_bottom_header_border_color); ?>;
	}

	/* Header Search */
	header .ts-search-by-category .select2-selection .select2-selection__rendered:before,
	header .ts-search-by-category .search-content input[type="text"]{
		border-color:<?php echo esc_html($ts_search_border_color); ?>;
	}
	header .ts-search-by-category form > .select2,
	.ts-header .ts-search-by-category select{
		background:<?php echo esc_html($ts_search_categories_background_color); ?> !important;
		border-color:<?php echo esc_html($ts_search_border_color); ?>;
	}
	header .ts-search-by-category input[type="submit"]{
		background-color:<?php echo esc_html($ts_primary_color); ?> !important;
	}
	body .category-dropdown .select2-dropdown{
		background-color:<?php echo esc_html($ts_search_categories_background_color); ?>;
	}
	body .category-dropdown .select2-dropdown,
	body .category-dropdown .select2-search--dropdown .select2-search__field,
	body .category-dropdown .select2-container--open .select2-dropdown--below{
		border-color:<?php echo esc_html($ts_search_border_color); ?>;
	}
	.category-dropdown li,
	header .select2-container--default .select2-selection--single .select2-selection__rendered,
	.ts-header .ts-search-by-category select{
		color:<?php echo esc_html($ts_search_categories_text_color); ?>;
	}
	header .select2-container--default .select2-selection--single .select2-selection__arrow b{
		border-top-color:<?php echo esc_html($ts_search_categories_text_color); ?>;
	}
	header .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
		border-bottom-color:<?php echo esc_html($ts_search_categories_text_color); ?>;
	}
	.ts-sidebar-content .search-content input[type="text"]{
		color:<?php echo esc_html($ts_search_input_text_color); ?>;
		background-color:<?php echo esc_html($ts_search_input_text_background_color); ?>;
	}
	body .category-dropdown .select2-results__option[aria-selected=true],
	body .category-dropdown .select2-results__option--highlighted[aria-selected]{
		color:<?php echo esc_html($ts_search_categories_text_color); ?>;
	}
	
	/* SHOPPING CART */
	.shopping-cart-wrapper a > .ic-cart{
		border-color:<?php echo esc_html($ts_header_cart_border_color); ?>;
		background:transparent;
		color:<?php echo esc_html($ts_header_cart_text_color); ?>;
	}
	.header-v8 .header-bottom .container > .shopping-cart-wrapper:before,
	.header-v10 .header-bottom .container > .shopping-cart-wrapper:before{
		border-color:<?php echo esc_html($ts_header_cart_text_color); ?>;
	}
	.shopping-cart-wrapper:hover a > .ic-cart{
		border-color:<?php echo esc_html($ts_header_cart_text_color); ?>;
		background:<?php echo esc_html($ts_header_cart_text_color); ?>;
		color:<?php echo esc_html($ts_header_cart_text_color_hover); ?>;
	}
	.shopping-cart-wrapper a > .cart-number{
		background:<?php echo esc_html($ts_header_cart_amount_background_color); ?>;
		color:<?php echo esc_html($ts_header_cart_amount_color); ?>;
	}
	
	/* MENU PC */
	
	/* Color Vertical Menu */
	.vertical-menu-wrapper .vertical-menu-heading{
		color:<?php echo esc_html($ts_vertical_menu_title_text); ?>;
		background:<?php echo esc_html($ts_vertical_menu_title_background_color); ?>;
	}
	.vertical-menu-wrapper:hover .vertical-menu-heading{
		color:<?php echo esc_html($ts_vertical_menu_title_text_hover); ?>;
		background:<?php echo esc_html($ts_vertical_menu_title_background_hover); ?>;
	}
	.ts-menu > nav.main-menu > ul.menu > li > .ts-menu-drop-icon,
	.menu-wrapper nav > ul.menu > li > a,
	.menu-wrapper nav > ul > li > a,
	.menu-wrapper nav > ul.menu li.fa:before,
	header .search-button .icon:before{
		color:<?php echo esc_html($ts_menu_text_color); ?>;
	}
	.ts-menu > nav.main-menu > ul.menu > li.current-menu-item > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu > li.current_page_parent > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu > li.current-menu-parent > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu > li.current_page_item > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu > li.current-menu-ancestor > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu > li.current-page-ancestor > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu li.current-product_cat-ancestor > .ts-menu-drop-icon,
	.ic-close-menu-button:hover,
	.menu-wrapper nav > ul.menu > li:hover > a,
	.menu-wrapper nav > ul.menu li.fa:hover:before,
	.menu-wrapper nav > ul.menu > li.fa.current-menu-item:before,
	.menu-wrapper nav > ul.menu > li.fa.current_page_parent:before,
	.menu-wrapper nav > ul.menu > li.fa.current-menu-parent:before,
	.menu-wrapper nav > ul.menu > li.fa.current_page_item:before,
	.menu-wrapper nav > ul.menu > li.fa.current-menu-ancestor:before,
	.menu-wrapper nav > ul.menu > li.fa.current-page-ancestor:before,
	.menu-wrapper nav > ul.menu > li.current-menu-item > a,
	.menu-wrapper nav > ul.menu > li.current_page_parent > a,
	.menu-wrapper nav > ul.menu > li.current-menu-parent > a,
	.menu-wrapper nav > ul.menu > li.current_page_item > a,
	.menu-wrapper nav > ul.menu > li.current-menu-ancestor > a,
	.menu-wrapper nav > ul.menu > li.current-page-ancestor > a,
	.menu-wrapper nav > ul.menu li.current-product_cat-ancestor > a,
	.ts-menu-drop-icon.active:before,
	.ts-menu-drop-icon:hover:before,
	header .search-button .icon:hover:before,

	.header-transparent.header-text-light.header-v5 > .header-middle .ts-menu > nav.main-menu > ul.menu > li:hover > .ts-menu-drop-icon,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li:hover > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu li.fa:hover:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .search-button .icon:hover:before,

	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .header-middle .ts-menu > nav.main-menu > ul.menu > li:hover > .ts-menu-drop-icon,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .header-middle .menu-wrapper nav > ul.menu > li:hover > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .header-middle .menu-wrapper nav > ul.menu li.fa:hover:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .header-middle  .search-button .icon:hover:before,

	.header-transparent.header-text-light.header-v5 > .header-middle .shopping-cart-wrapper:hover a > .ic-cart,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .header-middle .shopping-cart-wrapper:hover a > .ic-cart,

	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current-menu-parent:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current_page_item:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current-menu-item:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current_page_parent:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current-menu-ancestor:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.fa.current-page-ancestor:before,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current-menu-parent > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current_page_item > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current-menu-item > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current_page_parent > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current-menu-ancestor > a,
	.header-transparent.header-text-light.header-v5 > .header-middle .menu-wrapper nav > ul.menu > li.current-page-ancestor > a,

	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current-menu-parent:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current_page_item:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current-menu-item:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current_page_parent:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current-menu-ancestor:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.fa.current-page-ancestor:before,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current-menu-parent > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current_page_item > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current-menu-item > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current_page_parent > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current-menu-ancestor > a,
	.header-transparent.header-text-light.header-v5 > div:not(.is-sticky) .menu-wrapper nav > ul.menu > li.current-page-ancestor > a{
		color:<?php echo esc_html($ts_menu_text_color_hover); ?>;
	}
	.header-v6 .menu-wrapper nav > ul.menu > li > a:before{
		border-color:<?php echo esc_html($ts_menu_text_color_hover); ?>;
	}
	header .header-v10 .header-bottom:after{
		border-color:<?php echo esc_html($ts_menu_background_color_hover); ?>;
	}
	.header-v10 .menu-wrapper nav > ul.menu > li:hover > a,
	.header-v10 .menu-wrapper nav > ul.menu li.fa:hover:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current-menu-item:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current_page_parent:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current-menu-parent:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current_page_item:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current-menu-ancestor:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.fa.current-page-ancestor:before,
	.header-v10 .menu-wrapper nav > ul.menu > li.current-menu-item > a,
	.header-v10 .menu-wrapper nav > ul.menu > li.current_page_parent > a,
	.header-v10 .menu-wrapper nav > ul.menu > li.current-menu-parent > a,
	.header-v10 .menu-wrapper nav > ul.menu > li.current_page_item > a,
	.header-v10 .menu-wrapper nav > ul.menu > li.current-menu-ancestor > a,
	.header-v10 .menu-wrapper nav > ul.menu > li.current-page-ancestor > a,
	.header-v10 .menu-wrapper nav > ul.menu li.current-product_cat-ancestor > a,
	.header-v10 .ts-menu-drop-icon.active:before,
	.header-v10 .ts-menu-drop-icon:hover:before{
		background-color:<?php echo esc_html($ts_menu_background_color_hover); ?>;
	}
	/* Vertical sub menu */
	.menu-wrapper .vertical-menu > ul.menu > li > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li > a,
	header .ts-menu .vertical-menu-wrapper > ul.menu > ul > li > a{
		color:<?php echo esc_html($ts_vertical_menu_text_color); ?>;
		background-color:<?php echo esc_html($ts_vertical_menu_background_color); ?>;
	}
	.menu-wrapper .vertical-menu > ul.menu > li:hover > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-product_cat-ancestor > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current_page_item > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-item > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current_page_parent > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-parent > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-ancestor > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-page-ancestor > .ts-menu-drop-icon,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li:hover > a,
	header .ts-menu .vertical-menu-wrapper > ul.menu > ul > li:hover > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current_page_item > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-item > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current_page_parent > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-parent > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-menu-ancestor > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-page-ancestor > a,
	.menu-wrapper .vertical-menu-wrapper nav > ul.menu > li.current-product_cat-ancestor > a{
		color:<?php echo esc_html($ts_vertical_menu_text_color_hover); ?>;
		background-color:<?php echo esc_html($ts_vertical_menu_background_hover); ?>;
	}
	
	/* MENU PC SUB */
	.menu-wrapper .vertical-menu > ul.menu > li,
	.menu-wrapper nav > ul.menu li ul.sub-menu:before,
	.menu-wrapper .ts-menu > nav > ul.menu > li > a:after,
	.menu-wrapper .vertical-menu > ul.menu > li li ul.sub-menu:before,
	.vertical-menu-wrapper .vertical-menu,
	.header-v2 .vertical-menu-wrapper .vertical-menu:before{
		background-color:<?php echo esc_html($ts_sub_menu_background_color); ?>;
	}

	/* MENU SUB HEADING */
	.menu-wrapper nav > ul.menu ul.sub-menu h1,
	.menu-wrapper nav > ul.menu ul.sub-menu h2,
	.menu-wrapper nav > ul.menu ul.sub-menu h3,
	.menu-wrapper nav > ul.menu ul.sub-menu h4,
	.menu-wrapper nav > ul.menu ul.sub-menu h5,
	.menu-wrapper nav > ul.menu ul.sub-menu h6,
	.menu-wrapper nav > ul.menu ul.sub-menu .h1,
	.menu-wrapper nav > ul.menu ul.sub-menu .h2,
	.menu-wrapper nav > ul.menu ul.sub-menu .h3,
	.menu-wrapper nav > ul.menu ul.sub-menu .h4,
	.menu-wrapper nav > ul.menu ul.sub-menu .h5,
	.menu-wrapper nav > ul.menu ul.sub-menu .h6,
	h1.wpb_heading,
	h2.wpb_heading,
	h3.wpb_heading,
	h4.wpb_heading,
	h5.wpb_heading,
	h6.wpb_heading{
		color:<?php echo esc_html($ts_sub_menu_heading_color); ?>;
	}

	/* Menu sub text */
	.menu-wrapper nav > ul.menu ul.sub-menu > li > a,
	.menu-wrapper nav div.list-link li > a,
	.menu-wrapper nav > ul.menu li.widget_nav_menu li > a{
		color:<?php echo esc_html($ts_sub_menu_text_color); ?>;
	}
	.menu-wrapper nav > ul.menu li ul.sub-menu > li:after,
	.menu-wrapper nav li.widget_nav_menu li:after,
	.menu-wrapper nav div.list-link li:after,
	.menu-wrapper nav > ul.menu li.ts-normal-menu ul.sub-menu li:after{
		border-color:<?php echo esc_html($ts_sub_menu_heading_color); ?>;
	}
	/* Menu sub a hover */
	.ts-menu > nav.main-menu > ul.menu ul li:hover > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current_page_item > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current-menu-item > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current_page_parent > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current-menu-parent > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current-menu-ancestor > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current-page-ancestor > .ts-menu-drop-icon,
	.ts-menu > nav.main-menu > ul.menu ul li.current-product_cat-ancestor > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu ul li:hover > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current_page_item > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current-menu-item > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current_page_parent > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current-menu-parent > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current-menu-ancestor > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu li.current-page-ancestor > .ts-menu-drop-icon,
	.vertical-menu-wrapper > .vertical-menu > ul.menu ul li.current-product_cat-ancestor > .ts-menu-drop-icon,
	.menu-wrapper nav > ul.menu ul.sub-menu > li > a:hover,
	.menu-wrapper nav div.list-link li > a:hover,
	.menu-wrapper nav > ul.menu li.widget_nav_menu li > a:hover,
	.menu-wrapper nav > ul.menu li.widget_nav_menu li.current-menu-item > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current-menu-item > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current_page_parent > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current-menu-parent > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current_page_item > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current-menu-ancestor > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current-page-ancestor > a,
	.menu-wrapper nav > ul.menu ul.sub-menu li.current-product_cat-ancestor > a{
		color:<?php echo esc_html($ts_sub_menu_text_color_hover); ?>;
	}
	.mobile-menu-wrapper{
		background:<?php echo esc_html($ts_menu_mobile_background_color); ?>;
	}
	.mobile-menu-wrapper li > a,
	.mobile-menu-wrapper li:before,
	.mobile-menu-wrapper li > .ts-menu-drop-icon{
		color:<?php echo esc_html($ts_menu_mobile_text_color); ?>;
	}
	
	/* FOOTER */
	.ts-social-icons li a,
	footer#colophon .ts-social-icons a,
	footer#colophon .ts-social-icons a:before{
		border-color:<?php echo esc_html($ts_footer_social_icon_border_color); ?>;
		color:<?php echo esc_html($ts_footer_social_icon_color); ?>;
	}
	.ts-social-icons .style-opacity-circle li a:before{
		background-color:<?php echo esc_html($ts_footer_social_icon_border_color); ?>;
	}
	footer .footer-container{
		background-color:<?php echo esc_html($ts_footer_background_color); ?>;
	}
	footer *{
		border-color:<?php echo esc_html($ts_footer_border_color); ?>;
	}
	.first-footer-area,
	.first-footer-area a,
	.first-footer-area dt,
	footer .mc4wp-form-fields label,
	footer .text-light .mailchimp-subscription .newsletter{
		color:<?php echo esc_html($ts_footer_text_color); ?>;
	}
	.box-office-address,
	.box-phone-numbers,
	.box-email-address,
	.box-fax-numbers,
	footer .text-light .mailchimp-subscription .widget-title,
	footer .mc4wp-form-fields h2.title,
	footer#colophon h1,
	footer#colophon h2,
	footer#colophon h3,
	footer#colophon h4,
	footer#colophon h5,
	footer#colophon h6,
	footer#colophon .h1,
	footer#colophon .h2,
	footer#colophon .h3,
	footer#colophon .h4,
	footer#colophon .h5,
	footer#colophon .h6,
	footer#colophon h1.wpb_heading,
	footer#colophon h2.wpb_heading,
	footer#colophon h3.wpb_heading,
	footer#colophon h4.wpb_heading,
	footer#colophon h5.wpb_heading,
	footer#colophon h6.wpb_heading
	footer#colophon .wp-caption p.wp-caption-text,
	footer#colophon .woocommerce ul.cart_list li span.amount,
	footer#colophon .woocommerce ul.product_list_widget li span.amount,
	footer#colophon .ts-blogs-widget-wrapper ul li a,
	footer#colophon .ts-recent-comments-widget-wrapper ul li a{
		color:<?php echo esc_html($ts_footer_heading_color); ?>;
	}
	footer#colophon a:hover,
	footer .widget_product_tag_cloud .tagcloud a:hover,
	footer .widget_tag_cloud .tagcloud a:hover{
		color:<?php echo esc_html($ts_footer_text_color_hover); ?>;
	}
	footer#colophon .end-footer{
		color:<?php echo esc_html($ts_footer_end_text_color); ?>;
		background-color:<?php echo esc_html($ts_footer_end_background_color); ?>;
	}
	
	/* PRODUCT COLOR */
	.counter-wrapper > div{
		background-color:<?php echo esc_html($ts_product_countdown_background_color); ?>;
		border-color:<?php echo esc_html($ts_product_countdown_border_color); ?>;
		color:<?php echo esc_html($ts_product_countdown_number_color); ?>;
	}
	.counter-wrapper div.ref-wrapper{
		color:<?php echo esc_html($ts_product_countdown_text_color); ?>;
	}
	.counter-wrapper .days *,
	.counter-wrapper .days .ref-wrapper{
		color:<?php echo esc_html($ts_product_countdown_day_text_color); ?>;
	}
	.counter-wrapper .days,
	.single-style-layout-list.no-thumbnail .counter-wrapper > .days{
		background-color:<?php echo esc_html($ts_product_countdown_day_background_color); ?>;
		border-color:<?php echo esc_html($ts_product_countdown_day_background_color); ?>;
	}
	/* Rating Product */
	.star-rating:before,
	.woocommerce .star-rating:before,
	.testimonial-content .rating:before,
	blockquote .rating:before{
		color:<?php echo esc_html($ts_rating_color); ?>;
	}
	.star-rating span:before,
	.woocommerce .star-rating span:before,
	.testimonial-content .rating span:before,
	blockquote .rating span:before{
		color:<?php echo esc_html($ts_rating_color); ?>;
	}
	/* Name Product */
	.ts-search-result-container ul li a,
	#ts-search-result-container .view-all-wrapper a,
	.widget-container ul.product_list_widget li .ts-wg-meta > a,
	.woocommerce .widget-container ul.product_list_widget li .ts-wg-meta > a,
	.widget.ts-products-widget .ts-wg-meta > a,
	.woocommerce ul.product_list_widget .ts-wg-meta > a,
	.ts-header .header-top h3.product-name > a,
	h3.product-name > a,
	h3.product-name,
	.product-name a,
	.woocommerce #order_review table.shop_table tbody td.product-name,
	.woocommerce #order_review table.shop_table tfoot td.product-name,
	.single-navigation .product-info,
	.group_table a,
	body #yith-woocompare table.compare-list tr.title td{
		color:<?php echo esc_html($ts_product_name_text_color); ?>;
	}
	
	/* Button Product */
	body:not(.product-style-2) .thumbnail-wrapper .product-group-button .loop-add-to-cart a span,
	.woocommerce .product .thumbnail-wrapper .product-group-button > div a,
	.meta-wrapper div.wishlist a,
	.meta-wrapper div.compare a,
	.woocommerce .product .meta-wrapper a.added_to_cart,
	.woocommerce .product .meta-wrapper a.button,
	.woocommerce .product .meta-wrapper .wishlist a{
		background-color:<?php echo esc_html($ts_product_button_thumbnail_background_color); ?>;
		color:<?php echo esc_html($ts_product_button_thumbnail_text_color); ?>;
	}
	body:not(.product-style-2) .thumbnail-wrapper .product-group-button .loop-add-to-cart a span:hover,
	.woocommerce .product .thumbnail-wrapper .button-in:hover a,
	.button-in a:hover,
	.meta-wrapper .button-in.wishlist a:hover,
	.meta-wrapper .button-in.compare a:hover,
	.woocommerce .product .thumbnail-wrapper .product-group-button > div a:hover,
	.woocommerce .product .meta-wrapper a.added_to_cart:hover,
	.woocommerce .product .meta-wrapper a.button:hover,
	.woocommerce .product .meta-wrapper a.added_to_cart:focus,
	.woocommerce .product .meta-wrapper a.button:focus,
	.woocommerce .product .meta-wrapper .wishlist a:hover,
	.woocommerce .product .meta-wrapper .wishlist a:focus,
	.meta-wrapper div.wishlist a:hover,
	.meta-wrapper div.compare a:hover,
	.single-portfolio .ic-like:hover{
		background-color:<?php echo esc_html($ts_product_button_thumbnail_background_hover); ?>;
		color:<?php echo esc_html($ts_product_button_thumbnail_text_color_hover); ?>;
	}
	.product-group-button .button-tooltip,
	.quickshop .button-tooltip,
	.wishlist .button-tooltip,
	.compare .button-tooltip,
	.ts-product-attribute .button-tooltip{
		color:<?php echo esc_html($ts_product_button_thumbnail_text_color_hover); ?>;
	}
	.product-group-button .button-tooltip:after,
	.ts-product-attribute .button-tooltip:after{
		border-top-color:<?php echo esc_html($ts_product_button_thumbnail_background_hover); ?>;/* rtl */
	}
	body.product-style-2 .product-group-button .button-tooltip:after{
		border-left-color:<?php echo esc_html($ts_product_button_thumbnail_background_hover); ?>;/* rtl */
		border-right-color:<?php echo esc_html($ts_product_button_thumbnail_background_hover); ?>;/* rtl */
	}
	.product-group-button .button-tooltip:before,
	.ts-product-attribute .button-tooltip:before{
		background-color:<?php echo esc_html($ts_product_button_thumbnail_background_hover); ?>;
	}
	/* Label Product */
	.woocommerce .product .product-label .onsale{
		color:<?php echo esc_html($ts_product_sale_label_text_color); ?>;
		background:<?php echo esc_html($ts_product_sale_label_background_color); ?>;
	}
	.woocommerce .product .product-label .onsale.amount{
		color:<?php echo esc_html($ts_product_sale_label_text_color); ?>;
	}
	.woocommerce .product .product-label .onsale:before,
	.woocommerce div.product .images .product-label .onsale:before{
		border-left-color:<?php echo esc_html($ts_product_sale_label_background_color); ?>;
		border-right-color:<?php echo esc_html($ts_product_sale_label_background_color); ?>;
	}
	.woocommerce .product .product-label .new{
		color:<?php echo esc_html($ts_product_new_label_text_color); ?>;
		background:<?php echo esc_html($ts_product_new_label_background_color); ?>;
	}
	.woocommerce .product .product-label .new:before,
	.woocommerce div.product .images .product-label .new:before{
		border-left-color:<?php echo esc_html($ts_product_new_label_background_color); ?>;
		border-right-color:<?php echo esc_html($ts_product_new_label_background_color); ?>;
	}
	.woocommerce .product .product-label .featured{
		color:<?php echo esc_html($ts_product_feature_label_text_color); ?>;
		background:<?php echo esc_html($ts_product_feature_label_background_color); ?>;
	}
	.woocommerce .product .product-label .featured:before,
	.woocommerce div.product .images .product-label .featured:before{
		border-left-color:<?php echo esc_html($ts_product_feature_label_background_color); ?>;
		border-right-color:<?php echo esc_html($ts_product_feature_label_background_color); ?>;
	}
	.woocommerce .product .product-label .out-of-stock{
		color:<?php echo esc_html($ts_product_outstock_label_text_color); ?>;
		background:<?php echo esc_html($ts_product_outstock_label_background_color); ?>;
	}
	.woocommerce .product .product-label .out-of-stock:before,
	.woocommerce div.product .images .product-label .out-of-stock:before{
		border-left-color:<?php echo esc_html($ts_product_outstock_label_background_color); ?>;
		border-right-color:<?php echo esc_html($ts_product_outstock_label_background_color); ?>;
	}
	/* Amount Product */
	.amount,
	.woocommerce .products .product .price,
	.woocommerce .products .product .amount,
	.woocommerce div.product p.price,
	.woocommerce div.product span.price,
	.single-navigation .product-info .price,
	/* Compare table */
	body #yith-woocompare table.compare-list tr.price td{
		color:<?php echo esc_html($ts_product_price_color); ?>;
	}
	del .amount,
	.woocommerce .products .product del .amount{
		color:<?php echo esc_html($ts_product_del_price_color); ?>;
	}
	ins .amount,
	.woocommerce .products .product ins .amount{
		color:<?php echo esc_html($ts_product_sale_price_color); ?>;
	}
	
	/* REVOLUTION SLIDER */
	.vc_images_carousel .vc_left .icon-prev:before,
	.vc_images_carousel .vc_right .icon-next:before,
	.tp-leftarrow.tparrows:before,
	.tp-rightarrow.tparrows:before,
	#page sr7-module .sr7-arrows.sr7-leftarrow:before,
	#page sr7-module .sr7-arrows.sr7-rightarrow:before,
	#page rs-module-wrap .tp-leftarrow.tparrows:before,
	#page rs-module-wrap .tp-rightarrow.tparrows:before,
	.wpb_gallery .wpb_flexslider .flex-direction-nav a:before,
	.theme-default .nivo-directionNav a:before{
		color:<?php echo esc_html($ts_revo_button_color); ?>;
		border-color:<?php echo esc_html($ts_revo_button_border_color); ?>;
	}
	.vc_images_carousel .vc_left:hover .icon-prev:before,
	.vc_images_carousel .vc_right:hover .icon-next:before,
	.tp-leftarrow.tparrows:hover:before,
	.tp-rightarrow.tparrows:hover:before,
	#page sr7-module .sr7-arrows.sr7-leftarrow:hover:before,
	#page sr7-module .sr7-arrows.sr7-rightarrow:hover:before,
	#page rs-module-wrap .tp-leftarrow.tparrows:hover:before,
	#page rs-module-wrap .tp-rightarrow.tparrows:hover:before,
	.wpb_gallery .wpb_flexslider .flex-direction-nav a:hover:before,
	.theme-default .nivo-directionNav a:hover:before{
		color:<?php echo esc_html($ts_revo_button_color_hover); ?>;
		border-color:<?php echo esc_html($ts_revo_button_border_color_hover); ?>;
	}
				
	/* 7. CUSTOM FONT SIZE */
	
	html,
	body,
	blockquote p.author-role,
	.woocommerce #payment div.payment_box,
	.woocommerce .products .product .product-label .onsale,
	.woocommerce .products .product .product-label .new,
	.woocommerce .products .product .product-label .featured,
	.woocommerce .products .product .product-label .out-of-stock,
	.woocommerce div.product p.price,
	.woocommerce div.product p.availability.stock,
	.mc4wp-form-fields label,
	ul li .ts-megamenu-container,
	.comment-text,
	.woocommerce .order_details li,
	.comment_list_widget .comment-body,
	.post_list_widget .excerpt,
	#bbpress-forums,
	.woocommerce ul.products li.product .price del,
	.woocommerce ul.products li.product .price,
	.ts-tiny-cart-wrapper .form-content > label,
	.shopping-cart-wrapper .ts-tiny-cart-wrapper,
	.widget_calendar th,
	.widget_calendar td,
	.post_list_widget blockquote,
	#ts-search-result-container ul li a,
	#ts-search-result-container .view-all-wrapper a,
	body .wpml-ls-legacy-dropdown .wpml-ls-sub-menu a,
	body .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu a,
	.header-currency ul li a,
	select option,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
	.yith-wcwl-share h4.yith-wcwl-share-title,
	.woocommerce-cart .cart-collaterals .cart_totals table td,
	.woocommerce-cart .cart-collaterals .cart_totals table th,
	.woocommerce table.wishlist_table,
	body #yith-woocompare table.compare-list tr.image td,
	body #yith-woocompare table.compare-list tr.price td,
	h3 > label,
	body.wpb-js-composer .vc_tta.vc_general,
	.dokan-category-menu .sub-block h3,
	.feature-content .feature-excerpt,
	.woocommerce div.product .woocommerce-tabs .panel,
	.ts-team-members .team-info,
	.ts-product-deals-2-wrapper .products .owl-nav > div,
	/* Forum */
	#bbpress-forums div.bbp-forum-title h3,
	#bbpress-forums div.bbp-topic-title h3,
	#bbpress-forums div.bbp-reply-title h3,
	/* COMPARE TABLE */
	body #yith-woocompare table.compare-list,
	body #yith-woocompare table.compare-list tr.image th,
	body #yith-woocompare table.compare-list tr.image td,
	body #yith-woocompare table.compare-list tr.title th,
	body #yith-woocompare table.compare-list tr.title td,
	body #yith-woocompare table.compare-list th,
	body #yith-woocompare table.compare-list td,
	body #yith-woocompare table.compare-list th,
	/* FORUM */
	#bbpress-forums .status-category > li > .bbp-forums-list > li a,
	#bbpress-forums .bbp-forum-info .bbp-forum-content,
	#bbpress-forums p.bbp-topic-meta,
	#bbpress-forums ul.bbp-lead-topic,
	#bbpress-forums ul.bbp-topics,
	#bbpress-forums ul.bbp-forums,
	#bbpress-forums ul.bbp-replies,
	#bbpress-forums ul.bbp-search-results,
	#bbpress-forums #bbp-user-navigation,
	#bbpress-forums ul.bbp-replies > .bbp-header,
	#bbpress-forums div.bbp-topic-tags,
	#bbpress-forums ul.bbp-lead-topic .bbp-body .bbp-forum-info,
	#bbpress-forums ul.bbp-topics .bbp-body .bbp-forum-info,
	#bbpress-forums ul.bbp-forums .bbp-body .bbp-forum-info,
	#bbpress-forums ul.bbp-replies .bbp-body .bbp-forum-info,
	#bbpress-forums ul.bbp-search-results .bbp-body .bbp-forum-info,
	.type-topic .bbp-topic-title > a,
	#favorite-toggle a,
	#subscription-toggle a,
	.vc_col-sm-4 .ts-testimonial-wrapper blockquote,
	/* Event */
	#tribe-events .tribe-events-content p,
	.tribe-events-after-html p,
	.tribe-events-before-html p{
		font-size:<?php echo esc_html($ts_body_font_size); ?>;
		line-height:<?php echo esc_html($ts_body_font_line_height); ?>;
	}
	input,
	textarea,
	keygen,
	.single-portfolio .single-navigation > div a,
	.cart_list h3.product-name > a,
	ul.wishlist_table .item-details .product-name h3,
	.widget.ts-products-widget .ts-wg-meta > a,
	.widget-container ul.product_list_widget li .ts-wg-meta > a,
	.woocommerce ul.cart_list li a,
	.woocommerce ul.product_list_widget li,
	.woocommerce form .form-row input.input-text,
	.woocommerce form .form-row textarea,
	.dokan-form-control,
	.single-navigation .product-info > div > span:first-child,
	#add_payment_method table.cart td.actions .coupon .input-text,
	.woocommerce-cart table.cart td.actions .coupon .input-text,
	.woocommerce-checkout table.cart td.actions .coupon .input-text,
	.amount,
	.cats-portfolio,
	.woocommerce .checkout #order_review table thead th,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab a,
	body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-right .vc_tta-tab a,
	.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title a,
	.vc_toggle_default .vc_toggle_title h4,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	.list-cats li a,
	.vc_progress_bar .vc_single_bar .vc_label,
	.woocommerce-columns > h3,
	.style-horizontal .mailchimp-subscription .newsletter,
	body #yith-woocompare table.compare-list tr.price .amount,
	body #yith-woocompare table.compare-list tr.price del .amount,
	body #yith-woocompare table.compare-list tr.price th,
	body #yith-woocompare table.compare-list tr.price td,
	.mailchimp-subscription .mc4wp-alert,
	#page .wc-block-components-notice-banner,
	.ts-popup-modal .wc-block-components-notice-banner{
		font-size:<?php echo esc_html($ts_body_font_size); ?>;
	}
	footer .widget-container .tagcloud a{
		font-size:<?php echo esc_html($ts_body_font_size); ?> !important;
	}
	h4.heading-title > a,
	h3.product-name > a,
	h3.product-name,
	.menu-wrapper .vertical-menu ul.menu > li > a,
	.ts-price-table.style-1 .table-title,
	.woocommerce-checkout #payment .payment_method_paypal .about_paypal,
	.woocommerce ul#shipping_method li .amount,
	.woocommerce .checkout #order_review table td,
	.woocommerce #order_review table.shop_table .product-quantity,
	.woocommerce .products .product .product-label .onsale,
	.woocommerce .products .product .product-label .new,
	.woocommerce .products .product .product-label .featured,
	.woocommerce .products .product .product-label .out-of-stock,
	.woocommerce div.product .product_title,
	.woocommerce-account .woocommerce-MyAccount-navigation li a,
	body #yith-woocompare table.compare-list td,
	.woocommerce table.shop_attributes td,
	.woocommerce table.shop_attributes th,
	.woocommerce table.shop_attributes .alt td,
	.woocommerce table.shop_attributes .alt th,
	.ts-product-attribute > div a,
	div.product .summary .yith-wcwl-add-to-wishlist a,
	.product .yith-wcwl-wishlistexistsbrowse.show i,
	.product .yith-wcwl-wishlistaddedbrowse.show i,
	.product-group-button .button-tooltip,
	.ts-product-attribute .button-tooltip,
	.widget_display_stats > dl dt,
	.comment_list_widget .comment-body,
	.widget_calendar th,
	.widget_calendar td,
	.woocommerce.widget_recent_reviews ul.product_list_widget li a,
	.widget.ts-products-widget .ts-wg-meta > a,
	.woocommerce ul.product_list_widget .ts-wg-meta > a,
	.widget-container ul.product_list_widget li .ts-wg-meta > a,
	.woocommerce .widget-container ul.product_list_widget li .ts-wg-meta > a,
	.woocommerce ul.cart_list li a,
	.woocommerce ul.product_list_widget li a,
	.woocommerce .widget-container .price_slider_amount .price_label span,
	.widget-container .tagcloud a,
	.dokan-category-menu .sub-block h3,
	.woocommerce a.button.added:before,
	.woocommerce button.button.added:before,
	.woocommerce input.button.added:before,
	.woocommerce .meta-wrapper .loop-add-to-cart a:first-child:before,
	.ts-product-attribute > div.color a:hover,
	.horizontal-icon-small .feature-header h3 a,
	.ts-price-table .table-title-2{
		font-weight:<?php echo esc_html($ts_body_font_weight); ?>;
	}
	.woocommerce-account .woocommerce-MyAccount-navigation li a,
	.woocommerce-cart .cart-collaterals .cart_totals table td:before,
	.cart_list li .cart-item-wrapper a.remove,
	.woocommerce .widget_shopping_cart .cart_list li a.remove,
	.woocommerce.widget_shopping_cart .cart_list li a.remove,
	.ts-milestone h3.subject{
		font-weight:<?php echo esc_html($ts_body_font_weight); ?> !important;
	}
	body #pp_full_res{
		line-height:<?php echo esc_html($ts_body_font_line_height); ?> !important;
	}
	.woocommerce div.product p.price,
	.woocommerce div.product span.price,
	.woocommerce table.my_account_orders td,
	.woocommerce table.shop_table.my_account_orders,
	.woocommerce table .quantity input.qty,
	body .select2-container--default .select2-selection--single .select2-selection__rendered,
	select{
		font-size:<?php echo esc_html($ts_body_font_size); ?>;
	}
	
	h1,
	.h1
	{
		font-size:<?php echo esc_html($ts_h1_font_size); ?>;
		line-height:<?php echo esc_html($ts_h1_font_line_height); ?>;
	}

	h2,
	.h2,
	h1.wpb_heading,
	.ts-heading h1,
	.style-5 .table-price,
	.vc_col-sm-12 .style-vertical .widget-title-wrapper h3
	{
		font-size:<?php echo esc_html($ts_h2_font_size); ?>;
		line-height:<?php echo esc_html($ts_h2_font_line_height); ?>;
	}
	
	h3,
	.h3,
	.ts-heading h2,
	.breadcrumb-title-wrapper .breadcrumb-title h1,
	.heading-wrapper > h2,
	.ts-heading.style-background h1,
	.title-center .shortcode-heading-wrapper .heading-title,
	.ts-product-in-category-tab-wrapper .column-tabs .heading-title{
		font-size:<?php echo esc_html($ts_h3_font_size); ?>;
		line-height:<?php echo esc_html($ts_h3_font_line_height); ?>;
	}
	
	h4,
	.h4,
	.heading-wrapper > h2,
	.heading-shortcode > h3,
	.ts-heading h3,
	.vertical-button-text .widget-title,
	.ts-heading.style-background h2,
	.woocommerce .single-style-layout-list .product-name a,
	.ts-price-table.style-1 .table-title,
	#bbpress-forums #bbp-user-wrapper h2.entry-title,
	.list-posts .entry-title a,
	.woocommerce div.product .product_title,
	.title-center-border .shortcode-heading-wrapper .heading-title,
	.big-price .amount,
	.big-price,
	.woocommerce .single-style-layout-list .price,
	.woocommerce .single-style-layout-list .price .amount,
	.ts-product-category-wrapper .category-name h3 > a,
	.ts-product-category-wrapper .category-name h3,
	.ts-product-brand-wrapper .meta-wrapper h3 > a,
	.ts-product-brand-wrapper .category-name h3,
	.style-horizontal .mailchimp-subscription .widget-title,
	.text-feature-bg,
	.ts-price-table.style-6 .table-price,
	.ts-price-table.style-7 .table-price,
	.horizontal-style .box-header h3,
	.horizontal-style .box-header h3 > a,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .heading-tab h3,
	.ts-shortcode.title-border-thin .shortcode-heading-wrapper h3,
	.ts-shortcode.title-border-primary-2 .shortcode-heading-wrapper h3,
	.ts-products-widget.title-border-thin > h2.widgettitle,
	.ts-products-widget.title-border-primary-2 > h2.widgettitle,
	.ts-product-in-product-type-tab-wrapper.style-5 .column-tabs .heading-tab h3{
		font-size:<?php echo esc_html($ts_h4_font_size); ?>;
		line-height:<?php echo esc_html($ts_h4_font_line_height); ?>;
	}

	h5,
	.h5,
	.woocommerce div.product .single_variation .amount,
	div.product p.price .woocommerce-Price-amount,
	div.product .single_variation .amount,
	div.product p.price,
	.ts-price-table.style-1 .table-price,
	.ts-instagram-shortcode .heading-title,
	.ts-instagram-shortcode .widget-title-wrapper i,
	.woocommerce .single-style-layout-grid .price,
	.woocommerce .single-style-layout-grid .price .amount,
	.ts-product-in-product-type-tab-wrapper .column-tabs .heading-tab h3,
	.ts-product-in-category-tab-wrapper .column-tabs .tabs li,
	.ts-shortcode.title-border-primary .shortcode-heading-wrapper h3,
	.ts-heading.style-border-primary h4,
	.vertical-icon-circle2 .feature-header h3 a,
	.horizontal-icon .feature-header h3 a,
	.vertical-number .feature-header h3 a,
	.vertical-icon-image .feature-header h3 a,
	.vertical-icon-circle2 .feature-header h3,
	.horizontal-icon .feature-header h3,
	.vertical-number .feature-header h3,
	.vertical-icon-image .feature-header h3,
	.ts-list-of-product-categories-wrapper .heading-title,
	.big-product h3.product-name > a,
	.ts-price-table.style-6 .table-title,
	.ts-price-table.style-7 .table-title,
	blockquote p.author-role span,
	.ts-heading.style-background h3,
	.event .title-time .title,
	h4.wpb_heading,
	h5.wpb_heading,
	/* Event */
	.tribe-events-style-skeleton #tribe-bar-collapse-toggle
	{
		font-size:<?php echo esc_html($ts_h5_font_size); ?>;
		line-height:<?php echo esc_html($ts_h5_font_line_height); ?>;
	}
	body .ts-products-widget.title-border-primary > .widgettitle,
	.ts-heading.title-background-border,
	body .ts-product-in-product-type-tab-wrapper.style-3 .column-tabs .heading-tab h3,
	.title-background-border .shortcode-heading-wrapper h3{
		font-size:<?php echo esc_html($ts_h5_font_size); ?>;
	}

	h6,.h6,
	.vc_message_box .h4,
	h6.wpb_heading,
	.woocommerce-account .addresses .title h3,
	.woocommerce-account .addresses h2,
	.woocommerce-customer-details .addresses h2,
	.woocommerce table.shop_table thead th,
	.member-name h3,
	.ts-milestone h3.subject,
	.ts-twitter-slider.text-light .twitter-content h4 > a,
	body.wpb-js-composer div.product .vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a,
	.ts-team-members h3,
	.ts-team-members .member-social a,
	table thead th,
	h4 > a,
	h3.entry-title > a,
	.ts-blogs .entry-title,
	.feature-content .feature-header,
	.horizontal-icon-small .feature-header h3 a,
	.horizontal-icon-small .feature-header h3,
	.ts-image-box .box-header h3,
	body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a,
	.testimonial-content .byline,
	.style-1.tab-heading-style-2 .column-tabs .tabs li,
	.filter-widget-area .widget-container .widget-title,
	.table-title-2,
	.ts-product-in-product-type-tab-wrapper.style-4 .column-tabs .tabs li{
		font-size:<?php echo esc_html($ts_h6_font_size); ?>;
		line-height:<?php echo esc_html($ts_h6_font_line_height); ?>;
	}
	.ts-sidebar-content h4.title,
	.ts-heading h4,
	h2.wpb_heading,
	.breadcrumb-title-wrapper.breadcrumb-v2 .breadcrumb-title > h1,
	.portfolio-inner h3,
	.ts-price-table .table-title,
	.shortcode-heading-wrapper .heading-title,
	.theme-title .heading-title,
	.comments-title .heading-title,
	#comment-wrapper .heading-title,
	body .ts-footer-block .widget .widgettitle,
	body .ts-footer-block .widget-title,
	#customer_login h2,
	.woocommerce-account div.woocommerce > h2,
	.account-content h2,
	.woocommerce-MyAccount-content > h2,
	.woocommerce div.wishlist-title h2,
	.woocommerce-customer-details > h2,
	.woocommerce-order-details > h2,
	.woocommerce .cross-sells > h2,
	.woocommerce .upsells > h2,
	.woocommerce .related > h2,
	.cart-subtotal .amount,
	.order-total .amount,
	.dropdown-container .form-content .cart-number,
	.woocommerce-billing-fields > h3,
	.woocommerce-additional-fields > h3,
	header.woocommerce-Address-title > h3,
	.wp-caption p.wp-caption-text,
	.cart-collaterals .cart_totals > h2,
	.related > h2,
	body.woocommerce > h1,
	body div.ppt,
	.entry-content h1.blog-title,
	.widget.ts-products-widget > .widgettitle,
	.woocommerce-account .woocommerce-MyAccount-navigation li a,
	.woocommerce #reviews #reply-title,
	.woocommerce #reviews #comments > h2,
	.widget_shopping_cart_content p.total strong,
	.widget-title,
	#order_review_heading,
	body h4.wpb_pie_chart_heading,
	h3.wpb_heading,
	.mc4wp-form-fields > h2.title,
	.woocommerce .products .product.product-category h3,
	.style-horizontal .subscribe-email .button{
		font-size:<?php echo esc_html($ts_heading_font_size); ?>;
		line-height:<?php echo esc_html($ts_heading_font_line_height); ?>;
	}
	
	/* HEADER */
	.info-desc,
	.ts-header-social-icons,
	.my-account-wrapper .account-control > a,
	.my-wishlist-wrapper a,
	body .wpml-ls-legacy-dropdown a.wpml-ls-item-toggle, 
	body .wpml-ls-legacy-dropdown-click a.wpml-ls-item-toggle,
	.header-currency .wcml_currency_switcher > a,
	.group-meta-header .shopping-cart-wrapper a.cart-control span.amount{
		font-size:<?php echo esc_html($ts_body_font_size); ?>;
		line-height:<?php echo esc_html($ts_body_font_line_height); ?>;
	}
	.my-account-wrapper .dropdown-container{
		line-height:<?php echo esc_html($ts_body_font_line_height); ?>;
	}
	
	/* MENU */
	.menu-wrapper nav > ul.menu > li > a,
	.menu-wrapper nav > ul > li > a,
	.menu-wrapper nav > ul.menu li:before,
	.vertical-menu-wrapper .vertical-menu-heading,
	header .vertical-menu-wrapper .vertical-menu-heading:before,
	.menu-wrapper .vertical-menu > ul.menu > li > .ts-menu-drop-icon{
		font-size:<?php echo esc_html($ts_menu_font_size); ?>;
		line-height:<?php echo esc_html($ts_menu_font_line_height); ?>;
	}
	/* WIDGET CUSTOM MENU FOR MEGAMENU */
	.ts-menu nav li.widget > .widgettitle,
	.ts-menu nav div.list-link > .widgettitle{
		font-size:<?php echo esc_html($ts_menu_font_size); ?>;
		line-height:<?php echo esc_html($ts_menu_font_line_height); ?>;
	}
	
	/* BUTTON */
	.woocommerce-error .button,
	.woocommerce-info .button,
	.woocommerce-message .button,
	.woocommerce .woocommerce-error .button,
	.woocommerce .woocommerce-info .button,
	.woocommerce .woocommerce-message .button,
	#page .wc-block-components-notice-banner a.button{
		font-size:<?php echo esc_html($ts_button_font_size); ?>;
	}
	.woocommerce a.button.added:before,
	.woocommerce button.button.added:before,
	.woocommerce input.button.added:before,
	a.ts-button,
	a.button,
	button,
	.meta-wrapper div.compare a i,
	.meta-wrapper div.compare a:before,
	html body.woocommerce table.compare-list tr.add-to-cart td a:before,
	html body #yith-woocompare table.compare-list tr.add-to-cart td a:before,
	input[type="submit"],
	.shopping-cart p.buttons a,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce table.shop_table input,
	.woocommerce #respond input#submit, 
	body.no-wishlist.no-compare .woocommerce .meta-wrapper .loop-add-to-cart a.button span,
	body.no-wishlist.no-compare .woocommerce .meta-wrapper .loop-add-to-cart a.button:before,
	body .product-edit-new-container .dokan-btn-lg,
	body .yith-woocompare-widget a.compare,
	#ts-search-sidebar .ts-search-result-container .view-all-wrapper a,
	.woocommerce .single-style-layout-list .meta-wrapper .loop-add-to-cart a.button,
	.woocommerce .single-style-layout-list .meta-wrapper .loop-add-to-cart a.button:before,
	/* Event */
	#tribe-events .tribe-events-button,
	#tribe_events_filters_wrapper input[type=submit],
	.tribe-events-button,
	.tribe-events-button.tribe-inactive,
	#tribe-events-footer ~ a.tribe-events-ical.tribe-events-button,
	.woocommerce .wishlist_table .product-add-to-cart a,
	/* Forum */
	#bbpress-forums #bbp-single-user-details #bbp-user-navigation a,
	/* Compare */
	body #yith-woocompare table.compare-list .add-to-cart td a,
	/* Dokan */
	input[type="submit"].dokan-btn,
	a.dokan-btn,
	.dokan-btn{
		font-size:<?php echo esc_html($ts_button_font_size); ?>;
		line-height:<?php echo esc_html($ts_button_font_line_height); ?>;
	}
	.woocommerce .summary a.compare i,
	.woocommerce .summary div.yith-wcwl-add-to-wishlist a:before,
	.woocommerce .summary a.compare:before,
	div.product .summary .yith-wcwl-add-to-wishlist a:before{
		font-size:<?php echo esc_html($ts_button_font_size); ?>;
	}
	h3.product-name > a,
	h3.product-name,
	body #yith-woocompare table.compare-list tr.title td{
		font-size:<?php echo esc_html($ts_product_name_font_size); ?>;
		line-height:<?php echo esc_html($ts_product_name_font_line_height); ?>;
	}
	
	/* 8. REPONSIVE */
	<?php if( isset($data['ts_responsive']) && $data['ts_responsive'] == 1 ): ?>
	@media only screen and (max-width:767px){
		/* COMPARE */
		body.woocommerce > h1{
			padding:15px;
		}
		body #yith-woocompare table.compare-list th{
			display:none !important;
		}
		body #yith-woocompare table.compare-list .add-to-cart td a{
			min-width:initial;
		}
		body #yith-woocompare table.compare-list td{
			width:auto;
		}
		body #yith-woocompare table.compare-list .add-to-cart td a:before{
			display:none;
		}
		body #yith-woocompare table.compare-list td,
		body #yith-woocompare table.compare-list th{
			padding-left:10px;
			padding-right:10px;
		}
		body #yith-woocompare table.compare-list .add-to-cart td a{
			padding-top:10px;
			padding-bottom:10px;
		}
	}
	<?php elseif( isset($data['ts_responsive']) && $data['ts_responsive'] == 0 ): ?>
	.vc_col-xs-1, .vc_col-sm-1, .vc_col-md-1, .vc_col-lg-1, .vc_col-xs-2, .vc_col-sm-2, .vc_col-md-2, .vc_col-lg-2, .vc_col-xs-3, .vc_col-sm-3, .vc_col-md-3, .vc_col-lg-3, .vc_col-xs-4, .vc_col-sm-4, .vc_col-md-4, .vc_col-lg-4, .vc_col-xs-5, .vc_col-sm-5, .vc_col-md-5, .vc_col-lg-5, .vc_col-xs-6, .vc_col-sm-6, .vc_col-md-6, .vc_col-lg-6, .vc_col-xs-7, .vc_col-sm-7, .vc_col-md-7, .vc_col-lg-7, .vc_col-xs-8, .vc_col-sm-8, .vc_col-md-8, .vc_col-lg-8, .vc_col-xs-9, .vc_col-sm-9, .vc_col-md-9, .vc_col-lg-9, .vc_col-xs-10, .vc_col-sm-10, .vc_col-md-10, .vc_col-lg-10, .vc_col-xs-11, .vc_col-sm-11, .vc_col-md-11, .vc_col-lg-11, .vc_col-xs-12, .vc_col-sm-12, .vc_col-md-12, .vc_col-lg-12{
		padding-left:0;
		padding-right:0;
	}
	.vc_column-gap-default > .vc_col-xs-1,.vc_column-gap-default > .vc_col-sm-1,.vc_column-gap-default > .vc_col-md-1,.vc_column-gap-default > .vc_col-lg-1,.vc_column-gap-default > .vc_col-xs-2,.vc_column-gap-default > .vc_col-sm-2,.vc_column-gap-default > .vc_col-md-2,.vc_column-gap-default > .vc_col-lg-2,.vc_column-gap-default > .vc_col-xs-3,.vc_column-gap-default > .vc_col-sm-3,.vc_column-gap-default > .vc_col-md-3,.vc_column-gap-default > .vc_col-lg-3,.vc_column-gap-default > .vc_col-xs-4,.vc_column-gap-default > .vc_col-sm-4,.vc_column-gap-default > .vc_col-md-4,.vc_column-gap-default > .vc_col-lg-4,.vc_column-gap-default > .vc_col-xs-5,.vc_column-gap-default > .vc_col-sm-5,.vc_column-gap-default > .vc_col-md-5,.vc_column-gap-default > .vc_col-lg-5,.vc_column-gap-default > .vc_col-xs-6,.vc_column-gap-default > .vc_col-sm-6,.vc_column-gap-default > .vc_col-md-6,.vc_column-gap-default > .vc_col-lg-6,.vc_column-gap-default > .vc_col-xs-7,.vc_column-gap-default > .vc_col-sm-7,.vc_column-gap-default > .vc_col-md-7,.vc_column-gap-default > .vc_col-lg-7,.vc_column-gap-default > .vc_col-xs-8,.vc_column-gap-default > .vc_col-sm-8,.vc_column-gap-default > .vc_col-md-8,.vc_column-gap-default > .vc_col-lg-8,.vc_column-gap-default > .vc_col-xs-9,.vc_column-gap-default > .vc_col-sm-9,.vc_column-gap-default > .vc_col-md-9,.vc_column-gap-default > .vc_col-lg-9,.vc_column-gap-default > .vc_col-xs-10,.vc_column-gap-default > .vc_col-sm-10,.vc_column-gap-default > .vc_col-md-10,.vc_column-gap-default > .vc_col-lg-10,.vc_column-gap-default > .vc_col-xs-11,.vc_column-gap-default > .vc_col-sm-11,.vc_column-gap-default > .vc_col-md-11,.vc_column-gap-default > .vc_col-lg-11,.vc_column-gap-default > .vc_col-xs-12,.vc_column-gap-default > .vc_col-sm-12,.vc_column-gap-default > .vc_col-md-12,.vc_column-gap-default > .vc_col-lg-12{
		padding-left:15px;
		padding-right:15px;
	}
	.ts-col-1, .ts-col-2, .ts-col-3, .ts-col-4, .ts-col-5, .ts-col-6, .ts-col-7, .ts-col-8, .ts-col-9, .ts-col-10, .ts-col-11, .ts-col-12, .ts-col-13, .ts-col-14, .ts-col-15, .ts-col-16, .ts-col-17, .ts-col-18, .ts-col-19, .ts-col-20, .ts-col-21, .ts-col-22, .ts-col-23, .ts-col-24{
		float:left;
	}
	.ts-col-24{
		width:100%;
	}
	.ts-col-23{
		width:95.83333333%;
	}
	.ts-col-22{
		width:91.66666667%;
	}
	.ts-col-21{
		width:87.5%;
	}
	.ts-col-20{
		width:83.33333333%;
	}
	.ts-col-19{
		width:79.16666667%;
	}
	.ts-col-18{
		width:75%;
	}
	.ts-col-17{
		width:70.83333333%;
	}
	.ts-col-16{
		width:66.66666667%;
	}
	.ts-col-15{
		width:62.5%;
	}
	.ts-col-14{
		width:58.33333333%;
	}
	.ts-col-13{
		width:54.16666667%;
	}
	.ts-col-12{
		width:50%;
	}
	.ts-col-11{
		width:45.83333333%;
	}
	.ts-col-10{
		width:41.66666667%;
	}
	.ts-col-9{
		width:37.5%;
	}
	.ts-col-8{
		width:33.33333333%;
	}
	.ts-col-7{
		width:29.16666667%;
	}
	.ts-col-6{
		width:25%;
	}
	.ts-col-5{
		width:20.83333333%;
	}
	.ts-col-4{
		width:16.66666667%;
	}
	.ts-col-3{
		width:12.5%;
	}
	.ts-col-2{
		width:8.33333333%;
	}
	.ts-col-1{
		width:4.16666667%;
	}
	.ts-col-44per{
		width:44%;
	}
	.ts-col-56per{
		width:56%;
	}
	<?php endif; ?>
	
	/* 9. FULLWIDTH LAYOUT */
	
	<?php if( isset($data['ts_layout_fullwidth']) && $data['ts_layout_fullwidth'] == 1 ): ?>
	.page-container,
	.dokan-store #page > #main,
	.breadcrumb-title-wrapper .breadcrumb-content,
	.container{
		width:100%;
		max-width:100%;
	}
	<?php endif; ?>
	
	/* Custom CSS */
	<?php 
	if( !empty($ts_custom_css_code) ){
		echo html_entity_decode( trim( $ts_custom_css_code ) );
	}
	?>