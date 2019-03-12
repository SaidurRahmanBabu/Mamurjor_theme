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

					<div class="blog-postwrapper">
						<div class="single-post-content">

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail(); ?>
							</a>

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