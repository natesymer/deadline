<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="position: relative">
	<?php get_template_part('template-parts/entry-header', get_post_type()); ?>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'brooklawn'),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages([
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brooklawn' ),
			'after'  => '</div>',
		]);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
