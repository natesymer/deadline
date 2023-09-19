<header id="masthead" class="site-header">
	<div class="site-branding">
		<?php the_custom_logo(); ?>
	</div>

	<?php
	wp_nav_menu([
		'container' => 'nav',
		'container_id' => 'primary-navigation-container',
		'menu_class' => 'menu primary-navigation',
		'theme_location' => 'primary_navigation',
		'fallback_cb'    => false
	]);
	?>
</header>
