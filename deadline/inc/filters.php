<?php

add_filter('after_setup_theme', function() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('html5', [
		'search-form',
		'style',
		'script',
		'meta'
	]);

	add_theme_support('custom-logo', [
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	]);

	register_nav_menus([
		'primary_navigation' => 'Primary Navigation'
	]);

	$GLOBALS['content_width'] = apply_filters('deadline_content_width', 640);
});

add_filter('widgets_init', function() {
	register_sidebar([
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'description'   => 'Add widgets here.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	]);
});

add_filter('wp_enqueue_scripts', function() {
	wp_enqueue_style('deadline-style', get_stylesheet_uri(), [], '0.0.1');
});

add_filter('body_class', function($classes) {
	$classes[] = is_active_sidebar('sidebar') ? 'has-sidebar' : 'no-sidebar';
	return $classes;
});

add_filter('post_class', function($classes, $css_class, $post_id) {
	$classes = array_diff($classes, ['hentry']);
	$classes[] = 'wp-post';
	$classes[] = is_singular() ? 'single' : 'plural';
	return $classes;
}, 10, 3);

