<?php
	function mamurjor_theme_setup(){
		/*theme supports*/
		//theme title and tag
		add_theme_support('title-tag');

		//custom header bg and Text color
		$mj_header_color = array(
			'header-text' => true,
			'default-text-color' => '#fff',
			'height' => 300,
			'width' => 1200,
			'flex-height' => true,
			'flex-width' => true,
		);
		add_theme_support('custom-header', $mj_header_color);

		//theme logo image
		$mj_custom_logo = array(
			'height' => '100',
			'width' => '100'
		);
		add_theme_support('custom-logo', $mj_custom_logo);

		//Theme bg image/color
		add_theme_support('custom-background');

		//theme images
		add_theme_support('post-thumbnails');

		//Theme menus
		register_nav_menus(array(
			'main_menu' => __('main menu', 'mamurjor')
		));
	}
	add_action( 'after_setup_theme', 'mamurjor_theme_setup');

	//header image customize
	function mj_header_image(){
		if(is_front_page()){
			if(current_theme_supports( 'custom-header' )){
				?>
				<style>
					.header-bgi{background-image: url(<?php header_image(); ?>)}
					.header-bgi a h1, h4 {color:#<?php echo get_header_textcolor();?>;}
					<?php if(!display_header_text()){
						echo "display:none";
					}?>
				</style>
				<?php
			}
		}
	}
	add_action("wp_head", "mj_header_image");