<?php
/*
*Template Name: custom query
*/
?>
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
				<!-- custom query -->
				<?php
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$post_per_page = 3;
				//$post_id = array(58, 55, 50, 45);

					$_post = new WP_Query(array(
						//'category_name' => 'uncategorized',
						'posts_per_page' => $post_per_page,
						'paged' => $paged,
						//get category and tag post togather
						'tax_query' => array(
							'relation' => 'OR',
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => array('new')
							),
							array(
								'taxonomy' => 'post_tag',
								'field' => 'slug',
								'terms' => array('new')
							)
						)
					)); 
				?>

				<div class="<?php echo $mj_sidebar_grid; ?>">

				<?php while($_post->have_posts()) : $_post->the_post(); ?>

					<div class="tag-postwrapper">
						<div class="single-tag-content">

							<a href="<?php the_permalink(); ?>">
								<?php
								 if(has_post_thumbnail()){
								 		the_post_thumbnail();
								 }
								?>									
							</a>

							<a href="<?php the_permalink(); ?>">
								<h4><?php the_title(); ?></h4>
							</a>

						</div>
					</div>

					<?php endwhile; ?>

				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-offset-1 text-center">
					<div class="custom-pagination">

						<?php
							echo paginate_links(array(
								'total' => $_post->max_num_pages,
								'current' => $paged,
								'prev_text' => 'previous',
								'next_text' => 'next'
							));
						?>

					</div>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php get_footer(); ?>