<?php
/**
 * Template part for displaying multiple posts in an archive or search.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brooklawn
 */
?>

<?php

$thumbnail_srcset = null;
$thumbnail_src = null;
if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        $thumbnail_src = brooklawn_placeholder_svg(200, 200);
} else {
        $thumbnail_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'medium');
}

$url = esc_url(get_permalink());

?>

<article class="multiple-content multiple-content-<?= $post->post_type ?>" id="post-<?php the_ID(); ?>" <?php post_class(['multiple-content']); ?>>
        <?php the_title("<a class='archive-item__title' href='" . $url . "'>", "</a>"); ?>

	<div class="archive-item__body">
		<a href="<?= $url; ?>" class="archive-item__image_container">
                        <img class="archive-item__thumbnail" src="<?= $thumbnail_src; ?>" srcset="<?= $thumbnail_srcset; ?>" height="300" width="300"/>
                </a>
		<div class="archive-item__info_container">
			<?php get_template_part("template-parts/archive-item-info", get_post_type()); ?>
                </div>
        </div>
</article><!-- #post-<?php the_ID(); ?> -->
