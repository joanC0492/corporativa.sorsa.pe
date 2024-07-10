<?php 
/*** Tiny account ***/
if( !function_exists('upstore_tiny_account') ){
	function upstore_tiny_account(){
		$login_url = '#';
		$register_url = '#';
		$profile_url = '#';
		$logout_url = wp_logout_url(get_permalink());
		
		if( class_exists('WooCommerce') ){
			$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
			  $login_url = get_permalink( $myaccount_page_id );
			  $register_url = $login_url;
			  $profile_url = $login_url;
			}		
		}
		else{
			$login_url = wp_login_url();
			$register_url = wp_registration_url();
			$profile_url = admin_url( 'profile.php' );
		}
		
		$_user_logged = is_user_logged_in();
		ob_start();
		
		?>
		<div class="ts-tiny-account-wrapper">
			<div class="account-control">
				<?php if( !$_user_logged ): ?>
					<a  class="login" href="<?php echo esc_url($login_url); ?>" title="<?php esc_attr_e('Login', 'upstore'); ?>"><span><?php esc_html_e('Login', 'upstore'); ?></span></a>
					 / 
					<a class="sign-up" href="<?php echo esc_url($register_url); ?>" title="<?php esc_attr_e('Create New Account', 'upstore'); ?>"><span><?php esc_html_e('Sign up', 'upstore'); ?></span></a>
				<?php else: ?>
					<a class="my-account" href="<?php echo esc_url($profile_url); ?>" title="<?php esc_attr_e('My Account', 'upstore'); ?>"><span><?php esc_html_e('My Account', 'upstore'); ?></span></a> / 
					<a class="log-out" href="<?php echo esc_url($logout_url); ?>" title="<?php esc_attr_e('Logout', 'upstore'); ?>"><span><?php esc_html_e('Logout', 'upstore'); ?></span></a>
				<?php endif; ?>
			</div>
			<?php if( !$_user_logged && !upstore_get_theme_options('ts_login_registration_popup') ): ?>
			<div class="account-dropdown-form dropdown-container">
				<div class="form-content">	
					<?php wp_login_form( array('form_id' => 'ts-login-form', 'remember' => false, 'label_username' => __('Username', 'upstore'), 'label_log_in' => __('Login', 'upstore')) ); ?>
		
					<p class="forgot-pass"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>" title="<?php esc_attr_e('Forgot Your Password?', 'upstore'); ?>"><?php esc_html_e('Forgot Your Password?','upstore'); ?></a></p>
				</div>
			</div>
			<?php endif; ?>
		</div>
		
		<?php
		return ob_get_clean();
	}
}

if( !function_exists('upstore_tiny_account_popup') ){
	function upstore_tiny_account_popup(){
		if( !class_exists('WooCommerce') ){
			return;
		}
		$show_popup = upstore_get_theme_options('ts_login_registration_popup') && upstore_get_theme_options('ts_enable_tiny_account');
		if( is_account_page() || is_user_logged_in() || wp_is_mobile() ){
			$show_popup = false;
		}
		if( $show_popup ){
			if( wp_script_is('wc-password-strength-meter', 'registered') ){
				wp_enqueue_script('wc-password-strength-meter');
			}
			
			if( !isset($_POST['username']) && !isset($_POST['email']) ){
				remove_action( 'woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10 );
			}
			
			$has_registration = get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes';
		?>
		<div id="ts-account-modal" class="ts-popup-modal <?php echo !$has_registration?'no-registration':''; ?>">
			<div class="overlay"></div>
			<div class="account-container popup-container">
				<span class="close"><?php esc_html_e('Close', 'upstore'); ?><i class="fa fa-close"></i></span>
				<div class="account-content">
					<?php echo do_shortcode('[woocommerce_my_account]'); ?>
				</div>
			</div>
		</div>
		<?php
		}
	}
}

/*** Tiny Cart ***/
if( !function_exists('upstore_tiny_cart') ){
	function upstore_tiny_cart( $show_cart_control = true, $show_cart_dropdown = true ){
		if( !class_exists('WooCommerce') ){
			return '';
		}
		$cart_empty = WC()->cart->is_empty();
		$cart_url = wc_get_cart_url();
		$checkout_url = wc_get_checkout_url();
		$cart_number = WC()->cart->get_cart_contents_count();
		ob_start();
		?>
			<div class="ts-tiny-cart-wrapper">
				<?php if( $show_cart_control ): ?>
					<a class="cart-control" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_attr_e('View your shopping bag', 'upstore'); ?>">
						<span class="ic-cart"><i class="fa fa-shopping-cart"></i></span>
						<span class="cart-number"><?php echo esc_html($cart_number) ?></span>
					</a>
					<?php if( $show_cart_dropdown ): ?>
						<span class="cart-drop-icon drop-icon"></span>
					<?php endif; ?>
				<?php endif; ?>
				<?php if( $show_cart_dropdown ): ?>
				<div class="cart-dropdown-form dropdown-container">
					<div class="form-content">
						<?php if( $cart_empty ): ?>
							<label><?php esc_html_e('Your shopping cart is empty', 'upstore'); ?></label>
						<?php else: ?>
							<span class="cart-number"><?php echo sprintf( _n('%d item in the shopping bag', '%d items in the shopping bag', $cart_number, 'upstore'), $cart_number ) ?></span>
							<ul class="cart_list">
								<?php 
								$cart = WC()->cart->get_cart();
								foreach( $cart as $cart_item_key => $cart_item ):
									$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									if ( !( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) ){
										continue;
									}
										
									$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
									<li class="woocommerce-mini-cart-item">
										<a href="<?php echo esc_url($product_permalink); ?>">
											<?php echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
										</a>
										<div class="cart-item-wrapper">	
											<h3 class="product-name">
												<a href="<?php echo esc_url($product_permalink); ?>">
													<?php echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key); ?>
												</a>
											</h3>
											<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . $cart_item['quantity'] . '</span> ', $cart_item, $cart_item_key ); ?>
											<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price"><span class="icon"> x </span> ' . $product_price . '</span>', $cart_item, $cart_item_key ); ?>
											<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-cart_item_key="%s">&times;</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'upstore' ), $cart_item_key ), $cart_item_key ); ?>
										</div>
									</li>
								
								<?php endforeach; ?>
							</ul>
							<div class="dropdown-footer">
								<div class="total"><span class="total-title"><?php esc_html_e('Subtotal : ', 'upstore');?></span><?php echo WC()->cart->get_cart_subtotal(); ?> </div>
								
								<a href="<?php echo esc_url($cart_url); ?>" class="button button-border view-cart"><?php esc_html_e('View your cart', 'upstore'); ?></a>
								<a href="<?php echo esc_url($checkout_url); ?>" class="button button-special button-checkout"><?php esc_html_e('Proceed to checkout', 'upstore'); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		<?php
		return ob_get_clean();
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'upstore_tiny_cart_filter');
function upstore_tiny_cart_filter($fragments){
	$cart_sidebar = upstore_get_theme_options('ts_shopping_cart_sidebar');
	$fragments['.ts-tiny-cart-wrapper'] = upstore_tiny_cart(true, !$cart_sidebar);
	if( $cart_sidebar ){
		$fragments['#ts-shopping-cart-sidebar .ts-tiny-cart-wrapper'] = upstore_tiny_cart(false, true);
	}
	return $fragments;
}

/** Tini wishlist **/
function upstore_tini_wishlist(){
	if( !(class_exists('WooCommerce') && class_exists('YITH_WCWL')) ){
		return;
	}
	
	ob_start();
	
	$wishlist_page_id = get_option( 'yith_wcwl_wishlist_page_id' );
	if( function_exists( 'wpml_object_id_filter' ) ){
		$wishlist_page_id = wpml_object_id_filter( $wishlist_page_id, 'page', true );
	}
	$wishlist_page = get_permalink( $wishlist_page_id );
	
	$count = yith_wcwl_count_products();
	
	?>

	<a title="<?php esc_attr_e('Wishlist', 'upstore'); ?>" href="<?php echo esc_url($wishlist_page); ?>" class="tini-wishlist">
		<?php esc_html_e('Wishlist', 'upstore'); ?> <?php echo '('.($count > 0?zeroise($count, 2):'0').')'; ?>
	</a>

	<?php
	$tini_wishlist = ob_get_clean();
	return $tini_wishlist;
}

function upstore_update_tini_wishlist() {
	die(upstore_tini_wishlist());
}

add_action('wp_ajax_upstore_update_tini_wishlist', 'upstore_update_tini_wishlist');
add_action('wp_ajax_nopriv_upstore_update_tini_wishlist', 'upstore_update_tini_wishlist');

if( !function_exists('upstore_woocommerce_multilingual_currency_switcher') ){
	function upstore_woocommerce_multilingual_currency_switcher(){
		if( class_exists('woocommerce_wpml') && class_exists('WooCommerce') && class_exists('SitePress') ){
			global $sitepress, $woocommerce_wpml;
			
			if( !isset($woocommerce_wpml->multi_currency) ){
				return;
			}
			
			$settings = $woocommerce_wpml->get_settings();
			
			$format = isset($settings['wcml_curr_template']) && $settings['wcml_curr_template'] != '' ? $settings['wcml_curr_template']:'%code%';
			$wc_currencies = get_woocommerce_currencies();
			if( !isset($settings['currencies_order']) ){
				$currencies = $woocommerce_wpml->multi_currency->get_currency_codes();
			}else{
				$currencies = $settings['currencies_order'];
			}
			
			$selected_html = '';
			foreach( $currencies as $currency ){
				if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
					$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
													array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						
					if( $currency == $woocommerce_wpml->multi_currency->get_client_currency() ){
						$selected_html = '<a href="javascript: void(0)" class="wcml_selected_currency wcml-cs-active-currency">'.$currency_format.'</a>';
						break;
					}
				}
			}
			
			echo '<div class="wcml_currency_switcher">';
				echo wp_kses_post($selected_html);
				echo '<ul>';
			
				foreach( $currencies as $currency ){
					if($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ){
						$currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),
														array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);
						echo '<li><a rel="' . $currency . '">' . $currency_format . '</a></li>';
					}
				}
				
				echo '</ul>';
			echo '</div>';
		}
		else if( class_exists('WOOCS') && class_exists('WooCommerce') ){ /* Support WooCommerce Currency Switcher */
			global $WOOCS;
			$currencies = $WOOCS->get_currencies();
			if( !is_array($currencies) ){
				return;
			}
			?>
			<div class="wcml_currency_switcher">
				<a href="javascript: void(0)" class="wcml_selected_currency wcml-cs-active-currency"><?php echo esc_html($WOOCS->current_currency); ?></a>
				<ul>
					<?php 
					foreach( $currencies as $key => $currency ){
						$link = add_query_arg('currency', $currency['name']);
						echo '<li rel="'.$currency['name'].'"><a href="'.esc_url($link).'">'.esc_html($currency['name']).'</a></li>';
					}
					?>
				</ul>
			</div>
			<?php
		}else{
			do_action('upstore_header_currency_switcher'); /* Allow use another currency switcher */
		}
	}
}

add_filter( 'wcml_multi_currency_ajax_actions', 'upstore_wcml_multi_currency_ajax_actions_filter' );
if( !function_exists('upstore_wcml_multi_currency_ajax_actions_filter') ){
	function upstore_wcml_multi_currency_ajax_actions_filter( $actions ){
		$actions[] = 'remove_from_wishlist';
		$actions[] = 'upstore_ajax_search';
		$actions[] = 'upstore_load_quickshop_content';
		$actions[] = 'ts_get_product_content_in_category_tab';
		return $actions;
	}
}

if( !function_exists('upstore_wpml_language_selector') ){
	function upstore_wpml_language_selector(){
		if( class_exists('SitePress') ){
			do_action('wpml_add_language_selector');
		}
		else{
			do_action('upstore_header_language_switcher'); /* Allow use another language switcher */
		}
	}
}
?>