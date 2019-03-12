<?php get_header(); ?>
	<section class="our-blog section-padding">
		<div class="container">
			<div class="row">
				<!-- main-content -->
				<div class="col-md-9">


				</div>

			
<!-- sidebar_widget -->
				<div class="col-md-3">
					<div class="right-sidebar">
						<?php
							if(is_active_sidebar('mj-right-sidebar')){
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