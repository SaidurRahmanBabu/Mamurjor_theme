
	<section class="section-padding footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php
							if(is_active_sidebar( 'mj-footer1' )){
								dynamic_sidebar('mj-footer1');
							}
						?>
					</div>
					<div class="col-md-4">
						<?php
							if(is_active_sidebar( 'mj-footer2' )){
								dynamic_sidebar('mj-footer2');
							}
						?>
					</div>
					<div class="col-md-4">
						<?php
							if(is_active_sidebar( 'mj-footer3' )){
								dynamic_sidebar('mj-footer3');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<div class="footer-credit">
						<p>All Right Reserved <a href="">Saidur Rahman</a></p>
					</div>
				</div>
				<div class="col-md-6 text-right">
					<div class="footer-bottom-menu">
						<ul>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php wp_footer(); ?>
</body>
</html>