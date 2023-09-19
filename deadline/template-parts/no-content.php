<?php
	if (is_home() && intval(get_option('page_on_front')) === 0 && current_user_can('publish_posts')) {
		?><p><?php
		printf(
			wp_kses(
				/* translators: 1: link to WP admin new post page. */
				__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'brooklawn'),
				['a' => ['href' => []]]
			),
			esc_url(admin_url('post-new.php'))
		);
		?></p><?php
	} else if (is_search()) { ?>
		<div id='not-found-page'>
		<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'brooklawn'); ?></p>
		<?php brooklawn_search_form(); ?>
		<div>

	<?php } else { ?>
	<div id=not-found-page'>
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'brooklawn'); ?></p>
		<?php brooklawn_search_form(); ?>
	</div>
<?php } ?>
