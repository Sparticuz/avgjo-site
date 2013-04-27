<?php
//Let's show the stickies
//This will query the wp object and show only the sticky posts,
//then the jquery orbit will set them in a rotator.
$categories=get_categories('orderby=name&order=ASC&exclude=501');
foreach($categories as $category) {
	$posts=get_posts('showposts=1&cat='. $category->term_id);
	if ($posts) {
		foreach($posts as $post) {
			setup_postdata($post); ?>
			<div class="featured-hero-image" style="padding-right:0;">
				<a href="<?php the_permalink(); ?>">
					<?php $post_category = get_the_category(); ?>
					<img src="<?php bloginfo('template_directory'); ?>/images/categories/<?php echo $post_category[0]->cat_ID; ?>.jpg" alt="<?php echo $post_category[0]->cat_name; ?>" />
					<h2><span><?php the_title(); ?></span></h2>
				</a>
			</div>
<?php	} // foreach($posts
	} // if ($posts
} // foreach($categories
wp_reset_query();
?>