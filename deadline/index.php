<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header id="masthead">
			<nav id="sitenav">
				<figure id="branding">
					<?php the_custom_logo(); ?>
				</figure>
				<?php
				wp_nav_menu([
					'container' => '',
					'menu_class' => 'menu primary-navigation',
					'theme_location' => 'primary_navigation',
					'fallback_cb'    => false
				]);
				?>
			</nav>
			<h1 class="header-title">
				<?= deadline_get_header_title(); ?>
			</h1>
			<figure class="header-splash">
				<?= wp_get_attachment_image(deadline_get_header_image_id(), 'full'); ?>
			</figure>
		</header>
		<main id="primary">
			<section id="content">
			<?php
			if (is_404()) {
				?><p>It looks like nothing was found at this location.</p><?php
			} else if (have_posts()) {
				while (have_posts()) {
					the_post();
					?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
					if (is_singular()) {
						if (!is_front_page()) {
							deadline_posted_by();
							deadline_posted_on();
							if (deadline_is_updated()) {
								deadline_updated_at();
							}
						}
						deadline_content();
						deadline_internal_pagination();
						the_post_navigation();
					} else {
						deadline_title_link();
						deadline_post_thumbnail();
						deadline_posted_by();
						deadline_posted_on();
						if (deadline_is_updated()) {
							deadline_updated_at();
						}
						deadline_excerpt();
					}
					?></article><?php
				}
				if (!is_singular()) {
					the_posts_navigation();
				}
			} else if (is_search()) {
				?><p>Sorry, but nothing matched your search terms.</p><?php
				echo get_search_form();
			} else {
				?><p>It seems we can't find what you're looking for.</p><?php
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
			<?php deadline_copyright(); ?>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
