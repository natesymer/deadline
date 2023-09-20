<?php

// TODO: implement the rest of these
function deadline_get_header_image_id() {
	if (is_404()) {
	} else if (is_search()) {
		if (have_posts()) {
		} else {
		}
	} else if (is_archive()) {
	} else if (is_singular()) {
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return false;
		}
		return get_post_thumbnail_id();
	} else if (!have_posts()) {
	}

	return false;
}

function deadline_get_header_title() {
	if (is_404()) {
		$title = "Not found";
	} else if (is_search()) {
		$title = sprintf(have_posts() ? 'Results for: "%s"' : 'No results for: "%s"', get_search_query());
	} else if (is_archive()) {
		$title = get_the_archive_title();
	} else if (is_singular()) {
		$title = get_the_title();
	} else if (!have_posts()) {
		$title = "No content";
	}
	return $title;
}

function deadline_excerpt() {
	?><span class="post-excerpt"><?php the_excerpt(); ?></span><?php
}

function deadline_content() {
	$read_more = sprintf('Continue reading "%s"', wp_kses_post(get_the_title()));
	?><section class="post-content"><?php the_content($read_more); ?></section><?php
}

function deadline_updated_at() {
	?>
	<span class="post-date published updated">Updated at <time><?= get_the_modified_date(); ?></time></span>
	<?php
}

function deadline_posted_on() {
	?>
	<span class="post-date published">Posted on <time><?= get_the_date(); ?></time></span>
	<?php
}

function deadline_is_updated() {
	return get_the_time('U') !== get_the_modified_time('U');
}

function deadline_posted_by() {
	$url = esc_html(get_author_posts_url(get_the_author_meta('ID')));
	$author = esc_html(get_the_author());
	echo "<a class='post-author' href='$url'>$author</a>";
}

function deadline_copyright($name = null) {
	?><span class="copyright">© <?= date("Y"); ?> <?= $name ? $name : get_bloginfo('name'); ?></span><?php
}

function deadline_post_thumbnail($size = 'medium') {
	echo wp_get_attachment_image(get_post_thumbnail_id(), $size);
}

function deadline_title_link() {
	?>
	<a class="post-title" href="<?= esc_html(get_the_permalink()); ?>"><?php the_title(); ?></a>
	<?php
}
