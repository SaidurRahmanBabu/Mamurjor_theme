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

							<div class="acf-post">
								From meta acf: <?php the_field('course'); ?>
								<?php 
								echo "</br>";
									$custom_image =  get_field('image');

									$custom_image_url = wp_get_attachment_image_src( $custom_image, 'thumbnail');
								?>
								<img src="<?php echo esc_url($custom_image_url[0]); ?>" alt="">
							</div>

							<!-- downloadable file -->
							<?php
								$file = get_field('attachment');

								if($file){

									$file_url = wp_get_attachment_url( $file );

									$file_thumb = get_field('thumbnail', $file);

									if($file_thumb){

										$file_thumb_details = wp_get_attachment_image_src( $file_thumb);

										echo "<a target='_blank' href='{$file_url}'>
											<img src='".esc_url($file_thumb_details[0])."' alt=''>
										</a>";
									}
								}
							?>

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
							</div>

							<!-- comments-field -->
							<?php
								if(comments_open()){
									comments_template();
								}
							?>

						</div>

						<div>
							<?php 
								the_field('content');
							 ?>

							 <br>
							 <?php  
							 	$thumnail = get_field('mamurjor_image');
							 	$thumnail_url = wp_get_attachment_image_src( $thumnail, 'thumbnail' );
							 ?>
							 <img src="<?php echo esc_url($thumnail_url[0]); ?>" alt=""> <br><br>

							 <?php
							 	$file = get_field('mamurjor_pdf');

							 	if($file){
							 		$mamurjor_file_url = wp_get_attachment_url($file);

							 		$mamurjor_file_thumb = get_field('mamurjor_thumb', $file);

							 		if($mamurjor_file_thumb){

							 			$mamurjor_file_thumb_src = wp_get_attachment_image_src( $mamurjor_file_thumb);

							 			echo "<a href='{$mamurjor_file_url}'>
							 			<img src='". esc_url($mamurjor_file_thumb_src[0] )."'/>
							 			</a>";
							 		}
							 	}
							 ?>
						</div>
					</div>

				<?php endwhile; ?>

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