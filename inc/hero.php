<?php
//Let's show the stickies
//This will query the wp object and show only the sticky posts,
//then the jquery orbit will set them in a rotator.
query_posts( array( 'post__in' => get_option( 'sticky_posts' ) ) );
if (have_posts()) {	while (have_posts()) {the_post(); if (has_post_thumbnail()) { ?>
	<div class="featured-hero-image" style="padding-right:0;">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
			<h2><span><?php the_title(); ?></span></h2>
		</a>
	</div>
<?php }	} }
wp_reset_query();
?>