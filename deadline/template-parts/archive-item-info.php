<?php

?>

<div class="archive-item__post_date">
	<?= get_the_date('F jS, Y'); ?>
</div>

<div class="archive-item__excerpt">
	<?= get_the_excerpt(); ?>
</div>

<a class="archive-item__read-more" href="<?= get_the_permalink(); ?>">
	Read More
</a>
