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

if( has_nav_menu( 'vertical' ) ){
	$extra_class[] = 'has-vertical-menu';
}
?>

<header class="ts-header <?php echo esc_attr(implode(' ', $header_classes)); ?>">
	<div class="header-container">
		<div class="header-template header-v8 <?php echo esc_attr(implode(' ', $extra_class)); ?>">
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
			<div class="header-middle">
				<div class="logo-wrapper visible-ipad"><?php echo upstore_theme_logo(); ?></div>
				<div class="container">
				
					<div class="logo-wrapper">
						<?php echo upstore_theme_logo(); ?>
						<?php if( $theme_options['ts_enable_tiny_shopping_cart'] ): ?>
						<div class="shopping-cart-wrapper cart-primary visible-phone"><?php echo upstore_tiny_cart(); ?></div>
						<?php endif; ?>
					</div>
					
					<?php if( $theme_options['ts_enable_search'] ): ?>
					<div class="search-wrapper search-round"><?php upstore_get_search_form_by_category(); ?></div>
					<?php endif; ?>
					
					<?php if( $theme_options['ts_header_middle_content'] ): ?>
					<div class="header-right">
						<?php echo do_shortcode(stripslashes($theme_options['ts_header_middle_content'])); ?>
					</div>
					<?php endif; ?>
				
				</div>
			</div>
			<div class="header-bottom header-sticky hidden-phone">
				<div class="container">
					<div class="menu-wrapper menu-full">							
						<div class="ts-menu">
							<?php 
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper hidden-phone','theme_location' => 'primary','walker' => new Upstore_Walker_Nav_Menu() ) );
								}
								else{
									wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu pc-menu ts-mega-menu-wrapper hidden-phone' ) );
								}
							?>
						</div>
					</div>
					
					<?php if( $theme_options['ts_enable_tiny_shopping_cart'] ): ?>
						<div class="shopping-cart-wrapper style-2"><?php echo upstore_tiny_cart(); ?></div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>	
	</div>
</header>