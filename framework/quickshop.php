<?php 
if( class_exists('WooCommerce') && !class_exists('Upstore_Quickshop') && !wp_is_mobile() ){
		
	class Upstore_Quickshop{
	
		public $id;
		
		function __construct(){
			add_action('init', array($this, 'add_hook'));
			add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 1000);
		}
		
		function register_scripts(){
			if( upstore_get_theme_options('ts_enable_quickshop') ){
				wp_enqueue_script( 'wc-add-to-cart-variation' );
			}
		}
		
		function add_quickshop_button(){
			global $product;
			echo '<div class="button-in quickshop">';
			echo '<a class="quickshop" href="#" data-product_id="'.$product->get_id().'"><i class="fa fa-search"></i><span class="ts-tooltip button-tooltip">'.esc_html__('Quick view', 'upstore').'</span></a>';
			echo '</div>';
		}
		
		function add_hook(){
			$theme_options = upstore_get_theme_options();
			if( empty($theme_options['ts_enable_quickshop']) ){
				return;
			}
			
			add_action('wp_footer', array($this, 'add_quickshop_modal'), 999);
			
			add_action('woocommerce_after_shop_loop_item_title', array($this, 'add_quickshop_button'), 10001 );
			
			/** Product content hook **/
			if( $theme_options['ts_prod_title'] ){
				add_action('upstore_quickshop_single_product_title', array($this, 'product_title'), 10);
			}
			if( $theme_options['ts_prod_sku'] ){
				add_action('upstore_quickshop_single_product_summary', 'upstore_template_single_sku', 10);
			}
			if( $theme_options['ts_prod_availability'] ){
				add_action('upstore_quickshop_single_product_summary', 'upstore_template_single_availability', 20);
			}
			if( $theme_options['ts_prod_rating'] ){
				add_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_rating', 30);
			}
			if( $theme_options['ts_prod_email_button'] ){
				add_action('upstore_quickshop_single_product_summary', 'upstore_template_single_email_button', 35);
			}
			if( $theme_options['ts_prod_price'] ){
				add_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_price', 40);
			}
			else{
				remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);
			}
			if( $theme_options['ts_prod_excerpt'] ){
				add_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_excerpt', 50);
			}
			if( $theme_options['ts_prod_add_to_cart'] && !$theme_options['ts_enable_catalog_mode'] ){
				add_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_add_to_cart', 60); 
			}
			if( function_exists('upstore_add_wishlist_button_to_product_list') ){
				add_action('upstore_quickshop_single_product_summary', 'upstore_add_wishlist_button_to_product_list', 70);
			}
			
			/* Register ajax */
			add_action('wp_ajax_upstore_load_quickshop_content', array( $this, 'load_quickshop_content_callback') );
			add_action('wp_ajax_nopriv_upstore_load_quickshop_content', array( $this, 'load_quickshop_content_callback') );		
		}
		
		function add_quickshop_modal(){
		?>
		<div id="ts-quickshop-modal" class="ts-popup-modal">
			<div class="overlay"></div>
			<div class="quickshop-container popup-container">
				<span class="close"><i class="fa fa-close"></i></span>
				<div class="quickshop-content"></div>
			</div>
		</div>
		<?php
		}
		
		function product_title(){
			?>
			<h1 itemprop="name" class="product_title entry-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<?php
		}
		
		function filter_add_to_cart_url(){
			$ref_url = wp_get_referer();
			$ref_url = remove_query_arg( array('added-to-cart','add-to-cart'), $ref_url );
			$ref_url = add_query_arg( array( 'add-to-cart' => $this->id ), $ref_url );
			return esc_url( $ref_url );
		}
		
		function filter_review_link( $review_link = '#reviews' ){
			global $product;
			$link = get_permalink( $product->get_id() );
			if( $link ){
				return trailingslashit($link) . $review_link;
			}
			else{
				return $review_link;
			}
		}
		
		function load_quickshop_content_callback(){
			global $post, $product;
			$prod_id = absint($_POST['product_id']);
			$post = get_post( $prod_id );
			$product = wc_get_product( $prod_id );

			if( $prod_id <= 0 ){
				die( esc_html__('Invalid Product', 'upstore') );
			}
			if( !isset($post->post_type) || $post->post_type != 'product' ){
				die( esc_html__('Invalid Product', 'upstore') );
			}
			
			$this->id = $prod_id;
			
			add_filter( 'woocommerce_add_to_cart_url', array($this, 'filter_add_to_cart_url'), 10 );
			add_filter( 'upstore_woocommerce_review_link_filter', array($this, 'filter_review_link'), 10 );
			
			$_wrapper_class = 'ts-quickshop-wrapper product type-' . $product->get_type();
			if( !class_exists('YITH_WCWL') ){
				$_wrapper_class .= ' single-no-wishlist';
			}
			if( !has_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_add_to_cart') ){
				$_wrapper_class .= ' no-addtocart';
			}
			if( !has_action('upstore_quickshop_single_product_summary', 'woocommerce_template_single_rating') ){
				$_wrapper_class .= ' no-rating';
			}
			ob_start();	
			?>
			<div class="woocommerce">
				<div itemscope itemtype="http://schema.org/Product" id="product-<?php echo get_the_ID();?>" <?php post_class( apply_filters( 'single_product_wrapper_class', $_wrapper_class ) ); ?>>
						
					<div class="images-slider-wrapper">
					<?php	
						$image_ids = array();
						/* Main image */
						if ( has_post_thumbnail() ){
							$image_ids[] = get_post_thumbnail_id();				
						}
						/* Thumbnails */
						$attachment_ids = $product->get_gallery_image_ids();
						if( is_array($attachment_ids) ){
							$image_ids = array_merge($image_ids, $attachment_ids);
							if( count($image_ids) > 5 ){
								$image_ids = array_slice($image_ids, 0, 5);
							}
						}
						
						if( count($image_ids) == 0 ){ /* Always show image */
							$image_ids[] = 0;
						}
						$style = '';
						$image_sizes = wc_get_image_size( 'woocommerce_thumbnail' );
						if( $image_sizes['height'] ){
							$min_height = absint($image_sizes['height']) * 520 / absint($image_sizes['width']);
							$min_height = $min_height > 624 ? 624 : floor($min_height);
							$style = 'min-height: ' . $min_height . 'px';
						}
						?>
						<div class="image-items loading" style="<?php echo esc_attr($style) ?>">
							<?php foreach( $image_ids as $image_id ): ?>
							<?php 
								$image_info = wp_get_attachment_image_src($image_id, 'woocommerce_single');
								$image_link = isset($image_info[0])?$image_info[0]:wc_placeholder_img_src();
							?>
							<div class="image-item">
								<img src="<?php echo esc_url($image_link); ?>" alt="<?php echo esc_attr($product->get_title()) ?>" />
							</div>
							<?php endforeach; ?>
						</div>
						
					</div>
					<!-- Product summary -->
					<div class="summary entry-summary">
						<?php do_action('upstore_quickshop_single_product_title'); ?>
						<?php do_action('upstore_quickshop_single_product_summary'); ?>
					</div>
				
				</div>
			</div>
				
			<?php
			
			remove_filter( 'woocommerce_add_to_cart_url', array($this, 'filter_add_to_cart_url'), 10 );
			remove_filter( 'upstore_woocommerce_review_link_filter', array($this, 'filter_review_link'), 10 );

			$return_html = ob_get_clean();
			wp_reset_postdata();
			die($return_html);
		}
		
	}
	new Upstore_Quickshop();
}
?>