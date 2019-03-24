<?php
	//single page grid
	$mj_sidebar_grid = 'col-md-8';
	if(!is_active_sidebar('mj-right-sidebar')){
		$mj_sidebar_grid = 'col-md-12';
	}
?>
<?php get_header(); ?>
	<section class="our-blog section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="section-header">Blog Post</h2>
				</div>
			</div>
			<div class="row">

				<div class="<?php echo $mj_sidebar_grid; ?>">

				<?php while(have_posts()) : the_post(); ?>

					<div class="blog-postwrapper">
						<div class="single-post-content">

							<!-- posted from cmb2 -->
							<div class="cmb-thumb">
								<?php
										$thumbn = get_post_meta( get_the_ID(), '_mamurjor_thumb_id', true );
										$thumb_url = wp_get_attachment_image_src($thumbn);
								?>
								<img src="<?php echo esc_url($thumb_url[0]); ?>" alt="">
							</div>
							<div class="cmb2-b">
								<?php
									$mamurjor_device = get_post_meta(get_the_ID(), '_mamurjor_device_name', true);

									$mamurjor_processor = get_post_meta(get_the_ID(), '_mamurjor_processor', true);

									$mamurjor_manufacture_date = get_post_meta(get_the_ID(), '_mamurjor_manufacture_date', true);

									$mamurjor_warranty = get_post_meta(get_the_ID(), '_mamurjor_warranty', true);

									$mamurjor_warranty_info = get_post_meta(get_the_ID(), '_mamurjor_warranty_info', true);
								?>
								
							<?php if(class_exists('CMB2')): ?>
								<strong>
									Parts Name: 
									<?php echo esc_html( $mamurjor_device ); ?>
								</strong><br>
								<strong>
									Processor Name: 
									<?php echo esc_html( $mamurjor_processor ); ?>
								</strong><br>
								<strong>
									Manufacture Date: 
									<?php echo esc_html( $mamurjor_manufacture_date ); ?>
								</strong><br>
								<strong>
									Warranty:  
									<?php
										if($mamurjor_warranty){
											echo esc_html( $mamurjor_warranty_info );
										}
									?>
								</strong>
							<?php endif; ?>
							</div>

							<h3><?php the_title(); ?></h3>
							<!-- post-details -->
							<p>Posted by 
								<?php the_author_posts_link(); ?>

								<a href="<?php the_permalink(); ?>">
									<?php the_date('F d, Y '); ?>
								</a> . 
								<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'mj-comments', 'Comments Disabled'); ?>
								<?php
									if(has_tag()){
										echo ' . Tags: ';
										the_tags('<b>', ', ', '</b>');
									}
								?>
							</p>
							
							<!-- post-feature-image -->
							<?php the_post_thumbnail(); ?>
								<!-- pagination for large post -->
							<?php
								the_content();
								wp_link_pages(array(
									'before' =>'<h4>' . __('Pages: ', 'mamurjor'),
									'after' => '</h4>',
									'nextpagelink' => '>',
									'previouspagelink' => '<'

								));
								if( get_next_post_link() ){next_post_link( '<b>Next Post: </b> %link' );}
								echo "<br>";
								previous_post_link('<b>Previous Post: </b> %link');
								echo "<br><br>";
							?>

				<!-- advanced custom field -->

							<div class="advance_custom_field">
								<h2>AFC POST</h2>
								<?php if(function_exists('the_field')):?>
		
									<p><?php the_field('mamurjor_text'); ?></p>

									<p>
										<!-- show image -->
										<?php
											$mj_post_img = get_field('mamurjor_image');
											if($mj_post_img){
												$mjpost_img_src = wp_get_attachment_image_src($mj_post_img);

												echo "AFC image <br>" . "<img src='".esc_url($mjpost_img_src[0])."' />";
											}
										?>
									</p>

									<p>
										<!-- download file -->
										<?php
											$file = get_field('mamurjor_attachment');
											if($file){
												$file_url = wp_get_attachment_url($file);
												$file_thumb = get_field('mamurjor_thumb', $file);

												if($file_thumb){
													$file_thumb_src = wp_get_attachment_image_src($file_thumb);

													echo 'Download: <br>' . '<a download href="'.$file_url.'"><img src="'.esc_url($file_thumb_src[0]).'" /></a>';
												}
											}
										?>
									</p>
								<?php endif; ?>
							</div>
				<!-- advanced custom field ends-->

							<!-- post-author -->
							<div class="author-details">
								<?php echo get_avatar(get_the_author_meta('id')); ?>
								<div class="author-bio">
									<h4>
										Author: 
										<?php echo the_author_posts_link(get_the_author_meta('display_name')); ?>
									</h4>
									<p>
										<?php echo get_the_author_meta('description'); ?>
									</p>
								</div>
								<div class="author-social-link">
									<!-- afc-author-social -->
									<?php if(function_exists('the_field')): ?>
										<?php
											$fb_icon = get_field('facebook');
											$twit_icon = get_field('twitter');
										?>
										<h3>Get Connected: 
										<a href="<?php echo esc_url($fb_icon) ?>">
											<i class="fa fa-facebook"></i>
										</a>
										<a href="<?php echo esc_url($twit_icon) ?>">
											<i class="fa fa-twitter"></i>
										</a></h3> 
									<?php endif; ?>
								</div>

				<!-- related post afc with wp_query -->
								<div class="related-post">
									<?php if(function_exists('the_field')): ?>
										<h2><?php _e("Related Posts", "mamurjor"); ?></h2>
										<?php
											$related_post = get_field('related_post');

											$mamurjor_rel_post = new WP_Query(array(
												'post__in' 	=> $related_post,
												'orderby' 	=> 'post__in'
											));
										?>
										<?php while($mamurjor_rel_post->have_posts()) : $mamurjor_rel_post->the_post(); ?>

											<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

										<?php endwhile; ?>
										<?php wp_reset_query(); ?>
									<?php endif; ?>
								</div>

							<!-- comments-field -->
							<?php
								if(comments_open()){
									comments_template();
								}
							?>

						</div>

						
					</div>

				<?php endwhile; ?>

				</div>
			</div>
			<?php if(is_active_sidebar('mj-right-sidebar')){ ?>
				<div class="col-md-4">
					<div class="right-sidebar">
						<?php
							if(is_active_sidebar( "mj-right-sidebar" )){
								dynamic_sidebar('mj-right-sidebar');
							}
						?>
					</div>
				</div>
			<?php } ?>

			</div>
		</div>
	</section>

<!-- footer -->
<?php get_footer(); ?>