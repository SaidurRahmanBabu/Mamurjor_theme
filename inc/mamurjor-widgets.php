<?php
	function mj_widgets(){
		//right sidebar widget
		register_sidebar( array(
			'name' => __('Right Sidebar', 'mamurjor'),
			'id' => 'mj-right-sidebar',
			'description' => __('Setup Right Sidebar', 'mamurjor'),
			'before_widget' => '<div class="sidebar-content">',
			'after_widget' => '</div></div>',
			'before_title' => '<h4>',
			'after_title' => '</h4><div class="single-sidebar-content">'
		) );

		//footer widgets
		register_sidebar(array(
			'name' => __('Footer1', 'mamurjor'),
			'id' => 'mj-footer1',
			'description' => __('Footer widgets 1', 'mamurjor'),
			'before_widget' => '<div class="footer-content">',
			'after_widget' => '</ul></div>',
			'before_title' => '<h2 class="footer-title">',
			'after_title' => '</h2><ul class="footer-menu">'
		));
		register_sidebar(array(
			'name' => __('Footer2', 'mamurjor'),
			'id' => 'mj-footer2',
			'description' => __('Footer widgets 2', 'mamurjor'),
			'before_widget' => '<div class="footer-content">',
			'after_widget' => '</ul></div>',
			'before_title' => '<h2 class="footer-title">',
			'after_title' => '</h2><ul class="footer-menu">'
		));
		register_sidebar(array(
			'name' => __('Footer3', 'mamurjor'),
			'id' => 'mj-footer3',
			'description' => __('Footer widgets 3', 'mamurjor'),
			'before_widget' => '<div class="footer-content">',
			'after_widget' => '</ul></div>',
			'before_title' => '<h2 class="footer-title">',
			'after_title' => '</h2><ul class="footer-menu">'
		));
	}
	add_action( "widgets_init", "mj_widgets" );