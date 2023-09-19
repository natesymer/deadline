<?php

if (!function_exists('deadline_header_background')) {
	function deadline_header_background() {
		if (is_404()) {
		} else if (is_search()) {
			if (have_posts()) {

			} else {

			}
		} else if (is_archive()) {
		} else if (is_singular()) {
			$att_id = get_post_thumbnail_id();
		} else if (!have_posts()) {
		}

		if ($att_id) {
			$src = wp_get_attachment_image_src($att_id, 'large')[0];
			$srcset = wp_get_attachment_image_srcset($att_id, 'full');
?>
	<img class="header-page-background" src="<?= $src; ?>" srcset="<?= $srcset; ?>" />
<?php
		}
	}
}

if (!function_exists('deadline_header_title')) {
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
?>
	<h1 class="header-page-title"><?= $title ?></h1>
<?php
	}
}

if (!function_exists('deadline_posted_on')) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function deadline_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$tagname = is_singular() ? 'a' : 'div';

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'deadline' ),
			'<' . $tagname . ' href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</' . $tagname . '>'
		);

		echo "<span class='posted-on'>$posted_on</span>";
	}
}

if (!function_exists('deadline_posted_by')) {
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function deadline_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'deadline'),
			"<span class='author vcard'><$tagname class='url fn n' href='" . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . "'>" . esc_html(get_the_author()) . "</$tagname></span>"
		);

		echo "<span class='byline'>$byline</span>";
	}
}

if (!function_exists('deadline_search_form')) {
    function deadline_search_form() {
        ?>
<form role='search' method='get' class='deadline-search-form' action='/'>
        <input type="search" class="deadline-search-field" placeholder="Search …" value="" name="s">
	<a onclick="this.parentElement.submit()"><?php deadline_search_svg(); ?></a>
</form>
        <?php
    }
}

if (!function_exists('deadline_search_svg')) {
	function deadline_search_svg() {
?>
<svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"></path></svg>
<?php
	}
}

if (!function_exists('deadline_post_thumbnail')) {
	function deadline_post_thumbnail($size = 'post-thumbnail') {
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } else { ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail($size, [
				'alt' => the_title_attribute(['echo' => false])
			]); ?>
			</a>
		<?php
		}
	}
}

