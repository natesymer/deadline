<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function deadline_setup() {
	load_theme_textdomain( 'deadline', get_template_directory() . '/languages' );

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_theme_support('html5', [
		'search-form',
		'gallery',
		'caption',
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
		'menu-1' => 'Primary Navigation'
	]);


	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'deadline_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deadline_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deadline_content_width', 640 );
}
add_action( 'after_setup_theme', 'deadline_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deadline_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'deadline' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'deadline' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'deadline_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function deadline_scripts() {
	wp_enqueue_style('deadline-style', get_stylesheet_uri(), [], '0.0.1');
	wp_style_add_data('deadline-style', 'rtl', 'replace');
}
add_action( 'wp_enqueue_scripts', 'deadline_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


