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
						<!-- get the post date -->
						<h1>
							Posted In : 
							<?php
								if(is_month()){
									$month = get_query_var('monthnum');
									$dateobj = DateTime::createFromFormat('!m', $month);
									echo $dateobj->format('F');
								}elseif(is_year()){
									echo esc_html(get_query_var('year'));
								}elseif(is_day()){
									$day = esc_html(get_query_var('day')) . '/';
									$month = esc_html(get_query_var('monthnum')) . '/';
									$year = esc_html(get_query_var('year'));

									printf('%s%s%s', $day, $month, $year);
								}
							?>
						</h1>
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