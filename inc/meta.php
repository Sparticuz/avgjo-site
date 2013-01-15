<?php //Meta for posts ?>
<div class="meta" style="margin-bottom:10px;">
	<span class="blue radius label" style="margin-bottom:2px;"><strong><?php the_author_posts_link(); ?></strong> |
	<em><?php the_time('F jS, Y') ?></em><?php edit_post_link(' | Edit'); ?></span>
</div>