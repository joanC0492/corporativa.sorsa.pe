jQuery(function($){
	"use strict";
	var on_touch = !$('body').hasClass('ts_desktop');
	
	/** Remove loading from fullwidth row **/
	$(document).on('vc-full-width-row-single', function(e, data){
		data.el.removeClass('loading');
	});
	
	/** Mega menu **/
	ts_mega_menu_change_state($('body').innerWidth());
	$('.widget_nav_menu .menu-item-has-children .sub-menu').before('<span class="ts-menu-drop-icon"></span>');
	
	/** Menu on IPAD **/
	if( on_touch || $(window).width() < 768 ){
		ts_menu_action_on_ipad();
	}
	
	/** Sticky Menu **/
	if( typeof upstore_params != 'undefined' && upstore_params.sticky_header == 1 ){
		ts_sticky_menu();
	}
	
	/** Device - Resize action **/
	$(window).on('resize orientationchange', $.throttle(250, function(){
		ts_mega_menu_change_state($('body').innerWidth());
		ts_set_cloud_zoom();
	}));
	
	/** Shopping cart on ipad **/
	if( on_touch ){
		$(document).on('click', '.ts-tiny-cart-wrapper span.drop-icon', function(){
			$(this).parent().parent().toggleClass('active');
		});
	}
	
	/** Header Currency - Language selector on mobile **/
	if( on_touch ){
		$('.header-currency a.wcml_selected_currency').on('click', function(){
			$('.header-currency').toggleClass('active');
		});
		$('.header-language a.lang_sel_sel').on('click', function(){
			$('.header-language').toggleClass('active');
			return false;
		});
	}
	
	/** To Top button **/
	if( $('html').offset().top < 100 ){
		$("#to-top").hide().addClass("off");
	}
	$(window).on('scroll', function(){
		if( $(this).scrollTop() > 100 ){
			$("#to-top").removeClass("off").addClass("on");
		} else {
			$("#to-top").removeClass("on").addClass("off");
		}
	});
	$('#to-top .scroll-button').on('click', function(){
		$('body,html').animate({
			scrollTop: '0px'
		}, 1000);
		return false;
	});
	
	/** Quickshop **/
	$(document).on('click', 'a.quickshop', function( e ){
		e.preventDefault();
		
		var product_id = $(this).data('product_id');
		if( product_id === undefined ){
			return;
		}
		
		var container = $('#ts-quickshop-modal');
		container.addClass('loading');
		container.find('.quickshop-content').html('');
		$.ajax({
			type : 'POST'
			,url : upstore_params.ajax_url
			,data : {action : 'upstore_load_quickshop_content', product_id: product_id}
			,success : function(response){
				container.find('.quickshop-content').html( response );
				container.find('img:first').on('load', function(){
					var height_content = Math.floor(container.find('.popup-container').height()/2)*2;
					container.find('.popup-container').css({'height': height_content});
					container.find('.summary').css({'max-height': height_content});
					container.find('.image-items').removeClass('loading');
				});
				container.removeClass('loading').addClass('show');
				
				container.find('form.variations_form').wc_variation_form();
				container.find('form.variations_form .variations select').change();
				$('body').trigger('wc_fragments_loaded');
				
				container.find('form.variations_form').on('click', '.reset_variations', function(){
					$(this).parents('.variations').find('.ts-product-attribute .option').removeClass('selected');
				});
			
				if( container.find('.image-item').length <= 1 ){
					return;
				}
				
				container.find('.image-items').owlCarousel({
						items: 1
						,loop: true
						,nav: true
						,navText: [,]
						,dots: false
						,navSpeed: 1000
						,rtl: $('body').hasClass('rtl')
						,navRewind: false
					});
			}
		});
	});
	
	$(document).on('click', '.ts-popup-modal .close, .ts-popup-modal .overlay', function(){
		$('.ts-popup-modal').removeClass('show');
	});
	
	/** Login/Registration popup **/
	if( $('#ts-account-modal').length > 0 ){
		$('.ts-tiny-account-wrapper .account-control a').on('click', function(e){
			e.preventDefault();
			$('#ts-account-modal').addClass('show');
		});
		
		if( $('#ts-account-modal .woocommerce-error').length || $('#ts-account-modal .woocommerce-notices-wrapper .is-error').length ){
			$('#ts-account-modal').addClass('show');
		}
	}
	
	/** Wishlist **/
	$(document).on('click', '.add_to_wishlist, .product a.compare:not(.added)', function(){
		$(this).addClass('loading');
	});
	
	$('body').on('added_to_wishlist', function(){
		ts_update_tini_wishlist();
		$('.add_to_wishlist').removeClass('loading');
		$('.yith-wcwl-wishlistaddedbrowse.show, .yith-wcwl-wishlistexistsbrowse.show').parent('.button-in.wishlist').addClass('added');
	});
	
	$('body').on('removed_from_wishlist added_to_cart', function(){
		if( $('.wishlist_table').length ){
			ts_update_tini_wishlist();
		}
	});
	
	/** Compare **/
	$('body').on('yith_woocompare_open_popup', function(){
		$('.product a.compare').removeClass('loading');
	});
	
	/*** Color Swatch ***/
	$(document).on('click', '.products .product .color-swatch > div', function(){
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		/* Change thumbnail */
		var image_src = $(this).data('thumb');
		$(this).closest('.product').find('figure img:first').attr('src', image_src);
		/* Change price */
		var term_id = $(this).data('term_id');
		var variable_prices = $(this).parent().siblings('.variable-prices');
		var price_html = variable_prices.find('[data-term_id="'+term_id+'"]').html();
		$(this).parent().siblings('.price').html( price_html ).addClass('variation-price');
	});
	
	/*** Set Cloud Zoom ***/
	ts_set_cloud_zoom();
	
	if( $('.cloud-zoom, .cloud-zoom-gallery').length > 0 ){
		$(document).on('found_variation reset_image', 'form.variations_form', function(){
			$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom({});
		});
	}
	
	/*** Product Image Lightbox ***/
	if( $('body').hasClass('single-product') && typeof PhotoSwipe !== 'undefined' ){
		
		$('.images-thumbnails').on('click', '.woocommerce-product-gallery__image a', function( e ){
			e.preventDefault();
			var items = ts_get_single_product_gallery_items();
			var index = $(this).find('img').attr('data-index');
			var pswpElement = $( '.pswp' )[0];
			var options = {
				index:                 	parseInt(index)
				,shareEl:               false
				,closeOnScroll:         false
				,history:               false
				,hideAnimationDuration: 0
				,showAnimationDuration: 0
			};
			var photoswipe = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );
			photoswipe.init();
		});
		
	}
	
	function ts_get_single_product_gallery_items(){
		var items = [];
		$('.images-thumbnails .woocommerce-product-gallery__image a').each(function(index, ele){
			if( $(ele).parents('.owl-item.cloned').length == 0 ){
				var img = $(ele).find('img');
				var large_image_src = img.attr( 'data-large_image' );
				var large_image_w   = img.attr( 'data-large_image_width' );
				var large_image_h   = img.attr( 'data-large_image_height' );
				var item            = {
					src: large_image_src,
					w:   large_image_w,
					h:   large_image_h,
					title: img.attr( 'title' )
				};
				items.push( item );
			}
		});
		
		if( $('.vertical-thumbnail').length > 0 && items.length > 1 ){
			var main_thumbnail = items.pop();
			items.unshift( main_thumbnail );
			
			$('.images-thumbnails > .thumbnails img').each(function(index, ele){
				$(ele).attr('data-index', index + 1);
			});
		}
		
		return items;
	}
	
	/*** Product Stock - Variable Product ***/
	function single_variable_product_reset_stock( wrapper ){
		var stock_html = wrapper.find('p.availability').data('original');
		var classes = wrapper.find('p.availability').data('class');
		if( classes == '' ){
			classes = 'in-stock';
		}
		wrapper.find('p.availability span').html(stock_html);
		wrapper.find('p.availability').removeClass('in-stock out-of-stock').addClass(classes);
	}
	
	$(document).on('found_variation', 'form.variations_form', function(){
		var wrapper = $(this).parents('.summary');
		if( wrapper.find('.single_variation .stock').length > 0 ){
			var stock_html = wrapper.find('.single_variation .stock').html();
			var classes = wrapper.find('.single_variation .stock').hasClass('out-of-stock')?'out-of-stock':'in-stock';
			wrapper.find('p.availability span').html(stock_html);
			wrapper.find('p.availability').removeClass('in-stock out-of-stock').addClass(classes);
		}
		else{
			single_variable_product_reset_stock( wrapper );
		}
	});
	
	$(document).on('reset_image', 'form.variations_form', function(){
		var wrapper = $(this).parents('.summary');
		single_variable_product_reset_stock( wrapper );
	});
	
	/*** Hide product attribute if not available ***/
	$(document).on('update_variation_values', 'form.variations_form', function(){
		if( $(this).find('.ts-product-attribute').length > 0 ){
			$(this).find('.ts-product-attribute').each(function(){
				var attr = $(this);
				var values = [];
				attr.siblings('select').find('option').each(function(){
					if( $(this).attr('value') ){
						values.push( $(this).attr('value') );
					}
				});
				attr.find('.option').removeClass('hidden');
				attr.find('.option').each(function(){
					if( $.inArray($(this).attr('data-value'), values) == -1 ){
						$(this).addClass('hidden');
					}
				});
			});
		}
	});
	
	/*** Custom Orderby on Product Page ***/
	$('form.woocommerce-ordering ul.orderby ul a').on('click', function(e){
		e.preventDefault();
		if( $(this).hasClass('current') ){
			return;
		}
		var form = $('form.woocommerce-ordering');
		var data = $(this).attr('data-orderby');
		form.find('select.orderby').val(data).trigger('change');
	});
	
	/*** Per page on Product page ***/
	$('form.product-per-page-form ul.perpage ul a').on('click', function(e){
		e.preventDefault();
		if( $(this).hasClass('current') ){
			return;
		}
		var form = $('form.product-per-page-form');
		var data = $(this).attr('data-perpage');
		form.find('select.perpage').val(data);
		form.submit();
	});
	
	/*** Select2 - Search by Category ***/
	if( typeof $.fn.select2 == 'function' ){
		$('.ts-search-by-category select.select-category').select2();
		
		var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

		$.fn.attrchange = function(callback) {
			if (MutationObserver) {
				var options = {
					subtree: false,
					attributes: true
				};

				var observer = new MutationObserver(function(mutations) {
					mutations.forEach(function(e) {
						callback.call(e.target, e.attributeName);
					});
				});

				return this.each(function() {
					observer.observe(this, options);
				});
			}
		}
		
		$('.ts-header .ts-search-by-category .select2-container').attrchange(function(attrName){
			if( attrName == 'class' ){
				if( $(this).hasClass('select2-container--open') ){
					$('body > .select2-container--open').addClass('category-dropdown');
					$('body > .select2-container--open').removeClass('sticky');
				}
				else{
					$('body > .select2-container--open').removeClass('category-dropdown');
				}
			}
		});
	}
	
	/*** Widget toggle ***/
	$('.widget-title-wrapper a.block-control').on('click', function(e){
		e.preventDefault();
		$(this).parent().siblings(':not(script)').slideToggle(400);
        $(this).toggleClass('active');
	});
	
	ts_widget_toggle();
	if( !on_touch ){
		$(window).on('resize', $.throttle(250, function(){
			ts_widget_toggle();
		}));
	}
	
	/* Image Lazy Load */
	if( $('img.ts-lazy-load').length ){
		$(window).on('scroll ts_lazy_load', function(){
			var scroll_top = $(this).scrollTop();
			var window_height = $(this).height();
			$('img.ts-lazy-load:not(.loaded)').each(function(){
				if( $(this).data('src') && $(this).offset().top < scroll_top + window_height + 900 ){
					$(this).attr('src', $(this).data('src')).addClass('loaded');
				}
			});
		});
		
		if( $('img.ts-lazy-load:first').offset().top < $(window).scrollTop() + $(window).height() + 200 ){
			$(window).trigger('ts_lazy_load');
		}
	}
	
	/* WooCommerce Quantity Increment */
	$( document ).on( 'click', '.plus, .minus', function() {
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		if ( $( this ).is( '.plus' ) ) {
			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}
		} else {
			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}
		}

		$qty.trigger( 'change' );
	});
	
	/* Ajax Search */
	if( typeof upstore_params != 'undefined' && upstore_params.ajax_search == 1 ){
		ts_ajax_search();
	}
	/* Search - Shopping Cart Sidebar */
	$(document).on('click', '.search-sidebar-icon .icon, .shopping-cart-wrapper .cart-control', function(e){
		$('.ts-floating-sidebar .close').trigger('click');
		var is_cart = $(this).is('.cart-control');
		if( is_cart ){
			if( $('#ts-shopping-cart-sidebar').length > 0 ){
				e.preventDefault();
				$('#ts-shopping-cart-sidebar').addClass('active');
				$('#page').addClass('floating-sidebar-active');
			}
		}
		else{
			$('#ts-search-sidebar').addClass('active');
			$('#page').addClass('floating-sidebar-active');
			setTimeout(function(){
				$('#ts-search-sidebar input[name="s"]').focus();
			}, 600);
		}
	});
	$('.ts-floating-sidebar .overlay, .ts-floating-sidebar .close').on('click', function(){
		$('.ts-floating-sidebar').removeClass('active');
		$('#page').removeClass('floating-sidebar-active');
		$('.top-filter-widget-area-button.show-sidebar a').removeClass('active');
	});
	if( $('body').hasClass('ts_desktop') && $('.ts-floating-sidebar').length > 0 ){
		var is_rtl = $('body').hasClass('rtl');
		var scrollbar_width = ts_get_scrollbar_width();
		if( !is_rtl ){
			$('.ts-floating-sidebar .ts-sidebar-content').css({'right': -scrollbar_width + 'px'});
		}
		else{
			$('.ts-floating-sidebar .ts-sidebar-content').css({'left': -scrollbar_width + 'px'});
		}
	}
	
	/* Add To Cart Effect */
	if( !$('body').hasClass('woocommerce-cart') ){
		$(document.body).on('adding_to_cart', function( e, $button, data ){
			if( wc_add_to_cart_params.cart_redirect_after_add == 'no' ){
				if( typeof upstore_params != 'undefined' && upstore_params.add_to_cart_effect == 'show_popup' && typeof $button != 'undefined' ){
					var product_id = $button.attr('data-product_id');
					var container = $('#ts-add-to-cart-popup-modal');
					container.addClass('adding');
					$.ajax({
						type : 'POST'
						,url : upstore_params.ajax_url	
						,data : {action : 'upstore_load_product_added_to_cart', product_id: product_id}
						,success : function(response){
							container.find('.add-to-cart-popup-content').html( response );
							if( container.hasClass('loading') ){
								container.removeClass('loading').addClass('show');
							}
							container.removeClass('adding');
						}
					});
				}
			}
		});
		
		$(document.body).on('added_to_cart', function( e, fragments, cart_hash, $button ){
			/* Show Cart Sidebar */
			if( typeof upstore_params != 'undefined' && upstore_params.show_cart_after_adding == 1 ){
				$('.shopping-cart-wrapper .cart-control').trigger('click');
				return;
			}
			/* Cart Fly Effect */
			if( typeof upstore_params != 'undefined' && typeof $button != 'undefined' ){
				if( upstore_params.add_to_cart_effect == 'fly_to_cart' ){
					var cart = $('.shopping-cart-wrapper');
					if( cart.length == 2 ){
						if( $(window).width() > 767 ){
							cart = $('.hidden-phone .shopping-cart-wrapper');
						}
						else{
							cart = $('.visible-phone.shopping-cart-wrapper');
						}
					}
					if( typeof cart != 'undefined' ){
						var product_img = $button.closest('section.product').find('figure img').eq(0);
						if( product_img.length == 1 ){
							var effect_time = 800;
							var cart_in_sticky = $('.is-sticky .shopping-cart-wrapper').length;
							if( cart_in_sticky ){
								effect_time = 500;
							}
							
							var imgclone_height = product_img.width()?150 * product_img.height() / product_img.width():150;
							var imgclone_small_height = product_img.width()?75 * product_img.height() / product_img.width():75;
							
							var imgclone = product_img.clone().offset({top: product_img.offset().top, left: product_img.offset().left})
								.css({'opacity': '0.6', 'position': 'absolute', 'height': imgclone_height + 'px', 'width': '150px', 'z-index': '99999999'})
								.appendTo($('body'))
								.animate({'top': cart.offset().top + cart.height()/2, 'left': cart.offset().left + cart.width()/2, 'width': 75, 'height': imgclone_small_height}, effect_time, 'linear');
							
							if( !cart_in_sticky ){
								$('body,html').animate({
									scrollTop: '0px'
								}, effect_time);
							}
							
							imgclone.animate({
								'width': 0
								,'height': 0
							}, function(){
								$(this).detach()
							});
						}
					}
				}
				if( upstore_params.add_to_cart_effect == 'show_popup' ){
					var container = $('#ts-add-to-cart-popup-modal');
					if( container.hasClass('adding') ){
						container.addClass('loading');
					}
					else{
						container.addClass('show');
					}
				}
			}
		});
	}
	
	/* Disable Ajax Remove Cart Item on Cart and Checkout page */
	if( $('body').hasClass('woocommerce-cart') || $('body').hasClass('woocommerce-checkout') ){
		$(document.body).off('click', '.remove_from_cart_button');
	}
	
	/* Top Filter Widget Area */
	$('.top-filter-widget-area-button a').on('click', function(){
		$(this).toggleClass('active');
		if( !$(this).parent().hasClass('show-sidebar') ){
			$('.top-filter-widget-area').slideToggle();
		}
		else{
			$('#ts-top-filter-widget-area-sidebar').toggleClass('active');
			$('#page').toggleClass('floating-sidebar-active');
		}
		return false;
	});
	
	/* Single post - Related posts - Gallery slider */
	ts_single_related_post_gallery_slider();
	
	/* Single Product - Variable Product options */
	$(document).on('click', '.variations_form .ts-product-attribute .option a', function(){
		var _this = $(this);
		var val = _this.closest('.option').data('value');
		var selector = _this.closest('.ts-product-attribute').siblings('select');
		if( selector.length > 0 ){
			if( selector.find('option[value="' + val + '"]').length > 0 ){
				selector.val(val).change();
				_this.closest('.ts-product-attribute').find('.option').removeClass('selected');
				_this.closest('.option').addClass('selected');
			}
		}
		return false;
	});
	
	$('.variations_form').on('click', '.reset_variations', function(){
		$(this).closest('.variations').find('.ts-product-attribute .option').removeClass('selected');
	});
	
	/* Product thumbnails slider */
	if( $('.single-product').length > 0 ){
		/* Horizontal slider */
		var wrapper = $('.single-product .product:not(.vertical-thumbnail) .images-thumbnails .thumbnails-container.loading');
		wrapper.find('.product-thumbnails').owlCarousel({
				loop: true
				,nav: true
				,navText: [,]
				,dots: false
				,navSpeed: 1000
				,rtl: $('body').hasClass('rtl')
				,margin: 20
				,navRewind: false
				,autoplay: true
				,autoplayHoverPause: true
				,autoplaySpeed: 1000
				,responsiveBaseElement: wrapper
				,responsiveRefreshRate: 1000
				,responsive:{0:{items:2},280:{items:3},400:{items:4},520:{items:5},650:{items:6}}
				,onInitialized: function(){
					wrapper.addClass('loaded').removeClass('loading');
				}
			});
			
		/* Vertical slider */
		var wrapper = $('.single-product .product.vertical-thumbnail .images-thumbnails .thumbnails-container.loading');
		
		if( wrapper.length > 0 && typeof $.fn.carouFredSel == 'function' ){
			var items = 3;
			
			var _slider_data = {
					items: items
					,direction: 'up'
					,width: 'auto'
					,height: '150px'
					,infinite: true
					,prev: wrapper.find('.owl-prev')
					,next: wrapper.find('.owl-next')
					,auto: {
						play: true
						,timeoutDuration: 5000
						,duration: 800
						,delay: 3000
						,items: 1
						,pauseOnHover: true
					}
					,scroll: {
						items: 1
					}
					,swipe: {
						onTouch: true
						,onMouse: true
					}
					,onCreate: function(){
						wrapper.addClass('loaded').removeClass('loading');
					}
				};
				
			wrapper.find('.product-thumbnails').carouFredSel(_slider_data);
			
			$(window).on('resize orientationchange', $.debounce( 250, function(){
				if( $(window).width() < 500 ){
					_slider_data.items = 2;
				}
				else{
					_slider_data.items = items;
				}
				wrapper.find('.product-thumbnails').trigger('configuration', _slider_data);
			} ));
			
			$(window).trigger('resize');
		}
	}
	
	/* Single Product Video */
	$('a.ts-product-video-button').on('click', function(e){
		e.preventDefault();
		var product_id = $(this).data('product_id');
		var container = $('#ts-product-video-modal');
		if( container.find('.product-video-content').html() ){
			container.addClass('show');
		}
		else{
			container.addClass('loading');
			$.ajax({
				type : 'POST'
				,url : upstore_params.ajax_url	
				,data : {action : 'upstore_load_product_video', product_id: product_id}
				,success : function(response){
					container.find('.product-video-content').html( response );
					container.removeClass('loading').addClass('show');
				}
			});
		}
	});
	
	/* Single product 360 */
	if( typeof $.fn.ThreeSixty == 'function' ){
		if( $('.ts-product-360-button').length == 0 ){
			setTimeout(function(){
				generate_product_360();
			}, 200);
		}
		
		$('.ts-product-360-button').on('click', function(){
			$('#ts-product-360-modal').addClass('loading');
			generate_product_360();
			return false;
		});
	}
	
	function generate_product_360(){
		if( !$('.ts-product-360').hasClass('loaded') ){
			$('.ts-product-360').ThreeSixty({
				currentFrame: 1
				,imgList: '.threesixty_images'
				,imgArray: _ts_product_360_image_array
				,totalFrames: _ts_product_360_image_array.length
				,endFrame: _ts_product_360_image_array.length
				,progress: '.spinner'
				,navigation: true
				,responsive: true
				,onReady: function(){
					$('#ts-product-360-modal').removeClass('loading').addClass('show');
					$('.ts-product-360').addClass('loaded');
				}
			});
		}
		else{
			$('#ts-product-360-modal').removeClass('loading').addClass('show');
		}
	}
	
	/* Related - Upsell - Crosssell products slider */
	$('.single-product .related .products, .single-product .upsells .products, .woocommerce .cross-sells .products').each(function(){
		var _this = $(this);
		if( _this.find('.product').length > 1 ){
			_this.owlCarousel({
				loop: true
				,nav: true
				,navText: [,]
				,dots: false
				,navSpeed: 1000
				,rtl: $('body').hasClass('rtl')
				,margin: 30
				,navRewind: false
				,responsiveBaseElement: _this
				,responsiveRefreshRate: 1000
				,responsive:{0:{items:1},345:{items:2},570:{items:3},871:{items:4},1400:{items:5}}
			});
		}
	});
	
	/* Single product scrolling */
	ts_scrolling_fixed($('.product.thumbnail-summary-scrolling > .images-thumbnails'), $('.product > .summary'));
	
	/* Single product top thumbnail slider */
	if( $('.single-product-top-thumbnail-slider').length > 0 ){
		setTimeout(function(){
			var slider_data = {
				loop: true
				,nav: true
				,navText: [,]
				,dots: false
				,navSpeed: 1000
				,center: true
				,rtl: $('body').hasClass('rtl')
				,margin: 30
				,navRewind: false
				,autoplay: true
				,autoplayHoverPause: true
				,responsive:{0:{items:1},768:{items:2}}
				,onInitialized: function(){
					$('.single-product-top-thumbnail-slider').removeClass('loading');
				}
			};
			$(document).trigger('single_product_top_thumbnail_slider_data', slider_data);
			$('.single-product-top-thumbnail-slider').owlCarousel(slider_data);
		}, 200);
		
		if( typeof wc_single_product_params.photoswipe_options != 'undefined' ){
			$('.woocommerce-product-gallery__image a img').on('mouseenter', function(){
				wc_single_product_params.photoswipe_options.index = parseInt($(this).attr('data-index'));
			});
		}
	}
	
	/* Background Video - Youtube Video */
	if( typeof $.fn.YTPlayer == 'function' ){
		$('.ts-youtube-video-bg').each(function(index, element){
			var selector = $(this);
			var poster = selector.data('poster');
			var property = selector.data('property') && typeof selector.data('property') == 'string' ? eval('(' + selector.data('property') + ')') : selector.data('property');
			
			if( ! on_touch ) {
				var player = selector.YTPlayer();
				
				player.on('YTPPlay', function(){
					selector.removeClass('pausing').addClass('playing');
					selector.closest('.vc_row').addClass('playing');
					if( poster ){
						selector.css({'background-image':''});
						selector.find('.mbYTP_wrapper').css({'opacity':1});
					}
				});
				
				player.on('YTPPause YTPEnd', function(){
					selector.removeClass('playing').addClass('pausing');
					selector.closest('.vc_row').removeClass('playing');
					if( poster ){
						selector.css({'background-image':'url(' + poster + ')'});
						selector.find('.mbYTP_wrapper').css({'opacity':0});
					}
				});
				
				player.on('YTPChanged', function(){
					if( !property.autoPlay && poster ){
						selector.css({'background-image':'url(' + poster + ')'});
					}
				});
			}
			else if( poster ) {
				selector.css({'background-image':'url(' + poster + ')'});
			}
		});
	}
	
	/* Background Video - Hosted Video */
	$('.ts-hosted-video-bg').each(function(){
		var selector = $(this);
		var video = selector.find('video');
		var video_dom = selector.find('video').get(0);
		if( video.hasClass('loop') ){
			video_dom.loop = true;
		}
		if( video.hasClass('muted') ){
			video_dom.muted = true;
		}
		
		var poster = selector.data('poster');
		if( poster ){
			selector.css({'background-image':'url(' + poster + ')'});
		}
		
		var control = selector.find('.video-control');
		control.on('click', function(){
			if( ! selector.hasClass('playing') ){
				video_dom.play();
				selector.css({'background-image':''});
				selector.removeClass('pausing').addClass('playing');
				selector.closest('.vc_row').addClass('playing');
			}
			else{
				video_dom.pause();
				if( poster ){
					selector.css({'background-image':'url(' + poster + ')'});
				}
				selector.removeClass('playing').addClass('pausing');
				selector.closest('.vc_row').removeClass('playing');
			}
		});
		if( ! on_touch ){
			selector.addClass('pausing');
			if( video.hasClass('autoplay') ){
				control.trigger('click');
			}
		}
	});
	
	/* Accordion - scroll to activated tab */
	$('.single-product .vc_tta-accordion .vc_tta-panel-heading').on('click', function(){
		if( $(this).parents('.vc_tta-panel').hasClass('vc_active') ){
			return;
		}
		var acc_header = $(this);
		var header_sticky = 0;
		if( !on_touch ){
			if( $('.is-sticky .header-sticky').length > 0 ){
				header_sticky = $('.is-sticky .header-sticky').height();
			}
			else if( typeof upstore_params != 'undefined' && upstore_params.sticky_header == 1 && $('.header-sticky').length > 0 ){
				header_sticky = $('.header-sticky').height();
			}
		}
		setTimeout(function(){
			$('body,html').animate({
				scrollTop: acc_header.offset().top - acc_header.height() - header_sticky
			}, 600);
		}, 600);
	});
	
	if( $('.woocommerce-tabs.accordion-tabs').length > 0 ){
		$('a.woocommerce-review-link').on('click', function(){
			var acc_header = $('#reviews').parents('.vc_tta-panel-body').siblings('.vc_tta-panel-heading');
			if( !acc_header.parents('.vc_tta-panel').hasClass('vc_active') ){
				setTimeout(function(){
					acc_header.trigger('click');
					acc_header.find('.vc_tta-panel-title a').trigger('click');
				}, 100);
			}
		});
	}
	
	/* Single Portfolio Scrolling */
	ts_scrolling_fixed($('.single-portfolio.left-thumbnail.gallery .thumbnails'), $('.single-portfolio .entry-content'));
	
	/* Single Portfolio Lightbox */
	if( typeof $.fn.prettyPhoto == 'function' ){
		$('.single-portfolio .thumbnails a[rel^="prettyPhoto"]').prettyPhoto({
			show_title: false
			,deeplinking: false
			,social_tools: false
		});
	}
	
	/* Single Portfolio Gallery */
	if( typeof $.fn.isotope == 'function' ){
		setTimeout(function(){
			$('.single-portfolio.gallery .thumbnails figure').isotope();
		}, 200);
	}
	
	/* Single Portfolio Slider */
	ts_generate_single_portfolio_slider();
	
	/* product deals on revolution */
	if( $('#block-deals-revolution').length > 0 ){
		$('#primary').css('position', 'relative');
		$('#block-deals-revolution').show();
	}
});

/*** Mega menu ***/
function ts_mega_menu_change_state(case_size){
	if( typeof case_size == 'undefined' ){
		var case_size = jQuery('body').innerWidth();
	}
	case_size += ts_get_scrollbar_width();
	
	/* Hide Group Meta Header */
	if( case_size <= 991 ){
		jQuery('.group-meta-header').hide();
		jQuery('.ts-header .header-top').removeClass('open');
		jQuery('.ts-group-meta-icon-toggle').removeClass('active');
		
		jQuery('.ts-group-meta-icon-toggle').off('click');
		jQuery('.ts-group-meta-icon-toggle').on('click', function(){
			jQuery('.group-meta-header').slideToggle(300);
			jQuery('.ts-header .header-top').toggleClass('open');
			jQuery(this).toggleClass('active');
		});
	}
	/* Reset dropdown icon class on Ipad */
	jQuery('.ts-menu-drop-icon').removeClass('active');
	
	if( case_size > 767 ){
	
		var padding_left = 0, container_width = 0;
		var container = jQuery('.header-sticky > .container');
		var container_stretch = jQuery('.header-sticky');
		if( container.length <= 0 ){
			container = jQuery('.header-sticky');
			if( container.length <= 0 ){
				return;
			}
			container_width = container.outerWidth();
		}
		else{
			container_width = container.width();
			padding_left = parseInt(container.css('padding-left'));
		}
		var container_offset = container.offset();
		
		var container_stretch_width = container_stretch.outerWidth();
		var container_stretch_offset = container_stretch.offset();
		
		setTimeout(function(){
			jQuery('.ts-menu nav.main-menu > ul.menu > .ts-megamenu-fullwidth').each(function(index, element){
				var current_offset = jQuery(element).offset();
				if( jQuery(element).hasClass('ts-megamenu-fullwidth-stretch') ){
					var left = current_offset.left - container_stretch_offset.left;
					jQuery(element).children('ul.sub-menu').css({'width':container_stretch_width+'px','left':-left+'px','right':'auto'});
				}
				else{
					var left = current_offset.left - container_offset.left - padding_left;
					jQuery(element).children('ul.sub-menu').css({'width':container_width+'px','left':-left+'px','right':'auto'});
				}
			});
			
			jQuery('.ts-menu nav.main-menu > ul.menu').children('.ts-megamenu-columns-1, .ts-megamenu-columns-2, .ts-megamenu-columns-3, .ts-megamenu-columns-4').each(function(index, element){	
				jQuery(element).children('ul.sub-menu').css({'max-width':container_width+'px'});
				var sub_menu_width = jQuery(element).children('ul.sub-menu').outerWidth();
				var item_width = jQuery(element).outerWidth();
				jQuery(element).children('ul.sub-menu').css({'left':'-'+(sub_menu_width/2 - item_width/2)+'px','right':'auto'});
				
				var container_left = container_offset.left;
				var container_right = container_left + container_width;
				var item_left = jQuery(element).offset().left;
				
				var overflow_left = (sub_menu_width/2 > (item_left + item_width/2 - container_left));
				var overflow_right = ((sub_menu_width/2 + item_left + item_width/2) > container_right);
				if( overflow_left ){
					var left = item_left - container_left - padding_left;
					jQuery(element).children('ul.sub-menu').css({'left':-left+'px','right':'auto'});
				}
				if( overflow_right && !overflow_left ){
					var left = item_left - container_left - padding_left;
					left = left - ( container_width - sub_menu_width );
					jQuery(element).children('ul.sub-menu').css({'left':-left+'px','right':'auto'});
				}
			});
			
			/* Remove hide class after loading */
			jQuery('ul.menu li.menu-item').removeClass('hide');
			
		},800);
		
	}
	else{ /* Mobile menu action */
		jQuery('.ic-mobile-menu-button').off('click');
		jQuery('.ic-mobile-menu-button').on('click', function(){
			jQuery('#page').addClass('menu-mobile-active');
		});
		
		jQuery('.ic-mobile-menu-close-button').off('click');
		jQuery('.ic-mobile-menu-close-button').on('click', function(){
			jQuery('#page').removeClass('menu-mobile-active');
		});
		
		jQuery('#wpadminbar').css('position', 'fixed');
		
		/* Remove hide class after loading */
		jQuery('ul.menu li.menu-item').removeClass('hide');
	}
	
}

function ts_menu_action_on_ipad(){
	/* Vertical Menu Heading */
	jQuery('.vertical-menu-heading').on('click',function(){
		
		var is_active = jQuery(this).hasClass('active');
		var vertical_menu = jQuery(this).siblings('.vertical-menu');
		
		jQuery('.ts-menu nav.main-menu .sub-menu').hide();
		jQuery('.ts-menu nav.main-menu li.menu-item').removeClass('active');
		jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').removeClass('active');
		
		if( vertical_menu.length > 0 ){
			if( is_active ){
				vertical_menu.fadeOut(250);
				jQuery(this).removeClass('active');
			}
			else{
				vertical_menu.fadeIn(250);
				jQuery(this).addClass('active');
			}
		}
	});
	
	/* Vertical Menu Drop Icon */
	jQuery('.vertical-menu-wrapper .ts-menu-drop-icon').on('click', function(){
		
		var is_active = jQuery(this).hasClass('active');
		var sub_menu = jQuery(this).siblings('.sub-menu');
		
		jQuery('.ts-menu nav.main-menu .sub-menu').hide();
		jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').removeClass('active');
		jQuery('.ts-menu nav.main-menu li.menu-item').removeClass('active');
		
		jQuery('.ts-menu nav.vertical-menu .ts-menu-drop-icon').removeClass('active');
		jQuery('.ts-menu nav.vertical-menu .sub-menu').hide();
		
		jQuery(this).parents('.sub-menu').show();
		
		if( sub_menu.length > 0 ){
			if( is_active ){
				sub_menu.fadeOut(250);
				jQuery(this).removeClass('active');
			}
			else{
				sub_menu.fadeIn(250);
				jQuery(this).addClass('active');
			}
			jQuery(this).parents('.sub-menu').siblings('.ts-menu-drop-icon').addClass('active');
		}
	});
	
	/* Main Menu Drop Icon */
	jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').on('click', function(){
		
		var is_active = jQuery(this).hasClass('active');
		var sub_menu = jQuery(this).siblings('.sub-menu');
		
		jQuery('.vertical-menu-heading').removeClass('active');
		jQuery('.vertical-menu-wrapper > .vertical-menu').hide();
		jQuery('.ts-menu nav.vertical-menu .ts-menu-drop-icon').removeClass('active');
		jQuery('.ts-menu nav.vertical-menu .sub-menu').hide();
		
		jQuery('.ts-menu nav.main-menu .ts-menu-drop-icon').removeClass('active');
		jQuery('.ts-menu nav.main-menu li.menu-item').removeClass('active');
		jQuery('.ts-menu nav.main-menu .sub-menu').hide();
		
		jQuery(this).parents('.sub-menu').show();
		
		if( sub_menu.length > 0 ){
			if( is_active ){
				sub_menu.fadeOut(250);
				jQuery(this).removeClass('active');
				jQuery(this).parent().removeClass('active');
			}
			else{
				sub_menu.fadeIn(250);
				jQuery(this).addClass('active');
				jQuery(this).parent().addClass('active');
			}
			jQuery(this).parents('.sub-menu').siblings('.ts-menu-drop-icon').addClass('active');
		}
	});
	
	/* Mobile Menu Drop Icon */
	jQuery('.ts-menu nav.mobile-menu .sub-menu').hide();
	jQuery('.ts-menu nav.mobile-menu .ts-menu-drop-icon').on('click', function(){
		var is_active = jQuery(this).hasClass('active');
		var sub_menu = jQuery(this).siblings('.sub-menu');
		
		if( is_active ){
			sub_menu.slideUp(250);
			sub_menu.find('.sub-menu').hide();
			sub_menu.find('.ts-menu-drop-icon').removeClass('active');
		}
		else{
			sub_menu.slideDown(250);
		}
		jQuery(this).toggleClass('active');
	});
	
}

/*** End Mega menu ***/
function ts_get_scrollbar_width() {
    var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
        $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
        inner = $inner[0],
        outer = $outer[0];
     
    jQuery('body').append(outer);
    var width1 = inner.offsetWidth;
    $outer.css('overflow', 'scroll');
    var width2 = outer.clientWidth;
    $outer.remove();
 
    return (width1 - width2);
}

/*** Sticky Menu ***/
function ts_sticky_menu(){	
	if( jQuery(window).width() > 1200 ){
		var top_spacing = 0;
		if( jQuery('body').hasClass('logged-in') && jQuery('body').hasClass('admin-bar') && jQuery('#wpadminbar').length > 0 ){
			top_spacing = jQuery('#wpadminbar').height();
		}
		var top_begin = jQuery('header.ts-header').height() + 100;
		if( jQuery('body').hasClass('display-vertical-menu') && jQuery('nav.vertical-menu').length > 0 ){
			top_begin += jQuery('nav.vertical-menu').height();
		}
		
		setTimeout( function(){
			jQuery('.header-sticky').sticky({
					topSpacing: top_spacing
					,topBegin: top_begin
					,scrollOnTop : function (){
						ts_mega_menu_change_state();
						jQuery('body > .select2-container--open').removeClass('sticky');
					}
					,scrollOnBottom : function (){
						ts_mega_menu_change_state();
						jQuery('body > .select2-container--open').addClass('sticky');
					}					
				});
		}, 200);
	}
}

/*** Custom Wishlist ***/
function ts_update_tini_wishlist(){
	if( typeof upstore_params == 'undefined' ){
		return;
	}
		
	var wishlist_wrapper = jQuery('.my-wishlist-wrapper');
	if( wishlist_wrapper.length == 0 ){
		return;
	}
	
	wishlist_wrapper.addClass('loading');
	
	jQuery.ajax({
		type : 'POST'
		,url : upstore_params.ajax_url
		,data : {action : 'upstore_update_tini_wishlist'}
		,success : function(response){
			var first_icon = wishlist_wrapper.children('i.fa:first');
			wishlist_wrapper.html(response);
			if( first_icon.length > 0 ){
				wishlist_wrapper.prepend(first_icon);
			}
			wishlist_wrapper.removeClass('loading');
		}
	});
}

/*** End Custom Wishlist***/

/*** Set Cloud Zoom ***/
function ts_set_cloud_zoom(){
	jQuery('.cloud-zoom-wrap .cloud-zoom-big').remove();
	jQuery('.cloud-zoom, .cloud-zoom-gallery').off('click');
	var clz_width = jQuery('.cloud-zoom, .cloud-zoom-gallery').width();
	var clz_img_width = jQuery('.cloud-zoom, .cloud-zoom-gallery').children('img').width();
	var cl_zoom = jQuery('.cloud-zoom, .cloud-zoom-gallery').not('.on_pc');
	var temp = (clz_width-clz_img_width)/2;
	if(cl_zoom.length > 0 ){
		cl_zoom.data('zoom',null).siblings('.mousetrap').off().remove();
		cl_zoom.CloudZoom({ 
			adjustX:temp	
		});
	}
}

/*** Widget toggle ***/
function ts_widget_toggle(){
	if( typeof upstore_params != 'undefined' && upstore_params.responsive == 0 ){
		return;
	}
	jQuery('.wpb_widgetised_column .widget-title-wrapper a.block-control, .footer-container .widget-title-wrapper a.block-control, .filter-widget-area > section .widget-title-wrapper a.block-control').remove();
	var window_width = jQuery(window).width();
	window_width += ts_get_scrollbar_width();
	if( window_width >= 768 ){
		jQuery('.widget-title-wrapper a.block-control').removeClass('active').hide();
		jQuery('.widget-title-wrapper a.block-control').parent().siblings(':not(script)').show();
	}
	else{
		jQuery('.widget-title-wrapper a.block-control').removeClass('active').show();
		jQuery('.widget-title-wrapper a.block-control').parent().siblings(':not(script)').hide();
		jQuery('.wpb_widgetised_column .widget-title-wrapper, .footer-container .widget-title-wrapper, .filter-widget-area > section .widget-title-wrapper').siblings(':not(script)').show();
	}
}

/*** Ajax search ***/
function ts_ajax_search(){
	var search_string = '';
	var search_previous_string = '';
	var search_timeout;
	var search_delay = 500;
	var search_input;
	var search_cache_data = {};
	jQuery('body').append('<div id="ts-search-result-container" class="ts-search-result-container"></div>');
	var search_result_container = jQuery('#ts-search-result-container');
	var search_result_container_sidebar = jQuery('#ts-search-sidebar .ts-search-result-container');
	var is_sidebar = false;
	
	jQuery('.ts-header .search-content input[name="s"], #ts-search-sidebar input[name="s"]').on('keyup', function(e){
		is_sidebar = jQuery(this).parents('#ts-search-sidebar').length > 0;
		search_input = jQuery(this);
		search_result_container.hide();
		
		search_string = jQuery(this).val().trim();
		if( search_string.length < 2 ){
			search_input.parents('.search-content').removeClass('loading');
			return;
		}
		
		if( search_cache_data[search_string] ){
			if( !is_sidebar ){
				search_result_container.html(search_cache_data[search_string]);
				search_result_container.show();
			}
			else{
				search_result_container_sidebar.html(search_cache_data[search_string]);
			}
			search_previous_string = '';
			search_input.parents('.search-content').removeClass('loading');
			
			if( !is_sidebar ){
				search_result_container.find('.view-all-wrapper a').on('click', function(e){
					e.preventDefault();
					search_input.parents('form').submit();
				});
			}
			else{
				search_result_container_sidebar.find('.view-all-wrapper a').on('click', function(e){
					e.preventDefault();
					search_input.parents('form').submit();
				});
			}
			
			return;
		}
		
		clearTimeout(search_timeout);
		search_timeout = setTimeout(function(){
			if( search_string == search_previous_string || search_string.length < 2 ){
				return;
			}
			
			search_previous_string = search_string;
		
			search_input.parents('.search-content').addClass('loading');
			
			/* check category */
			var category = '';
			var select_category = search_input.parents('.search-content').siblings('.select-category');
			if( select_category.length > 0 ){
				category = select_category.find(':selected').val();
			}
			
			jQuery.ajax({
				type : 'POST'
				,url : upstore_params.ajax_url
				,data : {action : 'upstore_ajax_search', search_string: search_string, category: category}
				,error : function(xhr,err){
					search_input.parents('.search-content').removeClass('loading');
				}
				,success : function(response){
					if( response != '' ){
						response = JSON.parse(response);
						if( response.search_string == search_string ){
							search_cache_data[search_string] = response.html;
							if( !is_sidebar ){
								search_result_container.html(response.html);
								var top = search_input.offset().top + search_input.outerHeight(true);
								var left = Math.ceil(search_input.offset().left);
								var width = search_input.outerWidth(true);
								var border_width = parseInt(search_input.parent('.search-content').css('border-left-width'));
								left -= border_width;
								width += border_width;
								if( width < 300 ){
									width = 300;
								}
								
								window_width = jQuery(window).width(); /* Overflow window */
								if( (left + width) > window_width ){
									left -= (width - search_input.outerWidth(true));
								}
								
								search_result_container.css({
									'position': 'absolute'
									,'top': top
									,'left': left
									,'width': width
									,'display': 'block'
								});
							}
							else{
								search_result_container_sidebar.html(response.html);
							}
							
							search_input.parents('.search-content').removeClass('loading');
							
							if( !is_sidebar ){
								search_result_container.find('.view-all-wrapper a').on('click', function(e){
									e.preventDefault();
									search_input.parents('form').submit();
								});
							}
							else{
								search_result_container_sidebar.find('.view-all-wrapper a').on('click', function(e){
									e.preventDefault();
									search_input.parents('form').submit();
								});
							}
						}
					}
					else{
						search_input.parents('.search-content').removeClass('loading');
					}
				}
			});
		}, search_delay);
	});
	
	search_result_container.on('mouseleave', function(){
		search_result_container.hide();
	});
	
	jQuery('body').on('click', function(){
		search_result_container.hide();
	});
	
	jQuery('.ts-search-by-category select.select-category').on('change', function(){
		search_previous_string = '';
		search_cache_data = {};
		jQuery(this).parents('.ts-search-by-category').find('.search-content input[name="s"]').trigger('keyup');
	});
}

/*** Single post - Related posts - Gallery slider ***/
function ts_single_related_post_gallery_slider(){
	if( jQuery('.single-post figure.gallery, .list-posts .post-item .gallery figure, .ts-blogs-widget .thumbnail.gallery figure').length > 0 ){
		var _this = jQuery('.single-post figure.gallery, .list-posts .post-item .gallery figure, .ts-blogs-widget .thumbnail.gallery figure');
		var slider_data = {
			items: 1
			,loop: true
			,nav: false
			,animateIn: 'fadeIn'
			,animateOut: 'fadeOut'
			,navText: [,]
			,navSpeed: 1000
			,rtl: jQuery('body').hasClass('rtl')
			,margin: 10
			,navRewind: false
			,autoplay: true
			,autoplayTimeout: 4000
			,autoplayHoverPause: true
			,autoplaySpeed: false
			,autoHeight: true
			,mouseDrag: false
			,responsive:{0:{items:1}}
			,onInitialized: function(){
				_this.removeClass('loading');
				_this.parent('.gallery').addClass('loaded').removeClass('loading');
			}
		};
		_this.each(function(){
			var validate_slider = true;
			
			if( jQuery(this).find('img').length <= 1 ){
				validate_slider = false;
			}
			
			if( validate_slider ){
				jQuery(this).owlCarousel(slider_data);
			}
			else{
				jQuery(this).removeClass('loading');
				jQuery(this).parent('.gallery').removeClass('loading');
			}
		});
	}
	
	if( jQuery('.single-post .related-posts.loading').length > 0 ){
		var _this = jQuery('.single-post .related-posts.loading');
		var slider_data = {
			loop: true
			,nav: true
			,navText: [,]
			,dots: false
			,navSpeed: 1000
			,rtl: jQuery('body').hasClass('rtl')
			,margin : 30
			,navRewind: false
			,responsiveBaseElement: _this
			,responsiveRefreshRate: 400
			,responsive:{0:{items:1},640:{items:2},1150:{items:3},1400:{items:4}}
			,onInitialized: function(){
				_this.addClass('loaded').removeClass('loading');
			}
		};
		_this.find('.content-wrapper .blogs').owlCarousel(slider_data);
	}
	
}

/*** Single Portfolio Slider ***/
function ts_generate_single_portfolio_slider(){
	if( jQuery('.single-portfolio.slider .thumbnails figure img').length > 1 ){
		var wrapper = jQuery('.single-portfolio.slider');
		var element = jQuery('.single-portfolio.slider .thumbnails figure');
		var center  = (wrapper.hasClass('center') || wrapper.hasClass('center-fullwidth')) && wrapper.hasClass('top-thumbnail');
		var items   = center?2:1;
		element.owlCarousel({
					items: items
					,center: center
					,loop: true
					,nav: true
					,navText: [,]
					,dots: false
					,navSpeed: 1000
					,rtl: jQuery('body').hasClass('rtl')
					,navRewind: false
					,autoplay: true
					,autoplayHoverPause: true
					,onInitialized: function(){
						wrapper.find('.thumbnails').addClass('loaded').removeClass('loading');
					}
				});
	}
	else{
		jQuery('.single-portfolio.slider .thumbnails').removeClass('loading');
	}
}

/*** Scrolling Fixed ***/
function ts_scrolling_fixed(scrolling_element, fixed_element){
	if( scrolling_element.length == 0 || fixed_element.length == 0 || jQuery(window).width() < 768
		|| fixed_element.height() >= scrolling_element.height() ){
		return;
	}
	
	var fixed_left = fixed_element.offset().left;
	var fixed_width = fixed_element.outerWidth();
	var admin_bar_height = jQuery('#wpadminbar').length > 0?jQuery('#wpadminbar').outerHeight():0;
	var window_height = jQuery(window).height();
	
	jQuery(window).on('scroll', function(){
		var window_scroll_top = jQuery(this).scrollTop();
		var sticky_height = 0;
		if( jQuery('.is-sticky .header-sticky').length > 0 ){
			sticky_height = jQuery('.is-sticky .header-sticky').outerHeight();
		}
		
		var fixed_height = fixed_element.height();
		var scrolling_height = scrolling_element.height();
		var scrolling_top = scrolling_element.offset().top;
		var start_scroll = fixed_height > window_height?fixed_height - window_height:0;
		
		if( window_scroll_top > scrolling_top + start_scroll ){
			var top = sticky_height + admin_bar_height + 20;
			if( start_scroll ){
				top = -start_scroll;
			}
			if( window_scroll_top + top + fixed_height > scrolling_top + scrolling_height ){
				top = scrolling_height - fixed_height + scrolling_top - window_scroll_top;
			}
			fixed_element.css({'position': 'fixed', 'left': fixed_left, 'top': top, 'width': fixed_width});
		}
		else{
			fixed_element.attr('style', '');
		}
	});
}