<?php
	//text domain
	load_theme_textdomain('mamurjor');
	//include theme script files
	require_once('inc/theme-script-files.php');
	//after setup theme function
	require_once('inc/after-setup-theme.php');
	//theme Widgets
	require_once('inc/mamurjor-widgets.php');
	//required plugins for these themes
	require_once('inc/tgm.php');
	//acf plugin
	//require_once('inc/acf-code.php');
	//cmb2
	require_once get_template_directory() . '/inc/cmb2-b.php';

	//excerpt setup
	function change_excerpt_value($excerpt){
		return 25;
	}
	add_filter( "excerpt_length", "change_excerpt_value", 999);

	function excerpt_read_more(){
		return "";
	}
	add_filter( "excerpt_more", "excerpt_read_more");

	//password protected post
	if(! function_exists('password_protected_post')){
		function password_protected_post($excerpt){
			if(!post_password_required()){
				return $excerpt;
			}
			else {
				echo get_the_password_form();
			}
		}
	}
	add_filter( "the_excerpt", "password_protected_post");

	function mamurjor_protected_post_title(){
		return "This Post Is Locked";
	}
	add_filter("protected_title_format", "mamurjor_protected_post_title");

	//remove default post/body class
	function mj_post_class($classes){
		unset($classes[array_search("no-customize-support", $classes)]);
		return $classes;
	}
	add_filter( "body_class", 'mj_post_class' );

	//hide acf plugin from dashboard
	//add_filter( 'acf/settings/show_admin', '__return_false' );

	function mamurjor_admin_js($hook){
		if(isset($_REQUERST['post']) || isset($_REQUERST['post_ID'])){
			$post_id = empty($_REQUERST['post_ID']) ? $_REQUERST['post'] : $_REQUERST['post_ID'];
		}

		if('post.php' == $hook){
			$post_format = get_post_format($post_id);
			wp_enqueue_script( 'admin_js', get_theme_file_uri("/assets/js/admin.js"), array("jquery"), "0.0.3", true );
			wp_localize_script( 'admin_js', 'admin_pf', array(
				'format' => $post_format
			) );
		}
		
	}
	add_action("admin_enqueue_scripts", "mamurjor_admin_js");   