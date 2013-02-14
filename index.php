<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AvgJo
 * @subpackage Theme
 */
?>

<?php get_header(); ?>
<div id="content" class="row shadow">
	<div class="twelve columns">
		<?php //the div below will envelop the orbit, it's used to set the max 
		//size and to center the div ?>
		<div style="width:500px;height:281px;margin:0 auto;">
			<div class="row" id="hero-stories">
				<?php //let's load the sticky stories
				include (TEMPLATEPATH . '/inc/hero.php' ); ?>
			</div>
		</div>
		<div class="row" id="posts" style="margin-top:15px;">
			<div class="twelve columns">
				<ul class="block-grid mobile three-up" id="all-posts">
				<?php //we only want to show posts with the category of 'AverageJo' 
				query_posts( array ( 'category_name' => 'averagejo', 'posts_per_page' => -1 ) );
				if (have_posts()) : while (have_posts()) : the_post(); if(is_sticky()) continue; ?>
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="panel">
							<header class="overflow">
								<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
								<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
							</header>
							<article class="entry overflow">
								<div class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
								<?php the_content("Continue reading " . the_title('', '', false)); ?>
							</article>
							<!--<footer class="postmetadata overflow">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
								Posted in <?php the_category(', ') ?> |
								<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							</footer>-->
						</div>
					</li>
					<?php endwhile; ?>
					<?php endif; wp_reset_query(); ?>
				<?php //Now, we can show the last post from each category
					// cycle through categories, print 1 post for each category
					$categories=get_categories('orderby=name&order=ASC&exclude=501');
						foreach($categories as $category) {
							$posts=get_posts('showposts=1&cat='. $category->term_id);
							if ($posts) {
								foreach($posts as $post) {
									setup_postdata($post); ?>
									<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<div class="panel">
											<header class="overflow">
												<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
												<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
											</header>
											<article class="entry overflow">
												<div class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
												<?php the_content("Continue reading " . the_title('', '', false)); ?>
											</article>
											<!--<footer class="postmetadata overflow">
												<?php the_tags('Tags: ', ', ', '<br />'); ?>
												Posted in <?php the_category(', ') ?> |
												<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
											</footer>-->
										</div>
									</li>
									<?php
								} // foreach($posts
							} // if ($posts
						} // foreach($categories
					?>
				
				
				</ul>
				<?php //we don't want to include the nav on the front page
				//include (TEMPLATEPATH . '/inc/nav.php' ); ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
