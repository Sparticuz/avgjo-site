<?php
//Let's show the stickies
query_posts( array( 'post__in' => get_option( 'sticky_posts' ) ) );
if (have_posts()) {
	while (have_posts()) {
		the_post();
		if (has_post_thumbnail()) { ?>
			<div class="featured-hero-image six columns" style="padding-right:0;">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
					<h2><span><?php the_title(); ?></span></h2>
				</a>
			</div>
<?php	}
	}
}
wp_reset_query() 
?>