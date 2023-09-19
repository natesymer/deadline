<?php

if (get_queried_object() instanceof WP_Term) {
	$_pt = brooklawn_tax_post_types(get_queried_object()->taxonomy);
	if ($_pt) {
		$_pt = $_pt[0];
	}
} else {
	$_pt = get_queried_object()->name;
}

$att_id = intval(get_theme_mod('header_image_' . $_pt));
?>

<header class="page-header">
	<div class="title-container">
		<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
	</div><!-- .title-container -->
	<img class="page-header-image header_image_<?= $_pt; ?>" src="<?= wp_get_attachment_image_src($att_id, 'large')[0]; ?>" srcset="<?= wp_get_attachment_image_srcset($att_id, 'full'); ?>" />
</header><!-- .page-header -->
