<?php
$att_id = get_theme_mod('search_header_image');
$q = get_search_query();
?>

<header class="page-header">
	<div class="title-container">
		<h1 class="page-title">
<?php
	if (have_posts()) {
		if (strlen($q) > 0) {
		/* translators: %s: search query. */
			printf('Results for: "%s"', '<span>' . $q . '</span>');
		} else {
			?>Results for: <span>""</span><?php
		}
	} else {
		esc_html_e( 'Nothing Found', 'brooklawn' );
	}
?>
		</h1>
	</div><!-- .title-container -->
	<img class="page-header-image" src="<?= wp_get_attachment_image_src($att_id, 'large')[0]; ?>" srcset="<?= wp_get_attachment_image_srcset($att_id, 'full'); ?>" />
</header><!-- .page-header -->
