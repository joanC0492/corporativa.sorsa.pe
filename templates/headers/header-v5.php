<?php
$theme_options = upstore_get_theme_options();

$header_classes = array();
if( $theme_options['ts_enable_sticky_header'] ){
	$header_classes[] = 'has-sticky';
}

$extra_class = array();
if( !$theme_options['ts_enable_tiny_shopping_cart'] ){
	$extra_class[] = 'hidden-cart';
}
else{
	$extra_class[] = 'show-cart';
}

if( !$theme_options['ts_enable_search'] ){
	$extra_class[] = 'hidden-search';
}
else{
	$extra_class[] = 'show-search';
}

if( upstore_get_page_options('ts_header_transparent') ){
	$extra_class[] = 'header-transparent';
	$extra_class[] = 'header-text-' . upstore_get_page_options('ts_header_text_color');
}
?>
<?php if( $theme_options['ts_enable_search'] ): ?>
<div id="ts-search-sidebar" class="ts-floating-sidebar">
	<div class="overlay"></div>
	<div class="ts-search-by-category ts-sidebar-content">
		<h4 class="title"><?php esc_html_e('SEARCH ', 'upstore'); ?></h4>
		<span class="close"><i class="fa fa-remove"></i></span>
		<?php get_search_form(); ?>
		<div class="ts-search-result-container"></div>
	</div>
</div>
<?php endif; ?>
<header class="ts-header <?php echo esc_attr(implode(' ', $header_classes)); ?>">
	<div class="header-container">
		<div class="header-template header-v5 <?php echo esc_attr(implode(' ', $extra_class)); ?>">
			<div class="header-top">
				<div class="container">
					<div class="header-left">
						<span class="ic-mobile-menu-button visible-phone"><i class="fa fa-bars"></i></span>
						<?php if( $theme_options['ts_header_contact_information'] ): ?>
						<div class="info-desc"><?php echo do_shortcode(stripslashes($theme_options['ts_header_contact_information'])); ?></div>
						<?php endif; ?>
						<?php if( function_exists('ts_header_social_icons') ){ ts_header_social_icons(); } ?>
					</div>
					<div class="header-right">
						
						<span class="ts-group-meta-icon-toggle visible-phone"><i class="fa fa-cog"></i></span>					
						
						<div class="group-meta-header">
							
							<?php if( $theme_options['ts_enable_tiny_account'] ): ?>
							<div class="my-account-wrapper"><?php echo upstore_tiny_account(); ?></div>
							<?php endif; ?>
							
							<?php if( class_exists('YITH_WCWL') && $theme_options['ts_enable_tiny_wishlist'] ): ?>
							<div class="my-wishlist-wrapper"><?php echo upstore_tini_wishlist(); ?></div>
							<?php endif; ?>
							
							<?php if( $theme_options['ts_header_currency'] ): ?>
							<div class="header-currency"><?php upstore_woocommerce_multilingual_currency_switcher(); ?></div>
							<?php endif; ?>
							
							<?php if( $theme_options['ts_header_language'] ): ?>
							<div class="header-language"><?php upstore_wpml_language_selector(); ?></div>
							<?php endif; ?>	

						</div>
					</div>
				</div>
			</div>
			<div class="header-middle header-sticky">
				<div class="logo-wrapper logo-background logo-ipad"><?php echo upstore_theme_logo(); ?></div>
				<div class="container">
					<div class="logo-wrapper logo-background"><?php echo upstore_theme_logo(); ?></div>
					<div class="menu-wrapper hidden-phone">							
						<div class="ts-menu">
							<?php 
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu ts-mega-menu-wrapper','theme_location' => 'primary','walker' => new Upstore_Walker_Nav_Menu() ) );
								}
								else{
									wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper' ) );
								}
							?>
						</div>
					</div>
					<div class="header-right">
						
						<?php if( $theme_options['ts_enable_tiny_shopping_cart'] ): ?>
							<div class="shopping-cart-wrapper style-2"><?php echo upstore_tiny_cart(); ?></div>
						<?php endif; ?>
						
						<?php if( $theme_options['ts_enable_search'] ): ?>
						<div class="search-sidebar-icon search-button">
							<span class="icon"></span>
						</div>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>	
	</div>
</header>