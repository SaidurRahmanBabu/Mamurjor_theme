<?php
	//include theme script files
	require_once('inc/theme-script-files.php');
	//after setup theme function
	require_once('inc/after-setup-theme.php');
	//theme Widgets
	require_once('inc/mamurjor-widgets.php');
	//required plugins for these themes
	require_once('inc/tgm.php');

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