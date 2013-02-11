<?php get_header(); ?>
<div id="content" class="row shadow">
	<div class="twelve columns">
		<div class="post panel">
			<?php if (have_posts()) : ?>
				<h2>Search Results</h2>
				<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
				<ul>	
					<?php while (have_posts()) : the_post(); ?>
						<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<div class="panel clearfix">
								<?php //this is where the posts are on the category pages ?>
								<header>
									<h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
								</header>
								<article class="entry">
									<div class="image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
									<?php the_content("Continue reading " . the_title('', '', false)); ?>
								</article>
								<!--<footer class="postmetadata">
									<?php the_tags('Tags: ', ', ', '<br />'); ?>
									Posted in <?php the_category(', ') ?> |
									<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
								</footer>-->
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
			<?php else : ?>
				<h2>No posts found.</h2>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
