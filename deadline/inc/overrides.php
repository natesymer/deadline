<?php

// Move jQuery to the footer
add_action('wp_head', function() {
	global $wp_scripts;
	$wp_scripts->registered['jquery']->extra['group'] = 1;
	$wp_scripts->registered['jquery-core']->extra['group'] = 1;
}, 1, 9999);

// Add URL rules for posts
add_action('init', function() {
	// TODO: these rewrite rules break post ordering.
	add_rewrite_rule(
		'^posts/?',
		'index.php?post_type=post',
		'top'
	);

	add_rewrite_rule(
                '^posts/page/([0-9]+)/?$',
                'index.php?post_type=post&paged=$matches[1]',
                'top'
        );

	global $wp_post_types;
	if (!is_admin()) {
		$wp_post_types['post']->has_archive = true;
		$wp_post_types['post']->query_var = 'wppost';
	}
});
