<?php //Meta for posts ?>
<div class="meta">
	<div class="floatL">
		<strong><?php echo get_the_author();  ?></strong> |
		<em><?php the_time('F jS, Y') ?></em>
	</div>
	<div clas="floatR">
		<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
	</div>
</div>