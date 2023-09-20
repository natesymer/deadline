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
					deadline_not_found('It looks like nothing was found at this location.');
				} else if (have_posts()) {
					while (have_posts()) {
						the_post();
						?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
	
						if (is_front_page() && get_template_part('template-parts/front-page') !== false) {
						} else if (is_singular()) {
							deadline_posted_by();
							deadline_posted_on();
							if (deadline_is_updated()) {
								deadline_updated_at();
							}
							deadline_content();

							wp_link_pages([
								'before' => '<div class="page-links">' . 'Pages:',
								'after'  => '</div>',
							]);
						} else {
							deadline_title_link();
							deadline_image_attachment(get_post_thumbnail_id());
							deadline_posted_by();
							deadline_posted_on();
							if (deadline_is_updated()) {
								deadline_updated_at();
							}
							deadline_excerpt();
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
				} else if (is_search()) {
					deadline_not_found("Sorry, but nothing matched your search terms.");
				} else if (is_home() && intval(get_option('page_on_front')) === 0 && current_user_can('publish_posts')) { ?>
					<p>Ready to publish your first post? <a href="<?= esc_url(admin_url('post-new.php')); ?>">Get started here</a>.</p>
				<?php
				} else {
					deadline_not_found("It seems we can't find what you're looking for.");
				}
				?>
			</section>
			<?php if (is_active_sidebar('sidebar')) { ?>
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar('sidebar'); ?>
			</aside>
			<?php } ?>
		</main>
		<footer id="colophon" class="site-footer">
			<div class="site-info">
				<?php deadline_copyright(); ?>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
