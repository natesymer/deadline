<?php
$thumbnail_src = false;
$thumbnail_srcset = false;
if (is_singular()) {
	if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        	$thumbnail_src = brooklawn_placeholder_svg(500, 500);
	} else {
        	$thumbnail_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'large');
	}
?>
<div class="featured-image">
	<img src="<?= $thumbnail_src; ?>" srcset="<?= $thumbnail_srcset; ?>" height="500" width="500"/>
</div>
<?php
}
