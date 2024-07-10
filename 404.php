<?php get_header(); ?>
	<div class="fullwidth-template">
		<div id="main-content">	
			<div id="primary" class="site-content">
				<article>
					<img src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="<?php esc_attr_e('404', 'upstore'); ?>" />
					<h2 class="heading-font-2"><?php esc_html_e('Oops Sorry! Page Not Found!', 'upstore'); ?></h2>
					<a href="<?php echo esc_url( home_url('/') ) ?>" class="button button-primary"><?php esc_html_e('Back To Home', 'upstore'); ?></a>
				</article>
			</div>
		</div>
	</div>
<?php
get_footer();