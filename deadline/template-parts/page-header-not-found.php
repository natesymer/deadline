<?php
$att_id = get_theme_mod('not_found_header_image');
?>

<header class="page-header">
	<div class="title-container">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'brooklawn' ); ?></h1>
	</div><!-- .title-container -->
	<img class="page-header-image" src="<?= wp_get_attachment_image_src($att_id, 'large')[0]; ?>" srcset="<?= wp_get_attachment_image_srcset($att_id, 'full'); ?>" />
</header><!-- .page-header -->		
