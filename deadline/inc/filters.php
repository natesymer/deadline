<?php

add_filter('after_setup_theme', function() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo', []);
	add_theme_support('html5', ['search-form', 'style', 'script', 'meta']);
	add_theme_support('wp-block-styles');

	register_nav_menus([
		'primary_navigation' => 'Primary Navigation'
	]);
});

add_filter('wp_enqueue_scripts', function() {
	wp_enqueue_style('parent-theme-style', get_stylesheet_uri(), [], '0.0.1');
});

add_filter('get_the_archive_title_prefix', '__return_empty_string');

add_filter('post_class', function($classes, $css_class, $post_id) {
	$classes = array_diff($classes, ['hentry']);
	$classes[] = 'wp-post';
	$classes[] = is_singular() ? 'single' : 'plural';
	return $classes;
}, 10, 3);
