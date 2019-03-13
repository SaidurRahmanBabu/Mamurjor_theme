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
				<div class="col-md-10 text-center">
					<div class="show-tag-name">
						<?php
						echo "You are in <b>";
							single_cat_title();
							echo '</b> category';
						?>
					</div><br><br>
				</div>
			</div>
			<div class="row">

				<div class="<?php echo $mj_sidebar_grid; ?>">

				<?php while(have_posts()) : the_post(); ?>

					<div class="tag-postwrapper">
						<div class="single-tag-content">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
							<a href="<?php the_permalink(); ?>">
								<h4><?php the_title(); ?></h4>
							</a>
						</div>
					</div>

				<?php endwhile; ?>

				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php get_footer(); ?>