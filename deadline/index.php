<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part('template-parts/header'); ?>
	<main id="primary" class="site-main">
		<?php
			if (is_404()) {
				get_template_part('template-parts/page-header-not-found');
			} else if (is_search()) {
				get_template_part('template-parts/page-header-search');
			} else if (is_archive()) {
				get_template_part('template-parts/page-header-archive', get_queried_object()->name);
			} else if (is_singular() && !is_front_page() && get_post_type() !== 'page') {
				get_template_part('template-parts/page-header-singular', get_post_type());
			} else if (!have_posts()) {
				get_template_part('template-parts/page-header-no-content');
			}?>
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

				if (!is_front_page() && is_singular() && get_post_type() === 'post') {
					the_post_navigation([
						'prev_text' => '<span class="nav-subtitle">Previous:</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">Next:</span> <span class="nav-title">%title</span>',
					]);
				}

				if (!is_singular()) {
					get_template_part('template-parts/archive-nav', get_post_type());
				} else {
					posts_nav_link();
				}
			} else {
				get_template_part('template-parts/no-content');
			}
			?>
			</section>
			<?php get_template_part('template-parts/sidebar'); ?>
		</main>
		<?php get_template_part('template-parts/footer'); ?>
		<?php wp_footer(); ?>
	</body>
</html>
