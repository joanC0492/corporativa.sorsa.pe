<?php 
global $post;
$theme_options = upstore_get_theme_options();
$cat_list = get_the_category($post->ID);
$cat_ids = array();
foreach( $cat_list as $cat ){
	$cat_ids[] = $cat->term_id;
}
$cat_ids = implode(',', $cat_ids);

if( strlen($cat_ids) > 0 ){
	$arg = array(
		'post_type' => $post->post_type
		,'cat' => $cat_ids
		,'post__not_in' => array($post->ID)
	);
}
else{
	$arg = array(
		'post_type' => $post->post_type
		,'post__not_in' => array($post->ID)
	);
}

/* Remove the quote post format */
$arg['tax_query'] = array(
	array(
		'taxonomy'	=> 'post_format'
		,'field'	=> 'slug'
		,'terms'    => array( 'post-format-quote' )
		,'operator'	=> 'NOT IN'
	)
);

$related_posts = new WP_Query($arg);
	
if( $related_posts->have_posts() ){
	$is_slider = true;
	if( isset($related_posts->post_count) && $related_posts->post_count <= 1 ){
		$is_slider = false;
	}
?>
	<div class="ts-blogs related-posts related ts-slider <?php echo esc_attr($is_slider?'loading':''); ?>">
		<header class="theme-title">
			<h3 class="heading-title"><?php esc_html_e('Related Posts', 'upstore'); ?></h3>
		</header>
		<div class="content-wrapper">
			<div class="blogs">
				<?php 
				while( $related_posts->have_posts() ): $related_posts->the_post();
				
				$show_thumbnail = true;
				
				$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
				if( $is_slider && $post_format == 'gallery' ){ /* Remove Slider in Slider */
					$post_format = false;
				}
				?>
				<article class="item <?php echo esc_attr($post_format); ?>">
					<div class="article-content">
						<div class="thumbnail-content">
						
							<?php 
							if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){
							?>
								<a class="thumbnail <?php echo esc_attr($post_format); ?> <?php echo ('gallery' == $post_format)?'loading':''; ?>" href="<?php echo ('gallery' == $post_format)?'javascript: void(0)':get_permalink() ?>">
									<figure>
									<?php 
									
									if( $post_format == 'gallery' ){
										$gallery = get_post_meta($post->ID, 'ts_gallery', true);
										$gallery_ids = explode(',', $gallery);
										if( is_array($gallery_ids) && has_post_thumbnail() ){
											array_unshift($gallery_ids, get_post_thumbnail_id());
										}
										foreach( $gallery_ids as $gallery_id ){
											echo wp_get_attachment_image( $gallery_id, 'upstore_blog_shortcode_thumb' );
										}
										if( empty($gallery_ids) ){
											$show_thumbnail = false;
										}
									}
									
									if( $post_format === false || $post_format == 'standard' ){
										if( has_post_thumbnail() ){
											the_post_thumbnail('upstore_blog_shortcode_thumb'); 
										}
										else{
											$show_thumbnail = false;
										}
									}
											
									?>
									</figure>
									<div class="effect-thumbnail"></div>
								</a>
							<?php 
							}
							
							if( $post_format == 'video' ){
								$video_url = get_post_meta($post->ID, 'ts_video_url', true);
								echo do_shortcode('[ts_video src="'.$video_url.'"]');
							}
							
							if( $post_format == 'audio' ){
								$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
								if( strlen($audio_url) > 4 ){
									$file_format = substr($audio_url, -3, 3);
									if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
										echo do_shortcode('[audio '.$file_format.'="'.$audio_url.'"]');
									}
									else{
										echo do_shortcode('[ts_soundcloud url="'.$audio_url.'" width="100%" height="122"]');
									}
								}
							}
							?>
							
						</div>
					
						<div class="entry-content <?php echo !$show_thumbnail?'no-featured-image':'' ?>">
							<?php if( $theme_options['ts_blog_title'] ): ?>
							<header>
								<h3 class="heading-title entry-title">
									<a class="post-title heading-title" href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
								</h3>
							</header>
							<?php endif; ?>
							
							<?php if( ( $theme_options['ts_blog_author']) || $theme_options['ts_blog_date'] ):  ?>
							<div class="entry-meta-top">
							
								<!-- Blog Author -->
								<?php if( $theme_options['ts_blog_author'] ): ?>
								<span class="vcard author"><?php esc_html_e('By ', 'upstore'); ?><?php the_author_posts_link(); ?></span>
								<?php endif; ?>
				
								<!-- Blog Date Time -->
								<?php if( $theme_options['ts_blog_date'] ): ?>
								<span class="date-time">
									<?php echo get_the_time( get_option('date_format') ); ?>
								</span>
								<?php endif; ?>
								
							</div>
							<?php endif; ?>
							
							<?php if( $theme_options['ts_blog_excerpt'] ): ?>
							<div class="excerpt"><?php upstore_the_excerpt_max_words(18, '', true, '', true); ?></div>
							<?php endif; ?>
							
							<?php if( $theme_options['ts_blog_read_more'] || $theme_options['ts_blog_comment'] ): ?>
							<div class="entry-meta-bottom">
								<!-- Blog Read More Button -->
								<?php if( $theme_options['ts_blog_read_more'] ): ?>
								<a class="button-readmore" href="<?php the_permalink() ; ?>"><?php esc_html_e('Read More', 'upstore'); ?></a>
								<?php endif; ?>
								
								<!-- Blog Comment -->
								<?php if( $theme_options['ts_blog_comment'] ): ?>
								<span class="comment-count">
									<i class="fa fa-comment-o"></i>
									<span class="number">
										<?php upstore_post_comment_count(); ?>
									</span>
								</span>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					
				</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	
<?php 
	wp_reset_postdata();
}
?>