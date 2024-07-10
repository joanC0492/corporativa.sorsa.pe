<?php 
global $post;
$theme_options = upstore_get_theme_options();
$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
$post_class = 'post-item hentry ';
$show_blog_thumbnail = $theme_options['ts_blog_thumbnail'];
$blog_thumb_size = 'upstore_blog_thumb';

if( $post_format == 'quote' ){
	$quote_content = get_post_meta($post->ID, 'ts_quote_content', true);
	if( $quote_content ){
		$post_class .= 'has-quote-content ';
	}
}
?>
<article <?php post_class($post_class) ?>>
	
	<div class="entry-format">
		<?php 
		
		if( $show_blog_thumbnail ){
		
			if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' || $post_format == 'quote' ){
				if( $post_format != 'gallery' ){
				?>
				<a class="thumbnail <?php echo esc_attr($post_format); ?>" href="<?php the_permalink() ?>">
				<?php }else{ ?>
				<div class="thumbnail gallery loading">	
				<?php } ?>
					<figure>
					<?php 
						if( $post_format == 'gallery' ){
							$gallery = get_post_meta($post->ID, 'ts_gallery', true);
							if( $gallery != '' ){
								$gallery_ids = explode(',', $gallery);
							}
							else{
								$gallery_ids = array();
							}
							
							if( has_post_thumbnail() ){
								array_unshift($gallery_ids, get_post_thumbnail_id());
							}
							foreach( $gallery_ids as $gallery_id ){
								echo '<a class="thumbnail gallery" href="'.esc_url(get_the_permalink()).'">';
								echo wp_get_attachment_image( $gallery_id, $blog_thumb_size, 0, array('class' => 'thumbnail-blog') );
								echo '</a>';
							}
							
							if( empty($gallery_ids) ){
								$show_blog_thumbnail = false;
							}
						}
					
						if( $post_format === false || $post_format == 'standard' || $post_format == 'quote' ){
							if( has_post_thumbnail() ){
								the_post_thumbnail($blog_thumb_size, array('class' => 'thumbnail-blog'));
							}
							else{
								$show_blog_thumbnail = false;
							}
						}
					?>
					</figure>
				<?php 
				if( $post_format != 'gallery' ){
				?>
				</a>
				<?php }else{ ?>
				</div>
				<?php } ?>
			<?php	
			}
			
			if( $post_format == 'video' ){
				$video_url = get_post_meta($post->ID, 'ts_video_url', true);
				if( $video_url != '' ){
					echo do_shortcode('[ts_video src="'.esc_url($video_url).'"]');
				}
			}
			
			if( $post_format == 'audio' ){
				$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
				if( strlen($audio_url) > 4 ){
					$file_format = substr($audio_url, -3, 3);
					if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
						echo do_shortcode('[audio '.$file_format.'="'.$audio_url.'"]');
					}
					else{
						echo do_shortcode('[ts_soundcloud url="'.$audio_url.'" width="100%" height="166"]');
					}
				}
			}
			
			if( $post_format == 'quote' && $quote_content && $show_blog_thumbnail ){
				echo '<blockquote>&ldquo;';
				echo do_shortcode($quote_content);
				echo '&rdquo;</blockquote>';
			}
		}
		?>
	</div>
	<div class="entry-content <?php echo !$show_blog_thumbnail?'no-featured-image':'' ?>">
		
		<div class="entry-info">
			<!-- Blog Title -->
			<?php if( $theme_options['ts_blog_title'] ): ?>
			<header>
				<h4 class="heading-title entry-title">
					<a class="post-title heading-title" href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
				</h4>
			</header>
			<?php endif; ?>
			
			<?php if( ( $theme_options['ts_blog_author']) || $theme_options['ts_blog_date'] || $theme_options['ts_blog_comment'] ):  ?>
			<div class="entry-meta-top">
				
				<!-- Blog Author -->
				<?php if( $theme_options['ts_blog_author'] ): ?>
				<span class="vcard author"><?php esc_html_e('By ', 'upstore'); ?><?php the_author_posts_link(); ?></span>
				<?php endif; ?>
				
				<!-- Blog Date Time -->
				<?php if( $theme_options['ts_blog_date'] ) : ?>
				<span class="date-time">
					<?php echo get_the_time( get_option('date_format') ); ?>
				</span>
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
			
			<div class="entry-summary">
				<!-- Blog Excerpt -->
				<?php if( $theme_options['ts_blog_excerpt'] ): ?>
				<div class="short-content">
					<?php 
					$max_words = (int)$theme_options['ts_blog_excerpt_max_words']?(int)$theme_options['ts_blog_excerpt_max_words']:140;
					$strip_tags = $theme_options['ts_blog_excerpt_strip_tags']?true:false;
					upstore_the_excerpt_max_words($max_words, $post, $strip_tags, '', true); 
					?>
				</div>
				<?php endif; ?>
				
			</div>
		</div>
		
		<?php
		$categories_list = get_the_category_list(', ');
		if( ($categories_list && $theme_options['ts_blog_categories']) || $theme_options['ts_blog_read_more'] ): 
		?>
		<div class="entry-meta-bottom">
			<!-- Blog Read More Button -->
			<?php if( $theme_options['ts_blog_read_more'] ): ?>
			<a class="button-readmore" href="<?php the_permalink() ; ?>"><?php esc_html_e('Read More', 'upstore'); ?></a>
			<?php endif; ?>
			
			<!-- Blog Categories -->
			<?php 
			if( $categories_list && $theme_options['ts_blog_categories'] ): ?>
			<div class="cats-link">
				<span><?php esc_html_e('Categories: ', 'upstore'); ?></span>
				<span class="cat-links"><?php echo trim($categories_list); ?></span>
			</div>
			<?php endif; ?>
		</div>
		
		<?php endif; ?>
		
	</div>
	
</article>