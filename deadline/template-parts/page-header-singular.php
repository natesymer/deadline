<?php
$att_id = get_theme_mod('header_image_' . $post->post_type);
?>

<header class='page-header'>
	<div class="title-container">
		<h1 class="page-title"><?= get_post_type_object($post->post_type)->labels->name; ?></h1>
	</div>
	<img class="page-header-image" src="<?= wp_get_attachment_image_src($att_id, 'large')[0]; ?>" srcset="<?= wp_get_attachment_image_srcset($att_id, 'full'); ?>" />
</header><!-- .page-header -->
