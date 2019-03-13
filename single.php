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
							<h3><?php the_title(); ?></h3>
							
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
								next_post_link();
								echo "<br>";
								previous_post_link();
							?>

							<!-- post-author -->
							<div class="author-details">
								<?php echo get_avatar(get_the_author_meta('id')); ?>
								<div class="author-bio">
									<h4>
										<?php echo get_the_author_meta('display_name'); ?>
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