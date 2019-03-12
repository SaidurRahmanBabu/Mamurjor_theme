<?php
function mamurjor_theme_scripts(){
	/*all css and font files*/
	wp_enqueue_style('bootsrtap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	//fontawesome icon
	wp_enqueue_style('fontawesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	//mamurjor-style.css
	wp_enqueue_style( 'mamurjor-style', get_template_directory_uri() . '/assets/css/mamurjor-style.css', array(), 'null', 'all' );
	//theme-stylesheet
	wp_enqueue_style( 'style-css', get_stylesheet_uri());
	//responsive css
	wp_enqueue_style( 'mamurjor-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), 'null', 'all' );

	/*all js files*/
	//bootstrap js
	wp_enqueue_script( 'bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '4.3.1', true );
	//theme main js file
	wp_enqueue_script( 'mamurjor-js', get_template_directory_uri().'/assets/js/mamurjor-js.js', array(), 'null', true );
}
add_action("wp_enqueue_scripts", "mamurjor_theme_scripts");