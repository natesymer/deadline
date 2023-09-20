<?php

// TODO: implement the rest of these
function deadline_get_header_image_id() {
	if (is_404()) {
	} else if (is_search()) {
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
		return "Not found";
	} else if (is_search()) {
		return sprintf(have_posts() ? 'Results for: "%s"' : 'No results for: "%s"', get_search_query());
	} else if (is_archive()) {
		return get_the_archive_title();
	} else if (is_singular()) {
		return get_the_title();
	}
	return "No content";
}

function deadline_excerpt() {
	?><span class="post-excerpt"><?php the_excerpt(); ?></span><?php
}

function deadline_content() {
	$read_more = sprintf('Continue reading "%s"', wp_kses_post(get_the_title()));
	?><section class="post-content"><?php the_content($read_more); ?></section><?php
}

function deadline_updated_at() {
	?><span class="post-date published updated">Updated <time><?= get_the_modified_date(); ?></time></span><?php
}

function deadline_posted_on() {
	?><span class="post-date published">Published <time><?= get_the_date(); ?></time></span><?php
}

function deadline_is_updated() {
	return get_the_time('U') !== get_the_modified_time('U');
}

function deadline_copyright($name = null) {
	printf('<span class="copyright">© %s %s</span>', date('Y'), $name ? $name : get_bloginfo('name'));
}

function deadline_post_thumbnail($size = 'medium') {
	echo wp_get_attachment_image(get_post_thumbnail_id(), $size);
}

function deadline_title_link() {
	printf('<a class="post-title" href="%s">%s</a>', get_permalink(), get_the_title());
}
