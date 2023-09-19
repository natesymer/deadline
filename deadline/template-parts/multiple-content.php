<?php

$thumbnail_srcset = null;
$thumbnail_src = null;
if (!(post_password_required() || is_attachment() || !has_post_thumbnail())) {
	$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
        $thumbnail_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'medium');
}

$url = esc_url(get_permalink());

?>

<a class="archive-item__title" href="<?= $url; ?>"><?php the_title(); ?></a>

<div class="archive-item__body">
	<a href="<?= $url; ?>" class="archive-item__image_container">
		<img class="archive-item__thumbnail" src="<?= $thumbnail_src; ?>" srcset="<?= $thumbnail_srcset; ?>" height="300" width="300"/>
	</a>
	<div class="archive-item__info_container">
		<div class="archive-item__post_date">
			<?= get_the_date('F jS, Y'); ?>
		</div>

		<div class="archive-item__excerpt">
			<?= get_the_excerpt(); ?>
		</div>

		<a class="archive-item__read-more" href="<?= $url; ?>">
			Read More
		</a>
	</div>
</div>
