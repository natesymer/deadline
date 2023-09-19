<div class="entry-content">
	<?php
	the_content(
		sprintf(
			wp_kses('Continue reading<span class="screen-reader-text"> "%s"</span>', [
				'span' => ['class' => []]
			]),
			wp_kses_post(get_the_title())
		)
	);

	wp_link_pages([
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brooklawn' ),
		'after'  => '</div>',
	]);
	?>
</div>
