<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php 
	$theme_options = upstore_get_theme_options();
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php if( $theme_options['ts_responsive'] ): ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
	<?php endif; ?>

	<link rel="profile" href="//gmpg.org/xfn/11" />
	<?php 
	upstore_theme_favicon();
	wp_head(); 
	?>
</head>
<body <?php body_class(); ?>>
<?php 
if( function_exists('wp_body_open') ){
	wp_body_open();
}
upstore_tiny_account_popup();
?>

<div id="page" class="hfeed site">

	<?php if( !is_page_template('page-templates/blank-page-template.php') ): ?>
		<!-- Store Notice -->
		<?php if( $theme_options['ts_header_store_notice'] ): ?>
		<?php $store_notice_bg = $theme_options['ts_header_store_notice_bg_image']['url']; ?>
		<div class="ts-store-notice" <?php echo (!$store_notice_bg)?'':'style="background-image: url('.esc_url($store_notice_bg).')"'; ?>>
			<div class="container">
				<?php echo do_shortcode(stripslashes($theme_options['ts_header_store_notice'])); ?>
			</div>
		</div>
		<?php endif; ?>
	
		<!-- Page Slider -->
		<?php if( is_page() ): ?>
			<?php if( upstore_get_page_options('ts_page_slider') && upstore_get_page_options('ts_page_slider_position') == 'before_header' ): ?>
			<div class="top-slideshow">
				<div class="top-slideshow-wrapper">
					<?php upstore_show_page_slider(); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="mobile-menu-wrapper ts-menu">
			<h4 class="title"></h4>
			<span class="ic-mobile-menu-close-button"><i class="fa fa-bars"></i></span>
			<?php 
			if ( has_nav_menu( 'mobile' ) ) {
				wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'mobile', 'walker' => new Upstore_Walker_Nav_Menu() ) );
			}else{
				wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'mobile-menu', 'theme_location' => 'primary', 'walker' => new Upstore_Walker_Nav_Menu() ) );
			}
			?>
		</div>
		
		<!-- Shopping Cart Floating Sidebar -->
		<?php if( $theme_options['ts_enable_tiny_shopping_cart'] && $theme_options['ts_shopping_cart_sidebar'] ): ?>
		<div id="ts-shopping-cart-sidebar" class="ts-floating-sidebar">
			<div class="overlay"></div>
			<div class="ts-sidebar-content">
				<span class="close"><i class="fa fa-remove"></i></span>
				<div class="ts-tiny-cart-wrapper"></div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php upstore_get_header_template(); ?>
		
	<?php endif; ?>
	
	<?php do_action('upstore_before_main_content'); ?>

	<div id="main" class="wrapper">