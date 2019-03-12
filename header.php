<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<section class="header-wrapper">
		<div class="header-bgi text-center">
			<div class="logo-img">
				<a href="<?php bloginfo('home');?>">
					<?php the_custom_logo(); ?>
				</a>
			</div>
			<a href="<?php bloginfo('home');?>">
				<h1><?php bloginfo('title'); ?></h1>
			</a>
			<a href="<?php bloginfo('home');?>">
				<h4><?php bloginfo('description'); ?></h4>
			</a>
		</div>

		<div class="heder-contents">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-right">
						<nav class="main-menu">
							<?php
								wp_nav_menu(array(
									'theme_location' => 'main_menu'
								));
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>