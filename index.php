<?php get_header(); ?>
	<section class="our-blog section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="section-header">Blog Post</h2>
				</div>
			</div>
			<div class="row">

				<div class="col-md-9">

				<?php while(have_posts()) : the_post(); ?>

					<div class="<?php post_class(); ?>">
						<div class="single-post-content">

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<?php
								//post formats
								$mamurjor_post_format = get_post_format();
								switch ($mamurjor_post_format) {
									case 'image':
										echo '<span class="dashicons dashicons-format-image"></span>';
										break;
									case 'video':
										echo '<span class="dashicons dashicons-video-alt3"></span>';
										break;
									case 'gallery':
										echo '<span class="dashicons dashicons-format-gallery"></span>';
										break;
									case 'quote':
										echo '<span class="dashicons dashicons-format-quote"></span>';
										break;
									default:
									echo '';
									break;
								}
							?>

							<?php
								if(is_single()){
									the_content();
								}
								else{
								 	the_excerpt();
								}
							?>

							<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
						</div>
					</div>

				<?php endwhile; ?>
					<div class="mamurjor-post-pagination">
						<?php the_posts_pagination(array(
							'screen_reader_text' => 'Pagination',
							'next_text' => 'Next',
							'prev_text' => 'Previous'
						)); ?>
					</div>
				</div>

				<div class="col-md-3">
					<div class="right-sidebar">
						<?php
							if(is_active_sidebar( "mj-right-sidebar" )){
								dynamic_sidebar('mj-right-sidebar');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php get_footer(); ?>