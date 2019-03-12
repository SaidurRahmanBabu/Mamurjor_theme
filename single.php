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
							<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail(); ?>

							<?php
								the_content();
							?>
						</div>
					</div>

				<?php endwhile; ?>

				</div>

			

				<div class="col-md-3">
					<div class="right-sidebar">
						<div class="sidebar-content">
							<h4>Sidebar Heading</h4>
							<img src="" alt="sidebar imge">
							<div class="single-sidebar-content">
								<ul>
									<li><a href="">sidebar menu</a></li>
									<li><a href="">sidebar menu</a></li>
									<li><a href="">sidebar menu</a></li>
									<li><a href="">sidebar menu</a></li>
									<li><a href="">sidebar menu</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php get_footer(); ?>