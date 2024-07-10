<?php 
get_header();

global $post;

$theme_options = upstore_get_theme_options();

$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */

$show_blog_thumbnail = $theme_options['ts_blog_details_thumbnail'];

$extra_classes = array();

$page_column_class = upstore_page_layout_columns_class($theme_options['ts_blog_details_layout']);

$show_breadcrumb = apply_filters('upstore_show_breadcrumb_on_single_post', true);
$show_page_title = $theme_options['ts_blog_details_title'];

upstore_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
if( $show_breadcrumb || $show_page_title ){
	$extra_classes[] = 'show_breadcrumb_'.$theme_options['ts_breadcrumb_layout'];
}

if( $post_format == 'quote' ){
	$quote_content = get_post_meta($post->ID, 'ts_quote_content', true);
	if( $quote_content ){
		$extra_classes[] = 'has-quote-content';
	}
}
?>
<div id="content" class="page-container container-post <?php echo esc_attr(implode(' ', $extra_classes)) ?>">
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<aside id="left-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['left_sidebar_class']); ?>">
		<?php if( is_active_sidebar($theme_options['ts_blog_details_left_sidebar']) ): ?>
			<?php dynamic_sidebar( $theme_options['ts_blog_details_left_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>	
	<!-- end left sidebar -->
	
	<!-- main-content -->
	<div id="main-content" class="<?php echo esc_attr($page_column_class['main_class']); ?>">
		<article class="single single-post">
			<div class="entry-format">
				<!-- Blog Thumbnail -->
				<?php if( $show_blog_thumbnail ): ?>
					<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' || $post_format == 'quote' ){ ?>
						<figure class="<?php echo ('gallery' == $post_format)?'gallery loading':'' ?>">
							<?php 
							
							if( $post_format == 'gallery' ){
								$gallery = get_post_meta($post->ID, 'ts_gallery', true);
								$gallery_ids = explode(',', $gallery);
								if( is_array($gallery_ids) && has_post_thumbnail() ){
									array_unshift($gallery_ids, get_post_thumbnail_id());
								}
								foreach( $gallery_ids as $gallery_id ){
									echo wp_get_attachment_image( $gallery_id, 'upstore_blog_thumb', 0, array('class' => 'thumbnail-blog') );
								}
								
								if( !has_post_thumbnail() && empty($gallery) ){
									$show_blog_thumbnail = 0;
								}
							}
						
							if( ($post_format === false || $post_format == 'standard' || $post_format == 'quote') && !is_singular('ts_feature') ){
								if( has_post_thumbnail() ){
									the_post_thumbnail('upstore_blog_thumb', array('class' => 'thumbnail-blog'));
								}
								else{
									$show_blog_thumbnail = 0;
								}
							}
							
							?>
						</figure>
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
								echo do_shortcode('[audio '.$file_format.'="'.esc_url($audio_url).'"]');
							}
							else{
								echo do_shortcode('[ts_soundcloud url="'.esc_url($audio_url).'" width="100%" height="166"]');
							}
						}
					}

					if( $post_format == 'quote' && $quote_content && $show_blog_thumbnail ){
						echo '<blockquote>&ldquo; ';
						echo do_shortcode($quote_content);
						echo '&rdquo;</blockquote>';
					}
					?>
				<?php endif; ?>
			</div>
			<div class="entry-content <?php echo !$show_blog_thumbnail?'no-featured-image':''?>">
				<div class="entry-meta-top <?php echo esc_attr($theme_options['ts_blog_details_date']?'has-datetime':''); ?> <?php echo esc_attr($theme_options['ts_blog_details_author']?'has-author':''); ?>">
					
					<!-- Blog Author -->
					<?php if( $theme_options['ts_blog_details_author'] ): ?>
					<span class="vcard author"><?php esc_html_e('By ', 'upstore'); ?><?php the_author_posts_link(); ?></span>
					<?php endif; ?>
					
					<!-- Blog Date Time -->
					<?php if( $theme_options['ts_blog_details_date'] ) : ?>
					<span class="date-time">
						<?php echo get_the_time( get_option('date_format') ); ?>
					</span>
					<?php endif; ?>
					
					<!-- Blog Comment -->
					<?php if( $theme_options['ts_blog_details_comment'] ): ?>
						<span class="comment-count">
							<i class="fa fa-comment-o"></i>
							<span class="number">
								<?php upstore_post_comment_count(); ?>
							</span>
						</span>
					<?php endif; ?>
				
				</div>
				
				<!-- Blog Content -->
				<?php if( $theme_options['ts_blog_details_content'] ): ?>
				<div class="content-wrapper">
					<div class="full-content"><?php the_content(); ?></div>
					<?php wp_link_pages(); ?>
				</div>
				<?php endif; ?>
			
				<div class="entry-meta-bottom">
					<?php if( $theme_options['ts_blog_details_categories'] != 0 ): ?>
					<div class="meta-bottom-1">
						<!-- Blog Categories -->
						<?php
						$categories_list = get_the_category_list(', ');
						if ( $categories_list && $theme_options['ts_blog_details_categories'] ):
						?>
						<div class="cats-link">
							<span class="cat-title"><?php esc_html_e('Categories: ', 'upstore'); ?></span>
							<span class="cat-links"><?php echo trim($categories_list); ?></span>
						</div>
						<?php endif; ?>
						
					</div>
					<?php endif; ?>
					
					<?php 
					$tags_list = get_the_tag_list(' ', ', '); 
					if ( ( $tags_list && $theme_options['ts_blog_details_tags'] ) || $theme_options['ts_blog_details_sharing'] != 0 ):
					?>
					<div class="meta-bottom-2">
						<!-- Blog Tags -->
						<?php if ( $tags_list && $theme_options['ts_blog_details_tags'] ): ?>
						<div class="tags-link">
							<span class="tag-title"><?php esc_html_e('Tags: ', 'upstore'); ?></span>
							<span class="tag-links">
								<?php echo trim($tags_list); ?>
							</span>
						</div>
						<?php endif; ?>
						
						<!-- Blog Sharing -->
						<?php if( $theme_options['ts_blog_details_sharing'] && function_exists('ts_template_social_sharing') ): ?>
						<div class="social-sharing">
							<?php ts_template_social_sharing(); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			
			<!-- Blog Author -->
			<?php if( $theme_options['ts_blog_details_author_box'] && get_the_author_meta('description') ) : ?>
			<div class="entry-author">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100, 'mystery' ); ?>
				</div>	
				<div class="author-info">		
					<span class="author"><?php the_author_posts_link();?></span>
					<span class="role"><?php echo upstore_get_user_role( get_the_author_meta('ID') ); ?></span>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div>
			</div>
			<?php endif; ?>	
			
			<!-- Related Posts-->
			<?php 
			if( !is_singular('ts_feature') && $theme_options['ts_blog_details_related_posts'] ){
				get_template_part('templates/related-posts');
			}
			?>
			
			<!-- Comment Form -->
			<?php 
			if( $theme_options['ts_blog_details_comment_form'] && ( comments_open() || get_comments_number() ) ){
				comments_template( '', true );
			}
			?>
		</article>
	</div><!-- end main-content -->
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<aside id="right-sidebar" class="ts-sidebar <?php echo esc_attr($page_column_class['right_sidebar_class']); ?>">
		<?php if( is_active_sidebar($theme_options['ts_blog_details_right_sidebar']) ): ?>
			<?php dynamic_sidebar( $theme_options['ts_blog_details_right_sidebar'] ); ?>
		<?php endif; ?>
		</aside>
	<?php endif; ?>	
	<!-- end right sidebar -->	
</div>
<?php get_footer(); ?>