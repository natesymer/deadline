<header id="masthead" class="site-header">
	<div class="header-top-row">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="primary-navigation">
                        <?php
                        wp_nav_menu([
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
				'fallback_cb'    => false
			]);
			?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->
