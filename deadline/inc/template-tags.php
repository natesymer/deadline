<?php

// TODO: implement the rest of these
function deadline_header_splash() {
	$att_id = false;
	if (is_404()) {
	} else if (is_search()) {
		if (have_posts()) {
		} else {
		}
	} else if (is_archive()) {
	} else if (is_singular()) {
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}
		$att_id = get_post_thumbnail_id();
	} else if (!have_posts()) {
	}

	if ($att_id) {
		deadline_image_attachment($att_id, [
			'size' => 'full',
		]);
	}
}

function deadline_header_title() {
	if (is_404()) {
		$title = "Not found";
	} else if (is_search()) {
		$q = get_search_query();
		if (have_posts()) {	
			$title = printf('Results for: "%s"', "<span>$q</span>");
		} else {
			$title = printf('No results for: "%s"', "<span>$q</span>");
		}
	} else if (is_archive()) {
		$title = get_the_archive_title();
	} else if (is_singular()) {
		$title = get_the_title();
	} else if (!have_posts()) {
		$title = "No content";
	}
	echo $title;
}

function deadline_not_found($msg) {
	echo "<p>$msg</p>";
	echo get_search_form();
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

function deadline_copyright() {
	?><span class="copyright">© <?= date("Y"); ?> <?= get_bloginfo('name'); ?></span><?php
}

function deadline_image_attachment($att_id, $args = []) {
	if (!$att_id) return;
	$args = wp_parse_args($args, ['class' => 'post-attachment', 'size' => 'medium']);
	$class = $args['class'];
	$size = $args['size'];

	$alt = get_post_meta($att_id, '_wp_attachment_image_alt', true);
	$title = get_the_title($att_id);
	$src = wp_get_attachment_image_src($att_id, $size)[0];
	$srcset = wp_get_attachment_image_srcset($att_id, $size);

	echo "<img class='$class' src='$src' srcset='$srcset' alt='$alt' title='$title' />";
}

function deadline_title_link() {
	?>
	<a class="post-title" href="<?= esc_html(get_the_permalink()); ?>"><?php the_title(); ?></a>
	<?php
}

function deadline_link_pages() {
	wp_link_pages([
		'before' => '<nav class="page-links">' . 'Pages:',
		'after'  => '</nav>',
	]);
}

