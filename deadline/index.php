<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header id="masthead" class="site-header">
			<nav>
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div>

				<?php
				wp_nav_menu([
					'container' => '',
					'menu_class' => 'menu primary-navigation',
					'theme_location' => 'primary_navigation',
					'fallback_cb'    => false
				]);
				?>
			</nav>
			<?php deadline_header_title(); ?>
			<?php deadline_header_background(); ?>
		</header>
		<main id="primary" class="site-main">
			<section>
			<?php
				if (is_404()) {
					get_template_part('template-parts/not-found');
				} else if (have_posts()) {
					while (have_posts()) {
						the_post();
						?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
	
						if (is_front_page() && get_template_part('template-parts/front-page') !== false) {
						} else if (is_singular()) {
							get_template_part('template-parts/single-content', get_post_type());
						} else {
							get_template_part('template-parts/multiple-content', get_post_type());
						}
						?></article><?php
					}

					$show_nav = is_singular() ? !is_front_page() && get_post_type === 'post' : true;
					if ($show_nav) {
						the_post_navigation([
							'prev_text' => '<span class="nav-subtitle">Previous:</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">Next:</span> <span class="nav-title">%title</span>',
						]);
					}
/*
					if (!is_singular()) { ?>
						<nav class="navigation posts-navigation">
							<div class="nav-links">
								<div class="nav-previous">
									<?= previous_posts_link('&laquo; Previous'); ?>
								</div>
								<div class="nav-next">
									<?= next_posts_link('Next &raquo;') ?>
								</div>
							</div>
						</nav>
					<?php
					} else {
						posts_nav_link();
					}
*/
				} else if (is_search()) { ?>
					<div id='not-found-page'>
						<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
						<?php brooklawn_search_form(); ?>
					<div>
				<?php
				} else if (is_home() && intval(get_option('page_on_front')) === 0 && current_user_can('publish_posts')) { ?>
					<p>Ready to publish your first post? <a href="<?= esc_url(admin_url('post-new.php')); ?>">Get started here</a>.</p>
				<?php
				} else { ?>
					<div id=not-found-page'>
						<p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
						<?php brooklawn_search_form(); ?>
					</div>
				<?php
				}
				?>
			</section>
			<?php get_template_part('template-parts/sidebar'); ?>
		</main>
		<?php get_template_part('template-parts/footer'); ?>
		<?php wp_footer(); ?>
	</body>
</html>
