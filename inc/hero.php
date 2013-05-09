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
				<?php $post_category = get_the_category(); ?>
				<?php $category_link = get_category_link( $post_category[0]->cat_ID ); ?>
				<a href="<?php echo esc_url( $category_link ); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/images/categories/<?php echo $post_category[0]->cat_ID; ?>.jpg" alt="<?php echo $post_category[0]->cat_name; ?>" />
				</a>
			</div>
<?php	} // foreach($posts
	} // if ($posts
} // foreach($categories
wp_reset_query();
?>