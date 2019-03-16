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
				<div class="col-md-12">
					<!-- post-author -->
					<div class="author-details clearfix">
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